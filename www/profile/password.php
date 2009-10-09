<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Change My Password';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $txtOldPassword;
		protected $txtNewPassword;
		protected $txtConfirmPassword;

		protected $btnUpdate;
		protected $btnCancel;

		protected function Form_Create() {
			parent::Form_Create();

			// Define Controls
			$this->txtOldPassword = new QTextBox($this, 'oldPassword');
			$this->txtOldPassword->Name = 'Current Password';
			$this->txtOldPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtOldPassword->TextMode = QTextMode::Password;
			$this->txtOldPassword->Required = true;

			$this->txtNewPassword = new QTextBox($this, 'password');
			$this->txtNewPassword->Name = 'New Password';
			$this->txtNewPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtNewPassword->TextMode = QTextMode::Password;
			$this->txtNewPassword->Required = true;
			
			$this->txtConfirmPassword = new QTextBox($this, 'confirmPassword');
			$this->txtConfirmPassword->Name = 'Confirm';
			$this->txtConfirmPassword->MaxLength = Person::PasswordMaxLength;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;
			$this->txtConfirmPassword->Required = true;
			
			// Define Buttons
			$this->btnUpdate = new QButton($this);
			$this->btnUpdate->CausesValidation = true;

			if (!QApplication::$Person->PasswordResetFlag) {
				$this->btnCancel = new QLinkButton($this);
				$this->btnCancel->LinkUrl = QApplication::$Person->ViewProfileUrl;
			}

			// Add Actions
			$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));
			
			// Initial Focus
			$this->txtOldPassword->Focus();
		}

		protected function Form_Validate($blnToReturn = true) {
			// Check Password Confirm
			if ($this->txtNewPassword->Text != $this->txtConfirmPassword->Text) {
				$this->txtConfirmPassword->Warning = 'Does not match';
				$blnToReturn = false;
			}

			// Check Old Password
			if (!QApplication::$Person->IsPasswordValid($this->txtOldPassword->Text)) {
				$this->txtOldPassword->Warning = 'Invalid Password';
				$blnToReturn = false;
			}

			return parent::Form_Validate($blnToReturn);
		}

		protected function btnUpdate_Click($strFormId, $strControlId, $strParameter) {
			QApplication::$Person->SetPassword($this->txtNewPassword->Text);
			QApplication::$Person->PasswordResetFlag = false;
			QApplication::$Person->Save();
			if (array_key_exists('strReferer', $_GET)) {
				QApplication::Redirect($_GET['strReferer']);
			} else {
				QApplication::Redirect(QApplication::$Person->ViewProfileUrl);
			}
		}
	}

	QcodoForm::Run('QcodoForm');
?>