<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $mctIssue;
		protected $blnEditMode;

		protected $txtTitle;
		protected $txtExampleCode;
		protected $txtExampleTemplate;
		protected $txtExampleData;
		protected $txtExpectedOutput;
		protected $txtActualOutput;

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
			$this->txtExampleCode = $this->mctIssue->txtExampleCode_Create();
			$this->txtExampleTemplate = $this->mctIssue->txtExampleTemplate_Create();
			$this->txtExampleData = $this->mctIssue->txtExampleData_Create();
			$this->txtExpectedOutput = $this->mctIssue->txtExpectedOutput_Create();
			$this->txtActualOutput = $this->mctIssue->txtActualOutput_Create();
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>