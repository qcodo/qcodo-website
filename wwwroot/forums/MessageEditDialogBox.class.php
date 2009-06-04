<?php
	class MessageEditDialogBox extends QDialogBox {
		protected $mctMessage;
		protected $blnEditMode;

		public $txtMessage;
		public $btnOkay;
		public $btnCancel;

		public function __construct($objParent, $strControlId = null) {
			parent::__construct($objParent, $strControlId);

			$this->strTemplate = dirname(__FILE__) . '/MessageEditDialogBox.tpl.php';
			$this->strCssClass = 'dialogbox';
			$this->strWidth = '420px';

			$this->mctMessage = new MessageMetaControl($this, new Message());

			$this->txtMessage = $this->mctMessage->txtMessage_Create('message');
			$this->txtMessage->TextMode = QTextMode::MultiLine;

			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';

			// Define Actions
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->HideDialogBox();
			$this->blnMatteClickable = false;
		}

		public function btnOkay_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->blnEditMode) {
				$this->mctMessage->Message->PostDate = QDateTime::Now();
			}

			$this->mctMessage->SaveMessage();
			$this->mctMessage->Message->RefreshCompiledHtml();
			$this->mctMessage->SaveMessage();

			$this->mctMessage->Message->Topic->RefreshStats();
			$this->mctMessage->Message->Topic->RefreshSearchIndex();
			$this->mctMessage->Message->Forum->RefreshStats();

			$this->objForm->CloseMessageDialog(true, !$this->blnEditMode);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->objForm->CloseMessageDialog();
		}

		public function EditMessage(Message $objMessage) {
			$this->mctMessage->ReplaceObject($objMessage);

			if ($objMessage->Id) {
				$this->blnEditMode = true;
				$this->btnOkay->Text = 'Update My Reply';
			} else {
				$this->blnEditMode = false;
				$this->btnOkay->Text = 'Post My Reply';
			}

			$this->ShowDialogBox();
			$this->txtMessage->Focus();
		}
	}
?>