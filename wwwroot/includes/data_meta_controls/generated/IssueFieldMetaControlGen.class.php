<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IssueField class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IssueField object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueFieldMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read IssueField $IssueField the actual IssueField data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QCheckBox $RequiredFlagControl
	 * property-read QLabel $RequiredFlagLabel
	 * property QCheckBox $MutableFlagControl
	 * property-read QLabel $MutableFlagLabel
	 * property QCheckBox $ActiveFlagControl
	 * property-read QLabel $ActiveFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueFieldMetaControlGen extends QBaseClass {
		// General Variables
		protected $objIssueField;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of IssueField's individual data fields
		protected $lblId;
		protected $txtName;
		protected $txtToken;
		protected $txtOrderNumber;
		protected $chkRequiredFlag;
		protected $chkMutableFlag;
		protected $chkActiveFlag;

		// Controls that allow the viewing of IssueField's individual data fields
		protected $lblName;
		protected $lblToken;
		protected $lblOrderNumber;
		protected $lblRequiredFlag;
		protected $lblMutableFlag;
		protected $lblActiveFlag;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueFieldMetaControl to edit a single IssueField object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IssueField object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldMetaControl
		 * @param IssueField $objIssueField new or existing IssueField object
		 */
		 public function __construct($objParentObject, IssueField $objIssueField) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueFieldMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IssueField object
			$this->objIssueField = $objIssueField;

			// Figure out if we're Editing or Creating New
			if ($this->objIssueField->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IssueField object creation - defaults to CreateOrEdit
 		 * @return IssueFieldMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssueField = IssueField::Load($intId);

				// IssueField was found -- return it!
				if ($objIssueField)
					return new IssueFieldMetaControl($objParentObject, $objIssueField);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IssueField object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueFieldMetaControl($objParentObject, new IssueField());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueField object creation - defaults to CreateOrEdit
		 * @return IssueFieldMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueFieldMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueFieldMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueField object creation - defaults to CreateOrEdit
		 * @return IssueFieldMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueFieldMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIssueField->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objIssueField->Name;
			$this->txtName->MaxLength = IssueField::NameMaxLength;
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
			$this->lblName->Text = $this->objIssueField->Name;
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
			$this->txtToken->Text = $this->objIssueField->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = IssueField::TokenMaxLength;
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
			$this->lblToken->Text = $this->objIssueField->Token;
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
			$this->txtOrderNumber->Text = $this->objIssueField->OrderNumber;
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
			$this->lblOrderNumber->Text = $this->objIssueField->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QCheckBox chkRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkRequiredFlag_Create($strControlId = null) {
			$this->chkRequiredFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->chkRequiredFlag->Checked = $this->objIssueField->RequiredFlag;
			return $this->chkRequiredFlag;
		}

		/**
		 * Create and setup QLabel lblRequiredFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRequiredFlag_Create($strControlId = null) {
			$this->lblRequiredFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblRequiredFlag->Name = QApplication::Translate('Required Flag');
			$this->lblRequiredFlag->Text = ($this->objIssueField->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblRequiredFlag;
		}

		/**
		 * Create and setup QCheckBox chkMutableFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkMutableFlag_Create($strControlId = null) {
			$this->chkMutableFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkMutableFlag->Name = QApplication::Translate('Mutable Flag');
			$this->chkMutableFlag->Checked = $this->objIssueField->MutableFlag;
			return $this->chkMutableFlag;
		}

		/**
		 * Create and setup QLabel lblMutableFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMutableFlag_Create($strControlId = null) {
			$this->lblMutableFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblMutableFlag->Name = QApplication::Translate('Mutable Flag');
			$this->lblMutableFlag->Text = ($this->objIssueField->MutableFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblMutableFlag;
		}

		/**
		 * Create and setup QCheckBox chkActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActiveFlag_Create($strControlId = null) {
			$this->chkActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActiveFlag->Name = QApplication::Translate('Active Flag');
			$this->chkActiveFlag->Checked = $this->objIssueField->ActiveFlag;
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
			$this->lblActiveFlag->Text = ($this->objIssueField->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActiveFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local IssueField object.
		 * @param boolean $blnReload reload IssueField from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssueField->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssueField->Id;

			if ($this->txtName) $this->txtName->Text = $this->objIssueField->Name;
			if ($this->lblName) $this->lblName->Text = $this->objIssueField->Name;

			if ($this->txtToken) $this->txtToken->Text = $this->objIssueField->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objIssueField->Token;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objIssueField->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objIssueField->OrderNumber;

			if ($this->chkRequiredFlag) $this->chkRequiredFlag->Checked = $this->objIssueField->RequiredFlag;
			if ($this->lblRequiredFlag) $this->lblRequiredFlag->Text = ($this->objIssueField->RequiredFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkMutableFlag) $this->chkMutableFlag->Checked = $this->objIssueField->MutableFlag;
			if ($this->lblMutableFlag) $this->lblMutableFlag->Text = ($this->objIssueField->MutableFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkActiveFlag) $this->chkActiveFlag->Checked = $this->objIssueField->ActiveFlag;
			if ($this->lblActiveFlag) $this->lblActiveFlag->Text = ($this->objIssueField->ActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUEFIELD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IssueField instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssueField() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objIssueField->Name = $this->txtName->Text;
				if ($this->txtToken) $this->objIssueField->Token = $this->txtToken->Text;
				if ($this->txtOrderNumber) $this->objIssueField->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->chkRequiredFlag) $this->objIssueField->RequiredFlag = $this->chkRequiredFlag->Checked;
				if ($this->chkMutableFlag) $this->objIssueField->MutableFlag = $this->chkMutableFlag->Checked;
				if ($this->chkActiveFlag) $this->objIssueField->ActiveFlag = $this->chkActiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IssueField object
				$this->objIssueField->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IssueField instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssueField() {
			$this->objIssueField->Delete();
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
				case 'IssueField': return $this->objIssueField;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IssueField fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
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
				case 'RequiredFlagControl':
					if (!$this->chkRequiredFlag) return $this->chkRequiredFlag_Create();
					return $this->chkRequiredFlag;
				case 'RequiredFlagLabel':
					if (!$this->lblRequiredFlag) return $this->lblRequiredFlag_Create();
					return $this->lblRequiredFlag;
				case 'MutableFlagControl':
					if (!$this->chkMutableFlag) return $this->chkMutableFlag_Create();
					return $this->chkMutableFlag;
				case 'MutableFlagLabel':
					if (!$this->lblMutableFlag) return $this->lblMutableFlag_Create();
					return $this->lblMutableFlag;
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
					// Controls that point to IssueField fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'RequiredFlagControl':
						return ($this->chkRequiredFlag = QType::Cast($mixValue, 'QControl'));
					case 'MutableFlagControl':
						return ($this->chkMutableFlag = QType::Cast($mixValue, 'QControl'));
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