<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the TopicLink class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single TopicLink object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TopicLinkMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read TopicLink $TopicLink the actual TopicLink data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $TopicLinkTypeIdControl
	 * property-read QLabel $TopicLinkTypeIdLabel
	 * property QIntegerTextBox $TopicCountControl
	 * property-read QLabel $TopicCountLabel
	 * property QIntegerTextBox $MessageCountControl
	 * property-read QLabel $MessageCountLabel
	 * property QDateTimePicker $LastPostDateControl
	 * property-read QLabel $LastPostDateLabel
	 * property QListBox $ForumIdControl
	 * property-read QLabel $ForumIdLabel
	 * property QListBox $IssueIdControl
	 * property-read QLabel $IssueIdLabel
	 * property QListBox $WikiItemIdControl
	 * property-read QLabel $WikiItemIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TopicLinkMetaControlGen extends QBaseClass {
		// General Variables
		protected $objTopicLink;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of TopicLink's individual data fields
		protected $lblId;
		protected $lstTopicLinkType;
		protected $txtTopicCount;
		protected $txtMessageCount;
		protected $calLastPostDate;
		protected $lstForum;
		protected $lstIssue;
		protected $lstWikiItem;

		// Controls that allow the viewing of TopicLink's individual data fields
		protected $lblTopicLinkTypeId;
		protected $lblTopicCount;
		protected $lblMessageCount;
		protected $lblLastPostDate;
		protected $lblForumId;
		protected $lblIssueId;
		protected $lblWikiItemId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TopicLinkMetaControl to edit a single TopicLink object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single TopicLink object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicLinkMetaControl
		 * @param TopicLink $objTopicLink new or existing TopicLink object
		 */
		 public function __construct($objParentObject, TopicLink $objTopicLink) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TopicLinkMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked TopicLink object
			$this->objTopicLink = $objTopicLink;

			// Figure out if we're Editing or Creating New
			if ($this->objTopicLink->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicLinkMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing TopicLink object creation - defaults to CreateOrEdit
 		 * @return TopicLinkMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTopicLink = TopicLink::Load($intId);

				// TopicLink was found -- return it!
				if ($objTopicLink)
					return new TopicLinkMetaControl($objParentObject, $objTopicLink);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a TopicLink object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TopicLinkMetaControl($objParentObject, new TopicLink());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicLinkMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TopicLink object creation - defaults to CreateOrEdit
		 * @return TopicLinkMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TopicLinkMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicLinkMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TopicLink object creation - defaults to CreateOrEdit
		 * @return TopicLinkMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TopicLinkMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTopicLink->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstTopicLinkType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstTopicLinkType_Create($strControlId = null) {
			$this->lstTopicLinkType = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicLinkType->Name = QApplication::Translate('Topic Link Type');
			$this->lstTopicLinkType->Required = true;
			foreach (TopicLinkType::$NameArray as $intId => $strValue)
				$this->lstTopicLinkType->AddItem(new QListItem($strValue, $intId, $this->objTopicLink->TopicLinkTypeId == $intId));
			return $this->lstTopicLinkType;
		}

		/**
		 * Create and setup QLabel lblTopicLinkTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTopicLinkTypeId_Create($strControlId = null) {
			$this->lblTopicLinkTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTopicLinkTypeId->Name = QApplication::Translate('Topic Link Type');
			$this->lblTopicLinkTypeId->Text = ($this->objTopicLink->TopicLinkTypeId) ? TopicLinkType::$NameArray[$this->objTopicLink->TopicLinkTypeId] : null;
			$this->lblTopicLinkTypeId->Required = true;
			return $this->lblTopicLinkTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtTopicCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtTopicCount_Create($strControlId = null) {
			$this->txtTopicCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtTopicCount->Name = QApplication::Translate('Topic Count');
			$this->txtTopicCount->Text = $this->objTopicLink->TopicCount;
			return $this->txtTopicCount;
		}

		/**
		 * Create and setup QLabel lblTopicCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblTopicCount_Create($strControlId = null, $strFormat = null) {
			$this->lblTopicCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblTopicCount->Name = QApplication::Translate('Topic Count');
			$this->lblTopicCount->Text = $this->objTopicLink->TopicCount;
			$this->lblTopicCount->Format = $strFormat;
			return $this->lblTopicCount;
		}

		/**
		 * Create and setup QIntegerTextBox txtMessageCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMessageCount_Create($strControlId = null) {
			$this->txtMessageCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMessageCount->Name = QApplication::Translate('Message Count');
			$this->txtMessageCount->Text = $this->objTopicLink->MessageCount;
			return $this->txtMessageCount;
		}

		/**
		 * Create and setup QLabel lblMessageCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMessageCount_Create($strControlId = null, $strFormat = null) {
			$this->lblMessageCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblMessageCount->Name = QApplication::Translate('Message Count');
			$this->lblMessageCount->Text = $this->objTopicLink->MessageCount;
			$this->lblMessageCount->Format = $strFormat;
			return $this->lblMessageCount;
		}

		/**
		 * Create and setup QDateTimePicker calLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastPostDate_Create($strControlId = null) {
			$this->calLastPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->calLastPostDate->DateTime = $this->objTopicLink->LastPostDate;
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
			$this->lblLastPostDate->Text = sprintf($this->objTopicLink->LastPostDate) ? $this->objTopicLink->LastPostDate->__toString($this->strLastPostDateDateTimeFormat) : null;
			return $this->lblLastPostDate;
		}

		protected $strLastPostDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstForum
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstForum_Create($strControlId = null) {
			$this->lstForum = new QListBox($this->objParentObject, $strControlId);
			$this->lstForum->Name = QApplication::Translate('Forum');
			$this->lstForum->AddItem(QApplication::Translate('- Select One -'), null);
			$objForumArray = Forum::LoadAll();
			if ($objForumArray) foreach ($objForumArray as $objForum) {
				$objListItem = new QListItem($objForum->__toString(), $objForum->Id);
				if (($this->objTopicLink->Forum) && ($this->objTopicLink->Forum->Id == $objForum->Id))
					$objListItem->Selected = true;
				$this->lstForum->AddItem($objListItem);
			}
			return $this->lstForum;
		}

		/**
		 * Create and setup QLabel lblForumId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblForumId_Create($strControlId = null) {
			$this->lblForumId = new QLabel($this->objParentObject, $strControlId);
			$this->lblForumId->Name = QApplication::Translate('Forum');
			$this->lblForumId->Text = ($this->objTopicLink->Forum) ? $this->objTopicLink->Forum->__toString() : null;
			return $this->lblForumId;
		}

		/**
		 * Create and setup QListBox lstIssue
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssue_Create($strControlId = null) {
			$this->lstIssue = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssue->Name = QApplication::Translate('Issue');
			$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
			$objIssueArray = Issue::LoadAll();
			if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
				$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
				if (($this->objTopicLink->Issue) && ($this->objTopicLink->Issue->Id == $objIssue->Id))
					$objListItem->Selected = true;
				$this->lstIssue->AddItem($objListItem);
			}
			return $this->lstIssue;
		}

		/**
		 * Create and setup QLabel lblIssueId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIssueId_Create($strControlId = null) {
			$this->lblIssueId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIssueId->Name = QApplication::Translate('Issue');
			$this->lblIssueId->Text = ($this->objTopicLink->Issue) ? $this->objTopicLink->Issue->__toString() : null;
			return $this->lblIssueId;
		}

		/**
		 * Create and setup QListBox lstWikiItem
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstWikiItem_Create($strControlId = null) {
			$this->lstWikiItem = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiItem->Name = QApplication::Translate('Wiki Item');
			$this->lstWikiItem->AddItem(QApplication::Translate('- Select One -'), null);
			$objWikiItemArray = WikiItem::LoadAll();
			if ($objWikiItemArray) foreach ($objWikiItemArray as $objWikiItem) {
				$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
				if (($this->objTopicLink->WikiItem) && ($this->objTopicLink->WikiItem->Id == $objWikiItem->Id))
					$objListItem->Selected = true;
				$this->lstWikiItem->AddItem($objListItem);
			}
			return $this->lstWikiItem;
		}

		/**
		 * Create and setup QLabel lblWikiItemId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiItemId_Create($strControlId = null) {
			$this->lblWikiItemId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiItemId->Name = QApplication::Translate('Wiki Item');
			$this->lblWikiItemId->Text = ($this->objTopicLink->WikiItem) ? $this->objTopicLink->WikiItem->__toString() : null;
			return $this->lblWikiItemId;
		}



		/**
		 * Refresh this MetaControl with Data from the local TopicLink object.
		 * @param boolean $blnReload reload TopicLink from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTopicLink->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTopicLink->Id;

			if ($this->lstTopicLinkType) $this->lstTopicLinkType->SelectedValue = $this->objTopicLink->TopicLinkTypeId;
			if ($this->lblTopicLinkTypeId) $this->lblTopicLinkTypeId->Text = ($this->objTopicLink->TopicLinkTypeId) ? TopicLinkType::$NameArray[$this->objTopicLink->TopicLinkTypeId] : null;

			if ($this->txtTopicCount) $this->txtTopicCount->Text = $this->objTopicLink->TopicCount;
			if ($this->lblTopicCount) $this->lblTopicCount->Text = $this->objTopicLink->TopicCount;

			if ($this->txtMessageCount) $this->txtMessageCount->Text = $this->objTopicLink->MessageCount;
			if ($this->lblMessageCount) $this->lblMessageCount->Text = $this->objTopicLink->MessageCount;

			if ($this->calLastPostDate) $this->calLastPostDate->DateTime = $this->objTopicLink->LastPostDate;
			if ($this->lblLastPostDate) $this->lblLastPostDate->Text = sprintf($this->objTopicLink->LastPostDate) ? $this->objTopicLink->__toString($this->strLastPostDateDateTimeFormat) : null;

			if ($this->lstForum) {
					$this->lstForum->RemoveAllItems();
				$this->lstForum->AddItem(QApplication::Translate('- Select One -'), null);
				$objForumArray = Forum::LoadAll();
				if ($objForumArray) foreach ($objForumArray as $objForum) {
					$objListItem = new QListItem($objForum->__toString(), $objForum->Id);
					if (($this->objTopicLink->Forum) && ($this->objTopicLink->Forum->Id == $objForum->Id))
						$objListItem->Selected = true;
					$this->lstForum->AddItem($objListItem);
				}
			}
			if ($this->lblForumId) $this->lblForumId->Text = ($this->objTopicLink->Forum) ? $this->objTopicLink->Forum->__toString() : null;

			if ($this->lstIssue) {
					$this->lstIssue->RemoveAllItems();
				$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueArray = Issue::LoadAll();
				if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
					$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
					if (($this->objTopicLink->Issue) && ($this->objTopicLink->Issue->Id == $objIssue->Id))
						$objListItem->Selected = true;
					$this->lstIssue->AddItem($objListItem);
				}
			}
			if ($this->lblIssueId) $this->lblIssueId->Text = ($this->objTopicLink->Issue) ? $this->objTopicLink->Issue->__toString() : null;

			if ($this->lstWikiItem) {
					$this->lstWikiItem->RemoveAllItems();
				$this->lstWikiItem->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiItemArray = WikiItem::LoadAll();
				if ($objWikiItemArray) foreach ($objWikiItemArray as $objWikiItem) {
					$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
					if (($this->objTopicLink->WikiItem) && ($this->objTopicLink->WikiItem->Id == $objWikiItem->Id))
						$objListItem->Selected = true;
					$this->lstWikiItem->AddItem($objListItem);
				}
			}
			if ($this->lblWikiItemId) $this->lblWikiItemId->Text = ($this->objTopicLink->WikiItem) ? $this->objTopicLink->WikiItem->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TOPICLINK OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's TopicLink instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTopicLink() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstTopicLinkType) $this->objTopicLink->TopicLinkTypeId = $this->lstTopicLinkType->SelectedValue;
				if ($this->txtTopicCount) $this->objTopicLink->TopicCount = $this->txtTopicCount->Text;
				if ($this->txtMessageCount) $this->objTopicLink->MessageCount = $this->txtMessageCount->Text;
				if ($this->calLastPostDate) $this->objTopicLink->LastPostDate = $this->calLastPostDate->DateTime;
				if ($this->lstForum) $this->objTopicLink->ForumId = $this->lstForum->SelectedValue;
				if ($this->lstIssue) $this->objTopicLink->IssueId = $this->lstIssue->SelectedValue;
				if ($this->lstWikiItem) $this->objTopicLink->WikiItemId = $this->lstWikiItem->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the TopicLink object
				$this->objTopicLink->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's TopicLink instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTopicLink() {
			$this->objTopicLink->Delete();
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
				case 'TopicLink': return $this->objTopicLink;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to TopicLink fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TopicLinkTypeIdControl':
					if (!$this->lstTopicLinkType) return $this->lstTopicLinkType_Create();
					return $this->lstTopicLinkType;
				case 'TopicLinkTypeIdLabel':
					if (!$this->lblTopicLinkTypeId) return $this->lblTopicLinkTypeId_Create();
					return $this->lblTopicLinkTypeId;
				case 'TopicCountControl':
					if (!$this->txtTopicCount) return $this->txtTopicCount_Create();
					return $this->txtTopicCount;
				case 'TopicCountLabel':
					if (!$this->lblTopicCount) return $this->lblTopicCount_Create();
					return $this->lblTopicCount;
				case 'MessageCountControl':
					if (!$this->txtMessageCount) return $this->txtMessageCount_Create();
					return $this->txtMessageCount;
				case 'MessageCountLabel':
					if (!$this->lblMessageCount) return $this->lblMessageCount_Create();
					return $this->lblMessageCount;
				case 'LastPostDateControl':
					if (!$this->calLastPostDate) return $this->calLastPostDate_Create();
					return $this->calLastPostDate;
				case 'LastPostDateLabel':
					if (!$this->lblLastPostDate) return $this->lblLastPostDate_Create();
					return $this->lblLastPostDate;
				case 'ForumIdControl':
					if (!$this->lstForum) return $this->lstForum_Create();
					return $this->lstForum;
				case 'ForumIdLabel':
					if (!$this->lblForumId) return $this->lblForumId_Create();
					return $this->lblForumId;
				case 'IssueIdControl':
					if (!$this->lstIssue) return $this->lstIssue_Create();
					return $this->lstIssue;
				case 'IssueIdLabel':
					if (!$this->lblIssueId) return $this->lblIssueId_Create();
					return $this->lblIssueId;
				case 'WikiItemIdControl':
					if (!$this->lstWikiItem) return $this->lstWikiItem_Create();
					return $this->lstWikiItem;
				case 'WikiItemIdLabel':
					if (!$this->lblWikiItemId) return $this->lblWikiItemId_Create();
					return $this->lblWikiItemId;
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
					// Controls that point to TopicLink fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TopicLinkTypeIdControl':
						return ($this->lstTopicLinkType = QType::Cast($mixValue, 'QControl'));
					case 'TopicCountControl':
						return ($this->txtTopicCount = QType::Cast($mixValue, 'QControl'));
					case 'MessageCountControl':
						return ($this->txtMessageCount = QType::Cast($mixValue, 'QControl'));
					case 'LastPostDateControl':
						return ($this->calLastPostDate = QType::Cast($mixValue, 'QControl'));
					case 'ForumIdControl':
						return ($this->lstForum = QType::Cast($mixValue, 'QControl'));
					case 'IssueIdControl':
						return ($this->lstIssue = QType::Cast($mixValue, 'QControl'));
					case 'WikiItemIdControl':
						return ($this->lstWikiItem = QType::Cast($mixValue, 'QControl'));
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