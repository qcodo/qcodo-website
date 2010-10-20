<?php
	/**
	 * The abstract IssueVoteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the IssueVote subclass which
	 * extends this IssueVoteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueVote class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $IssueId the value for intIssueId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property QDateTime $VoteDate the value for dttVoteDate (Not Null)
	 * @property Issue $Issue the value for the Issue object referenced by intIssueId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IssueVoteGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column issue_vote.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_vote.issue_id
		 * @var integer intIssueId
		 */
		protected $intIssueId;
		const IssueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_vote.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_vote.vote_date
		 * @var QDateTime dttVoteDate
		 */
		protected $dttVoteDate;
		const VoteDateDefault = null;


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
		 * in the database column issue_vote.issue_id.
		 *
		 * NOTE: Always use the Issue property getter to correctly retrieve this Issue object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Issue objIssue
		 */
		protected $objIssue;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column issue_vote.person_id.
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
		 * Load a IssueVote from PK Info
		 * @param integer $intId
		 * @return IssueVote
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return IssueVote::QuerySingle(
				QQ::Equal(QQN::IssueVote()->Id, $intId)
			);
		}

		/**
		 * Load all IssueVotes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueVote[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call IssueVote::QueryArray to perform the LoadAll query
			try {
				return IssueVote::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all IssueVotes
		 * @return int
		 */
		public static function CountAll() {
			// Call IssueVote::QueryCount to perform the CountAll query
			return IssueVote::QueryCount(QQ::All());
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
			$objDatabase = IssueVote::GetDatabase();

			// Create/Build out the QueryBuilder object with IssueVote-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'issue_vote');
			IssueVote::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('issue_vote');

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
		 * Static Qcodo Query method to query for a single IssueVote object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueVote the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueVote::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new IssueVote object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = IssueVote::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return IssueVote::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of IssueVote objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueVote[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueVote::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueVote::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = IssueVote::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of IssueVote objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueVote::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = IssueVote::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'issue_vote_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with IssueVote-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				IssueVote::GetSelectFields($objQueryBuilder);
				IssueVote::GetFromFields($objQueryBuilder);

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
			return IssueVote::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this IssueVote
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'issue_vote';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'issue_id', $strAliasPrefix . 'issue_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'vote_date', $strAliasPrefix . 'vote_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a IssueVote from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this IssueVote::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return IssueVote
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the IssueVote object
			$objToReturn = new IssueVote();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_id'] : $strAliasPrefix . 'issue_id';
			$objToReturn->intIssueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'vote_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'vote_date'] : $strAliasPrefix . 'vote_date';
			$objToReturn->dttVoteDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'issue_vote__';

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
		 * Instantiate an array of IssueVotes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return IssueVote[]
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
					$objItem = IssueVote::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = IssueVote::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single IssueVote object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return IssueVote next row resulting from the query
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
			return IssueVote::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single IssueVote object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return IssueVote
		*/
		public static function LoadById($intId) {
			return IssueVote::QuerySingle(
				QQ::Equal(QQN::IssueVote()->Id, $intId)
			);
		}
			
		/**
		 * Load a single IssueVote object,
		 * by IssueId, PersonId Index(es)
		 * @param integer $intIssueId
		 * @param integer $intPersonId
		 * @return IssueVote
		*/
		public static function LoadByIssueIdPersonId($intIssueId, $intPersonId) {
			return IssueVote::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::IssueVote()->IssueId, $intIssueId),
				QQ::Equal(QQN::IssueVote()->PersonId, $intPersonId)
				)
			);
		}
			
		/**
		 * Load an array of IssueVote objects,
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueVote[]
		*/
		public static function LoadArrayByIssueId($intIssueId, $objOptionalClauses = null) {
			// Call IssueVote::QueryArray to perform the LoadArrayByIssueId query
			try {
				return IssueVote::QueryArray(
					QQ::Equal(QQN::IssueVote()->IssueId, $intIssueId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueVotes
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @return int
		*/
		public static function CountByIssueId($intIssueId) {
			// Call IssueVote::QueryCount to perform the CountByIssueId query
			return IssueVote::QueryCount(
				QQ::Equal(QQN::IssueVote()->IssueId, $intIssueId)
			);
		}
			
		/**
		 * Load an array of IssueVote objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueVote[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call IssueVote::QueryArray to perform the LoadArrayByPersonId query
			try {
				return IssueVote::QueryArray(
					QQ::Equal(QQN::IssueVote()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueVotes
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call IssueVote::QueryCount to perform the CountByPersonId query
			return IssueVote::QueryCount(
				QQ::Equal(QQN::IssueVote()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this IssueVote
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = IssueVote::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `issue_vote` (
							`issue_id`,
							`person_id`,
							`vote_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIssueId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttVoteDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('issue_vote', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`issue_vote`
						SET
							`issue_id` = ' . $objDatabase->SqlVariable($this->intIssueId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`vote_date` = ' . $objDatabase->SqlVariable($this->dttVoteDate) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
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
		 * Delete this IssueVote
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this IssueVote with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = IssueVote::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_vote`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all IssueVotes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = IssueVote::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_vote`');
		}

		/**
		 * Truncate issue_vote table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = IssueVote::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `issue_vote`');
		}

		/**
		 * Reload this IssueVote from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved IssueVote object.');

			// Reload the Object
			$objReloaded = IssueVote::Load($this->intId);

			// Update $this's local variables to match
			$this->IssueId = $objReloaded->IssueId;
			$this->PersonId = $objReloaded->PersonId;
			$this->dttVoteDate = $objReloaded->dttVoteDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = IssueVote::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `issue_vote` (
					`id`,
					`issue_id`,
					`person_id`,
					`vote_date`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intIssueId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->dttVoteDate) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return IssueVote[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = IssueVote::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM issue_vote WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return IssueVote::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return IssueVote[]
		 */
		public function GetJournal() {
			return IssueVote::GetJournalForId($this->intId);
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

				case 'IssueId':
					// Gets the value for intIssueId (Not Null)
					// @return integer
					return $this->intIssueId;

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'VoteDate':
					// Gets the value for dttVoteDate (Not Null)
					// @return QDateTime
					return $this->dttVoteDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Issue':
					// Gets the value for the Issue object referenced by intIssueId (Not Null)
					// @return Issue
					try {
						if ((!$this->objIssue) && (!is_null($this->intIssueId)))
							$this->objIssue = Issue::Load($this->intIssueId);
						return $this->objIssue;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Person':
					// Gets the value for the Person object referenced by intPersonId (Not Null)
					// @return Person
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
					// Sets the value for intIssueId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objIssue = null;
						return ($this->intIssueId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonId':
					// Sets the value for intPersonId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VoteDate':
					// Sets the value for dttVoteDate (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttVoteDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Issue':
					// Sets the value for the Issue object referenced by intIssueId (Not Null)
					// @param Issue $mixValue
					// @return Issue
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
							throw new QCallerException('Unable to set an unsaved Issue for this IssueVote');

						// Update Local Member Variables
						$this->objIssue = $mixValue;
						$this->intIssueId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Person':
					// Sets the value for the Person object referenced by intPersonId (Not Null)
					// @param Person $mixValue
					// @return Person
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
							throw new QCallerException('Unable to set an unsaved Person for this IssueVote');

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
			$strToReturn = '<complexType name="IssueVote"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Issue" type="xsd1:Issue"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="VoteDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('IssueVote', $strComplexTypeArray)) {
				$strComplexTypeArray['IssueVote'] = IssueVote::GetSoapComplexTypeXml();
				Issue::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, IssueVote::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new IssueVote();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Issue')) &&
				($objSoapObject->Issue))
				$objToReturn->Issue = Issue::GetObjectFromSoapObject($objSoapObject->Issue);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'VoteDate'))
				$objToReturn->dttVoteDate = new QDateTime($objSoapObject->VoteDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, IssueVote::GetSoapObjectFromObject($objObject, true));

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
			if ($objObject->dttVoteDate)
				$objObject->dttVoteDate = $objObject->dttVoteDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $IssueId
	 * @property-read QQNodeIssue $Issue
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $VoteDate
	 */
	class QQNodeIssueVote extends QQNode {
		protected $strTableName = 'issue_vote';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueVote';
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
				case 'VoteDate':
					return new QQNode('vote_date', 'VoteDate', 'QDateTime', $this);

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
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $IssueId
	 * @property-read QQNodeIssue $Issue
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $VoteDate
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeIssueVote extends QQReverseReferenceNode {
		protected $strTableName = 'issue_vote';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueVote';
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
				case 'VoteDate':
					return new QQNode('vote_date', 'VoteDate', 'QDateTime', $this);

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