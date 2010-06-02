<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PackageVersion class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PackageVersion object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PackageVersionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read PackageVersion $PackageVersion the actual PackageVersion data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PackageContributionIdControl
	 * property-read QLabel $PackageContributionIdLabel
	 * property QIntegerTextBox $VersionNumberControl
	 * property-read QLabel $VersionNumberLabel
	 * property QTextBox $NotesControl
	 * property-read QLabel $NotesLabel
	 * property QTextBox $QcodoVersionControl
	 * property-read QLabel $QcodoVersionLabel
	 * property QIntegerTextBox $NewFileCountControl
	 * property-read QLabel $NewFileCountLabel
	 * property QIntegerTextBox $ChangedFileCountControl
	 * property-read QLabel $ChangedFileCountLabel
	 * property QDateTimePicker $PostDateControl
	 * property-read QLabel $PostDateLabel
	 * property QIntegerTextBox $DownloadCountControl
	 * property-read QLabel $DownloadCountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PackageVersionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objPackageVersion;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of PackageVersion's individual data fields
		protected $lblId;
		protected $lstPackageContribution;
		protected $txtVersionNumber;
		protected $txtNotes;
		protected $txtQcodoVersion;
		protected $txtNewFileCount;
		protected $txtChangedFileCount;
		protected $calPostDate;
		protected $txtDownloadCount;

		// Controls that allow the viewing of PackageVersion's individual data fields
		protected $lblPackageContributionId;
		protected $lblVersionNumber;
		protected $lblNotes;
		protected $lblQcodoVersion;
		protected $lblNewFileCount;
		protected $lblChangedFileCount;
		protected $lblPostDate;
		protected $lblDownloadCount;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PackageVersionMetaControl to edit a single PackageVersion object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PackageVersion object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageVersionMetaControl
		 * @param PackageVersion $objPackageVersion new or existing PackageVersion object
		 */
		 public function __construct($objParentObject, PackageVersion $objPackageVersion) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PackageVersionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PackageVersion object
			$this->objPackageVersion = $objPackageVersion;

			// Figure out if we're Editing or Creating New
			if ($this->objPackageVersion->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageVersionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PackageVersion object creation - defaults to CreateOrEdit
 		 * @return PackageVersionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPackageVersion = PackageVersion::Load($intId);

				// PackageVersion was found -- return it!
				if ($objPackageVersion)
					return new PackageVersionMetaControl($objParentObject, $objPackageVersion);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PackageVersion object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PackageVersionMetaControl($objParentObject, new PackageVersion());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageVersion object creation - defaults to CreateOrEdit
		 * @return PackageVersionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PackageVersionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageVersion object creation - defaults to CreateOrEdit
		 * @return PackageVersionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PackageVersionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPackageVersion->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPackageContribution
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPackageContribution_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPackageContribution = new QListBox($this->objParentObject, $strControlId);
			$this->lstPackageContribution->Name = QApplication::Translate('Package Contribution');
			$this->lstPackageContribution->Required = true;
			if (!$this->blnEditMode)
				$this->lstPackageContribution->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPackageContributionCursor = PackageContribution::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPackageContribution = PackageContribution::InstantiateCursor($objPackageContributionCursor)) {
				$objListItem = new QListItem($objPackageContribution->__toString(), $objPackageContribution->Id);
				if (($this->objPackageVersion->PackageContribution) && ($this->objPackageVersion->PackageContribution->Id == $objPackageContribution->Id))
					$objListItem->Selected = true;
				$this->lstPackageContribution->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPackageContribution;
		}

		/**
		 * Create and setup QLabel lblPackageContributionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPackageContributionId_Create($strControlId = null) {
			$this->lblPackageContributionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPackageContributionId->Name = QApplication::Translate('Package Contribution');
			$this->lblPackageContributionId->Text = ($this->objPackageVersion->PackageContribution) ? $this->objPackageVersion->PackageContribution->__toString() : null;
			$this->lblPackageContributionId->Required = true;
			return $this->lblPackageContributionId;
		}

		/**
		 * Create and setup QIntegerTextBox txtVersionNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtVersionNumber_Create($strControlId = null) {
			$this->txtVersionNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtVersionNumber->Name = QApplication::Translate('Version Number');
			$this->txtVersionNumber->Text = $this->objPackageVersion->VersionNumber;
			$this->txtVersionNumber->Required = true;
			return $this->txtVersionNumber;
		}

		/**
		 * Create and setup QLabel lblVersionNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblVersionNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblVersionNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblVersionNumber->Name = QApplication::Translate('Version Number');
			$this->lblVersionNumber->Text = $this->objPackageVersion->VersionNumber;
			$this->lblVersionNumber->Required = true;
			$this->lblVersionNumber->Format = $strFormat;
			return $this->lblVersionNumber;
		}

		/**
		 * Create and setup QTextBox txtNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNotes_Create($strControlId = null) {
			$this->txtNotes = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNotes->Name = QApplication::Translate('Notes');
			$this->txtNotes->Text = $this->objPackageVersion->Notes;
			$this->txtNotes->TextMode = QTextMode::MultiLine;
			return $this->txtNotes;
		}

		/**
		 * Create and setup QLabel lblNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNotes_Create($strControlId = null) {
			$this->lblNotes = new QLabel($this->objParentObject, $strControlId);
			$this->lblNotes->Name = QApplication::Translate('Notes');
			$this->lblNotes->Text = $this->objPackageVersion->Notes;
			return $this->lblNotes;
		}

		/**
		 * Create and setup QTextBox txtQcodoVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQcodoVersion_Create($strControlId = null) {
			$this->txtQcodoVersion = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQcodoVersion->Name = QApplication::Translate('Qcodo Version');
			$this->txtQcodoVersion->Text = $this->objPackageVersion->QcodoVersion;
			$this->txtQcodoVersion->MaxLength = PackageVersion::QcodoVersionMaxLength;
			return $this->txtQcodoVersion;
		}

		/**
		 * Create and setup QLabel lblQcodoVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQcodoVersion_Create($strControlId = null) {
			$this->lblQcodoVersion = new QLabel($this->objParentObject, $strControlId);
			$this->lblQcodoVersion->Name = QApplication::Translate('Qcodo Version');
			$this->lblQcodoVersion->Text = $this->objPackageVersion->QcodoVersion;
			return $this->lblQcodoVersion;
		}

		/**
		 * Create and setup QIntegerTextBox txtNewFileCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtNewFileCount_Create($strControlId = null) {
			$this->txtNewFileCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtNewFileCount->Name = QApplication::Translate('New File Count');
			$this->txtNewFileCount->Text = $this->objPackageVersion->NewFileCount;
			return $this->txtNewFileCount;
		}

		/**
		 * Create and setup QLabel lblNewFileCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblNewFileCount_Create($strControlId = null, $strFormat = null) {
			$this->lblNewFileCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblNewFileCount->Name = QApplication::Translate('New File Count');
			$this->lblNewFileCount->Text = $this->objPackageVersion->NewFileCount;
			$this->lblNewFileCount->Format = $strFormat;
			return $this->lblNewFileCount;
		}

		/**
		 * Create and setup QIntegerTextBox txtChangedFileCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtChangedFileCount_Create($strControlId = null) {
			$this->txtChangedFileCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtChangedFileCount->Name = QApplication::Translate('Changed File Count');
			$this->txtChangedFileCount->Text = $this->objPackageVersion->ChangedFileCount;
			return $this->txtChangedFileCount;
		}

		/**
		 * Create and setup QLabel lblChangedFileCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblChangedFileCount_Create($strControlId = null, $strFormat = null) {
			$this->lblChangedFileCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblChangedFileCount->Name = QApplication::Translate('Changed File Count');
			$this->lblChangedFileCount->Text = $this->objPackageVersion->ChangedFileCount;
			$this->lblChangedFileCount->Format = $strFormat;
			return $this->lblChangedFileCount;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objPackageVersion->PostDate;
			$this->calPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
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
			$this->lblPostDate->Text = sprintf($this->objPackageVersion->PostDate) ? $this->objPackageVersion->PostDate->__toString($this->strPostDateDateTimeFormat) : null;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDownloadCount_Create($strControlId = null) {
			$this->txtDownloadCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDownloadCount->Name = QApplication::Translate('Download Count');
			$this->txtDownloadCount->Text = $this->objPackageVersion->DownloadCount;
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
			$this->lblDownloadCount->Text = $this->objPackageVersion->DownloadCount;
			$this->lblDownloadCount->Format = $strFormat;
			return $this->lblDownloadCount;
		}



		/**
		 * Refresh this MetaControl with Data from the local PackageVersion object.
		 * @param boolean $blnReload reload PackageVersion from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPackageVersion->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPackageVersion->Id;

			if ($this->lstPackageContribution) {
					$this->lstPackageContribution->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPackageContribution->AddItem(QApplication::Translate('- Select One -'), null);
				$objPackageContributionArray = PackageContribution::LoadAll();
				if ($objPackageContributionArray) foreach ($objPackageContributionArray as $objPackageContribution) {
					$objListItem = new QListItem($objPackageContribution->__toString(), $objPackageContribution->Id);
					if (($this->objPackageVersion->PackageContribution) && ($this->objPackageVersion->PackageContribution->Id == $objPackageContribution->Id))
						$objListItem->Selected = true;
					$this->lstPackageContribution->AddItem($objListItem);
				}
			}
			if ($this->lblPackageContributionId) $this->lblPackageContributionId->Text = ($this->objPackageVersion->PackageContribution) ? $this->objPackageVersion->PackageContribution->__toString() : null;

			if ($this->txtVersionNumber) $this->txtVersionNumber->Text = $this->objPackageVersion->VersionNumber;
			if ($this->lblVersionNumber) $this->lblVersionNumber->Text = $this->objPackageVersion->VersionNumber;

			if ($this->txtNotes) $this->txtNotes->Text = $this->objPackageVersion->Notes;
			if ($this->lblNotes) $this->lblNotes->Text = $this->objPackageVersion->Notes;

			if ($this->txtQcodoVersion) $this->txtQcodoVersion->Text = $this->objPackageVersion->QcodoVersion;
			if ($this->lblQcodoVersion) $this->lblQcodoVersion->Text = $this->objPackageVersion->QcodoVersion;

			if ($this->txtNewFileCount) $this->txtNewFileCount->Text = $this->objPackageVersion->NewFileCount;
			if ($this->lblNewFileCount) $this->lblNewFileCount->Text = $this->objPackageVersion->NewFileCount;

			if ($this->txtChangedFileCount) $this->txtChangedFileCount->Text = $this->objPackageVersion->ChangedFileCount;
			if ($this->lblChangedFileCount) $this->lblChangedFileCount->Text = $this->objPackageVersion->ChangedFileCount;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objPackageVersion->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objPackageVersion->PostDate) ? $this->objPackageVersion->__toString($this->strPostDateDateTimeFormat) : null;

			if ($this->txtDownloadCount) $this->txtDownloadCount->Text = $this->objPackageVersion->DownloadCount;
			if ($this->lblDownloadCount) $this->lblDownloadCount->Text = $this->objPackageVersion->DownloadCount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PACKAGEVERSION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PackageVersion instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePackageVersion() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPackageContribution) $this->objPackageVersion->PackageContributionId = $this->lstPackageContribution->SelectedValue;
				if ($this->txtVersionNumber) $this->objPackageVersion->VersionNumber = $this->txtVersionNumber->Text;
				if ($this->txtNotes) $this->objPackageVersion->Notes = $this->txtNotes->Text;
				if ($this->txtQcodoVersion) $this->objPackageVersion->QcodoVersion = $this->txtQcodoVersion->Text;
				if ($this->txtNewFileCount) $this->objPackageVersion->NewFileCount = $this->txtNewFileCount->Text;
				if ($this->txtChangedFileCount) $this->objPackageVersion->ChangedFileCount = $this->txtChangedFileCount->Text;
				if ($this->calPostDate) $this->objPackageVersion->PostDate = $this->calPostDate->DateTime;
				if ($this->txtDownloadCount) $this->objPackageVersion->DownloadCount = $this->txtDownloadCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PackageVersion object
				$this->objPackageVersion->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PackageVersion instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePackageVersion() {
			$this->objPackageVersion->Delete();
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
				case 'PackageVersion': return $this->objPackageVersion;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PackageVersion fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PackageContributionIdControl':
					if (!$this->lstPackageContribution) return $this->lstPackageContribution_Create();
					return $this->lstPackageContribution;
				case 'PackageContributionIdLabel':
					if (!$this->lblPackageContributionId) return $this->lblPackageContributionId_Create();
					return $this->lblPackageContributionId;
				case 'VersionNumberControl':
					if (!$this->txtVersionNumber) return $this->txtVersionNumber_Create();
					return $this->txtVersionNumber;
				case 'VersionNumberLabel':
					if (!$this->lblVersionNumber) return $this->lblVersionNumber_Create();
					return $this->lblVersionNumber;
				case 'NotesControl':
					if (!$this->txtNotes) return $this->txtNotes_Create();
					return $this->txtNotes;
				case 'NotesLabel':
					if (!$this->lblNotes) return $this->lblNotes_Create();
					return $this->lblNotes;
				case 'QcodoVersionControl':
					if (!$this->txtQcodoVersion) return $this->txtQcodoVersion_Create();
					return $this->txtQcodoVersion;
				case 'QcodoVersionLabel':
					if (!$this->lblQcodoVersion) return $this->lblQcodoVersion_Create();
					return $this->lblQcodoVersion;
				case 'NewFileCountControl':
					if (!$this->txtNewFileCount) return $this->txtNewFileCount_Create();
					return $this->txtNewFileCount;
				case 'NewFileCountLabel':
					if (!$this->lblNewFileCount) return $this->lblNewFileCount_Create();
					return $this->lblNewFileCount;
				case 'ChangedFileCountControl':
					if (!$this->txtChangedFileCount) return $this->txtChangedFileCount_Create();
					return $this->txtChangedFileCount;
				case 'ChangedFileCountLabel':
					if (!$this->lblChangedFileCount) return $this->lblChangedFileCount_Create();
					return $this->lblChangedFileCount;
				case 'PostDateControl':
					if (!$this->calPostDate) return $this->calPostDate_Create();
					return $this->calPostDate;
				case 'PostDateLabel':
					if (!$this->lblPostDate) return $this->lblPostDate_Create();
					return $this->lblPostDate;
				case 'DownloadCountControl':
					if (!$this->txtDownloadCount) return $this->txtDownloadCount_Create();
					return $this->txtDownloadCount;
				case 'DownloadCountLabel':
					if (!$this->lblDownloadCount) return $this->lblDownloadCount_Create();
					return $this->lblDownloadCount;
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
					// Controls that point to PackageVersion fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PackageContributionIdControl':
						return ($this->lstPackageContribution = QType::Cast($mixValue, 'QControl'));
					case 'VersionNumberControl':
						return ($this->txtVersionNumber = QType::Cast($mixValue, 'QControl'));
					case 'NotesControl':
						return ($this->txtNotes = QType::Cast($mixValue, 'QControl'));
					case 'QcodoVersionControl':
						return ($this->txtQcodoVersion = QType::Cast($mixValue, 'QControl'));
					case 'NewFileCountControl':
						return ($this->txtNewFileCount = QType::Cast($mixValue, 'QControl'));
					case 'ChangedFileCountControl':
						return ($this->txtChangedFileCount = QType::Cast($mixValue, 'QControl'));
					case 'PostDateControl':
						return ($this->calPostDate = QType::Cast($mixValue, 'QControl'));
					case 'DownloadCountControl':
						return ($this->txtDownloadCount = QType::Cast($mixValue, 'QControl'));
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