<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Edit My Profile';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $mctPerson;

		protected $lstTimezone;
		protected $chkDisplayRealNameFlag;
		protected $chkDisplayEmailFlag;
		protected $chkOptInFlag;
		protected $txtLocation;
		protected $lstCountry;
		protected $txtUrl;

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
				$this->strPageTitle = 'Edit Profile - ' . $this->mctPerson->Person->DisplayName;
			}

			// Define Controls
			$this->lstTimezone = $this->mctPerson->lstTimezone_Create('timezone');

			$this->chkDisplayRealNameFlag = $this->mctPerson->chkDisplayRealNameFlag_Create('realName');
			$this->chkDisplayEmailFlag = $this->mctPerson->chkDisplayEmailFlag_Create('displayEmail');
			$this->chkOptInFlag = $this->mctPerson->chkOptInFlag_Create('optIn');

			$this->txtLocation = $this->mctPerson->txtLocation_Create('location');
			$this->lstCountry = $this->mctPerson->lstCountry_Create('country');
			$this->txtUrl = $this->mctPerson->txtUrl_Create('url');

			// Define Buttons
			$this->btnUpdate = new QButton($this);
			$this->btnUpdate->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->LinkUrl = $this->mctPerson->Person->ViewProfileUrl;

			// Add Actions
			$this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));

			// Initial Focus
			$this->lstTimezone->Focus();
		}

		protected function btnUpdate_Click($strFormId, $strControlId, $strParameter) {
			$this->mctPerson->SavePerson();
			QApplication::Redirect($this->mctPerson->Person->ViewProfileUrl);
		}
	}

	QcodoForm::Run('QcodoForm');
?>