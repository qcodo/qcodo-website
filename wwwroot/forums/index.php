<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $lstSearch;
		protected $txtSearch;
		protected $dtrForums;

		protected function Form_Create() {
			parent::Form_Create();

			$this->lstSearch = new QListBox($this);
			$this->lstSearch->AddItem('- All Forums -', null);
			foreach (Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber)) as $objForum)
				$this->lstSearch->AddItem($objForum->Name, $objForum->Id);

			$this->txtSearch = new QTextBox($this, 'txtSearch');
			$this->txtSearch->AddAction(new QEnterKeyEvent(0, "qc.getControl('txtSearch').value != ''"), new QServerAction('btnSearch_Click'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->dtrForums = new QDataRepeater($this, 'dtrForums');
			$this->dtrForums->Template = 'dtrForums.tpl.php';
			$this->dtrForums->SetDataBinder('dtrForums_Bind');
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