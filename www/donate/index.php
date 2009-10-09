<?php
	require('../../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Development - Donate';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentDonate;

		protected function Form_Create() {
			parent::Form_Create();
		}
	}

	QcodoForm::Run('QcodoForm');
?>