<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PackageContribution class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PackageContribution object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PackageContributionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read PackageContribution $PackageContribution the actual PackageContribution data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PackageIdControl
	 * property-read QLabel $PackageIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $CurrentPackageVersionIdControl
	 * property-read QLabel $CurrentPackageVersionIdLabel
	 * property QDateTimePicker $CurrentPostDateControl
	 * property-read QLabel $CurrentPostDateLabel
	 * property QIntegerTextBox $DownloadCountControl
	 * property-read QLabel $DownloadCountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PackageContributionMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PackageContribution objPackageContribution
		 * @access protected
		 */
		protected $objPackageContribution;

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

		// Controls that allow the editing of PackageContribution's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstPackage;
         * @access protected
         */
		protected $lstPackage;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstCurrentPackageVersion;
         * @access protected
         */
		protected $lstCurrentPackageVersion;

        /**
         * @var QDateTimePicker calCurrentPostDate;
         * @access protected
         */
		protected $calCurrentPostDate;

        /**
         * @var QIntegerTextBox txtDownloadCount;
         * @access protected
         */
		protected $txtDownloadCount;


		// Controls that allow the viewing of PackageContribution's individual data fields
        /**
         * @var QLabel lblPackageId
         * @access protected
         */
		protected $lblPackageId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblCurrentPackageVersionId
         * @access protected
         */
		protected $lblCurrentPackageVersionId;

        /**
         * @var QLabel lblCurrentPostDate
         * @access protected
         */
		protected $lblCurrentPostDate;

        /**
         * @var QLabel lblDownloadCount
         * @access protected
         */
		protected $lblDownloadCount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PackageContributionMetaControl to edit a single PackageContribution object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PackageContribution object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageContributionMetaControl
		 * @param PackageContribution $objPackageContribution new or existing PackageContribution object
		 */
		 public function __construct($objParentObject, PackageContribution $objPackageContribution) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PackageContributionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PackageContribution object
			$this->objPackageContribution = $objPackageContribution;

			// Figure out if we're Editing or Creating New
			if ($this->objPackageContribution->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageContributionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PackageContribution object creation - defaults to CreateOrEdit
 		 * @return PackageContributionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPackageContribution = PackageContribution::Load($intId);

				// PackageContribution was found -- return it!
				if ($objPackageContribution)
					return new PackageContributionMetaControl($objParentObject, $objPackageContribution);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PackageContribution object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PackageContributionMetaControl($objParentObject, new PackageContribution());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageContributionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageContribution object creation - defaults to CreateOrEdit
		 * @return PackageContributionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PackageContributionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PackageContributionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PackageContribution object creation - defaults to CreateOrEdit
		 * @return PackageContributionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PackageContributionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPackageContribution->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPackage
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPackage_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPackage = new QListBox($this->objParentObject, $strControlId);
			$this->lstPackage->Name = QApplication::Translate('Package');
			$this->lstPackage->Required = true;
			if (!$this->blnEditMode)
				$this->lstPackage->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPackageCursor = Package::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPackage = Package::InstantiateCursor($objPackageCursor)) {
				$objListItem = new QListItem($objPackage->__toString(), $objPackage->Id);
				if (($this->objPackageContribution->Package) && ($this->objPackageContribution->Package->Id == $objPackage->Id))
					$objListItem->Selected = true;
				$this->lstPackage->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPackage;
		}

		/**
		 * Create and setup QLabel lblPackageId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPackageId_Create($strControlId = null) {
			$this->lblPackageId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPackageId->Name = QApplication::Translate('Package');
			$this->lblPackageId->Text = ($this->objPackageContribution->Package) ? $this->objPackageContribution->Package->__toString() : null;
			$this->lblPackageId->Required = true;
			return $this->lblPackageId;
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
				if (($this->objPackageContribution->Person) && ($this->objPackageContribution->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objPackageContribution->Person) ? $this->objPackageContribution->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstCurrentPackageVersion
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCurrentPackageVersion_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCurrentPackageVersion = new QListBox($this->objParentObject, $strControlId);
			$this->lstCurrentPackageVersion->Name = QApplication::Translate('Current Package Version');
			$this->lstCurrentPackageVersion->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCurrentPackageVersionCursor = PackageVersion::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCurrentPackageVersion = PackageVersion::InstantiateCursor($objCurrentPackageVersionCursor)) {
				$objListItem = new QListItem($objCurrentPackageVersion->__toString(), $objCurrentPackageVersion->Id);
				if (($this->objPackageContribution->CurrentPackageVersion) && ($this->objPackageContribution->CurrentPackageVersion->Id == $objCurrentPackageVersion->Id))
					$objListItem->Selected = true;
				$this->lstCurrentPackageVersion->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCurrentPackageVersion;
		}

		/**
		 * Create and setup QLabel lblCurrentPackageVersionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentPackageVersionId_Create($strControlId = null) {
			$this->lblCurrentPackageVersionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentPackageVersionId->Name = QApplication::Translate('Current Package Version');
			$this->lblCurrentPackageVersionId->Text = ($this->objPackageContribution->CurrentPackageVersion) ? $this->objPackageContribution->CurrentPackageVersion->__toString() : null;
			return $this->lblCurrentPackageVersionId;
		}

		/**
		 * Create and setup QDateTimePicker calCurrentPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCurrentPostDate_Create($strControlId = null) {
			$this->calCurrentPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCurrentPostDate->Name = QApplication::Translate('Current Post Date');
			$this->calCurrentPostDate->DateTime = $this->objPackageContribution->CurrentPostDate;
			$this->calCurrentPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCurrentPostDate;
		}

		/**
		 * Create and setup QLabel lblCurrentPostDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCurrentPostDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCurrentPostDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentPostDate->Name = QApplication::Translate('Current Post Date');
			$this->strCurrentPostDateDateTimeFormat = $strDateTimeFormat;
			$this->lblCurrentPostDate->Text = sprintf($this->objPackageContribution->CurrentPostDate) ? $this->objPackageContribution->CurrentPostDate->__toString($this->strCurrentPostDateDateTimeFormat) : null;
			return $this->lblCurrentPostDate;
		}

		protected $strCurrentPostDateDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDownloadCount_Create($strControlId = null) {
			$this->txtDownloadCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDownloadCount->Name = QApplication::Translate('Download Count');
			$this->txtDownloadCount->Text = $this->objPackageContribution->DownloadCount;
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
			$this->lblDownloadCount->Text = $this->objPackageContribution->DownloadCount;
			$this->lblDownloadCount->Format = $strFormat;
			return $this->lblDownloadCount;
		}



		/**
		 * Refresh this MetaControl with Data from the local PackageContribution object.
		 * @param boolean $blnReload reload PackageContribution from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPackageContribution->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPackageContribution->Id;

			if ($this->lstPackage) {
					$this->lstPackage->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPackage->AddItem(QApplication::Translate('- Select One -'), null);
				$objPackageArray = Package::LoadAll();
				if ($objPackageArray) foreach ($objPackageArray as $objPackage) {
					$objListItem = new QListItem($objPackage->__toString(), $objPackage->Id);
					if (($this->objPackageContribution->Package) && ($this->objPackageContribution->Package->Id == $objPackage->Id))
						$objListItem->Selected = true;
					$this->lstPackage->AddItem($objListItem);
				}
			}
			if ($this->lblPackageId) $this->lblPackageId->Text = ($this->objPackageContribution->Package) ? $this->objPackageContribution->Package->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objPackageContribution->Person) && ($this->objPackageContribution->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objPackageContribution->Person) ? $this->objPackageContribution->Person->__toString() : null;

			if ($this->lstCurrentPackageVersion) {
					$this->lstCurrentPackageVersion->RemoveAllItems();
				$this->lstCurrentPackageVersion->AddItem(QApplication::Translate('- Select One -'), null);
				$objCurrentPackageVersionArray = PackageVersion::LoadAll();
				if ($objCurrentPackageVersionArray) foreach ($objCurrentPackageVersionArray as $objCurrentPackageVersion) {
					$objListItem = new QListItem($objCurrentPackageVersion->__toString(), $objCurrentPackageVersion->Id);
					if (($this->objPackageContribution->CurrentPackageVersion) && ($this->objPackageContribution->CurrentPackageVersion->Id == $objCurrentPackageVersion->Id))
						$objListItem->Selected = true;
					$this->lstCurrentPackageVersion->AddItem($objListItem);
				}
			}
			if ($this->lblCurrentPackageVersionId) $this->lblCurrentPackageVersionId->Text = ($this->objPackageContribution->CurrentPackageVersion) ? $this->objPackageContribution->CurrentPackageVersion->__toString() : null;

			if ($this->calCurrentPostDate) $this->calCurrentPostDate->DateTime = $this->objPackageContribution->CurrentPostDate;
			if ($this->lblCurrentPostDate) $this->lblCurrentPostDate->Text = sprintf($this->objPackageContribution->CurrentPostDate) ? $this->objPackageContribution->__toString($this->strCurrentPostDateDateTimeFormat) : null;

			if ($this->txtDownloadCount) $this->txtDownloadCount->Text = $this->objPackageContribution->DownloadCount;
			if ($this->lblDownloadCount) $this->lblDownloadCount->Text = $this->objPackageContribution->DownloadCount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PACKAGECONTRIBUTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PackageContribution instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePackageContribution() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPackage) $this->objPackageContribution->PackageId = $this->lstPackage->SelectedValue;
				if ($this->lstPerson) $this->objPackageContribution->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstCurrentPackageVersion) $this->objPackageContribution->CurrentPackageVersionId = $this->lstCurrentPackageVersion->SelectedValue;
				if ($this->calCurrentPostDate) $this->objPackageContribution->CurrentPostDate = $this->calCurrentPostDate->DateTime;
				if ($this->txtDownloadCount) $this->objPackageContribution->DownloadCount = $this->txtDownloadCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PackageContribution object
				$this->objPackageContribution->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PackageContribution instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePackageContribution() {
			$this->objPackageContribution->Delete();
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
				case 'PackageContribution': return $this->objPackageContribution;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PackageContribution fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PackageIdControl':
					if (!$this->lstPackage) return $this->lstPackage_Create();
					return $this->lstPackage;
				case 'PackageIdLabel':
					if (!$this->lblPackageId) return $this->lblPackageId_Create();
					return $this->lblPackageId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'CurrentPackageVersionIdControl':
					if (!$this->lstCurrentPackageVersion) return $this->lstCurrentPackageVersion_Create();
					return $this->lstCurrentPackageVersion;
				case 'CurrentPackageVersionIdLabel':
					if (!$this->lblCurrentPackageVersionId) return $this->lblCurrentPackageVersionId_Create();
					return $this->lblCurrentPackageVersionId;
				case 'CurrentPostDateControl':
					if (!$this->calCurrentPostDate) return $this->calCurrentPostDate_Create();
					return $this->calCurrentPostDate;
				case 'CurrentPostDateLabel':
					if (!$this->lblCurrentPostDate) return $this->lblCurrentPostDate_Create();
					return $this->lblCurrentPostDate;
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
					// Controls that point to PackageContribution fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PackageIdControl':
						return ($this->lstPackage = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'CurrentPackageVersionIdControl':
						return ($this->lstCurrentPackageVersion = QType::Cast($mixValue, 'QControl'));
					case 'CurrentPostDateControl':
						return ($this->calCurrentPostDate = QType::Cast($mixValue, 'QControl'));
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