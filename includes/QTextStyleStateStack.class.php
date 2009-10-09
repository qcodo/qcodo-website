<?php
	class QTextStyleStateStack extends QBaseClass {
		private $intStateArray = array();
		private $strBufferArray = array();

		public function Push($intState, $strBuffer = null) {
			$this->intStateArray[] = $intState;
			$this->strBufferArray[] = $strBuffer;
		}

		public function AddToTopBuffer($strContent) {
			$this->strBufferArray[count($this->strBufferArray) - 1] .= $strContent;
		}

		/**
		 * Looks up the top-most stack position for the given state or states
		 * @param mixed $mixState can either be a state or an array of states
		 * @return integer representing the position of the Stack where the state exists, or false if none
		 */
		public function GetStackPosition($mixState) {
			if (is_array($mixState)) {
				for ($intPosition = $this->Size() - 1; $intPosition >= 0; $intPosition--) {
					foreach ($mixState as $intState) {
						if ($this->Peek($intPosition)->State == $intState)
							return $intPosition;
					}
				}
			} else {
				$intState = $mixState;

				for ($intPosition = $this->Size() - 1; $intPosition >= 0; $intPosition--) {
					if ($this->Peek($intPosition)->State == $intState)
						return $intPosition;
				}
			}

			// If we're here, the state wasn't found on the stack.
			return false;
		}

		public function Pop() {
			if (!$this->IsEmpty()) {
				$intState = array_pop($this->intStateArray);
				$strBuffer = array_pop($this->strBufferArray);
				return new QTextStyleState($intState, $strBuffer);
			} else
				throw new QCallerException("Cannot pop off of an empty Stack");
		}

		public function Peek($intIndex) {
			if (array_key_exists($intIndex, $this->intStateArray)) {
				$intState = $this->intStateArray[$intIndex];
				$strBuffer = $this->strBufferArray[$intIndex];
				return new QTextStyleState($intState, $strBuffer);
			} else
				throw new QIndexOutOfRangeException($intIndex, "Index on stack does not exist");
		}

		public function PeekTop() {
			if ($intCount = count($this->intStateArray))
				return $this->Peek($intCount - 1);
			else
				throw new QIndexOutOfRangeException($intCount - 1, "Stack is empty");
		}

		public function IsEmpty() {
			return (count($this->intStateArray) == 0);
		}

		public function Size() {
			return count($this->intStateArray);
		}
	}
?>