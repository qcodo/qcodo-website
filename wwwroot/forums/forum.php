<?php
	require('../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/MessageEditDialogBox.class.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $objForum;
		public $objTopic;
		protected $intViewState;

		protected $lblTopicInfo;

		protected $btnRespond1;
		protected $btnRespond2;
		protected $btnNotify1;
		protected $btnNotify2;
		protected $btnMarkAsViewed1;
		protected $btnMarkAsViewed2;

		protected $txtSearch;
		protected $btnSearchAll;
		protected $btnSearchThis;

		protected $strPostStartedLinkText;
		protected $strSearchTerm;

		protected $lblHeader;
		protected $lblDescription;
		
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


			/* Figure out which "View State" we are in, depending on how this page is queried or accessed.
			 * 
			 * Various states:
			 * 	1) Viewing a FORUM		NO Topic		NO Search
			 *  2) Viewing a forum		Topic			NO Search
			 *  3) Viewing a SEARCH RESULT for a "Search All" - NO Forum, NO Topic
			 *  4) Viewing a SEARCH RESULT for a "Search All" - Forum derived from the Topic selected
			 *  5) Viewing a SEARCH RESULT within a Forum - Forum, but NO Topic
			 *  6) Viewing a SEARCH RESULT within a Forum - Forum AND Topic
			 */

			$this->objForum = Forum::Load(QApplication::PathInfo(0));
			$this->SelectTopic(QApplication::PathInfo(1));

			if (strlen($strSearchTerm = trim(QApplication::QueryString('search')))) {
				$this->strSearchTerm = $strSearchTerm;
				if (!$this->objForum) {
					// State 3 or State 4
					$strHeaderSmall = 'Search Results';
					$strHeaderLarge = 'All Forums';
					$this->intViewState = ($this->objTopic) ? 4 : 3;
				} else {
					// State 5 or State 6
					$strHeaderSmall = 'Search Results';
					$strHeaderLarge = QApplication::HtmlEntities($this->objForum->Name);
					$this->intViewState = ($this->objTopic) ? 6 : 5;
				}
			} else {
				// State 1 or State 2
				if (!$this->objForum) QApplication::Redirect('/forums/');
				if ($this->objTopic && ($this->objTopic->ForumId != $this->objForum->Id)) QApplication::Redirect('/forums/');
				$strHeaderSmall = 'Forum';
				$strHeaderLarge = QApplication::HtmlEntities($this->objForum->Name);
				$this->intViewState = ($this->objTopic) ? 2 : 1;
			}

			$this->lblHeader = new QLabel($this);
			$this->lblHeader->HtmlEntities = false;
			$this->lblHeader->Text = sprintf('<span style="font-weight: normal; font-size: 12px;">%s: </span> %s', $strHeaderSmall, $strHeaderLarge);

			$this->lblDescription = new QLabel($this);
			$this->lblDescription->CssClass = 'description';
			$this->lblDescription->TagName = 'div';
			switch ($this->intViewState) {
				case 1:
				case 2:
					$this->lblDescription->Text = $this->objForum->Description;
					break;
				default:
					$this->lblDescription->Visible = false;
					break;
			}

			$this->txtSearch = new SearchTextBox($this, 'txtSearch');
			$this->txtSearch->Text = QApplication::QueryString('search');
			$this->txtSearch->AddAction(new QChangeEvent(), new QAjaxAction('ExecuteSearch'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QAjaxAction('ExecuteSearch'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtSearch->ActionParameter = (($this->intViewState == 5) || ($this->intViewState == 6));

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
			
			// Search Stuff
			$this->btnSearchAll = new RoundedLinkButton($this);
			$this->btnSearchAll->Text = 'All Forums';
			$this->btnSearchAll->CssClass = 'searchOption';

			$this->btnSearchThis = new RoundedLinkButton($this);
			$this->btnSearchThis->CssClass = 'searchOption';
			if ($this->objForum) {
				$this->btnSearchThis->Text = '"' . $this->objForum->Name . '"';
			} else {
				$this->btnSearchThis->Visible = false;
			}

			if (strlen(trim(QApplication::QueryString('search')))) {
				if ($this->objForum && ($this->objForum->Id == QApplication::PathInfo(0))) {
					$this->btnSearchThis->AddCssClass('searchOptionActive');
				} else {
					$this->btnSearchAll->AddCssClass('searchOptionActive');
				}
			} else {
				$this->btnSearchAll->Display = false;
				$this->btnSearchThis->Display = false;
			}

			$this->btnSearchThis->AddAction(new QClickEvent(), new QAjaxAction('ExecuteSearch'));
			$this->btnSearchThis->ActionParameter = true;
			$this->btnSearchAll->AddAction(new QClickEvent(), new QAjaxAction('ExecuteSearch'));
			$this->btnSearchAll->ActionParameter = false;
			
			// Update Button State
			$this->UpdateNotifyButtons();
			$this->UpdateMarkAsViewedButtons();
		}

		/**
		 * Perform a redirect to execute a search command
		 * @param string $strFormId
		 * @param string $strControlId
		 * @param string $strParameter a true/false value where:
		 * 		If Parameter is TRUE, then operate a "Search This Forum" type of search
		 * 		If Parameter is FALSE, then operate a "Search All Forums" type of search
		 * @return unknown_type
		 */
		protected function ExecuteSearch($strFormId, $strControlId, $strParameter) {
			$strSearchTerm = trim($this->txtSearch->Text);

			// First, let's figure out what viewing or searching "This Forum" means
			// If we are viewing a topic, then "This Forum" is the forum that this topic belongs to
			// Otherwise, we can try and discern what "This Forum" is by looking at the PathInfo(0)
			$intThisForumId = ($this->objTopic) ? $this->objTopic->ForumId : QApplication::PathInfo(0);  

			// Are we removing the search term (e.g. "Cancel" search)
			if (!strlen($strSearchTerm)) {
				// Maintain View to Topic if Applicable
				if ($this->objTopic)
					QApplication::Redirect('/forums/forum.php/' . $this->objTopic->ForumId . '/' . $this->objTopic->Id);
				else
					QApplication::Redirect('/forums/forum.php/' . $intThisForumId);
			}


			// Are we executing a NEW kind of search?
			if ($strSearchTerm != QApplication::QueryString('search')) {
				// Yes
				$strUrl = sprintf('/forums/forum.php/%s%s?search=%s',
					($strParameter) ? $intThisForumId : '0',
					($this->objTopic) ? '/' . $this->objTopic->Id : null,
					urlencode($strSearchTerm));
				QApplication::Redirect($strUrl);
			}


			// If we are here, then we're NOT executing a new search.  The Search term is teh same
			// Therefore, keep "Topic" result if at all possible
			$strUrl = sprintf('/forums/forum.php/%s%s?search=%s',
				($strParameter) ? $intThisForumId : '0',
				($this->objTopic) ? '/' . $this->objTopic->Id : null,
				urlencode($strSearchTerm));
			QApplication::Redirect($strUrl);
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
				$objFirstMessage = Message::QuerySingle(
					QQ::Equal(QQN::Message()->TopicId, $this->objTopic->Id),
					QQ::OrderBy(QQN::Message()->Id)
				);

				$dttLocalize = QApplication::LocalizeDateTime($objFirstMessage->PostDate);
				$this->strPostStartedLinkText = strtolower($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm z ')) .
					strtolower(QApplication::DisplayTimezoneLink($dttLocalize, false));

				$this->MarkTopicViewed($this->objTopic);
			}
		}

		public function dtrTopics_Bind() {
			if (!is_null($this->strSearchTerm)) {
				$intIdArray = Topic::GetIdArrayForSearch($this->strSearchTerm);
				$this->dtrTopics->TotalItemCount = count($intIdArray);
				$this->dtrTopics->DataSource = Topic::LoadArrayBySearchResultArray($intIdArray, $this->dtrTopics->LimitInfo);
			} else {
				$this->dtrTopics->TotalItemCount = $this->objForum->TopicCount;
				$this->dtrTopics->DataSource = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause(QQ::OrderBy(QQN::Topic()->LastPostDate, false), $this->dtrTopics->LimitClause));
			}
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