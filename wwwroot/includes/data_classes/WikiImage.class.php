<?php
	require(__DATAGEN_CLASSES__ . '/WikiImageGen.class.php');

	/**
	 * The WikiImage class defined here contains any
	 * customized code for the WikiImage class in the
	 * Object Relational Model.  It represents the "wiki_image" table 
	 * in the database, and extends from the code generated abstract WikiImageGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class WikiImage extends WikiImageGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objWikiImage->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('WikiImage Object %s',  $this->intWikiVersionId);
		}

		/**
		 * Given a file at a temp file path location, this will save the image to the repository
		 * and save the db row record.
		 * @param string $strTemporaryFilePath the temporary file path to the image being saved to the repository
		 * @return void
		 */
		public function SaveFile($strTemporaryFilePath) {
			// Get Image Info and Ensure a Valid Image
			$arrValues = getimagesize($strTemporaryFilePath);
			if (!$arrValues || !count($arrValues) || !$arrValues[0] || !$arrValues[1] || !$arrValues[2])
				throw new QCallerException('Not a valid image file: ' . $strTemporaryFilePath);

			// Update image metadata info
			$this->intWidth = $arrValues[0];
			$this->intHeight = $arrValues[1];
			switch ($arrValues[2]) {
				case IMAGETYPE_JPEG:
					$this->intWikiImageTypeId = WIkiImageType::Jpeg;
					break;
				case IMAGETYPE_PNG:
					$this->intWikiImageTypeId = WIkiImageType::Png;
					break;
				case IMAGETYPE_GIF:
					$this->intWikiImageTypeId = WIkiImageType::Gif;
					break;
				default:
					throw new QCallerException('Not a valid image file: ' . $strTemporaryFilePath);
			}

			// Save the Row
			$this->Save();

			// Copy the File
			QApplication::MakeDirectory($this->GetFolder(), 0777);
			copy($strTemporaryFilePath, $this->GetPath());
			chmod($this->GetPath(), 0666);
		}

		public function GetFolder() {
			return __WIKI_FILE_REPOSITORY__ . '/' . $this->WikiVersion->WikiItemId . '/' . $this->intWikiVersionId;
		}

		public function GetPath() {
			return $this->GetFolder() . '/image.' . WikiImageType::$ExtensionArray[$this->intWikiImageTypeId];
		}

		protected function GetThumbFolder() {
			return __IMAGES_CACHED__ . '/WikiImage/' . $this->WikiVersion->WikiItemId;
		}

		/**
		 * This will return the web/docroot-relative path for the thumbnail image for this wiki image
		 * NOTE: if the thumbnail does not exist, this will also CREATE the thumbnail
		 * @return string
		 */
		public function GetThumbPath() {
			// calculate the web/docroot-relative path
			$strThumbPath = $this->GetThumbFolder() . '/' . $this->intWikiVersionId . '.' . WikiImageType::$ExtensionArray[$this->intWikiImageTypeId];

			// See if the thumbnail image, itself exists
			if (file_exists(__DOCROOT__ . $strThumbPath))
				return $strThumbPath;

			// It does NOT exist -- we need to create it first
			QApplication::MakeDirectory(__DOCROOT__ . $this->GetThumbFolder(), 0777);

			$objImageControl = new QImageControl(null);
			$objImageControl->ImagePath = $this->GetPath();
			$objImageControl->Width = 240;
			$objImageControl->Height = 240;
			$objImageControl->ScaleCanvasDown = true;
			$objImageControl->ScaleImageUp = false;
			$objImageControl->RenderImage(__DOCROOT__ . $strThumbPath);

			return $strThumbPath;
		}

		public function GetImageSourceUrl() {
			return '/wiki/view_image.php/' . $this->intWikiVersionId;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of WikiImage objects
			return WikiImage::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiImage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiImage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single WikiImage object
			return WikiImage::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiImage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiImage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of WikiImage objects
			return WikiImage::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiImage()->Param1, $strParam1),
					QQ::Equal(QQN::WikiImage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = WikiImage::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`wiki_image`.*
				FROM
					`wiki_image` AS `wiki_image`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return WikiImage::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>