<?php
	/**
	 * This is a SAMPLE of a custom QControl that you could write.  Think of this as a "starting point".
	 * Remember: EVERYTHING here is meant to be customized!  To use, simply make a copy of this file,
	 * rename the file, and edit the renamed file.  Remember to specify a control Class name which matches the
	 * name of your file.  And then implement your own logic for GetControlHtml().
	 * 
	 * Additionally, you can add customizable logic for any or all of the following, as well:
	 *  - __construct()
	 *  - ParsePostData()
	 *  - Validate()
	 *  - GetEndScript()
	 *  - GetEndHtml()
	 */
	class RoundedLinkButton extends QLinkButton {
		protected $strCssClass = 'roundedLink';
		protected $blnIsBlockElement = true;

		protected $strLinkUrl = '#';

		/**
		 * Get the HTML for this Control.
		 * @return string
		 */
		public function GetControlHtml() {
			// Pull any Attributes
			$strAttributes = $this->GetAttributes();

			// Pull any styles
			if ($strStyle = $this->GetStyleAttributes())
				$strStyle = 'style="' . $strStyle . '"';

			$strToReturn = sprintf('<a href="%s" id="%s" %s%s><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div><div class="f">%s</div><div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div></a>',
				$this->strLinkUrl,
				$this->strControlId,
				$strAttributes,
				$strStyle,
				($this->blnHtmlEntities) ? 
					QApplication::HtmlEntities($this->strText) :
					$this->strText);

			// Return the HTML.
			return $strToReturn;
		}

		/**
		 * Constructor for this control
		 * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
		 * @param string $strControlId optional control ID
		 */
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				case 'LinkUrl': return $this->strLinkUrl;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {

				case 'LinkUrl': 
					try {
						return ($this->strLinkUrl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}
	}
?>