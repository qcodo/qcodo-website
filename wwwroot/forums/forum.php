<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $lstSearch;
		protected $txtSearch;
		
		protected $btnRespond;
		
		protected $objForum;
		public $objTopic;
		protected $objFirstMessage;

		protected $dtrMessages;
		protected $dtrTopics;
		
		protected function Form_Create() {
			parent::Form_Create();

			$this->objForum = Forum::Load(QApplication::PathInfo(0));
			if (!$this->objForum) QApplication::Redirect('/forums/');

			if ($this->objForum) {
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
				}
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
			
			$this->btnRespond = new RoundedLinkButton($this);
			$this->btnRespond->Text = 'Respond';
		}

		public function dtrTopics_Bind() {
			$this->dtrTopics->TotalItemCount = $this->objForum->CountTopics();
			$this->dtrTopics->DataSource = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause(QQ::OrderBy(QQN::Topic()->LastPostDate, false), $this->dtrTopics->LimitClause));
		}

		public function dtrMessages_Bind() {
			if ($this->objTopic) {
				$this->dtrMessages->TotalItemCount = $this->objTopic->CountMessages();

				$objDataSource = $this->objTopic->GetMessageArray(QQ::Clause(QQ::OrderBy(QQN::Message()->PostDate), $this->dtrMessages->LimitClause));
				$this->dtrMessages->DataSource = $objDataSource;
				
				$this->dtrMessages->Paginator->Visible = ($this->dtrMessages->PageCount > 1);
				$this->dtrMessages->PaginatorAlternate->Visible = ($this->dtrMessages->PageCount > 1);
			}
		}

		protected function btnSearch_Click($strFormId, $strControlId, $strParameter) {
			if ($this->lstSearch->SelectedValue)
				QApplication::Redirect(sprintf('/forums/search.php/1/%s/?strSearch=%s', $this->lstSearch->SelectedValue, urlencode($this->txtSearch->Text)));
			else
				QApplication::Redirect(sprintf('/forums/search.php/1/?strSearch=%s', urlencode($this->txtSearch->Text)));
		}
	}

	QcodoForm::Run('QcodoForm');
?>