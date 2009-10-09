<?php
	class TokenTextBox extends QTextBox {
		///////////////////////////
		// Private Member Variables
		///////////////////////////

		// MISC
		protected $strUniqueList = null;

		//////////
		// Methods
		//////////
		public function Validate() {
			$this->strValidationError = "";

			if (parent::Validate()) {
				
				// Blank strings should always validate to true
				// unless this control is "required", in which case
				// parent::validate() would've already caught that
				if (strlen($this->strText) == 0)
					return true;

				if (strlen($this->strText)) {
					$strMatchesArray = null;
					if (preg_match("/[A-Za-z0-9]+/", $this->strText, $strMatchesArray)) {
						if ($strMatchesArray[0] == $this->strText) {
							// We Matched -- Now Check for Duplicates
							$strListArray = explode(" ", $this->strUniqueList);
							$strKey = array_search($this->strText, $strListArray);
							if (strlen($strKey) == 0) {
								return true;
							}
							
							$this->strValidationError = "Token already exists";
							return false;
						}
					}
				}

				$this->strValidationError = "Must only contain AlphaNumeric characters";
				return false;
			}
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// MISC
				case "UniqueList": return $this->strUniqueList;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			switch ($strName) {
				// MISC
				case "UniqueList":
					try {
						$this->strUniqueList = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>