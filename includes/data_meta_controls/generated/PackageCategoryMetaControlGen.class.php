<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PackageCategory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PackageCategory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PackageCategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read PackageCategory $PackageCategory the actual PackageCategory data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ParentPackageCategoryIdControl
	 * property-read QLabel $ParentPackageCategoryIdLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QIntegerTextBox $PackageCountControl
	 * property-read QLabel $PackageCountLabel
	 * property QDateTimePicker $LastPostDateControl
	 * property-read QLabel $LastPostDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PackageCategoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PackageCategory objPackageCategory
		 * @access protected
		 */
		protected $objPackageCategory;

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

		// Controls that allow the editing of PackageCategory's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstParentPackageCategory;
         * @access protected
         */
		protected $lstParentPackageCategory;

        /**
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;

        /**
         * @var QIntegerTextBox txtOrderNumber;
         * @access protected
         */
		protected $txtOrderNumber;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QIntegerTextBox txtPackageCount;
         * @access protected
         */
		protected $txtPackageCount;

        /**
         * @var QDateTimePicker calLastPostDate;
         * @access protected
         */
		protected $calLastPostDate;


		// Controls that allow the viewing of PackageCategory's individual data fields
        /**
         * @var QLabel lblParentPackageCategoryId
         * @access protected
         */
		protected $lblParentPackageCategoryId;

        /**
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;

        /**
         * @var QLabel lblOrderNumber
         * @access protected
         */
		protected $lblOrderNumber;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblPackageCount
         * @access protected
         */
		protected $lblPackageCount;

        /**
         * @var QLabel lblLastPostDate
         * @access protected
         */
		protected $lblLastPostDate;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PackageCategoryMetaControl to edit a single PackageCategory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PackageCategory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageCategoryMetaControl
		 * @param PackageCategory $objPackageCategory new or existing PackageCategory object
		 */
		 public function __construct($objParentObject, PackageCategory $objPackageCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PackageCategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PackageCategory object
			$this->objPackageCategory = $objPackageCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objPackageCategory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageCategoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PackageCategory object creation - defaults to CreateOrEdit
 		 * @return PackageCategoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPackageCategory = PackageCategory::Load($intId);

				// PackageCategory was found -- return it!
				if ($objPackageCategory)
					return new PackageCategoryMetaControl($objParentObject, $objPackageCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PackageCategory object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PackageCategoryMetaControl($objParentObject, new PackageCategory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageCategory object creation - defaults to CreateOrEdit
		 * @return PackageCategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PackageCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageCategory object creation - defaults to CreateOrEdit
		 * @return PackageCategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PackageCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPackageCategory->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstParentPackageCategory
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPackageCategory_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPackageCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPackageCategory->Name = QApplication::Translate('Parent Package Category');
			$this->lstParentPackageCategory->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPackageCategoryCursor = PackageCategory::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPackageCategory = PackageCategory::InstantiateCursor($objParentPackageCategoryCursor)) {
				$objListItem = new QListItem($objParentPackageCategory->__toString(), $objParentPackageCategory->Id);
				if (($this->objPackageCategory->ParentPackageCategory) && ($this->objPackageCategory->ParentPackageCategory->Id == $objParentPackageCategory->Id))
					$objListItem->Selected = true;
				$this->lstParentPackageCategory->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPackageCategory;
		}

		/**
		 * Create and setup QLabel lblParentPackageCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPackageCategoryId_Create($strControlId = null) {
			$this->lblParentPackageCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPackageCategoryId->Name = QApplication::Translate('Parent Package Category');
			$this->lblParentPackageCategoryId->Text = ($this->objPackageCategory->ParentPackageCategory) ? $this->objPackageCategory->ParentPackageCategory->__toString() : null;
			return $this->lblParentPackageCategoryId;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objPackageCategory->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = PackageCategory::TokenMaxLength;
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
			$this->lblToken->Text = $this->objPackageCategory->Token;
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
			$this->txtOrderNumber->Text = $this->objPackageCategory->OrderNumber;
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
			$this->lblOrderNumber->Text = $this->objPackageCategory->OrderNumber;
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
			$this->txtName->Text = $this->objPackageCategory->Name;
			$this->txtName->MaxLength = PackageCategory::NameMaxLength;
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
			$this->lblName->Text = $this->objPackageCategory->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objPackageCategory->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
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
			$this->lblDescription->Text = $this->objPackageCategory->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtPackageCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPackageCount_Create($strControlId = null) {
			$this->txtPackageCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPackageCount->Name = QApplication::Translate('Package Count');
			$this->txtPackageCount->Text = $this->objPackageCategory->PackageCount;
			return $this->txtPackageCount;
		}

		/**
		 * Create and setup QLabel lblPackageCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPackageCount_Create($strControlId = null, $strFormat = null) {
			$this->lblPackageCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblPackageCount->Name = QApplication::Translate('Package Count');
			$this->lblPackageCount->Text = $this->objPackageCategory->PackageCount;
			$this->lblPackageCount->Format = $strFormat;
			return $this->lblPackageCount;
		}

		/**
		 * Create and setup QDateTimePicker calLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastPostDate_Create($strControlId = null) {
			$this->calLastPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->calLastPostDate->DateTime = $this->objPackageCategory->LastPostDate;
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
			$this->lblLastPostDate->Text = sprintf($this->objPackageCategory->LastPostDate) ? $this->objPackageCategory->LastPostDate->__toString($this->strLastPostDateDateTimeFormat) : null;
			return $this->lblLastPostDate;
		}

		protected $strLastPostDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local PackageCategory object.
		 * @param boolean $blnReload reload PackageCategory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPackageCategory->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPackageCategory->Id;

			if ($this->lstParentPackageCategory) {
					$this->lstParentPackageCategory->RemoveAllItems();
				$this->lstParentPackageCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPackageCategoryArray = PackageCategory::LoadAll();
				if ($objParentPackageCategoryArray) foreach ($objParentPackageCategoryArray as $objParentPackageCategory) {
					$objListItem = new QListItem($objParentPackageCategory->__toString(), $objParentPackageCategory->Id);
					if (($this->objPackageCategory->ParentPackageCategory) && ($this->objPackageCategory->ParentPackageCategory->Id == $objParentPackageCategory->Id))
						$objListItem->Selected = true;
					$this->lstParentPackageCategory->AddItem($objListItem);
				}
			}
			if ($this->lblParentPackageCategoryId) $this->lblParentPackageCategoryId->Text = ($this->objPackageCategory->ParentPackageCategory) ? $this->objPackageCategory->ParentPackageCategory->__toString() : null;

			if ($this->txtToken) $this->txtToken->Text = $this->objPackageCategory->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objPackageCategory->Token;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objPackageCategory->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objPackageCategory->OrderNumber;

			if ($this->txtName) $this->txtName->Text = $this->objPackageCategory->Name;
			if ($this->lblName) $this->lblName->Text = $this->objPackageCategory->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objPackageCategory->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objPackageCategory->Description;

			if ($this->txtPackageCount) $this->txtPackageCount->Text = $this->objPackageCategory->PackageCount;
			if ($this->lblPackageCount) $this->lblPackageCount->Text = $this->objPackageCategory->PackageCount;

			if ($this->calLastPostDate) $this->calLastPostDate->DateTime = $this->objPackageCategory->LastPostDate;
			if ($this->lblLastPostDate) $this->lblLastPostDate->Text = sprintf($this->objPackageCategory->LastPostDate) ? $this->objPackageCategory->__toString($this->strLastPostDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PACKAGECATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PackageCategory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePackageCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstParentPackageCategory) $this->objPackageCategory->ParentPackageCategoryId = $this->lstParentPackageCategory->SelectedValue;
				if ($this->txtToken) $this->objPackageCategory->Token = $this->txtToken->Text;
				if ($this->txtOrderNumber) $this->objPackageCategory->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->txtName) $this->objPackageCategory->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objPackageCategory->Description = $this->txtDescription->Text;
				if ($this->txtPackageCount) $this->objPackageCategory->PackageCount = $this->txtPackageCount->Text;
				if ($this->calLastPostDate) $this->objPackageCategory->LastPostDate = $this->calLastPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PackageCategory object
				$this->objPackageCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PackageCategory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePackageCategory() {
			$this->objPackageCategory->Delete();
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
				case 'PackageCategory': return $this->objPackageCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PackageCategory fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ParentPackageCategoryIdControl':
					if (!$this->lstParentPackageCategory) return $this->lstParentPackageCategory_Create();
					return $this->lstParentPackageCategory;
				case 'ParentPackageCategoryIdLabel':
					if (!$this->lblParentPackageCategoryId) return $this->lblParentPackageCategoryId_Create();
					return $this->lblParentPackageCategoryId;
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
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'PackageCountControl':
					if (!$this->txtPackageCount) return $this->txtPackageCount_Create();
					return $this->txtPackageCount;
				case 'PackageCountLabel':
					if (!$this->lblPackageCount) return $this->lblPackageCount_Create();
					return $this->lblPackageCount;
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
					// Controls that point to PackageCategory fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ParentPackageCategoryIdControl':
						return ($this->lstParentPackageCategory = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'PackageCountControl':
						return ($this->txtPackageCount = QType::Cast($mixValue, 'QControl'));
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