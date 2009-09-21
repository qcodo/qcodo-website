<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Wiki';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected function Form_Create() {
			parent::Form_Create();
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>