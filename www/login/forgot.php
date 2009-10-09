<?php
	require('../../includes/prepend.inc.php');
	QApplication::LogoutPerson();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Log In';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $txtEmail;
		protected $btnSend;

		protected $dlgResult;
		protected $btnOkay;

		protected $lnkRegister;
		protected $lnkLogin;

		protected function Form_Create() {
			parent::Form_Create();

			// Define Controls
			$this->txtEmail = new EmailTextBox($this,'email');
			$this->txtEmail->Name = 'Email';
			$this->txtEmail->MaxLength = Person::EmailMaxLength;
			$this->txtEmail->Required = true;
			$this->txtEmail->CausesValidation = true;
			
			$this->btnSend = new QButton($this);
			$this->btnSend->Text = 'Reset My Password';
			$this->btnSend->Name = '&nbsp;';
			$this->btnSend->CausesValidation = true;

			$this->lnkRegister = new RoundedLinkButton($this);
			$this->lnkRegister->Text = 'Register';
			$this->lnkRegister->LinkUrl = '/register/';
			$this->lnkRegister->AddCssClass('roundedLinkGray');

			$this->lnkLogin = new RoundedLinkButton($this);
			$this->lnkLogin->Text = 'Login';
			$this->lnkLogin->LinkUrl = '/login/';
			$this->lnkLogin->AddCssClass('roundedLinkGray');
			
			// Add Actions
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSend_Click'));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnSend->AddAction(new QClickEvent(), new QAjaxAction('btnSend_Click'));

			// Initial Focus
			$this->txtEmail->Focus();

			// Result
			$this->dlgResult = new QDialogBox($this);
			$this->dlgResult->Text = '<h1>Password Reset</h1><p>Your username and new password should be emailed to you within the next few minutes.</p>' .
				'<p class="hint">Note that <strong>Qcodo.com</strong> emails could also show up in your <strong>SPAM</strong> or <strong>Junk Mail</strong> folder.</p><br/>';
			$this->dlgResult->MatteClickable = false;
			$this->dlgResult->AutoRenderChildren = true;
			$this->dlgResult->HideDialogBox();
			$this->dlgResult->CssClass = 'dialogbox';

			$this->btnOkay = new QButton($this->dlgResult);
			$this->btnOkay->Text = 'Okay';
			$this->btnOkay->AddAction(new QClickEvent(), new QServerAction('btnOkay_Click'));
		}

		protected function btnOkay_Click($strFormId, $strControlId, $strParameter) {
			if (array_key_exists('strReferer', $_GET))
				QApplication::Redirect('/login?strReferer=' . urlencode($_GET['strReferer']));
			else
				QApplication::Redirect('/login/');
		}

		protected function btnSend_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = Person::LoadByEmail(trim(strtolower($this->txtEmail->Text)));
			if (!$objPerson) {
				$this->txtEmail->Warning = 'Email does not exist';

				// Call Form_Validate() to do that blinking thing
				$this->Form_Validate();
				return;
			}

			$objPerson->ResetPassword();
			$this->dlgResult->ShowDialogBox();
		}
	}

	QcodoForm::Run('QcodoForm');
?>