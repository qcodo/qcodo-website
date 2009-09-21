<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $btnButton;
		protected $lblMessage;

		protected function Form_Create() {
			parent::Form_Create();

			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'Click the Button';

			$this->btnButton = new QButton($this);
			$this->btnButton->Text = 'Test';
			$this->btnButton->AddAction(new QClickEvent(), new QAjaxAction('btnButton_Click'));
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>