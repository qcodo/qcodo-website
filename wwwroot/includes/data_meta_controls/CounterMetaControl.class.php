<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Counter class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Counter object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CounterMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */

	class CounterMetaControl extends QBaseClass {
		// General Variables
		protected $objCounter;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Counter's individual data fields
		protected $lblId;
		protected $txtFilename;
		protected $txtToken;
		protected $txtCounter;

		// Controls that allow the viewing of Counter's individual data fields
		protected $lblFilename;
		protected $lblToken;
		protected $lblCounter;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CounterMetaControl to edit a single Counter object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Counter object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CounterMetaControl
		 * @param Counter $objCounter new or existing Counter object
		 */
		 public function __construct($objParentObject, Counter $objCounter) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CounterMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Counter object
			$this->objCounter = $objCounter;

			// Figure out if we're Editing or Creating New
			if ($this->objCounter->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CounterMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Counter object creation - defaults to CreateOrEdit
 		 * @return CounterMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCounter = Counter::Load($intId);

				// Counter was found -- return it!
				if ($objCounter)
					return new CounterMetaControl($objParentObject, $objCounter);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Counter object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CounterMetaControl($objParentObject, new Counter());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CounterMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Counter object creation - defaults to CreateOrEdit
		 * @return CounterMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CounterMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CounterMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Counter object creation - defaults to CreateOrEdit
		 * @return CounterMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CounterMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCounter->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFilename_Create($strControlId = null) {
			$this->txtFilename = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFilename->Name = QApplication::Translate('Filename');
			$this->txtFilename->Text = $this->objCounter->Filename;
			$this->txtFilename->MaxLength = Counter::FilenameMaxLength;
			return $this->txtFilename;
		}

		/**
		 * Create and setup QLabel lblFilename
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFilename_Create($strControlId = null) {
			$this->lblFilename = new QLabel($this->objParentObject, $strControlId);
			$this->lblFilename->Name = QApplication::Translate('Filename');
			$this->lblFilename->Text = $this->objCounter->Filename;
			return $this->lblFilename;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objCounter->Token;
			$this->txtToken->MaxLength = Counter::TokenMaxLength;
			return $this->txtToken;
		}

		/**
		 * Create and setup QLabel lblToken
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToken_Create($strControlId = null) {
			$this->lblToken = new QLabel($this->objParentObject, $strControlId);
			$this->lblToken->Name = QApplication::Translate('Token');
			$this->lblToken->Text = $this->objCounter->Token;
			return $this->lblToken;
		}

		/**
		 * Create and setup QIntegerTextBox txtCounter
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCounter_Create($strControlId = null) {
			$this->txtCounter = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCounter->Name = QApplication::Translate('Counter');
			$this->txtCounter->Text = $this->objCounter->Counter;
			return $this->txtCounter;
		}

		/**
		 * Create and setup QLabel lblCounter
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCounter_Create($strControlId = null, $strFormat = null) {
			$this->lblCounter = new QLabel($this->objParentObject, $strControlId);
			$this->lblCounter->Name = QApplication::Translate('Counter');
			$this->lblCounter->Text = $this->objCounter->Counter;
			$this->lblCounter->Format = $strFormat;
			return $this->lblCounter;
		}



		/**
		 * Refresh this MetaControl with Data from the local Counter object.
		 * @param boolean $blnReload reload Counter from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCounter->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCounter->Id;

			if ($this->txtFilename) $this->txtFilename->Text = $this->objCounter->Filename;
			if ($this->lblFilename) $this->lblFilename->Text = $this->objCounter->Filename;

			if ($this->txtToken) $this->txtToken->Text = $this->objCounter->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objCounter->Token;

			if ($this->txtCounter) $this->txtCounter->Text = $this->objCounter->Counter;
			if ($this->lblCounter) $this->lblCounter->Text = $this->objCounter->Counter;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC COUNTER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Counter instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCounter() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtFilename) $this->objCounter->Filename = $this->txtFilename->Text;
				if ($this->txtToken) $this->objCounter->Token = $this->txtToken->Text;
				if ($this->txtCounter) $this->objCounter->Counter = $this->txtCounter->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Counter object
				$this->objCounter->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Counter instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCounter() {
			$this->objCounter->Delete();
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
				case 'Counter': return $this->objCounter;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Counter fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'FilenameControl':
					if (!$this->txtFilename) return $this->txtFilename_Create();
					return $this->txtFilename;
				case 'FilenameLabel':
					if (!$this->lblFilename) return $this->lblFilename_Create();
					return $this->lblFilename;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'CounterControl':
					if (!$this->txtCounter) return $this->txtCounter_Create();
					return $this->txtCounter;
				case 'CounterLabel':
					if (!$this->lblCounter) return $this->lblCounter_Create();
					return $this->lblCounter;
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
					// Controls that point to Counter fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'FilenameControl':
						return ($this->txtFilename = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'CounterControl':
						return ($this->txtCounter = QType::Cast($mixValue, 'QControl'));
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