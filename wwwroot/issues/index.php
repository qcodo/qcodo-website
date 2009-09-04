<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $objIssueFieldForCategory;
		protected $objIssueFieldForQcodoVersion;
		protected $objIssueFieldForPhpVersion;
		
		protected $dtgIssues;

		protected $txtId;

		protected $txtSummary;
		protected $lstCategory;
		protected $lstStatus;
		protected $txtPostedBy;
		protected $txtAssignedTo;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->dtgIssues = new IssueDataGrid($this);
			$this->dtgIssues->CssClass = 'datagrid issuesDataGrid';
			$this->dtgIssues->Paginator = new QPaginator($this->dtgIssues);
			$this->dtgIssues->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgIssues->Noun = 'issue';
			$this->dtgIssues->NounPlural = 'issues';
			$this->dtgIssues->SetDataBinder('dtgIssues_Bind');

			$this->dtgIssues->MetaAddColumn('Id', 'Html=<?= $_FORM->RenderId($_ITEM); ?>', 'Name=Issue ID', 'HtmlEntities=false', 'Width=60px');
			$this->dtgIssues->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>', 'Name=Summary', 'HtmlEntities=false', 'Width=300px');
			$this->dtgIssues->AddColumn(new QDataGridColumn('Category', '<?= $_FORM->RenderCategory($_ITEM); ?>', 'Width=130px'));
			$this->dtgIssues->MetaAddTypeColumn('IssueStatusTypeId', 'IssueStatusType', 'Html=<?= $_FORM->RenderStatus($_ITEM); ?>', 'HtmlEntities=false', 'Name=Status', 'Width=85px');
			$this->dtgIssues->MetaAddColumn('PostDate', 'Name=Posted', 'CssClass=small', 'Width=65px');
			$this->dtgIssues->MetaAddColumn(QQN::Issue()->PostedByPerson->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');
			$this->dtgIssues->MetaAddColumn(QQN::Issue()->TopicLink->LastPostDate, 'Name=Last Updated', 'CssClass=small', 'Width=65px');
			$this->dtgIssues->MetaAddColumn(QQN::Issue()->AssignedToPerson->DisplayName, 'Name=Assigned To', 'Html=<?= $_FORM->RenderAssignedTo($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');

			$this->objIssueFieldForCategory = IssueField::LoadIssueFieldForCategory();
			$this->objIssueFieldForQcodoVersion = IssueField::LoadIssueFieldForQcodoVersion();
			$this->objIssueFieldForPhpVersion = IssueField::LoadIssueFieldForPhpVersion();

			$this->txtId = new QIntegerTextBox($this);
			$this->txtId->Name = 'Go to Issue by ID';
			$this->txtId->AddAction(new QChangeEvent(), new QAjaxAction('txtId_Change'));
			$this->txtId->AddAction(new QEnterKeyEvent(), new QAjaxAction('txtId_Change'));
			$this->txtId->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtId->CausesValidation = $this->txtId;

			$this->txtSummary = new QTextBox($this);
			$this->txtSummary->Name = 'Summary';
			$this->txtSummary->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtSummary->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtSummary->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->lstCategory->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->lstCategory->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->lstCategory->AddItem('- View All -', null);
			foreach ($this->objIssueFieldForCategory->GetIssueFieldOptionArray(QQ::OrderBy(QQN::IssueFieldOption()->OrderNumber)) as $objOption)
				$this->lstCategory->AddItem($objOption->Name, $objOption->Id);
			
			$this->lstStatus = new QListBox($this);
			$this->lstStatus->Name = 'Status';
			$this->lstStatus->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->lstStatus->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->lstStatus->AddItem('- View All -', null);
			foreach (IssueStatusType::$NameArray as $intKey => $strName)
				$this->lstStatus->AddItem($strName, $intKey);
			
			$this->txtPostedBy = new QTextBox($this);
			$this->txtPostedBy->Name = 'Posted By';
			$this->txtPostedBy->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtPostedBy->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtPostedBy->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtAssignedTo = new QTextBox($this);
			$this->txtAssignedTo->Name = 'Assigned To';
			$this->txtAssignedTo->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtAssignedTo->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtAssignedTo->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		public function dtgIssues_Bind() {
			$objCondition = QQ::All();

			if ($this->txtSummary->Text) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::Issue()->Title, '%' . $this->txtSummary->Text . '%')
				);
			}
			
			if ($intValue = $this->lstCategory->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::Issue()->IssueFieldValue->IssueFieldId, $this->objIssueFieldForCategory->Id),
					QQ::Equal(QQN::Issue()->IssueFieldValue->IssueFieldOptionId, $intValue)
				);
			}
			
			if ($intValue = $this->lstStatus->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::Issue()->IssueStatusTypeId, $intValue)
				);
			}
			
			if ($this->txtPostedBy->Text) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::Issue()->PostedByPerson->DisplayName, $this->txtPostedBy->Text . '%')
				);
			}
			
			if ($this->txtAssignedTo->Text) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::Issue()->AssignedToPerson->DisplayName, $this->txtAssignedTo->Text . '%')
				);
			}

			$this->dtgIssues->TotalItemCount = Issue::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgIssues->LimitClause)
				$objClauses[] = $objClause; 
			if ($objClause = $this->dtgIssues->OrderByClause)
				$objClauses[] = $objClause; 

			$this->dtgIssues->DataSource = Issue::QueryArray($objCondition, $objClauses);
		}

		public function Refresh() {
			$this->dtgIssues->PageNumber = 1;
			$this->dtgIssues->Refresh();
		}

		public function txtId_Change() {
			if ($this->txtId->Text)
				QApplication::Redirect('/issues/view.php/' . $this->txtId->Text);
		}

		public function RenderId(Issue $objIssue) {
			return sprintf('<a href="/issues/view.php/%s">%s</a>', $objIssue->Id, $objIssue->Id);
		}

		public function RenderTitle(Issue $objIssue) {
			$strVersionInfoArray = array();
			if ($objFieldOption = $objIssue->GetFieldOptionForIssueField($this->objIssueFieldForQcodoVersion))
				$strVersionInfoArray[] = 'Qcodo ' . $objFieldOption->Name;
			if ($objFieldOption = $objIssue->GetFieldOptionForIssueField($this->objIssueFieldForPhpVersion))
				$strVersionInfoArray[] = 'PHP ' . $objFieldOption->Name;
			
			$strVersionInfo = '';
			if (count($strVersionInfoArray))
				$strVersionInfo = sprintf('<br/><em style="color: #777; font-size: 10px;">%s</em>', implode(', ', $strVersionInfoArray));

			return sprintf('<a href="/issues/view.php/%s" style="font-weight: bold;">%s</a>%s',
				$objIssue->Id, QString::Truncate($objIssue->Title, 50, true), $strVersionInfo);
		}
		
		public function RenderStatus(Issue $objIssue) {
			$strStatus = IssueStatusType::$NameArray[$objIssue->IssueStatusTypeId];
			if (strpos($strStatus, ' - ') !== false) {
				return '<strong>' . str_replace(' - ', '</strong><br/><em style="font-size: 10px; color: #777;">', $strStatus) . '</em>';
			} else {
				return '<strong>' . $strStatus . '</strong>';
			}
		}

		public function RenderPostedBy(Issue $objIssue) {
			return sprintf('<a href="%s">%s</a>', $objIssue->PostedByPerson->ViewProfileUrl, $objIssue->PostedByPerson->DisplayName);
		}

		public function RenderAssignedTo(Issue $objIssue) {
			if ($objIssue->AssignedToPerson)
				return sprintf('<a href="%s">%s</a>', $objIssue->AssignedToPerson->ViewProfileUrl, $objIssue->AssignedToPerson->DisplayName);
		}

		public function RenderCategory(Issue $objIssue) {
			if ($objFieldOption = $objIssue->GetFieldOptionForIssueField($this->objIssueFieldForCategory))
				return $objFieldOption->Name;
		}
	}

	QcodoForm::Run('QcodoForm');
?>