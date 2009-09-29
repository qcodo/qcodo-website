<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WikiImage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WikiImage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WikiImageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read WikiImage $WikiImage the actual WikiImage data class being edited
	 * property QListBox $WikiVersionIdControl
	 * property-read QLabel $WikiVersionIdLabel
	 * property QListBox $WikiImageTypeIdControl
	 * property-read QLabel $WikiImageTypeIdLabel
	 * property QIntegerTextBox $WidthControl
	 * property-read QLabel $WidthLabel
	 * property QIntegerTextBox $HeightControl
	 * property-read QLabel $HeightLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WikiImageMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWikiImage;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of WikiImage's individual data fields
		protected $lstWikiVersion;
		protected $lstWikiImageType;
		protected $txtWidth;
		protected $txtHeight;
		protected $txtDescription;

		// Controls that allow the viewing of WikiImage's individual data fields
		protected $lblWikiVersionId;
		protected $lblWikiImageTypeId;
		protected $lblWidth;
		protected $lblHeight;
		protected $lblDescription;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WikiImageMetaControl to edit a single WikiImage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WikiImage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiImageMetaControl
		 * @param WikiImage $objWikiImage new or existing WikiImage object
		 */
		 public function __construct($objParentObject, WikiImage $objWikiImage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WikiImageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WikiImage object
			$this->objWikiImage = $objWikiImage;

			// Figure out if we're Editing or Creating New
			if ($this->objWikiImage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiImageMetaControl
		 * @param integer $intWikiVersionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WikiImage object creation - defaults to CreateOrEdit
 		 * @return WikiImageMetaControl
		 */
		public static function Create($objParentObject, $intWikiVersionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWikiVersionId)) {
				$objWikiImage = WikiImage::Load($intWikiVersionId);

				// WikiImage was found -- return it!
				if ($objWikiImage)
					return new WikiImageMetaControl($objParentObject, $objWikiImage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WikiImage object with PK arguments: ' . $intWikiVersionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WikiImageMetaControl($objParentObject, new WikiImage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiImageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiImage object creation - defaults to CreateOrEdit
		 * @return WikiImageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::PathInfo(0);
			return WikiImageMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiImageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiImage object creation - defaults to CreateOrEdit
		 * @return WikiImageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::QueryString('intWikiVersionId');
			return WikiImageMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstWikiVersion
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstWikiVersion_Create($strControlId = null) {
			$this->lstWikiVersion = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiVersion->Name = QApplication::Translate('Wiki Version');
			$this->lstWikiVersion->Required = true;
			if (!$this->blnEditMode)
				$this->lstWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
			$objWikiVersionArray = WikiVersion::LoadAll();
			if ($objWikiVersionArray) foreach ($objWikiVersionArray as $objWikiVersion) {
				$objListItem = new QListItem($objWikiVersion->__toString(), $objWikiVersion->Id);
				if (($this->objWikiImage->WikiVersion) && ($this->objWikiImage->WikiVersion->Id == $objWikiVersion->Id))
					$objListItem->Selected = true;
				$this->lstWikiVersion->AddItem($objListItem);
			}
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
			$this->lblWikiVersionId->Text = ($this->objWikiImage->WikiVersion) ? $this->objWikiImage->WikiVersion->__toString() : null;
			$this->lblWikiVersionId->Required = true;
			return $this->lblWikiVersionId;
		}

		/**
		 * Create and setup QListBox lstWikiImageType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstWikiImageType_Create($strControlId = null) {
			$this->lstWikiImageType = new QListBox($this->objParentObject, $strControlId);
			$this->lstWikiImageType->Name = QApplication::Translate('Wiki Image Type');
			$this->lstWikiImageType->Required = true;
			foreach (WikiImageType::$NameArray as $intId => $strValue)
				$this->lstWikiImageType->AddItem(new QListItem($strValue, $intId, $this->objWikiImage->WikiImageTypeId == $intId));
			return $this->lstWikiImageType;
		}

		/**
		 * Create and setup QLabel lblWikiImageTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWikiImageTypeId_Create($strControlId = null) {
			$this->lblWikiImageTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblWikiImageTypeId->Name = QApplication::Translate('Wiki Image Type');
			$this->lblWikiImageTypeId->Text = ($this->objWikiImage->WikiImageTypeId) ? WikiImageType::$NameArray[$this->objWikiImage->WikiImageTypeId] : null;
			$this->lblWikiImageTypeId->Required = true;
			return $this->lblWikiImageTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtWidth
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtWidth_Create($strControlId = null) {
			$this->txtWidth = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtWidth->Name = QApplication::Translate('Width');
			$this->txtWidth->Text = $this->objWikiImage->Width;
			return $this->txtWidth;
		}

		/**
		 * Create and setup QLabel lblWidth
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblWidth_Create($strControlId = null, $strFormat = null) {
			$this->lblWidth = new QLabel($this->objParentObject, $strControlId);
			$this->lblWidth->Name = QApplication::Translate('Width');
			$this->lblWidth->Text = $this->objWikiImage->Width;
			$this->lblWidth->Format = $strFormat;
			return $this->lblWidth;
		}

		/**
		 * Create and setup QIntegerTextBox txtHeight
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHeight_Create($strControlId = null) {
			$this->txtHeight = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHeight->Name = QApplication::Translate('Height');
			$this->txtHeight->Text = $this->objWikiImage->Height;
			return $this->txtHeight;
		}

		/**
		 * Create and setup QLabel lblHeight
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHeight_Create($strControlId = null, $strFormat = null) {
			$this->lblHeight = new QLabel($this->objParentObject, $strControlId);
			$this->lblHeight->Name = QApplication::Translate('Height');
			$this->lblHeight->Text = $this->objWikiImage->Height;
			$this->lblHeight->Format = $strFormat;
			return $this->lblHeight;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objWikiImage->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
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
			$this->lblDescription->Text = $this->objWikiImage->Description;
			return $this->lblDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local WikiImage object.
		 * @param boolean $blnReload reload WikiImage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWikiImage->Reload();

			if ($this->lstWikiVersion) {
					$this->lstWikiVersion->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiVersionArray = WikiVersion::LoadAll();
				if ($objWikiVersionArray) foreach ($objWikiVersionArray as $objWikiVersion) {
					$objListItem = new QListItem($objWikiVersion->__toString(), $objWikiVersion->Id);
					if (($this->objWikiImage->WikiVersion) && ($this->objWikiImage->WikiVersion->Id == $objWikiVersion->Id))
						$objListItem->Selected = true;
					$this->lstWikiVersion->AddItem($objListItem);
				}
			}
			if ($this->lblWikiVersionId) $this->lblWikiVersionId->Text = ($this->objWikiImage->WikiVersion) ? $this->objWikiImage->WikiVersion->__toString() : null;

			if ($this->lstWikiImageType) $this->lstWikiImageType->SelectedValue = $this->objWikiImage->WikiImageTypeId;
			if ($this->lblWikiImageTypeId) $this->lblWikiImageTypeId->Text = ($this->objWikiImage->WikiImageTypeId) ? WikiImageType::$NameArray[$this->objWikiImage->WikiImageTypeId] : null;

			if ($this->txtWidth) $this->txtWidth->Text = $this->objWikiImage->Width;
			if ($this->lblWidth) $this->lblWidth->Text = $this->objWikiImage->Width;

			if ($this->txtHeight) $this->txtHeight->Text = $this->objWikiImage->Height;
			if ($this->lblHeight) $this->lblHeight->Text = $this->objWikiImage->Height;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objWikiImage->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objWikiImage->Description;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WIKIIMAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WikiImage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWikiImage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstWikiVersion) $this->objWikiImage->WikiVersionId = $this->lstWikiVersion->SelectedValue;
				if ($this->lstWikiImageType) $this->objWikiImage->WikiImageTypeId = $this->lstWikiImageType->SelectedValue;
				if ($this->txtWidth) $this->objWikiImage->Width = $this->txtWidth->Text;
				if ($this->txtHeight) $this->objWikiImage->Height = $this->txtHeight->Text;
				if ($this->txtDescription) $this->objWikiImage->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the WikiImage object
				$this->objWikiImage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WikiImage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWikiImage() {
			$this->objWikiImage->Delete();
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
				case 'WikiImage': return $this->objWikiImage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WikiImage fields -- will be created dynamically if not yet created
				case 'WikiVersionIdControl':
					if (!$this->lstWikiVersion) return $this->lstWikiVersion_Create();
					return $this->lstWikiVersion;
				case 'WikiVersionIdLabel':
					if (!$this->lblWikiVersionId) return $this->lblWikiVersionId_Create();
					return $this->lblWikiVersionId;
				case 'WikiImageTypeIdControl':
					if (!$this->lstWikiImageType) return $this->lstWikiImageType_Create();
					return $this->lstWikiImageType;
				case 'WikiImageTypeIdLabel':
					if (!$this->lblWikiImageTypeId) return $this->lblWikiImageTypeId_Create();
					return $this->lblWikiImageTypeId;
				case 'WidthControl':
					if (!$this->txtWidth) return $this->txtWidth_Create();
					return $this->txtWidth;
				case 'WidthLabel':
					if (!$this->lblWidth) return $this->lblWidth_Create();
					return $this->lblWidth;
				case 'HeightControl':
					if (!$this->txtHeight) return $this->txtHeight_Create();
					return $this->txtHeight;
				case 'HeightLabel':
					if (!$this->lblHeight) return $this->lblHeight_Create();
					return $this->lblHeight;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to WikiImage fields
					case 'WikiVersionIdControl':
						return ($this->lstWikiVersion = QType::Cast($mixValue, 'QControl'));
					case 'WikiImageTypeIdControl':
						return ($this->lstWikiImageType = QType::Cast($mixValue, 'QControl'));
					case 'WidthControl':
						return ($this->txtWidth = QType::Cast($mixValue, 'QControl'));
					case 'HeightControl':
						return ($this->txtHeight = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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