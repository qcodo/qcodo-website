<?php
	require('../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Package - ';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $mctPackage;
		protected $blnEditMode;

		protected $strHeadline;

		protected $txtToken;
		protected $lstCategory;
		protected $txtName;
		protected $txtDescription;

		protected $btnOkay;
		protected $btnCancel;
		
		protected function Form_Create() {
			parent::Form_Create();

			// "New" is a special keyword
			if (($strToken = trim(strtolower(QApplication::PathInfo(0)))) == 'new') $strToken = null;

			$objPackage = Package::LoadByToken($strToken);
			if (!$objPackage) {
				$objPackage = new Package();
				$this->blnEditMode = false;
				$this->strPageTitle .= 'Create New';
				$this->strHeadline = 'Create a New QPM Package';
			} else {
				if (!$objPackage->IsEditableForPerson(QApplication::$Person)) {
					QApplication::RedirectToLogin();
				}
				$this->blnEditMode = true;
				$this->strPageTitle .= 'Edit Package ' . $objPackage->Token;
				$this->strHeadline = 'Edit Package ' . $objPackage->Token;
			}

			$this->mctPackage = new PackageMetaControl($this, $objPackage);

			$this->txtToken = $this->mctPackage->txtToken_Create();
			$this->txtToken->Required = true;

			$this->lstCategory = $this->mctPackage->lstPackageCategory_Create();
			$this->lstCategory->Required = true;
			// Remove "Issue"
			for ($intIndex = 0; $intIndex < $this->lstCategory->ItemCount; $intIndex++) {
				$objListItem = $this->lstCategory->GetItem($intIndex);
				$objCategory = PackageCategory::Load($objListItem->Value);
				if ($objCategory && ($objCategory->Token == 'issues')) {
					$this->lstCategory->RemoveItem($intIndex);
					break;
				}
			}
				
			
			$this->txtName = $this->mctPackage->txtName_Create();
			$this->txtName->Required = true;
			
			$this->txtDescription = $this->mctPackage->txtDescription_Create();
			$this->txtDescription->Required = true;

			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->Text = ($this->blnEditMode) ? 'Update Package' : 'Save New Package';

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';

			$this->btnOkay->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnOkay));
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxAction('btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			if (!$this->blnEditMode)
				$this->txtToken->Focus();
			else
				$this->txtName->Focus();
		}


		public function Form_Validate($blnToReturn = true) {
			$this->txtToken->Text = Package::SanitizeForToken($this->txtToken->Text);

			$objPackage = Package::LoadByToken($this->txtToken->Text);
			if ($objPackage && ($objPackage->Id != $this->mctPackage->Package->Id)) {
				$this->txtToken->Warning = 'Path already exists';
				$blnToReturn = false;
			} else if (substr($this->txtToken->Text, 0, 6) == 'issue_') {
				$this->txtToken->Warning = 'Invalid path name';
				$blnToReturn = false;
			}

			return parent::Form_Validate($blnToReturn);
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}

		protected function btnOkay_Click() {
			$this->mctPackage->SavePackage();

			if (!$this->blnEditMode) $this->mctPackage->Package->CreateTopicAndTopicLink(QApplication::$Person);

			$this->mctPackage->Package->PackageCategory->RefreshStats();

			QApplication::Redirect('/qpm/package.php/' . $this->mctPackage->Package->Token . '/lastpage');
		}

		protected function btnCancel_Click() {
			if ($this->mctPackage->Package->Id)
				QApplication::Redirect('/qpm/package.php/' . $this->mctPackage->Package->Token);
			else
				QApplication::Redirect('/qpm/');
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>