<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Announcement class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Announcement object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AnnouncementMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */

	class AnnouncementMetaControl extends QBaseClass {
		// General Variables
		protected $objAnnouncement;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Announcement's individual data fields
		protected $lblId;
		protected $txtAnnouncement;

		// Controls that allow the viewing of Announcement's individual data fields
		protected $lblAnnouncement;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AnnouncementMetaControl to edit a single Announcement object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Announcement object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AnnouncementMetaControl
		 * @param Announcement $objAnnouncement new or existing Announcement object
		 */
		 public function __construct($objParentObject, Announcement $objAnnouncement) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AnnouncementMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Announcement object
			$this->objAnnouncement = $objAnnouncement;

			// Figure out if we're Editing or Creating New
			if ($this->objAnnouncement->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AnnouncementMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Announcement object creation - defaults to CreateOrEdit
 		 * @return AnnouncementMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objAnnouncement = Announcement::Load($intId);

				// Announcement was found -- return it!
				if ($objAnnouncement)
					return new AnnouncementMetaControl($objParentObject, $objAnnouncement);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Announcement object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AnnouncementMetaControl($objParentObject, new Announcement());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AnnouncementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Announcement object creation - defaults to CreateOrEdit
		 * @return AnnouncementMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return AnnouncementMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AnnouncementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Announcement object creation - defaults to CreateOrEdit
		 * @return AnnouncementMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return AnnouncementMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objAnnouncement->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtAnnouncement
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAnnouncement_Create($strControlId = null) {
			$this->txtAnnouncement = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAnnouncement->Name = QApplication::Translate('Announcement');
			$this->txtAnnouncement->Text = $this->objAnnouncement->Announcement;
			$this->txtAnnouncement->TextMode = QTextMode::MultiLine;
			return $this->txtAnnouncement;
		}

		/**
		 * Create and setup QLabel lblAnnouncement
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAnnouncement_Create($strControlId = null) {
			$this->lblAnnouncement = new QLabel($this->objParentObject, $strControlId);
			$this->lblAnnouncement->Name = QApplication::Translate('Announcement');
			$this->lblAnnouncement->Text = $this->objAnnouncement->Announcement;
			return $this->lblAnnouncement;
		}



		/**
		 * Refresh this MetaControl with Data from the local Announcement object.
		 * @param boolean $blnReload reload Announcement from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAnnouncement->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAnnouncement->Id;

			if ($this->txtAnnouncement) $this->txtAnnouncement->Text = $this->objAnnouncement->Announcement;
			if ($this->lblAnnouncement) $this->lblAnnouncement->Text = $this->objAnnouncement->Announcement;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ANNOUNCEMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Announcement instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAnnouncement() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtAnnouncement) $this->objAnnouncement->Announcement = $this->txtAnnouncement->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Announcement object
				$this->objAnnouncement->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Announcement instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAnnouncement() {
			$this->objAnnouncement->Delete();
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
				case 'Announcement': return $this->objAnnouncement;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Announcement fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'AnnouncementControl':
					if (!$this->txtAnnouncement) return $this->txtAnnouncement_Create();
					return $this->txtAnnouncement;
				case 'AnnouncementLabel':
					if (!$this->lblAnnouncement) return $this->lblAnnouncement_Create();
					return $this->lblAnnouncement;
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
					// Controls that point to Announcement fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AnnouncementControl':
						return ($this->txtAnnouncement = QType::Cast($mixValue, 'QControl'));
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