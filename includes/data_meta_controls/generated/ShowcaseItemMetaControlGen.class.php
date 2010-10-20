<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ShowcaseItem class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ShowcaseItem object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ShowcaseItemMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read ShowcaseItem $ShowcaseItem the actual ShowcaseItem data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ImageFileTypeIdControl
	 * property-read QLabel $ImageFileTypeIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $UrlControl
	 * property-read QLabel $UrlLabel
	 * property QCheckBox $LiveFlagControl
	 * property-read QLabel $LiveFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ShowcaseItemMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ShowcaseItem objShowcaseItem
		 * @access protected
		 */
		protected $objShowcaseItem;

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

		// Controls that allow the editing of ShowcaseItem's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstImageFileType;
         * @access protected
         */
		protected $lstImageFileType;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

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
         * @var QTextBox txtUrl;
         * @access protected
         */
		protected $txtUrl;

        /**
         * @var QCheckBox chkLiveFlag;
         * @access protected
         */
		protected $chkLiveFlag;


		// Controls that allow the viewing of ShowcaseItem's individual data fields
        /**
         * @var QLabel lblImageFileTypeId
         * @access protected
         */
		protected $lblImageFileTypeId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

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
         * @var QLabel lblUrl
         * @access protected
         */
		protected $lblUrl;

        /**
         * @var QLabel lblLiveFlag
         * @access protected
         */
		protected $lblLiveFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ShowcaseItemMetaControl to edit a single ShowcaseItem object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ShowcaseItem object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShowcaseItemMetaControl
		 * @param ShowcaseItem $objShowcaseItem new or existing ShowcaseItem object
		 */
		 public function __construct($objParentObject, ShowcaseItem $objShowcaseItem) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ShowcaseItemMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ShowcaseItem object
			$this->objShowcaseItem = $objShowcaseItem;

			// Figure out if we're Editing or Creating New
			if ($this->objShowcaseItem->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShowcaseItemMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ShowcaseItem object creation - defaults to CreateOrEdit
 		 * @return ShowcaseItemMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objShowcaseItem = ShowcaseItem::Load($intId);

				// ShowcaseItem was found -- return it!
				if ($objShowcaseItem)
					return new ShowcaseItemMetaControl($objParentObject, $objShowcaseItem);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ShowcaseItem object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ShowcaseItemMetaControl($objParentObject, new ShowcaseItem());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShowcaseItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ShowcaseItem object creation - defaults to CreateOrEdit
		 * @return ShowcaseItemMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ShowcaseItemMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ShowcaseItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ShowcaseItem object creation - defaults to CreateOrEdit
		 * @return ShowcaseItemMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ShowcaseItemMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objShowcaseItem->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstImageFileType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstImageFileType_Create($strControlId = null) {
			$this->lstImageFileType = new QListBox($this->objParentObject, $strControlId);
			$this->lstImageFileType->Name = QApplication::Translate('Image File Type');
			$this->lstImageFileType->Required = true;
			foreach (ImageFileType::$NameArray as $intId => $strValue)
				$this->lstImageFileType->AddItem(new QListItem($strValue, $intId, $this->objShowcaseItem->ImageFileTypeId == $intId));
			return $this->lstImageFileType;
		}

		/**
		 * Create and setup QLabel lblImageFileTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblImageFileTypeId_Create($strControlId = null) {
			$this->lblImageFileTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblImageFileTypeId->Name = QApplication::Translate('Image File Type');
			$this->lblImageFileTypeId->Text = ($this->objShowcaseItem->ImageFileTypeId) ? ImageFileType::$NameArray[$this->objShowcaseItem->ImageFileTypeId] : null;
			$this->lblImageFileTypeId->Required = true;
			return $this->lblImageFileTypeId;
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
				if (($this->objShowcaseItem->Person) && ($this->objShowcaseItem->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objShowcaseItem->Person) ? $this->objShowcaseItem->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objShowcaseItem->Name;
			$this->txtName->MaxLength = ShowcaseItem::NameMaxLength;
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
			$this->lblName->Text = $this->objShowcaseItem->Name;
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
			$this->txtDescription->Text = $this->objShowcaseItem->Description;
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
			$this->lblDescription->Text = $this->objShowcaseItem->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUrl_Create($strControlId = null) {
			$this->txtUrl = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUrl->Name = QApplication::Translate('Url');
			$this->txtUrl->Text = $this->objShowcaseItem->Url;
			$this->txtUrl->MaxLength = ShowcaseItem::UrlMaxLength;
			return $this->txtUrl;
		}

		/**
		 * Create and setup QLabel lblUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUrl_Create($strControlId = null) {
			$this->lblUrl = new QLabel($this->objParentObject, $strControlId);
			$this->lblUrl->Name = QApplication::Translate('Url');
			$this->lblUrl->Text = $this->objShowcaseItem->Url;
			return $this->lblUrl;
		}

		/**
		 * Create and setup QCheckBox chkLiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkLiveFlag_Create($strControlId = null) {
			$this->chkLiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkLiveFlag->Name = QApplication::Translate('Live Flag');
			$this->chkLiveFlag->Checked = $this->objShowcaseItem->LiveFlag;
			return $this->chkLiveFlag;
		}

		/**
		 * Create and setup QLabel lblLiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLiveFlag_Create($strControlId = null) {
			$this->lblLiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblLiveFlag->Name = QApplication::Translate('Live Flag');
			$this->lblLiveFlag->Text = ($this->objShowcaseItem->LiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblLiveFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local ShowcaseItem object.
		 * @param boolean $blnReload reload ShowcaseItem from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objShowcaseItem->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objShowcaseItem->Id;

			if ($this->lstImageFileType) $this->lstImageFileType->SelectedValue = $this->objShowcaseItem->ImageFileTypeId;
			if ($this->lblImageFileTypeId) $this->lblImageFileTypeId->Text = ($this->objShowcaseItem->ImageFileTypeId) ? ImageFileType::$NameArray[$this->objShowcaseItem->ImageFileTypeId] : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objShowcaseItem->Person) && ($this->objShowcaseItem->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objShowcaseItem->Person) ? $this->objShowcaseItem->Person->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objShowcaseItem->Name;
			if ($this->lblName) $this->lblName->Text = $this->objShowcaseItem->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objShowcaseItem->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objShowcaseItem->Description;

			if ($this->txtUrl) $this->txtUrl->Text = $this->objShowcaseItem->Url;
			if ($this->lblUrl) $this->lblUrl->Text = $this->objShowcaseItem->Url;

			if ($this->chkLiveFlag) $this->chkLiveFlag->Checked = $this->objShowcaseItem->LiveFlag;
			if ($this->lblLiveFlag) $this->lblLiveFlag->Text = ($this->objShowcaseItem->LiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SHOWCASEITEM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ShowcaseItem instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveShowcaseItem() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstImageFileType) $this->objShowcaseItem->ImageFileTypeId = $this->lstImageFileType->SelectedValue;
				if ($this->lstPerson) $this->objShowcaseItem->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtName) $this->objShowcaseItem->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objShowcaseItem->Description = $this->txtDescription->Text;
				if ($this->txtUrl) $this->objShowcaseItem->Url = $this->txtUrl->Text;
				if ($this->chkLiveFlag) $this->objShowcaseItem->LiveFlag = $this->chkLiveFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ShowcaseItem object
				$this->objShowcaseItem->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ShowcaseItem instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteShowcaseItem() {
			$this->objShowcaseItem->Delete();
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
				case 'ShowcaseItem': return $this->objShowcaseItem;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ShowcaseItem fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ImageFileTypeIdControl':
					if (!$this->lstImageFileType) return $this->lstImageFileType_Create();
					return $this->lstImageFileType;
				case 'ImageFileTypeIdLabel':
					if (!$this->lblImageFileTypeId) return $this->lblImageFileTypeId_Create();
					return $this->lblImageFileTypeId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
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
				case 'UrlControl':
					if (!$this->txtUrl) return $this->txtUrl_Create();
					return $this->txtUrl;
				case 'UrlLabel':
					if (!$this->lblUrl) return $this->lblUrl_Create();
					return $this->lblUrl;
				case 'LiveFlagControl':
					if (!$this->chkLiveFlag) return $this->chkLiveFlag_Create();
					return $this->chkLiveFlag;
				case 'LiveFlagLabel':
					if (!$this->lblLiveFlag) return $this->lblLiveFlag_Create();
					return $this->lblLiveFlag;
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
					// Controls that point to ShowcaseItem fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ImageFileTypeIdControl':
						return ($this->lstImageFileType = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'UrlControl':
						return ($this->txtUrl = QType::Cast($mixValue, 'QControl'));
					case 'LiveFlagControl':
						return ($this->chkLiveFlag = QType::Cast($mixValue, 'QControl'));
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