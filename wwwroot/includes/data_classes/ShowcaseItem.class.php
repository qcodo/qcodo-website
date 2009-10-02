<?php
	require(__DATAGEN_CLASSES__ . '/ShowcaseItemGen.class.php');

	/**
	 * The ShowcaseItem class defined here contains any
	 * customized code for the ShowcaseItem class in the
	 * Object Relational Model.  It represents the "showcase_item" table 
	 * in the database, and extends from the code generated abstract ShowcaseItemGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class ShowcaseItem extends ShowcaseItemGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objShowcaseItem->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ShowcaseItem Object %s',  $this->intId);
		}

		public function GetImageFolder() {
			return __SHOWCASE_IMAGES__ . '/' . $this->intId;
		}

		public function GetImagePath() {
			return $this->GetImageFolder() . '/image.' . ImageFileType::$ExtensionArray[$this->intImageFileTypeId];
		}

//		public function GetThumbPath() {
//			return $this->GetImageFolder() . '/thumb.jpg';
//		}

		public function SaveWithImage($strTemporaryFilePath) {
			// Get Image Info and Ensure a Valid Image
			$arrValues = getimagesize($strTemporaryFilePath);
			if (!$arrValues || !count($arrValues) || !$arrValues[0] || !$arrValues[1] || !$arrValues[2])
				throw new QCallerException('Not a valid image file: ' . $strTemporaryFilePath);

			// Update image metadata info
			switch ($arrValues[2]) {
				case IMAGETYPE_JPEG:
					$this->intImageFileTypeId = ImageFileType::Jpeg;
					break;
				case IMAGETYPE_PNG:
					$this->intImageFileTypeId = ImageFileType::Png;
					break;
				case IMAGETYPE_GIF:
					$this->intImageFileTypeId = ImageFileType::Gif;
					break;
				default:
					throw new QCallerException('Not a valid image file: ' . $strTemporaryFilePath);
			}

			$this->Save();

			QApplication::MakeDirectory($this->GetImageFolder(), 0777);
			copy($strTemporaryFilePath, $this->GetImagePath());
			chmod($this->GetImagePath(), 0666);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ShowcaseItem objects
			return ShowcaseItem::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ShowcaseItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ShowcaseItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ShowcaseItem object
			return ShowcaseItem::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ShowcaseItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ShowcaseItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ShowcaseItem objects
			return ShowcaseItem::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ShowcaseItem()->Param1, $strParam1),
					QQ::Equal(QQN::ShowcaseItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ShowcaseItem::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`showcase_item`.*
				FROM
					`showcase_item` AS `showcase_item`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ShowcaseItem::InstantiateDbResult($objDbResult);
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