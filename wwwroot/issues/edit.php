<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $mctIssue;
		protected $blnEditMode;

		protected $txtTitle;
		protected $txtLongDescription;
		
		protected $txtExampleCode;
		protected $txtExampleTemplate;
		protected $txtExampleData;
		protected $txtExpectedOutput;
		protected $txtActualOutput;

		protected $lstPriority;
		protected $lstStatus;
		protected $lstResolution;
		
		protected $lstRequiredFields = array();
		protected $lstOptionalFields = array();
		
		protected function Form_Create() {
			parent::Form_Create();

			$objIssue = Issue::Load(QApplication::PathInfo(0));
			if (!$objIssue) {
				$objIssue = new Issue();
				$blnEditMode = false;
				$this->strPageTitle .= 'Create New';
			} else {
				$blnEditMode = true;
				$this->strPageTitle .= 'Edit';
			}

			$this->mctIssue = new IssueMetaControl($this, $objIssue);

			$this->txtTitle = $this->mctIssue->txtTitle_Create();
			$this->txtTitle->Required = true;

			$this->txtExampleCode = $this->mctIssue->txtExampleCode_Create();
			$this->txtExampleTemplate = $this->mctIssue->txtExampleTemplate_Create();
			$this->txtExampleData = $this->mctIssue->txtExampleData_Create();
			$this->txtExpectedOutput = $this->mctIssue->txtExpectedOutput_Create();
			$this->txtActualOutput = $this->mctIssue->txtActualOutput_Create();

			$this->lstPriority = $this->mctIssue->lstIssuePriorityType_Create();
			$this->lstStatus = $this->mctIssue->lstIssueStatusType_Create();
			$this->lstResolution = $this->mctIssue->lstIssueResolutionType_Create();
			
			foreach (IssueField::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::IssueField()->OrderNumber)) as $objIssueField) {
				$lstField = new QListBox($this);
				$lstField->Name = $objIssueField->Name;
				$lstField->ActionParameter = $objIssueField->Id;

				if ($lstField->Required = $objIssueField->RequiredFlag) {
				} else {
					$lstField->AddItem('- Select One -');
				}
				
				$objSelectedIssueFieldOption = $objIssue->GetFieldOptionForIssueField($objIssueField);

				foreach ($objIssueField->GetOptionArray() as $objIssueFieldOption)
					$lstField->AddItem($objIssueFieldOption->Name, $objIssueFieldOption->Id, ($objSelectedIssueFieldOption && ($objSelectedIssueFieldOption->Id == $objIssueFieldOption->Id)));

				if ($objIssueField->MutableFlag) {
					$lstField->AddItem('- Other... -', -1);
				}

				if ($objIssueField->RequiredFlag)
					$this->lstRequiredFields[] = $lstField;
				else
					$this->lstOptionalFields[] = $lstField;
			}

			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Required = true;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
			
			$this->txtTitle->Focus();
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>