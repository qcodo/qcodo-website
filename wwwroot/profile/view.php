<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Profile - ';
		protected $mctPerson;

		protected $lblName;
		protected $lblUsername;
		protected $lblEmail;
		protected $lblLocation;
		protected $lblUrl;
		protected $lblRegistrationDate;
		
		protected $btnEditEmail;
		protected $btnEdit;
		protected $btnPassword;

		protected function Form_Create() {
			parent::Form_Create();
			
			$objPerson = Person::LoadByUsername(QApplication::PathInfo(0));
			if (!$objPerson)
				QApplication::Redirect('/');
			$this->mctPerson = new PersonMetaControl($this, $objPerson);
			$this->strPageTitle .= $objPerson->DisplayName;

			$this->lblName = $this->mctPerson->lblFirstName_Create();
			$this->lblName->Name = 'Name';
			$this->lblName->Text .= ' ' . $this->mctPerson->Person->LastName; 
			
			$this->lblRegistrationDate = $this->mctPerson->lblRegistrationDate_Create(null, 'DDDD M YYYY');
			$this->lblRegistrationDate->Name = 'Member Since';
		}

		public function IsOwner() {
			return (QApplication::$Person && (QApplication::$Person->Id == $this->objPerson->Id));
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>