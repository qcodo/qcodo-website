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
		protected $txtMutableFields = array();

		protected $btnOkay;
		protected $btnCancel;
		
		protected function Form_Create() {
			parent::Form_Create();

			$objIssue = Issue::Load(QApplication::PathInfo(0));
			if (!$objIssue) {
				$objIssue = new Issue();
				$objIssue->IssuePriorityTypeId = IssuePriorityType::Standard;
				$objIssue->IssueStatusTypeId = IssueStatusType::NewIssue;
				$objIssue->PostedByPerson = QApplication::$Person;
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
			$this->lstStatus_Change();
			
			$this->lstStatus->AddAction(new QChangeEvent(), new QAjaxAction('lstStatus_Change'));
			
			foreach (IssueField::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::IssueField()->OrderNumber)) as $objIssueField) {
				$this->lstField_Setup($objIssueField);
			}

			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Required = true;
			$this->txtLongDescription->TextMode = QTextMode::MultiLine;
			
			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->Text = ($this->blnEditMode) ? 'Update Issue' : 'Save New Issue';

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			
			$this->btnOkay->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnOkay));
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxAction('btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			$this->txtTitle->Focus();
		}
		
		protected function lstField_Setup(IssueField $objIssueField) {
			$lstField = new QListBox($this);
			$lstField->Name = $objIssueField->Name;
			$lstField->ActionParameter = $objIssueField->Id;

			if (!($lstField->Required = $objIssueField->RequiredFlag)) {
				$lstField->AddItem('- Select One -');
			}
			
			$objSelectedIssueFieldOption = $this->mctIssue->Issue->GetFieldOptionForIssueField($objIssueField);

			foreach ($objIssueField->GetOptionArray() as $objIssueFieldOption) {
				$lstField->AddItem(
					$objIssueFieldOption->Name,
					$objIssueFieldOption->Id,
					($objSelectedIssueFieldOption && ($objSelectedIssueFieldOption->Id == $objIssueFieldOption->Id)));
			}

			if ($objIssueField->MutableFlag) {
				$lstField->AddItem('- Other... -', -1);
				
				$txtMutableField = new QTextBox($this, 'txtMutableField' . $objIssueField->Id);
				$txtMutableField->Visible = false;
				$txtMutableField->SetCustomStyle('margin-top', '2px');
				$this->txtMutableFields[$objIssueField->Id] = $txtMutableField;

				$lstField->AddAction(new QChangeEvent(), new QAjaxAction('lstField_Change'));
			}

			if ($objIssueField->RequiredFlag)
				$this->lstRequiredFields[] = $lstField;
			else
				$this->lstOptionalFields[] = $lstField;
		}
		
		protected function lstField_Change($strFormId, $strControlId, $strParameter) {
			if ($this->GetControl($strControlId)->SelectedValue == -1) {
				$this->txtMutableFields[$strParameter]->Visible = true;
				$this->txtMutableFields[$strParameter]->Required = true;
				$this->txtMutableFields[$strParameter]->Focus();
			} else {
				$this->txtMutableFields[$strParameter]->Visible = false;
				$this->txtMutableFields[$strParameter]->Required = false;
			}
		}
		
		protected function lstStatus_Change() {
			if ($this->lstStatus->SelectedValue == IssueStatusType::Closed) {
				$this->lstResolution->Visible = true;
				$this->lstResolution->Required = true;
			} else {
				$this->lstResolution->Visible = false;
				$this->lstResolution->Required = false;
				$this->lstResolution->SelectedValue = null;
			}
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}

		protected function btnOkay_Click() {
			if (!$this->blnEditMode)
				$this->mctIssue->Issue->PostDate = QDateTime::Now();

			$this->mctIssue->SaveIssue();

			if (!$this->blnEditMode) {
				$this->mctIssue->Issue->CreateTopicAndTopicLink();
				$this->mctIssue->Issue->PostMessage(trim($this->txtLongDescription->Text), QApplication::$Person, $this->mctIssue->Issue->PostDate);
			} else {
				// TODO: Post System Message
			}
		}

		protected function btnCancel_Click() {
			if ($this->mctIssue->Issue->Id)
				QApplication::Redirect('/issues/view.php/' . $this->mctIssue->Issue->Id);
			else
				QApplication::Redirect('/issues/');
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>