<?php
	class QTextStyleState extends QBaseClass {
		protected $intState;
		protected $strBuffer;

		public function __construct($intState, $strBuffer) {
			$this->intState = $intState;
			$this->strBuffer = $strBuffer;
		}

		public function __get($strName) {
			switch ($strName) {
				case 'State': return $this->intState;
				case 'Buffer': return $this->strBuffer;
				default:
					try { return parent::__get($strName); } catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}
	}
?>