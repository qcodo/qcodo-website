<?php
	class QcodoWebsiteForm extends QForm {
		protected $pnlNavBar;
		protected $strPageTitle;
		protected $intNavBarIndex;
		protected $intSubNavIndex;

		protected $strIgnoreJavaScriptFileArray = array('_core');

		protected function Form_Create() {
			$this->pnlNavBar = new NavBarPanel($this, null, $this->intNavBarIndex, $this->intSubNavIndex);
		}

		protected function Form_Validate($blnToReturn = true) {
			$blnFocused = false;

			foreach ($this->GetErrorControls() as $objControl) {
				// Set Focus to the top-most invalid control
				if (!$blnFocused) {
					$objControl->Focus();
					$blnFocused = true;
				}

				// Blink on ALL invalid controls
				$objControl->Blink();
			}
			
			return $blnToReturn;
		}
	}
	
	QcodoWebsiteForm::$FormStateHandler = 'QSessionFormStateHandler';
	QcodoWebsiteForm::$EncryptionKey = '125r9uqwfjpsk';
?>