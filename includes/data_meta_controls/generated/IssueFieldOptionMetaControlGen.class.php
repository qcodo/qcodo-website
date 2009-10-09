<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IssueFieldOption class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IssueFieldOption object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueFieldOptionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read IssueFieldOption $IssueFieldOption the actual IssueFieldOption data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IssueFieldIdControl
	 * property-read QLabel $IssueFieldIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueFieldOptionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objIssueFieldOption;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of IssueFieldOption's individual data fields
		protected $lblId;
		protected $lstIssueField;
		protected $txtName;
		protected $txtToken;
		protected $txtOrderNumber;
		protected $chkActiveFlag;

		// Controls that allow the viewing of IssueFieldOption's individual data fields
		protected $lblIssueFieldId;
		protected $lblName;
		protected $lblToken;
		protected $lblOrderNumber;
		protected $lblActiveFlag;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueFieldOptionMetaControl to edit a single IssueFieldOption object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IssueFieldOption object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldOptionMetaControl
		 * @param IssueFieldOption $objIssueFieldOption new or existing IssueFieldOption object
		 */
		 public function __construct($objParentObject, IssueFieldOption $objIssueFieldOption) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueFieldOptionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IssueFieldOption object
			$this->objIssueFieldOption = $objIssueFieldOption;

			// Figure out if we're Editing or Creating New
			if ($this->objIssueFieldOption->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldOptionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldOption object creation - defaults to CreateOrEdit
 		 * @return IssueFieldOptionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssueFieldOption = IssueFieldOption::Load($intId);

				// IssueFieldOption was found -- return it!
				if ($objIssueFieldOption)
					return new IssueFieldOptionMetaControl($objParentObject, $objIssueFieldOption);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IssueFieldOption object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueFieldOptionMetaControl($objParentObject, new IssueFieldOption());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldOptionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldOption object creation - defaults to CreateOrEdit
		 * @return IssueFieldOptionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueFieldOptionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldOptionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueFieldOption object creation - defaults to CreateOrEdit
		 * @return IssueFieldOptionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueFieldOptionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIssueFieldOption->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIssueField
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssueField_Create($strControlId = null) {
			$this->lstIssueField = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssueField->Name = QApplication::Translate('Issue Field');
			$this->lstIssueField->Required = true;
			if (!$this->blnEditMode)
				$this->lstIssueField->AddItem(QApplication::Translate('- Select One -'), null);
			$objIssueFieldArray = IssueField::LoadAll();
			if ($objIssueFieldArray) foreach ($objIssueFieldArray as $objIssueField) {
				$objListItem = new QListItem($objIssueField->__toString(), $objIssueField->Id);
				if (($this->objIssueFieldOption->IssueField) && ($this->objIssueFieldOption->IssueField->Id == $objIssueField->Id))
					$objListItem->Selected = true;
				$this->lstIssueField->AddItem($objListItem);
			}
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
			$this->lblIssueFieldId->Text = ($this->objIssueFieldOption->IssueField) ? $this->objIssueFieldOption->IssueField->__toString() : null;
			$this->lblIssueFieldId->Required = true;
			return $this->lblIssueFieldId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objIssueFieldOption->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = IssueFieldOption::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objIssueFieldOption->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objIssueFieldOption->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = IssueFieldOption::TokenMaxLength;
			return $this->txtToken;
		}

		/**
		 * Create and setup QLabel lblToken
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToken_Create($strControlId = null) {
			$this->lblToken = new QLabel($this->objParentObject, $strControlId);
			$this->lblToken->Name = QApplication::Translate('Token');
			$this->lblToken->Text = $this->objIssueFieldOption->Token;
			$this->lblToken->Required = true;
			return $this->lblToken;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrderNumber_Create($strControlId = null) {
			$this->txtOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrderNumber->Name = QApplication::Translate('Order Number');
			$this->txtOrderNumber->Text = $this->objIssueFieldOption->OrderNumber;
			return $this->txtOrderNumber;
		}

		/**
		 * Create and setup QLabel lblOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblOrderNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblOrderNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrderNumber->Name = QApplication::Translate('Order Number');
			$this->lblOrderNumber->Text = $this->objIssueFieldOption->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objIssueFieldOption->ActiveFlag;
			return $this->chkActiveFlag;
		}

		/**
		 * Create and setup QLabel lblActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActiveFlag_Create($strControlId = null) {
			$this->lblActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->lblActiveFlag->Text = ($this->objIssueFieldOption->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local IssueFieldOption object.
		 * @param boolean $blnReload reload IssueFieldOption from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssueFieldOption->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssueFieldOption->Id;

			if ($this->lstIssueField) {
					$this->lstIssueField->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssueField->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueFieldArray = IssueField::LoadAll();
				if ($objIssueFieldArray) foreach ($objIssueFieldArray as $objIssueField) {
					$objListItem = new QListItem($objIssueField->__toString(), $objIssueField->Id);
					if (($this->objIssueFieldOption->IssueField) && ($this->objIssueFieldOption->IssueField->Id == $objIssueField->Id))
						$objListItem->Selected = true;
					$this->lstIssueField->AddItem($objListItem);
				}
			}
			if ($this->lblIssueFieldId) $this->lblIssueFieldId->Text = ($this->objIssueFieldOption->IssueField) ? $this->objIssueFieldOption->IssueField->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objIssueFieldOption->Name;
			if ($this->lblName) $this->lblName->Text = $this->objIssueFieldOption->Name;

			if ($this->txtToken) $this->txtToken->Text = $this->objIssueFieldOption->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objIssueFieldOption->Token;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objIssueFieldOption->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objIssueFieldOption->OrderNumber;

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objIssueFieldOption->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objIssueFieldOption->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUEFIELDOPTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IssueFieldOption instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssueFieldOption() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIssueField) $this->objIssueFieldOption->IssueFieldId = $this->lstIssueField->SelectedValue;
				if ($this->txtName) $this->objIssueFieldOption->Name = $this->txtName->Text;
				if ($this->txtToken) $this->objIssueFieldOption->Token = $this->txtToken->Text;
				if ($this->txtOrderNumber) $this->objIssueFieldOption->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->chkActiveFlag) $this->objIssueFieldOption->ActiveFlag = $this->chkActiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IssueFieldOption object
				$this->objIssueFieldOption->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IssueFieldOption instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssueFieldOption() {
			$this->objIssueFieldOption->Delete();
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
				case 'IssueFieldOption': return $this->objIssueFieldOption;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IssueFieldOption fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IssueFieldIdControl':
					if (!$this->lstIssueField) return $this->lstIssueField_Create();
					return $this->lstIssueField;
				case 'IssueFieldIdLabel':
					if (!$this->lblIssueFieldId) return $this->lblIssueFieldId_Create();
					return $this->lblIssueFieldId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'OrderNumberControl':
					if (!$this->txtOrderNumber) return $this->txtOrderNumber_Create();
					return $this->txtOrderNumber;
				case 'OrderNumberLabel':
					if (!$this->lblOrderNumber) return $this->lblOrderNumber_Create();
					return $this->lblOrderNumber;
				case 'ActiveFlagControl':
					if (!$this->chkActiveFlag) return $this->chkActiveFlag_Create();
					return $this->chkActiveFlag;
				case 'ActiveFlagLabel':
					if (!$this->lblActiveFlag) return $this->lblActiveFlag_Create();
					return $this->lblActiveFlag;
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
					// Controls that point to IssueFieldOption fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IssueFieldIdControl':
						return ($this->lstIssueField = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'ActiveFlagControl':
						return ($this->chkActiveFlag = QType::Cast($mixValue, 'QControl'));
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