<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Package class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Package object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PackageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Package $Package the actual Package data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PackageCategoryIdControl
	 * property-read QLabel $PackageCategoryIdLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QDateTimePicker $LastPostDateControl
	 * property-read QLabel $LastPostDateLabel
	 * property QListBox $LastPostedByPersonIdControl
	 * property-read QLabel $LastPostedByPersonIdLabel
	 * property QListBox $TopicLinkControl
	 * property-read QLabel $TopicLinkLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PackageMetaControlGen extends QBaseClass {
		// General Variables
		protected $objPackage;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Package's individual data fields
		protected $lblId;
		protected $lstPackageCategory;
		protected $txtToken;
		protected $txtName;
		protected $txtDescription;
		protected $calLastPostDate;
		protected $lstLastPostedByPerson;

		// Controls that allow the viewing of Package's individual data fields
		protected $lblPackageCategoryId;
		protected $lblToken;
		protected $lblName;
		protected $lblDescription;
		protected $lblLastPostDate;
		protected $lblLastPostedByPersonId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstTopicLink;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblTopicLink;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PackageMetaControl to edit a single Package object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Package object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageMetaControl
		 * @param Package $objPackage new or existing Package object
		 */
		 public function __construct($objParentObject, Package $objPackage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PackageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Package object
			$this->objPackage = $objPackage;

			// Figure out if we're Editing or Creating New
			if ($this->objPackage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Package object creation - defaults to CreateOrEdit
 		 * @return PackageMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPackage = Package::Load($intId);

				// Package was found -- return it!
				if ($objPackage)
					return new PackageMetaControl($objParentObject, $objPackage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Package object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PackageMetaControl($objParentObject, new Package());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Package object creation - defaults to CreateOrEdit
		 * @return PackageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PackageMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Package object creation - defaults to CreateOrEdit
		 * @return PackageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PackageMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPackage->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPackageCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPackageCategory_Create($strControlId = null) {
			$this->lstPackageCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstPackageCategory->Name = QApplication::Translate('Package Category');
			$this->lstPackageCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstPackageCategory->AddItem(QApplication::Translate('- Select One -'), null);
			$objPackageCategoryArray = PackageCategory::LoadAll();
			if ($objPackageCategoryArray) foreach ($objPackageCategoryArray as $objPackageCategory) {
				$objListItem = new QListItem($objPackageCategory->__toString(), $objPackageCategory->Id);
				if (($this->objPackage->PackageCategory) && ($this->objPackage->PackageCategory->Id == $objPackageCategory->Id))
					$objListItem->Selected = true;
				$this->lstPackageCategory->AddItem($objListItem);
			}
			return $this->lstPackageCategory;
		}

		/**
		 * Create and setup QLabel lblPackageCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPackageCategoryId_Create($strControlId = null) {
			$this->lblPackageCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPackageCategoryId->Name = QApplication::Translate('Package Category');
			$this->lblPackageCategoryId->Text = ($this->objPackage->PackageCategory) ? $this->objPackage->PackageCategory->__toString() : null;
			$this->lblPackageCategoryId->Required = true;
			return $this->lblPackageCategoryId;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objPackage->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = Package::TokenMaxLength;
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
			$this->lblToken->Text = $this->objPackage->Token;
			$this->lblToken->Required = true;
			return $this->lblToken;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objPackage->Name;
			$this->txtName->MaxLength = Package::NameMaxLength;
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
			$this->lblName->Text = $this->objPackage->Name;
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
			$this->txtDescription->Text = $this->objPackage->Description;
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
			$this->lblDescription->Text = $this->objPackage->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QDateTimePicker calLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastPostDate_Create($strControlId = null) {
			$this->calLastPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->calLastPostDate->DateTime = $this->objPackage->LastPostDate;
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
			$this->lblLastPostDate->Text = sprintf($this->objPackage->LastPostDate) ? $this->objPackage->LastPostDate->__toString($this->strLastPostDateDateTimeFormat) : null;
			return $this->lblLastPostDate;
		}

		protected $strLastPostDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstLastPostedByPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstLastPostedByPerson_Create($strControlId = null) {
			$this->lstLastPostedByPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstLastPostedByPerson->Name = QApplication::Translate('Last Posted By Person');
			$this->lstLastPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objLastPostedByPersonArray = Person::LoadAll();
			if ($objLastPostedByPersonArray) foreach ($objLastPostedByPersonArray as $objLastPostedByPerson) {
				$objListItem = new QListItem($objLastPostedByPerson->__toString(), $objLastPostedByPerson->Id);
				if (($this->objPackage->LastPostedByPerson) && ($this->objPackage->LastPostedByPerson->Id == $objLastPostedByPerson->Id))
					$objListItem->Selected = true;
				$this->lstLastPostedByPerson->AddItem($objListItem);
			}
			return $this->lstLastPostedByPerson;
		}

		/**
		 * Create and setup QLabel lblLastPostedByPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastPostedByPersonId_Create($strControlId = null) {
			$this->lblLastPostedByPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastPostedByPersonId->Name = QApplication::Translate('Last Posted By Person');
			$this->lblLastPostedByPersonId->Text = ($this->objPackage->LastPostedByPerson) ? $this->objPackage->LastPostedByPerson->__toString() : null;
			return $this->lblLastPostedByPersonId;
		}

		/**
		 * Create and setup QListBox lstTopicLink
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstTopicLink_Create($strControlId = null) {
			$this->lstTopicLink = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicLink->Name = QApplication::Translate('Topic Link');
			$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
			$objTopicLinkArray = TopicLink::LoadAll();
			if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
				$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
				if ($objTopicLink->PackageId == $this->objPackage->Id)
					$objListItem->Selected = true;
				$this->lstTopicLink->AddItem($objListItem);
			}
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
			$this->lblTopicLink->Text = ($this->objPackage->TopicLink) ? $this->objPackage->TopicLink->__toString() : null;
			return $this->lblTopicLink;
		}



		/**
		 * Refresh this MetaControl with Data from the local Package object.
		 * @param boolean $blnReload reload Package from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPackage->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPackage->Id;

			if ($this->lstPackageCategory) {
					$this->lstPackageCategory->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPackageCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objPackageCategoryArray = PackageCategory::LoadAll();
				if ($objPackageCategoryArray) foreach ($objPackageCategoryArray as $objPackageCategory) {
					$objListItem = new QListItem($objPackageCategory->__toString(), $objPackageCategory->Id);
					if (($this->objPackage->PackageCategory) && ($this->objPackage->PackageCategory->Id == $objPackageCategory->Id))
						$objListItem->Selected = true;
					$this->lstPackageCategory->AddItem($objListItem);
				}
			}
			if ($this->lblPackageCategoryId) $this->lblPackageCategoryId->Text = ($this->objPackage->PackageCategory) ? $this->objPackage->PackageCategory->__toString() : null;

			if ($this->txtToken) $this->txtToken->Text = $this->objPackage->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objPackage->Token;

			if ($this->txtName) $this->txtName->Text = $this->objPackage->Name;
			if ($this->lblName) $this->lblName->Text = $this->objPackage->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objPackage->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objPackage->Description;

			if ($this->calLastPostDate) $this->calLastPostDate->DateTime = $this->objPackage->LastPostDate;
			if ($this->lblLastPostDate) $this->lblLastPostDate->Text = sprintf($this->objPackage->LastPostDate) ? $this->objPackage->__toString($this->strLastPostDateDateTimeFormat) : null;

			if ($this->lstLastPostedByPerson) {
					$this->lstLastPostedByPerson->RemoveAllItems();
				$this->lstLastPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objLastPostedByPersonArray = Person::LoadAll();
				if ($objLastPostedByPersonArray) foreach ($objLastPostedByPersonArray as $objLastPostedByPerson) {
					$objListItem = new QListItem($objLastPostedByPerson->__toString(), $objLastPostedByPerson->Id);
					if (($this->objPackage->LastPostedByPerson) && ($this->objPackage->LastPostedByPerson->Id == $objLastPostedByPerson->Id))
						$objListItem->Selected = true;
					$this->lstLastPostedByPerson->AddItem($objListItem);
				}
			}
			if ($this->lblLastPostedByPersonId) $this->lblLastPostedByPersonId->Text = ($this->objPackage->LastPostedByPerson) ? $this->objPackage->LastPostedByPerson->__toString() : null;

			if ($this->lstTopicLink) {
				$this->lstTopicLink->RemoveAllItems();
				$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
				$objTopicLinkArray = TopicLink::LoadAll();
				if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
					$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
					if ($objTopicLink->PackageId == $this->objPackage->Id)
						$objListItem->Selected = true;
					$this->lstTopicLink->AddItem($objListItem);
				}
			}
			if ($this->lblTopicLink) $this->lblTopicLink->Text = ($this->objPackage->TopicLink) ? $this->objPackage->TopicLink->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PACKAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Package instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePackage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPackageCategory) $this->objPackage->PackageCategoryId = $this->lstPackageCategory->SelectedValue;
				if ($this->txtToken) $this->objPackage->Token = $this->txtToken->Text;
				if ($this->txtName) $this->objPackage->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objPackage->Description = $this->txtDescription->Text;
				if ($this->calLastPostDate) $this->objPackage->LastPostDate = $this->calLastPostDate->DateTime;
				if ($this->lstLastPostedByPerson) $this->objPackage->LastPostedByPersonId = $this->lstLastPostedByPerson->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstTopicLink) $this->objPackage->TopicLink = TopicLink::Load($this->lstTopicLink->SelectedValue);

				// Save the Package object
				$this->objPackage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Package instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePackage() {
			$this->objPackage->Delete();
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
				case 'Package': return $this->objPackage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Package fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PackageCategoryIdControl':
					if (!$this->lstPackageCategory) return $this->lstPackageCategory_Create();
					return $this->lstPackageCategory;
				case 'PackageCategoryIdLabel':
					if (!$this->lblPackageCategoryId) return $this->lblPackageCategoryId_Create();
					return $this->lblPackageCategoryId;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
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
				case 'LastPostDateControl':
					if (!$this->calLastPostDate) return $this->calLastPostDate_Create();
					return $this->calLastPostDate;
				case 'LastPostDateLabel':
					if (!$this->lblLastPostDate) return $this->lblLastPostDate_Create();
					return $this->lblLastPostDate;
				case 'LastPostedByPersonIdControl':
					if (!$this->lstLastPostedByPerson) return $this->lstLastPostedByPerson_Create();
					return $this->lstLastPostedByPerson;
				case 'LastPostedByPersonIdLabel':
					if (!$this->lblLastPostedByPersonId) return $this->lblLastPostedByPersonId_Create();
					return $this->lblLastPostedByPersonId;
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
					// Controls that point to Package fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PackageCategoryIdControl':
						return ($this->lstPackageCategory = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'LastPostDateControl':
						return ($this->calLastPostDate = QType::Cast($mixValue, 'QControl'));
					case 'LastPostedByPersonIdControl':
						return ($this->lstLastPostedByPerson = QType::Cast($mixValue, 'QControl'));
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