<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $lstSearch;
		protected $txtSearch;
		protected $btnSearch;

		protected $objForum;
		protected $dtrTopics;

		protected function Form_Create() {
			parent::Form_Create();

			// Load the Forum to View Topics In
			$this->objForum = Forum::Load(QApplication::PathInfo(0));
			if (!$this->objForum)
				QApplication::Redirect('/forums/');

			// Update the Page Title
			$this->strPageTitle .= ' - ' . $this->objForum->Name;

			$this->dtrTopics = new QDataRepeater($this);
			$this->dtrTopics->Template = 'dtrTopics.tpl.php';

			$objPaginator = new QPaginator($this);

			$this->dtrTopics->Paginator = $objPaginator;
			$this->dtrTopics->UseAjax = true;
			$this->dtrTopics->ItemsPerPage = 15;
			$this->dtrTopics->SetDataBinder('dtrTopics_Bind');

			if ($intForumPage = QApplication::PathInfo(1))
				$this->dtrTopics->PageNumber = $intForumPage;

			$this->lstSearch = new QListBox($this);
			$this->lstSearch->AddItem('- All Forums -', null);
			foreach (Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber)) as $objForum)
				$this->lstSearch->AddItem($objForum->Name, $objForum->Id);

			$this->txtSearch = new QTextBox($this, 'txtSearch');
			$this->txtSearch->AddAction(new QEnterKeyEvent(0, "qc.getControl('txtSearch').value != ''"), new QServerAction('btnSearch_Click'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function dtrTopics_Bind() {
			$this->dtrTopics->TotalItemCount = Topic::CountByForumId($this->objForum->Id);
			$this->dtrTopics->DataSource = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause($this->dtrTopics->LimitClause));
		}

		protected function btnSearch_Click($strFormId, $strControlId, $strParameter) {
//			if ($this->lstSearch->SelectedValue)
	//			QApplication::Redirect(sprintf('/forums/search.php/1/%s/?strSearch=%s', $this->lstSearch->SelectedValue, urlencode($this->txtSearch->Text)));
	//		else
	//			QApplication::Redirect(sprintf('/forums/search.php/1/?strSearch=%s', urlencode($this->txtSearch->Text)));

//			if (strlen(trim($this->txtSearch->Text)) > 0) {
//				QApplication::Redirect(sprintf('/forums/search.php/1/%s/?strSearch=%s', $this->lstSearch->SelectedValue, urlencode(trim($this->txtSearch->Text))));
//			}
		}
	}

	QcodoForm::Run('QcodoForm');
?>