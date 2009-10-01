<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Forums';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityForums;

		protected $txtSearch;
		protected $dtrForums;

		protected function Form_Create() {
			parent::Form_Create();

			$this->txtSearch = new SearchTextBox($this, 'txtSearch');
			$this->txtSearch->Text = QApplication::QueryString('search');
			
			$this->txtSearch->AddAction(new QEnterKeyEvent(0, "qc.getControl('txtSearch').value != ''"), new QServerAction('txtSearch_Enter'));
			$this->txtSearch->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->dtrForums = new QDataRepeater($this, 'dtrForums');
			$this->dtrForums->Template = 'dtrForums.tpl.php';
			$this->dtrForums->SetDataBinder('dtrForums_Bind');
		}

		protected function Form_PreRender() {
			$this->dtrForums->DataSource = Forum::LoadAll(QQ::OrderBy(QQN::Forum()->OrderNumber));
		}

		protected function txtSearch_Enter($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect(sprintf('/forums/forum.php/0/?search=%s', urlencode(trim($this->txtSearch->Text))));
		}
	}

	QcodoForm::Run('QcodoForm');
?>