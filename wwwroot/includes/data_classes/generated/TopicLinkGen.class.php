<?php
	/**
	 * The abstract TopicLinkGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TopicLink subclass which
	 * extends this TopicLinkGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TopicLink class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $TopicLinkTypeId the value for intTopicLinkTypeId (Not Null)
	 * @property integer $TopicCount the value for intTopicCount 
	 * @property integer $MessageCount the value for intMessageCount 
	 * @property QDateTime $LastPostDate the value for dttLastPostDate 
	 * @property integer $ForumId the value for intForumId (Unique)
	 * @property integer $IssueId the value for intIssueId (Unique)
	 * @property integer $WikiItemId the value for intWikiItemId (Unique)
	 * @property integer $PackageId the value for intPackageId (Unique)
	 * @property Forum $Forum the value for the Forum object referenced by intForumId (Unique)
	 * @property Issue $Issue the value for the Issue object referenced by intIssueId (Unique)
	 * @property WikiItem $WikiItem the value for the WikiItem object referenced by intWikiItemId (Unique)
	 * @property Package $Package the value for the Package object referenced by intPackageId (Unique)
	 * @property-read Message $_Message the value for the private _objMessage (Read-Only) if set due to an expansion on the message.topic_link_id reverse relationship
	 * @property-read Message[] $_MessageArray the value for the private _objMessageArray (Read-Only) if set due to an ExpandAsArray on the message.topic_link_id reverse relationship
	 * @property-read Topic $_Topic the value for the private _objTopic (Read-Only) if set due to an expansion on the topic.topic_link_id reverse relationship
	 * @property-read Topic[] $_TopicArray the value for the private _objTopicArray (Read-Only) if set due to an ExpandAsArray on the topic.topic_link_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TopicLinkGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column topic_link.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.topic_link_type_id
		 * @var integer intTopicLinkTypeId
		 */
		protected $intTopicLinkTypeId;
		const TopicLinkTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.topic_count
		 * @var integer intTopicCount
		 */
		protected $intTopicCount;
		const TopicCountDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.message_count
		 * @var integer intMessageCount
		 */
		protected $intMessageCount;
		const MessageCountDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.forum_id
		 * @var integer intForumId
		 */
		protected $intForumId;
		const ForumIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.issue_id
		 * @var integer intIssueId
		 */
		protected $intIssueId;
		const IssueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.wiki_item_id
		 * @var integer intWikiItemId
		 */
		protected $intWikiItemId;
		const WikiItemIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic_link.package_id
		 * @var integer intPackageId
		 */
		protected $intPackageId;
		const PackageIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Message object
		 * (of type Message), if this TopicLink object was restored with
		 * an expansion on the message association table.
		 * @var Message _objMessage;
		 */
		private $_objMessage;

		/**
		 * Private member variable that stores a reference to an array of Message objects
		 * (of type Message[]), if this TopicLink object was restored with
		 * an ExpandAsArray on the message association table.
		 * @var Message[] _objMessageArray;
		 */
		private $_objMessageArray = array();

		/**
		 * Private member variable that stores a reference to a single Topic object
		 * (of type Topic), if this TopicLink object was restored with
		 * an expansion on the topic association table.
		 * @var Topic _objTopic;
		 */
		private $_objTopic;

		/**
		 * Private member variable that stores a reference to an array of Topic objects
		 * (of type Topic[]), if this TopicLink object was restored with
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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column topic_link.forum_id.
		 *
		 * NOTE: Always use the Forum property getter to correctly retrieve this Forum object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Forum objForum
		 */
		protected $objForum;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column topic_link.issue_id.
		 *
		 * NOTE: Always use the Issue property getter to correctly retrieve this Issue object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Issue objIssue
		 */
		protected $objIssue;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column topic_link.wiki_item_id.
		 *
		 * NOTE: Always use the WikiItem property getter to correctly retrieve this WikiItem object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiItem objWikiItem
		 */
		protected $objWikiItem;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column topic_link.package_id.
		 *
		 * NOTE: Always use the Package property getter to correctly retrieve this Package object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Package objPackage
		 */
		protected $objPackage;





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
		 * Load a TopicLink from PK Info
		 * @param integer $intId
		 * @return TopicLink
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->Id, $intId)
			);
		}

		/**
		 * Load all TopicLinks
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TopicLink[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call TopicLink::QueryArray to perform the LoadAll query
			try {
				return TopicLink::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TopicLinks
		 * @return int
		 */
		public static function CountAll() {
			// Call TopicLink::QueryCount to perform the CountAll query
			return TopicLink::QueryCount(QQ::All());
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
			$objDatabase = TopicLink::GetDatabase();

			// Create/Build out the QueryBuilder object with TopicLink-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'topic_link');
			TopicLink::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('topic_link');

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
		 * Static Qcodo Query method to query for a single TopicLink object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TopicLink the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TopicLink::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TopicLink object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TopicLink::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of TopicLink objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TopicLink[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TopicLink::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TopicLink::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of TopicLink objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TopicLink::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TopicLink::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'topic_link_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with TopicLink-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				TopicLink::GetSelectFields($objQueryBuilder);
				TopicLink::GetFromFields($objQueryBuilder);

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
			return TopicLink::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TopicLink
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'topic_link';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'topic_link_type_id', $strAliasPrefix . 'topic_link_type_id');
			$objBuilder->AddSelectItem($strTableName, 'topic_count', $strAliasPrefix . 'topic_count');
			$objBuilder->AddSelectItem($strTableName, 'message_count', $strAliasPrefix . 'message_count');
			$objBuilder->AddSelectItem($strTableName, 'last_post_date', $strAliasPrefix . 'last_post_date');
			$objBuilder->AddSelectItem($strTableName, 'forum_id', $strAliasPrefix . 'forum_id');
			$objBuilder->AddSelectItem($strTableName, 'issue_id', $strAliasPrefix . 'issue_id');
			$objBuilder->AddSelectItem($strTableName, 'wiki_item_id', $strAliasPrefix . 'wiki_item_id');
			$objBuilder->AddSelectItem($strTableName, 'package_id', $strAliasPrefix . 'package_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a TopicLink from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TopicLink::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return TopicLink
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
					$strAliasPrefix = 'topic_link__';


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
				else if ($strAliasPrefix == 'topic_link__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the TopicLink object
			$objToReturn = new TopicLink();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'topic_link_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'topic_link_type_id'] : $strAliasPrefix . 'topic_link_type_id';
			$objToReturn->intTopicLinkTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'topic_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'topic_count'] : $strAliasPrefix . 'topic_count';
			$objToReturn->intTopicCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'message_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message_count'] : $strAliasPrefix . 'message_count';
			$objToReturn->intMessageCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_post_date'] : $strAliasPrefix . 'last_post_date';
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'forum_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'forum_id'] : $strAliasPrefix . 'forum_id';
			$objToReturn->intForumId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'issue_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'issue_id'] : $strAliasPrefix . 'issue_id';
			$objToReturn->intIssueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'wiki_item_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'wiki_item_id'] : $strAliasPrefix . 'wiki_item_id';
			$objToReturn->intWikiItemId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'package_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'package_id'] : $strAliasPrefix . 'package_id';
			$objToReturn->intPackageId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'topic_link__';

			// Check for Forum Early Binding
			$strAlias = $strAliasPrefix . 'forum_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objForum = Forum::InstantiateDbRow($objDbRow, $strAliasPrefix . 'forum_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Issue Early Binding
			$strAlias = $strAliasPrefix . 'issue_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIssue = Issue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'issue_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for WikiItem Early Binding
			$strAlias = $strAliasPrefix . 'wiki_item_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWikiItem = WikiItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wiki_item_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Package Early Binding
			$strAlias = $strAliasPrefix . 'package_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPackage = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
		 * Instantiate an array of TopicLinks from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return TopicLink[]
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
					$objItem = TopicLink::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TopicLink::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single TopicLink object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return TopicLink
		*/
		public static function LoadById($intId) {
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->Id, $intId)
			);
		}
			
		/**
		 * Load a single TopicLink object,
		 * by ForumId Index(es)
		 * @param integer $intForumId
		 * @return TopicLink
		*/
		public static function LoadByForumId($intForumId) {
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->ForumId, $intForumId)
			);
		}
			
		/**
		 * Load a single TopicLink object,
		 * by IssueId Index(es)
		 * @param integer $intIssueId
		 * @return TopicLink
		*/
		public static function LoadByIssueId($intIssueId) {
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->IssueId, $intIssueId)
			);
		}
			
		/**
		 * Load a single TopicLink object,
		 * by WikiItemId Index(es)
		 * @param integer $intWikiItemId
		 * @return TopicLink
		*/
		public static function LoadByWikiItemId($intWikiItemId) {
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->WikiItemId, $intWikiItemId)
			);
		}
			
		/**
		 * Load a single TopicLink object,
		 * by PackageId Index(es)
		 * @param integer $intPackageId
		 * @return TopicLink
		*/
		public static function LoadByPackageId($intPackageId) {
			return TopicLink::QuerySingle(
				QQ::Equal(QQN::TopicLink()->PackageId, $intPackageId)
			);
		}
			
		/**
		 * Load an array of TopicLink objects,
		 * by TopicLinkTypeId Index(es)
		 * @param integer $intTopicLinkTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TopicLink[]
		*/
		public static function LoadArrayByTopicLinkTypeId($intTopicLinkTypeId, $objOptionalClauses = null) {
			// Call TopicLink::QueryArray to perform the LoadArrayByTopicLinkTypeId query
			try {
				return TopicLink::QueryArray(
					QQ::Equal(QQN::TopicLink()->TopicLinkTypeId, $intTopicLinkTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TopicLinks
		 * by TopicLinkTypeId Index(es)
		 * @param integer $intTopicLinkTypeId
		 * @return int
		*/
		public static function CountByTopicLinkTypeId($intTopicLinkTypeId) {
			// Call TopicLink::QueryCount to perform the CountByTopicLinkTypeId query
			return TopicLink::QueryCount(
				QQ::Equal(QQN::TopicLink()->TopicLinkTypeId, $intTopicLinkTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this TopicLink
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `topic_link` (
							`topic_link_type_id`,
							`topic_count`,
							`message_count`,
							`last_post_date`,
							`forum_id`,
							`issue_id`,
							`wiki_item_id`,
							`package_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intTopicLinkTypeId) . ',
							' . $objDatabase->SqlVariable($this->intTopicCount) . ',
							' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							' . $objDatabase->SqlVariable($this->intForumId) . ',
							' . $objDatabase->SqlVariable($this->intIssueId) . ',
							' . $objDatabase->SqlVariable($this->intWikiItemId) . ',
							' . $objDatabase->SqlVariable($this->intPackageId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('topic_link', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`topic_link`
						SET
							`topic_link_type_id` = ' . $objDatabase->SqlVariable($this->intTopicLinkTypeId) . ',
							`topic_count` = ' . $objDatabase->SqlVariable($this->intTopicCount) . ',
							`message_count` = ' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							`forum_id` = ' . $objDatabase->SqlVariable($this->intForumId) . ',
							`issue_id` = ' . $objDatabase->SqlVariable($this->intIssueId) . ',
							`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intWikiItemId) . ',
							`package_id` = ' . $objDatabase->SqlVariable($this->intPackageId) . '
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
		 * Delete this TopicLink
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TopicLink with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic_link`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all TopicLinks
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic_link`');
		}

		/**
		 * Truncate topic_link table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `topic_link`');
		}

		/**
		 * Reload this TopicLink from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TopicLink object.');

			// Reload the Object
			$objReloaded = TopicLink::Load($this->intId);

			// Update $this's local variables to match
			$this->TopicLinkTypeId = $objReloaded->TopicLinkTypeId;
			$this->intTopicCount = $objReloaded->intTopicCount;
			$this->intMessageCount = $objReloaded->intMessageCount;
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
			$this->ForumId = $objReloaded->ForumId;
			$this->IssueId = $objReloaded->IssueId;
			$this->WikiItemId = $objReloaded->WikiItemId;
			$this->PackageId = $objReloaded->PackageId;
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

				case 'TopicLinkTypeId':
					/**
					 * Gets the value for intTopicLinkTypeId (Not Null)
					 * @return integer
					 */
					return $this->intTopicLinkTypeId;

				case 'TopicCount':
					/**
					 * Gets the value for intTopicCount 
					 * @return integer
					 */
					return $this->intTopicCount;

				case 'MessageCount':
					/**
					 * Gets the value for intMessageCount 
					 * @return integer
					 */
					return $this->intMessageCount;

				case 'LastPostDate':
					/**
					 * Gets the value for dttLastPostDate 
					 * @return QDateTime
					 */
					return $this->dttLastPostDate;

				case 'ForumId':
					/**
					 * Gets the value for intForumId (Unique)
					 * @return integer
					 */
					return $this->intForumId;

				case 'IssueId':
					/**
					 * Gets the value for intIssueId (Unique)
					 * @return integer
					 */
					return $this->intIssueId;

				case 'WikiItemId':
					/**
					 * Gets the value for intWikiItemId (Unique)
					 * @return integer
					 */
					return $this->intWikiItemId;

				case 'PackageId':
					/**
					 * Gets the value for intPackageId (Unique)
					 * @return integer
					 */
					return $this->intPackageId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Forum':
					/**
					 * Gets the value for the Forum object referenced by intForumId (Unique)
					 * @return Forum
					 */
					try {
						if ((!$this->objForum) && (!is_null($this->intForumId)))
							$this->objForum = Forum::Load($this->intForumId);
						return $this->objForum;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Issue':
					/**
					 * Gets the value for the Issue object referenced by intIssueId (Unique)
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

				case 'WikiItem':
					/**
					 * Gets the value for the WikiItem object referenced by intWikiItemId (Unique)
					 * @return WikiItem
					 */
					try {
						if ((!$this->objWikiItem) && (!is_null($this->intWikiItemId)))
							$this->objWikiItem = WikiItem::Load($this->intWikiItemId);
						return $this->objWikiItem;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Package':
					/**
					 * Gets the value for the Package object referenced by intPackageId (Unique)
					 * @return Package
					 */
					try {
						if ((!$this->objPackage) && (!is_null($this->intPackageId)))
							$this->objPackage = Package::Load($this->intPackageId);
						return $this->objPackage;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Message':
					/**
					 * Gets the value for the private _objMessage (Read-Only)
					 * if set due to an expansion on the message.topic_link_id reverse relationship
					 * @return Message
					 */
					return $this->_objMessage;

				case '_MessageArray':
					/**
					 * Gets the value for the private _objMessageArray (Read-Only)
					 * if set due to an ExpandAsArray on the message.topic_link_id reverse relationship
					 * @return Message[]
					 */
					return (array) $this->_objMessageArray;

				case '_Topic':
					/**
					 * Gets the value for the private _objTopic (Read-Only)
					 * if set due to an expansion on the topic.topic_link_id reverse relationship
					 * @return Topic
					 */
					return $this->_objTopic;

				case '_TopicArray':
					/**
					 * Gets the value for the private _objTopicArray (Read-Only)
					 * if set due to an ExpandAsArray on the topic.topic_link_id reverse relationship
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
				case 'TopicLinkTypeId':
					/**
					 * Sets the value for intTopicLinkTypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTopicLinkTypeId = QType::Cast($mixValue, QType::Integer));
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

				case 'ForumId':
					/**
					 * Sets the value for intForumId (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objForum = null;
						return ($this->intForumId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IssueId':
					/**
					 * Sets the value for intIssueId (Unique)
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

				case 'WikiItemId':
					/**
					 * Sets the value for intWikiItemId (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objWikiItem = null;
						return ($this->intWikiItemId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PackageId':
					/**
					 * Sets the value for intPackageId (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPackage = null;
						return ($this->intPackageId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Forum':
					/**
					 * Sets the value for the Forum object referenced by intForumId (Unique)
					 * @param Forum $mixValue
					 * @return Forum
					 */
					if (is_null($mixValue)) {
						$this->intForumId = null;
						$this->objForum = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Forum object
						try {
							$mixValue = QType::Cast($mixValue, 'Forum');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Forum object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Forum for this TopicLink');

						// Update Local Member Variables
						$this->objForum = $mixValue;
						$this->intForumId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Issue':
					/**
					 * Sets the value for the Issue object referenced by intIssueId (Unique)
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
							throw new QCallerException('Unable to set an unsaved Issue for this TopicLink');

						// Update Local Member Variables
						$this->objIssue = $mixValue;
						$this->intIssueId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WikiItem':
					/**
					 * Sets the value for the WikiItem object referenced by intWikiItemId (Unique)
					 * @param WikiItem $mixValue
					 * @return WikiItem
					 */
					if (is_null($mixValue)) {
						$this->intWikiItemId = null;
						$this->objWikiItem = null;
						return null;
					} else {
						// Make sure $mixValue actually is a WikiItem object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiItem');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED WikiItem object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved WikiItem for this TopicLink');

						// Update Local Member Variables
						$this->objWikiItem = $mixValue;
						$this->intWikiItemId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Package':
					/**
					 * Sets the value for the Package object referenced by intPackageId (Unique)
					 * @param Package $mixValue
					 * @return Package
					 */
					if (is_null($mixValue)) {
						$this->intPackageId = null;
						$this->objPackage = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Package object
						try {
							$mixValue = QType::Cast($mixValue, 'Package');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Package object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Package for this TopicLink');

						// Update Local Member Variables
						$this->objPackage = $mixValue;
						$this->intPackageId = $mixValue->Id;

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
				return Message::LoadArrayByTopicLinkId($this->intId, $objOptionalClauses);
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

			return Message::CountByTopicLinkId($this->intId);
		}

		/**
		 * Associates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function AssociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this unsaved TopicLink.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this TopicLink with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved TopicLink.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this TopicLink with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_link_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Messages
		 * @return void
		*/ 
		public function UnassociateAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved TopicLink.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_link_id` = null
				WHERE
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function DeleteAssociatedMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved TopicLink.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this TopicLink with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Messages
		 * @return void
		*/ 
		public function DeleteAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved TopicLink.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				return Topic::LoadArrayByTopicLinkId($this->intId, $objOptionalClauses);
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

			return Topic::CountByTopicLinkId($this->intId);
		}

		/**
		 * Associates a Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this unsaved TopicLink.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this TopicLink with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved TopicLink.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this TopicLink with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`topic_link_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Topics
		 * @return void
		*/ 
		public function UnassociateAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved TopicLink.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`topic_link_id` = null
				WHERE
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function DeleteAssociatedTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved TopicLink.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this TopicLink with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Topics
		 * @return void
		*/ 
		public function DeleteAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved TopicLink.');

			// Get the Database Object for this Class
			$objDatabase = TopicLink::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`topic_link_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="TopicLink"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="TopicLinkTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="TopicCount" type="xsd:int"/>';
			$strToReturn .= '<element name="MessageCount" type="xsd:int"/>';
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Forum" type="xsd1:Forum"/>';
			$strToReturn .= '<element name="Issue" type="xsd1:Issue"/>';
			$strToReturn .= '<element name="WikiItem" type="xsd1:WikiItem"/>';
			$strToReturn .= '<element name="Package" type="xsd1:Package"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TopicLink', $strComplexTypeArray)) {
				$strComplexTypeArray['TopicLink'] = TopicLink::GetSoapComplexTypeXml();
				Forum::AlterSoapComplexTypeArray($strComplexTypeArray);
				Issue::AlterSoapComplexTypeArray($strComplexTypeArray);
				WikiItem::AlterSoapComplexTypeArray($strComplexTypeArray);
				Package::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TopicLink::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TopicLink();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'TopicLinkTypeId'))
				$objToReturn->intTopicLinkTypeId = $objSoapObject->TopicLinkTypeId;
			if (property_exists($objSoapObject, 'TopicCount'))
				$objToReturn->intTopicCount = $objSoapObject->TopicCount;
			if (property_exists($objSoapObject, 'MessageCount'))
				$objToReturn->intMessageCount = $objSoapObject->MessageCount;
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if ((property_exists($objSoapObject, 'Forum')) &&
				($objSoapObject->Forum))
				$objToReturn->Forum = Forum::GetObjectFromSoapObject($objSoapObject->Forum);
			if ((property_exists($objSoapObject, 'Issue')) &&
				($objSoapObject->Issue))
				$objToReturn->Issue = Issue::GetObjectFromSoapObject($objSoapObject->Issue);
			if ((property_exists($objSoapObject, 'WikiItem')) &&
				($objSoapObject->WikiItem))
				$objToReturn->WikiItem = WikiItem::GetObjectFromSoapObject($objSoapObject->WikiItem);
			if ((property_exists($objSoapObject, 'Package')) &&
				($objSoapObject->Package))
				$objToReturn->Package = Package::GetObjectFromSoapObject($objSoapObject->Package);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TopicLink::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objForum)
				$objObject->objForum = Forum::GetSoapObjectFromObject($objObject->objForum, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intForumId = null;
			if ($objObject->objIssue)
				$objObject->objIssue = Issue::GetSoapObjectFromObject($objObject->objIssue, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIssueId = null;
			if ($objObject->objWikiItem)
				$objObject->objWikiItem = WikiItem::GetSoapObjectFromObject($objObject->objWikiItem, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWikiItemId = null;
			if ($objObject->objPackage)
				$objObject->objPackage = Package::GetSoapObjectFromObject($objObject->objPackage, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPackageId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeTopicLink extends QQNode {
		protected $strTableName = 'topic_link';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TopicLink';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TopicLinkTypeId':
					return new QQNode('topic_link_type_id', 'TopicLinkTypeId', 'integer', $this);
				case 'TopicCount':
					return new QQNode('topic_count', 'TopicCount', 'integer', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'ForumId':
					return new QQNode('forum_id', 'ForumId', 'integer', $this);
				case 'Forum':
					return new QQNodeForum('forum_id', 'Forum', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'WikiItemId':
					return new QQNode('wiki_item_id', 'WikiItemId', 'integer', $this);
				case 'WikiItem':
					return new QQNodeWikiItem('wiki_item_id', 'WikiItem', 'integer', $this);
				case 'PackageId':
					return new QQNode('package_id', 'PackageId', 'integer', $this);
				case 'Package':
					return new QQNodePackage('package_id', 'Package', 'integer', $this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'topic_link_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'topic_link_id');

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

	class QQReverseReferenceNodeTopicLink extends QQReverseReferenceNode {
		protected $strTableName = 'topic_link';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TopicLink';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TopicLinkTypeId':
					return new QQNode('topic_link_type_id', 'TopicLinkTypeId', 'integer', $this);
				case 'TopicCount':
					return new QQNode('topic_count', 'TopicCount', 'integer', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'ForumId':
					return new QQNode('forum_id', 'ForumId', 'integer', $this);
				case 'Forum':
					return new QQNodeForum('forum_id', 'Forum', 'integer', $this);
				case 'IssueId':
					return new QQNode('issue_id', 'IssueId', 'integer', $this);
				case 'Issue':
					return new QQNodeIssue('issue_id', 'Issue', 'integer', $this);
				case 'WikiItemId':
					return new QQNode('wiki_item_id', 'WikiItemId', 'integer', $this);
				case 'WikiItem':
					return new QQNodeWikiItem('wiki_item_id', 'WikiItem', 'integer', $this);
				case 'PackageId':
					return new QQNode('package_id', 'PackageId', 'integer', $this);
				case 'Package':
					return new QQNodePackage('package_id', 'Package', 'integer', $this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'topic_link_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'topic_link_id');

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