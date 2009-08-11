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
			$this->dtgIssues->CssClass = 'datagrid issuesDataGrid';
			$this->dtgIssues->Paginator = new QPaginator($this->dtgIssues);
			$this->dtgIssues->AlternateRowStyle->CssClass = 'alternate';

			$this->dtgIssues->MetaAddColumn('Id', 'Html=<?= $_FORM->RenderId($_ITEM); ?>', 'Name=Issue ID', 'HtmlEntities=false', 'Width=60px');
			$this->dtgIssues->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>', 'Name=Summary', 'HtmlEntities=false', 'Width=280px');
			$this->dtgIssues->AddColumn(new QDataGridColumn('Category', '<?= $_FORM->RenderCategory($_ITEM); ?>', 'Width=100px'));
			$this->dtgIssues->MetaAddTypeColumn('IssueStatusTypeId', 'IssueStatusType', 'Name=Status', 'Width=135px');
			$this->dtgIssues->MetaAddColumn('PostDate', 'Name=Posted', 'CssClass=small', 'Width=65px');
			$this->dtgIssues->MetaAddColumn(QQN::Issue()->PostedByPerson->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');
			$this->dtgIssues->MetaAddColumn('LastUpdateDate', 'Name=Last Updated', 'CssClass=small', 'Width=65px');
			$this->dtgIssues->MetaAddColumn(QQN::Issue()->AssignedToPerson->DisplayName, 'Name=Assigned To', 'Html=<?= $_FORM->RenderAssignedTo($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');
			
		}

		public function RenderId(Issue $objIssue) {
			return sprintf('<a href="/issues/view.php/%s">%s</a>', $objIssue->Id, $objIssue->Id);
		}

		public function RenderTitle(Issue $objIssue) {
			return sprintf('<a href="/issues/view.php/%s">%s</a>', $objIssue->Id, $objIssue->Title);
		}

		public function RenderPostedBy(Issue $objIssue) {
			return sprintf('<a href="%s">%s</a>', $objIssue->PostedByPerson->ViewProfileUrl, $objIssue->PostedByPerson->DisplayName);
		}

		public function RenderAssignedTo(Issue $objIssue) {
			if ($objIssue->AssignedToPerson)
				return sprintf('<a href="%s">%s</a>', $objIssue->AssignedToPerson->ViewProfileUrl, $objIssue->AssignedToPerson->DisplayName);
		}

		public function RenderCategory(Issue $objIssue) {
			
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>