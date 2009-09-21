<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;
		protected $objWikiVersion;

		protected $btnButton;
		protected $lblMessage;

		protected function Form_Run() {
			// Sanitize the Path in the PathInfo
			$strPath = WikiItem::SanitizeForPath(QApplication::$PathInfo);
			if ($strPath != QApplication::$PathInfo) {
				QApplication::Redirect('/wiki' . $strPath . QApplication::GenerateQueryString());
			}
		}

		protected function Form_Create() {
			parent::Form_Create();

			$this->objWikiItem = WikiItem::LoadByPath(QApplication::$PathInfo);

			// If Doesn't Exist, Show the 404 page
			if (!$this->objWikiItem) {
				$this->strHtmlIncludeFilePath = dirname(__FILE__) . '/index_404.tpl.php';
				return;
			}

			$this->SetTemplatePath();

			// Get the Version
			if (array_key_exists('version', $_GET))
				$this->objWikiVersion = WikiVersion::LoadByWikiItemIdVersionNumber($this->objWikiItem->Id, $_GET['version']);

			if (!$this->objWikiVersion)
				$this->objWikiVersion = $this->objWikiItem->CurrentWikiVersion;

			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'Click the Button';

			$this->btnButton = new QButton($this);
			$this->btnButton->Text = 'Test';
			$this->btnButton->AddAction(new QClickEvent(), new QAjaxAction('btnButton_Click'));
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

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm', dirname(__FILE__) . '/index_404.tpl.php');
?>