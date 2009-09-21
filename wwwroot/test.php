<?php
	require('includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Home';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutHome;

		protected function Form_Create() {
			$this->intNavBarIndex = QApplication::PathInfo(0);
			$this->intSubNavIndex = QApplication::PathInfo(1);
			parent::Form_Create();
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>