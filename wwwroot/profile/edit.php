<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Edit My Profile';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $mctPerson;

		protected $chkDisplayRealNameFlag;
		protected $chkOptInFlag;
		protected $txtLocation;
		protected $lstCountry;
		protected $txtUrl;

		protected $btnUpdate;
		protected $btnCancel;

		protected function Form_Create() {
			parent::Form_Create();

			// Define MetaControl
			$this->mctPerson = new PersonMetaControl($this, QApplication::$Person);

			// Define Controls
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

			$this->btnUpdate = new QButton($this);
			$this->btnUpdate->Text = 'Update';
			$this->btnUpdate->Name = '&nbsp;';
			$this->btnUpdate->CausesValidation = true;
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->Name = '&nbsp;';
			$this->btnCancel->LinkUrl = '/profile/';

			// Add Actions
			$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));

			// Initial Focus
//			$this->txtUsername->Focus();
		}

		protected function btnUpdate_Click($strFormId, $strControlId, $strParameter) {
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