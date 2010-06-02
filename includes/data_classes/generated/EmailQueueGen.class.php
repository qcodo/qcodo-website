<?php
	/**
	 * The abstract EmailQueueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EmailQueue subclass which
	 * extends this EmailQueueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailQueue class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $ToAddress the value for strToAddress 
	 * @property string $FromAddress the value for strFromAddress 
	 * @property string $Subject the value for strSubject 
	 * @property string $Body the value for strBody 
	 * @property string $Html the value for strHtml 
	 * @property boolean $HighPriorityFlag the value for blnHighPriorityFlag 
	 * @property boolean $ErrorFlag the value for blnErrorFlag 
	 * @property string $ErrorMessage the value for strErrorMessage 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmailQueueGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column email_queue.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.to_address
		 * @var string strToAddress
		 */
		protected $strToAddress;
		const ToAddressMaxLength = 255;
		const ToAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.from_address
		 * @var string strFromAddress
		 */
		protected $strFromAddress;
		const FromAddressMaxLength = 255;
		const FromAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.body
		 * @var string strBody
		 */
		protected $strBody;
		const BodyDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.html
		 * @var string strHtml
		 */
		protected $strHtml;
		const HtmlDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.high_priority_flag
		 * @var boolean blnHighPriorityFlag
		 */
		protected $blnHighPriorityFlag;
		const HighPriorityFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.error_flag
		 * @var boolean blnErrorFlag
		 */
		protected $blnErrorFlag;
		const ErrorFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column email_queue.error_message
		 * @var string strErrorMessage
		 */
		protected $strErrorMessage;
		const ErrorMessageMaxLength = 255;
		const ErrorMessageDefault = null;


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
		 * Load a EmailQueue from PK Info
		 * @param integer $intId
		 * @return EmailQueue
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return EmailQueue::QuerySingle(
				QQ::Equal(QQN::EmailQueue()->Id, $intId)
			);
		}

		/**
		 * Load all EmailQueues
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailQueue[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call EmailQueue::QueryArray to perform the LoadAll query
			try {
				return EmailQueue::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EmailQueues
		 * @return int
		 */
		public static function CountAll() {
			// Call EmailQueue::QueryCount to perform the CountAll query
			return EmailQueue::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = EmailQueue::GetDatabase();

			// Create/Build out the QueryBuilder object with EmailQueue-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'email_queue');
			EmailQueue::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('email_queue');

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
		 * Static Qcodo Query method to query for a single EmailQueue object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailQueue the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new EmailQueue object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailQueue::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of EmailQueue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailQueue[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailQueue::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = EmailQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of EmailQueue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EmailQueue::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'email_queue_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with EmailQueue-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				EmailQueue::GetSelectFields($objQueryBuilder);
				EmailQueue::GetFromFields($objQueryBuilder);

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
			return EmailQueue::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EmailQueue
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'email_queue';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'to_address', $strAliasPrefix . 'to_address');
			$objBuilder->AddSelectItem($strTableName, 'from_address', $strAliasPrefix . 'from_address');
			$objBuilder->AddSelectItem($strTableName, 'subject', $strAliasPrefix . 'subject');
			$objBuilder->AddSelectItem($strTableName, 'body', $strAliasPrefix . 'body');
			$objBuilder->AddSelectItem($strTableName, 'html', $strAliasPrefix . 'html');
			$objBuilder->AddSelectItem($strTableName, 'high_priority_flag', $strAliasPrefix . 'high_priority_flag');
			$objBuilder->AddSelectItem($strTableName, 'error_flag', $strAliasPrefix . 'error_flag');
			$objBuilder->AddSelectItem($strTableName, 'error_message', $strAliasPrefix . 'error_message');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EmailQueue from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EmailQueue::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EmailQueue
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the EmailQueue object
			$objToReturn = new EmailQueue();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_address'] : $strAliasPrefix . 'to_address';
			$objToReturn->strToAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'from_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'from_address'] : $strAliasPrefix . 'from_address';
			$objToReturn->strFromAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'subject'] : $strAliasPrefix . 'subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'body', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'body'] : $strAliasPrefix . 'body';
			$objToReturn->strBody = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'html', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'html'] : $strAliasPrefix . 'html';
			$objToReturn->strHtml = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'high_priority_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'high_priority_flag'] : $strAliasPrefix . 'high_priority_flag';
			$objToReturn->blnHighPriorityFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'error_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'error_flag'] : $strAliasPrefix . 'error_flag';
			$objToReturn->blnErrorFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'error_message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'error_message'] : $strAliasPrefix . 'error_message';
			$objToReturn->strErrorMessage = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'email_queue__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of EmailQueues from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EmailQueue[]
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
					$objItem = EmailQueue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EmailQueue::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single EmailQueue object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EmailQueue next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return EmailQueue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EmailQueue object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return EmailQueue
		*/
		public static function LoadById($intId) {
			return EmailQueue::QuerySingle(
				QQ::Equal(QQN::EmailQueue()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of EmailQueue objects,
		 * by HighPriorityFlag Index(es)
		 * @param boolean $blnHighPriorityFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailQueue[]
		*/
		public static function LoadArrayByHighPriorityFlag($blnHighPriorityFlag, $objOptionalClauses = null) {
			// Call EmailQueue::QueryArray to perform the LoadArrayByHighPriorityFlag query
			try {
				return EmailQueue::QueryArray(
					QQ::Equal(QQN::EmailQueue()->HighPriorityFlag, $blnHighPriorityFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailQueues
		 * by HighPriorityFlag Index(es)
		 * @param boolean $blnHighPriorityFlag
		 * @return int
		*/
		public static function CountByHighPriorityFlag($blnHighPriorityFlag) {
			// Call EmailQueue::QueryCount to perform the CountByHighPriorityFlag query
			return EmailQueue::QueryCount(
				QQ::Equal(QQN::EmailQueue()->HighPriorityFlag, $blnHighPriorityFlag)
			);
		}
			
		/**
		 * Load an array of EmailQueue objects,
		 * by ErrorFlag Index(es)
		 * @param boolean $blnErrorFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailQueue[]
		*/
		public static function LoadArrayByErrorFlag($blnErrorFlag, $objOptionalClauses = null) {
			// Call EmailQueue::QueryArray to perform the LoadArrayByErrorFlag query
			try {
				return EmailQueue::QueryArray(
					QQ::Equal(QQN::EmailQueue()->ErrorFlag, $blnErrorFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailQueues
		 * by ErrorFlag Index(es)
		 * @param boolean $blnErrorFlag
		 * @return int
		*/
		public static function CountByErrorFlag($blnErrorFlag) {
			// Call EmailQueue::QueryCount to perform the CountByErrorFlag query
			return EmailQueue::QueryCount(
				QQ::Equal(QQN::EmailQueue()->ErrorFlag, $blnErrorFlag)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this EmailQueue
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EmailQueue::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `email_queue` (
							`to_address`,
							`from_address`,
							`subject`,
							`body`,
							`html`,
							`high_priority_flag`,
							`error_flag`,
							`error_message`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strToAddress) . ',
							' . $objDatabase->SqlVariable($this->strFromAddress) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strBody) . ',
							' . $objDatabase->SqlVariable($this->strHtml) . ',
							' . $objDatabase->SqlVariable($this->blnHighPriorityFlag) . ',
							' . $objDatabase->SqlVariable($this->blnErrorFlag) . ',
							' . $objDatabase->SqlVariable($this->strErrorMessage) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('email_queue', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`email_queue`
						SET
							`to_address` = ' . $objDatabase->SqlVariable($this->strToAddress) . ',
							`from_address` = ' . $objDatabase->SqlVariable($this->strFromAddress) . ',
							`subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`body` = ' . $objDatabase->SqlVariable($this->strBody) . ',
							`html` = ' . $objDatabase->SqlVariable($this->strHtml) . ',
							`high_priority_flag` = ' . $objDatabase->SqlVariable($this->blnHighPriorityFlag) . ',
							`error_flag` = ' . $objDatabase->SqlVariable($this->blnErrorFlag) . ',
							`error_message` = ' . $objDatabase->SqlVariable($this->strErrorMessage) . '
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
		 * Delete this EmailQueue
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EmailQueue with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EmailQueue::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_queue`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all EmailQueues
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EmailQueue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_queue`');
		}

		/**
		 * Truncate email_queue table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EmailQueue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `email_queue`');
		}

		/**
		 * Reload this EmailQueue from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EmailQueue object.');

			// Reload the Object
			$objReloaded = EmailQueue::Load($this->intId);

			// Update $this's local variables to match
			$this->strToAddress = $objReloaded->strToAddress;
			$this->strFromAddress = $objReloaded->strFromAddress;
			$this->strSubject = $objReloaded->strSubject;
			$this->strBody = $objReloaded->strBody;
			$this->strHtml = $objReloaded->strHtml;
			$this->blnHighPriorityFlag = $objReloaded->blnHighPriorityFlag;
			$this->blnErrorFlag = $objReloaded->blnErrorFlag;
			$this->strErrorMessage = $objReloaded->strErrorMessage;
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
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'ToAddress':
					// Gets the value for strToAddress 
					// @return string
					return $this->strToAddress;

				case 'FromAddress':
					// Gets the value for strFromAddress 
					// @return string
					return $this->strFromAddress;

				case 'Subject':
					// Gets the value for strSubject 
					// @return string
					return $this->strSubject;

				case 'Body':
					// Gets the value for strBody 
					// @return string
					return $this->strBody;

				case 'Html':
					// Gets the value for strHtml 
					// @return string
					return $this->strHtml;

				case 'HighPriorityFlag':
					// Gets the value for blnHighPriorityFlag 
					// @return boolean
					return $this->blnHighPriorityFlag;

				case 'ErrorFlag':
					// Gets the value for blnErrorFlag 
					// @return boolean
					return $this->blnErrorFlag;

				case 'ErrorMessage':
					// Gets the value for strErrorMessage 
					// @return string
					return $this->strErrorMessage;


				///////////////////
				// Member Objects
				///////////////////

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
				case 'ToAddress':
					// Sets the value for strToAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FromAddress':
					// Sets the value for strFromAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFromAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Subject':
					// Sets the value for strSubject 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSubject = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Body':
					// Sets the value for strBody 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strBody = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Html':
					// Sets the value for strHtml 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strHtml = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HighPriorityFlag':
					// Sets the value for blnHighPriorityFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnHighPriorityFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ErrorFlag':
					// Sets the value for blnErrorFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnErrorFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ErrorMessage':
					// Sets the value for strErrorMessage 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strErrorMessage = QType::Cast($mixValue, QType::String));
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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="EmailQueue"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ToAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="FromAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="Body" type="xsd:string"/>';
			$strToReturn .= '<element name="Html" type="xsd:string"/>';
			$strToReturn .= '<element name="HighPriorityFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ErrorFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ErrorMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmailQueue', $strComplexTypeArray)) {
				$strComplexTypeArray['EmailQueue'] = EmailQueue::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EmailQueue::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EmailQueue();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ToAddress'))
				$objToReturn->strToAddress = $objSoapObject->ToAddress;
			if (property_exists($objSoapObject, 'FromAddress'))
				$objToReturn->strFromAddress = $objSoapObject->FromAddress;
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'Body'))
				$objToReturn->strBody = $objSoapObject->Body;
			if (property_exists($objSoapObject, 'Html'))
				$objToReturn->strHtml = $objSoapObject->Html;
			if (property_exists($objSoapObject, 'HighPriorityFlag'))
				$objToReturn->blnHighPriorityFlag = $objSoapObject->HighPriorityFlag;
			if (property_exists($objSoapObject, 'ErrorFlag'))
				$objToReturn->blnErrorFlag = $objSoapObject->ErrorFlag;
			if (property_exists($objSoapObject, 'ErrorMessage'))
				$objToReturn->strErrorMessage = $objSoapObject->ErrorMessage;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EmailQueue::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeEmailQueue extends QQNode {
		protected $strTableName = 'email_queue';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailQueue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ToAddress':
					return new QQNode('to_address', 'ToAddress', 'string', $this);
				case 'FromAddress':
					return new QQNode('from_address', 'FromAddress', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Body':
					return new QQNode('body', 'Body', 'string', $this);
				case 'Html':
					return new QQNode('html', 'Html', 'string', $this);
				case 'HighPriorityFlag':
					return new QQNode('high_priority_flag', 'HighPriorityFlag', 'boolean', $this);
				case 'ErrorFlag':
					return new QQNode('error_flag', 'ErrorFlag', 'boolean', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'string', $this);

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

	class QQReverseReferenceNodeEmailQueue extends QQReverseReferenceNode {
		protected $strTableName = 'email_queue';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailQueue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ToAddress':
					return new QQNode('to_address', 'ToAddress', 'string', $this);
				case 'FromAddress':
					return new QQNode('from_address', 'FromAddress', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Body':
					return new QQNode('body', 'Body', 'string', $this);
				case 'Html':
					return new QQNode('html', 'Html', 'string', $this);
				case 'HighPriorityFlag':
					return new QQNode('high_priority_flag', 'HighPriorityFlag', 'boolean', $this);
				case 'ErrorFlag':
					return new QQNode('error_flag', 'ErrorFlag', 'boolean', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'string', $this);

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