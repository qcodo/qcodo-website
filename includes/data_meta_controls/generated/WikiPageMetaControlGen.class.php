<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WikiPage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WikiPage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WikiPageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read WikiPage $WikiPage the actual WikiPage data class being edited
	 * property QListBox $WikiVersionIdControl
	 * property-read QLabel $WikiVersionIdLabel
	 * property QTextBox $ContentControl
	 * property-read QLabel $ContentLabel
	 * property QTextBox $CompiledHtmlControl
	 * property-read QLabel $CompiledHtmlLabel
	 * property QIntegerTextBox $ViewCountControl
	 * property-read QLabel $ViewCountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WikiPageMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var WikiPage objWikiPage
		 * @access protected
		 */
		protected $objWikiPage;

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

		// Controls that allow the editing of WikiPage's individual data fields
        /**
         * @var QListBox lstWikiVersion;
         * @access protected
         */
		protected $lstWikiVersion;

        /**
         * @var QTextBox txtContent;
         * @access protected
         */
		protected $txtContent;

        /**
         * @var QTextBox txtCompiledHtml;
         * @access protected
         */
		protected $txtCompiledHtml;

        /**
         * @var QIntegerTextBox txtViewCount;
         * @access protected
         */
		protected $txtViewCount;


		// Controls that allow the viewing of WikiPage's individual data fields
        /**
         * @var QLabel lblWikiVersionId
         * @access protected
         */
		protected $lblWikiVersionId;

        /**
         * @var QLabel lblContent
         * @access protected
         */
		protected $lblContent;

        /**
         * @var QLabel lblCompiledHtml
         * @access protected
         */
		protected $lblCompiledHtml;

        /**
         * @var QLabel lblViewCount
         * @access protected
         */
		protected $lblViewCount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WikiPageMetaControl to edit a single WikiPage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WikiPage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiPageMetaControl
		 * @param WikiPage $objWikiPage new or existing WikiPage object
		 */
		 public function __construct($objParentObject, WikiPage $objWikiPage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WikiPageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WikiPage object
			$this->objWikiPage = $objWikiPage;

			// Figure out if we're Editing or Creating New
			if ($this->objWikiPage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiPageMetaControl
		 * @param integer $intWikiVersionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WikiPage object creation - defaults to CreateOrEdit
 		 * @return WikiPageMetaControl
		 */
		public static function Create($objParentObject, $intWikiVersionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWikiVersionId)) {
				$objWikiPage = WikiPage::Load($intWikiVersionId);

				// WikiPage was found -- return it!
				if ($objWikiPage)
					return new WikiPageMetaControl($objParentObject, $objWikiPage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WikiPage object with PK arguments: ' . $intWikiVersionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WikiPageMetaControl($objParentObject, new WikiPage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiPageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiPage object creation - defaults to CreateOrEdit
		 * @return WikiPageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::PathInfo(0);
			return WikiPageMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiPageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiPage object creation - defaults to CreateOrEdit
		 * @return WikiPageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::QueryString('intWikiVersionId');
			return WikiPageMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstWikiVersion
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWikiVersion_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWikiVersion = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiVersion->Name = QApplication::Translate('Wiki Version');
			$this->lstWikiVersion->Required = true;
			if (!$this->blnEditMode)
				$this->lstWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWikiVersionCursor = WikiVersion::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWikiVersion = WikiVersion::InstantiateCursor($objWikiVersionCursor)) {
				$objListItem = new QListItem($objWikiVersion->__toString(), $objWikiVersion->Id);
				if (($this->objWikiPage->WikiVersion) && ($this->objWikiPage->WikiVersion->Id == $objWikiVersion->Id))
					$objListItem->Selected = true;
				$this->lstWikiVersion->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstWikiVersion;
		}

		/**
		 * Create and setup QLabel lblWikiVersionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiVersionId_Create($strControlId = null) {
			$this->lblWikiVersionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiVersionId->Name = QApplication::Translate('Wiki Version');
			$this->lblWikiVersionId->Text = ($this->objWikiPage->WikiVersion) ? $this->objWikiPage->WikiVersion->__toString() : null;
			$this->lblWikiVersionId->Required = true;
			return $this->lblWikiVersionId;
		}

		/**
		 * Create and setup QTextBox txtContent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContent_Create($strControlId = null) {
			$this->txtContent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContent->Name = QApplication::Translate('Content');
			$this->txtContent->Text = $this->objWikiPage->Content;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			return $this->txtContent;
		}

		/**
		 * Create and setup QLabel lblContent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContent_Create($strControlId = null) {
			$this->lblContent = new QLabel($this->objParentObject, $strControlId);
			$this->lblContent->Name = QApplication::Translate('Content');
			$this->lblContent->Text = $this->objWikiPage->Content;
			return $this->lblContent;
		}

		/**
		 * Create and setup QTextBox txtCompiledHtml
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCompiledHtml_Create($strControlId = null) {
			$this->txtCompiledHtml = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCompiledHtml->Name = QApplication::Translate('Compiled Html');
			$this->txtCompiledHtml->Text = $this->objWikiPage->CompiledHtml;
			$this->txtCompiledHtml->TextMode = QTextMode::MultiLine;
			return $this->txtCompiledHtml;
		}

		/**
		 * Create and setup QLabel lblCompiledHtml
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompiledHtml_Create($strControlId = null) {
			$this->lblCompiledHtml = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompiledHtml->Name = QApplication::Translate('Compiled Html');
			$this->lblCompiledHtml->Text = $this->objWikiPage->CompiledHtml;
			return $this->lblCompiledHtml;
		}

		/**
		 * Create and setup QIntegerTextBox txtViewCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtViewCount_Create($strControlId = null) {
			$this->txtViewCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtViewCount->Name = QApplication::Translate('View Count');
			$this->txtViewCount->Text = $this->objWikiPage->ViewCount;
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
			$this->lblViewCount->Text = $this->objWikiPage->ViewCount;
			$this->lblViewCount->Format = $strFormat;
			return $this->lblViewCount;
		}



		/**
		 * Refresh this MetaControl with Data from the local WikiPage object.
		 * @param boolean $blnReload reload WikiPage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWikiPage->Reload();

			if ($this->lstWikiVersion) {
					$this->lstWikiVersion->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiVersionArray = WikiVersion::LoadAll();
				if ($objWikiVersionArray) foreach ($objWikiVersionArray as $objWikiVersion) {
					$objListItem = new QListItem($objWikiVersion->__toString(), $objWikiVersion->Id);
					if (($this->objWikiPage->WikiVersion) && ($this->objWikiPage->WikiVersion->Id == $objWikiVersion->Id))
						$objListItem->Selected = true;
					$this->lstWikiVersion->AddItem($objListItem);
				}
			}
			if ($this->lblWikiVersionId) $this->lblWikiVersionId->Text = ($this->objWikiPage->WikiVersion) ? $this->objWikiPage->WikiVersion->__toString() : null;

			if ($this->txtContent) $this->txtContent->Text = $this->objWikiPage->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objWikiPage->Content;

			if ($this->txtCompiledHtml) $this->txtCompiledHtml->Text = $this->objWikiPage->CompiledHtml;
			if ($this->lblCompiledHtml) $this->lblCompiledHtml->Text = $this->objWikiPage->CompiledHtml;

			if ($this->txtViewCount) $this->txtViewCount->Text = $this->objWikiPage->ViewCount;
			if ($this->lblViewCount) $this->lblViewCount->Text = $this->objWikiPage->ViewCount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WIKIPAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WikiPage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWikiPage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstWikiVersion) $this->objWikiPage->WikiVersionId = $this->lstWikiVersion->SelectedValue;
				if ($this->txtContent) $this->objWikiPage->Content = $this->txtContent->Text;
				if ($this->txtCompiledHtml) $this->objWikiPage->CompiledHtml = $this->txtCompiledHtml->Text;
				if ($this->txtViewCount) $this->objWikiPage->ViewCount = $this->txtViewCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the WikiPage object
				$this->objWikiPage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WikiPage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWikiPage() {
			$this->objWikiPage->Delete();
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
				case 'WikiPage': return $this->objWikiPage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WikiPage fields -- will be created dynamically if not yet created
				case 'WikiVersionIdControl':
					if (!$this->lstWikiVersion) return $this->lstWikiVersion_Create();
					return $this->lstWikiVersion;
				case 'WikiVersionIdLabel':
					if (!$this->lblWikiVersionId) return $this->lblWikiVersionId_Create();
					return $this->lblWikiVersionId;
				case 'ContentControl':
					if (!$this->txtContent) return $this->txtContent_Create();
					return $this->txtContent;
				case 'ContentLabel':
					if (!$this->lblContent) return $this->lblContent_Create();
					return $this->lblContent;
				case 'CompiledHtmlControl':
					if (!$this->txtCompiledHtml) return $this->txtCompiledHtml_Create();
					return $this->txtCompiledHtml;
				case 'CompiledHtmlLabel':
					if (!$this->lblCompiledHtml) return $this->lblCompiledHtml_Create();
					return $this->lblCompiledHtml;
				case 'ViewCountControl':
					if (!$this->txtViewCount) return $this->txtViewCount_Create();
					return $this->txtViewCount;
				case 'ViewCountLabel':
					if (!$this->lblViewCount) return $this->lblViewCount_Create();
					return $this->lblViewCount;
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
					// Controls that point to WikiPage fields
					case 'WikiVersionIdControl':
						return ($this->lstWikiVersion = QType::Cast($mixValue, 'QControl'));
					case 'ContentControl':
						return ($this->txtContent = QType::Cast($mixValue, 'QControl'));
					case 'CompiledHtmlControl':
						return ($this->txtCompiledHtml = QType::Cast($mixValue, 'QControl'));
					case 'ViewCountControl':
						return ($this->txtViewCount = QType::Cast($mixValue, 'QControl'));
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