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
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property string $Name the value for strName (Not Null)
	 * @property boolean $AnnounceOnlyFlag the value for blnAnnounceOnlyFlag 
	 * @property string $Description the value for strDescription 
	 * @property QDateTime $LastPostDate the value for dttLastPostDate 
	 * @property integer $MessageCount the value for intMessageCount 
	 * @property integer $TopicCount the value for intTopicCount 
	 * @property-read Message $_Message the value for the private _objMessage (Read-Only) if set due to an expansion on the message.forum_id reverse relationship
	 * @property-read Message[] $_MessageArray the value for the private _objMessageArray (Read-Only) if set due to an ExpandAsArray on the message.forum_id reverse relationship
	 * @property-read Topic $_Topic the value for the private _objTopic (Read-Only) if set due to an expansion on the topic.forum_id reverse relationship
	 * @property-read Topic[] $_TopicArray the value for the private _objTopicArray (Read-Only) if set due to an ExpandAsArray on the topic.forum_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
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
		 * Protected member variable that maps to the database column forum.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.message_count
		 * @var integer intMessageCount
		 */
		protected $intMessageCount;
		const MessageCountDefault = null;


		/**
		 * Protected member variable that maps to the database column forum.topic_count
		 * @var integer intTopicCount
		 */
		protected $intTopicCount;
		const TopicCountDefault = null;


		/**
		 * Private member variable that stores a reference to a single Message object
		 * (of type Message), if this Forum object was restored with
		 * an expansion on the message association table.
		 * @var Message _objMessage;
		 */
		private $_objMessage;

		/**
		 * Private member variable that stores a reference to an array of Message objects
		 * (of type Message[]), if this Forum object was restored with
		 * an ExpandAsArray on the message association table.
		 * @var Message[] _objMessageArray;
		 */
		private $_objMessageArray = array();

		/**
		 * Private member variable that stores a reference to a single Topic object
		 * (of type Topic), if this Forum object was restored with
		 * an expansion on the topic association table.
		 * @var Topic _objTopic;
		 */
		private $_objTopic;

		/**
		 * Private member variable that stores a reference to an array of Topic objects
		 * (of type Topic[]), if this Forum object was restored with
		 * an ExpandAsArray on the topic association table.
		 * @var Topic[] _objTopicArray;
		 */
		private $_objTopicArray = array();

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
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
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
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
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

			// Perform the Query, Get the First Row, and Instantiate a new Forum object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Forum::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Forum objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
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
		 * Static Qcodo Query method to query for a count of Forum objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
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
			$objBuilder->AddSelectItem($strTableName, 'last_post_date', $strAliasPrefix . 'last_post_date');
			$objBuilder->AddSelectItem($strTableName, 'message_count', $strAliasPrefix . 'message_count');
			$objBuilder->AddSelectItem($strTableName, 'topic_count', $strAliasPrefix . 'topic_count');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Forum from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Forum::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
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

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'forum__';


				$strAlias = $strAliasPrefix . 'message__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMessageArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMessageArray[$intPreviousChildItemCount - 1];
						$objChildItem = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMessageArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMessageArray[] = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'topic__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTopicArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTopicArray[$intPreviousChildItemCount - 1];
						$objChildItem = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTopicArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTopicArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'forum__')
					$strAliasPrefix = null;
			}

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
			$strAliasName = array_key_exists($strAliasPrefix . 'last_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_post_date'] : $strAliasPrefix . 'last_post_date';
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'message_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message_count'] : $strAliasPrefix . 'message_count';
			$objToReturn->intMessageCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'topic_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'topic_count'] : $strAliasPrefix . 'topic_count';
			$objToReturn->intTopicCount = $objDbRow->GetColumn($strAliasName, 'Integer');

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




			// Check for Message Virtual Binding
			$strAlias = $strAliasPrefix . 'message__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMessageArray[] = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMessage = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Topic Virtual Binding
			$strAlias = $strAliasPrefix . 'topic__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTopicArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTopic = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Forums from a Database Result
		 * @param DatabaseResultBase $objDbResult
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




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

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
							`description`,
							`last_post_date`,
							`message_count`,
							`topic_count`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->blnAnnounceOnlyFlag) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							' . $objDatabase->SqlVariable($this->intTopicCount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('forum', 'id');
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
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							`message_count` = ' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							`topic_count` = ' . $objDatabase->SqlVariable($this->intTopicCount) . '
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
		 * Delete this Forum
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Forum with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`forum`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
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
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
			$this->intMessageCount = $objReloaded->intMessageCount;
			$this->intTopicCount = $objReloaded->intTopicCount;
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

				case 'LastPostDate':
					/**
					 * Gets the value for dttLastPostDate 
					 * @return QDateTime
					 */
					return $this->dttLastPostDate;

				case 'MessageCount':
					/**
					 * Gets the value for intMessageCount 
					 * @return integer
					 */
					return $this->intMessageCount;

				case 'TopicCount':
					/**
					 * Gets the value for intTopicCount 
					 * @return integer
					 */
					return $this->intTopicCount;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Message':
					/**
					 * Gets the value for the private _objMessage (Read-Only)
					 * if set due to an expansion on the message.forum_id reverse relationship
					 * @return Message
					 */
					return $this->_objMessage;

				case '_MessageArray':
					/**
					 * Gets the value for the private _objMessageArray (Read-Only)
					 * if set due to an ExpandAsArray on the message.forum_id reverse relationship
					 * @return Message[]
					 */
					return (array) $this->_objMessageArray;

				case '_Topic':
					/**
					 * Gets the value for the private _objTopic (Read-Only)
					 * if set due to an expansion on the topic.forum_id reverse relationship
					 * @return Topic
					 */
					return $this->_objTopic;

				case '_TopicArray':
					/**
					 * Gets the value for the private _objTopicArray (Read-Only)
					 * if set due to an ExpandAsArray on the topic.forum_id reverse relationship
					 * @return Topic[]
					 */
					return (array) $this->_objTopicArray;


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

				case 'MessageCount':
					/**
					 * Sets the value for intMessageCount 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMessageCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TopicCount':
					/**
					 * Sets the value for intTopicCount 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTopicCount = QType::Cast($mixValue, QType::Integer));
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

			
		
		// Related Objects' Methods for Message
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Messages as an array of Message objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/ 
		public function GetMessageArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Message::LoadArrayByForumId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Messages
		 * @return int
		*/ 
		public function CountMessages() {
			if ((is_null($this->intId)))
				return 0;

			return Message::CountByForumId($this->intId);
		}

		/**
		 * Associates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function AssociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this unsaved Forum.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this Forum with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . '
			');
		}

		/**
		 * Unassociates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function UnassociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Forum.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Forum with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`forum_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Messages
		 * @return void
		*/ 
		public function UnassociateAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Forum.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`forum_id` = null
				WHERE
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function DeleteAssociatedMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Forum.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Forum with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Messages
		 * @return void
		*/ 
		public function DeleteAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Forum.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Topic
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Topics as an array of Topic objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/ 
		public function GetTopicArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Topic::LoadArrayByForumId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Topics
		 * @return int
		*/ 
		public function CountTopics() {
			if ((is_null($this->intId)))
				return 0;

			return Topic::CountByForumId($this->intId);
		}

		/**
		 * Associates a Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this unsaved Forum.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this Forum with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . '
			');
		}

		/**
		 * Unassociates a Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function UnassociateTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Forum.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this Forum with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`forum_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Topics
		 * @return void
		*/ 
		public function UnassociateAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Forum.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`forum_id` = null
				WHERE
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function DeleteAssociatedTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Forum.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this Forum with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Topics
		 * @return void
		*/ 
		public function DeleteAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Forum.');

			// Get the Database Object for this Class
			$objDatabase = Forum::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`forum_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





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
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MessageCount" type="xsd:int"/>';
			$strToReturn .= '<element name="TopicCount" type="xsd:int"/>';
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
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if (property_exists($objSoapObject, 'MessageCount'))
				$objToReturn->intMessageCount = $objSoapObject->MessageCount;
			if (property_exists($objSoapObject, 'TopicCount'))
				$objToReturn->intTopicCount = $objSoapObject->TopicCount;
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
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

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
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'TopicCount':
					return new QQNode('topic_count', 'TopicCount', 'integer', $this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'forum_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'forum_id');

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
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'TopicCount':
					return new QQNode('topic_count', 'TopicCount', 'integer', $this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'forum_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'forum_id');

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