<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki - ';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;
		protected $objWikiVersion;

		protected $btnEdit;

		protected $pnlVersions;
		protected $btnToggleVersions;

		protected $btnSetAsCurrentVersion;
		protected $pnlContent;
		
		protected $strPostStartedLinkText;

		protected function Form_Run() {
			// Sanitize the Path in the PathInfo
			$strPath = WikiItem::SanitizeForPath(QApplication::$PathInfo);
			if ($strPath != QApplication::$PathInfo) {
				QApplication::Redirect('/wiki' . $strPath . QApplication::GenerateQueryString());
			}
		}

		protected function Form_Create() {
			$this->objWikiItem = WikiItem::LoadByPath(QApplication::$PathInfo);

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

			$this->btnToggleVersions = new QLinkButton($this);
			$this->btnToggleVersions->Text = 'View Versions';
			$this->btnToggleVersions->AddAction(new QClickEvent(), new QAjaxAction('btnToggleVersions_Click'));
			$this->btnToggleVersions->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnToggleVersions->ForeColor = '#ccc';
			$this->btnToggleVersions->FontSize = '10px';
			
			$this->btnSetAsCurrentVersion = new QLinkButton($this);
			$this->btnSetAsCurrentVersion->Text = 'Set as Current';
			$this->btnSetAsCurrentVersion->AddAction(new QClickEvent(), new QAjaxAction('btnSetAsCurrentVersion_Click'));
			$this->btnSetAsCurrentVersion->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnSetAsCurrentVersion->Visible = false;
			if (QApplication::$Person && (QApplication::$Person->PersonTypeId == PersonType::Administrator))
				$this->btnSetAsCurrentVersion->Visible = true;

			$this->pnlContent = new QPanel($this);
			$this->pnlContent->CssClass = 'wiki';

			// Set the template path baed on the wiki item type
			$this->SetTemplatePath();

			$this->btnEdit = new RoundedLinkButton($this->pnlContent);
			$this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
			$this->btnEdit->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pnlVersions = new WikiVersionsPanel($this->objWikiItem, $this, 'wikiVersionsPanel');
			if (count($arrGetKeys) == 1)
				$this->pnlVersions_Show();
			else
				$this->pnlVersions_Hide();
				
			// Setup DateTime of Post
			$dttLocalize = QApplication::LocalizeDateTime($this->objWikiVersion->PostDate);
			$this->strPostStartedLinkText = strtolower($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm z ')) .
				strtolower(QApplication::DisplayTimezoneLink($dttLocalize, false));
		}

		public function IsViewingCurrent() {
			return $this->objWikiVersion->IsCurrentVersion();
		}

		protected function SetTemplatePath() {
			switch ($this->objWikiItem->WikiItemTypeId) {
				case WikiItemType::Page:
				case WikiItemType::File:
				case WikiItemType::Image:
					$this->pnlContent->Template = dirname(__FILE__) . '/pnlWikiContent_' . strtolower(WikiItemType::$TokenArray[$this->objWikiItem->WikiItemTypeId]) . '.tpl.php';
					break;

				default:
					throw new Exception('Unhandled Wiki Item Type Id: ' . $this->objWikiItem->WikiItemTypeId);
			}
		}

		protected function btnSetAsCurrentVersion_Click() {
			$this->objWikiItem->SetCurrentVersion($this->objWikiVersion);
			QApplication::Redirect($this->objWikiItem->UrlPath);
		}
		
		protected function btnEdit_Click() {
			if (!QApplication::$Person) QApplication::RedirectToLogin();

			switch ($this->objWikiItem->WikiItemTypeId) {
				case WikiItemType::Page:
					QApplication::Redirect('/wiki/edit_page.php' . $this->objWikiItem->Path . '?' . $this->objWikiVersion->VersionNumber);
					break;
				case WikiItemType::File:
					break;
				case WikiItemType::Image:
					break;
				default:
					throw new Exception('Unhandled Wiki Item Type Id: ' . $this->objWikiItem->WikiItemTypeId);
			}
		}

		protected function btnToggleVersions_Click($strFormId, $strControlId, $strParameter) {
			if ($this->pnlVersions->Visible) {
				$this->pnlVersions_Hide();
			} else {
				$this->pnlVersions_Show();
			}
		}

		protected function pnlVersions_Show() {
			$this->btnToggleVersions->Text = 'Hide Versions';
			$this->pnlVersions->Visible = true;
			$this->pnlContent->Width = '750px';
			$this->pnlContent->SetCustomStyle('padding-right', '10px');
		}

		protected function pnlVersions_Hide() {
			$this->btnToggleVersions->Text = 'View Versions';
			$this->pnlVersions->Visible = false;
			$this->pnlContent->Width = null;
			$this->pnlContent->SetCustomStyle('padding-right', null);
		}
	}

	QcodoForm::Run('QcodoForm');
?>