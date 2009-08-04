<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IssueMessage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IssueMessage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IssueMessageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read IssueMessage $IssueMessage the actual IssueMessage data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IssueIdControl
	 * property-read QLabel $IssueIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $MessageControl
	 * property-read QLabel $MessageLabel
	 * property QIntegerTextBox $ReplyNumberControl
	 * property-read QLabel $ReplyNumberLabel
	 * property QDateTimePicker $PostDateControl
	 * property-read QLabel $PostDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IssueMessageMetaControlGen extends QBaseClass {
		// General Variables
		protected $objIssueMessage;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of IssueMessage's individual data fields
		protected $lblId;
		protected $lstIssue;
		protected $lstPerson;
		protected $txtMessage;
		protected $txtReplyNumber;
		protected $calPostDate;

		// Controls that allow the viewing of IssueMessage's individual data fields
		protected $lblIssueId;
		protected $lblPersonId;
		protected $lblMessage;
		protected $lblReplyNumber;
		protected $lblPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IssueMessageMetaControl to edit a single IssueMessage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IssueMessage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMessageMetaControl
		 * @param IssueMessage $objIssueMessage new or existing IssueMessage object
		 */
		 public function __construct($objParentObject, IssueMessage $objIssueMessage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IssueMessageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IssueMessage object
			$this->objIssueMessage = $objIssueMessage;

			// Figure out if we're Editing or Creating New
			if ($this->objIssueMessage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMessageMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IssueMessage object creation - defaults to CreateOrEdit
 		 * @return IssueMessageMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIssueMessage = IssueMessage::Load($intId);

				// IssueMessage was found -- return it!
				if ($objIssueMessage)
					return new IssueMessageMetaControl($objParentObject, $objIssueMessage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IssueMessage object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IssueMessageMetaControl($objParentObject, new IssueMessage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueMessage object creation - defaults to CreateOrEdit
		 * @return IssueMessageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IssueMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IssueMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IssueMessage object creation - defaults to CreateOrEdit
		 * @return IssueMessageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IssueMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIssueMessage->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIssue
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstIssue_Create($strControlId = null) {
			$this->lstIssue = new QListBox($this->objParentObject, $strControlId);
			$this->lstIssue->Name = QApplication::Translate('Issue');
			$this->lstIssue->Required = true;
			if (!$this->blnEditMode)
				$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
			$objIssueArray = Issue::LoadAll();
			if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
				$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
				if (($this->objIssueMessage->Issue) && ($this->objIssueMessage->Issue->Id == $objIssue->Id))
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
			$this->lblIssueId->Text = ($this->objIssueMessage->Issue) ? $this->objIssueMessage->Issue->__toString() : null;
			$this->lblIssueId->Required = true;
			return $this->lblIssueId;
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
				if (($this->objIssueMessage->Person) && ($this->objIssueMessage->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objIssueMessage->Person) ? $this->objIssueMessage->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMessage_Create($strControlId = null) {
			$this->txtMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMessage->Name = QApplication::Translate('Message');
			$this->txtMessage->Text = $this->objIssueMessage->Message;
			$this->txtMessage->TextMode = QTextMode::MultiLine;
			return $this->txtMessage;
		}

		/**
		 * Create and setup QLabel lblMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMessage_Create($strControlId = null) {
			$this->lblMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblMessage->Name = QApplication::Translate('Message');
			$this->lblMessage->Text = $this->objIssueMessage->Message;
			return $this->lblMessage;
		}

		/**
		 * Create and setup QIntegerTextBox txtReplyNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtReplyNumber_Create($strControlId = null) {
			$this->txtReplyNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtReplyNumber->Name = QApplication::Translate('Reply Number');
			$this->txtReplyNumber->Text = $this->objIssueMessage->ReplyNumber;
			return $this->txtReplyNumber;
		}

		/**
		 * Create and setup QLabel lblReplyNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblReplyNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblReplyNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblReplyNumber->Name = QApplication::Translate('Reply Number');
			$this->lblReplyNumber->Text = $this->objIssueMessage->ReplyNumber;
			$this->lblReplyNumber->Format = $strFormat;
			return $this->lblReplyNumber;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objIssueMessage->PostDate;
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
			$this->lblPostDate->Text = sprintf($this->objIssueMessage->PostDate) ? $this->objIssueMessage->PostDate->__toString($this->strPostDateDateTimeFormat) : null;
			$this->lblPostDate->Required = true;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local IssueMessage object.
		 * @param boolean $blnReload reload IssueMessage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIssueMessage->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIssueMessage->Id;

			if ($this->lstIssue) {
					$this->lstIssue->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIssue->AddItem(QApplication::Translate('- Select One -'), null);
				$objIssueArray = Issue::LoadAll();
				if ($objIssueArray) foreach ($objIssueArray as $objIssue) {
					$objListItem = new QListItem($objIssue->__toString(), $objIssue->Id);
					if (($this->objIssueMessage->Issue) && ($this->objIssueMessage->Issue->Id == $objIssue->Id))
						$objListItem->Selected = true;
					$this->lstIssue->AddItem($objListItem);
				}
			}
			if ($this->lblIssueId) $this->lblIssueId->Text = ($this->objIssueMessage->Issue) ? $this->objIssueMessage->Issue->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objIssueMessage->Person) && ($this->objIssueMessage->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objIssueMessage->Person) ? $this->objIssueMessage->Person->__toString() : null;

			if ($this->txtMessage) $this->txtMessage->Text = $this->objIssueMessage->Message;
			if ($this->lblMessage) $this->lblMessage->Text = $this->objIssueMessage->Message;

			if ($this->txtReplyNumber) $this->txtReplyNumber->Text = $this->objIssueMessage->ReplyNumber;
			if ($this->lblReplyNumber) $this->lblReplyNumber->Text = $this->objIssueMessage->ReplyNumber;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objIssueMessage->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objIssueMessage->PostDate) ? $this->objIssueMessage->__toString($this->strPostDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ISSUEMESSAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IssueMessage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIssueMessage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIssue) $this->objIssueMessage->IssueId = $this->lstIssue->SelectedValue;
				if ($this->lstPerson) $this->objIssueMessage->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtMessage) $this->objIssueMessage->Message = $this->txtMessage->Text;
				if ($this->txtReplyNumber) $this->objIssueMessage->ReplyNumber = $this->txtReplyNumber->Text;
				if ($this->calPostDate) $this->objIssueMessage->PostDate = $this->calPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IssueMessage object
				$this->objIssueMessage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IssueMessage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIssueMessage() {
			$this->objIssueMessage->Delete();
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
				case 'IssueMessage': return $this->objIssueMessage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IssueMessage fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IssueIdControl':
					if (!$this->lstIssue) return $this->lstIssue_Create();
					return $this->lstIssue;
				case 'IssueIdLabel':
					if (!$this->lblIssueId) return $this->lblIssueId_Create();
					return $this->lblIssueId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'MessageControl':
					if (!$this->txtMessage) return $this->txtMessage_Create();
					return $this->txtMessage;
				case 'MessageLabel':
					if (!$this->lblMessage) return $this->lblMessage_Create();
					return $this->lblMessage;
				case 'ReplyNumberControl':
					if (!$this->txtReplyNumber) return $this->txtReplyNumber_Create();
					return $this->txtReplyNumber;
				case 'ReplyNumberLabel':
					if (!$this->lblReplyNumber) return $this->lblReplyNumber_Create();
					return $this->lblReplyNumber;
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
					// Controls that point to IssueMessage fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IssueIdControl':
						return ($this->lstIssue = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'MessageControl':
						return ($this->txtMessage = QType::Cast($mixValue, 'QControl'));
					case 'ReplyNumberControl':
						return ($this->txtReplyNumber = QType::Cast($mixValue, 'QControl'));
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