<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IssueVote class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IssueVote object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueVoteMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read IssueVote $IssueVote the actual IssueVote data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IssueIdControl
	 * property-read QLabel $IssueIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $VoteDateControl
	 * property-read QLabel $VoteDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueVoteMetaControlGen extends QBaseClass {
		// General Variables
		protected $objIssueVote;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of IssueVote's individual data fields
		protected $lblId;
		protected $lstIssue;
		protected $lstPerson;
		protected $calVoteDate;

		// Controls that allow the viewing of IssueVote's individual data fields
		protected $lblIssueId;
		protected $lblPersonId;
		protected $lblVoteDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueVoteMetaControl to edit a single IssueVote object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IssueVote object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueVoteMetaControl
		 * @param IssueVote $objIssueVote new or existing IssueVote object
		 */
		 public function __construct($objParentObject, IssueVote $objIssueVote) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueVoteMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IssueVote object
			$this->objIssueVote = $objIssueVote;

			// Figure out if we're Editing or Creating New
			if ($this->objIssueVote->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueVoteMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IssueVote object creation - defaults to CreateOrEdit
 		 * @return IssueVoteMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssueVote = IssueVote::Load($intId);

				// IssueVote was found -- return it!
				if ($objIssueVote)
					return new IssueVoteMetaControl($objParentObject, $objIssueVote);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IssueVote object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueVoteMetaControl($objParentObject, new IssueVote());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueVoteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueVote object creation - defaults to CreateOrEdit
		 * @return IssueVoteMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueVoteMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueVoteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueVote object creation - defaults to CreateOrEdit
		 * @return IssueVoteMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueVoteMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIssueVote->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIssue
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIssue_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIssue = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssue->Name = QApplication::Translate('Issue');
			$this->lstIssue->Required = true;
			if (!$this->blnEditMode)
				$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIssueCursor = Issue::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIssue = Issue::InstantiateCursor($objIssueCursor)) {
				$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
				if (($this->objIssueVote->Issue) && ($this->objIssueVote->Issue->Id == $objIssue->Id))
					$objListItem->Selected = true;
				$this->lstIssue->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstIssue;
		}

		/**
		 * Create and setup QLabel lblIssueId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueId_Create($strControlId = null) {
			$this->lblIssueId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueId->Name = QApplication::Translate('Issue');
			$this->lblIssueId->Text = ($this->objIssueVote->Issue) ? $this->objIssueVote->Issue->__toString() : null;
			$this->lblIssueId->Required = true;
			return $this->lblIssueId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objIssueVote->Person) && ($this->objIssueVote->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objIssueVote->Person) ? $this->objIssueVote->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calVoteDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calVoteDate_Create($strControlId = null) {
			$this->calVoteDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calVoteDate->Name = QApplication::Translate('Vote Date');
			$this->calVoteDate->DateTime = $this->objIssueVote->VoteDate;
			$this->calVoteDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calVoteDate->Required = true;
			return $this->calVoteDate;
		}

		/**
		 * Create and setup QLabel lblVoteDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblVoteDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblVoteDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblVoteDate->Name = QApplication::Translate('Vote Date');
			$this->strVoteDateDateTimeFormat = $strDateTimeFormat;
			$this->lblVoteDate->Text = sprintf($this->objIssueVote->VoteDate) ? $this->objIssueVote->VoteDate->__toString($this->strVoteDateDateTimeFormat) : null;
			$this->lblVoteDate->Required = true;
			return $this->lblVoteDate;
		}

		protected $strVoteDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local IssueVote object.
		 * @param boolean $blnReload reload IssueVote from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssueVote->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssueVote->Id;

			if ($this->lstIssue) {
					$this->lstIssue->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueArray = Issue::LoadAll();
				if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
					$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
					if (($this->objIssueVote->Issue) && ($this->objIssueVote->Issue->Id == $objIssue->Id))
						$objListItem->Selected = true;
					$this->lstIssue->AddItem($objListItem);
				}
			}
			if ($this->lblIssueId) $this->lblIssueId->Text = ($this->objIssueVote->Issue) ? $this->objIssueVote->Issue->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objIssueVote->Person) && ($this->objIssueVote->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objIssueVote->Person) ? $this->objIssueVote->Person->__toString() : null;

			if ($this->calVoteDate) $this->calVoteDate->DateTime = $this->objIssueVote->VoteDate;
			if ($this->lblVoteDate) $this->lblVoteDate->Text = sprintf($this->objIssueVote->VoteDate) ? $this->objIssueVote->__toString($this->strVoteDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUEVOTE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IssueVote instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssueVote() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIssue) $this->objIssueVote->IssueId = $this->lstIssue->SelectedValue;
				if ($this->lstPerson) $this->objIssueVote->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calVoteDate) $this->objIssueVote->VoteDate = $this->calVoteDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IssueVote object
				$this->objIssueVote->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IssueVote instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssueVote() {
			$this->objIssueVote->Delete();
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
				case 'IssueVote': return $this->objIssueVote;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IssueVote fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IssueIdControl':
					if (!$this->lstIssue) return $this->lstIssue_Create();
					return $this->lstIssue;
				case 'IssueIdLabel':
					if (!$this->lblIssueId) return $this->lblIssueId_Create();
					return $this->lblIssueId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'VoteDateControl':
					if (!$this->calVoteDate) return $this->calVoteDate_Create();
					return $this->calVoteDate;
				case 'VoteDateLabel':
					if (!$this->lblVoteDate) return $this->lblVoteDate_Create();
					return $this->lblVoteDate;
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
					// Controls that point to IssueVote fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IssueIdControl':
						return ($this->lstIssue = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'VoteDateControl':
						return ($this->calVoteDate = QType::Cast($mixValue, 'QControl'));
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