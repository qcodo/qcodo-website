<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $lstSearch;
		protected $txtSearch;
		protected $dtrForums;
		
		protected $objForum;
		protected $objTopic;
		protected $objFirstMessage;

		protected $dtrMessages;
		
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

			$this->dtrForums = new QDataRepeater($this, 'dtrForums');
			$this->dtrForums->Template = 'dtrForums.tpl.php';
			$this->dtrForums->SetDataBinder('dtrForums_Bind');
		}
		
		public function dtrMessages_Bind() {
			if ($this->objTopic) {
				$objDataSource = $this->objTopic->GetMessageArray(QQ::OrderBy(QQN::Message()->PostDate));
				$this->dtrMessages->DataSource = $objDataSource;
			}
		}

		protected function Form_PreRender() {
			$this->dtrForums->DataSource = Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber));
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