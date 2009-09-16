<?php
	class PersonSelectorDialog extends QDialogBox {
		public $txtMemberSearch;
		public $btnCancel;
		
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			$this->strTemplate = dirname(__FILE__) . '/PersonSelectorDialog.tpl.php';
			$this->MatteClickable = false;
			$this->HideDialogBox();
			
			$this->txtMemberSearch = new QTextBox($this);
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		public function btnCancel_Click() {
			$this->txtMemberSearch->Text = null;
			$this->HideDialogBox();
		}
	}
?>