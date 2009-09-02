<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Topic class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Topic object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TopicMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Topic $Topic the actual Topic data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $TopicLinkIdControl
	 * property-read QLabel $TopicLinkIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $LastPostDateControl
	 * property-read QLabel $LastPostDateLabel
	 * property QIntegerTextBox $MessageCountControl
	 * property-read QLabel $MessageCountLabel
	 * property QIntegerTextBox $ViewCountControl
	 * property-read QLabel $ViewCountLabel
	 * property QListBox $PersonAsEmailControl
	 * property-read QLabel $PersonAsEmailLabel
	 * property QListBox $PersonAsReadOnceControl
	 * property-read QLabel $PersonAsReadOnceLabel
	 * property QListBox $PersonAsReadControl
	 * property-read QLabel $PersonAsReadLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TopicMetaControlGen extends QBaseClass {
		// General Variables
		protected $objTopic;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Topic's individual data fields
		protected $lblId;
		protected $lstTopicLink;
		protected $txtName;
		protected $lstPerson;
		protected $calLastPostDate;
		protected $txtMessageCount;
		protected $txtViewCount;

		// Controls that allow the viewing of Topic's individual data fields
		protected $lblTopicLinkId;
		protected $lblName;
		protected $lblPersonId;
		protected $lblLastPostDate;
		protected $lblMessageCount;
		protected $lblViewCount;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstPeopleAsEmail;
		protected $lstPeopleAsReadOnce;
		protected $lstPeopleAsRead;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblPeopleAsEmail;
		protected $lblPeopleAsReadOnce;
		protected $lblPeopleAsRead;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TopicMetaControl to edit a single Topic object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Topic object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicMetaControl
		 * @param Topic $objTopic new or existing Topic object
		 */
		 public function __construct($objParentObject, Topic $objTopic) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TopicMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Topic object
			$this->objTopic = $objTopic;

			// Figure out if we're Editing or Creating New
			if ($this->objTopic->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Topic object creation - defaults to CreateOrEdit
 		 * @return TopicMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTopic = Topic::Load($intId);

				// Topic was found -- return it!
				if ($objTopic)
					return new TopicMetaControl($objParentObject, $objTopic);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Topic object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TopicMetaControl($objParentObject, new Topic());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Topic object creation - defaults to CreateOrEdit
		 * @return TopicMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TopicMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TopicMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Topic object creation - defaults to CreateOrEdit
		 * @return TopicMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TopicMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTopic->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstTopicLink
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstTopicLink_Create($strControlId = null) {
			$this->lstTopicLink = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicLink->Name = QApplication::Translate('Topic Link');
			$this->lstTopicLink->Required = true;
			if (!$this->blnEditMode)
				$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
			$objTopicLinkArray = TopicLink::LoadAll();
			if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
				$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
				if (($this->objTopic->TopicLink) && ($this->objTopic->TopicLink->Id == $objTopicLink->Id))
					$objListItem->Selected = true;
				$this->lstTopicLink->AddItem($objListItem);
			}
			return $this->lstTopicLink;
		}

		/**
		 * Create and setup QLabel lblTopicLinkId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTopicLinkId_Create($strControlId = null) {
			$this->lblTopicLinkId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTopicLinkId->Name = QApplication::Translate('Topic Link');
			$this->lblTopicLinkId->Text = ($this->objTopic->TopicLink) ? $this->objTopic->TopicLink->__toString() : null;
			$this->lblTopicLinkId->Required = true;
			return $this->lblTopicLinkId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objTopic->Name;
			$this->txtName->MaxLength = Topic::NameMaxLength;
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
			$this->lblName->Text = $this->objTopic->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objTopic->Person) && ($this->objTopic->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objTopic->Person) ? $this->objTopic->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calLastPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calLastPostDate_Create($strControlId = null) {
			$this->calLastPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calLastPostDate->Name = QApplication::Translate('Last Post Date');
			$this->calLastPostDate->DateTime = $this->objTopic->LastPostDate;
			$this->calLastPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calLastPostDate->Required = true;
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
			$this->lblLastPostDate->Text = sprintf($this->objTopic->LastPostDate) ? $this->objTopic->LastPostDate->__toString($this->strLastPostDateDateTimeFormat) : null;
			$this->lblLastPostDate->Required = true;
			return $this->lblLastPostDate;
		}

		protected $strLastPostDateDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtMessageCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMessageCount_Create($strControlId = null) {
			$this->txtMessageCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMessageCount->Name = QApplication::Translate('Message Count');
			$this->txtMessageCount->Text = $this->objTopic->MessageCount;
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
			$this->lblMessageCount->Text = $this->objTopic->MessageCount;
			$this->lblMessageCount->Format = $strFormat;
			return $this->lblMessageCount;
		}

		/**
		 * Create and setup QIntegerTextBox txtViewCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtViewCount_Create($strControlId = null) {
			$this->txtViewCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtViewCount->Name = QApplication::Translate('View Count');
			$this->txtViewCount->Text = $this->objTopic->ViewCount;
			return $this->txtViewCount;
		}

		/**
		 * Create and setup QLabel lblViewCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblViewCount_Create($strControlId = null, $strFormat = null) {
			$this->lblViewCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblViewCount->Name = QApplication::Translate('View Count');
			$this->lblViewCount->Text = $this->objTopic->ViewCount;
			$this->lblViewCount->Format = $strFormat;
			return $this->lblViewCount;
		}

		/**
		 * Create and setup QListBox lstPeopleAsEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPeopleAsEmail_Create($strControlId = null) {
			$this->lstPeopleAsEmail = new QListBox($this->objParentObject, $strControlId);
			$this->lstPeopleAsEmail->Name = QApplication::Translate('People As Email');
			$this->lstPeopleAsEmail->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objTopic->GetPersonAsEmailArray();
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objPerson->Id)
						$objListItem->Selected = true;
				}
				$this->lstPeopleAsEmail->AddItem($objListItem);
			}
			return $this->lstPeopleAsEmail;
		}

		/**
		 * Create and setup QLabel lblPeopleAsEmail
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblPeopleAsEmail_Create($strControlId = null, $strGlue = ', ') {
			$this->lblPeopleAsEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lstPeopleAsEmail->Name = QApplication::Translate('People As Email');
			
			$objAssociatedArray = $this->objTopic->GetPersonAsEmailArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblPeopleAsEmail->Text = implode($strGlue, $strItems);
			return $this->lblPeopleAsEmail;
		}

		/**
		 * Create and setup QListBox lstPeopleAsReadOnce
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPeopleAsReadOnce_Create($strControlId = null) {
			$this->lstPeopleAsReadOnce = new QListBox($this->objParentObject, $strControlId);
			$this->lstPeopleAsReadOnce->Name = QApplication::Translate('People As Read Once');
			$this->lstPeopleAsReadOnce->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objTopic->GetPersonAsReadOnceArray();
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objPerson->Id)
						$objListItem->Selected = true;
				}
				$this->lstPeopleAsReadOnce->AddItem($objListItem);
			}
			return $this->lstPeopleAsReadOnce;
		}

		/**
		 * Create and setup QLabel lblPeopleAsReadOnce
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblPeopleAsReadOnce_Create($strControlId = null, $strGlue = ', ') {
			$this->lblPeopleAsReadOnce = new QLabel($this->objParentObject, $strControlId);
			$this->lstPeopleAsReadOnce->Name = QApplication::Translate('People As Read Once');
			
			$objAssociatedArray = $this->objTopic->GetPersonAsReadOnceArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblPeopleAsReadOnce->Text = implode($strGlue, $strItems);
			return $this->lblPeopleAsReadOnce;
		}

		/**
		 * Create and setup QListBox lstPeopleAsRead
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPeopleAsRead_Create($strControlId = null) {
			$this->lstPeopleAsRead = new QListBox($this->objParentObject, $strControlId);
			$this->lstPeopleAsRead->Name = QApplication::Translate('People As Read');
			$this->lstPeopleAsRead->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objTopic->GetPersonAsReadArray();
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objPerson->Id)
						$objListItem->Selected = true;
				}
				$this->lstPeopleAsRead->AddItem($objListItem);
			}
			return $this->lstPeopleAsRead;
		}

		/**
		 * Create and setup QLabel lblPeopleAsRead
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblPeopleAsRead_Create($strControlId = null, $strGlue = ', ') {
			$this->lblPeopleAsRead = new QLabel($this->objParentObject, $strControlId);
			$this->lstPeopleAsRead->Name = QApplication::Translate('People As Read');
			
			$objAssociatedArray = $this->objTopic->GetPersonAsReadArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblPeopleAsRead->Text = implode($strGlue, $strItems);
			return $this->lblPeopleAsRead;
		}



		/**
		 * Refresh this MetaControl with Data from the local Topic object.
		 * @param boolean $blnReload reload Topic from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTopic->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTopic->Id;

			if ($this->lstTopicLink) {
					$this->lstTopicLink->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
				$objTopicLinkArray = TopicLink::LoadAll();
				if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
					$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
					if (($this->objTopic->TopicLink) && ($this->objTopic->TopicLink->Id == $objTopicLink->Id))
						$objListItem->Selected = true;
					$this->lstTopicLink->AddItem($objListItem);
				}
			}
			if ($this->lblTopicLinkId) $this->lblTopicLinkId->Text = ($this->objTopic->TopicLink) ? $this->objTopic->TopicLink->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objTopic->Name;
			if ($this->lblName) $this->lblName->Text = $this->objTopic->Name;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objTopic->Person) && ($this->objTopic->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objTopic->Person) ? $this->objTopic->Person->__toString() : null;

			if ($this->calLastPostDate) $this->calLastPostDate->DateTime = $this->objTopic->LastPostDate;
			if ($this->lblLastPostDate) $this->lblLastPostDate->Text = sprintf($this->objTopic->LastPostDate) ? $this->objTopic->__toString($this->strLastPostDateDateTimeFormat) : null;

			if ($this->txtMessageCount) $this->txtMessageCount->Text = $this->objTopic->MessageCount;
			if ($this->lblMessageCount) $this->lblMessageCount->Text = $this->objTopic->MessageCount;

			if ($this->txtViewCount) $this->txtViewCount->Text = $this->objTopic->ViewCount;
			if ($this->lblViewCount) $this->lblViewCount->Text = $this->objTopic->ViewCount;

			if ($this->lstPeopleAsEmail) {
				$this->lstPeopleAsEmail->RemoveAllItems();
				$objAssociatedArray = $this->objTopic->GetPersonAsEmailArray();
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objPerson->Id)
							$objListItem->Selected = true;
					}
					$this->lstPeopleAsEmail->AddItem($objListItem);
				}
			}
			if ($this->lblPeopleAsEmail) {
				$objAssociatedArray = $this->objTopic->GetPersonAsEmailArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblPeopleAsEmail->Text = implode($strGlue, $strItems);
			}

			if ($this->lstPeopleAsReadOnce) {
				$this->lstPeopleAsReadOnce->RemoveAllItems();
				$objAssociatedArray = $this->objTopic->GetPersonAsReadOnceArray();
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objPerson->Id)
							$objListItem->Selected = true;
					}
					$this->lstPeopleAsReadOnce->AddItem($objListItem);
				}
			}
			if ($this->lblPeopleAsReadOnce) {
				$objAssociatedArray = $this->objTopic->GetPersonAsReadOnceArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblPeopleAsReadOnce->Text = implode($strGlue, $strItems);
			}

			if ($this->lstPeopleAsRead) {
				$this->lstPeopleAsRead->RemoveAllItems();
				$objAssociatedArray = $this->objTopic->GetPersonAsReadArray();
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objPerson->Id)
							$objListItem->Selected = true;
					}
					$this->lstPeopleAsRead->AddItem($objListItem);
				}
			}
			if ($this->lblPeopleAsRead) {
				$objAssociatedArray = $this->objTopic->GetPersonAsReadArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblPeopleAsRead->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstPeopleAsEmail_Update() {
			if ($this->lstPeopleAsEmail) {
				$this->objTopic->UnassociateAllPeopleAsEmail();
				$objSelectedListItems = $this->lstPeopleAsEmail->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objTopic->AssociatePersonAsEmail(Person::Load($objListItem->Value));
				}
			}
		}

		protected function lstPeopleAsReadOnce_Update() {
			if ($this->lstPeopleAsReadOnce) {
				$this->objTopic->UnassociateAllPeopleAsReadOnce();
				$objSelectedListItems = $this->lstPeopleAsReadOnce->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objTopic->AssociatePersonAsReadOnce(Person::Load($objListItem->Value));
				}
			}
		}

		protected function lstPeopleAsRead_Update() {
			if ($this->lstPeopleAsRead) {
				$this->objTopic->UnassociateAllPeopleAsRead();
				$objSelectedListItems = $this->lstPeopleAsRead->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objTopic->AssociatePersonAsRead(Person::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC TOPIC OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Topic instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTopic() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstTopicLink) $this->objTopic->TopicLinkId = $this->lstTopicLink->SelectedValue;
				if ($this->txtName) $this->objTopic->Name = $this->txtName->Text;
				if ($this->lstPerson) $this->objTopic->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calLastPostDate) $this->objTopic->LastPostDate = $this->calLastPostDate->DateTime;
				if ($this->txtMessageCount) $this->objTopic->MessageCount = $this->txtMessageCount->Text;
				if ($this->txtViewCount) $this->objTopic->ViewCount = $this->txtViewCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Topic object
				$this->objTopic->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstPeopleAsEmail_Update();
				$this->lstPeopleAsReadOnce_Update();
				$this->lstPeopleAsRead_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Topic instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTopic() {
			$this->objTopic->UnassociateAllPeopleAsEmail();
			$this->objTopic->UnassociateAllPeopleAsReadOnce();
			$this->objTopic->UnassociateAllPeopleAsRead();
			$this->objTopic->Delete();
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
				case 'Topic': return $this->objTopic;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Topic fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TopicLinkIdControl':
					if (!$this->lstTopicLink) return $this->lstTopicLink_Create();
					return $this->lstTopicLink;
				case 'TopicLinkIdLabel':
					if (!$this->lblTopicLinkId) return $this->lblTopicLinkId_Create();
					return $this->lblTopicLinkId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'LastPostDateControl':
					if (!$this->calLastPostDate) return $this->calLastPostDate_Create();
					return $this->calLastPostDate;
				case 'LastPostDateLabel':
					if (!$this->lblLastPostDate) return $this->lblLastPostDate_Create();
					return $this->lblLastPostDate;
				case 'MessageCountControl':
					if (!$this->txtMessageCount) return $this->txtMessageCount_Create();
					return $this->txtMessageCount;
				case 'MessageCountLabel':
					if (!$this->lblMessageCount) return $this->lblMessageCount_Create();
					return $this->lblMessageCount;
				case 'ViewCountControl':
					if (!$this->txtViewCount) return $this->txtViewCount_Create();
					return $this->txtViewCount;
				case 'ViewCountLabel':
					if (!$this->lblViewCount) return $this->lblViewCount_Create();
					return $this->lblViewCount;
				case 'PersonAsEmailControl':
					if (!$this->lstPeopleAsEmail) return $this->lstPeopleAsEmail_Create();
					return $this->lstPeopleAsEmail;
				case 'PersonAsEmailLabel':
					if (!$this->lblPeopleAsEmail) return $this->lblPeopleAsEmail_Create();
					return $this->lblPeopleAsEmail;
				case 'PersonAsReadOnceControl':
					if (!$this->lstPeopleAsReadOnce) return $this->lstPeopleAsReadOnce_Create();
					return $this->lstPeopleAsReadOnce;
				case 'PersonAsReadOnceLabel':
					if (!$this->lblPeopleAsReadOnce) return $this->lblPeopleAsReadOnce_Create();
					return $this->lblPeopleAsReadOnce;
				case 'PersonAsReadControl':
					if (!$this->lstPeopleAsRead) return $this->lstPeopleAsRead_Create();
					return $this->lstPeopleAsRead;
				case 'PersonAsReadLabel':
					if (!$this->lblPeopleAsRead) return $this->lblPeopleAsRead_Create();
					return $this->lblPeopleAsRead;
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
					// Controls that point to Topic fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TopicLinkIdControl':
						return ($this->lstTopicLink = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'LastPostDateControl':
						return ($this->calLastPostDate = QType::Cast($mixValue, 'QControl'));
					case 'MessageCountControl':
						return ($this->txtMessageCount = QType::Cast($mixValue, 'QControl'));
					case 'ViewCountControl':
						return ($this->txtViewCount = QType::Cast($mixValue, 'QControl'));
					case 'PersonAsEmailControl':
						return ($this->lstPeopleAsEmail = QType::Cast($mixValue, 'QControl'));
					case 'PersonAsReadOnceControl':
						return ($this->lstPeopleAsReadOnce = QType::Cast($mixValue, 'QControl'));
					case 'PersonAsReadControl':
						return ($this->lstPeopleAsRead = QType::Cast($mixValue, 'QControl'));
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