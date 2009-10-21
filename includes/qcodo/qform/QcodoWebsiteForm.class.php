<?php
	class QcodoWebsiteForm extends QForm {
		protected $pnlNavBar;
		protected $strPageTitle;
		protected $intNavBarIndex;
		protected $intSubNavIndex;

		protected $strIgnoreJavaScriptFileArray = array(
			'_core/calendar.js',
			'_core/calendar_popup.js',
			'_core/control.js',
			'_core/control_dialog.js',
			'_core/control_handle.js',
			'_core/control_move.js',
			'_core/control_resize.js',
			'_core/control_rollover.js',
			'_core/date_time_picker.js',
			'_core/event.js',
			'_core/listbox.js',
			'_core/logger.js',
			'_core/post.js',
			'_core/qcodo.js',
			'_core/treenav.js');

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