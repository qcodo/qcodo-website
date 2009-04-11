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

		protected $btnRegister;
		protected $chkRemember;
		
		protected $lnkLogin;

		protected function Form_Create() {
			parent::Form_Create();

			// Define MetaControl
			$this->mctPerson = new PersonMetaControl($this, new Person());

			// Define Controls
			$this->txtUsername = $this->mctPerson->txtUsername_Create();
			$this->txtUsername->Instructions = '6 - 20 alphanumeric characters';

			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password';
			$this->txtPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->CausesValidation = true;
			
			$this->txtConfirmPassword = new QTextBox($this);
			$this->txtConfirmPassword->Name = 'Confirm';
			$this->txtConfirmPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;
			$this->txtConfirmPassword->Required = true;
			$this->txtConfirmPassword->CausesValidation = true;
			
			$this->txtFirstName = $this->mctPerson->txtFirstName_Create();
			$this->txtLastName = $this->mctPerson->txtLastName_Create();
			$this->txtEmail = $this->mctPerson->txtEmail_Create();
			
			$this->btnRegister = new QButton($this);
			$this->btnRegister->Text = 'Register';
			$this->btnRegister->Name = '&nbsp;';
			$this->btnRegister->CausesValidation = true;

			$this->chkRemember = new QCheckBox($this);
			$this->chkRemember->HtmlEntities = false;

			$this->lnkLogin = new RoundedLinkButton($this);
			$this->lnkLogin->Text = 'Login';
			$this->lnkLogin->LinkUrl = '/login/';
			$this->lnkLogin->AddCssClass('roundedLinkGray');
			
			// Add Actions
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtPassword));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRegister_Click'));
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnRegister->AddAction(new QClickEvent(), new QAjaxAction('btnRegister_Click'));

			// Initial Focus
			$this->txtUsername->Focus();
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = Person::LoadByUsername(trim(strtolower($this->txtUsername->Text)));
			if ($objPerson && $objPerson->IsPasswordValid($this->txtPassword->Text)) {
				QApplication::LoginPerson($objPerson);
				
				if ($this->chkRemember->Checked)
					QApplication::SetLoginTicketToCookie($objPerson);

				QApplication::Redirect('/');
			}

			// If we're here, either the username and/or password is not valid
			$this->txtUsername->Warning = 'Invalid username or password';
			$this->txtPassword->Text = null;
			
			// Call Form_Validate() to do that blinking thing
			$this->Form_Validate();
		}
	}

	QcodoForm::Run('QcodoForm');
?>