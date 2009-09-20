<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WikiItem class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WikiItem object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WikiItemMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read WikiItem $WikiItem the actual WikiItem data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $PathControl
	 * property-read QLabel $PathLabel
	 * property QListBox $WikiItemTypeIdControl
	 * property-read QLabel $WikiItemTypeIdLabel
	 * property QListBox $CurrentWikiVersionIdControl
	 * property-read QLabel $CurrentWikiVersionIdLabel
	 * property QTextBox $CurrentNameControl
	 * property-read QLabel $CurrentNameLabel
	 * property QListBox $CurrentPostedByPersonIdControl
	 * property-read QLabel $CurrentPostedByPersonIdLabel
	 * property QDateTimePicker $CurrentPostDateControl
	 * property-read QLabel $CurrentPostDateLabel
	 * property QListBox $TopicLinkControl
	 * property-read QLabel $TopicLinkLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WikiItemMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWikiItem;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of WikiItem's individual data fields
		protected $lblId;
		protected $txtPath;
		protected $lstWikiItemType;
		protected $lstCurrentWikiVersion;
		protected $txtCurrentName;
		protected $lstCurrentPostedByPerson;
		protected $calCurrentPostDate;

		// Controls that allow the viewing of WikiItem's individual data fields
		protected $lblPath;
		protected $lblWikiItemTypeId;
		protected $lblCurrentWikiVersionId;
		protected $lblCurrentName;
		protected $lblCurrentPostedByPersonId;
		protected $lblCurrentPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstTopicLink;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblTopicLink;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WikiItemMetaControl to edit a single WikiItem object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WikiItem object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiItemMetaControl
		 * @param WikiItem $objWikiItem new or existing WikiItem object
		 */
		 public function __construct($objParentObject, WikiItem $objWikiItem) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WikiItemMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WikiItem object
			$this->objWikiItem = $objWikiItem;

			// Figure out if we're Editing or Creating New
			if ($this->objWikiItem->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiItemMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WikiItem object creation - defaults to CreateOrEdit
 		 * @return WikiItemMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objWikiItem = WikiItem::Load($intId);

				// WikiItem was found -- return it!
				if ($objWikiItem)
					return new WikiItemMetaControl($objParentObject, $objWikiItem);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WikiItem object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WikiItemMetaControl($objParentObject, new WikiItem());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiItem object creation - defaults to CreateOrEdit
		 * @return WikiItemMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return WikiItemMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiItem object creation - defaults to CreateOrEdit
		 * @return WikiItemMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return WikiItemMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objWikiItem->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtPath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPath_Create($strControlId = null) {
			$this->txtPath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPath->Name = QApplication::Translate('Path');
			$this->txtPath->Text = $this->objWikiItem->Path;
			$this->txtPath->Required = true;
			$this->txtPath->MaxLength = WikiItem::PathMaxLength;
			return $this->txtPath;
		}

		/**
		 * Create and setup QLabel lblPath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPath_Create($strControlId = null) {
			$this->lblPath = new QLabel($this->objParentObject, $strControlId);
			$this->lblPath->Name = QApplication::Translate('Path');
			$this->lblPath->Text = $this->objWikiItem->Path;
			$this->lblPath->Required = true;
			return $this->lblPath;
		}

		/**
		 * Create and setup QListBox lstWikiItemType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstWikiItemType_Create($strControlId = null) {
			$this->lstWikiItemType = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiItemType->Name = QApplication::Translate('Wiki Item Type');
			$this->lstWikiItemType->Required = true;
			foreach (WikiItemType::$NameArray as $intId => $strValue)
				$this->lstWikiItemType->AddItem(new QListItem($strValue, $intId, $this->objWikiItem->WikiItemTypeId == $intId));
			return $this->lstWikiItemType;
		}

		/**
		 * Create and setup QLabel lblWikiItemTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiItemTypeId_Create($strControlId = null) {
			$this->lblWikiItemTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiItemTypeId->Name = QApplication::Translate('Wiki Item Type');
			$this->lblWikiItemTypeId->Text = ($this->objWikiItem->WikiItemTypeId) ? WikiItemType::$NameArray[$this->objWikiItem->WikiItemTypeId] : null;
			$this->lblWikiItemTypeId->Required = true;
			return $this->lblWikiItemTypeId;
		}

		/**
		 * Create and setup QListBox lstCurrentWikiVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCurrentWikiVersion_Create($strControlId = null) {
			$this->lstCurrentWikiVersion = new QListBox($this->objParentObject, $strControlId);
			$this->lstCurrentWikiVersion->Name = QApplication::Translate('Current Wiki Version');
			$this->lstCurrentWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
			$objCurrentWikiVersionArray = WikiVersion::LoadAll();
			if ($objCurrentWikiVersionArray) foreach ($objCurrentWikiVersionArray as $objCurrentWikiVersion) {
				$objListItem = new QListItem($objCurrentWikiVersion->__toString(), $objCurrentWikiVersion->Id);
				if (($this->objWikiItem->CurrentWikiVersion) && ($this->objWikiItem->CurrentWikiVersion->Id == $objCurrentWikiVersion->Id))
					$objListItem->Selected = true;
				$this->lstCurrentWikiVersion->AddItem($objListItem);
			}
			return $this->lstCurrentWikiVersion;
		}

		/**
		 * Create and setup QLabel lblCurrentWikiVersionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentWikiVersionId_Create($strControlId = null) {
			$this->lblCurrentWikiVersionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentWikiVersionId->Name = QApplication::Translate('Current Wiki Version');
			$this->lblCurrentWikiVersionId->Text = ($this->objWikiItem->CurrentWikiVersion) ? $this->objWikiItem->CurrentWikiVersion->__toString() : null;
			return $this->lblCurrentWikiVersionId;
		}

		/**
		 * Create and setup QTextBox txtCurrentName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCurrentName_Create($strControlId = null) {
			$this->txtCurrentName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCurrentName->Name = QApplication::Translate('Current Name');
			$this->txtCurrentName->Text = $this->objWikiItem->CurrentName;
			$this->txtCurrentName->MaxLength = WikiItem::CurrentNameMaxLength;
			return $this->txtCurrentName;
		}

		/**
		 * Create and setup QLabel lblCurrentName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentName_Create($strControlId = null) {
			$this->lblCurrentName = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentName->Name = QApplication::Translate('Current Name');
			$this->lblCurrentName->Text = $this->objWikiItem->CurrentName;
			return $this->lblCurrentName;
		}

		/**
		 * Create and setup QListBox lstCurrentPostedByPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCurrentPostedByPerson_Create($strControlId = null) {
			$this->lstCurrentPostedByPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstCurrentPostedByPerson->Name = QApplication::Translate('Current Posted By Person');
			$this->lstCurrentPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objCurrentPostedByPersonArray = Person::LoadAll();
			if ($objCurrentPostedByPersonArray) foreach ($objCurrentPostedByPersonArray as $objCurrentPostedByPerson) {
				$objListItem = new QListItem($objCurrentPostedByPerson->__toString(), $objCurrentPostedByPerson->Id);
				if (($this->objWikiItem->CurrentPostedByPerson) && ($this->objWikiItem->CurrentPostedByPerson->Id == $objCurrentPostedByPerson->Id))
					$objListItem->Selected = true;
				$this->lstCurrentPostedByPerson->AddItem($objListItem);
			}
			return $this->lstCurrentPostedByPerson;
		}

		/**
		 * Create and setup QLabel lblCurrentPostedByPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentPostedByPersonId_Create($strControlId = null) {
			$this->lblCurrentPostedByPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentPostedByPersonId->Name = QApplication::Translate('Current Posted By Person');
			$this->lblCurrentPostedByPersonId->Text = ($this->objWikiItem->CurrentPostedByPerson) ? $this->objWikiItem->CurrentPostedByPerson->__toString() : null;
			return $this->lblCurrentPostedByPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calCurrentPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCurrentPostDate_Create($strControlId = null) {
			$this->calCurrentPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCurrentPostDate->Name = QApplication::Translate('Current Post Date');
			$this->calCurrentPostDate->DateTime = $this->objWikiItem->CurrentPostDate;
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
			$this->lblCurrentPostDate->Text = sprintf($this->objWikiItem->CurrentPostDate) ? $this->objWikiItem->CurrentPostDate->__toString($this->strCurrentPostDateDateTimeFormat) : null;
			return $this->lblCurrentPostDate;
		}

		protected $strCurrentPostDateDateTimeFormat;

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
				if ($objTopicLink->WikiItemId == $this->objWikiItem->Id)
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
			$this->lblTopicLink->Text = ($this->objWikiItem->TopicLink) ? $this->objWikiItem->TopicLink->__toString() : null;
			return $this->lblTopicLink;
		}



		/**
		 * Refresh this MetaControl with Data from the local WikiItem object.
		 * @param boolean $blnReload reload WikiItem from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWikiItem->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objWikiItem->Id;

			if ($this->txtPath) $this->txtPath->Text = $this->objWikiItem->Path;
			if ($this->lblPath) $this->lblPath->Text = $this->objWikiItem->Path;

			if ($this->lstWikiItemType) $this->lstWikiItemType->SelectedValue = $this->objWikiItem->WikiItemTypeId;
			if ($this->lblWikiItemTypeId) $this->lblWikiItemTypeId->Text = ($this->objWikiItem->WikiItemTypeId) ? WikiItemType::$NameArray[$this->objWikiItem->WikiItemTypeId] : null;

			if ($this->lstCurrentWikiVersion) {
					$this->lstCurrentWikiVersion->RemoveAllItems();
				$this->lstCurrentWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
				$objCurrentWikiVersionArray = WikiVersion::LoadAll();
				if ($objCurrentWikiVersionArray) foreach ($objCurrentWikiVersionArray as $objCurrentWikiVersion) {
					$objListItem = new QListItem($objCurrentWikiVersion->__toString(), $objCurrentWikiVersion->Id);
					if (($this->objWikiItem->CurrentWikiVersion) && ($this->objWikiItem->CurrentWikiVersion->Id == $objCurrentWikiVersion->Id))
						$objListItem->Selected = true;
					$this->lstCurrentWikiVersion->AddItem($objListItem);
				}
			}
			if ($this->lblCurrentWikiVersionId) $this->lblCurrentWikiVersionId->Text = ($this->objWikiItem->CurrentWikiVersion) ? $this->objWikiItem->CurrentWikiVersion->__toString() : null;

			if ($this->txtCurrentName) $this->txtCurrentName->Text = $this->objWikiItem->CurrentName;
			if ($this->lblCurrentName) $this->lblCurrentName->Text = $this->objWikiItem->CurrentName;

			if ($this->lstCurrentPostedByPerson) {
					$this->lstCurrentPostedByPerson->RemoveAllItems();
				$this->lstCurrentPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objCurrentPostedByPersonArray = Person::LoadAll();
				if ($objCurrentPostedByPersonArray) foreach ($objCurrentPostedByPersonArray as $objCurrentPostedByPerson) {
					$objListItem = new QListItem($objCurrentPostedByPerson->__toString(), $objCurrentPostedByPerson->Id);
					if (($this->objWikiItem->CurrentPostedByPerson) && ($this->objWikiItem->CurrentPostedByPerson->Id == $objCurrentPostedByPerson->Id))
						$objListItem->Selected = true;
					$this->lstCurrentPostedByPerson->AddItem($objListItem);
				}
			}
			if ($this->lblCurrentPostedByPersonId) $this->lblCurrentPostedByPersonId->Text = ($this->objWikiItem->CurrentPostedByPerson) ? $this->objWikiItem->CurrentPostedByPerson->__toString() : null;

			if ($this->calCurrentPostDate) $this->calCurrentPostDate->DateTime = $this->objWikiItem->CurrentPostDate;
			if ($this->lblCurrentPostDate) $this->lblCurrentPostDate->Text = sprintf($this->objWikiItem->CurrentPostDate) ? $this->objWikiItem->__toString($this->strCurrentPostDateDateTimeFormat) : null;

			if ($this->lstTopicLink) {
				$this->lstTopicLink->RemoveAllItems();
				$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
				$objTopicLinkArray = TopicLink::LoadAll();
				if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
					$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
					if ($objTopicLink->WikiItemId == $this->objWikiItem->Id)
						$objListItem->Selected = true;
					$this->lstTopicLink->AddItem($objListItem);
				}
			}
			if ($this->lblTopicLink) $this->lblTopicLink->Text = ($this->objWikiItem->TopicLink) ? $this->objWikiItem->TopicLink->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WIKIITEM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WikiItem instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWikiItem() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtPath) $this->objWikiItem->Path = $this->txtPath->Text;
				if ($this->lstWikiItemType) $this->objWikiItem->WikiItemTypeId = $this->lstWikiItemType->SelectedValue;
				if ($this->lstCurrentWikiVersion) $this->objWikiItem->CurrentWikiVersionId = $this->lstCurrentWikiVersion->SelectedValue;
				if ($this->txtCurrentName) $this->objWikiItem->CurrentName = $this->txtCurrentName->Text;
				if ($this->lstCurrentPostedByPerson) $this->objWikiItem->CurrentPostedByPersonId = $this->lstCurrentPostedByPerson->SelectedValue;
				if ($this->calCurrentPostDate) $this->objWikiItem->CurrentPostDate = $this->calCurrentPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstTopicLink) $this->objWikiItem->TopicLink = TopicLink::Load($this->lstTopicLink->SelectedValue);

				// Save the WikiItem object
				$this->objWikiItem->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WikiItem instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWikiItem() {
			$this->objWikiItem->Delete();
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
				case 'WikiItem': return $this->objWikiItem;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WikiItem fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PathControl':
					if (!$this->txtPath) return $this->txtPath_Create();
					return $this->txtPath;
				case 'PathLabel':
					if (!$this->lblPath) return $this->lblPath_Create();
					return $this->lblPath;
				case 'WikiItemTypeIdControl':
					if (!$this->lstWikiItemType) return $this->lstWikiItemType_Create();
					return $this->lstWikiItemType;
				case 'WikiItemTypeIdLabel':
					if (!$this->lblWikiItemTypeId) return $this->lblWikiItemTypeId_Create();
					return $this->lblWikiItemTypeId;
				case 'CurrentWikiVersionIdControl':
					if (!$this->lstCurrentWikiVersion) return $this->lstCurrentWikiVersion_Create();
					return $this->lstCurrentWikiVersion;
				case 'CurrentWikiVersionIdLabel':
					if (!$this->lblCurrentWikiVersionId) return $this->lblCurrentWikiVersionId_Create();
					return $this->lblCurrentWikiVersionId;
				case 'CurrentNameControl':
					if (!$this->txtCurrentName) return $this->txtCurrentName_Create();
					return $this->txtCurrentName;
				case 'CurrentNameLabel':
					if (!$this->lblCurrentName) return $this->lblCurrentName_Create();
					return $this->lblCurrentName;
				case 'CurrentPostedByPersonIdControl':
					if (!$this->lstCurrentPostedByPerson) return $this->lstCurrentPostedByPerson_Create();
					return $this->lstCurrentPostedByPerson;
				case 'CurrentPostedByPersonIdLabel':
					if (!$this->lblCurrentPostedByPersonId) return $this->lblCurrentPostedByPersonId_Create();
					return $this->lblCurrentPostedByPersonId;
				case 'CurrentPostDateControl':
					if (!$this->calCurrentPostDate) return $this->calCurrentPostDate_Create();
					return $this->calCurrentPostDate;
				case 'CurrentPostDateLabel':
					if (!$this->lblCurrentPostDate) return $this->lblCurrentPostDate_Create();
					return $this->lblCurrentPostDate;
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
					// Controls that point to WikiItem fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PathControl':
						return ($this->txtPath = QType::Cast($mixValue, 'QControl'));
					case 'WikiItemTypeIdControl':
						return ($this->lstWikiItemType = QType::Cast($mixValue, 'QControl'));
					case 'CurrentWikiVersionIdControl':
						return ($this->lstCurrentWikiVersion = QType::Cast($mixValue, 'QControl'));
					case 'CurrentNameControl':
						return ($this->txtCurrentName = QType::Cast($mixValue, 'QControl'));
					case 'CurrentPostedByPersonIdControl':
						return ($this->lstCurrentPostedByPerson = QType::Cast($mixValue, 'QControl'));
					case 'CurrentPostDateControl':
						return ($this->calCurrentPostDate = QType::Cast($mixValue, 'QControl'));
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