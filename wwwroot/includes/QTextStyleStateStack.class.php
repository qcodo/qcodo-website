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

		public function PeekLast() {
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