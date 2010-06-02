<?php
	/**
	 * The abstract IssueFieldValueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the IssueFieldValue subclass which
	 * extends this IssueFieldValueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueFieldValue class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $IssueId the value for intIssueId (Not Null)
	 * @property integer $IssueFieldId the value for intIssueFieldId (Not Null)
	 * @property integer $IssueFieldOptionId the value for intIssueFieldOptionId (Not Null)
	 * @property Issue $Issue the value for the Issue object referenced by intIssueId (Not Null)
	 * @property IssueField $IssueField the value for the IssueField object referenced by intIssueFieldId (Not Null)
	 * @property IssueFieldOption $IssueFieldOption the value for the IssueFieldOption object referenced by intIssueFieldOptionId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IssueFieldValueGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column issue_field_value.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_value.issue_id
		 * @var integer intIssueId
		 */
		protected $intIssueId;
		const IssueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_value.issue_field_id
		 * @var integer intIssueFieldId
		 */
		protected $intIssueFieldId;
		const IssueFieldIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_value.issue_field_option_id
		 * @var integer intIssueFieldOptionId
		 */
		protected $intIssueFieldOptionId;
		const IssueFieldOptionIdDefault = null;


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
		 * in the database column issue_field_value.issue_id.
		 *
		 * NOTE: Always use the Issue property getter to correctly retrieve this Issue object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Issue objIssue
		 */
		protected $objIssue;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column issue_field_value.issue_field_id.
		 *
		 * NOTE: Always use the IssueField property getter to correctly retrieve this IssueField object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var IssueField objIssueField
		 */
		protected $objIssueField;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column issue_field_value.issue_field_option_id.
		 *
		 * NOTE: Always use the IssueFieldOption property getter to correctly retrieve this IssueFieldOption object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var IssueFieldOption objIssueFieldOption
		 */
		protected $objIssueFieldOption;





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
		 * Load a IssueFieldValue from PK Info
		 * @param integer $intId
		 * @return IssueFieldValue
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return IssueFieldValue::QuerySingle(
				QQ::Equal(QQN::IssueFieldValue()->Id, $intId)
			);
		}

		/**
		 * Load all IssueFieldValues
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldValue[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call IssueFieldValue::QueryArray to perform the LoadAll query
			try {
				return IssueFieldValue::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all IssueFieldValues
		 * @return int
		 */
		public static function CountAll() {
			// Call IssueFieldValue::QueryCount to perform the CountAll query
			return IssueFieldValue::QueryCount(QQ::All());
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
			$objDatabase = IssueFieldValue::GetDatabase();

			// Create/Build out the QueryBuilder object with IssueFieldValue-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'issue_field_value');
			IssueFieldValue::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('issue_field_value');

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
		 * Static Qcodo Query method to query for a single IssueFieldValue object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueFieldValue the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new IssueFieldValue object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueFieldValue::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of IssueFieldValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueFieldValue[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueFieldValue::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = IssueFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of IssueFieldValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = IssueFieldValue::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'issue_field_value_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with IssueFieldValue-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				IssueFieldValue::GetSelectFields($objQueryBuilder);
				IssueFieldValue::GetFromFields($objQueryBuilder);

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
			return IssueFieldValue::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this IssueFieldValue
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'issue_field_value';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'issue_id', $strAliasPrefix . 'issue_id');
			$objBuilder->AddSelectItem($strTableName, 'issue_field_id', $strAliasPrefix . 'issue_field_id');
			$objBuilder->AddSelectItem($strTableName, 'issue_field_option_id', $strAliasPrefix . 'issue_field_option_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a IssueFieldValue from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this IssueFieldValue::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return IssueFieldValue
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the IssueFieldValue object
			$objToReturn = new IssueFieldValue();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_id'] : $strAliasPrefix . 'issue_id';
			$objToReturn->intIssueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_field_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_field_id'] : $strAliasPrefix . 'issue_field_id';
			$objToReturn->intIssueFieldId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_field_option_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_field_option_id'] : $strAliasPrefix . 'issue_field_option_id';
			$objToReturn->intIssueFieldOptionId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'issue_field_value__';

			// Check for Issue Early Binding
			$strAlias = $strAliasPrefix . 'issue_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssue = Issue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IssueField Early Binding
			$strAlias = $strAliasPrefix . 'issue_field_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssueField = IssueField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_field_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for IssueFieldOption Early Binding
			$strAlias = $strAliasPrefix . 'issue_field_option_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssueFieldOption = IssueFieldOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_field_option_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of IssueFieldValues from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return IssueFieldValue[]
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
					$objItem = IssueFieldValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = IssueFieldValue::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single IssueFieldValue object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return IssueFieldValue next row resulting from the query
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
			return IssueFieldValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single IssueFieldValue object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return IssueFieldValue
		*/
		public static function LoadById($intId) {
			return IssueFieldValue::QuerySingle(
				QQ::Equal(QQN::IssueFieldValue()->Id, $intId)
			);
		}
			
		/**
		 * Load a single IssueFieldValue object,
		 * by IssueId, IssueFieldId Index(es)
		 * @param integer $intIssueId
		 * @param integer $intIssueFieldId
		 * @return IssueFieldValue
		*/
		public static function LoadByIssueIdIssueFieldId($intIssueId, $intIssueFieldId) {
			return IssueFieldValue::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::IssueFieldValue()->IssueId, $intIssueId),
				QQ::Equal(QQN::IssueFieldValue()->IssueFieldId, $intIssueFieldId)
				)
			);
		}
			
		/**
		 * Load an array of IssueFieldValue objects,
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldValue[]
		*/
		public static function LoadArrayByIssueId($intIssueId, $objOptionalClauses = null) {
			// Call IssueFieldValue::QueryArray to perform the LoadArrayByIssueId query
			try {
				return IssueFieldValue::QueryArray(
					QQ::Equal(QQN::IssueFieldValue()->IssueId, $intIssueId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueFieldValues
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @return int
		*/
		public static function CountByIssueId($intIssueId) {
			// Call IssueFieldValue::QueryCount to perform the CountByIssueId query
			return IssueFieldValue::QueryCount(
				QQ::Equal(QQN::IssueFieldValue()->IssueId, $intIssueId)
			);
		}
			
		/**
		 * Load an array of IssueFieldValue objects,
		 * by IssueFieldId Index(es)
		 * @param integer $intIssueFieldId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldValue[]
		*/
		public static function LoadArrayByIssueFieldId($intIssueFieldId, $objOptionalClauses = null) {
			// Call IssueFieldValue::QueryArray to perform the LoadArrayByIssueFieldId query
			try {
				return IssueFieldValue::QueryArray(
					QQ::Equal(QQN::IssueFieldValue()->IssueFieldId, $intIssueFieldId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueFieldValues
		 * by IssueFieldId Index(es)
		 * @param integer $intIssueFieldId
		 * @return int
		*/
		public static function CountByIssueFieldId($intIssueFieldId) {
			// Call IssueFieldValue::QueryCount to perform the CountByIssueFieldId query
			return IssueFieldValue::QueryCount(
				QQ::Equal(QQN::IssueFieldValue()->IssueFieldId, $intIssueFieldId)
			);
		}
			
		/**
		 * Load an array of IssueFieldValue objects,
		 * by IssueFieldOptionId Index(es)
		 * @param integer $intIssueFieldOptionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldValue[]
		*/
		public static function LoadArrayByIssueFieldOptionId($intIssueFieldOptionId, $objOptionalClauses = null) {
			// Call IssueFieldValue::QueryArray to perform the LoadArrayByIssueFieldOptionId query
			try {
				return IssueFieldValue::QueryArray(
					QQ::Equal(QQN::IssueFieldValue()->IssueFieldOptionId, $intIssueFieldOptionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueFieldValues
		 * by IssueFieldOptionId Index(es)
		 * @param integer $intIssueFieldOptionId
		 * @return int
		*/
		public static function CountByIssueFieldOptionId($intIssueFieldOptionId) {
			// Call IssueFieldValue::QueryCount to perform the CountByIssueFieldOptionId query
			return IssueFieldValue::QueryCount(
				QQ::Equal(QQN::IssueFieldValue()->IssueFieldOptionId, $intIssueFieldOptionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this IssueFieldValue
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldValue::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `issue_field_value` (
							`issue_id`,
							`issue_field_id`,
							`issue_field_option_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIssueId) . ',
							' . $objDatabase->SqlVariable($this->intIssueFieldId) . ',
							' . $objDatabase->SqlVariable($this->intIssueFieldOptionId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('issue_field_value', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`issue_field_value`
						SET
							`issue_id` = ' . $objDatabase->SqlVariable($this->intIssueId) . ',
							`issue_field_id` = ' . $objDatabase->SqlVariable($this->intIssueFieldId) . ',
							`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intIssueFieldOptionId) . '
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
		 * Delete this IssueFieldValue
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this IssueFieldValue with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldValue::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all IssueFieldValues
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_value`');
		}

		/**
		 * Truncate issue_field_value table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `issue_field_value`');
		}

		/**
		 * Reload this IssueFieldValue from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved IssueFieldValue object.');

			// Reload the Object
			$objReloaded = IssueFieldValue::Load($this->intId);

			// Update $this's local variables to match
			$this->IssueId = $objReloaded->IssueId;
			$this->IssueFieldId = $objReloaded->IssueFieldId;
			$this->IssueFieldOptionId = $objReloaded->IssueFieldOptionId;
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

				case 'IssueFieldId':
					// Gets the value for intIssueFieldId (Not Null)
					// @return integer
					return $this->intIssueFieldId;

				case 'IssueFieldOptionId':
					// Gets the value for intIssueFieldOptionId (Not Null)
					// @return integer
					return $this->intIssueFieldOptionId;


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

				case 'IssueField':
					// Gets the value for the IssueField object referenced by intIssueFieldId (Not Null)
					// @return IssueField
					try {
						if ((!$this->objIssueField) && (!is_null($this->intIssueFieldId)))
							$this->objIssueField = IssueField::Load($this->intIssueFieldId);
						return $this->objIssueField;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IssueFieldOption':
					// Gets the value for the IssueFieldOption object referenced by intIssueFieldOptionId (Not Null)
					// @return IssueFieldOption
					try {
						if ((!$this->objIssueFieldOption) && (!is_null($this->intIssueFieldOptionId)))
							$this->objIssueFieldOption = IssueFieldOption::Load($this->intIssueFieldOptionId);
						return $this->objIssueFieldOption;
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

				case 'IssueFieldId':
					// Sets the value for intIssueFieldId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objIssueField = null;
						return ($this->intIssueFieldId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IssueFieldOptionId':
					// Sets the value for intIssueFieldOptionId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objIssueFieldOption = null;
						return ($this->intIssueFieldOptionId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved Issue for this IssueFieldValue');

						// Update Local Member Variables
						$this->objIssue = $mixValue;
						$this->intIssueId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IssueField':
					// Sets the value for the IssueField object referenced by intIssueFieldId (Not Null)
					// @param IssueField $mixValue
					// @return IssueField
					if (is_null($mixValue)) {
						$this->intIssueFieldId = null;
						$this->objIssueField = null;
						return null;
					} else {
						// Make sure $mixValue actually is a IssueField object
						try {
							$mixValue = QType::Cast($mixValue, 'IssueField');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED IssueField object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved IssueField for this IssueFieldValue');

						// Update Local Member Variables
						$this->objIssueField = $mixValue;
						$this->intIssueFieldId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'IssueFieldOption':
					// Sets the value for the IssueFieldOption object referenced by intIssueFieldOptionId (Not Null)
					// @param IssueFieldOption $mixValue
					// @return IssueFieldOption
					if (is_null($mixValue)) {
						$this->intIssueFieldOptionId = null;
						$this->objIssueFieldOption = null;
						return null;
					} else {
						// Make sure $mixValue actually is a IssueFieldOption object
						try {
							$mixValue = QType::Cast($mixValue, 'IssueFieldOption');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED IssueFieldOption object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved IssueFieldOption for this IssueFieldValue');

						// Update Local Member Variables
						$this->objIssueFieldOption = $mixValue;
						$this->intIssueFieldOptionId = $mixValue->Id;

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
			$strToReturn = '<complexType name="IssueFieldValue"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Issue" type="xsd1:Issue"/>';
			$strToReturn .= '<element name="IssueField" type="xsd1:IssueField"/>';
			$strToReturn .= '<element name="IssueFieldOption" type="xsd1:IssueFieldOption"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('IssueFieldValue', $strComplexTypeArray)) {
				$strComplexTypeArray['IssueFieldValue'] = IssueFieldValue::GetSoapComplexTypeXml();
				Issue::AlterSoapComplexTypeArray($strComplexTypeArray);
				IssueField::AlterSoapComplexTypeArray($strComplexTypeArray);
				IssueFieldOption::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, IssueFieldValue::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new IssueFieldValue();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Issue')) &&
				($objSoapObject->Issue))
				$objToReturn->Issue = Issue::GetObjectFromSoapObject($objSoapObject->Issue);
			if ((property_exists($objSoapObject, 'IssueField')) &&
				($objSoapObject->IssueField))
				$objToReturn->IssueField = IssueField::GetObjectFromSoapObject($objSoapObject->IssueField);
			if ((property_exists($objSoapObject, 'IssueFieldOption')) &&
				($objSoapObject->IssueFieldOption))
				$objToReturn->IssueFieldOption = IssueFieldOption::GetObjectFromSoapObject($objSoapObject->IssueFieldOption);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, IssueFieldValue::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIssue)
				$objObject->objIssue = Issue::GetSoapObjectFromObject($objObject->objIssue, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueId = null;
			if ($objObject->objIssueField)
				$objObject->objIssueField = IssueField::GetSoapObjectFromObject($objObject->objIssueField, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueFieldId = null;
			if ($objObject->objIssueFieldOption)
				$objObject->objIssueFieldOption = IssueFieldOption::GetSoapObjectFromObject($objObject->objIssueFieldOption, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueFieldOptionId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeIssueFieldValue extends QQNode {
		protected $strTableName = 'issue_field_value';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueFieldValue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'IssueFieldId':
					return new QQNode('issue_field_id', 'IssueFieldId', 'integer', $this);
				case 'IssueField':
					return new QQNodeIssueField('issue_field_id', 'IssueField', 'integer', $this);
				case 'IssueFieldOptionId':
					return new QQNode('issue_field_option_id', 'IssueFieldOptionId', 'integer', $this);
				case 'IssueFieldOption':
					return new QQNodeIssueFieldOption('issue_field_option_id', 'IssueFieldOption', 'integer', $this);

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

	class QQReverseReferenceNodeIssueFieldValue extends QQReverseReferenceNode {
		protected $strTableName = 'issue_field_value';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueFieldValue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'IssueFieldId':
					return new QQNode('issue_field_id', 'IssueFieldId', 'integer', $this);
				case 'IssueField':
					return new QQNodeIssueField('issue_field_id', 'IssueField', 'integer', $this);
				case 'IssueFieldOptionId':
					return new QQNode('issue_field_option_id', 'IssueFieldOptionId', 'integer', $this);
				case 'IssueFieldOption':
					return new QQNodeIssueFieldOption('issue_field_option_id', 'IssueFieldOption', 'integer', $this);

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