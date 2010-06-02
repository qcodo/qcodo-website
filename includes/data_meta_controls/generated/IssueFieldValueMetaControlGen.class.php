<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IssueFieldValue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IssueFieldValue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueFieldValueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read IssueFieldValue $IssueFieldValue the actual IssueFieldValue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IssueIdControl
	 * property-read QLabel $IssueIdLabel
	 * property QListBox $IssueFieldIdControl
	 * property-read QLabel $IssueFieldIdLabel
	 * property QListBox $IssueFieldOptionIdControl
	 * property-read QLabel $IssueFieldOptionIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueFieldValueMetaControlGen extends QBaseClass {
		// General Variables
		protected $objIssueFieldValue;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of IssueFieldValue's individual data fields
		protected $lblId;
		protected $lstIssue;
		protected $lstIssueField;
		protected $lstIssueFieldOption;

		// Controls that allow the viewing of IssueFieldValue's individual data fields
		protected $lblIssueId;
		protected $lblIssueFieldId;
		protected $lblIssueFieldOptionId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueFieldValueMetaControl to edit a single IssueFieldValue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IssueFieldValue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldValueMetaControl
		 * @param IssueFieldValue $objIssueFieldValue new or existing IssueFieldValue object
		 */
		 public function __construct($objParentObject, IssueFieldValue $objIssueFieldValue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueFieldValueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IssueFieldValue object
			$this->objIssueFieldValue = $objIssueFieldValue;

			// Figure out if we're Editing or Creating New
			if ($this->objIssueFieldValue->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldValueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldValue object creation - defaults to CreateOrEdit
 		 * @return IssueFieldValueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssueFieldValue = IssueFieldValue::Load($intId);

				// IssueFieldValue was found -- return it!
				if ($objIssueFieldValue)
					return new IssueFieldValueMetaControl($objParentObject, $objIssueFieldValue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IssueFieldValue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueFieldValueMetaControl($objParentObject, new IssueFieldValue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldValue object creation - defaults to CreateOrEdit
		 * @return IssueFieldValueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueFieldValueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldValue object creation - defaults to CreateOrEdit
		 * @return IssueFieldValueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueFieldValueMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIssueFieldValue->Id;
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
				if (($this->objIssueFieldValue->Issue) && ($this->objIssueFieldValue->Issue->Id == $objIssue->Id))
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
			$this->lblIssueId->Text = ($this->objIssueFieldValue->Issue) ? $this->objIssueFieldValue->Issue->__toString() : null;
			$this->lblIssueId->Required = true;
			return $this->lblIssueId;
		}

		/**
		 * Create and setup QListBox lstIssueField
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIssueField_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIssueField = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssueField->Name = QApplication::Translate('Issue Field');
			$this->lstIssueField->Required = true;
			if (!$this->blnEditMode)
				$this->lstIssueField->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIssueFieldCursor = IssueField::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIssueField = IssueField::InstantiateCursor($objIssueFieldCursor)) {
				$objListItem = new QListItem($objIssueField->__toString(), $objIssueField->Id);
				if (($this->objIssueFieldValue->IssueField) && ($this->objIssueFieldValue->IssueField->Id == $objIssueField->Id))
					$objListItem->Selected = true;
				$this->lstIssueField->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstIssueField;
		}

		/**
		 * Create and setup QLabel lblIssueFieldId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueFieldId_Create($strControlId = null) {
			$this->lblIssueFieldId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueFieldId->Name = QApplication::Translate('Issue Field');
			$this->lblIssueFieldId->Text = ($this->objIssueFieldValue->IssueField) ? $this->objIssueFieldValue->IssueField->__toString() : null;
			$this->lblIssueFieldId->Required = true;
			return $this->lblIssueFieldId;
		}

		/**
		 * Create and setup QListBox lstIssueFieldOption
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIssueFieldOption_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIssueFieldOption = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssueFieldOption->Name = QApplication::Translate('Issue Field Option');
			$this->lstIssueFieldOption->Required = true;
			if (!$this->blnEditMode)
				$this->lstIssueFieldOption->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIssueFieldOptionCursor = IssueFieldOption::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIssueFieldOption = IssueFieldOption::InstantiateCursor($objIssueFieldOptionCursor)) {
				$objListItem = new QListItem($objIssueFieldOption->__toString(), $objIssueFieldOption->Id);
				if (($this->objIssueFieldValue->IssueFieldOption) && ($this->objIssueFieldValue->IssueFieldOption->Id == $objIssueFieldOption->Id))
					$objListItem->Selected = true;
				$this->lstIssueFieldOption->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstIssueFieldOption;
		}

		/**
		 * Create and setup QLabel lblIssueFieldOptionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueFieldOptionId_Create($strControlId = null) {
			$this->lblIssueFieldOptionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueFieldOptionId->Name = QApplication::Translate('Issue Field Option');
			$this->lblIssueFieldOptionId->Text = ($this->objIssueFieldValue->IssueFieldOption) ? $this->objIssueFieldValue->IssueFieldOption->__toString() : null;
			$this->lblIssueFieldOptionId->Required = true;
			return $this->lblIssueFieldOptionId;
		}



		/**
		 * Refresh this MetaControl with Data from the local IssueFieldValue object.
		 * @param boolean $blnReload reload IssueFieldValue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssueFieldValue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssueFieldValue->Id;

			if ($this->lstIssue) {
					$this->lstIssue->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueArray = Issue::LoadAll();
				if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
					$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
					if (($this->objIssueFieldValue->Issue) && ($this->objIssueFieldValue->Issue->Id == $objIssue->Id))
						$objListItem->Selected = true;
					$this->lstIssue->AddItem($objListItem);
				}
			}
			if ($this->lblIssueId) $this->lblIssueId->Text = ($this->objIssueFieldValue->Issue) ? $this->objIssueFieldValue->Issue->__toString() : null;

			if ($this->lstIssueField) {
					$this->lstIssueField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssueField->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueFieldArray = IssueField::LoadAll();
				if ($objIssueFieldArray) foreach ($objIssueFieldArray as $objIssueField) {
					$objListItem = new QListItem($objIssueField->__toString(), $objIssueField->Id);
					if (($this->objIssueFieldValue->IssueField) && ($this->objIssueFieldValue->IssueField->Id == $objIssueField->Id))
						$objListItem->Selected = true;
					$this->lstIssueField->AddItem($objListItem);
				}
			}
			if ($this->lblIssueFieldId) $this->lblIssueFieldId->Text = ($this->objIssueFieldValue->IssueField) ? $this->objIssueFieldValue->IssueField->__toString() : null;

			if ($this->lstIssueFieldOption) {
					$this->lstIssueFieldOption->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssueFieldOption->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueFieldOptionArray = IssueFieldOption::LoadAll();
				if ($objIssueFieldOptionArray) foreach ($objIssueFieldOptionArray as $objIssueFieldOption) {
					$objListItem = new QListItem($objIssueFieldOption->__toString(), $objIssueFieldOption->Id);
					if (($this->objIssueFieldValue->IssueFieldOption) && ($this->objIssueFieldValue->IssueFieldOption->Id == $objIssueFieldOption->Id))
						$objListItem->Selected = true;
					$this->lstIssueFieldOption->AddItem($objListItem);
				}
			}
			if ($this->lblIssueFieldOptionId) $this->lblIssueFieldOptionId->Text = ($this->objIssueFieldValue->IssueFieldOption) ? $this->objIssueFieldValue->IssueFieldOption->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUEFIELDVALUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IssueFieldValue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssueFieldValue() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIssue) $this->objIssueFieldValue->IssueId = $this->lstIssue->SelectedValue;
				if ($this->lstIssueField) $this->objIssueFieldValue->IssueFieldId = $this->lstIssueField->SelectedValue;
				if ($this->lstIssueFieldOption) $this->objIssueFieldValue->IssueFieldOptionId = $this->lstIssueFieldOption->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IssueFieldValue object
				$this->objIssueFieldValue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IssueFieldValue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssueFieldValue() {
			$this->objIssueFieldValue->Delete();
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
				case 'IssueFieldValue': return $this->objIssueFieldValue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IssueFieldValue fields -- will be created dynamically if not yet created
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
				case 'IssueFieldIdControl':
					if (!$this->lstIssueField) return $this->lstIssueField_Create();
					return $this->lstIssueField;
				case 'IssueFieldIdLabel':
					if (!$this->lblIssueFieldId) return $this->lblIssueFieldId_Create();
					return $this->lblIssueFieldId;
				case 'IssueFieldOptionIdControl':
					if (!$this->lstIssueFieldOption) return $this->lstIssueFieldOption_Create();
					return $this->lstIssueFieldOption;
				case 'IssueFieldOptionIdLabel':
					if (!$this->lblIssueFieldOptionId) return $this->lblIssueFieldOptionId_Create();
					return $this->lblIssueFieldOptionId;
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
					// Controls that point to IssueFieldValue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IssueIdControl':
						return ($this->lstIssue = QType::Cast($mixValue, 'QControl'));
					case 'IssueFieldIdControl':
						return ($this->lstIssueField = QType::Cast($mixValue, 'QControl'));
					case 'IssueFieldOptionIdControl':
						return ($this->lstIssueFieldOption = QType::Cast($mixValue, 'QControl'));
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