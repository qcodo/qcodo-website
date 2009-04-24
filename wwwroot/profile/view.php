<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Profile - ';
		protected $objPerson;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->objPerson = Person::LoadByUsername(QApplication::PathInfo(0));
			if (!$this->objPerson)
				QApplication::Redirect('/');
			$this->strPageTitle .= $this->objPerson->DisplayName;
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