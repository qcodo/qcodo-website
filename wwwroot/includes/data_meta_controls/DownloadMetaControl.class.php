<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Download class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Download object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DownloadMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */

	class DownloadMetaControl extends QBaseClass {
		// General Variables
		protected $objDownload;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Download's individual data fields
		protected $lblId;
		protected $lstParentDownload;
		protected $lstDownloadCategory;
		protected $lstPerson;
		protected $txtName;
		protected $txtVersion;
		protected $txtDescription;
		protected $txtFilename;
		protected $txtDownloadCount;
		protected $calPostDate;

		// Controls that allow the viewing of Download's individual data fields
		protected $lblParentDownloadId;
		protected $lblDownloadCategoryId;
		protected $lblPersonId;
		protected $lblName;
		protected $lblVersion;
		protected $lblDescription;
		protected $lblFilename;
		protected $lblDownloadCount;
		protected $lblPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DownloadMetaControl to edit a single Download object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Download object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadMetaControl
		 * @param Download $objDownload new or existing Download object
		 */
		 public function __construct($objParentObject, Download $objDownload) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DownloadMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Download object
			$this->objDownload = $objDownload;

			// Figure out if we're Editing or Creating New
			if ($this->objDownload->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Download object creation - defaults to CreateOrEdit
 		 * @return DownloadMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objDownload = Download::Load($intId);

				// Download was found -- return it!
				if ($objDownload)
					return new DownloadMetaControl($objParentObject, $objDownload);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Download object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DownloadMetaControl($objParentObject, new Download());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Download object creation - defaults to CreateOrEdit
		 * @return DownloadMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return DownloadMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DownloadMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Download object creation - defaults to CreateOrEdit
		 * @return DownloadMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return DownloadMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objDownload->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstParentDownload
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstParentDownload_Create($strControlId = null) {
			$this->lstParentDownload = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentDownload->Name = QApplication::Translate('Parent Download');
			$this->lstParentDownload->AddItem(QApplication::Translate('- Select One -'), null);
			$objParentDownloadArray = Download::LoadAll();
			if ($objParentDownloadArray) foreach ($objParentDownloadArray as $objParentDownload) {
				$objListItem = new QListItem($objParentDownload->__toString(), $objParentDownload->Id);
				if (($this->objDownload->ParentDownload) && ($this->objDownload->ParentDownload->Id == $objParentDownload->Id))
					$objListItem->Selected = true;
				$this->lstParentDownload->AddItem($objListItem);
			}
			return $this->lstParentDownload;
		}

		/**
		 * Create and setup QLabel lblParentDownloadId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentDownloadId_Create($strControlId = null) {
			$this->lblParentDownloadId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentDownloadId->Name = QApplication::Translate('Parent Download');
			$this->lblParentDownloadId->Text = ($this->objDownload->ParentDownload) ? $this->objDownload->ParentDownload->__toString() : null;
			return $this->lblParentDownloadId;
		}

		/**
		 * Create and setup QListBox lstDownloadCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstDownloadCategory_Create($strControlId = null) {
			$this->lstDownloadCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstDownloadCategory->Name = QApplication::Translate('Download Category');
			$this->lstDownloadCategory->Required = true;
			if (!$this->blnEditMode)
				$this->lstDownloadCategory->AddItem(QApplication::Translate('- Select One -'), null);
			$objDownloadCategoryArray = DownloadCategory::LoadAll();
			if ($objDownloadCategoryArray) foreach ($objDownloadCategoryArray as $objDownloadCategory) {
				$objListItem = new QListItem($objDownloadCategory->__toString(), $objDownloadCategory->Id);
				if (($this->objDownload->DownloadCategory) && ($this->objDownload->DownloadCategory->Id == $objDownloadCategory->Id))
					$objListItem->Selected = true;
				$this->lstDownloadCategory->AddItem($objListItem);
			}
			return $this->lstDownloadCategory;
		}

		/**
		 * Create and setup QLabel lblDownloadCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDownloadCategoryId_Create($strControlId = null) {
			$this->lblDownloadCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDownloadCategoryId->Name = QApplication::Translate('Download Category');
			$this->lblDownloadCategoryId->Text = ($this->objDownload->DownloadCategory) ? $this->objDownload->DownloadCategory->__toString() : null;
			$this->lblDownloadCategoryId->Required = true;
			return $this->lblDownloadCategoryId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objDownload->Person) && ($this->objDownload->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}
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
			$this->lblPersonId->Text = ($this->objDownload->Person) ? $this->objDownload->Person->__toString() : null;
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
			$this->txtName->Text = $this->objDownload->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Download::NameMaxLength;
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
			$this->lblName->Text = $this->objDownload->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtVersion_Create($strControlId = null) {
			$this->txtVersion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtVersion->Name = QApplication::Translate('Version');
			$this->txtVersion->Text = $this->objDownload->Version;
			$this->txtVersion->MaxLength = Download::VersionMaxLength;
			return $this->txtVersion;
		}

		/**
		 * Create and setup QLabel lblVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblVersion_Create($strControlId = null) {
			$this->lblVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblVersion->Name = QApplication::Translate('Version');
			$this->lblVersion->Text = $this->objDownload->Version;
			return $this->lblVersion;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objDownload->Description;
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
			$this->lblDescription->Text = $this->objDownload->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFilename_Create($strControlId = null) {
			$this->txtFilename = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFilename->Name = QApplication::Translate('Filename');
			$this->txtFilename->Text = $this->objDownload->Filename;
			$this->txtFilename->MaxLength = Download::FilenameMaxLength;
			return $this->txtFilename;
		}

		/**
		 * Create and setup QLabel lblFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFilename_Create($strControlId = null) {
			$this->lblFilename = new QLabel($this->objParentObject, $strControlId);
			$this->lblFilename->Name = QApplication::Translate('Filename');
			$this->lblFilename->Text = $this->objDownload->Filename;
			return $this->lblFilename;
		}

		/**
		 * Create and setup QIntegerTextBox txtDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDownloadCount_Create($strControlId = null) {
			$this->txtDownloadCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDownloadCount->Name = QApplication::Translate('Download Count');
			$this->txtDownloadCount->Text = $this->objDownload->DownloadCount;
			return $this->txtDownloadCount;
		}

		/**
		 * Create and setup QLabel lblDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblDownloadCount_Create($strControlId = null, $strFormat = null) {
			$this->lblDownloadCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblDownloadCount->Name = QApplication::Translate('Download Count');
			$this->lblDownloadCount->Text = $this->objDownload->DownloadCount;
			$this->lblDownloadCount->Format = $strFormat;
			return $this->lblDownloadCount;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objDownload->PostDate;
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
			$this->lblPostDate->Text = sprintf($this->objDownload->PostDate) ? $this->objDownload->__toString($this->strPostDateDateTimeFormat) : null;
			$this->lblPostDate->Required = true;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Download object.
		 * @param boolean $blnReload reload Download from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDownload->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objDownload->Id;

			if ($this->lstParentDownload) {
					$this->lstParentDownload->RemoveAllItems();
				$this->lstParentDownload->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentDownloadArray = Download::LoadAll();
				if ($objParentDownloadArray) foreach ($objParentDownloadArray as $objParentDownload) {
					$objListItem = new QListItem($objParentDownload->__toString(), $objParentDownload->Id);
					if (($this->objDownload->ParentDownload) && ($this->objDownload->ParentDownload->Id == $objParentDownload->Id))
						$objListItem->Selected = true;
					$this->lstParentDownload->AddItem($objListItem);
				}
			}
			if ($this->lblParentDownloadId) $this->lblParentDownloadId->Text = ($this->objDownload->ParentDownload) ? $this->objDownload->ParentDownload->__toString() : null;

			if ($this->lstDownloadCategory) {
					$this->lstDownloadCategory->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstDownloadCategory->AddItem(QApplication::Translate('- Select One -'), null);
				$objDownloadCategoryArray = DownloadCategory::LoadAll();
				if ($objDownloadCategoryArray) foreach ($objDownloadCategoryArray as $objDownloadCategory) {
					$objListItem = new QListItem($objDownloadCategory->__toString(), $objDownloadCategory->Id);
					if (($this->objDownload->DownloadCategory) && ($this->objDownload->DownloadCategory->Id == $objDownloadCategory->Id))
						$objListItem->Selected = true;
					$this->lstDownloadCategory->AddItem($objListItem);
				}
			}
			if ($this->lblDownloadCategoryId) $this->lblDownloadCategoryId->Text = ($this->objDownload->DownloadCategory) ? $this->objDownload->DownloadCategory->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objDownload->Person) && ($this->objDownload->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objDownload->Person) ? $this->objDownload->Person->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objDownload->Name;
			if ($this->lblName) $this->lblName->Text = $this->objDownload->Name;

			if ($this->txtVersion) $this->txtVersion->Text = $this->objDownload->Version;
			if ($this->lblVersion) $this->lblVersion->Text = $this->objDownload->Version;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objDownload->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objDownload->Description;

			if ($this->txtFilename) $this->txtFilename->Text = $this->objDownload->Filename;
			if ($this->lblFilename) $this->lblFilename->Text = $this->objDownload->Filename;

			if ($this->txtDownloadCount) $this->txtDownloadCount->Text = $this->objDownload->DownloadCount;
			if ($this->lblDownloadCount) $this->lblDownloadCount->Text = $this->objDownload->DownloadCount;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objDownload->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objDownload->PostDate) ? $this->objDownload->__toString($this->strPostDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DOWNLOAD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Download instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDownload() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstParentDownload) $this->objDownload->ParentDownloadId = $this->lstParentDownload->SelectedValue;
				if ($this->lstDownloadCategory) $this->objDownload->DownloadCategoryId = $this->lstDownloadCategory->SelectedValue;
				if ($this->lstPerson) $this->objDownload->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtName) $this->objDownload->Name = $this->txtName->Text;
				if ($this->txtVersion) $this->objDownload->Version = $this->txtVersion->Text;
				if ($this->txtDescription) $this->objDownload->Description = $this->txtDescription->Text;
				if ($this->txtFilename) $this->objDownload->Filename = $this->txtFilename->Text;
				if ($this->txtDownloadCount) $this->objDownload->DownloadCount = $this->txtDownloadCount->Text;
				if ($this->calPostDate) $this->objDownload->PostDate = $this->calPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Download object
				$this->objDownload->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Download instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDownload() {
			$this->objDownload->Delete();
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
				case 'Download': return $this->objDownload;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Download fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ParentDownloadIdControl':
					if (!$this->lstParentDownload) return $this->lstParentDownload_Create();
					return $this->lstParentDownload;
				case 'ParentDownloadIdLabel':
					if (!$this->lblParentDownloadId) return $this->lblParentDownloadId_Create();
					return $this->lblParentDownloadId;
				case 'DownloadCategoryIdControl':
					if (!$this->lstDownloadCategory) return $this->lstDownloadCategory_Create();
					return $this->lstDownloadCategory;
				case 'DownloadCategoryIdLabel':
					if (!$this->lblDownloadCategoryId) return $this->lblDownloadCategoryId_Create();
					return $this->lblDownloadCategoryId;
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
				case 'VersionControl':
					if (!$this->txtVersion) return $this->txtVersion_Create();
					return $this->txtVersion;
				case 'VersionLabel':
					if (!$this->lblVersion) return $this->lblVersion_Create();
					return $this->lblVersion;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'FilenameControl':
					if (!$this->txtFilename) return $this->txtFilename_Create();
					return $this->txtFilename;
				case 'FilenameLabel':
					if (!$this->lblFilename) return $this->lblFilename_Create();
					return $this->lblFilename;
				case 'DownloadCountControl':
					if (!$this->txtDownloadCount) return $this->txtDownloadCount_Create();
					return $this->txtDownloadCount;
				case 'DownloadCountLabel':
					if (!$this->lblDownloadCount) return $this->lblDownloadCount_Create();
					return $this->lblDownloadCount;
				case 'PostDateControl':
					if (!$this->calPostDate) return $this->calPostDate_Create();
					return $this->calPostDate;
				case 'PostDateLabel':
					if (!$this->lblPostDate) return $this->lblPostDate_Create();
					return $this->lblPostDate;
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
					// Controls that point to Download fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ParentDownloadIdControl':
						return ($this->lstParentDownload = QType::Cast($mixValue, 'QControl'));
					case 'DownloadCategoryIdControl':
						return ($this->lstDownloadCategory = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'VersionControl':
						return ($this->txtVersion = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'FilenameControl':
						return ($this->txtFilename = QType::Cast($mixValue, 'QControl'));
					case 'DownloadCountControl':
						return ($this->txtDownloadCount = QType::Cast($mixValue, 'QControl'));
					case 'PostDateControl':
						return ($this->calPostDate = QType::Cast($mixValue, 'QControl'));
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