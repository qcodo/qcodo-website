<?php
	require('../../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Showcase';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutShowcase;

		protected $objShowcaseArray;

		protected $btnNew;
		protected $pxyItem;
		protected $btnAdmin;

		protected $objSelectedShowcase;
		protected $dlgBox;
		protected $btnClose;
		

		protected $txtName;
		protected $txtDescription;
		protected $txtUrl;
		protected $flcImage;
		protected $btnOkay;
		protected $btnCancel;

		protected function Form_Create() {
			parent::Form_Create();
			
			$objShowcases = ShowcaseItem::LoadArrayByLiveFlag(true);
			$this->objShowcaseArray = array();

			while ((count($this->objShowcaseArray) < 14) && (count($objShowcases))) {
				$intKeyArray = array_keys($objShowcases);
				$intRandomKey = $intKeyArray[rand(0, count($intKeyArray) - 1)];
				$this->objShowcaseArray[] = $objShowcases[$intRandomKey];
				unset($objShowcases[$intRandomKey]);
			}

			$this->btnNew = new RoundedLinkButton($this);
			$this->btnNew->Text = 'Submit a Project or Site';
			$this->btnNew->AddAction(new QClickEvent(), new QAjaxAction('btnNew_Click'));
			$this->btnNew->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyItem = new QControlProxy($this);
			$this->pxyItem->AddAction(new QClickEvent(), new QAjaxAction('pxyItem_Click'));
			$this->pxyItem->AddAction(new QClickEvent(), new QTerminateAction());
			
			if (ShowcaseItem::IsAdminableForPerson(QApplication::$Person)) {
				$this->btnAdmin = new RoundedLinkButton($this);
				$this->btnAdmin->Text = 'Administer Showcase Items';
				$this->btnAdmin->LinkUrl = '/showcase/admin.php';
			}
			
			$this->dlgBox = new QDialogBox($this);
			$this->dlgBox->MatteClickable = false;
			$this->dlgBox->HideDialogBox();
			
			$this->btnClose = new QButton($this->dlgBox);
			$this->btnClose->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgBox));
			
			$this->txtName = new QTextBox($this->dlgBox);
			$this->txtName->Required = true;
			
			$this->txtDescription = new QTextBox($this->dlgBox);
			$this->txtDescription->TextMode = QTextMode::MultiLine;
			
			$this->txtUrl = new UrlTextBox($this->dlgBox);
			$this->txtUrl->Required = true;
			
			$this->flcImage = new QFileControl($this->dlgBox);
			$this->flcImage->Required = true;
			
			$this->btnOkay = new QButton($this->dlgBox);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->AddAction(new QClickEvent(), new QServerAction('btnOkay_Click'));

			$this->btnCancel = new QLinkButton($this->dlgBox);
			$this->btnCancel->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgBox));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		protected function IsImageUploadedValid() {
			$arrValues = getimagesize($this->flcImage->File);
			if (!$arrValues) {
				return false;
			}

			$intWidth = $arrValues[0];
			$intHeight = $arrValues[1];
			switch ($arrValues[2]) {
				case IMAGETYPE_JPEG:
				case IMAGETYPE_PNG:
				case IMAGETYPE_GIF:
					break;
				default:
					return false;
			}

			// returns true if there are dimensions, it's a square, and the dimensions are <= 500 x 500
			return ($intWidth && ($intWidth == $intHeight) && ($intWidth <= 500));
		}

		protected function btnOkay_Click() {
			if (!$this->IsImageUploadedValid()) {
				$this->flcImage->Warning = 'Invalid Image File';
				return;
			}

			$objShowcaseItem = new ShowcaseItem();
			$objShowcaseItem->Person = QApplication::$Person;
			$objShowcaseItem->Name = trim($this->txtName->Text);
			$objShowcaseItem->Description = trim($this->txtDescription->Text);
			$objShowcaseItem->Url = trim($this->txtUrl->Text);
			$objShowcaseItem->LiveFlag = false;
			
			$objShowcaseItem->SaveWithImage($this->flcImage->File);
			$this->dlgBox->HideDialogBox();
			QApplication::DisplayAlert('Thank you for your submission!  We will email you if/when your showcase item is posted.');
		}

		protected function pxyItem_Click($strFormId, $strControlId, $strParameter) {
			$this->objSelectedShowcase = ShowcaseItem::Load($strParameter);
			if (!$this->objSelectedShowcase || !$this->objSelectedShowcase->LiveFlag) return;

			$this->dlgBox->Template = dirname(__FILE__) . '/dlgBox_ShowcaseView.tpl.php';
			$this->dlgBox->ShowDialogBox();
		}

		protected function btnNew_Click($strFormId, $strControlId, $strParameter) {
			if (!QApplication::$Person) QApplication::RedirectToLogin();

			$this->txtName->Text = null;
			$this->txtDescription->Text = null;
			$this->txtUrl->Text = null;
			
			$this->dlgBox->Template = dirname(__FILE__) . '/dlgBox_ShowcaseNew.tpl.php';
			$this->dlgBox->ShowDialogBox();
		}
	}

	QcodoForm::Run('QcodoForm');
?>