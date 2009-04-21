<?php
	require('../includes/prepend.inc.php');
	QApplication::LogoutPerson();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Register';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $mctPerson;
		
		protected $txtUsername;
		protected $txtPassword;
		protected $txtConfirmPassword;

		protected $txtFirstName;
		protected $txtLastName;
		protected $txtEmail;

		protected $chkDisplayRealNameFlag;
		protected $chkOptInFlag;
		protected $txtLocation;
		protected $lstCountry;
		protected $txtUrl;

		protected $btnRegister;
		
		protected $lnkLogin;

		protected function Form_Create() {
			parent::Form_Create();

			// Define MetaControl
			$this->mctPerson = new PersonMetaControl($this, new Person());

			// Define Controls
			$this->txtUsername = $this->mctPerson->txtUsername_Create('username');
			$this->txtUsername->Instructions = '6 - 20 alphanumeric characters';

			$this->txtPassword = new QTextBox($this, 'password');
			$this->txtPassword->Name = 'Password';
			$this->txtPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->CausesValidation = true;
			
			$this->txtConfirmPassword = new QTextBox($this, 'confirmPassword');
			$this->txtConfirmPassword->Name = 'Confirm';
			$this->txtConfirmPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;
			$this->txtConfirmPassword->Required = true;
			$this->txtConfirmPassword->CausesValidation = true;
			
			$this->txtFirstName = $this->mctPerson->txtFirstName_Create('firstName');
			$this->txtLastName = $this->mctPerson->txtLastName_Create('lastName');
			$this->txtEmail = $this->mctPerson->txtEmail_Create('email');
			$this->txtEmail->Instructions = 'You hate SPAM.  So do we.<br/>We will NEVER release your information to anyone. Period.';

			$this->chkDisplayRealNameFlag = $this->mctPerson->chkDisplayRealNameFlag_Create('realName');
			$this->chkOptInFlag = $this->mctPerson->chkOptInFlag_Create('optIn');
			
			$this->txtLocation = $this->mctPerson->txtLocation_Create('location');
			$this->txtLocation->Name = 'Your Location';
			$this->txtLocation->Instructions = 'e.g., "Sunnyvale, CA"';
			
			$this->lstCountry = $this->mctPerson->lstCountry_Create('country');
			$this->lstCountry->Name = 'Display Country Flag';

			$this->txtUrl = $this->mctPerson->txtUrl_Create('url');
			$this->txtUrl->Name = 'Website URL';
			$this->txtUrl->Instructions = 'Be sure and include "http://"';

			$this->btnRegister = new QButton($this);
			$this->btnRegister->Text = 'Register';
			$this->btnRegister->Name = '&nbsp;';
			$this->btnRegister->CausesValidation = true;

			$this->lnkLogin = new RoundedLinkButton($this);
			$this->lnkLogin->Text = 'Login';
			$this->lnkLogin->LinkUrl = '/login/';
			$this->lnkLogin->AddCssClass('roundedLinkGray');

			// Add Actions
			$this->btnRegister->AddAction(new QClickEvent(), new QAjaxAction('btnRegister_Click'));

			// Initial Focus
			$this->txtUsername->Focus();
		}
		
		protected function Form_Validate($blnToReturn = true) {
			// Check Username
			if (($strUsername = trim($this->txtUsername->Text)) &&
				Person::LoadByUsername($strUsername)) {
				$this->txtUsername->Warning = 'Username already taken';
				$blnToReturn = false;
			}

			if (trim(strlen($this->txtUsername->Text)) < 6) {
				$this->txtUsername->Warning = 'Username must be at least 6 alphanumeric characters';
				$blnToReturn = false;
			}

			// Check Password
			if ($this->txtPassword->Text != $this->txtConfirmPassword->Text) {
				$this->txtConfirmPassword->Warning = 'Does not match';
				$blnToReturn = false;
			}

			// Is Email Taken?
			if (Person::LoadByEmail(trim(strtolower($this->txtEmail->Text)))) {
				$this->txtEmail->Warning = 'Email is already taken';
				$blnToReturn = false;
			}

			return parent::Form_Validate($blnToReturn);
		}

		protected function btnRegister_Click($strFormId, $strControlId, $strParameter) {
			$this->mctPerson->Person->RegistrationDate = QDateTime::Now();
			$this->mctPerson->Person->PersonTypeId = PersonType::ForumsUser;

			$this->mctPerson->Person->SetPassword($this->txtPassword->Text);
			$this->mctPerson->SavePerson();

			QApplication::LoginPerson($this->mctPerson->Person);
			QApplication::Redirect('/register/confirmed.php');
		}
	}

	QcodoForm::Run('QcodoForm');
?>