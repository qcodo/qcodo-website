<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Edit Wiki Page - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $objWikiItem;
		protected $blnEditMode;
		
		protected $strHeadline;

		protected $txtTitle;
		protected $txtContent;

		protected $btnOkay;
		protected $btnCancel;

		protected function Form_Run() {
			// Sanitize the Path in the PathInfo
			$strPath = WikiItem::SanitizeForPath(QApplication::$PathInfo);
			if ($strPath != QApplication::$PathInfo) {
				QApplication::Redirect('/wiki/edit_page.php' . $strPath . QApplication::GenerateQueryString());
			}
		}

		protected function Form_Create() {
			parent::Form_Create();

			$this->objWikiItem = WikiItem::LoadByPath(QApplication::$PathInfo);

			// If Doesn't Exist, Show the 404 page
			if (!$this->objWikiItem) {
				$this->objWikiItem = new WikiItem();
				$objWikiVersion = new WikiVersion();
				$objWikiPage = new WikiPage();

				$this->blnEditMode = false;
				$this->strPageTitle = 'Create New Wiki Page';
				$this->strHeadline = 'Create a New Wiki Page';
			} else {
				// Get the Wiki Version object based on the $_GET variables, or use CurrentWikiVersion if none passed in
				$arrGetKeys = array_keys($_GET);
				if (count($arrGetKeys) == 1)
					$objWikiVersion = WikiVersion::LoadByWikiItemIdVersionNumber($this->objWikiItem->Id, $arrGetKeys[0]);
				if (!$objWikiVersion)
					$objWikiVersion = $this->objWikiItem->CurrentWikiVersion;

				$objWikiPage = $objWikiVersion->WikiPage;
				$this->blnEditMode = true;
				$this->strPageTitle .= $objWikiVersion->Name;
				$this->strHeadline = 'Edit Wiki Page';
			}

			$this->txtTitle = new QTextBox($this);
			$this->txtTitle->Text = $objWikiVersion->Name;
			$this->txtTitle->Required = true;

			$this->txtContent = new QTextBox($this);
			$this->txtContent->Text = $objWikiPage->Content;
			$this->txtContent->Required = true;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			
			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->Text = ($this->blnEditMode) ? 'Update Wiki Page' : 'Save New Wiki Page';

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			
			$this->btnOkay->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnOkay));
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxAction('btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			$this->txtTitle->Focus();
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}

		protected function btnOkay_Click() {
			if (!$this->blnEditMode) {
				$this->objWikiItem = WikiItem::CreateNewItem(QApplication::$PathInfo, WikiItemType::Page);
			}
			
			$objWikiPage = new WikiPage();
			$objWikiPage->Content = trim($this->txtContent->Text);
			$objWikiPage->CompileHtml();

			$this->objWikiItem->CreateNewVersion(trim($this->txtTitle->Text), $objWikiPage, 'Save', array(), QApplication::$Person, null);

			QApplication::Redirect($this->objWikiItem->UrlPath);
		}

		protected function btnCancel_Click() {
			QApplication::Redirect(str_replace('/edit_page.php', null, QApplication::$RequestUri));
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>