<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $mctIssue;
		protected $blnEditMode;
		
		protected $strHeadline;

		protected $txtTitle;
		protected $txtLongDescription;

		protected $txtAssignedTo;
		protected $txtDueDate;
		protected $calDueDate;
		protected $dlgAssignedTo;
		
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
				$this->blnEditMode = false;
				$this->strPageTitle .= 'Create New';
				$this->strHeadline = 'Report a New Bug or Issue';
			} else {
				if (!$objIssue->IsEditableForPerson(QApplication::$Person)) {
					QApplication::RedirectToLogin();
				}
				$this->blnEditMode = true;
				$this->strPageTitle .= 'Edit Issue #' . $objIssue->Id;
				$this->strHeadline = 'Edit Issue #' . $objIssue->Id;
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
			
			$this->txtAssignedTo = new QTextBox($this);
			$this->txtAssignedTo->ReadOnly = true;
			$this->txtDueDate = new QDateTimeTextBox($this);
			$this->calDueDate = new QCalendar($this->txtDueDate, $this->txtDueDate);
			$this->txtDueDate->Text = ($this->mctIssue->Issue->DueDate) ? $this->mctIssue->Issue->DueDate->__toString() : null;
			
			$this->dlgAssignedTo = new PersonSelectorDialog($this, 'dlgAssignedTo_Select');

			$this->txtAssignedTo->AddAction(new QClickEvent(), new QShowDialogBox($this->dlgAssignedTo));
			$this->txtAssignedTo->AddAction(new QClickEvent(), new QFocusControlAction($this->dlgAssignedTo->txtMemberSearch));
			
			$this->lstStatus->AddAction(new QChangeEvent(), new QAjaxAction('RefreshStatuses'));
			
			foreach (IssueField::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::IssueField()->OrderNumber)) as $objIssueField) {
				$this->lstField_Setup($objIssueField);
			}

			$this->txtLongDescription = new QTextBox($this);
			$this->txtLongDescription->Visible = !$this->blnEditMode;
			$this->txtLongDescription->Required = !$this->blnEditMode;
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

			if ($objIssue->IsAdminableForPerson(QApplication::$Person)) {
				$this->RefreshStatuses();
			} else {
				$this->txtAssignedTo->Visible = false;
				$this->txtDueDate->Visible = false;
				$this->lstStatus->Visible = false;
				$this->lstResolution->Visible = false;
			}
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
		
		protected function RefreshStatuses() {
			switch ($this->lstStatus->SelectedValue) {
				case IssueStatusType::NewIssue:
				case IssueStatusType::Open:
					$this->lstResolution->Visible = false;
					$this->lstResolution->Required = false;
					$this->lstResolution->SelectedValue = null;

					$this->mctIssue->Issue->AssignedToPerson = null;
					$this->txtAssignedTo->Visible = false;
					$this->txtAssignedTo->Required = false;

					$this->mctIssue->Issue->AssignedDate = null;
					$this->mctIssue->Issue->DueDate = null;
					$this->txtDueDate->Text = null;
					$this->txtDueDate->Required = false;
					$this->txtDueDate->Visible = false;
					break;

				case IssueStatusType::Assigned:
					$this->lstResolution->Visible = false;
					$this->lstResolution->Required = false;
					$this->lstResolution->SelectedValue = null;

					$this->txtAssignedTo->Visible = true;
					$this->txtAssignedTo->Required = true;

					$this->txtDueDate->Required = true;
					$this->txtDueDate->Visible = true;
					break;

				case IssueStatusType::Fixed:
					$this->lstResolution->Visible = false;
					$this->lstResolution->Required = false;
					$this->lstResolution->SelectedValue = null;
					
					$this->txtAssignedTo->Visible = true;
					$this->txtAssignedTo->Required = false;

					$this->txtDueDate->Visible = ($this->mctIssue->Issue->AssignedToPersonId);
					$this->txtDueDate->Required = false;
					break;

				case IssueStatusType::Closed:
					$this->lstResolution->Visible = true;
					$this->lstResolution->Required = true;

					$this->txtAssignedTo->Visible = true;
					$this->txtAssignedTo->Required = false;

					$this->txtDueDate->Visible = ($this->mctIssue->Issue->AssignedToPersonId);
					$this->txtDueDate->Required = false;
					break;

				default:
					throw new Exception('Invalid IssueStatusTypeId: ' . $this->lstStatus->SelectedValue);
			}

			if ($this->mctIssue->Issue->AssignedToPersonId) {
				$this->txtAssignedTo->Text = $this->mctIssue->Issue->AssignedToPerson->DisplayName;
			} else {
				$this->txtAssignedTo->Text = '[none]';
			}
		}
		
		public function Form_Validate($blnToReturn = true) {
			if ($this->txtAssignedTo->Required && ($this->txtAssignedTo->Text == '[none]')) {
				$this->txtAssignedTo->Warning = 'Required';
				$blnToReturn = false;
			}

			foreach ($this->txtMutableFields as $intIssueFieldId => $txtField) {
				if ($txtField->Visible && strlen(trim($txtField->Text))) {
					$strToken = IssueFieldOption::TokenizeName($txtField->Text);
					if (IssueFieldOption::LoadByIssueFieldIdToken($intIssueFieldId, $strToken)) {
						$txtField->Warning = 'Value already exists';
						$blnToReturn = false;
					}
				}
			}

			return parent::Form_Validate($blnToReturn);
		}
		
		public function dlgAssignedTo_Select(Person $objPerson = null) {
			$this->mctIssue->Issue->AssignedToPerson = $objPerson;
			$this->mctIssue->Issue->AssignedDate = QDateTime::Now();
			$this->RefreshStatuses();
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}
		
		protected function btnOkay_Click() {
			$this->mctIssue->Issue->DueDate = $this->txtDueDate->DateTime;

			if (!$this->blnEditMode) {
				$this->mctIssue->Issue->PostDate = QDateTime::Now();
				$this->mctIssue->SaveIssue();
				$this->mctIssue->Issue->CreateTopicAndTopicLink();
				$this->mctIssue->Issue->PostMessage(trim($this->txtLongDescription->Text), QApplication::$Person, $this->mctIssue->Issue->PostDate);
			} else {
				$objOldVersionOfIssue = Issue::Load($this->mctIssue->Issue->Id);
				$this->mctIssue->SaveIssue();
				$strTextArray = $this->mctIssue->Issue->GetDifferenceArray($objOldVersionOfIssue);

				if (count($strTextArray)) {
					$strMessage = sprintf("%s made edits to the issue, including:\r\n\r\n* %s",
						QApplication::$Person->DisplayName,
						implode("\r\n* ", $strTextArray));
				} else {
					$strMessage = sprintf("%s made content edits to the issue", QApplication::$Person->DisplayName);
				}
				$this->mctIssue->Issue->PostMessage($strMessage, null);
			}

			// Save Other Fields (both required and optional)
			
			// First Erase them All to "start over"
			$this->mctIssue->Issue->DeleteAllIssueFieldValues();

			// Now assign the Required ones
			foreach ($this->lstRequiredFields as $lstField) {
				$this->lstField_Save($lstField);
			}

			// Finally assign the Optional ones
			foreach ($this->lstOptionalFields as $lstField) {
				$this->lstField_Save($lstField);
			}

			QApplication::Redirect('/issues/view.php/' . $this->mctIssue->Issue->Id . '/lastpage');
		}

		protected function lstField_Save(QListBox $lstField) {
			if ($lstField->SelectedValue) {
				// Did the user select "OTHER"?
				if ($lstField->SelectedValue == -1) {
					// Yes -- we need to create the new IssueFieldOption
					$objIssueField = IssueField::Load($lstField->ActionParameter);
					$objIssueFieldOption = $objIssueField->CreateNewIssueFieldOption($this->txtMutableFields[$lstField->ActionParameter]->Text);
				} else {
					// No -- let's use theexisting IssueFieldOption
					$objIssueFieldOption = IssueFieldOption::Load($lstField->SelectedValue);
				}
				
				// Now let's set it to the Issue!
				$this->mctIssue->Issue->SetFieldOption($objIssueFieldOption);
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