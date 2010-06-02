<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WikiVersion class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WikiVersion object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WikiVersionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read WikiVersion $WikiVersion the actual WikiVersion data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $WikiItemIdControl
	 * property-read QLabel $WikiItemIdLabel
	 * property QIntegerTextBox $VersionNumberControl
	 * property-read QLabel $VersionNumberLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $PostedByPersonIdControl
	 * property-read QLabel $PostedByPersonIdLabel
	 * property QDateTimePicker $PostDateControl
	 * property-read QLabel $PostDateLabel
	 * property QListBox $WikiFileControl
	 * property-read QLabel $WikiFileLabel
	 * property QListBox $WikiImageControl
	 * property-read QLabel $WikiImageLabel
	 * property QListBox $WikiItemAsCurrentControl
	 * property-read QLabel $WikiItemAsCurrentLabel
	 * property QListBox $WikiPageControl
	 * property-read QLabel $WikiPageLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WikiVersionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWikiVersion;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of WikiVersion's individual data fields
		protected $lblId;
		protected $lstWikiItem;
		protected $txtVersionNumber;
		protected $txtName;
		protected $lstPostedByPerson;
		protected $calPostDate;

		// Controls that allow the viewing of WikiVersion's individual data fields
		protected $lblWikiItemId;
		protected $lblVersionNumber;
		protected $lblName;
		protected $lblPostedByPersonId;
		protected $lblPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstWikiFile;
		protected $lstWikiImage;
		protected $lstWikiItemAsCurrent;
		protected $lstWikiPage;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblWikiFile;
		protected $lblWikiImage;
		protected $lblWikiItemAsCurrent;
		protected $lblWikiPage;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WikiVersionMetaControl to edit a single WikiVersion object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WikiVersion object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiVersionMetaControl
		 * @param WikiVersion $objWikiVersion new or existing WikiVersion object
		 */
		 public function __construct($objParentObject, WikiVersion $objWikiVersion) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WikiVersionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WikiVersion object
			$this->objWikiVersion = $objWikiVersion;

			// Figure out if we're Editing or Creating New
			if ($this->objWikiVersion->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiVersionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WikiVersion object creation - defaults to CreateOrEdit
 		 * @return WikiVersionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objWikiVersion = WikiVersion::Load($intId);

				// WikiVersion was found -- return it!
				if ($objWikiVersion)
					return new WikiVersionMetaControl($objParentObject, $objWikiVersion);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WikiVersion object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WikiVersionMetaControl($objParentObject, new WikiVersion());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiVersion object creation - defaults to CreateOrEdit
		 * @return WikiVersionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return WikiVersionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiVersionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiVersion object creation - defaults to CreateOrEdit
		 * @return WikiVersionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return WikiVersionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objWikiVersion->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstWikiItem
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiItem_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiItem = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiItem->Name = QApplication::Translate('Wiki Item');
			$this->lstWikiItem->Required = true;
			if (!$this->blnEditMode)
				$this->lstWikiItem->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiItemCursor = WikiItem::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiItem = WikiItem::InstantiateCursor($objWikiItemCursor)) {
				$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
				if (($this->objWikiVersion->WikiItem) && ($this->objWikiVersion->WikiItem->Id == $objWikiItem->Id))
					$objListItem->Selected = true;
				$this->lstWikiItem->AddItem($objListItem);
			}

			// Return the QListBox
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
			$this->lblWikiItemId->Text = ($this->objWikiVersion->WikiItem) ? $this->objWikiVersion->WikiItem->__toString() : null;
			$this->lblWikiItemId->Required = true;
			return $this->lblWikiItemId;
		}

		/**
		 * Create and setup QIntegerTextBox txtVersionNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtVersionNumber_Create($strControlId = null) {
			$this->txtVersionNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtVersionNumber->Name = QApplication::Translate('Version Number');
			$this->txtVersionNumber->Text = $this->objWikiVersion->VersionNumber;
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
			$this->lblVersionNumber->Text = $this->objWikiVersion->VersionNumber;
			$this->lblVersionNumber->Required = true;
			$this->lblVersionNumber->Format = $strFormat;
			return $this->lblVersionNumber;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objWikiVersion->Name;
			$this->txtName->MaxLength = WikiVersion::NameMaxLength;
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
			$this->lblName->Text = $this->objWikiVersion->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstPostedByPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPostedByPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPostedByPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPostedByPerson->Name = QApplication::Translate('Posted By Person');
			$this->lstPostedByPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPostedByPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPostedByPerson = Person::InstantiateCursor($objPostedByPersonCursor)) {
				$objListItem = new QListItem($objPostedByPerson->__toString(), $objPostedByPerson->Id);
				if (($this->objWikiVersion->PostedByPerson) && ($this->objWikiVersion->PostedByPerson->Id == $objPostedByPerson->Id))
					$objListItem->Selected = true;
				$this->lstPostedByPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPostedByPerson;
		}

		/**
		 * Create and setup QLabel lblPostedByPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPostedByPersonId_Create($strControlId = null) {
			$this->lblPostedByPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPostedByPersonId->Name = QApplication::Translate('Posted By Person');
			$this->lblPostedByPersonId->Text = ($this->objWikiVersion->PostedByPerson) ? $this->objWikiVersion->PostedByPerson->__toString() : null;
			$this->lblPostedByPersonId->Required = true;
			return $this->lblPostedByPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objWikiVersion->PostDate;
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
			$this->lblPostDate->Text = sprintf($this->objWikiVersion->PostDate) ? $this->objWikiVersion->PostDate->__toString($this->strPostDateDateTimeFormat) : null;
			$this->lblPostDate->Required = true;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstWikiFile
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiFile_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiFile = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiFile->Name = QApplication::Translate('Wiki File');
			$this->lstWikiFile->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiFileCursor = WikiFile::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiFile = WikiFile::InstantiateCursor($objWikiFileCursor)) {
				$objListItem = new QListItem($objWikiFile->__toString(), $objWikiFile->WikiVersionId);
				if ($objWikiFile->WikiVersionId == $this->objWikiVersion->Id)
					$objListItem->Selected = true;
				$this->lstWikiFile->AddItem($objListItem);
			}

			// Because WikiFile's WikiFile is not null, if a value is already selected, it cannot be changed.
			if ($this->lstWikiFile->SelectedValue)
				$this->lstWikiFile->Enabled = false;

			// Return the QListBox
			return $this->lstWikiFile;
		}

		/**
		 * Create and setup QLabel lblWikiFile
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiFile_Create($strControlId = null) {
			$this->lblWikiFile = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiFile->Name = QApplication::Translate('Wiki File');
			$this->lblWikiFile->Text = ($this->objWikiVersion->WikiFile) ? $this->objWikiVersion->WikiFile->__toString() : null;
			return $this->lblWikiFile;
		}

		/**
		 * Create and setup QListBox lstWikiImage
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiImage_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiImage = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiImage->Name = QApplication::Translate('Wiki Image');
			$this->lstWikiImage->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiImageCursor = WikiImage::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiImage = WikiImage::InstantiateCursor($objWikiImageCursor)) {
				$objListItem = new QListItem($objWikiImage->__toString(), $objWikiImage->WikiVersionId);
				if ($objWikiImage->WikiVersionId == $this->objWikiVersion->Id)
					$objListItem->Selected = true;
				$this->lstWikiImage->AddItem($objListItem);
			}

			// Because WikiImage's WikiImage is not null, if a value is already selected, it cannot be changed.
			if ($this->lstWikiImage->SelectedValue)
				$this->lstWikiImage->Enabled = false;

			// Return the QListBox
			return $this->lstWikiImage;
		}

		/**
		 * Create and setup QLabel lblWikiImage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiImage_Create($strControlId = null) {
			$this->lblWikiImage = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiImage->Name = QApplication::Translate('Wiki Image');
			$this->lblWikiImage->Text = ($this->objWikiVersion->WikiImage) ? $this->objWikiVersion->WikiImage->__toString() : null;
			return $this->lblWikiImage;
		}

		/**
		 * Create and setup QListBox lstWikiItemAsCurrent
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiItemAsCurrent_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiItemAsCurrent = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiItemAsCurrent->Name = QApplication::Translate('Wiki Item As Current');
			$this->lstWikiItemAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiItemCursor = WikiItem::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiItem = WikiItem::InstantiateCursor($objWikiItemCursor)) {
				$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
				if ($objWikiItem->CurrentWikiVersionId == $this->objWikiVersion->Id)
					$objListItem->Selected = true;
				$this->lstWikiItemAsCurrent->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstWikiItemAsCurrent;
		}

		/**
		 * Create and setup QLabel lblWikiItemAsCurrent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiItemAsCurrent_Create($strControlId = null) {
			$this->lblWikiItemAsCurrent = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiItemAsCurrent->Name = QApplication::Translate('Wiki Item As Current');
			$this->lblWikiItemAsCurrent->Text = ($this->objWikiVersion->WikiItemAsCurrent) ? $this->objWikiVersion->WikiItemAsCurrent->__toString() : null;
			return $this->lblWikiItemAsCurrent;
		}

		/**
		 * Create and setup QListBox lstWikiPage
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiPage_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiPage = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiPage->Name = QApplication::Translate('Wiki Page');
			$this->lstWikiPage->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiPageCursor = WikiPage::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiPage = WikiPage::InstantiateCursor($objWikiPageCursor)) {
				$objListItem = new QListItem($objWikiPage->__toString(), $objWikiPage->WikiVersionId);
				if ($objWikiPage->WikiVersionId == $this->objWikiVersion->Id)
					$objListItem->Selected = true;
				$this->lstWikiPage->AddItem($objListItem);
			}

			// Because WikiPage's WikiPage is not null, if a value is already selected, it cannot be changed.
			if ($this->lstWikiPage->SelectedValue)
				$this->lstWikiPage->Enabled = false;

			// Return the QListBox
			return $this->lstWikiPage;
		}

		/**
		 * Create and setup QLabel lblWikiPage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiPage_Create($strControlId = null) {
			$this->lblWikiPage = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiPage->Name = QApplication::Translate('Wiki Page');
			$this->lblWikiPage->Text = ($this->objWikiVersion->WikiPage) ? $this->objWikiVersion->WikiPage->__toString() : null;
			return $this->lblWikiPage;
		}



		/**
		 * Refresh this MetaControl with Data from the local WikiVersion object.
		 * @param boolean $blnReload reload WikiVersion from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWikiVersion->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objWikiVersion->Id;

			if ($this->lstWikiItem) {
					$this->lstWikiItem->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWikiItem->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiItemArray = WikiItem::LoadAll();
				if ($objWikiItemArray) foreach ($objWikiItemArray as $objWikiItem) {
					$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
					if (($this->objWikiVersion->WikiItem) && ($this->objWikiVersion->WikiItem->Id == $objWikiItem->Id))
						$objListItem->Selected = true;
					$this->lstWikiItem->AddItem($objListItem);
				}
			}
			if ($this->lblWikiItemId) $this->lblWikiItemId->Text = ($this->objWikiVersion->WikiItem) ? $this->objWikiVersion->WikiItem->__toString() : null;

			if ($this->txtVersionNumber) $this->txtVersionNumber->Text = $this->objWikiVersion->VersionNumber;
			if ($this->lblVersionNumber) $this->lblVersionNumber->Text = $this->objWikiVersion->VersionNumber;

			if ($this->txtName) $this->txtName->Text = $this->objWikiVersion->Name;
			if ($this->lblName) $this->lblName->Text = $this->objWikiVersion->Name;

			if ($this->lstPostedByPerson) {
					$this->lstPostedByPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPostedByPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPostedByPersonArray = Person::LoadAll();
				if ($objPostedByPersonArray) foreach ($objPostedByPersonArray as $objPostedByPerson) {
					$objListItem = new QListItem($objPostedByPerson->__toString(), $objPostedByPerson->Id);
					if (($this->objWikiVersion->PostedByPerson) && ($this->objWikiVersion->PostedByPerson->Id == $objPostedByPerson->Id))
						$objListItem->Selected = true;
					$this->lstPostedByPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPostedByPersonId) $this->lblPostedByPersonId->Text = ($this->objWikiVersion->PostedByPerson) ? $this->objWikiVersion->PostedByPerson->__toString() : null;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objWikiVersion->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objWikiVersion->PostDate) ? $this->objWikiVersion->__toString($this->strPostDateDateTimeFormat) : null;

			if ($this->lstWikiFile) {
				$this->lstWikiFile->RemoveAllItems();
				$this->lstWikiFile->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiFileArray = WikiFile::LoadAll();
				if ($objWikiFileArray) foreach ($objWikiFileArray as $objWikiFile) {
					$objListItem = new QListItem($objWikiFile->__toString(), $objWikiFile->WikiVersionId);
					if ($objWikiFile->WikiVersionId == $this->objWikiVersion->Id)
						$objListItem->Selected = true;
					$this->lstWikiFile->AddItem($objListItem);
				}
				// Because WikiFile's WikiFile is not null, if a value is already selected, it cannot be changed.
				if ($this->lstWikiFile->SelectedValue)
					$this->lstWikiFile->Enabled = false;
				else
					$this->lstWikiFile->Enabled = true;
			}
			if ($this->lblWikiFile) $this->lblWikiFile->Text = ($this->objWikiVersion->WikiFile) ? $this->objWikiVersion->WikiFile->__toString() : null;

			if ($this->lstWikiImage) {
				$this->lstWikiImage->RemoveAllItems();
				$this->lstWikiImage->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiImageArray = WikiImage::LoadAll();
				if ($objWikiImageArray) foreach ($objWikiImageArray as $objWikiImage) {
					$objListItem = new QListItem($objWikiImage->__toString(), $objWikiImage->WikiVersionId);
					if ($objWikiImage->WikiVersionId == $this->objWikiVersion->Id)
						$objListItem->Selected = true;
					$this->lstWikiImage->AddItem($objListItem);
				}
				// Because WikiImage's WikiImage is not null, if a value is already selected, it cannot be changed.
				if ($this->lstWikiImage->SelectedValue)
					$this->lstWikiImage->Enabled = false;
				else
					$this->lstWikiImage->Enabled = true;
			}
			if ($this->lblWikiImage) $this->lblWikiImage->Text = ($this->objWikiVersion->WikiImage) ? $this->objWikiVersion->WikiImage->__toString() : null;

			if ($this->lstWikiItemAsCurrent) {
				$this->lstWikiItemAsCurrent->RemoveAllItems();
				$this->lstWikiItemAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiItemArray = WikiItem::LoadAll();
				if ($objWikiItemArray) foreach ($objWikiItemArray as $objWikiItem) {
					$objListItem = new QListItem($objWikiItem->__toString(), $objWikiItem->Id);
					if ($objWikiItem->CurrentWikiVersionId == $this->objWikiVersion->Id)
						$objListItem->Selected = true;
					$this->lstWikiItemAsCurrent->AddItem($objListItem);
				}
			}
			if ($this->lblWikiItemAsCurrent) $this->lblWikiItemAsCurrent->Text = ($this->objWikiVersion->WikiItemAsCurrent) ? $this->objWikiVersion->WikiItemAsCurrent->__toString() : null;

			if ($this->lstWikiPage) {
				$this->lstWikiPage->RemoveAllItems();
				$this->lstWikiPage->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiPageArray = WikiPage::LoadAll();
				if ($objWikiPageArray) foreach ($objWikiPageArray as $objWikiPage) {
					$objListItem = new QListItem($objWikiPage->__toString(), $objWikiPage->WikiVersionId);
					if ($objWikiPage->WikiVersionId == $this->objWikiVersion->Id)
						$objListItem->Selected = true;
					$this->lstWikiPage->AddItem($objListItem);
				}
				// Because WikiPage's WikiPage is not null, if a value is already selected, it cannot be changed.
				if ($this->lstWikiPage->SelectedValue)
					$this->lstWikiPage->Enabled = false;
				else
					$this->lstWikiPage->Enabled = true;
			}
			if ($this->lblWikiPage) $this->lblWikiPage->Text = ($this->objWikiVersion->WikiPage) ? $this->objWikiVersion->WikiPage->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WIKIVERSION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WikiVersion instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWikiVersion() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstWikiItem) $this->objWikiVersion->WikiItemId = $this->lstWikiItem->SelectedValue;
				if ($this->txtVersionNumber) $this->objWikiVersion->VersionNumber = $this->txtVersionNumber->Text;
				if ($this->txtName) $this->objWikiVersion->Name = $this->txtName->Text;
				if ($this->lstPostedByPerson) $this->objWikiVersion->PostedByPersonId = $this->lstPostedByPerson->SelectedValue;
				if ($this->calPostDate) $this->objWikiVersion->PostDate = $this->calPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstWikiFile) $this->objWikiVersion->WikiFile = WikiFile::Load($this->lstWikiFile->SelectedValue);
				if ($this->lstWikiImage) $this->objWikiVersion->WikiImage = WikiImage::Load($this->lstWikiImage->SelectedValue);
				if ($this->lstWikiItemAsCurrent) $this->objWikiVersion->WikiItemAsCurrent = WikiItem::Load($this->lstWikiItemAsCurrent->SelectedValue);
				if ($this->lstWikiPage) $this->objWikiVersion->WikiPage = WikiPage::Load($this->lstWikiPage->SelectedValue);

				// Save the WikiVersion object
				$this->objWikiVersion->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WikiVersion instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWikiVersion() {
			$this->objWikiVersion->Delete();
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
				case 'WikiVersion': return $this->objWikiVersion;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WikiVersion fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'WikiItemIdControl':
					if (!$this->lstWikiItem) return $this->lstWikiItem_Create();
					return $this->lstWikiItem;
				case 'WikiItemIdLabel':
					if (!$this->lblWikiItemId) return $this->lblWikiItemId_Create();
					return $this->lblWikiItemId;
				case 'VersionNumberControl':
					if (!$this->txtVersionNumber) return $this->txtVersionNumber_Create();
					return $this->txtVersionNumber;
				case 'VersionNumberLabel':
					if (!$this->lblVersionNumber) return $this->lblVersionNumber_Create();
					return $this->lblVersionNumber;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PostedByPersonIdControl':
					if (!$this->lstPostedByPerson) return $this->lstPostedByPerson_Create();
					return $this->lstPostedByPerson;
				case 'PostedByPersonIdLabel':
					if (!$this->lblPostedByPersonId) return $this->lblPostedByPersonId_Create();
					return $this->lblPostedByPersonId;
				case 'PostDateControl':
					if (!$this->calPostDate) return $this->calPostDate_Create();
					return $this->calPostDate;
				case 'PostDateLabel':
					if (!$this->lblPostDate) return $this->lblPostDate_Create();
					return $this->lblPostDate;
				case 'WikiFileControl':
					if (!$this->lstWikiFile) return $this->lstWikiFile_Create();
					return $this->lstWikiFile;
				case 'WikiFileLabel':
					if (!$this->lblWikiFile) return $this->lblWikiFile_Create();
					return $this->lblWikiFile;
				case 'WikiImageControl':
					if (!$this->lstWikiImage) return $this->lstWikiImage_Create();
					return $this->lstWikiImage;
				case 'WikiImageLabel':
					if (!$this->lblWikiImage) return $this->lblWikiImage_Create();
					return $this->lblWikiImage;
				case 'WikiItemAsCurrentControl':
					if (!$this->lstWikiItemAsCurrent) return $this->lstWikiItemAsCurrent_Create();
					return $this->lstWikiItemAsCurrent;
				case 'WikiItemAsCurrentLabel':
					if (!$this->lblWikiItemAsCurrent) return $this->lblWikiItemAsCurrent_Create();
					return $this->lblWikiItemAsCurrent;
				case 'WikiPageControl':
					if (!$this->lstWikiPage) return $this->lstWikiPage_Create();
					return $this->lstWikiPage;
				case 'WikiPageLabel':
					if (!$this->lblWikiPage) return $this->lblWikiPage_Create();
					return $this->lblWikiPage;
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
					// Controls that point to WikiVersion fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'WikiItemIdControl':
						return ($this->lstWikiItem = QType::Cast($mixValue, 'QControl'));
					case 'VersionNumberControl':
						return ($this->txtVersionNumber = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PostedByPersonIdControl':
						return ($this->lstPostedByPerson = QType::Cast($mixValue, 'QControl'));
					case 'PostDateControl':
						return ($this->calPostDate = QType::Cast($mixValue, 'QControl'));
					case 'WikiFileControl':
						return ($this->lstWikiFile = QType::Cast($mixValue, 'QControl'));
					case 'WikiImageControl':
						return ($this->lstWikiImage = QType::Cast($mixValue, 'QControl'));
					case 'WikiItemAsCurrentControl':
						return ($this->lstWikiItemAsCurrent = QType::Cast($mixValue, 'QControl'));
					case 'WikiPageControl':
						return ($this->lstWikiPage = QType::Cast($mixValue, 'QControl'));
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