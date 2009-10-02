<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the WikiFile class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single WikiFile object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a WikiFileMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read WikiFile $WikiFile the actual WikiFile data class being edited
	 * property QListBox $WikiVersionIdControl
	 * property-read QLabel $WikiVersionIdLabel
	 * property QTextBox $FileNameControl
	 * property-read QLabel $FileNameLabel
	 * property QIntegerTextBox $FileSizeControl
	 * property-read QLabel $FileSizeLabel
	 * property QTextBox $FileMimeControl
	 * property-read QLabel $FileMimeLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QIntegerTextBox $DownloadCountControl
	 * property-read QLabel $DownloadCountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class WikiFileMetaControlGen extends QBaseClass {
		// General Variables
		protected $objWikiFile;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of WikiFile's individual data fields
		protected $lstWikiVersion;
		protected $txtFileName;
		protected $txtFileSize;
		protected $txtFileMime;
		protected $txtDescription;
		protected $txtDownloadCount;

		// Controls that allow the viewing of WikiFile's individual data fields
		protected $lblWikiVersionId;
		protected $lblFileName;
		protected $lblFileSize;
		protected $lblFileMime;
		protected $lblDescription;
		protected $lblDownloadCount;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * WikiFileMetaControl to edit a single WikiFile object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single WikiFile object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiFileMetaControl
		 * @param WikiFile $objWikiFile new or existing WikiFile object
		 */
		 public function __construct($objParentObject, WikiFile $objWikiFile) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this WikiFileMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked WikiFile object
			$this->objWikiFile = $objWikiFile;

			// Figure out if we're Editing or Creating New
			if ($this->objWikiFile->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiFileMetaControl
		 * @param integer $intWikiVersionId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing WikiFile object creation - defaults to CreateOrEdit
 		 * @return WikiFileMetaControl
		 */
		public static function Create($objParentObject, $intWikiVersionId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intWikiVersionId)) {
				$objWikiFile = WikiFile::Load($intWikiVersionId);

				// WikiFile was found -- return it!
				if ($objWikiFile)
					return new WikiFileMetaControl($objParentObject, $objWikiFile);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a WikiFile object with PK arguments: ' . $intWikiVersionId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new WikiFileMetaControl($objParentObject, new WikiFile());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiFileMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiFile object creation - defaults to CreateOrEdit
		 * @return WikiFileMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::PathInfo(0);
			return WikiFileMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this WikiFileMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing WikiFile object creation - defaults to CreateOrEdit
		 * @return WikiFileMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intWikiVersionId = QApplication::QueryString('intWikiVersionId');
			return WikiFileMetaControl::Create($objParentObject, $intWikiVersionId, $intCreateType);
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
				if (($this->objWikiFile->WikiVersion) && ($this->objWikiFile->WikiVersion->Id == $objWikiVersion->Id))
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
			$this->lblWikiVersionId->Text = ($this->objWikiFile->WikiVersion) ? $this->objWikiFile->WikiVersion->__toString() : null;
			$this->lblWikiVersionId->Required = true;
			return $this->lblWikiVersionId;
		}

		/**
		 * Create and setup QTextBox txtFileName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFileName_Create($strControlId = null) {
			$this->txtFileName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFileName->Name = QApplication::Translate('File Name');
			$this->txtFileName->Text = $this->objWikiFile->FileName;
			$this->txtFileName->MaxLength = WikiFile::FileNameMaxLength;
			return $this->txtFileName;
		}

		/**
		 * Create and setup QLabel lblFileName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFileName_Create($strControlId = null) {
			$this->lblFileName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFileName->Name = QApplication::Translate('File Name');
			$this->lblFileName->Text = $this->objWikiFile->FileName;
			return $this->lblFileName;
		}

		/**
		 * Create and setup QIntegerTextBox txtFileSize
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtFileSize_Create($strControlId = null) {
			$this->txtFileSize = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtFileSize->Name = QApplication::Translate('File Size');
			$this->txtFileSize->Text = $this->objWikiFile->FileSize;
			return $this->txtFileSize;
		}

		/**
		 * Create and setup QLabel lblFileSize
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblFileSize_Create($strControlId = null, $strFormat = null) {
			$this->lblFileSize = new QLabel($this->objParentObject, $strControlId);
			$this->lblFileSize->Name = QApplication::Translate('File Size');
			$this->lblFileSize->Text = $this->objWikiFile->FileSize;
			$this->lblFileSize->Format = $strFormat;
			return $this->lblFileSize;
		}

		/**
		 * Create and setup QTextBox txtFileMime
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFileMime_Create($strControlId = null) {
			$this->txtFileMime = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFileMime->Name = QApplication::Translate('File Mime');
			$this->txtFileMime->Text = $this->objWikiFile->FileMime;
			$this->txtFileMime->MaxLength = WikiFile::FileMimeMaxLength;
			return $this->txtFileMime;
		}

		/**
		 * Create and setup QLabel lblFileMime
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFileMime_Create($strControlId = null) {
			$this->lblFileMime = new QLabel($this->objParentObject, $strControlId);
			$this->lblFileMime->Name = QApplication::Translate('File Mime');
			$this->lblFileMime->Text = $this->objWikiFile->FileMime;
			return $this->lblFileMime;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objWikiFile->Description;
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
			$this->lblDescription->Text = $this->objWikiFile->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QIntegerTextBox txtDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDownloadCount_Create($strControlId = null) {
			$this->txtDownloadCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDownloadCount->Name = QApplication::Translate('Download Count');
			$this->txtDownloadCount->Text = $this->objWikiFile->DownloadCount;
			return $this->txtDownloadCount;
		}

		/**
		 * Create and setup QLabel lblDownloadCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblDownloadCount_Create($strControlId = null, $strFormat = null) {
			$this->lblDownloadCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblDownloadCount->Name = QApplication::Translate('Download Count');
			$this->lblDownloadCount->Text = $this->objWikiFile->DownloadCount;
			$this->lblDownloadCount->Format = $strFormat;
			return $this->lblDownloadCount;
		}



		/**
		 * Refresh this MetaControl with Data from the local WikiFile object.
		 * @param boolean $blnReload reload WikiFile from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objWikiFile->Reload();

			if ($this->lstWikiVersion) {
					$this->lstWikiVersion->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstWikiVersion->AddItem(QApplication::Translate('- Select One -'), null);
				$objWikiVersionArray = WikiVersion::LoadAll();
				if ($objWikiVersionArray) foreach ($objWikiVersionArray as $objWikiVersion) {
					$objListItem = new QListItem($objWikiVersion->__toString(), $objWikiVersion->Id);
					if (($this->objWikiFile->WikiVersion) && ($this->objWikiFile->WikiVersion->Id == $objWikiVersion->Id))
						$objListItem->Selected = true;
					$this->lstWikiVersion->AddItem($objListItem);
				}
			}
			if ($this->lblWikiVersionId) $this->lblWikiVersionId->Text = ($this->objWikiFile->WikiVersion) ? $this->objWikiFile->WikiVersion->__toString() : null;

			if ($this->txtFileName) $this->txtFileName->Text = $this->objWikiFile->FileName;
			if ($this->lblFileName) $this->lblFileName->Text = $this->objWikiFile->FileName;

			if ($this->txtFileSize) $this->txtFileSize->Text = $this->objWikiFile->FileSize;
			if ($this->lblFileSize) $this->lblFileSize->Text = $this->objWikiFile->FileSize;

			if ($this->txtFileMime) $this->txtFileMime->Text = $this->objWikiFile->FileMime;
			if ($this->lblFileMime) $this->lblFileMime->Text = $this->objWikiFile->FileMime;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objWikiFile->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objWikiFile->Description;

			if ($this->txtDownloadCount) $this->txtDownloadCount->Text = $this->objWikiFile->DownloadCount;
			if ($this->lblDownloadCount) $this->lblDownloadCount->Text = $this->objWikiFile->DownloadCount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC WIKIFILE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's WikiFile instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveWikiFile() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstWikiVersion) $this->objWikiFile->WikiVersionId = $this->lstWikiVersion->SelectedValue;
				if ($this->txtFileName) $this->objWikiFile->FileName = $this->txtFileName->Text;
				if ($this->txtFileSize) $this->objWikiFile->FileSize = $this->txtFileSize->Text;
				if ($this->txtFileMime) $this->objWikiFile->FileMime = $this->txtFileMime->Text;
				if ($this->txtDescription) $this->objWikiFile->Description = $this->txtDescription->Text;
				if ($this->txtDownloadCount) $this->objWikiFile->DownloadCount = $this->txtDownloadCount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the WikiFile object
				$this->objWikiFile->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's WikiFile instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteWikiFile() {
			$this->objWikiFile->Delete();
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
				case 'WikiFile': return $this->objWikiFile;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to WikiFile fields -- will be created dynamically if not yet created
				case 'WikiVersionIdControl':
					if (!$this->lstWikiVersion) return $this->lstWikiVersion_Create();
					return $this->lstWikiVersion;
				case 'WikiVersionIdLabel':
					if (!$this->lblWikiVersionId) return $this->lblWikiVersionId_Create();
					return $this->lblWikiVersionId;
				case 'FileNameControl':
					if (!$this->txtFileName) return $this->txtFileName_Create();
					return $this->txtFileName;
				case 'FileNameLabel':
					if (!$this->lblFileName) return $this->lblFileName_Create();
					return $this->lblFileName;
				case 'FileSizeControl':
					if (!$this->txtFileSize) return $this->txtFileSize_Create();
					return $this->txtFileSize;
				case 'FileSizeLabel':
					if (!$this->lblFileSize) return $this->lblFileSize_Create();
					return $this->lblFileSize;
				case 'FileMimeControl':
					if (!$this->txtFileMime) return $this->txtFileMime_Create();
					return $this->txtFileMime;
				case 'FileMimeLabel':
					if (!$this->lblFileMime) return $this->lblFileMime_Create();
					return $this->lblFileMime;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'DownloadCountControl':
					if (!$this->txtDownloadCount) return $this->txtDownloadCount_Create();
					return $this->txtDownloadCount;
				case 'DownloadCountLabel':
					if (!$this->lblDownloadCount) return $this->lblDownloadCount_Create();
					return $this->lblDownloadCount;
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
					// Controls that point to WikiFile fields
					case 'WikiVersionIdControl':
						return ($this->lstWikiVersion = QType::Cast($mixValue, 'QControl'));
					case 'FileNameControl':
						return ($this->txtFileName = QType::Cast($mixValue, 'QControl'));
					case 'FileSizeControl':
						return ($this->txtFileSize = QType::Cast($mixValue, 'QControl'));
					case 'FileMimeControl':
						return ($this->txtFileMime = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'DownloadCountControl':
						return ($this->txtDownloadCount = QType::Cast($mixValue, 'QControl'));
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