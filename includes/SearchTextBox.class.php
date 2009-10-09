<?php
	class SearchTextBox extends QTextBox {
		protected $strCssClassForDiv = 'searchTextBox';
		protected $strJavaScripts = 'control_searchtextbox.js';
		protected $blnRequired = true;

		protected function GetControlHtml() {
			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf('style="%s"', $strStyle);

			$strToReturn = sprintf('<div class="%s">', $this->strCssClassForDiv);
			$strToReturn .= sprintf('<a href="#" id="%s_searchlink"><img src="/images/search.png"/ title="Enter Search Term"></a>', $this->strControlId);
			$strToReturn .= sprintf('<input type="text" name="%s" id="%s" value="' . $this->strFormat . '" %s%s />',
				$this->strControlId,
				$this->strControlId,
				QApplication::HtmlEntities($this->strText),
				$this->GetAttributes(),
				$strStyle);
			$strToReturn .= sprintf('<a href="#" id="%s_cancellink"><img src="/images/search_cancel.png" title="Clear Search Term"/></a>', $this->strControlId);
			$strToReturn .= '</div>';

			return $strToReturn;
		}

		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			if ($this->blnVisible) {
				$strToReturn .= sprintf('qc.regSTB("%s"); ', $this->strControlId);
			}
			return $strToReturn;
		}
	}
?>