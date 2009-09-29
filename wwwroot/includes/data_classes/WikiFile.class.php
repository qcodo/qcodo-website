<?php
	require(__DATAGEN_CLASSES__ . '/WikiFileGen.class.php');

	/**
	 * The WikiFile class defined here contains any
	 * customized code for the WikiFile class in the
	 * Object Relational Model.  It represents the "wiki_file" table 
	 * in the database, and extends from the code generated abstract WikiFileGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class WikiFile extends WikiFileGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objWikiFile->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('WikiFile Object %s',  $this->intWikiVersionId);
		}

		/**
		 * Given a file at a temp file path location, this will save the file to the repository
		 * and save the db row record.
		 * @param string $strTemporaryFilePath the temporary file path to the file being saved to the repository
		 * @param string $strFileName the name of the file that was originally uploaded
		 * @return void
		 */
		public function SaveFile($strTemporaryFilePath, $strFileName) {
			// Update wiki file metadata
			$this->FileName = $strFileName;
			$this->FileSize = filesize($strTemporaryFilePath);
			$this->FileMime = QMimeType::GetMimeTypeForFilename($strTemporaryFilePath);

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
			return $this->GetFolder() . '/' . $this->strFileName;
		}
		
		public function GetDownloadUrl() {
			return sprintf('/wiki/download_file.php/%s/%s', $this->intWikiVersionId, $this->strFileName);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of WikiFile objects
			return WikiFile::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiFile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiFile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single WikiFile object
			return WikiFile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiFile()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiFile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of WikiFile objects
			return WikiFile::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiFile()->Param1, $strParam1),
					QQ::Equal(QQN::WikiFile()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`wiki_file`.*
				FROM
					`wiki_file` AS `wiki_file`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return WikiFile::InstantiateDbResult($objDbResult);
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