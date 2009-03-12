<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DownloadCategory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DownloadCategory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DownloadCategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */

	class DownloadCategoryMetaControl extends QBaseClass {
		// General Variables
		protected $objDownloadCategory;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of DownloadCategory's individual data fields
		protected $lblId;
		protected $txtOrderNumber;
		protected $txtName;
		protected $chkAnnounceOnlyFlag;
		protected $txtDescription;
		protected $txtNote;
		protected $calLastPostDate;

		// Controls that allow the viewing of DownloadCategory's individual data fields
		protected $lblOrderNumber;
		protected $lblName;
		protected $lblAnnounceOnlyFlag;
		protected $lblDescription;
		protected $lblNote;
		protected $lblLastPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DownloadCategoryMetaControl to edit a single DownloadCategory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DownloadCategory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadCategoryMetaControl
		 * @param DownloadCategory $objDownloadCategory new or existing DownloadCategory object
		 */
		 public function __construct($objParentObject, DownloadCategory $objDownloadCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DownloadCategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DownloadCategory object
			$this->objDownloadCategory = $objDownloadCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objDownloadCategory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadCategoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DownloadCategory object creation - defaults to CreateOrEdit
 		 * @return DownloadCategoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objDownloadCategory = DownloadCategory::Load($intId);

				// DownloadCategory was found -- return it!
				if ($objDownloadCategory)
					return new DownloadCategoryMetaControl($objParentObject, $objDownloadCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DownloadCategory object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DownloadCategoryMetaControl($objParentObject, new DownloadCategory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DownloadCategory object creation - defaults to CreateOrEdit
		 * @return DownloadCategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return DownloadCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DownloadCategory object creation - defaults to CreateOrEdit
		 * @return DownloadCategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return DownloadCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objDownloadCategory->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrderNumber_Create($strControlId = null) {
			$this->txtOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrderNumber->Name = QApplication::Translate('Order Number');
			$this->txtOrderNumber->Text = $this->objDownloadCategory->OrderNumber;
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
			$this->lblOrderNumber->Text = $this->objDownloadCategory->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objDownloadCategory->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = DownloadCategory::NameMaxLength;
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
			$this->lblName->Text = $this->objDownloadCategory->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QCheckBox chkAnnounceOnlyFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAnnounceOnlyFlag_Create($strControlId = null) {
			$this->chkAnnounceOnlyFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAnnounceOnlyFlag->Name = QApplication::Translate('Announce Only Flag');
			$this->chkAnnounceOnlyFlag->Checked = $this->objDownloadCategory->AnnounceOnlyFlag;
			return $this->chkAnnounceOnlyFlag;
		}

		/**
		 * Create and setup QLabel lblAnnounceOnlyFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAnnounceOnlyFlag_Create($strControlId = null) {
			$this->lblAnnounceOnlyFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAnnounceOnlyFlag->Name = QApplication::Translate('Announce Only Flag');
			$this->lblAnnounceOnlyFlag->Text = ($this->objDownloadCategory->AnnounceOnlyFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAnnounceOnlyFlag;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objDownloadCategory->Description;
			$this->txtDescription->MaxLength = DownloadCategory::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objDownloadCategory->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtNote
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNote_Create($strControlId = null) {
			$this->txtNote = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->Text = $this->objDownloadCategory->Note;
			$this->txtNote->MaxLength = DownloadCategory::NoteMaxLength;
			return $this->txtNote;
		}

		/**
		 * Create and setup QLabel lblNote
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNote_Create($strControlId = null) {
			$this->lblNote = new QLabel($this->objParentObject, $strControlId);
			$this->lblNote->Name = QApplication::Translate('Note');
			$this->lblNote->Text = $this->objDownloadCategory->Note;
			return $this->lblNote;
		}

		/**
		 * Create and setup QDateTimePicker calLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastPostDate_Create($strControlId = null) {
			$this->calLastPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->calLastPostDate->DateTime = $this->objDownloadCategory->LastPostDate;
			$this->calLastPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calLastPostDate;
		}

		/**
		 * Create and setup QLabel lblLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblLastPostDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblLastPostDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->strLastPostDateDateTimeFormat = $strDateTimeFormat;
			$this->lblLastPostDate->Text = sprintf($this->objDownloadCategory->LastPostDate) ? $this->objDownloadCategory->__toString($this->strLastPostDateDateTimeFormat) : null;
			return $this->lblLastPostDate;
		}

		protected $strLastPostDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local DownloadCategory object.
		 * @param boolean $blnReload reload DownloadCategory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDownloadCategory->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objDownloadCategory->Id;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objDownloadCategory->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objDownloadCategory->OrderNumber;

			if ($this->txtName) $this->txtName->Text = $this->objDownloadCategory->Name;
			if ($this->lblName) $this->lblName->Text = $this->objDownloadCategory->Name;

			if ($this->chkAnnounceOnlyFlag) $this->chkAnnounceOnlyFlag->Checked = $this->objDownloadCategory->AnnounceOnlyFlag;
			if ($this->lblAnnounceOnlyFlag) $this->lblAnnounceOnlyFlag->Text = ($this->objDownloadCategory->AnnounceOnlyFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtDescription) $this->txtDescription->Text = $this->objDownloadCategory->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objDownloadCategory->Description;

			if ($this->txtNote) $this->txtNote->Text = $this->objDownloadCategory->Note;
			if ($this->lblNote) $this->lblNote->Text = $this->objDownloadCategory->Note;

			if ($this->calLastPostDate) $this->calLastPostDate->DateTime = $this->objDownloadCategory->LastPostDate;
			if ($this->lblLastPostDate) $this->lblLastPostDate->Text = sprintf($this->objDownloadCategory->LastPostDate) ? $this->objDownloadCategory->__toString($this->strLastPostDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DOWNLOADCATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DownloadCategory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDownloadCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtOrderNumber) $this->objDownloadCategory->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->txtName) $this->objDownloadCategory->Name = $this->txtName->Text;
				if ($this->chkAnnounceOnlyFlag) $this->objDownloadCategory->AnnounceOnlyFlag = $this->chkAnnounceOnlyFlag->Checked;
				if ($this->txtDescription) $this->objDownloadCategory->Description = $this->txtDescription->Text;
				if ($this->txtNote) $this->objDownloadCategory->Note = $this->txtNote->Text;
				if ($this->calLastPostDate) $this->objDownloadCategory->LastPostDate = $this->calLastPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DownloadCategory object
				$this->objDownloadCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DownloadCategory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDownloadCategory() {
			$this->objDownloadCategory->Delete();
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
				case 'DownloadCategory': return $this->objDownloadCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DownloadCategory fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'OrderNumberControl':
					if (!$this->txtOrderNumber) return $this->txtOrderNumber_Create();
					return $this->txtOrderNumber;
				case 'OrderNumberLabel':
					if (!$this->lblOrderNumber) return $this->lblOrderNumber_Create();
					return $this->lblOrderNumber;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'AnnounceOnlyFlagControl':
					if (!$this->chkAnnounceOnlyFlag) return $this->chkAnnounceOnlyFlag_Create();
					return $this->chkAnnounceOnlyFlag;
				case 'AnnounceOnlyFlagLabel':
					if (!$this->lblAnnounceOnlyFlag) return $this->lblAnnounceOnlyFlag_Create();
					return $this->lblAnnounceOnlyFlag;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'NoteControl':
					if (!$this->txtNote) return $this->txtNote_Create();
					return $this->txtNote;
				case 'NoteLabel':
					if (!$this->lblNote) return $this->lblNote_Create();
					return $this->lblNote;
				case 'LastPostDateControl':
					if (!$this->calLastPostDate) return $this->calLastPostDate_Create();
					return $this->calLastPostDate;
				case 'LastPostDateLabel':
					if (!$this->lblLastPostDate) return $this->lblLastPostDate_Create();
					return $this->lblLastPostDate;
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
					// Controls that point to DownloadCategory fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'AnnounceOnlyFlagControl':
						return ($this->chkAnnounceOnlyFlag = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'NoteControl':
						return ($this->txtNote = QType::Cast($mixValue, 'QControl'));
					case 'LastPostDateControl':
						return ($this->calLastPostDate = QType::Cast($mixValue, 'QControl'));
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