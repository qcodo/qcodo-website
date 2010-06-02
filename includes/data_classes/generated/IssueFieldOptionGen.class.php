<?php
	/**
	 * The abstract IssueFieldOptionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the IssueFieldOption subclass which
	 * extends this IssueFieldOptionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueFieldOption class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $IssueFieldId the value for intIssueFieldId (Not Null)
	 * @property string $Name the value for strName (Not Null)
	 * @property string $Token the value for strToken (Not Null)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property boolean $ActiveFlag the value for blnActiveFlag 
	 * @property IssueField $IssueField the value for the IssueField object referenced by intIssueFieldId (Not Null)
	 * @property IssueFieldValue $_IssueFieldValue the value for the private _objIssueFieldValue (Read-Only) if set due to an expansion on the issue_field_value.issue_field_option_id reverse relationship
	 * @property IssueFieldValue[] $_IssueFieldValueArray the value for the private _objIssueFieldValueArray (Read-Only) if set due to an ExpandAsArray on the issue_field_value.issue_field_option_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IssueFieldOptionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column issue_field_option.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_option.issue_field_id
		 * @var integer intIssueFieldId
		 */
		protected $intIssueFieldId;
		const IssueFieldIdDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_option.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_option.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 255;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_option.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column issue_field_option.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single IssueFieldValue object
		 * (of type IssueFieldValue), if this IssueFieldOption object was restored with
		 * an expansion on the issue_field_value association table.
		 * @var IssueFieldValue _objIssueFieldValue;
		 */
		private $_objIssueFieldValue;

		/**
		 * Private member variable that stores a reference to an array of IssueFieldValue objects
		 * (of type IssueFieldValue[]), if this IssueFieldOption object was restored with
		 * an ExpandAsArray on the issue_field_value association table.
		 * @var IssueFieldValue[] _objIssueFieldValueArray;
		 */
		private $_objIssueFieldValueArray = array();

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
		 * in the database column issue_field_option.issue_field_id.
		 *
		 * NOTE: Always use the IssueField property getter to correctly retrieve this IssueField object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var IssueField objIssueField
		 */
		protected $objIssueField;





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
		 * Load a IssueFieldOption from PK Info
		 * @param integer $intId
		 * @return IssueFieldOption
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return IssueFieldOption::QuerySingle(
				QQ::Equal(QQN::IssueFieldOption()->Id, $intId)
			);
		}

		/**
		 * Load all IssueFieldOptions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldOption[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call IssueFieldOption::QueryArray to perform the LoadAll query
			try {
				return IssueFieldOption::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all IssueFieldOptions
		 * @return int
		 */
		public static function CountAll() {
			// Call IssueFieldOption::QueryCount to perform the CountAll query
			return IssueFieldOption::QueryCount(QQ::All());
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
			$objDatabase = IssueFieldOption::GetDatabase();

			// Create/Build out the QueryBuilder object with IssueFieldOption-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'issue_field_option');
			IssueFieldOption::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('issue_field_option');

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
		 * Static Qcodo Query method to query for a single IssueFieldOption object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueFieldOption the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new IssueFieldOption object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueFieldOption::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of IssueFieldOption objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IssueFieldOption[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IssueFieldOption::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = IssueFieldOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of IssueFieldOption objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IssueFieldOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = IssueFieldOption::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'issue_field_option_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with IssueFieldOption-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				IssueFieldOption::GetSelectFields($objQueryBuilder);
				IssueFieldOption::GetFromFields($objQueryBuilder);

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
			return IssueFieldOption::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this IssueFieldOption
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'issue_field_option';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'issue_field_id', $strAliasPrefix . 'issue_field_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'order_number', $strAliasPrefix . 'order_number');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a IssueFieldOption from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this IssueFieldOption::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return IssueFieldOption
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'issue_field_option__';


				$strAlias = $strAliasPrefix . 'issuefieldvalue__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objIssueFieldValueArray)) {
						$objPreviousChildItem = $objPreviousItem->_objIssueFieldValueArray[$intPreviousChildItemCount - 1];
						$objChildItem = IssueFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issuefieldvalue__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objIssueFieldValueArray[] = $objChildItem;
					} else
						$objPreviousItem->_objIssueFieldValueArray[] = IssueFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issuefieldvalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'issue_field_option__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the IssueFieldOption object
			$objToReturn = new IssueFieldOption();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_field_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_field_id'] : $strAliasPrefix . 'issue_field_id';
			$objToReturn->intIssueFieldId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'order_number'] : $strAliasPrefix . 'order_number';
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'issue_field_option__';

			// Check for IssueField Early Binding
			$strAlias = $strAliasPrefix . 'issue_field_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssueField = IssueField::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_field_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for IssueFieldValue Virtual Binding
			$strAlias = $strAliasPrefix . 'issuefieldvalue__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objIssueFieldValueArray[] = IssueFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issuefieldvalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objIssueFieldValue = IssueFieldValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issuefieldvalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of IssueFieldOptions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return IssueFieldOption[]
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
					$objItem = IssueFieldOption::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = IssueFieldOption::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single IssueFieldOption object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return IssueFieldOption next row resulting from the query
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
			return IssueFieldOption::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single IssueFieldOption object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return IssueFieldOption
		*/
		public static function LoadById($intId) {
			return IssueFieldOption::QuerySingle(
				QQ::Equal(QQN::IssueFieldOption()->Id, $intId)
			);
		}
			
		/**
		 * Load a single IssueFieldOption object,
		 * by IssueFieldId, Token Index(es)
		 * @param integer $intIssueFieldId
		 * @param string $strToken
		 * @return IssueFieldOption
		*/
		public static function LoadByIssueFieldIdToken($intIssueFieldId, $strToken) {
			return IssueFieldOption::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::IssueFieldOption()->IssueFieldId, $intIssueFieldId),
				QQ::Equal(QQN::IssueFieldOption()->Token, $strToken)
				)
			);
		}
			
		/**
		 * Load an array of IssueFieldOption objects,
		 * by IssueFieldId Index(es)
		 * @param integer $intIssueFieldId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldOption[]
		*/
		public static function LoadArrayByIssueFieldId($intIssueFieldId, $objOptionalClauses = null) {
			// Call IssueFieldOption::QueryArray to perform the LoadArrayByIssueFieldId query
			try {
				return IssueFieldOption::QueryArray(
					QQ::Equal(QQN::IssueFieldOption()->IssueFieldId, $intIssueFieldId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueFieldOptions
		 * by IssueFieldId Index(es)
		 * @param integer $intIssueFieldId
		 * @return int
		*/
		public static function CountByIssueFieldId($intIssueFieldId) {
			// Call IssueFieldOption::QueryCount to perform the CountByIssueFieldId query
			return IssueFieldOption::QueryCount(
				QQ::Equal(QQN::IssueFieldOption()->IssueFieldId, $intIssueFieldId)
			);
		}
			
		/**
		 * Load an array of IssueFieldOption objects,
		 * by IssueFieldId, ActiveFlag Index(es)
		 * @param integer $intIssueFieldId
		 * @param boolean $blnActiveFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldOption[]
		*/
		public static function LoadArrayByIssueFieldIdActiveFlag($intIssueFieldId, $blnActiveFlag, $objOptionalClauses = null) {
			// Call IssueFieldOption::QueryArray to perform the LoadArrayByIssueFieldIdActiveFlag query
			try {
				return IssueFieldOption::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::IssueFieldOption()->IssueFieldId, $intIssueFieldId),
					QQ::Equal(QQN::IssueFieldOption()->ActiveFlag, $blnActiveFlag)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IssueFieldOptions
		 * by IssueFieldId, ActiveFlag Index(es)
		 * @param integer $intIssueFieldId
		 * @param boolean $blnActiveFlag
		 * @return int
		*/
		public static function CountByIssueFieldIdActiveFlag($intIssueFieldId, $blnActiveFlag) {
			// Call IssueFieldOption::QueryCount to perform the CountByIssueFieldIdActiveFlag query
			return IssueFieldOption::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::IssueFieldOption()->IssueFieldId, $intIssueFieldId),
				QQ::Equal(QQN::IssueFieldOption()->ActiveFlag, $blnActiveFlag)
				)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this IssueFieldOption
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `issue_field_option` (
							`issue_field_id`,
							`name`,
							`token`,
							`order_number`,
							`active_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIssueFieldId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('issue_field_option', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`issue_field_option`
						SET
							`issue_field_id` = ' . $objDatabase->SqlVariable($this->intIssueFieldId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
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
		 * Delete this IssueFieldOption
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this IssueFieldOption with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_option`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all IssueFieldOptions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_option`');
		}

		/**
		 * Truncate issue_field_option table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `issue_field_option`');
		}

		/**
		 * Reload this IssueFieldOption from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved IssueFieldOption object.');

			// Reload the Object
			$objReloaded = IssueFieldOption::Load($this->intId);

			// Update $this's local variables to match
			$this->IssueFieldId = $objReloaded->IssueFieldId;
			$this->strName = $objReloaded->strName;
			$this->strToken = $objReloaded->strToken;
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
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

				case 'IssueFieldId':
					// Gets the value for intIssueFieldId (Not Null)
					// @return integer
					return $this->intIssueFieldId;

				case 'Name':
					// Gets the value for strName (Not Null)
					// @return string
					return $this->strName;

				case 'Token':
					// Gets the value for strToken (Not Null)
					// @return string
					return $this->strToken;

				case 'OrderNumber':
					// Gets the value for intOrderNumber 
					// @return integer
					return $this->intOrderNumber;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag 
					// @return boolean
					return $this->blnActiveFlag;


				///////////////////
				// Member Objects
				///////////////////
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_IssueFieldValue':
					// Gets the value for the private _objIssueFieldValue (Read-Only)
					// if set due to an expansion on the issue_field_value.issue_field_option_id reverse relationship
					// @return IssueFieldValue
					return $this->_objIssueFieldValue;

				case '_IssueFieldValueArray':
					// Gets the value for the private _objIssueFieldValueArray (Read-Only)
					// if set due to an ExpandAsArray on the issue_field_value.issue_field_option_id reverse relationship
					// @return IssueFieldValue[]
					return (array) $this->_objIssueFieldValueArray;


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

				case 'Name':
					// Sets the value for strName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Token':
					// Sets the value for strToken (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderNumber':
					// Sets the value for intOrderNumber 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intOrderNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActiveFlag':
					// Sets the value for blnActiveFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnActiveFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved IssueField for this IssueFieldOption');

						// Update Local Member Variables
						$this->objIssueField = $mixValue;
						$this->intIssueFieldId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for IssueFieldValue
		//-------------------------------------------------------------------

		/**
		 * Gets all associated IssueFieldValues as an array of IssueFieldValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IssueFieldValue[]
		*/ 
		public function GetIssueFieldValueArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return IssueFieldValue::LoadArrayByIssueFieldOptionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated IssueFieldValues
		 * @return int
		*/ 
		public function CountIssueFieldValues() {
			if ((is_null($this->intId)))
				return 0;

			return IssueFieldValue::CountByIssueFieldOptionId($this->intId);
		}

		/**
		 * Associates a IssueFieldValue
		 * @param IssueFieldValue $objIssueFieldValue
		 * @return void
		*/ 
		public function AssociateIssueFieldValue(IssueFieldValue $objIssueFieldValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIssueFieldValue on this unsaved IssueFieldOption.');
			if ((is_null($objIssueFieldValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIssueFieldValue on this IssueFieldOption with an unsaved IssueFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`issue_field_value`
				SET
					`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIssueFieldValue->Id) . '
			');
		}

		/**
		 * Unassociates a IssueFieldValue
		 * @param IssueFieldValue $objIssueFieldValue
		 * @return void
		*/ 
		public function UnassociateIssueFieldValue(IssueFieldValue $objIssueFieldValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this unsaved IssueFieldOption.');
			if ((is_null($objIssueFieldValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this IssueFieldOption with an unsaved IssueFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`issue_field_value`
				SET
					`issue_field_option_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIssueFieldValue->Id) . ' AND
					`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all IssueFieldValues
		 * @return void
		*/ 
		public function UnassociateAllIssueFieldValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this unsaved IssueFieldOption.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`issue_field_value`
				SET
					`issue_field_option_id` = null
				WHERE
					`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated IssueFieldValue
		 * @param IssueFieldValue $objIssueFieldValue
		 * @return void
		*/ 
		public function DeleteAssociatedIssueFieldValue(IssueFieldValue $objIssueFieldValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this unsaved IssueFieldOption.');
			if ((is_null($objIssueFieldValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this IssueFieldOption with an unsaved IssueFieldValue.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIssueFieldValue->Id) . ' AND
					`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated IssueFieldValues
		 * @return void
		*/ 
		public function DeleteAllIssueFieldValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIssueFieldValue on this unsaved IssueFieldOption.');

			// Get the Database Object for this Class
			$objDatabase = IssueFieldOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`issue_field_value`
				WHERE
					`issue_field_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="IssueFieldOption"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IssueField" type="xsd1:IssueField"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('IssueFieldOption', $strComplexTypeArray)) {
				$strComplexTypeArray['IssueFieldOption'] = IssueFieldOption::GetSoapComplexTypeXml();
				IssueField::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, IssueFieldOption::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new IssueFieldOption();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'IssueField')) &&
				($objSoapObject->IssueField))
				$objToReturn->IssueField = IssueField::GetObjectFromSoapObject($objSoapObject->IssueField);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, 'OrderNumber'))
				$objToReturn->intOrderNumber = $objSoapObject->OrderNumber;
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, IssueFieldOption::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIssueField)
				$objObject->objIssueField = IssueField::GetSoapObjectFromObject($objObject->objIssueField, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueFieldId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeIssueFieldOption extends QQNode {
		protected $strTableName = 'issue_field_option';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueFieldOption';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueFieldId':
					return new QQNode('issue_field_id', 'IssueFieldId', 'integer', $this);
				case 'IssueField':
					return new QQNodeIssueField('issue_field_id', 'IssueField', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'IssueFieldValue':
					return new QQReverseReferenceNodeIssueFieldValue($this, 'issuefieldvalue', 'reverse_reference', 'issue_field_option_id');

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

	class QQReverseReferenceNodeIssueFieldOption extends QQReverseReferenceNode {
		protected $strTableName = 'issue_field_option';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IssueFieldOption';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IssueFieldId':
					return new QQNode('issue_field_id', 'IssueFieldId', 'integer', $this);
				case 'IssueField':
					return new QQNodeIssueField('issue_field_id', 'IssueField', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'IssueFieldValue':
					return new QQReverseReferenceNodeIssueFieldValue($this, 'issuefieldvalue', 'reverse_reference', 'issue_field_option_id');

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