<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Article class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Article object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ArticleMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Article $Article the actual Article data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ArticleSectionIdControl
	 * property-read QLabel $ArticleSectionIdLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $BylineControl
	 * property-read QLabel $BylineLabel
	 * property QTextBox $ArticleControl
	 * property-read QLabel $ArticleLabel
	 * property QDateTimePicker $PostDateControl
	 * property-read QLabel $PostDateLabel
	 * property QLabel $LastUpdatedDateControl
	 * property-read QLabel $LastUpdatedDateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ArticleMetaControlGen extends QBaseClass {
		// General Variables
		protected $objArticle;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Article's individual data fields
		protected $lblId;
		protected $lstArticleSection;
		protected $txtTitle;
		protected $txtDescription;
		protected $txtByline;
		protected $txtArticle;
		protected $calPostDate;
		protected $lblLastUpdatedDate;

		// Controls that allow the viewing of Article's individual data fields
		protected $lblArticleSectionId;
		protected $lblTitle;
		protected $lblDescription;
		protected $lblByline;
		protected $lblArticle;
		protected $lblPostDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ArticleMetaControl to edit a single Article object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Article object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param Article $objArticle new or existing Article object
		 */
		 public function __construct($objParentObject, Article $objArticle) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ArticleMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Article object
			$this->objArticle = $objArticle;

			// Figure out if we're Editing or Creating New
			if ($this->objArticle->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
 		 * @return ArticleMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objArticle = Article::Load($intId);

				// Article was found -- return it!
				if ($objArticle)
					return new ArticleMetaControl($objParentObject, $objArticle);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Article object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ArticleMetaControl($objParentObject, new Article());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
		 * @return ArticleMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ArticleMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ArticleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Article object creation - defaults to CreateOrEdit
		 * @return ArticleMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ArticleMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objArticle->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstArticleSection
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstArticleSection_Create($strControlId = null) {
			$this->lstArticleSection = new QListBox($this->objParentObject, $strControlId);
			$this->lstArticleSection->Name = QApplication::Translate('Article Section');
			$this->lstArticleSection->Required = true;
			if (!$this->blnEditMode)
				$this->lstArticleSection->AddItem(QApplication::Translate('- Select One -'), null);
			$objArticleSectionArray = ArticleSection::LoadAll();
			if ($objArticleSectionArray) foreach ($objArticleSectionArray as $objArticleSection) {
				$objListItem = new QListItem($objArticleSection->__toString(), $objArticleSection->Id);
				if (($this->objArticle->ArticleSection) && ($this->objArticle->ArticleSection->Id == $objArticleSection->Id))
					$objListItem->Selected = true;
				$this->lstArticleSection->AddItem($objListItem);
			}
			return $this->lstArticleSection;
		}

		/**
		 * Create and setup QLabel lblArticleSectionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArticleSectionId_Create($strControlId = null) {
			$this->lblArticleSectionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticleSectionId->Name = QApplication::Translate('Article Section');
			$this->lblArticleSectionId->Text = ($this->objArticle->ArticleSection) ? $this->objArticle->ArticleSection->__toString() : null;
			$this->lblArticleSectionId->Required = true;
			return $this->lblArticleSectionId;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objArticle->Title;
			$this->txtTitle->Required = true;
			$this->txtTitle->MaxLength = Article::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objArticle->Title;
			$this->lblTitle->Required = true;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objArticle->Description;
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
			$this->lblDescription->Text = $this->objArticle->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtByline
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtByline_Create($strControlId = null) {
			$this->txtByline = new QTextBox($this->objParentObject, $strControlId);
			$this->txtByline->Name = QApplication::Translate('Byline');
			$this->txtByline->Text = $this->objArticle->Byline;
			$this->txtByline->MaxLength = Article::BylineMaxLength;
			return $this->txtByline;
		}

		/**
		 * Create and setup QLabel lblByline
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblByline_Create($strControlId = null) {
			$this->lblByline = new QLabel($this->objParentObject, $strControlId);
			$this->lblByline->Name = QApplication::Translate('Byline');
			$this->lblByline->Text = $this->objArticle->Byline;
			return $this->lblByline;
		}

		/**
		 * Create and setup QTextBox txtArticle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtArticle_Create($strControlId = null) {
			$this->txtArticle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtArticle->Name = QApplication::Translate('Article');
			$this->txtArticle->Text = $this->objArticle->Article;
			$this->txtArticle->TextMode = QTextMode::MultiLine;
			return $this->txtArticle;
		}

		/**
		 * Create and setup QLabel lblArticle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArticle_Create($strControlId = null) {
			$this->lblArticle = new QLabel($this->objParentObject, $strControlId);
			$this->lblArticle->Name = QApplication::Translate('Article');
			$this->lblArticle->Text = $this->objArticle->Article;
			return $this->lblArticle;
		}

		/**
		 * Create and setup QDateTimePicker calPostDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calPostDate_Create($strControlId = null) {
			$this->calPostDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calPostDate->Name = QApplication::Translate('Post Date');
			$this->calPostDate->DateTime = $this->objArticle->PostDate;
			$this->calPostDate->DateTimePickerType = QDateTimePickerType::DateTime;
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
			$this->lblPostDate->Text = sprintf($this->objArticle->PostDate) ? $this->objArticle->__toString($this->strPostDateDateTimeFormat) : null;
			return $this->lblPostDate;
		}

		protected $strPostDateDateTimeFormat;

		/**
		 * Create and setup QLabel lblLastUpdatedDate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastUpdatedDate_Create($strControlId = null) {
			$this->lblLastUpdatedDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastUpdatedDate->Name = QApplication::Translate('Last Updated Date');
			if ($this->blnEditMode)
				$this->lblLastUpdatedDate->Text = $this->objArticle->LastUpdatedDate;
			else
				$this->lblLastUpdatedDate->Text = 'N/A';
			return $this->lblLastUpdatedDate;
		}



		/**
		 * Refresh this MetaControl with Data from the local Article object.
		 * @param boolean $blnReload reload Article from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objArticle->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objArticle->Id;

			if ($this->lstArticleSection) {
					$this->lstArticleSection->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstArticleSection->AddItem(QApplication::Translate('- Select One -'), null);
				$objArticleSectionArray = ArticleSection::LoadAll();
				if ($objArticleSectionArray) foreach ($objArticleSectionArray as $objArticleSection) {
					$objListItem = new QListItem($objArticleSection->__toString(), $objArticleSection->Id);
					if (($this->objArticle->ArticleSection) && ($this->objArticle->ArticleSection->Id == $objArticleSection->Id))
						$objListItem->Selected = true;
					$this->lstArticleSection->AddItem($objListItem);
				}
			}
			if ($this->lblArticleSectionId) $this->lblArticleSectionId->Text = ($this->objArticle->ArticleSection) ? $this->objArticle->ArticleSection->__toString() : null;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objArticle->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objArticle->Title;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objArticle->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objArticle->Description;

			if ($this->txtByline) $this->txtByline->Text = $this->objArticle->Byline;
			if ($this->lblByline) $this->lblByline->Text = $this->objArticle->Byline;

			if ($this->txtArticle) $this->txtArticle->Text = $this->objArticle->Article;
			if ($this->lblArticle) $this->lblArticle->Text = $this->objArticle->Article;

			if ($this->calPostDate) $this->calPostDate->DateTime = $this->objArticle->PostDate;
			if ($this->lblPostDate) $this->lblPostDate->Text = sprintf($this->objArticle->PostDate) ? $this->objArticle->__toString($this->strPostDateDateTimeFormat) : null;

			if ($this->lblLastUpdatedDate) if ($this->blnEditMode) $this->lblLastUpdatedDate->Text = $this->objArticle->LastUpdatedDate;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ARTICLE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Article instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveArticle() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstArticleSection) $this->objArticle->ArticleSectionId = $this->lstArticleSection->SelectedValue;
				if ($this->txtTitle) $this->objArticle->Title = $this->txtTitle->Text;
				if ($this->txtDescription) $this->objArticle->Description = $this->txtDescription->Text;
				if ($this->txtByline) $this->objArticle->Byline = $this->txtByline->Text;
				if ($this->txtArticle) $this->objArticle->Article = $this->txtArticle->Text;
				if ($this->calPostDate) $this->objArticle->PostDate = $this->calPostDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Article object
				$this->objArticle->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Article instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteArticle() {
			$this->objArticle->Delete();
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
				case 'Article': return $this->objArticle;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Article fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ArticleSectionIdControl':
					if (!$this->lstArticleSection) return $this->lstArticleSection_Create();
					return $this->lstArticleSection;
				case 'ArticleSectionIdLabel':
					if (!$this->lblArticleSectionId) return $this->lblArticleSectionId_Create();
					return $this->lblArticleSectionId;
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'BylineControl':
					if (!$this->txtByline) return $this->txtByline_Create();
					return $this->txtByline;
				case 'BylineLabel':
					if (!$this->lblByline) return $this->lblByline_Create();
					return $this->lblByline;
				case 'ArticleControl':
					if (!$this->txtArticle) return $this->txtArticle_Create();
					return $this->txtArticle;
				case 'ArticleLabel':
					if (!$this->lblArticle) return $this->lblArticle_Create();
					return $this->lblArticle;
				case 'PostDateControl':
					if (!$this->calPostDate) return $this->calPostDate_Create();
					return $this->calPostDate;
				case 'PostDateLabel':
					if (!$this->lblPostDate) return $this->lblPostDate_Create();
					return $this->lblPostDate;
				case 'LastUpdatedDateControl':
					if (!$this->lblLastUpdatedDate) return $this->lblLastUpdatedDate_Create();
					return $this->lblLastUpdatedDate;
				case 'LastUpdatedDateLabel':
					if (!$this->lblLastUpdatedDate) return $this->lblLastUpdatedDate_Create();
					return $this->lblLastUpdatedDate;
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
					// Controls that point to Article fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ArticleSectionIdControl':
						return ($this->lstArticleSection = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'BylineControl':
						return ($this->txtByline = QType::Cast($mixValue, 'QControl'));
					case 'ArticleControl':
						return ($this->txtArticle = QType::Cast($mixValue, 'QControl'));
					case 'PostDateControl':
						return ($this->calPostDate = QType::Cast($mixValue, 'QControl'));
					case 'LastUpdatedDateControl':
						return ($this->lblLastUpdatedDate = QType::Cast($mixValue, 'QControl'));
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