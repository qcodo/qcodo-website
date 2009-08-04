<?php
	/**
	 * The abstract IssueMessageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the IssueMessage subclass which
	 * extends this IssueMessageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueMessage class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IssueId the value for intIssueId (Not Null)
	 * @property integer $PersonId the value for intPersonId 
	 * @property string $Message the value for strMessage 
	 * @property integer $ReplyNumber the value for intReplyNumber 
	 * @property QDateTime $PostDate the value for dttPostDate (Not Null)
	 * @property Issue $Issue the value for the Issue object referenced by intIssueId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IssueMessageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column issue_message.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_message.issue_id
		 * @var integer intIssueId
		 */
		protected $intIssueId;
		const IssueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_message.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_message.message
		 * @var string strMessage
		 */
		protected $strMessage;
		const MessageDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_message.reply_number
		 * @var integer intReplyNumber
		 */
		protected $intReplyNumber;
		const ReplyNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_message.post_date
		 * @var QDateTime dttPostDate
		 */
		protected $dttPostDate;
		const PostDateDefault = null;


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
		 * in the database column issue_message.issue_id.
		 *
		 * NOTE: Always use the Issue property getter to correctly retrieve this Issue object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Issue objIssue
		 */
		protected $objIssue;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column issue_message.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;





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
		 * Load a IssueMessage from PK Info
		 * @param integer $intId
		 * @return IssueMessage
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return IssueMessage::QuerySingle(
				QQ::Equal(QQN::IssueMessage()->Id, $intId)
			);
		}

		/**
		 * Load all IssueMessages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueMessage[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call IssueMessage::QueryArray to perform the LoadAll query
			try {
				return IssueMessage::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all IssueMessages
		 * @return int
		 */
		public static function CountAll() {
			// Call IssueMessage::QueryCount to perform the CountAll query
			return IssueMessage::QueryCount(QQ::All());
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
			$objDatabase = IssueMessage::GetDatabase();

			// Create/Build out the QueryBuilder object with IssueMessage-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'issue_message');
			IssueMessage::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('issue_message');

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
		 * Static Qcodo Query method to query for a single IssueMessage object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueMessage the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new IssueMessage object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueMessage::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of IssueMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueMessage[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueMessage::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of IssueMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = IssueMessage::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'issue_message_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with IssueMessage-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				IssueMessage::GetSelectFields($objQueryBuilder);
				IssueMessage::GetFromFields($objQueryBuilder);

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
			return IssueMessage::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this IssueMessage
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'issue_message';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'issue_id', $strAliasPrefix . 'issue_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'message', $strAliasPrefix . 'message');
			$objBuilder->AddSelectItem($strTableName, 'reply_number', $strAliasPrefix . 'reply_number');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a IssueMessage from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this IssueMessage::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return IssueMessage
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the IssueMessage object
			$objToReturn = new IssueMessage();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_id'] : $strAliasPrefix . 'issue_id';
			$objToReturn->intIssueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message'] : $strAliasPrefix . 'message';
			$objToReturn->strMessage = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'reply_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reply_number'] : $strAliasPrefix . 'reply_number';
			$objToReturn->intReplyNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'post_date'] : $strAliasPrefix . 'post_date';
			$objToReturn->dttPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'issue_message__';

			// Check for Issue Early Binding
			$strAlias = $strAliasPrefix . 'issue_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssue = Issue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of IssueMessages from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return IssueMessage[]
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
					$objItem = IssueMessage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = IssueMessage::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single IssueMessage object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return IssueMessage
		*/
		public static function LoadById($intId) {
			return IssueMessage::QuerySingle(
				QQ::Equal(QQN::IssueMessage()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of IssueMessage objects,
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueMessage[]
		*/
		public static function LoadArrayByIssueId($intIssueId, $objOptionalClauses = null) {
			// Call IssueMessage::QueryArray to perform the LoadArrayByIssueId query
			try {
				return IssueMessage::QueryArray(
					QQ::Equal(QQN::IssueMessage()->IssueId, $intIssueId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueMessages
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @return int
		*/
		public static function CountByIssueId($intIssueId) {
			// Call IssueMessage::QueryCount to perform the CountByIssueId query
			return IssueMessage::QueryCount(
				QQ::Equal(QQN::IssueMessage()->IssueId, $intIssueId)
			);
		}
			
		/**
		 * Load an array of IssueMessage objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueMessage[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call IssueMessage::QueryArray to perform the LoadArrayByPersonId query
			try {
				return IssueMessage::QueryArray(
					QQ::Equal(QQN::IssueMessage()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueMessages
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call IssueMessage::QueryCount to perform the CountByPersonId query
			return IssueMessage::QueryCount(
				QQ::Equal(QQN::IssueMessage()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this IssueMessage
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = IssueMessage::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `issue_message` (
							`issue_id`,
							`person_id`,
							`message`,
							`reply_number`,
							`post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIssueId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->strMessage) . ',
							' . $objDatabase->SqlVariable($this->intReplyNumber) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('issue_message', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`issue_message`
						SET
							`issue_id` = ' . $objDatabase->SqlVariable($this->intIssueId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`message` = ' . $objDatabase->SqlVariable($this->strMessage) . ',
							`reply_number` = ' . $objDatabase->SqlVariable($this->intReplyNumber) . ',
							`post_date` = ' . $objDatabase->SqlVariable($this->dttPostDate) . '
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
		 * Delete this IssueMessage
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this IssueMessage with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = IssueMessage::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all IssueMessages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = IssueMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_message`');
		}

		/**
		 * Truncate issue_message table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = IssueMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `issue_message`');
		}

		/**
		 * Reload this IssueMessage from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved IssueMessage object.');

			// Reload the Object
			$objReloaded = IssueMessage::Load($this->intId);

			// Update $this's local variables to match
			$this->IssueId = $objReloaded->IssueId;
			$this->PersonId = $objReloaded->PersonId;
			$this->strMessage = $objReloaded->strMessage;
			$this->intReplyNumber = $objReloaded->intReplyNumber;
			$this->dttPostDate = $objReloaded->dttPostDate;
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

				case 'IssueId':
					/**
					 * Gets the value for intIssueId (Not Null)
					 * @return integer
					 */
					return $this->intIssueId;

				case 'PersonId':
					/**
					 * Gets the value for intPersonId 
					 * @return integer
					 */
					return $this->intPersonId;

				case 'Message':
					/**
					 * Gets the value for strMessage 
					 * @return string
					 */
					return $this->strMessage;

				case 'ReplyNumber':
					/**
					 * Gets the value for intReplyNumber 
					 * @return integer
					 */
					return $this->intReplyNumber;

				case 'PostDate':
					/**
					 * Gets the value for dttPostDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttPostDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Issue':
					/**
					 * Gets the value for the Issue object referenced by intIssueId (Not Null)
					 * @return Issue
					 */
					try {
						if ((!$this->objIssue) && (!is_null($this->intIssueId)))
							$this->objIssue = Issue::Load($this->intIssueId);
						return $this->objIssue;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Person':
					/**
					 * Gets the value for the Person object referenced by intPersonId 
					 * @return Person
					 */
					try {
						if ((!$this->objPerson) && (!is_null($this->intPersonId)))
							$this->objPerson = Person::Load($this->intPersonId);
						return $this->objPerson;
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
				case 'IssueId':
					/**
					 * Sets the value for intIssueId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIssue = null;
						return ($this->intIssueId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonId':
					/**
					 * Sets the value for intPersonId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Message':
					/**
					 * Sets the value for strMessage 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMessage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReplyNumber':
					/**
					 * Sets the value for intReplyNumber 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intReplyNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostDate':
					/**
					 * Sets the value for dttPostDate (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Issue':
					/**
					 * Sets the value for the Issue object referenced by intIssueId (Not Null)
					 * @param Issue $mixValue
					 * @return Issue
					 */
					if (is_null($mixValue)) {
						$this->intIssueId = null;
						$this->objIssue = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Issue object
						try {
							$mixValue = QType::Cast($mixValue, 'Issue');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Issue object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Issue for this IssueMessage');

						// Update Local Member Variables
						$this->objIssue = $mixValue;
						$this->intIssueId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Person':
					/**
					 * Sets the value for the Person object referenced by intPersonId 
					 * @param Person $mixValue
					 * @return Person
					 */
					if (is_null($mixValue)) {
						$this->intPersonId = null;
						$this->objPerson = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Person object
						try {
							$mixValue = QType::Cast($mixValue, 'Person');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Person object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Person for this IssueMessage');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

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
			$strToReturn = '<complexType name="IssueMessage"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Issue" type="xsd1:Issue"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="Message" type="xsd:string"/>';
			$strToReturn .= '<element name="ReplyNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('IssueMessage', $strComplexTypeArray)) {
				$strComplexTypeArray['IssueMessage'] = IssueMessage::GetSoapComplexTypeXml();
				Issue::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, IssueMessage::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new IssueMessage();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Issue')) &&
				($objSoapObject->Issue))
				$objToReturn->Issue = Issue::GetObjectFromSoapObject($objSoapObject->Issue);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'Message'))
				$objToReturn->strMessage = $objSoapObject->Message;
			if (property_exists($objSoapObject, 'ReplyNumber'))
				$objToReturn->intReplyNumber = $objSoapObject->ReplyNumber;
			if (property_exists($objSoapObject, 'PostDate'))
				$objToReturn->dttPostDate = new QDateTime($objSoapObject->PostDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, IssueMessage::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIssue)
				$objObject->objIssue = Issue::GetSoapObjectFromObject($objObject->objIssue, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->dttPostDate)
				$objObject->dttPostDate = $objObject->dttPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeIssueMessage extends QQNode {
		protected $strTableName = 'issue_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Message':
					return new QQNode('message', 'Message', 'string', $this);
				case 'ReplyNumber':
					return new QQNode('reply_number', 'ReplyNumber', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);

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

	class QQReverseReferenceNodeIssueMessage extends QQReverseReferenceNode {
		protected $strTableName = 'issue_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Message':
					return new QQNode('message', 'Message', 'string', $this);
				case 'ReplyNumber':
					return new QQNode('reply_number', 'ReplyNumber', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);

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