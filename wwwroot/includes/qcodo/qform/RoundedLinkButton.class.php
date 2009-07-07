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

		/**
		 * Get the HTML for this Control.
		 * @return string
		 */
		public function GetControlHtml() {
			// Pull any Attributes
			$strAttributes = $this->GetAttributes(true, false);
			$strActions = $this->GetActionAttributes();

			// Pull any styles
			if ($strStyle = $this->GetStyleAttributes())
				$strStyle = 'style="' . $strStyle . '"';

			$strToReturn = sprintf('<div %s %s id="%s"><a href="%s" %s>%s</a></div>',
				$strStyle,
				$strAttributes,
				$this->strControlId,
				$this->strLinkUrl,
				$strActions,
				($this->blnHtmlEntities) ? 
					QApplication::HtmlEntities($this->strText) :
					$this->strText);

			// Return the HTML.
			return $strToReturn;
		}
	}
?>