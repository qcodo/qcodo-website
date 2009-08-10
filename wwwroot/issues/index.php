<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QForm {
		protected $strPageTitle = 'Bugs and Issues';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $dtgIssues;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->dtgIssues = new IssueDataGrid($this);
			$this->dtgIssues->MetaAddColumn('Id', 'Html=<?= $_FORM->RenderId($_ITEM); ?>', 'Name=Issue ID', 'HtmlEntities=false', 'Width=70px');
			$this->dtgIssues->MetaAddColumn('Title', 'Width=320px');
			$this->dtgIssues->MetaAddTypeColumn('IssueStatusTypeId', 'IssueStatusType', 'Name=Status', 'Width=150px');
			$this->dtgIssues->MetaAddColumn('Id', 'Html=<?= $_FORM->RenderId($_ITEM); ?>', 'Name=Issue ID', 'HtmlEntities=false', 'Width=70px');
			$this->dtgIssues->Paginator = new QPaginator($this->dtgIssues);
			$this->dtgIssues->AlternateRowStyle->CssClass = 'alternate';
		}

		public function RenderId(Issue $objIssue) {
			return sprintf('<a href="/issues/view.php/%s">%s</a>', $objIssue->Id, $objIssue->Id);
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>