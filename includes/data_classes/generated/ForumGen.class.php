<?php
	/**
	 * The abstract ForumGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Forum subclass which
	 * extends this ForumGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Forum class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property string $Name the value for strName (Not Null)
	 * @property boolean $AnnounceOnlyFlag the value for blnAnnounceOnlyFlag 
	 * @property string $Description the value for strDescription 
	 * @property TopicLink $TopicLink the value for the TopicLink object that uniquely references this Forum
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ForumGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column forum.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.announce_only_flag
		 * @var boolean blnAnnounceOnlyFlag
		 */
		protected $blnAnnounceOnlyFlag;
		const AnnounceOnlyFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 200;
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
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column topic_link.forum_id.
		 *
		 * NOTE: Always use the TopicLink property getter to correctly retrieve this TopicLink object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TopicLink objTopicLink
		 */
		protected $objTopicLink;
		
		/**
		 * Used internally to manage whether the adjoined TopicLink object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyTopicLink;





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
		 * Load a Forum from PK Info
		 * @param integer $intId
		 * @return Forum
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Forum::QuerySingle(
				QQ::Equal(QQN::Forum()->Id, $intId)
			);
		}

		/**
		 * Load all Forums
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Forum[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Forum::QueryArray to perform the LoadAll query
			try {
				return Forum::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Forums
		 * @return int
		 */
		public static function CountAll() {
			// Call Forum::QueryCount to perform the CountAll query
			return Forum::QueryCount(QQ::All());
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
			$objDatabase = Forum::GetDatabase();

			// Create/Build out the QueryBuilder object with Forum-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'forum');
			Forum::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('forum');

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
		 * Static Qcodo Query method to query for a single Forum object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Forum the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Forum::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Forum object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Forum::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Forum::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Forum objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Forum[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Forum::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Forum::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Forum::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Forum objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Forum::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Forum::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'forum_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Forum-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Forum::GetSelectFields($objQueryBuilder);
				Forum::GetFromFields($objQueryBuilder);

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
			return Forum::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Forum
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'forum';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'order_number', $strAliasPrefix . 'order_number');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'announce_only_flag', $strAliasPrefix . 'announce_only_flag');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Forum from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Forum::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Forum
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Forum object
			$objToReturn = new Forum();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'order_number'] : $strAliasPrefix . 'order_number';
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'announce_only_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'announce_only_flag'] : $strAliasPrefix . 'announce_only_flag';
			$objToReturn->blnAnnounceOnlyFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'forum__';


			// Check for TopicLink Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'topiclink__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objTopicLink = TopicLink::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topiclink__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objTopicLink = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of Forums from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Forum[]
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
					$objItem = Forum::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Forum::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Forum object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Forum next row resulting from the query
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
			return Forum::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Forum object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Forum
		*/
		public static function LoadById($intId) {
			return Forum::QuerySingle(
				QQ::Equal(QQN::Forum()->Id, $intId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Forum
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `forum` (
							`order_number`,
							`name`,
							`announce_only_flag`,
							`description`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('forum', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`forum`
						SET
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`announce_only_flag` = ' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined TopicLink object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyTopicLink) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = TopicLink::LoadByForumId($this->intId)) {
						$objAssociated->ForumId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objTopicLink) {
						$this->objTopicLink->ForumId = $this->intId;
						$this->objTopicLink->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyTopicLink = false;
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
		 * Delete this Forum
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Forum with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			
			
			// Update the adjoined TopicLink object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = TopicLink::LoadByForumId($this->intId)) {
				$objAssociated->ForumId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`forum`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Forums
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`forum`');
		}

		/**
		 * Truncate forum table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `forum`');
		}

		/**
		 * Reload this Forum from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Forum object.');

			// Reload the Object
			$objReloaded = Forum::Load($this->intId);

			// Update $this's local variables to match
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->strName = $objReloaded->strName;
			$this->blnAnnounceOnlyFlag = $objReloaded->blnAnnounceOnlyFlag;
			$this->strDescription = $objReloaded->strDescription;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Forum::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `forum` (
					`id`,
					`order_number`,
					`name`,
					`announce_only_flag`,
					`description`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
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
		 * @return Forum[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Forum::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM forum WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Forum::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Forum[]
		 */
		public function GetJournal() {
			return Forum::GetJournalForId($this->intId);
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

				case 'OrderNumber':
					// Gets the value for intOrderNumber 
					// @return integer
					return $this->intOrderNumber;

				case 'Name':
					// Gets the value for strName (Not Null)
					// @return string
					return $this->strName;

				case 'AnnounceOnlyFlag':
					// Gets the value for blnAnnounceOnlyFlag 
					// @return boolean
					return $this->blnAnnounceOnlyFlag;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;


				///////////////////
				// Member Objects
				///////////////////
		
		
				case 'TopicLink':
					// Gets the value for the TopicLink object that uniquely references this Forum
					// by objTopicLink (Unique)
					// @return TopicLink
					try {
						if ($this->objTopicLink === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objTopicLink)
							$this->objTopicLink = TopicLink::LoadByForumId($this->intId);
						return $this->objTopicLink;
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

				case 'AnnounceOnlyFlag':
					// Sets the value for blnAnnounceOnlyFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAnnounceOnlyFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'TopicLink':
					// Sets the value for the TopicLink object referenced by objTopicLink (Unique)
					// @param TopicLink $mixValue
					// @return TopicLink
					if (is_null($mixValue)) {
						$this->objTopicLink = null;

						// Make sure we update the adjoined TopicLink object the next time we call Save()
						$this->blnDirtyTopicLink = true;

						return null;
					} else {
						// Make sure $mixValue actually is a TopicLink object
						try {
							$mixValue = QType::Cast($mixValue, 'TopicLink');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objTopicLink to a DIFFERENT $mixValue?
						if ((!$this->TopicLink) || ($this->TopicLink->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined TopicLink object the next time we call Save()
							$this->blnDirtyTopicLink = true;

							// Update Local Member Variable
							$this->objTopicLink = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			$strToReturn = '<complexType name="Forum"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="AnnounceOnlyFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Forum', $strComplexTypeArray)) {
				$strComplexTypeArray['Forum'] = Forum::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Forum::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Forum();
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
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Forum::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $Name
	 * @property-read QQNode $AnnounceOnlyFlag
	 * @property-read QQNode $Description
	 * @property-read QQReverseReferenceNodeTopicLink $TopicLink
	 */
	class QQNodeForum extends QQNode {
		protected $strTableName = 'forum';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Forum';
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
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'forum_id', 'TopicLink');

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
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $Name
	 * @property-read QQNode $AnnounceOnlyFlag
	 * @property-read QQNode $Description
	 * @property-read QQReverseReferenceNodeTopicLink $TopicLink
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeForum extends QQReverseReferenceNode {
		protected $strTableName = 'forum';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Forum';
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
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'forum_id', 'TopicLink');

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