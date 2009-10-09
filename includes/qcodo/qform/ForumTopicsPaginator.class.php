<?php
	class ForumTopicsPaginator extends QPaginatorBase {
		// APPEARANCE
		protected $strLabelForPrevious;
		protected $strLabelForNext;

		protected $strCssClass = 'paginatorTextbox';

		//////////
		// Methods
		//////////
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);

			$this->strLabelForPrevious = QApplication::Translate('Prev');
			$this->strLabelForNext = QApplication::Translate('Next');
		}

		public function GetControlHtml() {
			$this->objPaginatedControl->DataBind();

			$strStyle = $this->GetStyleAttributes();
			if ($strStyle)
				$strStyle = sprintf(' style="%s"', $strStyle);

			$strToReturn = sprintf('<span id="%s" %s%s>', $this->strControlId, $strStyle, $this->GetAttributes(true, false));

			// Prev (-10)
			if ($this->intPageNumber <= 10)
				$strToReturn .= sprintf('<span class="arrow">-10</span>');
			else {
				$this->strActionParameter = $this->intPageNumber - 10;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>-10</a></span>',
					$this->GetActionAttributes());
			}

			// Prev (-5)
			if ($this->intPageNumber <= 5)
				$strToReturn .= sprintf('<span class="arrow">-5</span>');
			else {
				$this->strActionParameter = $this->intPageNumber - 5;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>-5</a></span>',
					$this->GetActionAttributes());
			}

			// Prev (-1)
			if ($this->intPageNumber <= 1)
				$strToReturn .= sprintf('<span class="arrow">%s</span>', $this->strLabelForPrevious);
			else {
				$this->strActionParameter = $this->intPageNumber - 1;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>%s</a></span>',
					$this->GetActionAttributes(), $this->strLabelForPrevious);
			}

			$strToReturn .= '<span class="break">|</span>';
			$strToReturn .= sprintf(' %s / %s ', $this->intPageNumber, $this->PageCount);
			$strToReturn .= '<span class="break">|</span>';

			// Next (+1)
			if (($this->intPageNumber + 1) > $this->PageCount)
				$strToReturn .= sprintf('<span class="arrow">%s</span>', $this->strLabelForNext);
			else {
				$this->strActionParameter = $this->intPageNumber + 1;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>%s</a></span>',
					$this->GetActionAttributes(), $this->strLabelForNext);
			}

			// Next (+5)
			if (($this->intPageNumber + 5) > $this->PageCount)
				$strToReturn .= sprintf('<span class="arrow">+5</span>');
			else {
				$this->strActionParameter = $this->intPageNumber + 5;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>+5</a></span>',
					$this->GetActionAttributes());
			}

			// Next (+10)
			if (($this->intPageNumber + 10) > $this->PageCount)
				$strToReturn .= sprintf('<span class="arrow">+10</span>');
			else {
				$this->strActionParameter = $this->intPageNumber + 10;
				$strToReturn .= sprintf('<span class="arrow"><a href="" %s>+10</a></span>',
					$this->GetActionAttributes());
			}

			$strToReturn .= '</span>';

			return $strToReturn;
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				case 'LabelForNext':
					return $this->strLabelForNext;
				case 'LabelForPrevious':
					return $this->strLabelForPrevious;

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
				case 'LabelForNext':
					try {
						return ($this->strLabelForNext = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				case 'LabelForPrevious':
					try {
						return ($this->strLabelForPrevious = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>