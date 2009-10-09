<?php
	require('../../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Registration Confirmed';
		protected $intNavBarIndex = 0;
		protected $intSubNavIndex = 0;

		protected $lnkHome;

		protected function Form_Create() {
			parent::Form_Create();

			$this->lnkHome = new RoundedLinkButton($this);
			$this->lnkHome->Text = 'Back to Home';
			$this->lnkHome->LinkUrl = '/';
			$this->lnkHome->AddCssClass('roundedLinkGray');
		}
	}

	QcodoForm::Run('QcodoForm');
?>