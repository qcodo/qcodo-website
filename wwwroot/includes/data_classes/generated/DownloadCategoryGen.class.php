<?php
	/**
	 * The abstract DownloadCategoryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DownloadCategory subclass which
	 * extends this DownloadCategoryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DownloadCategory class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * 
	 */
	class DownloadCategoryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column download_category.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.announce_only_flag
		 * @var boolean blnAnnounceOnlyFlag
		 */
		protected $blnAnnounceOnlyFlag;
		const AnnounceOnlyFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 200;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.note
		 * @var string strNote
		 */
		protected $strNote;
		const NoteMaxLength = 200;
		const NoteDefault = null;


		/**
		 * Protected member variable that maps to the database column download_category.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single Download object
		 * (of type Download), if this DownloadCategory object was restored with
		 * an expansion on the download association table.
		 * @var Download _objDownload;
		 */
		private $_objDownload;

		/**
		 * Private member variable that stores a reference to an array of Download objects
		 * (of type Download[]), if this DownloadCategory object was restored with
		 * an ExpandAsArray on the download association table.
		 * @var Download[] _objDownloadArray;
		 */
		private $_objDownloadArray = array();

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
		 * Load a DownloadCategory from PK Info
		 * @param integer $intId
		 * @return DownloadCategory
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return DownloadCategory::QuerySingle(
				QQ::Equal(QQN::DownloadCategory()->Id, $intId)
			);
		}

		/**
		 * Load all DownloadCategories
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DownloadCategory[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DownloadCategory::QueryArray to perform the LoadAll query
			try {
				return DownloadCategory::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DownloadCategories
		 * @return int
		 */
		public static function CountAll() {
			// Call DownloadCategory::QueryCount to perform the CountAll query
			return DownloadCategory::QueryCount(QQ::All());
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
			$objDatabase = DownloadCategory::GetDatabase();

			// Create/Build out the QueryBuilder object with DownloadCategory-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'download_category');
			DownloadCategory::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('`download_category` AS `download_category`');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				$objConditions->UpdateQueryBuilder($objQueryBuilder);

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
		 * Static Qcodo Query method to query for a single DownloadCategory object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DownloadCategory the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DownloadCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new DownloadCategory object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DownloadCategory::InstantiateDbRow($objDbResult->GetNextRow());
		}

		/**
		 * Static Qcodo Query method to query for an array of DownloadCategory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DownloadCategory[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DownloadCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DownloadCategory::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes);
		}

		/**
		 * Static Qcodo Query method to query for a count of DownloadCategory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DownloadCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DownloadCategory::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'download_category_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DownloadCategory-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DownloadCategory::GetSelectFields($objQueryBuilder);
				DownloadCategory::GetFromFields($objQueryBuilder);

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
			return DownloadCategory::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DownloadCategory
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = '`' . $strPrefix . '`';
				$strAliasPrefix = '`' . $strPrefix . '__';
			} else {
				$strTableName = '`download_category`';
				$strAliasPrefix = '`';
			}

			$objBuilder->AddSelectItem($strTableName . '.`id` AS ' . $strAliasPrefix . 'id`');
			$objBuilder->AddSelectItem($strTableName . '.`order_number` AS ' . $strAliasPrefix . 'order_number`');
			$objBuilder->AddSelectItem($strTableName . '.`name` AS ' . $strAliasPrefix . 'name`');
			$objBuilder->AddSelectItem($strTableName . '.`announce_only_flag` AS ' . $strAliasPrefix . 'announce_only_flag`');
			$objBuilder->AddSelectItem($strTableName . '.`description` AS ' . $strAliasPrefix . 'description`');
			$objBuilder->AddSelectItem($strTableName . '.`note` AS ' . $strAliasPrefix . 'note`');
			$objBuilder->AddSelectItem($strTableName . '.`last_post_date` AS ' . $strAliasPrefix . 'last_post_date`');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DownloadCategory from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DownloadCategory::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @return DownloadCategory
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasPrefix . 'id', 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'download_category__';


				if ((array_key_exists($strAliasPrefix . 'download__id', $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasPrefix . 'download__id')))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDownloadArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDownloadArray[$intPreviousChildItemCount - 1];
						$objChildItem = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes, $objPreviousChildItem);
						if ($objChildItem)
							array_push($objPreviousItem->_objDownloadArray, $objChildItem);
					} else
						array_push($objPreviousItem->_objDownloadArray, Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes));
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'download_category__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the DownloadCategory object
			$objToReturn = new DownloadCategory();
			$objToReturn->__blnRestored = true;

			$objToReturn->intId = $objDbRow->GetColumn($strAliasPrefix . 'id', 'Integer');
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasPrefix . 'order_number', 'Integer');
			$objToReturn->strName = $objDbRow->GetColumn($strAliasPrefix . 'name', 'VarChar');
			$objToReturn->blnAnnounceOnlyFlag = $objDbRow->GetColumn($strAliasPrefix . 'announce_only_flag', 'Bit');
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasPrefix . 'description', 'VarChar');
			$objToReturn->strNote = $objDbRow->GetColumn($strAliasPrefix . 'note', 'VarChar');
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasPrefix . 'last_post_date', 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'download_category__';




			// Check for Download Virtual Binding
			if (!is_null($objDbRow->GetColumn($strAliasPrefix . 'download__id'))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAliasPrefix . 'download__id', $strExpandAsArrayNodes)))
					array_push($objToReturn->_objDownloadArray, Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes));
				else
					$objToReturn->_objDownload = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of DownloadCategories from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @return DownloadCategory[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null) {
			$objToReturn = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DownloadCategory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem);
					if ($objItem) {
						array_push($objToReturn, $objItem);
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					array_push($objToReturn, DownloadCategory::InstantiateDbRow($objDbRow));
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DownloadCategory object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return DownloadCategory
		*/
		public static function LoadById($intId) {
			return DownloadCategory::QuerySingle(
				QQ::Equal(QQN::DownloadCategory()->Id, $intId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this DownloadCategory
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `download_category` (
							`order_number`,
							`name`,
							`announce_only_flag`,
							`description`,
							`note`,
							`last_post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strNote) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('download_category', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`download_category`
						SET
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`announce_only_flag` = ' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`note` = ' . $objDatabase->SqlVariable($this->strNote) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this DownloadCategory
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DownloadCategory with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download_category`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all DownloadCategories
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download_category`');
		}

		/**
		 * Truncate download_category table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `download_category`');
		}

		/**
		 * Reload this DownloadCategory from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DownloadCategory object.');

			// Reload the Object
			$objReloaded = DownloadCategory::Load($this->intId);

			// Update $this's local variables to match
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->strName = $objReloaded->strName;
			$this->blnAnnounceOnlyFlag = $objReloaded->blnAnnounceOnlyFlag;
			$this->strDescription = $objReloaded->strDescription;
			$this->strNote = $objReloaded->strNote;
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
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
				case 'Id':
					/**
					 * Gets the value for intId (Read-Only PK)
					 * @return integer
					 */
					return $this->intId;

				case 'OrderNumber':
					/**
					 * Gets the value for intOrderNumber 
					 * @return integer
					 */
					return $this->intOrderNumber;

				case 'Name':
					/**
					 * Gets the value for strName (Not Null)
					 * @return string
					 */
					return $this->strName;

				case 'AnnounceOnlyFlag':
					/**
					 * Gets the value for blnAnnounceOnlyFlag 
					 * @return boolean
					 */
					return $this->blnAnnounceOnlyFlag;

				case 'Description':
					/**
					 * Gets the value for strDescription 
					 * @return string
					 */
					return $this->strDescription;

				case 'Note':
					/**
					 * Gets the value for strNote 
					 * @return string
					 */
					return $this->strNote;

				case 'LastPostDate':
					/**
					 * Gets the value for dttLastPostDate 
					 * @return QDateTime
					 */
					return $this->dttLastPostDate;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Download':
					/**
					 * Gets the value for the private _objDownload (Read-Only)
					 * if set due to an expansion on the download.download_category_id reverse relationship
					 * @return Download
					 */
					return $this->_objDownload;

				case '_DownloadArray':
					/**
					 * Gets the value for the private _objDownloadArray (Read-Only)
					 * if set due to an ExpandAsArray on the download.download_category_id reverse relationship
					 * @return Download[]
					 */
					return (array) $this->_objDownloadArray;


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
				case 'OrderNumber':
					/**
					 * Sets the value for intOrderNumber 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOrderNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Name':
					/**
					 * Sets the value for strName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AnnounceOnlyFlag':
					/**
					 * Sets the value for blnAnnounceOnlyFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAnnounceOnlyFlag = QType::Cast($mixValue, QType::Boolean));
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

				case 'Note':
					/**
					 * Sets the value for strNote 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNote = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastPostDate':
					/**
					 * Sets the value for dttLastPostDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttLastPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for Download
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Downloads as an array of Download objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/ 
		public function GetDownloadArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Download::LoadArrayByDownloadCategoryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Downloads
		 * @return int
		*/ 
		public function CountDownloads() {
			if ((is_null($this->intId)))
				return 0;

			return Download::CountByDownloadCategoryId($this->intId);
		}

		/**
		 * Associates a Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function AssociateDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDownload on this unsaved DownloadCategory.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDownload on this DownloadCategory with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`download_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . '
			');
		}

		/**
		 * Unassociates a Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function UnassociateDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved DownloadCategory.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this DownloadCategory with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`download_category_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`download_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Downloads
		 * @return void
		*/ 
		public function UnassociateAllDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved DownloadCategory.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`download_category_id` = null
				WHERE
					`download_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function DeleteAssociatedDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved DownloadCategory.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this DownloadCategory with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`download_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Downloads
		 * @return void
		*/ 
		public function DeleteAllDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved DownloadCategory.');

			// Get the Database Object for this Class
			$objDatabase = DownloadCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`download_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DownloadCategory"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="AnnounceOnlyFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Note" type="xsd:string"/>';
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DownloadCategory', $strComplexTypeArray)) {
				$strComplexTypeArray['DownloadCategory'] = DownloadCategory::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DownloadCategory::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DownloadCategory();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'OrderNumber'))
				$objToReturn->intOrderNumber = $objSoapObject->OrderNumber;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'AnnounceOnlyFlag'))
				$objToReturn->blnAnnounceOnlyFlag = $objSoapObject->AnnounceOnlyFlag;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Note'))
				$objToReturn->strNote = $objSoapObject->Note;
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DownloadCategory::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeDownloadCategory extends QQNode {
		protected $strTableName = 'download_category';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DownloadCategory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AnnounceOnlyFlag':
					return new QQNode('announce_only_flag', 'AnnounceOnlyFlag', 'boolean', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'Download':
					return new QQReverseReferenceNodeDownload($this, 'download', 'reverse_reference', 'download_category_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
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

	class QQReverseReferenceNodeDownloadCategory extends QQReverseReferenceNode {
		protected $strTableName = 'download_category';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DownloadCategory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AnnounceOnlyFlag':
					return new QQNode('announce_only_flag', 'AnnounceOnlyFlag', 'boolean', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'Download':
					return new QQReverseReferenceNodeDownload($this, 'download', 'reverse_reference', 'download_category_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
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