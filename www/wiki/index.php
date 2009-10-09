<?php
	require('../../includes/prepend.inc.php');
	require(__INCLUDES__ . '/messages/MessagesPanel.class.php');
	
	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;
		protected $objWikiVersion;
		protected $intWikiItemTypeId;
		protected $strSanitizedPath;

		protected $pnlVersions;

		protected $pnlContent;

		protected $pnlContentHeadline;
		protected $strPostStartedLinkText;
		protected $btnSetAsCurrentVersion;
		protected $btnEdit;
		protected $btnToggleVersions;
		protected $btnToggleMessages;
		protected $btnAdmin;

		protected $pnlMessages;

		protected function Form_Run() {
			// Sanitize the Path in the PathInfo
			$strSanitizedFullPath = WikiItem::ValidateOrGenerateSanitizedFullPath(QApplication::$PathInfo);
			if ($strSanitizedFullPath) {
				QApplication::Redirect('/wiki' . $strSanitizedFullPath . QApplication::GenerateQueryString());
			}
		}

		protected function Form_Create() {
			$this->strSanitizedPath = WikiItem::SanitizeForPath(QApplication::$PathInfo, $this->intWikiItemTypeId);
			$this->objWikiItem = WikiItem::LoadByPathWikiItemTypeId($this->strSanitizedPath, $this->intWikiItemTypeId);

			$this->strPageTitle .= sprintf(' %s - ', WikiItemType::$NameArray[$this->intWikiItemTypeId]);

			// If Doesn't Exist, Show the 404 page
			if (!$this->objWikiItem) {
				parent::Form_Create();
				$this->strHtmlIncludeFilePath = dirname(__FILE__) . '/index_404.tpl.php';
				$this->strPageTitle .= QApplication::$PathInfo;
				return;
			}

			// Get the Wiki Version object based on the $_GET variables, or use CurrentWikiVersion if none passed in
			$arrGetKeys = array_keys($_GET);
			if (count($arrGetKeys) == 1)
				$this->objWikiVersion = WikiVersion::LoadByWikiItemIdVersionNumber($this->objWikiItem->Id, $arrGetKeys[0]);
			if (!$this->objWikiVersion)
				$this->objWikiVersion = $this->objWikiItem->CurrentWikiVersion;

			// Setup NavBar and SubNav stuff (if applicable) and setup PageTitle
			if (!is_null($this->objWikiItem->OverrideNavbarIndex)) {
				$this->intNavBarIndex = $this->objWikiItem->OverrideNavbarIndex;
				$this->intSubNavIndex = $this->objWikiItem->OverrideSubnavIndex;
				$this->strPageTitle = $this->objWikiVersion->Name;
			} else {
				$this->strPageTitle .= $this->objWikiVersion->Name;
			}

			// Create Controls for Page
			parent::Form_Create();

			if ($this->objWikiItem->IsEditableForPerson(QApplication::$Person)) {
				$this->btnSetAsCurrentVersion = new QLinkButton($this);
				$this->btnSetAsCurrentVersion->Text = 'Set as Current';
				$this->btnSetAsCurrentVersion->AddAction(new QClickEvent(), new QAjaxAction('btnSetAsCurrentVersion_Click'));
				$this->btnSetAsCurrentVersion->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Setup the Main Content Area
			$this->pnlContent = new QPanel($this);
			$this->pnlContent->CssClass = 'wiki';
			
			$this->pnlContentHeadline = new QPanel($this->pnlContent);
			$this->pnlContentHeadline->Template = 'pnlContentHeadline.tpl.php';

			$this->btnEdit = new RoundedLinkButton($this->pnlContentHeadline);
			$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
			$this->btnEdit->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnEdit->AddCssClass('roundedLinkGray');

			$this->btnToggleVersions = new RoundedLinkButton($this->pnlContentHeadline);
			$this->btnToggleVersions->AddAction(new QClickEvent(), new QAjaxAction('btnToggleVersions_Click'));
			$this->btnToggleVersions->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnToggleMessages = new RoundedLinkButton($this->pnlContentHeadline);
			$this->btnToggleMessages->AddAction(new QClickEvent(), new QAjaxAction('btnToggleMessages_Click'));
			$this->btnToggleMessages->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->objWikiItem->IsAdminableForPerson(QApplication::$Person)) {
				$this->btnAdmin = new RoundedLinkButton($this->pnlContentHeadline);
				$this->btnAdmin->AddAction(new QClickEvent(), new QAjaxAction('btnAdmin_Click'));
				$this->btnAdmin->AddAction(new QClickEvent(), new QTerminateAction());
				$this->btnAdmin->AddCssClass('roundedLinkGray');
				$this->btnAdmin->Text = 'Admin This Wiki';
			}

			$this->pnlVersions = new WikiVersionsPanel($this->objWikiItem, $this, 'wikiVersionsPanel');
			if (count($arrGetKeys) && is_numeric($arrGetKeys[0]))
				$this->pnlVersions_Show();
			else
				$this->pnlVersions_Hide();

			// Set the template path baed on the wiki item type
			$this->SetTemplatePath();

			// Setup DateTime of Post
			$dttLocalize = QApplication::LocalizeDateTime($this->objWikiVersion->PostDate);
			$this->strPostStartedLinkText = strtolower($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm z ')) .
				strtolower(QApplication::DisplayTimezoneLink($dttLocalize, false));

			// Setup messages panel
			$this->pnlMessages = new MessagesPanel($this);
			$this->pnlMessages->SelectTopic($this->objWikiItem->TopicLink->GetTopic());
			$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfoForWiki.tpl.php');
			$this->pnlMessages->btnRespond1->Text = 'Post Comment';
			$this->pnlMessages->btnRespond2->Text = 'Post Comment';
			$this->pnlMessages->strAdditionalCssClass = 'topicForWiki';
			if (array_key_exists('lastpage', $_GET)) {
				$this->pnlMessages->SetPageNumber(QPaginatedControl::LastPage);
				$this->pnlMessages_Show();
			} else if (QApplication::IsWikiViewComments()) {
				$this->pnlMessages_Show();
			} else {
				$this->pnlMessages_Hide();
			}
		}

		public function IsViewingCurrent() {
			return $this->objWikiVersion->IsCurrentVersion();
		}

		protected function SetTemplatePath() {
			switch ($this->objWikiItem->WikiItemTypeId) {
				case WikiItemType::Page:
					$this->objWikiVersion->WikiPage->ViewCount++;
					$this->objWikiVersion->WikiPage->Save();
					$this->pnlContent->Template = dirname(__FILE__) . '/pnlWikiContent_page.tpl.php';
					$this->btnEdit->Text = 'Edit Page';
					break;

				case WikiItemType::File:
					$this->pnlContent->Template = dirname(__FILE__) . '/pnlWikiContent_file.tpl.php';
					$this->btnEdit->Text = 'Upload New Version';
					break;

				case WikiItemType::Image:
					$this->pnlContent->Template = dirname(__FILE__) . '/pnlWikiContent_image.tpl.php';
					$this->btnEdit->Text = 'Upload New Version';
					break;

				default:
					throw new Exception('Unhandled Wiki Item Type Id: ' . $this->objWikiItem->WikiItemTypeId);
			}
		}

		protected function btnSetAsCurrentVersion_Click() {
			$this->objWikiItem->SetCurrentVersion($this->objWikiVersion);

			$strMessage = sprintf("%s switched the current version of this wiki %s to version #%s.", QApplication::$Person->DisplayName, strtolower(WikiItemType::$NameArray[$this->objWikiItem->WikiItemTypeId]), $this->objWikiVersion->VersionNumber);				
			$this->objWikiItem->PostMessage($strMessage, null);

			QApplication::Redirect($this->objWikiItem->UrlPath . '?lastpage');
		}

		protected function btnAdmin_Click() {
			QApplication::Redirect('/wiki/admin.php' . $this->objWikiItem->FullPath);
		}

		protected function btnEdit_Click() {
			if (!QApplication::$Person) QApplication::RedirectToLogin();
			if (!$this->objWikiItem->IsEditableForPerson(QApplication::$Person)) {
				QApplication::DisplayAlert('Unfortunately, your role of "' . QApplication::$Person->Type . '" is not authorized to edit this wiki item.');
				return;
			}

			if (!$this->IsViewingCurrent() || $this->pnlVersions->Visible)
				$strVersion = '?' . $this->objWikiVersion->VersionNumber;
			else
				$strVersion = null;

			QApplication::Redirect('/wiki/edit.php' . $this->objWikiItem->FullPath);
		}

		protected function btnToggleVersions_Click($strFormId, $strControlId, $strParameter) {
			if ($this->pnlVersions->Visible) {
				$this->pnlVersions_Hide();
			} else {
				$this->pnlVersions_Show();
			}
		}
		
		protected function btnToggleMessages_Click($strFormId, $strControlId, $strParameter) {
			if ($this->pnlMessages->Visible) {
				$this->pnlMessages_Hide();
			} else {
				$this->pnlMessages_Show();
			}
		}
		
		protected function pnlVersions_Show() {
			$this->btnToggleVersions->Text = 'Hide Versions';
			$this->btnToggleVersions->RemoveCssClass('roundedLinkGray');
			$this->pnlVersions->Visible = true;
			$this->pnlContent->Width = '750px';
			$this->pnlContent->SetCustomStyle('padding-right', '10px');
		}

		protected function pnlVersions_Hide() {
			$this->btnToggleVersions->Text = 'Show Versions';
			$this->btnToggleVersions->AddCssClass('roundedLinkGray');
			$this->pnlVersions->Visible = false;
			$this->pnlContent->Width = null;
			$this->pnlContent->SetCustomStyle('padding-right', null);
		}

		protected function pnlMessages_Show() {
			QApplication::SetWikiViewComments(true);
			$this->pnlMessages->objTopic->MarkAsViewed();
			$this->pnlMessages->UpdateMarkAsViewedButtons();
			$this->btnToggleMessages->Text = 'Hide Comments';
			$this->btnToggleMessages->RemoveCssClass('roundedLinkGray');
			$this->pnlMessages->Visible = true;
		}

		protected function pnlMessages_Hide() {
			QApplication::SetWikiViewComments(false);
			$this->btnToggleMessages->Text = 'Show Comments';
			$this->btnToggleMessages->AddCssClass('roundedLinkGray');
			$this->pnlMessages->Visible = false;
		}
	}

	QcodoForm::Run('QcodoForm');
?>