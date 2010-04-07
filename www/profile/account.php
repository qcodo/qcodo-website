<?php
	require('../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Edit My Account';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $mctPerson;
		protected $txtUsername;
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtEmail;

		protected $lstPersonType;
		protected $chkDonatedFlag;

		protected $btnUpdate;
		protected $btnCancel;

		protected function Form_Create() {
			parent::Form_Create();

			// Define MetaControl on the Person Object we are editing
			$objPerson = null;

			// Administrators are able to edit anyone's profile
			if ((QApplication::$Person->PersonTypeId == PersonType::Administrator) &&
				($strUsername = QApplication::PathInfo(0))) {
				$objPerson = Person::LoadByUsername($strUsername);
			}

			// Everyone else will just be allowed to edit themselves
			if (!$objPerson) $objPerson = QApplication::$Person;

			// Define the MetaControl, itself
			$this->mctPerson = new PersonMetaControl($this, $objPerson);

			// Update the Page Title if Not Editing Myself (for administrators)
			if (QApplication::$Person->Id != $this->mctPerson->Person->Id) {
				$this->strPageTitle = 'Edit Account - ' . $this->mctPerson->Person->DisplayName;
			}

			// Define Controls
			$this->txtUsername = $this->mctPerson->txtUsername_Create('username');
			$this->txtFirstName = $this->mctPerson->txtFirstName_Create('firstName');
			$this->txtLastName = $this->mctPerson->txtLastName_Create('lastName');
			$this->txtEmail = $this->mctPerson->txtEmail_Create('email');

			if (QApplication::$Person->PersonTypeId == PersonType::Administrator) {
				$this->lstPersonType = $this->mctPerson->lstPersonType_Create('role');
				$this->chkDonatedFlag = $this->mctPerson->chkDonatedFlag_Create('donated');

				if ($this->mctPerson->Person->Id == QApplication::$Person->Id)
					$this->lstPersonType->Enabled = false;
			}

			// Define Buttons
			$this->btnUpdate = new QButton($this);
			$this->btnUpdate->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->LinkUrl = $this->mctPerson->Person->ViewProfileUrl;

			// Add Actions
			$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));

			// Initial Focus
			$this->txtUsername->Focus();
		}

		protected function Form_Validate($blnToReturn = true) {
			// Check Username
			if (($strUsername = trim($this->txtUsername->Text)) &&
				($objPerson = Person::LoadByUsername($strUsername)) &&
				($objPerson->Id != $this->mctPerson->Person->Id)) {
				$this->txtUsername->Warning = 'Username already taken';
				$blnToReturn = false;
			}

			if (trim(strlen($this->txtUsername->Text)) < 6) {
				$this->txtUsername->Warning = 'Username must be at least 6 alphanumeric characters';
				$blnToReturn = false;
			}

			// Is Email Taken?
			if (($objPerson = Person::LoadByEmail(trim(strtolower($this->txtEmail->Text)))) &&
				($objPerson->Id != $this->mctPerson->Person->Id)) {
				$this->txtEmail->Warning = 'Email is already taken';
				$blnToReturn = false;
			}

			return parent::Form_Validate($blnToReturn);
		}

		protected function btnUpdate_Click($strFormId, $strControlId, $strParameter) {
			$this->mctPerson->SavePerson();
			$this->mctPerson->Person->RefreshDisplayName();
			QApplication::Redirect($this->mctPerson->Person->ViewProfileUrl);
		}
	}

	QcodoForm::Run('QcodoForm');
?>