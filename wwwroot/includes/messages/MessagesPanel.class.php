<?php
	require(dirname(__FILE__) . '/MessageEditDialogBox.class.php');

	class MessagesPanel extends QPanel {
		public $objTopic;
		
		// Search-Related Stuff
		public $lblTopicInfo;
		public $strPostStartedLinkText;
		public $strAdditionalCssClass;

		public $btnRespond1;
		public $btnRespond2;
		public $btnNotify1;
		public $btnNotify2;
		public $btnMarkAsViewed1;
		public $btnMarkAsViewed2;

		public $dtrMessages;

		public $dlgMessage;
		public $pxyEditMessage;

		protected $strCallbackMethodOnNewPost;
		protected $objCallbackMethodOnNewPost;
		protected $objControlsToRefreshOnUpdateArray = array();

		public function AddControlToRefreshOnUpdate(QControl $objControl) {
			$this->objControlsToRefreshOnUpdateArray[$objControl->ControlId] = $objControl;
		}
		
		public function SetCallbackOnNewPost($objClass, $strMethodName) {
			$this->objCallbackMethodOnNewPost = $objClass;
			$this->strCallbackMethodOnNewPost = $strMethodName;
		}
		
		public function SetPageNumber($intPageNumber) {
			$this->dtrMessages->PageNumber = $intPageNumber;
		}

		public function __construct($objParentControl, $strControlId = null) {
			try {
				parent::__construct($objParentControl, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
			
			$this->Template = dirname(__FILE__) . '/MessagesPanel.tpl.php';

			$this->dtrMessages = new QDataRepeater($this, 'dtrMessages');
			$this->dtrMessages->Template = dirname(__FILE__) . '/dtrMessages.tpl.php';
			$this->dtrMessages->SetDataBinder('dtrMessages_Bind', $this);
			$this->dtrMessages->Paginator = new QPaginator($this);
			$this->dtrMessages->PaginatorAlternate = new QPaginator($this);
			$this->dtrMessages->Paginator->Visible = false;
			$this->dtrMessages->PaginatorAlternate->Visible = false;
			$this->dtrMessages->ItemsPerPage = 5;
			$this->dtrMessages->UseAjax = true;
			
			$this->lblTopicInfo = new QLabel($this);
			$this->lblTopicInfo->TagName = 'div';
			
			$this->btnRespond1 = new RoundedLinkButton($this);
			$this->btnRespond1->Text = 'Respond';
			$this->btnRespond1->ToolTip = 'Post a response';
			$this->btnRespond2 = new RoundedLinkButton($this);
			$this->btnRespond2->Text = 'Respond';
			$this->btnRespond2->ToolTip = 'Post a response';
			
			$this->btnNotify1 = new RoundedLinkButton($this);
			$this->btnNotify1->Text = 'Email Notification';
			$this->btnNotify2 = new RoundedLinkButton($this);
			$this->btnNotify2->Text = 'Email Notification';
			
			$this->btnMarkAsViewed1 = new RoundedLinkButton($this);
			$this->btnMarkAsViewed1->Text = 'Mark as Viewed';
			$this->btnMarkAsViewed2 = new RoundedLinkButton($this);
			$this->btnMarkAsViewed2->Text = 'Mark as Viewed';
			
			$this->btnRespond1->AddCssClass('roundedLinkGray');
			$this->btnRespond2->AddCssClass('roundedLinkGray');

			$this->dlgMessage = new MessageEditDialogBox($this);
			$this->pxyEditMessage = new QControlProxy($this);

			// Add Control actions
			$this->btnRespond1->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRespond_Click'));
			$this->btnRespond1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnRespond2->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRespond_Click'));
			$this->btnRespond2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnMarkAsViewed1->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMarkAsViewed_Click'));
			$this->btnMarkAsViewed1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnMarkAsViewed2->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMarkAsViewed_Click'));
			$this->btnMarkAsViewed2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnNotify1->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNotify_Click'));
			$this->btnNotify1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnNotify2->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNotify_Click'));
			$this->btnNotify2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyEditMessage->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEditMessage_Click'));
			$this->pxyEditMessage->AddAction(new QClickEvent(), new QTerminateAction());

			// HIde all buttons until a Topic is properly selected
			$this->btnRespond1->Visible = false;
			$this->btnRespond2->Visible = false;
			$this->btnMarkAsViewed1->Visible = false;
			$this->btnMarkAsViewed2->Visible = false;
			$this->btnNotify1->Visible = false;
			$this->btnNotify2->Visible = false;
		}

		/**
		 * Set the TemplatePath for the TopicInfo Label
		 * @param string $strTemplatePath
		 * @return void
		 */
		public function lblTopicInfo_SetTemplate($strTemplatePath) {
			try {
				$this->lblTopicInfo->Template = $strTemplatePath;
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
			}
		}

		public function dtrMessages_Bind() {
			if ($this->objTopic) {
				$this->dtrMessages->TotalItemCount = $this->objTopic->MessageCount;

				$objDataSource = $this->objTopic->GetMessageArray(QQ::Clause(
					QQ::OrderBy(QQN::Message()->PostDate, true),
					$this->dtrMessages->LimitClause,
					QQ::Expand(QQN::Message()->Person),
					QQ::Expand(QQN::Message()->Person->Country)
				));
				$this->dtrMessages->DataSource = $objDataSource;
				
				$this->dtrMessages->Paginator->Visible = ($this->dtrMessages->PageCount > 1);
				$this->dtrMessages->PaginatorAlternate->Visible = ($this->dtrMessages->PageCount > 1);
				
				if ($this->dtrMessages->TotalItemCount == 0) {
					$this->btnRespond2->Visible = false;
					$this->btnMarkAsViewed2->Visible = false;
					$this->btnNotify2->Visible = false;
				} else {
					$this->btnRespond2->Visible = true;
					$this->btnMarkAsViewed2->Visible = true;
					$this->btnNotify2->Visible = true;
				}
			}
		}
		
		public function btnRespond_Click($strFormId, $strControlId, $strParameter) {
			$this->btnRespond1->RemoveCssClass('roundedLinkGray');
			$this->btnRespond2->RemoveCssClass('roundedLinkGray');

			if (QApplication::$Person) {
				$objMessage = new Message();
				$objMessage->TopicLink = $this->objTopic->TopicLink;
				$objMessage->Topic = $this->objTopic;
				$objMessage->Person = QApplication::$Person;
				$objMessage->ReplyNumber = $this->objTopic->MessageCount;
				$this->dlgMessage->EditMessage($objMessage);
			} else
				QApplication::RedirectToLogin();
		}
		
		public function btnNotify_Click() {
			if (!QApplication::$Person)
				QApplication::RedirectToLogin();
			else if ($this->objTopic) {
				if ($this->objTopic->IsNotifying())
					$this->objTopic->UnassociatePersonAsEmail(QApplication::$Person);
				else
					$this->objTopic->AssociatePersonAsEmail(QApplication::$Person);

				$this->UpdateNotifyButtons();
				foreach ($this->objControlsToRefreshOnUpdateArray as $strControlId => $objControl) $objControl->Refresh();
			}
		}

		public function btnMarkAsViewed_Click() {
			if ($this->objTopic) {
				if ($this->objTopic->IsViewed()) {
					$this->objTopic->MarkAsUnviewed();
				} else {
					$this->objTopic->MarkAsViewed();
				}

				$this->UpdateMarkAsViewedButtons();
				foreach ($this->objControlsToRefreshOnUpdateArray as $strControlId => $objControl) $objControl->Refresh();
			}
		}

		public function pxyEditMessage_Click($strFormId, $strControlId, $strParameter) {
			if (!QApplication::$Person) return;
			$objMessage = Message::Load($strParameter);
			if (!$objMessage) return;
			if ($objMessage->TopicId != $this->objTopic->Id) return;
			if ($objMessage->PersonId != QApplication::$Person->Id) return;
			
			$this->dlgMessage->EditMessage($objMessage);
		}

		public function CloseMessageDialog($blnRefresh = false, $blnRepaginate = false) {
			$this->btnRespond1->AddCssClass('roundedLinkGray');
			$this->btnRespond2->AddCssClass('roundedLinkGray');

			if ($blnRefresh) {
				$this->lblTopicInfo->Refresh();
				$this->dtrMessages->Refresh();
				foreach ($this->objControlsToRefreshOnUpdateArray as $strControlId => $objControl) $objControl->Refresh();

				// Repaginate on new posts
				if ($blnRepaginate) {
					$this->dtrMessages->PageNumber = QPaginatedControl::LastPage;
					$strMethodName = $this->strCallbackMethodOnNewPost;
					if ($strMethodName) {
						$this->objCallbackMethodOnNewPost->$strMethodName();
					}
				}
			}

			$this->dlgMessage->HideDialogBox();
		}

		/**
		 * Specifies whether or not a given message is editable by the currently logged-in user
		 * @param Message $objMessage
		 * @return boolean
		 */
		public function IsMessageEditable(Message $objMessage) {
			return (QApplication::$Person && ($objMessage->PersonId == QApplication::$Person->Id));
		}

		public function SelectTopic(Topic $objTopic) {
			$this->objTopic = $objTopic;
			if ($this->objTopic) {
				// View Buttons
				$this->btnRespond1->Visible = true;
				$this->btnRespond2->Visible = true;
				$this->btnMarkAsViewed1->Visible = true;
				$this->btnMarkAsViewed2->Visible = true;
				$this->btnNotify1->Visible = true;
				$this->btnNotify2->Visible = true;

				$objFirstMessage = Message::QuerySingle(
					QQ::Equal(QQN::Message()->TopicId, $this->objTopic->Id),
					QQ::OrderBy(QQN::Message()->Id)
				);

				if ($objFirstMessage) {
					$dttLocalize = QApplication::LocalizeDateTime($objFirstMessage->PostDate);
					$this->strPostStartedLinkText = strtolower($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm z ')) .
						strtolower(QApplication::DisplayTimezoneLink($dttLocalize, false));
				} else {
					$this->strPostStartedLinkText = 'none'; 	
				}

				$this->objTopic->MarkAsViewed();
				
				$this->UpdateNotifyButtons();
				$this->UpdateMarkAsViewedButtons();
			} else {
				// Hide Buttons
				$this->btnRespond1->Visible = false;
				$this->btnRespond2->Visible = false;
				$this->btnMarkAsViewed1->Visible = false;
				$this->btnMarkAsViewed2->Visible = false;
				$this->btnNotify1->Visible = false;
				$this->btnNotify2->Visible = false;
			}
		}

		public function UpdateNotifyButtons() {
			if ($this->objTopic && QApplication::$Person &&
				$this->objTopic->IsPersonAsEmailAssociated(QApplication::$Person)) {
				$this->btnNotify1->Text = 'Email Notification';
				$this->btnNotify2->Text = 'Email Notification';
				$this->btnNotify1->ToolTip = 'You will receive an email whenever a reply is posted to this topic.';
				$this->btnNotify2->ToolTip = 'You will receive an email whenever a reply is posted to this topic.';
				$this->btnNotify1->RemoveCssClass('roundedLinkGray');
				$this->btnNotify2->RemoveCssClass('roundedLinkGray');
			} else {
				$this->btnNotify1->Text = 'No Email Notification';
				$this->btnNotify2->Text = 'No Email Notification';
				$this->btnNotify1->ToolTip = 'Click to receive an email whenever a reply is posted to this topic.';
				$this->btnNotify2->ToolTip = 'Click to receive an email whenever a reply is posted to this topic.';
				$this->btnNotify1->AddCssClass('roundedLinkGray');
				$this->btnNotify2->AddCssClass('roundedLinkGray');
			}
		}

		public function UpdateMarkAsViewedButtons() {
			if ($this->objTopic) {
				if ($this->objTopic->IsViewed()) {
					$this->btnMarkAsViewed1->Text = 'Marked as Viewed';
					$this->btnMarkAsViewed2->Text = 'Marked as Viewed';
					$this->btnMarkAsViewed1->RemoveCssClass('roundedLinkGray');
					$this->btnMarkAsViewed2->RemoveCssClass('roundedLinkGray');
				} else {
					$this->btnMarkAsViewed1->Text = 'Mark as Viewed';
					$this->btnMarkAsViewed2->Text = 'Mark as Viewed';
					$this->btnMarkAsViewed1->AddCssClass('roundedLinkGray');
					$this->btnMarkAsViewed2->AddCssClass('roundedLinkGray');
				}
			}
		}
	}
?>