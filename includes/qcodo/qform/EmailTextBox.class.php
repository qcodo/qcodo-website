<?php
	// A subclass of TextBox with its validate method overridden -- Validate will also ensure
	// that the Text is a valid email address

	class EmailTextBox extends QTextBox {
		//////////
		// Methods
		//////////
		public function Validate() {
			if (parent::Validate()) {
				if (strlen(trim($this->strText))) {
					// RegExp taken from php.net
					$this->strText = trim($this->strText);
					$strEmailAddressArray = QEmailServer::GetEmailAddresses($this->strText);
					if ((count($strEmailAddressArray) != 1) ||
						(strtolower($strEmailAddressArray[0]) != strtolower($this->strText))) {
						$this->strValidationError = "Invalid e-mail address";
						return false;
					}
				}
			} else
				return false;

			$this->strValidationError = "";
			return true;
		}
	}
?>