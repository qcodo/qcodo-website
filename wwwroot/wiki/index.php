<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki - ';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;
		protected $objWikiVersion;

		protected $pnlVersions;
		protected $pxyVersions;

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

			// We're with a valid wiki item -- set the template path baed on the wiki item type
			$this->SetTemplatePath();
			
			// Setup NavBar and SubNav stuff (if applicable) and setup PageTitle
			if (!is_null($this->objWikiItem->OverrideNavbarIndex)) {
				$this->intNavBarIndex = $this->objWikiItem->OverrideNavbarIndex;
				$this->intSubNavIndex = $this->objWikiItem->OverrideSubnavIndex;
				$this->strPageTitle = $this->objWikiItem->CurrentName;
			} else {
				$this->strPageTitle .= $this->objWikiItem->CurrentName;
			}

			// Get the Wiki Version object based on the $_GET variables, or use CurrentWikiVersion if none passed in
			if (array_key_exists('version', $_GET))
				$this->objWikiVersion = WikiVersion::LoadByWikiItemIdVersionNumber($this->objWikiItem->Id, $_GET['version']);
			if (!$this->objWikiVersion)
				$this->objWikiVersion = $this->objWikiItem->CurrentWikiVersion;

			// Create Controls for Page
			parent::Form_Create();

			$this->pxyVersions = new QControlProxy($this);
			$this->pxyVersions->AddAction(new QClickEvent(), new QAjaxAction('pxyVersions_Click'));
			$this->pxyVersions->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function SetTemplatePath() {
			switch ($this->objWikiItem->WikiItemTypeId) {
				case WikiItemType::Page:
				case WikiItemType::File:
				case WikiItemType::Image:
					$this->strHtmlIncludeFilePath = dirname(__FILE__) . '/index_' . strtolower(WikiItemType::$TokenArray[$this->objWikiItem->WikiItemTypeId]) . '.tpl.php';
					break;

				default:
					throw new Exception('Unhandled Wiki Item Type Id: ' . $this->objWikiItem->WikiItemTypeId);
			}
		}

		protected function pxyVersions_Click($strFormId, $strControlId, $strParameter) {
		}
	}

	QcodoForm::Run('QcodoForm', dirname(__FILE__) . '/index_404.tpl.php');
?>