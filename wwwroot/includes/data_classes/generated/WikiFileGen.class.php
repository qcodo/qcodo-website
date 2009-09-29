<?php
	/**
	 * The abstract WikiFileGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the WikiFile subclass which
	 * extends this WikiFileGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiFile class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $WikiVersionId the value for intWikiVersionId (PK)
	 * @property string $FileName the value for strFileName 
	 * @property integer $FileSize the value for intFileSize 
	 * @property string $FileMime the value for strFileMime 
	 * @property string $Description the value for strDescription 
	 * @property WikiVersion $WikiVersion the value for the WikiVersion object referenced by intWikiVersionId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WikiFileGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column wiki_file.wiki_version_id
		 * @var integer intWikiVersionId
		 */
		protected $intWikiVersionId;
		const WikiVersionIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intWikiVersionId;
		 */
		protected $__intWikiVersionId;

		/**
		 * Protected member variable that maps to the database column wiki_file.file_name
		 * @var string strFileName
		 */
		protected $strFileName;
		const FileNameMaxLength = 255;
		const FileNameDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_file.file_size
		 * @var integer intFileSize
		 */
		protected $intFileSize;
		const FileSizeDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_file.file_mime
		 * @var string strFileMime
		 */
		protected $strFileMime;
		const FileMimeMaxLength = 100;
		const FileMimeDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_file.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column wiki_file.wiki_version_id.
		 *
		 * NOTE: Always use the WikiVersion property getter to correctly retrieve this WikiVersion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiVersion objWikiVersion
		 */
		protected $objWikiVersion;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a WikiFile from PK Info
		 * @param integer $intWikiVersionId
		 * @return WikiFile
		 */
		public static function Load($intWikiVersionId) {
			// Use QuerySingle to Perform the Query
			return WikiFile::QuerySingle(
				QQ::Equal(QQN::WikiFile()->WikiVersionId, $intWikiVersionId)
			);
		}

		/**
		 * Load all WikiFiles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiFile[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call WikiFile::QueryArray to perform the LoadAll query
			try {
				return WikiFile::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all WikiFiles
		 * @return int
		 */
		public static function CountAll() {
			// Call WikiFile::QueryCount to perform the CountAll query
			return WikiFile::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			// Create/Build out the QueryBuilder object with WikiFile-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'wiki_file');
			WikiFile::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('wiki_file');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single WikiFile object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiFile the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiFile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new WikiFile object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiFile::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of WikiFile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiFile[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiFile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiFile::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of WikiFile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiFile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'wiki_file_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with WikiFile-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				WikiFile::GetSelectFields($objQueryBuilder);
				WikiFile::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return WikiFile::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this WikiFile
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'wiki_file';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'wiki_version_id', $strAliasPrefix . 'wiki_version_id');
			$objBuilder->AddSelectItem($strTableName, 'file_name', $strAliasPrefix . 'file_name');
			$objBuilder->AddSelectItem($strTableName, 'file_size', $strAliasPrefix . 'file_size');
			$objBuilder->AddSelectItem($strTableName, 'file_mime', $strAliasPrefix . 'file_mime');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a WikiFile from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this WikiFile::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return WikiFile
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the WikiFile object
			$objToReturn = new WikiFile();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'wiki_version_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'wiki_version_id'] : $strAliasPrefix . 'wiki_version_id';
			$objToReturn->intWikiVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intWikiVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'file_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'file_name'] : $strAliasPrefix . 'file_name';
			$objToReturn->strFileName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'file_size', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'file_size'] : $strAliasPrefix . 'file_size';
			$objToReturn->intFileSize = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'file_mime', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'file_mime'] : $strAliasPrefix . 'file_mime';
			$objToReturn->strFileMime = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'wiki_file__';

			// Check for WikiVersion Early Binding
			$strAlias = $strAliasPrefix . 'wiki_version_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWikiVersion = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wiki_version_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of WikiFiles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return WikiFile[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = WikiFile::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = WikiFile::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single WikiFile object,
		 * by WikiVersionId Index(es)
		 * @param integer $intWikiVersionId
		 * @return WikiFile
		*/
		public static function LoadByWikiVersionId($intWikiVersionId) {
			return WikiFile::QuerySingle(
				QQ::Equal(QQN::WikiFile()->WikiVersionId, $intWikiVersionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this WikiFile
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `wiki_file` (
							`wiki_version_id`,
							`file_name`,
							`file_size`,
							`file_mime`,
							`description`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intWikiVersionId) . ',
							' . $objDatabase->SqlVariable($this->strFileName) . ',
							' . $objDatabase->SqlVariable($this->intFileSize) . ',
							' . $objDatabase->SqlVariable($this->strFileMime) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`wiki_file`
						SET
							`wiki_version_id` = ' . $objDatabase->SqlVariable($this->intWikiVersionId) . ',
							`file_name` = ' . $objDatabase->SqlVariable($this->strFileName) . ',
							`file_size` = ' . $objDatabase->SqlVariable($this->intFileSize) . ',
							`file_mime` = ' . $objDatabase->SqlVariable($this->strFileMime) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . '
						WHERE
							`wiki_version_id` = ' . $objDatabase->SqlVariable($this->__intWikiVersionId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intWikiVersionId = $this->intWikiVersionId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this WikiFile
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intWikiVersionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this WikiFile with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_file`
				WHERE
					`wiki_version_id` = ' . $objDatabase->SqlVariable($this->intWikiVersionId) . '');
		}

		/**
		 * Delete all WikiFiles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_file`');
		}

		/**
		 * Truncate wiki_file table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = WikiFile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `wiki_file`');
		}

		/**
		 * Reload this WikiFile from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved WikiFile object.');

			// Reload the Object
			$objReloaded = WikiFile::Load($this->intWikiVersionId);

			// Update $this's local variables to match
			$this->WikiVersionId = $objReloaded->WikiVersionId;
			$this->__intWikiVersionId = $this->intWikiVersionId;
			$this->strFileName = $objReloaded->strFileName;
			$this->intFileSize = $objReloaded->intFileSize;
			$this->strFileMime = $objReloaded->strFileMime;
			$this->strDescription = $objReloaded->strDescription;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'WikiVersionId':
					/**
					 * Gets the value for intWikiVersionId (PK)
					 * @return integer
					 */
					return $this->intWikiVersionId;

				case 'FileName':
					/**
					 * Gets the value for strFileName 
					 * @return string
					 */
					return $this->strFileName;

				case 'FileSize':
					/**
					 * Gets the value for intFileSize 
					 * @return integer
					 */
					return $this->intFileSize;

				case 'FileMime':
					/**
					 * Gets the value for strFileMime 
					 * @return string
					 */
					return $this->strFileMime;

				case 'Description':
					/**
					 * Gets the value for strDescription 
					 * @return string
					 */
					return $this->strDescription;


				///////////////////
				// Member Objects
				///////////////////
				case 'WikiVersion':
					/**
					 * Gets the value for the WikiVersion object referenced by intWikiVersionId (PK)
					 * @return WikiVersion
					 */
					try {
						if ((!$this->objWikiVersion) && (!is_null($this->intWikiVersionId)))
							$this->objWikiVersion = WikiVersion::Load($this->intWikiVersionId);
						return $this->objWikiVersion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

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
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'WikiVersionId':
					/**
					 * Sets the value for intWikiVersionId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objWikiVersion = null;
						return ($this->intWikiVersionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FileName':
					/**
					 * Sets the value for strFileName 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFileName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FileSize':
					/**
					 * Sets the value for intFileSize 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intFileSize = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FileMime':
					/**
					 * Sets the value for strFileMime 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFileMime = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					/**
					 * Sets the value for strDescription 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'WikiVersion':
					/**
					 * Sets the value for the WikiVersion object referenced by intWikiVersionId (PK)
					 * @param WikiVersion $mixValue
					 * @return WikiVersion
					 */
					if (is_null($mixValue)) {
						$this->intWikiVersionId = null;
						$this->objWikiVersion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a WikiVersion object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiVersion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED WikiVersion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved WikiVersion for this WikiFile');

						// Update Local Member Variables
						$this->objWikiVersion = $mixValue;
						$this->intWikiVersionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="WikiFile"><sequence>';
			$strToReturn .= '<element name="WikiVersion" type="xsd1:WikiVersion"/>';
			$strToReturn .= '<element name="FileName" type="xsd:string"/>';
			$strToReturn .= '<element name="FileSize" type="xsd:int"/>';
			$strToReturn .= '<element name="FileMime" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('WikiFile', $strComplexTypeArray)) {
				$strComplexTypeArray['WikiFile'] = WikiFile::GetSoapComplexTypeXml();
				WikiVersion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, WikiFile::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new WikiFile();
			if ((property_exists($objSoapObject, 'WikiVersion')) &&
				($objSoapObject->WikiVersion))
				$objToReturn->WikiVersion = WikiVersion::GetObjectFromSoapObject($objSoapObject->WikiVersion);
			if (property_exists($objSoapObject, 'FileName'))
				$objToReturn->strFileName = $objSoapObject->FileName;
			if (property_exists($objSoapObject, 'FileSize'))
				$objToReturn->intFileSize = $objSoapObject->FileSize;
			if (property_exists($objSoapObject, 'FileMime'))
				$objToReturn->strFileMime = $objSoapObject->FileMime;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, WikiFile::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objWikiVersion)
				$objObject->objWikiVersion = WikiVersion::GetSoapObjectFromObject($objObject->objWikiVersion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWikiVersionId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeWikiFile extends QQNode {
		protected $strTableName = 'wiki_file';
		protected $strPrimaryKey = 'wiki_version_id';
		protected $strClassName = 'WikiFile';
		public function __get($strName) {
			switch ($strName) {
				case 'WikiVersionId':
					return new QQNode('wiki_version_id', 'WikiVersionId', 'integer', $this);
				case 'WikiVersion':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersion', 'integer', $this);
				case 'FileName':
					return new QQNode('file_name', 'FileName', 'string', $this);
				case 'FileSize':
					return new QQNode('file_size', 'FileSize', 'integer', $this);
				case 'FileMime':
					return new QQNode('file_mime', 'FileMime', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQReverseReferenceNodeWikiFile extends QQReverseReferenceNode {
		protected $strTableName = 'wiki_file';
		protected $strPrimaryKey = 'wiki_version_id';
		protected $strClassName = 'WikiFile';
		public function __get($strName) {
			switch ($strName) {
				case 'WikiVersionId':
					return new QQNode('wiki_version_id', 'WikiVersionId', 'integer', $this);
				case 'WikiVersion':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersion', 'integer', $this);
				case 'FileName':
					return new QQNode('file_name', 'FileName', 'string', $this);
				case 'FileSize':
					return new QQNode('file_size', 'FileSize', 'integer', $this);
				case 'FileMime':
					return new QQNode('file_mime', 'FileMime', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersionId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>