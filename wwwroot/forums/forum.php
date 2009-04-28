<?php
	require('../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/MessageEditDialogBox.class.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $lstSearch;
		protected $txtSearch;
		
		protected $lblTopicInfo;
		
		protected $btnRespond1;
		protected $btnRespond2;
		protected $btnNotify1;
		protected $btnNotify2;
		protected $btnMarkAsViewed1;
		protected $btnMarkAsViewed2;
		
		protected $objForum;
		public $objTopic;
		protected $objFirstMessage;

		protected $dtrMessages;
		protected $dtrTopics;
		
		protected $dlgMessage;
		protected $pxyEditMessage;
		
		protected function Form_Create() {
			parent::Form_Create();

			// For non-logged in users, create the ViewedTopicArray in Session
			if (!QApplication::$Person) {
				if (!array_key_exists('intViewedTopicArray', $_SESSION))
					$_SESSION['intViewedTopicArray'] = array();
			}

			$this->objForum = Forum::Load(QApplication::PathInfo(0));
			if (!$this->objForum) QApplication::Redirect('/forums/');

			if ($this->objForum) {
				$this->SelectTopic(QApplication::PathInfo(1));
			}

			$this->lstSearch = new QListBox($this);
			$this->lstSearch->AddItem('- All Forums -', null);
			foreach (Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber)) as $objForum)
				$this->lstSearch->AddItem($objForum->Name, $objForum->Id);

			$this->txtSearch = new QTextBox($this, 'txtSearch');
			$this->txtSearch->AddAction(new QEnterKeyEvent(0, "qc.getControl('txtSearch').value != ''"), new QServerAction('btnSearch_Click'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->dtrMessages = new QDataRepeater($this, 'dtrMessages');
			$this->dtrMessages->Template = 'dtrMessages.tpl.php';
			$this->dtrMessages->SetDataBinder('dtrMessages_Bind');
			$this->dtrMessages->Paginator = new QPaginator($this);
			$this->dtrMessages->PaginatorAlternate = new QPaginator($this);
			$this->dtrMessages->Paginator->Visible = false;
			$this->dtrMessages->PaginatorAlternate->Visible = false;
			$this->dtrMessages->ItemsPerPage = 5;
			$this->dtrMessages->UseAjax = true;
			
			$this->dtrTopics = new QDataRepeater($this, 'dtrTopics');
			$this->dtrTopics->Template = 'dtrTopics.tpl.php';
			$this->dtrTopics->SetDataBinder('dtrTopics_Bind');
			$this->dtrTopics->Paginator = new ForumTopicsPaginator($this);
			
			$this->dtrTopics->ItemsPerPage = 20;
			if ($this->objTopic) $this->dtrTopics->PageNumber = Topic::GetPageNumber($this->objTopic, 20);
			$this->dtrTopics->UseAjax = true;

			$this->lblTopicInfo = new QLabel($this);
			$this->lblTopicInfo->TagName = 'div';
			$this->lblTopicInfo->Template = dirname(__FILE__) . '/lblTopicInfo.tpl.php';
			
			$this->btnRespond1 = new RoundedLinkButton($this);
			$this->btnRespond1->Text = 'Respond';
			$this->btnRespond1->ToolTip = 'Post a Response';
			$this->btnRespond2 = new RoundedLinkButton($this);
			$this->btnRespond2->Text = 'Respond';
			$this->btnRespond2->ToolTip = 'Post a Response';
			
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
			$this->btnRespond1->AddAction(new QClickEvent(), new QAjaxAction('btnRespond_Click'));
			$this->btnRespond1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnRespond2->AddAction(new QClickEvent(), new QAjaxAction('btnRespond_Click'));
			$this->btnRespond2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnMarkAsViewed1->AddAction(new QClickEvent(), new QAjaxAction('btnMarkAsViewed_Click'));
			$this->btnMarkAsViewed1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnMarkAsViewed2->AddAction(new QClickEvent(), new QAjaxAction('btnMarkAsViewed_Click'));
			$this->btnMarkAsViewed2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnNotify1->AddAction(new QClickEvent(), new QAjaxAction('btnNotify_Click'));
			$this->btnNotify1->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnNotify2->AddAction(new QClickEvent(), new QAjaxAction('btnNotify_Click'));
			$this->btnNotify2->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyEditMessage->AddAction(new QClickEvent(), new QAjaxAction('pxyEditMessage_Click'));
			$this->pxyEditMessage->AddAction(new QClickEvent(), new QTerminateAction());
			
			// Update Button State
			$this->UpdateNotifyButtons();
			$this->UpdateMarkAsViewedButtons();
		}

		protected function btnNotify_Click() {
			if (!QApplication::$Person)
				QApplication::Redirect('/login/');
			else if ($this->objTopic) {
				if ($this->IsTopicNotifying($this->objTopic))
					$this->objTopic->UnassociatePersonAsEmail(QApplication::$Person);
				else
					$this->objTopic->AssociatePersonAsEmail(QApplication::$Person);

				$this->UpdateNotifyButtons();
				$this->dtrTopics->Refresh();
			}
		}

		public function IsTopicNotifying(Topic $objTopic) {
			return (QApplication::$Person && $objTopic->IsPersonAsEmailAssociated(QApplication::$Person));
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
		
		protected function btnMarkAsViewed_Click() {
			if ($this->objTopic) {
				if ($this->IsTopicViewed($this->objTopic)) {
					$this->MarkTopicUnviewed($this->objTopic);
				} else {
					$this->MarkTopicViewed($this->objTopic);
				}

				$this->UpdateMarkAsViewedButtons();
				$this->dtrTopics->Refresh();
			}
		}

		public function UpdateMarkAsViewedButtons() {
			if ($this->objTopic) {
				if ($this->IsTopicViewed($this->objTopic)) {
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

		/**
		 * Action to Select a Topic to view
		 * @param integer $intTopicId the topic ID that we are now viewing
		 * @return void
		 */
		public function SelectTopic($intTopicId) {
			$this->objTopic = Topic::Load(QApplication::PathInfo(1));
			if ($this->objTopic) {
				if ($this->objTopic->ForumId != $this->objForum->Id)
					$this->objTopic = null;
				else {
					$this->objFirstMessage = Message::QuerySingle(
						QQ::Equal(QQN::Message()->TopicId, $this->objTopic->Id),
						QQ::OrderBy(QQN::Message()->Id)
					);
				}

				$this->MarkTopicViewed($this->objTopic);
			}
		}

		public function dtrTopics_Bind() {
			$this->dtrTopics->TotalItemCount = $this->objForum->TopicCount;
			$this->dtrTopics->DataSource = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause(QQ::OrderBy(QQN::Topic()->LastPostDate, false), $this->dtrTopics->LimitClause));
		}

		public function dtrMessages_Bind() {
			if ($this->objTopic) {
				$this->dtrMessages->TotalItemCount = $this->objTopic->MessageCount;

				$objDataSource = $this->objTopic->GetMessageArray(QQ::Clause(
					QQ::OrderBy(QQN::Message()->PostDate, false),
					$this->dtrMessages->LimitClause,
					QQ::Expand(QQN::Message()->Person),
					QQ::Expand(QQN::Message()->Person->Country)
				));
				$this->dtrMessages->DataSource = $objDataSource;
				
				$this->dtrMessages->Paginator->Visible = ($this->dtrMessages->PageCount > 1);
				$this->dtrMessages->PaginatorAlternate->Visible = ($this->dtrMessages->PageCount > 1);
			}
		}
		
		public function btnRespond_Click($strFormId, $strControlId, $strParameter) {
			$this->btnRespond1->RemoveCssClass('roundedLinkGray');
			$this->btnRespond2->RemoveCssClass('roundedLinkGray');

			if (QApplication::$Person) {
				$objMessage = new Message();
				$objMessage->Forum = $this->objTopic->Forum;
				$objMessage->Topic = $this->objTopic;
				$objMessage->Person = QApplication::$Person;
				$objMessage->ReplyNumber = $this->objTopic->MessageCount;
				$this->dlgMessage->EditMessage($objMessage);
			} else
				QApplication::Redirect('/login/');
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
				$this->dtrTopics->Refresh();

				if ($blnRepaginate) {
					$this->dtrMessages->PageNumber = 1;
					$this->dtrTopics->PageNumber = 1;
				}
			}

			$this->dlgMessage->HideDialogBox();
		}

		protected function btnSearch_Click($strFormId, $strControlId, $strParameter) {
			if ($this->lstSearch->SelectedValue)
				QApplication::Redirect(sprintf('/forums/search.php/1/%s/?strSearch=%s', $this->lstSearch->SelectedValue, urlencode($this->txtSearch->Text)));
			else
				QApplication::Redirect(sprintf('/forums/search.php/1/?strSearch=%s', urlencode($this->txtSearch->Text)));
		}
		
		/**
		 * Specifies whether or not a given message is editable by the currently logged-in user
		 * @param Message $objMessage
		 * @return boolean
		 */
		public function IsMessageEditable(Message $objMessage) {
			return (QApplication::$Person && ($objMessage->PersonId == QApplication::$Person->Id));
		}


		/**
		 * For a specific topic, it will render all the necessary CSS classes for the dtrTopics qcontrol
		 * @param Topic $objTopic
		 * @return string
		 */
		public function RenderTopicCss(Topic $objTopic) {
			$strToReturn = 'item';
			if ($this->objTopic && ($objTopic->Id == $this->objTopic->Id))
				$strToReturn .= ' selected';
			if (!$this->IsTopicViewed($objTopic))
				$strToReturn .= ' unviewed';
			if ($this->IsTopicNotifying($objTopic))
				$strToReturn .= ' notify';
			return $strToReturn;
		}

		/**
		 * Specifies whether or not this user has viewed the message already
		 * @param Message $objMessage
		 * @return boolean
		 */
		public function IsTopicViewed(Topic $objTopic) {
			if (QApplication::$Person) {
				return $objTopic->IsPersonAsReadAssociated(QApplication::$Person);
			} else {
				return array_key_exists($objTopic->Id, $_SESSION['intViewedTopicArray']);
			}
		}


		/**
		 * Will mark this topic as "viewed" by this person
		 * @param Topic $objTopic
		 * @return void
		 */
		public function MarkTopicViewed(Topic $objTopic) {
			if (QApplication::$Person) {
				if (!$objTopic->IsPersonAsReadAssociated(QApplication::$Person))
					$objTopic->AssociatePersonAsRead(QApplication::$Person);
			} else {
				$_SESSION['intViewedTopicArray'][$objTopic->Id] = true;
			}
		}


		/**
		 * Will mark this topic as "unviewed" by this person
		 * @param Topic $objTopic
		 * @return void
		 */
		public function MarkTopicUnviewed(Topic $objTopic) {
			if (QApplication::$Person) {
				$objTopic->UnassociatePersonAsRead(QApplication::$Person);
			} else {
				$_SESSION['intViewedTopicArray'][$objTopic->Id] = false;
				unset($_SESSION['intViewedTopicArray'][$objTopic->Id]);
			}
		}
	}

	QcodoForm::Run('QcodoForm');
?>