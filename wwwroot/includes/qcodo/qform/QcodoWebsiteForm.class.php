<?php
	class QcodoWebsiteForm extends QForm {
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
?>