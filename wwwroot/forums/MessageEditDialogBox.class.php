<?php
	class MessageEditDialogBox extends QDialogBox {
		protected $mctMessage;
		protected $blnEditMode;

		public $lblHeading;
		public $lstForum;
		public $txtTopicName;
		public $txtMessage;
		public $btnOkay;
		public $btnCancel;

		public function __construct($objParent, $strControlId = null) {
			parent::__construct($objParent, $strControlId);

			$this->strTemplate = dirname(__FILE__) . '/MessageEditDialogBox.tpl.php';
			$this->strCssClass = 'dialogbox';
			$this->strWidth = '420px';

			$this->mctMessage = new MessageMetaControl($this, new Message());

			$this->lblHeading = new QLabel($this);
			$this->lblHeading->TagName = 'h3';
			$this->lblHeading->SetCustomStyle('margin', '0');
			
			$this->lstForum = new QListBox($this);

			$this->txtTopicName = new QTextBox($this);
			$this->txtTopicName->Name = 'Topic Name';
			$this->txtTopicName->Required = true;

			$this->txtMessage = $this->mctMessage->txtMessage_Create('message');
			$this->txtMessage->TextMode = QTextMode::MultiLine;
			$this->txtMessage->Required = true;
			
			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = QCausesValidation::SiblingsOnly;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';

			// Define Actions
			$this->txtTopicName->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtMessage));
			$this->txtTopicName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->HideDialogBox();
			$this->blnMatteClickable = false;
		}

		public function btnOkay_Click($strFormId, $strControlId, $strParameter) {
			$blnNewTopic = false;

			// Setup stuff if it's a NEW message being posted (either a NEW response or a NEW topic)
			if (!$this->blnEditMode) {
				$this->mctMessage->Message->PostDate = QDateTime::Now();

				// For new topics, create the topic first!
				if (!$this->mctMessage->Message->Topic) {
					$objTopic = new Topic();
					$objTopic->ForumId = $this->lstForum->SelectedValue;
					$objTopic->Name = $this->txtTopicName->Text;
					$objTopic->Person = QApplication::$Person;
					$objTopic->LastPostDate = $this->mctMessage->Message->PostDate;
					$objTopic->Save();
					
					$this->mctMessage->Message->ForumId = $this->lstForum->SelectedValue;
					$this->mctMessage->Message->Topic = $objTopic;
					
					$blnNewTopic = true;
				}
			}

			// Save Everything Else
			$this->mctMessage->SaveMessage();
			$this->mctMessage->Message->RefreshCompiledHtml();
			$this->mctMessage->SaveMessage();

			// Refresh Stats and Stuff
			$this->mctMessage->Message->Topic->RefreshStats();
			$this->mctMessage->Message->Topic->RefreshSearchIndex();
			$this->mctMessage->Message->Forum->RefreshStats();

			// Redirect if it's a NEW TOPIC
			if ($blnNewTopic)
				QApplication::Redirect(sprintf('/forums/forum.php/%s/%s/', $this->mctMessage->Message->ForumId, $this->mctMessage->Message->TopicId));
			else
				$this->objForm->CloseMessageDialog(true, !$this->blnEditMode);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->objForm->CloseMessageDialog();
		}

		public function EditMessage(Message $objMessage) {
			$this->mctMessage->ReplaceObject($objMessage);
			$this->ShowDialogBox();

			if ($objMessage->TopicId) {
				$this->lblHeading->Text = 'Respond to Current Message';

				$this->lstForum->RemoveAllItems();
				$this->lstForum->AddItem($objMessage->Forum->Name);
				$this->lstForum->Enabled = false;

				$this->txtTopicName->Text = $objMessage->Topic->Name;
				$this->txtTopicName->Enabled = false;

				if ($objMessage->Id) {
					$this->blnEditMode = true;
					$this->btnOkay->Text = 'Update My Reply';
				} else {
					$this->blnEditMode = false;
					$this->btnOkay->Text = 'Post My Reply';
				}
				
				$this->txtMessage->Focus();
			} else {
				$this->lblHeading->Text = 'Post a New Topic';
				
				$this->lstForum->RemoveAllItems();
				foreach (Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber)) as $objForum) {
					if ($objForum->CanUserPost(QApplication::$Person))
						$this->lstForum->AddItem($objForum->Name, $objForum->Id, $objForum->Id == $objMessage->ForumId);
				}
				$this->lstForum->Enabled = true;

				$this->txtTopicName->Text = null;
				$this->txtTopicName->Enabled = true;

				$this->blnEditMode = false;
				$this->btnOkay->Text = 'Post New Topic and Message';

				$this->txtTopicName->Focus();
			}
		}
	}
?>