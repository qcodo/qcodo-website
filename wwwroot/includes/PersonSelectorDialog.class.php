<?php
	class PersonSelectorDialog extends QDialogBox {
		public $txtMemberSearch;
		public $dtrResults;
		public $pxyName;
		public $btnCancel;

		public $strMethodCallback;

		public function __construct($objParentObject, $strMethodCallback, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			$this->strMethodCallback = $strMethodCallback;
			
			$this->strTemplate = dirname(__FILE__) . '/PersonSelectorDialog.tpl.php';
			$this->MatteClickable = false;
			$this->HideDialogBox();

			$this->txtMemberSearch = new QTextBox($this);
			$this->txtMemberSearch->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtMemberSearch_Enter'));
			$this->txtMemberSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->dtrResults = new QDataRepeater($this);
			$this->dtrResults->SetDataBinder('dtrResults_Bind', $this);
			$this->dtrResults->Template = dirname(__FILE__) . '/dtrPersonSelectorResults.tpl.php';
			$this->dtrResults->CssClass = 'dtrPersonSelectorResults';

			$this->pxyName = new QControlProxy($this);
			$this->pxyName->AddAction(new QMouseOverEvent(), new QJavaScriptAction("this.className='hover';"));
			$this->pxyName->AddAction(new QMouseOutEvent(), new QJavaScriptAction("this.className='';"));
			$this->pxyName->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyName_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function txtMemberSearch_Enter() {
			$this->dtrResults->Visible = true;
		}

		public function btnCancel_Click() {
			$this->txtMemberSearch->Text = null;
			$this->HideDialogBox();
		}

		public function pxyName_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = Person::Load($strParameter);
			$strMethodCallback = $this->strMethodCallback;
			if ($this->objParentControl) $this->objParentControl->$strMethodCallback($objPerson);
			else $this->objForm->$strMethodCallback($objPerson);
			$this->HideDialogBox();
		}

		public function dtrResults_Bind() {
			if (trim($this->txtMemberSearch->Text)) {
				$objArray = array(null);
				$objArray = array_merge(
					$objArray,
					Person::LoadArrayForMemberSearch(trim($this->txtMemberSearch->Text), array(QQ::OrderBy(QQN::Person()->DisplayName)))
				);
				$this->dtrResults->DataSource = $objArray;
			} else {
				$this->dtrResults->DataSource = array(null);
			}
		}
	}
?>