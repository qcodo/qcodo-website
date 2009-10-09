<?php
	require('../../includes/prepend.inc.php');
	require(__INCLUDES__ . '/messages/Messagespanel.class.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $objForum;
		protected $objTopic;

		protected $pnlMessages;
		
		protected $lblHeader;
		protected $lblDescription;

		protected $strSearchTerm;
		protected $intViewState;
		protected $objQueryHitArray;

		protected $btnPost;
		
		protected $txtSearch;
		protected $btnSearchAll;
		protected $btnSearchThis;

		protected $dtrTopics;

		/**
		 * Figure out which "View State" we are in, depending on how this page is queried or accessed.
		 * 
		 * Various states:
		 * 	1) Viewing a FORUM		NO Topic		NO Search
		 *  2) Viewing a forum		Topic			NO Search
		 *  3) Viewing a SEARCH RESULT for a "Search All" - NO Forum, NO Topic
		 *  		NOTE: $objForum is NULL in this case
		 *  4) Viewing a SEARCH RESULT for a "Search All" - Forum derived from the Topic selected
		 *  		NOTE: $objForum is NULL in this case
		 *  5) Viewing a SEARCH RESULT within a Forum - Forum, but NO Topic
		 *  6) Viewing a SEARCH RESULT within a Forum - Forum AND Topic
		 *  
		 * @param string $strHeaderSmall
		 * @param string $strHeaderLarge
		 */		
		protected function CalculateViewState(&$strHeaderSmall, &$strHeaderLarge) {
			if (strlen($strSearchTerm = trim(QApplication::QueryString('search')))) {
				$this->strSearchTerm = $strSearchTerm;
				$strHeaderSmall = 'Search Results';
				if (!$this->objForum) {
					// State 3 or State 4
					$strHeaderLarge = 'All Forums';
					$this->objQueryHitArray = Topic::GetQueryHitArrayForSearch($this->strSearchTerm);

					$this->SelectTopic(QApplication::PathInfo(1));
					$this->intViewState = ($this->objTopic) ? 4 : 3;
					if (!$this->objTopic && (strlen(QApplication::PathInfo(1)))) QApplication::Redirect('/forums/forum.php/0/?search=' . urlencode($this->strSearchTerm));
				} else {
					// State 5 or State 6
					$strHeaderLarge = QApplication::HtmlEntities($this->objForum->Name);
					$this->objQueryHitArray = Topic::GetQueryHitArrayForSearch($this->strSearchTerm, $this->objForum->TopicLink->Id);

					$this->SelectTopic(QApplication::PathInfo(1));
					$this->intViewState = ($this->objTopic) ? 6 : 5;
					if (!$this->objTopic && (strlen(QApplication::PathInfo(1)))) QApplication::Redirect('/forums/forum.php/' . $this->objForum->Id . '/?search=' . urlencode($this->strSearchTerm));
				}
			} else {
				// State 1 or State 2
				if (!$this->objForum) QApplication::Redirect('/forums/');
				$strHeaderSmall = 'Forum';
				$strHeaderLarge = QApplication::HtmlEntities($this->objForum->Name);
				$this->SelectTopic(QApplication::PathInfo(1));
				$this->intViewState = ($this->objTopic) ? 2 : 1;
				if (!$this->objTopic && (strlen(QApplication::PathInfo(1)))) QApplication::Redirect('/forums/forum.php/' . $this->objForum->Id . '/');
			}
		}

		protected function lblDescription_Setup() {
			$this->lblDescription = new QLabel($this);
			$this->lblDescription->CssClass = 'description';
			$this->lblDescription->TagName = 'div';
			$this->lblDescription->HtmlEntities = false;
			switch ($this->intViewState) {
				case 1:
				case 2:
					$this->lblDescription->Template = dirname(__FILE__) . '/lblDescription.tpl.php';
					break;
				case 3:
				case 4:
					$this->lblDescription->Text = sprintf('Search results for <strong>%s</strong> from all forums.',
						QApplication::HtmlEntities(strtoupper($this->strSearchTerm)));
					break;
				case 5:
				case 6:
					$this->lblDescription->Text = sprintf('Search results for <strong>%s</strong> from the "%s" forum.',
						QApplication::HtmlEntities(strtoupper($this->strSearchTerm)), QApplication::HtmlEntities($this->objForum->Name));
					break;
			}
		}

		protected function btnPost_Setup() {
			$this->btnPost = new RoundedLinkButton($this->lblDescription);
			$this->btnPost->Text = 'Post New Topic';
			$this->btnPost->AddCssClass('roundedLinkGray');
			$this->btnPost->AddAction(new QClickEvent(), new QAjaxAction('btnPost_Click'));
			$this->btnPost->AddAction(new QClickEvent(), new QTerminateAction());
			switch ($this->intViewState) {
				case 1:
				case 2:
					if (QApplication::$Person)
						$this->btnPost->Visible = ($this->objForum->CanUserPost(QApplication::$Person));
					else
						$this->btnPost->Visible = true;
					break;
				default:
					$this->btnPost->Visible = false;
					break;
			}
		}

		protected function Form_Create() {
			parent::Form_Create();

			// Uses the MessagesPanel control for most of the DisplayMessages functionality
			$this->pnlMessages = new MessagesPanel($this);

			// Figure out the Forum, ViewState and Topic we are viewing
			$this->objForum = Forum::Load(QApplication::PathInfo(0));
			$this->CalculateViewState($strHeaderSmall, $strHeaderLarge);

			// Update the MessagePanel Header template based on the View State
			switch ($this->intViewState) {
				case 4:
					$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfoWithForumName.tpl.php');
					break;
				case 1:
				case 3:
				case 5:
					// No Topic is Selected -- therefore, no template
					break;
				default:
					$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfo.tpl.php');
					break;
			}

			// Setup Controls
			$this->lblHeader = new QLabel($this);
			$this->lblHeader->HtmlEntities = false;
			$this->lblHeader->Text = sprintf('<span style="font-weight: normal; font-size: 12px;">%s: </span> %s', $strHeaderSmall, $strHeaderLarge);

			$this->lblDescription_Setup();

			$this->btnPost_Setup();

			$this->txtSearch = new SearchTextBox($this, 'txtSearch');
			$this->txtSearch->Text = QApplication::QueryString('search');
			$this->txtSearch->AddAction(new QChangeEvent(), new QAjaxAction('ExecuteSearch'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QAjaxAction('ExecuteSearch'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtSearch->ActionParameter = (($this->intViewState == 5) || ($this->intViewState == 6));
			
			$this->dtrTopics = new QDataRepeater($this, 'dtrTopics');
			$this->dtrTopics->Template = 'dtrTopics.tpl.php';
			$this->dtrTopics->SetDataBinder('dtrTopics_Bind');
			$this->dtrTopics->Paginator = new ForumTopicsPaginator($this);
			
			$this->dtrTopics->ItemsPerPage = 20;
			$this->dtrTopics->UseAjax = true;
			
			$this->pnlMessages->AddControlToRefreshOnUpdate($this->dtrTopics);
			$this->pnlMessages->SetCallbackOnNewPost($this, 'dtrTopics_Reset');
			if (QApplication::PathInfo(2) == 'lastpage') $this->pnlMessages->SetPageNumber(QPaginatedControl::LastPage);

			
			// Search Stuff
			$this->btnSearchAll = new RoundedLinkButton($this);
			$this->btnSearchAll->Text = 'All Forums';
			$this->btnSearchAll->CssClass = 'searchOption';
			$this->btnSearchAll->ToolTip = 'Search all forums';

			$this->btnSearchThis = new RoundedLinkButton($this);
			$this->btnSearchThis->CssClass = 'searchOption';
			if ($this->objForum) {
				$this->btnSearchThis->Text = '"' . $this->objForum->Name . '"';
				$this->btnSearchThis->ToolTip = 'Search within ' . $this->btnSearchThis->Text . ' forum';
			} else if ($this->objTopic) {
				if ($this->objTopic->TopicLink->Forum) {
					$this->btnSearchThis->Text = '"' . $this->objTopic->TopicLink->Forum->Name . '"';
					$this->btnSearchThis->ToolTip = 'Search within ' . $this->btnSearchThis->Text . ' forum';
				} else {
					$this->btnSearchThis->Text = '"Issues"';
					$this->btnSearchThis->ToolTip = 'Search within ' . $this->btnSearchThis->Text . ' forum';
				}
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
			$this->btnSearchThis->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnSearchThis->ActionParameter = true;
			$this->btnSearchAll->AddAction(new QClickEvent(), new QAjaxAction('ExecuteSearch'));
			$this->btnSearchAll->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnSearchAll->ActionParameter = false;

			// Last Minute Cleanup
			switch ($this->intViewState) {
				case 3:
				case 4:
					$this->txtSearch->ActionParameter = false;
					break;
				default:
					$this->txtSearch->ActionParameter = true;
					break;
			}
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
			// If we are viewing a Forum, then "This Forum" is the forum.
			// Otherwise, if we are viewing a Topic, then "This Forum" is the Forum that this topic belongs to
			// Otherwise, we can try and discern what "This Forum" is by looking at the PathInfo(0)
			if ($this->objForum)
				$intThisForumId = $this->objForum->Id;
			else if ($this->objTopic)
				$intThisForumId = $this->objTopic->TopicLink->ForumId;
			else
				$intThisForumId = QApplication::PathInfo(0);  

			// Are we removing the search term (e.g. "Cancel" search)
			if (!strlen($strSearchTerm)) {
				// Maintain View to Topic if Applicable
				if ($this->objTopic)
					QApplication::Redirect('/forums/forum.php/' . $this->objTopic->TopicLink->ForumId . '/' . $this->objTopic->Id);
				else
					QApplication::Redirect('/forums/forum.php/' . $intThisForumId);
			}


			// We executing a NEW kind of search
			$strUrl = sprintf('/forums/forum.php/%s/%s?search=%s',
				($strParameter) ? $intThisForumId : '0',
				($this->objTopic) ? $this->objTopic->Id . '/' : null,
				urlencode($strSearchTerm));
			QApplication::Redirect($strUrl);
		}


		/**
		 * Action to Select a Topic to view
		 * @param integer $intTopicId the topic ID that we are now viewing
		 * @return void
		 */
		public function SelectTopic($intTopicId) {
			$this->objTopic = Topic::Load(QApplication::PathInfo(1));

			// Validate the Topic, Itself
			if (!$this->objTopic) return;

			// For Search Queries: needs to be in the QueryHitArray
			if (is_array($this->objQueryHitArray)) {
				$blnFound = false;
				foreach ($this->objQueryHitArray as $objHit) {
					if ($objHit->db_id == $this->objTopic->Id) $blnFound = true;
				}
				if (!$blnFound)
					$this->objTopic = null;

			// For Forum View: Topic must be part of the Forum
			} else {
				if ($this->objTopic->TopicLink->ForumId != $this->objForum->Id)
					$this->objTopic = null;
			}

			// Go ahead and set up other stuff if the Topic is set
			if ($this->objTopic) {
				$this->objTopic->MarkAsViewed();
				$this->pnlMessages->SelectTopic($this->objTopic);
			}
		}

		public function dtrTopics_Bind() {
			$intTopicLinkId = null;
			switch ($this->intViewState) {
				case 5:
				case 6:
					$intTopicLinkId = $this->objForum->TopicLink->Id;
				case 3:
				case 4:
					if (!$this->objQueryHitArray) $this->objQueryHitArray = Topic::GetQueryHitArrayForSearch($this->strSearchTerm, $intTopicLinkId);
					$this->dtrTopics->TotalItemCount = count($this->objQueryHitArray);

					// If First Time (on FormCreate), pre-set the Page Number
					if (($this->strCallType == QCallType::None) && ($this->objTopic)) 
						$this->dtrTopics->PageNumber = $this->GetPageNumber($this->objTopic, $this->dtrTopics->ItemsPerPage, $this->objQueryHitArray);

					$this->dtrTopics->DataSource = Topic::LoadArrayBySearchResultArray($this->objQueryHitArray, $this->dtrTopics->LimitInfo);
					$this->objQueryHitArray = null;
					break;

				default:
					$this->dtrTopics->TotalItemCount = $this->objForum->TopicLink->TopicCount;

					// If First Time (on FormCreate), pre-set the Page Number
					if (($this->strCallType == QCallType::None) && ($this->objTopic)) 
						$this->dtrTopics->PageNumber = $this->GetPageNumber($this->objTopic, $this->dtrTopics->ItemsPerPage);

					$this->dtrTopics->DataSource = Topic::LoadArrayByTopicLinkId($this->objForum->TopicLink->Id, QQ::Clause(QQ::OrderBy(QQN::Topic()->LastPostDate, false), $this->dtrTopics->LimitClause));
					break;
			}
		}
		
		/**
		 * This gets called by MessagesPanel on any new message post/update.  For non-search based view states, since the "last post date"
		 * is now very recent, this topic shoots to the top of the forum.  We want to reset the page number for dtrTopics in this case. 
		 * @return void
		 */
		public function dtrTopics_Reset() {
			switch ($this->intViewState) {
				case 1:
				case 2:
					$this->dtrTopics->PageNumber = 1;
					break;
				default:
					break;
			}
		}

		public function RenderTopicLink(Topic $objTopic) {
			switch ($this->intViewState) {
				case 1:
				case 2:
					$strQueryString = null;
					$intForumId = $this->objForum->Id;
					break;

				case 3:
				case 4:
					$strQueryString = sprintf('?search=%s', urlencode($this->strSearchTerm));
					$intForumId = 0;
					break;

				case 5:
				case 6:
					$strQueryString = sprintf('?search=%s', urlencode($this->strSearchTerm));
					$intForumId = $this->objForum->Id;
					break;
			}

			return sprintf('/forums/forum.php/%s/%s/%s', $intForumId, $objTopic->Id, $strQueryString);
		}
		

		public function btnPost_Click($strFormId, $strControlId, $strParameter) {
			// Only when NOT performing a search
			switch ($this->intViewState) {
				case 1:
				case 2:
					break;
				default:
					return;
			}

			$this->btnPost->RemoveCssClass('roundedLinkGray');

			if (QApplication::$Person) {
				$objMessage = new Message();
				$objMessage->TopicLink = $this->objForum->TopicLink;
				$objMessage->Person = QApplication::$Person;
				$objMessage->ReplyNumber = null;
				$this->pnlMessages->dlgMessage->EditMessage($objMessage);
			} else
				QApplication::Redirect('/login/');
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
			if (!$objTopic->IsViewed())
				$strToReturn .= ' unviewed';
			if ($objTopic->IsNotifying())
				$strToReturn .= ' notify';
			return $strToReturn;
		}

		/**
		 * Given a Topic and the number of items in a "page", this will
		 * return the page number that the topic shows up in
		 * when listing all topics for the Topic's forum, assuming
		 * the list of topics is ordered by reverse last_post_date
		 * @param Topic $objTopic the topic to search for
		 * @param integer $intItemsPerPage
		 * @param Zend_Search_Lucene_Search_QueryHit[] $objQueryHitArray a predefined set of topics to search through
		 * @return unknown_type
		 */
		public function GetPageNumber(Topic $objTopic, $intItemsPerPage, $objQueryHitArray = null) {
			if (is_null($objQueryHitArray)) {
				$objResult = Topic::GetDatabase()->Query('SELECT id FROM topic WHERE topic_link_id=' . $objTopic->TopicLinkId . ' ORDER BY last_post_date DESC');
				$intRecordNumber = 0;
				while ($objRow = $objResult->GetNextRow()) {
					$intRecordNumber++;
					if ($objRow->GetColumn('id') == $objTopic->Id)
						break;
				}
			} else {
				$intRecordNumber = 0;
				foreach ($objQueryHitArray as $objHit) {
					$intRecordNumber++;
					if ($objHit->db_id == $objTopic->Id)
						break;
				}
			}
	
			$intPageNumber = floor($intRecordNumber / $intItemsPerPage);
			if ($intRecordNumber % $intItemsPerPage) $intPageNumber++;
			return $intPageNumber;
		}
	}

	QcodoForm::Run('QcodoForm');
?>