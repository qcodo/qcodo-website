<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Issue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Issue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Issue $Issue the actual Issue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IssuePriorityTypeIdControl
	 * property-read QLabel $IssuePriorityTypeIdLabel
	 * property QListBox $IssueStatusTypeIdControl
	 * property-read QLabel $IssueStatusTypeIdLabel
	 * property QListBox $IssueResolutionTypeIdControl
	 * property-read QLabel $IssueResolutionTypeIdLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $ExampleCodeControl
	 * property-read QLabel $ExampleCodeLabel
	 * property QTextBox $ExampleTemplateControl
	 * property-read QLabel $ExampleTemplateLabel
	 * property QTextBox $ExampleDataControl
	 * property-read QLabel $ExampleDataLabel
	 * property QTextBox $ExpectedOutputControl
	 * property-read QLabel $ExpectedOutputLabel
	 * property QTextBox $ActualOutputControl
	 * property-read QLabel $ActualOutputLabel
	 * property QListBox $PostedByPersonIdControl
	 * property-read QLabel $PostedByPersonIdLabel
	 * property QListBox $AssignedToPersonIdControl
	 * property-read QLabel $AssignedToPersonIdLabel
	 * property QDateTimePicker $PostDateControl
	 * property-read QLabel $PostDateLabel
	 * property QDateTimePicker $AssignedDateControl
	 * property-read QLabel $AssignedDateLabel
	 * property QDateTimePicker $DueDateControl
	 * property-read QLabel $DueDateLabel
	 * property QIntegerTextBox $VoteCountControl
	 * property-read QLabel $VoteCountLabel
	 * property QListBox $TopicLinkControl
	 * property-read QLabel $TopicLinkLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Issue objIssue
		 * @access protected
		 */
		protected $objIssue;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of Issue's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstIssuePriorityType;
         * @access protected
         */
		protected $lstIssuePriorityType;

        /**
         * @var QListBox lstIssueStatusType;
         * @access protected
         */
		protected $lstIssueStatusType;

        /**
         * @var QListBox lstIssueResolutionType;
         * @access protected
         */
		protected $lstIssueResolutionType;

        /**
         * @var QTextBox txtTitle;
         * @access protected
         */
		protected $txtTitle;

        /**
         * @var QTextBox txtExampleCode;
         * @access protected
         */
		protected $txtExampleCode;

        /**
         * @var QTextBox txtExampleTemplate;
         * @access protected
         */
		protected $txtExampleTemplate;

        /**
         * @var QTextBox txtExampleData;
         * @access protected
         */
		protected $txtExampleData;

        /**
         * @var QTextBox txtExpectedOutput;
         * @access protected
         */
		protected $txtExpectedOutput;

        /**
         * @var QTextBox txtActualOutput;
         * @access protected
         */
		protected $txtActualOutput;

        /**
         * @var QListBox lstPostedByPerson;
         * @access protected
         */
		protected $lstPostedByPerson;

        /**
         * @var QListBox lstAssignedToPerson;
         * @access protected
         */
		protected $lstAssignedToPerson;

        /**
         * @var QDateTimePicker calPostDate;
         * @access protected
         */
		protected $calPostDate;

        /**
         * @var QDateTimePicker calAssignedDate;
         * @access protected
         */
		protected $calAssignedDate;

        /**
         * @var QDateTimePicker calDueDate;
         * @access protected
         */
		protected $calDueDate;

        /**
         * @var QIntegerTextBox txtVoteCount;
         * @access protected
         */
		protected $txtVoteCount;


		// Controls that allow the viewing of Issue's individual data fields
        /**
         * @var QLabel lblIssuePriorityTypeId
         * @access protected
         */
		protected $lblIssuePriorityTypeId;

        /**
         * @var QLabel lblIssueStatusTypeId
         * @access protected
         */
		protected $lblIssueStatusTypeId;

        /**
         * @var QLabel lblIssueResolutionTypeId
         * @access protected
         */
		protected $lblIssueResolutionTypeId;

        /**
         * @var QLabel lblTitle
         * @access protected
         */
		protected $lblTitle;

        /**
         * @var QLabel lblExampleCode
         * @access protected
         */
		protected $lblExampleCode;

        /**
         * @var QLabel lblExampleTemplate
         * @access protected
         */
		protected $lblExampleTemplate;

        /**
         * @var QLabel lblExampleData
         * @access protected
         */
		protected $lblExampleData;

        /**
         * @var QLabel lblExpectedOutput
         * @access protected
         */
		protected $lblExpectedOutput;

        /**
         * @var QLabel lblActualOutput
         * @access protected
         */
		protected $lblActualOutput;

        /**
         * @var QLabel lblPostedByPersonId
         * @access protected
         */
		protected $lblPostedByPersonId;

        /**
         * @var QLabel lblAssignedToPersonId
         * @access protected
         */
		protected $lblAssignedToPersonId;

        /**
         * @var QLabel lblPostDate
         * @access protected
         */
		protected $lblPostDate;

        /**
         * @var QLabel lblAssignedDate
         * @access protected
         */
		protected $lblAssignedDate;

        /**
         * @var QLabel lblDueDate
         * @access protected
         */
		protected $lblDueDate;

        /**
         * @var QLabel lblVoteCount
         * @access protected
         */
		protected $lblVoteCount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstTopicLink
         * @access protected
         */
		protected $lstTopicLink;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblTopicLink
         * @access protected
         */
		protected $lblTopicLink;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueMetaControl to edit a single Issue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Issue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMetaControl
		 * @param Issue $objIssue new or existing Issue object
		 */
		 public function __construct($objParentObject, Issue $objIssue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Issue object
			$this->objIssue = $objIssue;

			// Figure out if we're Editing or Creating New
			if ($this->objIssue->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Issue object creation - defaults to CreateOrEdit
 		 * @return IssueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssue = Issue::Load($intId);

				// Issue was found -- return it!
				if ($objIssue)
					return new IssueMetaControl($objParentObject, $objIssue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Issue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueMetaControl($objParentObject, new Issue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Issue object creation - defaults to CreateOrEdit
		 * @return IssueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Issue object creation - defaults to CreateOrEdit
		 * @return IssueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objIssue->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIssuePriorityType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssuePriorityType_Create($strControlId = null) {
			$this->lstIssuePriorityType = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssuePriorityType->Name = QApplication::Translate('Issue Priority Type');
			$this->lstIssuePriorityType->Required = true;
			foreach (IssuePriorityType::$NameArray as $intId => $strValue)
				$this->lstIssuePriorityType->AddItem(new QListItem($strValue, $intId, $this->objIssue->IssuePriorityTypeId == $intId));
			return $this->lstIssuePriorityType;
		}

		/**
		 * Create and setup QLabel lblIssuePriorityTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssuePriorityTypeId_Create($strControlId = null) {
			$this->lblIssuePriorityTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssuePriorityTypeId->Name = QApplication::Translate('Issue Priority Type');
			$this->lblIssuePriorityTypeId->Text = ($this->objIssue->IssuePriorityTypeId) ? IssuePriorityType::$NameArray[$this->objIssue->IssuePriorityTypeId] : null;
			$this->lblIssuePriorityTypeId->Required = true;
			return $this->lblIssuePriorityTypeId;
		}

		/**
		 * Create and setup QListBox lstIssueStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssueStatusType_Create($strControlId = null) {
			$this->lstIssueStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssueStatusType->Name = QApplication::Translate('Issue Status Type');
			$this->lstIssueStatusType->Required = true;
			foreach (IssueStatusType::$NameArray as $intId => $strValue)
				$this->lstIssueStatusType->AddItem(new QListItem($strValue, $intId, $this->objIssue->IssueStatusTypeId == $intId));
			return $this->lstIssueStatusType;
		}

		/**
		 * Create and setup QLabel lblIssueStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueStatusTypeId_Create($strControlId = null) {
			$this->lblIssueStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueStatusTypeId->Name = QApplication::Translate('Issue Status Type');
			$this->lblIssueStatusTypeId->Text = ($this->objIssue->IssueStatusTypeId) ? IssueStatusType::$NameArray[$this->objIssue->IssueStatusTypeId] : null;
			$this->lblIssueStatusTypeId->Required = true;
			return $this->lblIssueStatusTypeId;
		}

		/**
		 * Create and setup QListBox lstIssueResolutionType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssueResolutionType_Create($strControlId = null) {
			$this->lstIssueResolutionType = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssueResolutionType->Name = QApplication::Translate('Issue Resolution Type');
			$this->lstIssueResolutionType->AddItem(QApplication::Translate('- Select One -'), null);
			foreach (IssueResolutionType::$NameArray as $intId => $strValue)
				$this->lstIssueResolutionType->AddItem(new QListItem($strValue, $intId, $this->objIssue->IssueResolutionTypeId == $intId));
			return $this->lstIssueResolutionType;
		}

		/**
		 * Create and setup QLabel lblIssueResolutionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueResolutionTypeId_Create($strControlId = null) {
			$this->lblIssueResolutionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueResolutionTypeId->Name = QApplication::Translate('Issue Resolution Type');
			$this->lblIssueResolutionTypeId->Text = ($this->objIssue->IssueResolutionTypeId) ? IssueResolutionType::$NameArray[$this->objIssue->IssueResolutionTypeId] : null;
			return $this->lblIssueResolutionTypeId;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objIssue->Title;
			$this->txtTitle->MaxLength = Issue::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objIssue->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtExampleCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtExampleCode_Create($strControlId = null) {
			$this->txtExampleCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtExampleCode->Name = QApplication::Translate('Example Code');
			$this->txtExampleCode->Text = $this->objIssue->ExampleCode;
			$this->txtExampleCode->TextMode = QTextMode::MultiLine;
			return $this->txtExampleCode;
		}

		/**
		 * Create and setup QLabel lblExampleCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblExampleCode_Create($strControlId = null) {
			$this->lblExampleCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblExampleCode->Name = QApplication::Translate('Example Code');
			$this->lblExampleCode->Text = $this->objIssue->ExampleCode;
			return $this->lblExampleCode;
		}

		/**
		 * Create and setup QTextBox txtExampleTemplate
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtExampleTemplate_Create($strControlId = null) {
			$this->txtExampleTemplate = new QTextBox($this->objParentObject, $strControlId);
			$this->txtExampleTemplate->Name = QApplication::Translate('Example Template');
			$this->txtExampleTemplate->Text = $this->objIssue->ExampleTemplate;
			$this->txtExampleTemplate->TextMode = QTextMode::MultiLine;
			return $this->txtExampleTemplate;
		}

		/**
		 * Create and setup QLabel lblExampleTemplate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblExampleTemplate_Create($strControlId = null) {
			$this->lblExampleTemplate = new QLabel($this->objParentObject, $strControlId);
			$this->lblExampleTemplate->Name = QApplication::Translate('Example Template');
			$this->lblExampleTemplate->Text = $this->objIssue->ExampleTemplate;
			return $this->lblExampleTemplate;
		}

		/**
		 * Create and setup QTextBox txtExampleData
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtExampleData_Create($strControlId = null) {
			$this->txtExampleData = new QTextBox($this->objParentObject, $strControlId);
			$this->txtExampleData->Name = QApplication::Translate('Example Data');
			$this->txtExampleData->Text = $this->objIssue->ExampleData;
			$this->txtExampleData->TextMode = QTextMode::MultiLine;
			return $this->txtExampleData;
		}

		/**
		 * Create and setup QLabel lblExampleData
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblExampleData_Create($strControlId = null) {
			$this->lblExampleData = new QLabel($this->objParentObject, $strControlId);
			$this->lblExampleData->Name = QApplication::Translate('Example Data');
			$this->lblExampleData->Text = $this->objIssue->ExampleData;
			return $this->lblExampleData;
		}

		/**
		 * Create and setup QTextBox txtExpectedOutput
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtExpectedOutput_Create($strControlId = null) {
			$this->txtExpectedOutput = new QTextBox($this->objParentObject, $strControlId);
			$this->txtExpectedOutput->Name = QApplication::Translate('Expected Output');
			$this->txtExpectedOutput->Text = $this->objIssue->ExpectedOutput;
			$this->txtExpectedOutput->TextMode = QTextMode::MultiLine;
			return $this->txtExpectedOutput;
		}

		/**
		 * Create and setup QLabel lblExpectedOutput
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblExpectedOutput_Create($strControlId = null) {
			$this->lblExpectedOutput = new QLabel($this->objParentObject, $strControlId);
			$this->lblExpectedOutput->Name = QApplication::Translate('Expected Output');
			$this->lblExpectedOutput->Text = $this->objIssue->ExpectedOutput;
			return $this->lblExpectedOutput;
		}

		/**
		 * Create and setup QTextBox txtActualOutput
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtActualOutput_Create($strControlId = null) {
			$this->txtActualOutput = new QTextBox($this->objParentObject, $strControlId);
			$this->txtActualOutput->Name = QApplication::Translate('Actual Output');
			$this->txtActualOutput->Text = $this->objIssue->ActualOutput;
			$this->txtActualOutput->TextMode = QTextMode::MultiLine;
			return $this->txtActualOutput;
		}

		/**
		 * Create and setup QLabel lblActualOutput
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActualOutput_Create($strControlId = null) {
			$this->lblActualOutput = new QLabel($this->objParentObject, $strControlId);
			$this->lblActualOutput->Name = QApplication::Translate('Actual Output');
			$this->lblActualOutput->Text = $this->objIssue->ActualOutput;
			return $this->lblActualOutput;
		}

		/**
		 * Create and setup QListBox lstPostedByPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPostedByPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPostedByPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPostedByPerson->Name = QApplication::Translate('Posted By Person');
			$this->lstPostedByPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPostedByPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPostedByPerson = Person::InstantiateCursor($objPostedByPersonCursor)) {
				$objListItem = new QListItem($objPostedByPerson->__toString(), $objPostedByPerson->Id);
				if (($this->objIssue->PostedByPerson) && ($this->objIssue->PostedByPerson->Id == $objPostedByPerson->Id))
					$objListItem->Selected = true;
				$this->lstPostedByPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPostedByPerson;
		}

		/**
		 * Create and setup QLabel lblPostedByPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPostedByPersonId_Create($strControlId = null) {
			$this->lblPostedByPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostedByPersonId->Name = QApplication::Translate('Posted By Person');
			$this->lblPostedByPersonId->Text = ($this->objIssue->PostedByPerson) ? $this->objIssue->PostedByPerson->__toString() : null;
			$this->lblPostedByPersonId->Required = true;
			return $this->lblPostedByPersonId;
		}

		/**
		 * Create and setup QListBox lstAssignedToPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssignedToPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssignedToPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssignedToPerson->Name = QApplication::Translate('Assigned To Person');
			$this->lstAssignedToPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssignedToPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssignedToPerson = Person::InstantiateCursor($objAssignedToPersonCursor)) {
				$objListItem = new QListItem($objAssignedToPerson->__toString(), $objAssignedToPerson->Id);
				if (($this->objIssue->AssignedToPerson) && ($this->objIssue->AssignedToPerson->Id == $objAssignedToPerson->Id))
					$objListItem->Selected = true;
				$this->lstAssignedToPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssignedToPerson;
		}

		/**
		 * Create and setup QLabel lblAssignedToPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssignedToPersonId_Create($strControlId = null) {
			$this->lblAssignedToPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssignedToPersonId->Name = QApplication::Translate('Assigned To Person');
			$this->lblAssignedToPersonId->Text = ($this->objIssue->AssignedToPerson) ? $this->objIssue->AssignedToPerson->__toString() : null;
			return $this->lblAssignedToPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objIssue->PostDate;
			$this->calPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calPostDate->Required = true;
			return $this->calPostDate;
		}

		/**
		 * Create and setup QLabel lblPostDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblPostDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblPostDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostDate->Name = QApplication::Translate('Post Date');
			$this->strPostDateDateTimeFormat = $strDateTimeFormat;
			$this->lblPostDate->Text = sprintf($this->objIssue->PostDate) ? $this->objIssue->PostDate->__toString($this->strPostDateDateTimeFormat) : null;
			$this->lblPostDate->Required = true;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calAssignedDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calAssignedDate_Create($strControlId = null) {
			$this->calAssignedDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calAssignedDate->Name = QApplication::Translate('Assigned Date');
			$this->calAssignedDate->DateTime = $this->objIssue->AssignedDate;
			$this->calAssignedDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calAssignedDate;
		}

		/**
		 * Create and setup QLabel lblAssignedDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblAssignedDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblAssignedDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssignedDate->Name = QApplication::Translate('Assigned Date');
			$this->strAssignedDateDateTimeFormat = $strDateTimeFormat;
			$this->lblAssignedDate->Text = sprintf($this->objIssue->AssignedDate) ? $this->objIssue->AssignedDate->__toString($this->strAssignedDateDateTimeFormat) : null;
			return $this->lblAssignedDate;
		}

		protected $strAssignedDateDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDueDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDueDate_Create($strControlId = null) {
			$this->calDueDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDueDate->Name = QApplication::Translate('Due Date');
			$this->calDueDate->DateTime = $this->objIssue->DueDate;
			$this->calDueDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDueDate;
		}

		/**
		 * Create and setup QLabel lblDueDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDueDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDueDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDueDate->Name = QApplication::Translate('Due Date');
			$this->strDueDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDueDate->Text = sprintf($this->objIssue->DueDate) ? $this->objIssue->DueDate->__toString($this->strDueDateDateTimeFormat) : null;
			return $this->lblDueDate;
		}

		protected $strDueDateDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtVoteCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtVoteCount_Create($strControlId = null) {
			$this->txtVoteCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtVoteCount->Name = QApplication::Translate('Vote Count');
			$this->txtVoteCount->Text = $this->objIssue->VoteCount;
			return $this->txtVoteCount;
		}

		/**
		 * Create and setup QLabel lblVoteCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblVoteCount_Create($strControlId = null, $strFormat = null) {
			$this->lblVoteCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblVoteCount->Name = QApplication::Translate('Vote Count');
			$this->lblVoteCount->Text = $this->objIssue->VoteCount;
			$this->lblVoteCount->Format = $strFormat;
			return $this->lblVoteCount;
		}

		/**
		 * Create and setup QListBox lstTopicLink
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTopicLink_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTopicLink = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicLink->Name = QApplication::Translate('Topic Link');
			$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTopicLinkCursor = TopicLink::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTopicLink = TopicLink::InstantiateCursor($objTopicLinkCursor)) {
				$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
				if ($objTopicLink->IssueId == $this->objIssue->Id)
					$objListItem->Selected = true;
				$this->lstTopicLink->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTopicLink;
		}

		/**
		 * Create and setup QLabel lblTopicLink
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTopicLink_Create($strControlId = null) {
			$this->lblTopicLink = new QLabel($this->objParentObject, $strControlId);
			$this->lblTopicLink->Name = QApplication::Translate('Topic Link');
			$this->lblTopicLink->Text = ($this->objIssue->TopicLink) ? $this->objIssue->TopicLink->__toString() : null;
			return $this->lblTopicLink;
		}



		/**
		 * Refresh this MetaControl with Data from the local Issue object.
		 * @param boolean $blnReload reload Issue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssue->Id;

			if ($this->lstIssuePriorityType) $this->lstIssuePriorityType->SelectedValue = $this->objIssue->IssuePriorityTypeId;
			if ($this->lblIssuePriorityTypeId) $this->lblIssuePriorityTypeId->Text = ($this->objIssue->IssuePriorityTypeId) ? IssuePriorityType::$NameArray[$this->objIssue->IssuePriorityTypeId] : null;

			if ($this->lstIssueStatusType) $this->lstIssueStatusType->SelectedValue = $this->objIssue->IssueStatusTypeId;
			if ($this->lblIssueStatusTypeId) $this->lblIssueStatusTypeId->Text = ($this->objIssue->IssueStatusTypeId) ? IssueStatusType::$NameArray[$this->objIssue->IssueStatusTypeId] : null;

			if ($this->lstIssueResolutionType) $this->lstIssueResolutionType->SelectedValue = $this->objIssue->IssueResolutionTypeId;
			if ($this->lblIssueResolutionTypeId) $this->lblIssueResolutionTypeId->Text = ($this->objIssue->IssueResolutionTypeId) ? IssueResolutionType::$NameArray[$this->objIssue->IssueResolutionTypeId] : null;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objIssue->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objIssue->Title;

			if ($this->txtExampleCode) $this->txtExampleCode->Text = $this->objIssue->ExampleCode;
			if ($this->lblExampleCode) $this->lblExampleCode->Text = $this->objIssue->ExampleCode;

			if ($this->txtExampleTemplate) $this->txtExampleTemplate->Text = $this->objIssue->ExampleTemplate;
			if ($this->lblExampleTemplate) $this->lblExampleTemplate->Text = $this->objIssue->ExampleTemplate;

			if ($this->txtExampleData) $this->txtExampleData->Text = $this->objIssue->ExampleData;
			if ($this->lblExampleData) $this->lblExampleData->Text = $this->objIssue->ExampleData;

			if ($this->txtExpectedOutput) $this->txtExpectedOutput->Text = $this->objIssue->ExpectedOutput;
			if ($this->lblExpectedOutput) $this->lblExpectedOutput->Text = $this->objIssue->ExpectedOutput;

			if ($this->txtActualOutput) $this->txtActualOutput->Text = $this->objIssue->ActualOutput;
			if ($this->lblActualOutput) $this->lblActualOutput->Text = $this->objIssue->ActualOutput;

			if ($this->lstPostedByPerson) {
					$this->lstPostedByPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPostedByPersonArray = Person::LoadAll();
				if ($objPostedByPersonArray) foreach ($objPostedByPersonArray as $objPostedByPerson) {
					$objListItem = new QListItem($objPostedByPerson->__toString(), $objPostedByPerson->Id);
					if (($this->objIssue->PostedByPerson) && ($this->objIssue->PostedByPerson->Id == $objPostedByPerson->Id))
						$objListItem->Selected = true;
					$this->lstPostedByPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPostedByPersonId) $this->lblPostedByPersonId->Text = ($this->objIssue->PostedByPerson) ? $this->objIssue->PostedByPerson->__toString() : null;

			if ($this->lstAssignedToPerson) {
					$this->lstAssignedToPerson->RemoveAllItems();
				$this->lstAssignedToPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssignedToPersonArray = Person::LoadAll();
				if ($objAssignedToPersonArray) foreach ($objAssignedToPersonArray as $objAssignedToPerson) {
					$objListItem = new QListItem($objAssignedToPerson->__toString(), $objAssignedToPerson->Id);
					if (($this->objIssue->AssignedToPerson) && ($this->objIssue->AssignedToPerson->Id == $objAssignedToPerson->Id))
						$objListItem->Selected = true;
					$this->lstAssignedToPerson->AddItem($objListItem);
				}
			}
			if ($this->lblAssignedToPersonId) $this->lblAssignedToPersonId->Text = ($this->objIssue->AssignedToPerson) ? $this->objIssue->AssignedToPerson->__toString() : null;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objIssue->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objIssue->PostDate) ? $this->objIssue->__toString($this->strPostDateDateTimeFormat) : null;

			if ($this->calAssignedDate) $this->calAssignedDate->DateTime = $this->objIssue->AssignedDate;
			if ($this->lblAssignedDate) $this->lblAssignedDate->Text = sprintf($this->objIssue->AssignedDate) ? $this->objIssue->__toString($this->strAssignedDateDateTimeFormat) : null;

			if ($this->calDueDate) $this->calDueDate->DateTime = $this->objIssue->DueDate;
			if ($this->lblDueDate) $this->lblDueDate->Text = sprintf($this->objIssue->DueDate) ? $this->objIssue->__toString($this->strDueDateDateTimeFormat) : null;

			if ($this->txtVoteCount) $this->txtVoteCount->Text = $this->objIssue->VoteCount;
			if ($this->lblVoteCount) $this->lblVoteCount->Text = $this->objIssue->VoteCount;

			if ($this->lstTopicLink) {
				$this->lstTopicLink->RemoveAllItems();
				$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
				$objTopicLinkArray = TopicLink::LoadAll();
				if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
					$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
					if ($objTopicLink->IssueId == $this->objIssue->Id)
						$objListItem->Selected = true;
					$this->lstTopicLink->AddItem($objListItem);
				}
			}
			if ($this->lblTopicLink) $this->lblTopicLink->Text = ($this->objIssue->TopicLink) ? $this->objIssue->TopicLink->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Issue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssue() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIssuePriorityType) $this->objIssue->IssuePriorityTypeId = $this->lstIssuePriorityType->SelectedValue;
				if ($this->lstIssueStatusType) $this->objIssue->IssueStatusTypeId = $this->lstIssueStatusType->SelectedValue;
				if ($this->lstIssueResolutionType) $this->objIssue->IssueResolutionTypeId = $this->lstIssueResolutionType->SelectedValue;
				if ($this->txtTitle) $this->objIssue->Title = $this->txtTitle->Text;
				if ($this->txtExampleCode) $this->objIssue->ExampleCode = $this->txtExampleCode->Text;
				if ($this->txtExampleTemplate) $this->objIssue->ExampleTemplate = $this->txtExampleTemplate->Text;
				if ($this->txtExampleData) $this->objIssue->ExampleData = $this->txtExampleData->Text;
				if ($this->txtExpectedOutput) $this->objIssue->ExpectedOutput = $this->txtExpectedOutput->Text;
				if ($this->txtActualOutput) $this->objIssue->ActualOutput = $this->txtActualOutput->Text;
				if ($this->lstPostedByPerson) $this->objIssue->PostedByPersonId = $this->lstPostedByPerson->SelectedValue;
				if ($this->lstAssignedToPerson) $this->objIssue->AssignedToPersonId = $this->lstAssignedToPerson->SelectedValue;
				if ($this->calPostDate) $this->objIssue->PostDate = $this->calPostDate->DateTime;
				if ($this->calAssignedDate) $this->objIssue->AssignedDate = $this->calAssignedDate->DateTime;
				if ($this->calDueDate) $this->objIssue->DueDate = $this->calDueDate->DateTime;
				if ($this->txtVoteCount) $this->objIssue->VoteCount = $this->txtVoteCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstTopicLink) $this->objIssue->TopicLink = TopicLink::Load($this->lstTopicLink->SelectedValue);

				// Save the Issue object
				$this->objIssue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Issue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssue() {
			$this->objIssue->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'Issue': return $this->objIssue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Issue fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IssuePriorityTypeIdControl':
					if (!$this->lstIssuePriorityType) return $this->lstIssuePriorityType_Create();
					return $this->lstIssuePriorityType;
				case 'IssuePriorityTypeIdLabel':
					if (!$this->lblIssuePriorityTypeId) return $this->lblIssuePriorityTypeId_Create();
					return $this->lblIssuePriorityTypeId;
				case 'IssueStatusTypeIdControl':
					if (!$this->lstIssueStatusType) return $this->lstIssueStatusType_Create();
					return $this->lstIssueStatusType;
				case 'IssueStatusTypeIdLabel':
					if (!$this->lblIssueStatusTypeId) return $this->lblIssueStatusTypeId_Create();
					return $this->lblIssueStatusTypeId;
				case 'IssueResolutionTypeIdControl':
					if (!$this->lstIssueResolutionType) return $this->lstIssueResolutionType_Create();
					return $this->lstIssueResolutionType;
				case 'IssueResolutionTypeIdLabel':
					if (!$this->lblIssueResolutionTypeId) return $this->lblIssueResolutionTypeId_Create();
					return $this->lblIssueResolutionTypeId;
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'ExampleCodeControl':
					if (!$this->txtExampleCode) return $this->txtExampleCode_Create();
					return $this->txtExampleCode;
				case 'ExampleCodeLabel':
					if (!$this->lblExampleCode) return $this->lblExampleCode_Create();
					return $this->lblExampleCode;
				case 'ExampleTemplateControl':
					if (!$this->txtExampleTemplate) return $this->txtExampleTemplate_Create();
					return $this->txtExampleTemplate;
				case 'ExampleTemplateLabel':
					if (!$this->lblExampleTemplate) return $this->lblExampleTemplate_Create();
					return $this->lblExampleTemplate;
				case 'ExampleDataControl':
					if (!$this->txtExampleData) return $this->txtExampleData_Create();
					return $this->txtExampleData;
				case 'ExampleDataLabel':
					if (!$this->lblExampleData) return $this->lblExampleData_Create();
					return $this->lblExampleData;
				case 'ExpectedOutputControl':
					if (!$this->txtExpectedOutput) return $this->txtExpectedOutput_Create();
					return $this->txtExpectedOutput;
				case 'ExpectedOutputLabel':
					if (!$this->lblExpectedOutput) return $this->lblExpectedOutput_Create();
					return $this->lblExpectedOutput;
				case 'ActualOutputControl':
					if (!$this->txtActualOutput) return $this->txtActualOutput_Create();
					return $this->txtActualOutput;
				case 'ActualOutputLabel':
					if (!$this->lblActualOutput) return $this->lblActualOutput_Create();
					return $this->lblActualOutput;
				case 'PostedByPersonIdControl':
					if (!$this->lstPostedByPerson) return $this->lstPostedByPerson_Create();
					return $this->lstPostedByPerson;
				case 'PostedByPersonIdLabel':
					if (!$this->lblPostedByPersonId) return $this->lblPostedByPersonId_Create();
					return $this->lblPostedByPersonId;
				case 'AssignedToPersonIdControl':
					if (!$this->lstAssignedToPerson) return $this->lstAssignedToPerson_Create();
					return $this->lstAssignedToPerson;
				case 'AssignedToPersonIdLabel':
					if (!$this->lblAssignedToPersonId) return $this->lblAssignedToPersonId_Create();
					return $this->lblAssignedToPersonId;
				case 'PostDateControl':
					if (!$this->calPostDate) return $this->calPostDate_Create();
					return $this->calPostDate;
				case 'PostDateLabel':
					if (!$this->lblPostDate) return $this->lblPostDate_Create();
					return $this->lblPostDate;
				case 'AssignedDateControl':
					if (!$this->calAssignedDate) return $this->calAssignedDate_Create();
					return $this->calAssignedDate;
				case 'AssignedDateLabel':
					if (!$this->lblAssignedDate) return $this->lblAssignedDate_Create();
					return $this->lblAssignedDate;
				case 'DueDateControl':
					if (!$this->calDueDate) return $this->calDueDate_Create();
					return $this->calDueDate;
				case 'DueDateLabel':
					if (!$this->lblDueDate) return $this->lblDueDate_Create();
					return $this->lblDueDate;
				case 'VoteCountControl':
					if (!$this->txtVoteCount) return $this->txtVoteCount_Create();
					return $this->txtVoteCount;
				case 'VoteCountLabel':
					if (!$this->lblVoteCount) return $this->lblVoteCount_Create();
					return $this->lblVoteCount;
				case 'TopicLinkControl':
					if (!$this->lstTopicLink) return $this->lstTopicLink_Create();
					return $this->lstTopicLink;
				case 'TopicLinkLabel':
					if (!$this->lblTopicLink) return $this->lblTopicLink_Create();
					return $this->lblTopicLink;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to Issue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IssuePriorityTypeIdControl':
						return ($this->lstIssuePriorityType = QType::Cast($mixValue, 'QControl'));
					case 'IssueStatusTypeIdControl':
						return ($this->lstIssueStatusType = QType::Cast($mixValue, 'QControl'));
					case 'IssueResolutionTypeIdControl':
						return ($this->lstIssueResolutionType = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'ExampleCodeControl':
						return ($this->txtExampleCode = QType::Cast($mixValue, 'QControl'));
					case 'ExampleTemplateControl':
						return ($this->txtExampleTemplate = QType::Cast($mixValue, 'QControl'));
					case 'ExampleDataControl':
						return ($this->txtExampleData = QType::Cast($mixValue, 'QControl'));
					case 'ExpectedOutputControl':
						return ($this->txtExpectedOutput = QType::Cast($mixValue, 'QControl'));
					case 'ActualOutputControl':
						return ($this->txtActualOutput = QType::Cast($mixValue, 'QControl'));
					case 'PostedByPersonIdControl':
						return ($this->lstPostedByPerson = QType::Cast($mixValue, 'QControl'));
					case 'AssignedToPersonIdControl':
						return ($this->lstAssignedToPerson = QType::Cast($mixValue, 'QControl'));
					case 'PostDateControl':
						return ($this->calPostDate = QType::Cast($mixValue, 'QControl'));
					case 'AssignedDateControl':
						return ($this->calAssignedDate = QType::Cast($mixValue, 'QControl'));
					case 'DueDateControl':
						return ($this->calDueDate = QType::Cast($mixValue, 'QControl'));
					case 'VoteCountControl':
						return ($this->txtVoteCount = QType::Cast($mixValue, 'QControl'));
					case 'TopicLinkControl':
						return ($this->lstTopicLink = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>