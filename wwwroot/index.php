<?php
	require('includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Home';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutHome;

		protected function Form_Create() {
			parent::Form_Create();
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>