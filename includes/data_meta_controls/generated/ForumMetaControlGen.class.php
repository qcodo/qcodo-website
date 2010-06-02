<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Forum class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Forum object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ForumMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Forum $Forum the actual Forum data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QCheckBox $AnnounceOnlyFlagControl
	 * property-read QLabel $AnnounceOnlyFlagLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QListBox $TopicLinkControl
	 * property-read QLabel $TopicLinkLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ForumMetaControlGen extends QBaseClass {
		// General Variables
		protected $objForum;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Forum's individual data fields
		protected $lblId;
		protected $txtOrderNumber;
		protected $txtName;
		protected $chkAnnounceOnlyFlag;
		protected $txtDescription;

		// Controls that allow the viewing of Forum's individual data fields
		protected $lblOrderNumber;
		protected $lblName;
		protected $lblAnnounceOnlyFlag;
		protected $lblDescription;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstTopicLink;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblTopicLink;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ForumMetaControl to edit a single Forum object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Forum object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ForumMetaControl
		 * @param Forum $objForum new or existing Forum object
		 */
		 public function __construct($objParentObject, Forum $objForum) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ForumMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Forum object
			$this->objForum = $objForum;

			// Figure out if we're Editing or Creating New
			if ($this->objForum->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ForumMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Forum object creation - defaults to CreateOrEdit
 		 * @return ForumMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objForum = Forum::Load($intId);

				// Forum was found -- return it!
				if ($objForum)
					return new ForumMetaControl($objParentObject, $objForum);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Forum object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ForumMetaControl($objParentObject, new Forum());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ForumMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Forum object creation - defaults to CreateOrEdit
		 * @return ForumMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ForumMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ForumMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Forum object creation - defaults to CreateOrEdit
		 * @return ForumMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ForumMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objForum->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrderNumber_Create($strControlId = null) {
			$this->txtOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrderNumber->Name = QApplication::Translate('Order Number');
			$this->txtOrderNumber->Text = $this->objForum->OrderNumber;
			return $this->txtOrderNumber;
		}

		/**
		 * Create and setup QLabel lblOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblOrderNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblOrderNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrderNumber->Name = QApplication::Translate('Order Number');
			$this->lblOrderNumber->Text = $this->objForum->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objForum->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Forum::NameMaxLength;
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
			$this->lblName->Text = $this->objForum->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QCheckBox chkAnnounceOnlyFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAnnounceOnlyFlag_Create($strControlId = null) {
			$this->chkAnnounceOnlyFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAnnounceOnlyFlag->Name = QApplication::Translate('Announce Only Flag');
			$this->chkAnnounceOnlyFlag->Checked = $this->objForum->AnnounceOnlyFlag;
			return $this->chkAnnounceOnlyFlag;
		}

		/**
		 * Create and setup QLabel lblAnnounceOnlyFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAnnounceOnlyFlag_Create($strControlId = null) {
			$this->lblAnnounceOnlyFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAnnounceOnlyFlag->Name = QApplication::Translate('Announce Only Flag');
			$this->lblAnnounceOnlyFlag->Text = ($this->objForum->AnnounceOnlyFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAnnounceOnlyFlag;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objForum->Description;
			$this->txtDescription->MaxLength = Forum::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objForum->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QListBox lstTopicLink
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTopicLink_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTopicLink = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicLink->Name = QApplication::Translate('Topic Link');
			$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTopicLinkCursor = TopicLink::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTopicLink = TopicLink::InstantiateCursor($objTopicLinkCursor)) {
				$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
				if ($objTopicLink->ForumId == $this->objForum->Id)
					$objListItem->Selected = true;
				$this->lstTopicLink->AddItem($objListItem);
			}

			// Return the QListBox
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
			$this->lblTopicLink->Text = ($this->objForum->TopicLink) ? $this->objForum->TopicLink->__toString() : null;
			return $this->lblTopicLink;
		}



		/**
		 * Refresh this MetaControl with Data from the local Forum object.
		 * @param boolean $blnReload reload Forum from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objForum->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objForum->Id;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objForum->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objForum->OrderNumber;

			if ($this->txtName) $this->txtName->Text = $this->objForum->Name;
			if ($this->lblName) $this->lblName->Text = $this->objForum->Name;

			if ($this->chkAnnounceOnlyFlag) $this->chkAnnounceOnlyFlag->Checked = $this->objForum->AnnounceOnlyFlag;
			if ($this->lblAnnounceOnlyFlag) $this->lblAnnounceOnlyFlag->Text = ($this->objForum->AnnounceOnlyFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtDescription) $this->txtDescription->Text = $this->objForum->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objForum->Description;

			if ($this->lstTopicLink) {
				$this->lstTopicLink->RemoveAllItems();
				$this->lstTopicLink->AddItem(QApplication::Translate('- Select One -'), null);
				$objTopicLinkArray = TopicLink::LoadAll();
				if ($objTopicLinkArray) foreach ($objTopicLinkArray as $objTopicLink) {
					$objListItem = new QListItem($objTopicLink->__toString(), $objTopicLink->Id);
					if ($objTopicLink->ForumId == $this->objForum->Id)
						$objListItem->Selected = true;
					$this->lstTopicLink->AddItem($objListItem);
				}
			}
			if ($this->lblTopicLink) $this->lblTopicLink->Text = ($this->objForum->TopicLink) ? $this->objForum->TopicLink->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC FORUM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Forum instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveForum() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtOrderNumber) $this->objForum->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->txtName) $this->objForum->Name = $this->txtName->Text;
				if ($this->chkAnnounceOnlyFlag) $this->objForum->AnnounceOnlyFlag = $this->chkAnnounceOnlyFlag->Checked;
				if ($this->txtDescription) $this->objForum->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstTopicLink) $this->objForum->TopicLink = TopicLink::Load($this->lstTopicLink->SelectedValue);

				// Save the Forum object
				$this->objForum->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Forum instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteForum() {
			$this->objForum->Delete();
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
				case 'Forum': return $this->objForum;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Forum fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'OrderNumberControl':
					if (!$this->txtOrderNumber) return $this->txtOrderNumber_Create();
					return $this->txtOrderNumber;
				case 'OrderNumberLabel':
					if (!$this->lblOrderNumber) return $this->lblOrderNumber_Create();
					return $this->lblOrderNumber;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'AnnounceOnlyFlagControl':
					if (!$this->chkAnnounceOnlyFlag) return $this->chkAnnounceOnlyFlag_Create();
					return $this->chkAnnounceOnlyFlag;
				case 'AnnounceOnlyFlagLabel':
					if (!$this->lblAnnounceOnlyFlag) return $this->lblAnnounceOnlyFlag_Create();
					return $this->lblAnnounceOnlyFlag;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to Forum fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'AnnounceOnlyFlagControl':
						return ($this->chkAnnounceOnlyFlag = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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