<?php
	// A subclass of TextBox with its validate method overridden -- Validate will also ensure
	// that the Text is a valid email address

	class EmailTextBox extends QTextBox {
		//////////
		// Methods
		//////////
		public function Validate() {
			if (parent::Validate()) {
				if ($this->strText != "") {
					// RegExp taken from php.net
					if ( !eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*"."@([a-z0-9]+([\.-][a-z0-9]{1,})+)*$", $this->strText) ) {
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