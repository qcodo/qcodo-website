<?php
	/**
	 * The abstract TopicGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Topic subclass which
	 * extends this TopicGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Topic class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $TopicLinkId the value for intTopicLinkId (Not Null)
	 * @property string $Name the value for strName 
	 * @property integer $PersonId the value for intPersonId 
	 * @property QDateTime $LastPostDate the value for dttLastPostDate (Not Null)
	 * @property integer $MessageCount the value for intMessageCount 
	 * @property integer $ViewCount the value for intViewCount 
	 * @property TopicLink $TopicLink the value for the TopicLink object referenced by intTopicLinkId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property-read Person $_PersonAsEmail the value for the private _objPersonAsEmail (Read-Only) if set due to an expansion on the email_topic_person_assn association table
	 * @property-read Person[] $_PersonAsEmailArray the value for the private _objPersonAsEmailArray (Read-Only) if set due to an ExpandAsArray on the email_topic_person_assn association table
	 * @property-read Person $_PersonAsReadOnce the value for the private _objPersonAsReadOnce (Read-Only) if set due to an expansion on the read_once_topic_person_assn association table
	 * @property-read Person[] $_PersonAsReadOnceArray the value for the private _objPersonAsReadOnceArray (Read-Only) if set due to an ExpandAsArray on the read_once_topic_person_assn association table
	 * @property-read Person $_PersonAsRead the value for the private _objPersonAsRead (Read-Only) if set due to an expansion on the read_topic_person_assn association table
	 * @property-read Person[] $_PersonAsReadArray the value for the private _objPersonAsReadArray (Read-Only) if set due to an ExpandAsArray on the read_topic_person_assn association table
	 * @property-read Message $_Message the value for the private _objMessage (Read-Only) if set due to an expansion on the message.topic_id reverse relationship
	 * @property-read Message[] $_MessageArray the value for the private _objMessageArray (Read-Only) if set due to an ExpandAsArray on the message.topic_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TopicGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column topic.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.topic_link_id
		 * @var integer intTopicLinkId
		 */
		protected $intTopicLinkId;
		const TopicLinkIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.message_count
		 * @var integer intMessageCount
		 */
		protected $intMessageCount;
		const MessageCountDefault = null;


		/**
		 * Protected member variable that maps to the database column topic.view_count
		 * @var integer intViewCount
		 */
		protected $intViewCount;
		const ViewCountDefault = null;


		/**
		 * Private member variable that stores a reference to a single PersonAsEmail object
		 * (of type Person), if this Topic object was restored with
		 * an expansion on the email_topic_person_assn association table.
		 * @var Person _objPersonAsEmail;
		 */
		private $_objPersonAsEmail;

		/**
		 * Private member variable that stores a reference to an array of PersonAsEmail objects
		 * (of type Person[]), if this Topic object was restored with
		 * an ExpandAsArray on the email_topic_person_assn association table.
		 * @var Person[] _objPersonAsEmailArray;
		 */
		private $_objPersonAsEmailArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonAsReadOnce object
		 * (of type Person), if this Topic object was restored with
		 * an expansion on the read_once_topic_person_assn association table.
		 * @var Person _objPersonAsReadOnce;
		 */
		private $_objPersonAsReadOnce;

		/**
		 * Private member variable that stores a reference to an array of PersonAsReadOnce objects
		 * (of type Person[]), if this Topic object was restored with
		 * an ExpandAsArray on the read_once_topic_person_assn association table.
		 * @var Person[] _objPersonAsReadOnceArray;
		 */
		private $_objPersonAsReadOnceArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonAsRead object
		 * (of type Person), if this Topic object was restored with
		 * an expansion on the read_topic_person_assn association table.
		 * @var Person _objPersonAsRead;
		 */
		private $_objPersonAsRead;

		/**
		 * Private member variable that stores a reference to an array of PersonAsRead objects
		 * (of type Person[]), if this Topic object was restored with
		 * an ExpandAsArray on the read_topic_person_assn association table.
		 * @var Person[] _objPersonAsReadArray;
		 */
		private $_objPersonAsReadArray = array();

		/**
		 * Private member variable that stores a reference to a single Message object
		 * (of type Message), if this Topic object was restored with
		 * an expansion on the message association table.
		 * @var Message _objMessage;
		 */
		private $_objMessage;

		/**
		 * Private member variable that stores a reference to an array of Message objects
		 * (of type Message[]), if this Topic object was restored with
		 * an ExpandAsArray on the message association table.
		 * @var Message[] _objMessageArray;
		 */
		private $_objMessageArray = array();

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
		 * in the database column topic.topic_link_id.
		 *
		 * NOTE: Always use the TopicLink property getter to correctly retrieve this TopicLink object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TopicLink objTopicLink
		 */
		protected $objTopicLink;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column topic.person_id.
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
		 * Load a Topic from PK Info
		 * @param integer $intId
		 * @return Topic
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Topic::QuerySingle(
				QQ::Equal(QQN::Topic()->Id, $intId)
			);
		}

		/**
		 * Load all Topics
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadAll query
			try {
				return Topic::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Topics
		 * @return int
		 */
		public static function CountAll() {
			// Call Topic::QueryCount to perform the CountAll query
			return Topic::QueryCount(QQ::All());
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
			$objDatabase = Topic::GetDatabase();

			// Create/Build out the QueryBuilder object with Topic-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'topic');
			Topic::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('topic');

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
		 * Static Qcodo Query method to query for a single Topic object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Topic the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Topic::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Topic object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Topic::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Topic objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Topic[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Topic::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Topic::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Topic objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Topic::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Topic::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'topic_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Topic-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Topic::GetSelectFields($objQueryBuilder);
				Topic::GetFromFields($objQueryBuilder);

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
			return Topic::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Topic
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'topic';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'topic_link_id', $strAliasPrefix . 'topic_link_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'last_post_date', $strAliasPrefix . 'last_post_date');
			$objBuilder->AddSelectItem($strTableName, 'message_count', $strAliasPrefix . 'message_count');
			$objBuilder->AddSelectItem($strTableName, 'view_count', $strAliasPrefix . 'view_count');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Topic from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Topic::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Topic
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
					$strAliasPrefix = 'topic__';

				$strAlias = $strAliasPrefix . 'personasemail__person_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonAsEmailArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonAsEmailArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasemail__person_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonAsEmailArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonAsEmailArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasemail__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personasreadonce__person_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonAsReadOnceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonAsReadOnceArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasreadonce__person_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonAsReadOnceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonAsReadOnceArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasreadonce__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personasread__person_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonAsReadArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonAsReadArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasread__person_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonAsReadArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonAsReadArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasread__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'topic__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Topic object
			$objToReturn = new Topic();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'topic_link_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'topic_link_id'] : $strAliasPrefix . 'topic_link_id';
			$objToReturn->intTopicLinkId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_post_date'] : $strAliasPrefix . 'last_post_date';
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'message_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message_count'] : $strAliasPrefix . 'message_count';
			$objToReturn->intMessageCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'view_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'view_count'] : $strAliasPrefix . 'view_count';
			$objToReturn->intViewCount = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'topic__';

			// Check for TopicLink Early Binding
			$strAlias = $strAliasPrefix . 'topic_link_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTopicLink = TopicLink::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic_link_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for PersonAsEmail Virtual Binding
			$strAlias = $strAliasPrefix . 'personasemail__person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonAsEmailArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasemail__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonAsEmail = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasemail__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonAsReadOnce Virtual Binding
			$strAlias = $strAliasPrefix . 'personasreadonce__person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonAsReadOnceArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasreadonce__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonAsReadOnce = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasreadonce__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonAsRead Virtual Binding
			$strAlias = $strAliasPrefix . 'personasread__person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonAsReadArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasread__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonAsRead = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasread__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for Message Virtual Binding
			$strAlias = $strAliasPrefix . 'message__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMessageArray[] = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMessage = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Topics from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Topic[]
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
					$objItem = Topic::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Topic::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Topic object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Topic
		*/
		public static function LoadById($intId) {
			return Topic::QuerySingle(
				QQ::Equal(QQN::Topic()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Topic objects,
		 * by TopicLinkId Index(es)
		 * @param integer $intTopicLinkId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/
		public static function LoadArrayByTopicLinkId($intTopicLinkId, $objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadArrayByTopicLinkId query
			try {
				return Topic::QueryArray(
					QQ::Equal(QQN::Topic()->TopicLinkId, $intTopicLinkId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Topics
		 * by TopicLinkId Index(es)
		 * @param integer $intTopicLinkId
		 * @return int
		*/
		public static function CountByTopicLinkId($intTopicLinkId) {
			// Call Topic::QueryCount to perform the CountByTopicLinkId query
			return Topic::QueryCount(
				QQ::Equal(QQN::Topic()->TopicLinkId, $intTopicLinkId)
			);
		}
			
		/**
		 * Load an array of Topic objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Topic::QueryArray(
					QQ::Equal(QQN::Topic()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Topics
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call Topic::QueryCount to perform the CountByPersonId query
			return Topic::QueryCount(
				QQ::Equal(QQN::Topic()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Person objects for a given PersonAsEmail
		 * via the email_topic_person_assn table
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/
		public static function LoadArrayByPersonAsEmail($intPersonId, $objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadArrayByPersonAsEmail query
			try {
				return Topic::QueryArray(
					QQ::Equal(QQN::Topic()->PersonAsEmail->PersonId, $intPersonId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Topics for a given PersonAsEmail
		 * via the email_topic_person_assn table
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonAsEmail($intPersonId) {
			return Topic::QueryCount(
				QQ::Equal(QQN::Topic()->PersonAsEmail->PersonId, $intPersonId)
			);
		}
			/**
		 * Load an array of Person objects for a given PersonAsReadOnce
		 * via the read_once_topic_person_assn table
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/
		public static function LoadArrayByPersonAsReadOnce($intPersonId, $objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadArrayByPersonAsReadOnce query
			try {
				return Topic::QueryArray(
					QQ::Equal(QQN::Topic()->PersonAsReadOnce->PersonId, $intPersonId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Topics for a given PersonAsReadOnce
		 * via the read_once_topic_person_assn table
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonAsReadOnce($intPersonId) {
			return Topic::QueryCount(
				QQ::Equal(QQN::Topic()->PersonAsReadOnce->PersonId, $intPersonId)
			);
		}
			/**
		 * Load an array of Person objects for a given PersonAsRead
		 * via the read_topic_person_assn table
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/
		public static function LoadArrayByPersonAsRead($intPersonId, $objOptionalClauses = null) {
			// Call Topic::QueryArray to perform the LoadArrayByPersonAsRead query
			try {
				return Topic::QueryArray(
					QQ::Equal(QQN::Topic()->PersonAsRead->PersonId, $intPersonId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Topics for a given PersonAsRead
		 * via the read_topic_person_assn table
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonAsRead($intPersonId) {
			return Topic::QueryCount(
				QQ::Equal(QQN::Topic()->PersonAsRead->PersonId, $intPersonId)
			);
		}




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Topic
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `topic` (
							`topic_link_id`,
							`name`,
							`person_id`,
							`last_post_date`,
							`message_count`,
							`view_count`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intTopicLinkId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							' . $objDatabase->SqlVariable($this->intViewCount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('topic', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`topic`
						SET
							`topic_link_id` = ' . $objDatabase->SqlVariable($this->intTopicLinkId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							`message_count` = ' . $objDatabase->SqlVariable($this->intMessageCount) . ',
							`view_count` = ' . $objDatabase->SqlVariable($this->intViewCount) . '
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
		 * Delete this Topic
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Topic with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Topics
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`');
		}

		/**
		 * Truncate topic table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `topic`');
		}

		/**
		 * Reload this Topic from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Topic object.');

			// Reload the Object
			$objReloaded = Topic::Load($this->intId);

			// Update $this's local variables to match
			$this->TopicLinkId = $objReloaded->TopicLinkId;
			$this->strName = $objReloaded->strName;
			$this->PersonId = $objReloaded->PersonId;
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
			$this->intMessageCount = $objReloaded->intMessageCount;
			$this->intViewCount = $objReloaded->intViewCount;
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

				case 'TopicLinkId':
					/**
					 * Gets the value for intTopicLinkId (Not Null)
					 * @return integer
					 */
					return $this->intTopicLinkId;

				case 'Name':
					/**
					 * Gets the value for strName 
					 * @return string
					 */
					return $this->strName;

				case 'PersonId':
					/**
					 * Gets the value for intPersonId 
					 * @return integer
					 */
					return $this->intPersonId;

				case 'LastPostDate':
					/**
					 * Gets the value for dttLastPostDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttLastPostDate;

				case 'MessageCount':
					/**
					 * Gets the value for intMessageCount 
					 * @return integer
					 */
					return $this->intMessageCount;

				case 'ViewCount':
					/**
					 * Gets the value for intViewCount 
					 * @return integer
					 */
					return $this->intViewCount;


				///////////////////
				// Member Objects
				///////////////////
				case 'TopicLink':
					/**
					 * Gets the value for the TopicLink object referenced by intTopicLinkId (Not Null)
					 * @return TopicLink
					 */
					try {
						if ((!$this->objTopicLink) && (!is_null($this->intTopicLinkId)))
							$this->objTopicLink = TopicLink::Load($this->intTopicLinkId);
						return $this->objTopicLink;
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

				case '_PersonAsEmail':
					/**
					 * Gets the value for the private _objPersonAsEmail (Read-Only)
					 * if set due to an expansion on the email_topic_person_assn association table
					 * @return Person
					 */
					return $this->_objPersonAsEmail;

				case '_PersonAsEmailArray':
					/**
					 * Gets the value for the private _objPersonAsEmailArray (Read-Only)
					 * if set due to an ExpandAsArray on the email_topic_person_assn association table
					 * @return Person[]
					 */
					return (array) $this->_objPersonAsEmailArray;

				case '_PersonAsReadOnce':
					/**
					 * Gets the value for the private _objPersonAsReadOnce (Read-Only)
					 * if set due to an expansion on the read_once_topic_person_assn association table
					 * @return Person
					 */
					return $this->_objPersonAsReadOnce;

				case '_PersonAsReadOnceArray':
					/**
					 * Gets the value for the private _objPersonAsReadOnceArray (Read-Only)
					 * if set due to an ExpandAsArray on the read_once_topic_person_assn association table
					 * @return Person[]
					 */
					return (array) $this->_objPersonAsReadOnceArray;

				case '_PersonAsRead':
					/**
					 * Gets the value for the private _objPersonAsRead (Read-Only)
					 * if set due to an expansion on the read_topic_person_assn association table
					 * @return Person
					 */
					return $this->_objPersonAsRead;

				case '_PersonAsReadArray':
					/**
					 * Gets the value for the private _objPersonAsReadArray (Read-Only)
					 * if set due to an ExpandAsArray on the read_topic_person_assn association table
					 * @return Person[]
					 */
					return (array) $this->_objPersonAsReadArray;

				case '_Message':
					/**
					 * Gets the value for the private _objMessage (Read-Only)
					 * if set due to an expansion on the message.topic_id reverse relationship
					 * @return Message
					 */
					return $this->_objMessage;

				case '_MessageArray':
					/**
					 * Gets the value for the private _objMessageArray (Read-Only)
					 * if set due to an ExpandAsArray on the message.topic_id reverse relationship
					 * @return Message[]
					 */
					return (array) $this->_objMessageArray;


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
				case 'TopicLinkId':
					/**
					 * Sets the value for intTopicLinkId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTopicLink = null;
						return ($this->intTopicLinkId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Name':
					/**
					 * Sets the value for strName 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
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

				case 'LastPostDate':
					/**
					 * Sets the value for dttLastPostDate (Not Null)
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

				case 'ViewCount':
					/**
					 * Sets the value for intViewCount 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intViewCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'TopicLink':
					/**
					 * Sets the value for the TopicLink object referenced by intTopicLinkId (Not Null)
					 * @param TopicLink $mixValue
					 * @return TopicLink
					 */
					if (is_null($mixValue)) {
						$this->intTopicLinkId = null;
						$this->objTopicLink = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TopicLink object
						try {
							$mixValue = QType::Cast($mixValue, 'TopicLink');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TopicLink object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TopicLink for this Topic');

						// Update Local Member Variables
						$this->objTopicLink = $mixValue;
						$this->intTopicLinkId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Person for this Topic');

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
				return Message::LoadArrayByTopicId($this->intId, $objOptionalClauses);
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

			return Message::CountByTopicId($this->intId);
		}

		/**
		 * Associates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function AssociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this unsaved Topic.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this Topic with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Topic.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Topic with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Messages
		 * @return void
		*/ 
		public function UnassociateAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`topic_id` = null
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function DeleteAssociatedMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Topic.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Topic with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Messages
		 * @return void
		*/ 
		public function DeleteAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for PersonAsEmail
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated PeopleAsEmail as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonAsEmailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByTopicAsEmail($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated PeopleAsEmail
		 * @return int
		*/ 
		public function CountPeopleAsEmail() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByTopicAsEmail($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific PersonAsEmail
		 * @param Person $objPerson
		 * @return bool
		*/
		public function IsPersonAsEmailAssociated(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsEmailAssociated on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsEmailAssociated on this Topic with an unsaved Person.');

			$intRowCount = Topic::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Id, $this->intId),
					QQ::Equal(QQN::Topic()->PersonAsEmail->PersonId, $objPerson->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a PersonAsEmail
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePersonAsEmail(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsEmail on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsEmail on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `email_topic_person_assn` (
					`topic_id`,
					`person_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objPerson->Id) . '
				)
			');
		}

		/**
		 * Unassociates a PersonAsEmail
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePersonAsEmail(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsEmail on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsEmail on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');
		}

		/**
		 * Unassociates all PeopleAsEmail
		 * @return void
		*/ 
		public function UnassociateAllPeopleAsEmail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllPersonAsEmailArray on this unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for PersonAsReadOnce
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated PeopleAsReadOnce as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonAsReadOnceArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByTopicAsReadOnce($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated PeopleAsReadOnce
		 * @return int
		*/ 
		public function CountPeopleAsReadOnce() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByTopicAsReadOnce($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific PersonAsReadOnce
		 * @param Person $objPerson
		 * @return bool
		*/
		public function IsPersonAsReadOnceAssociated(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsReadOnceAssociated on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsReadOnceAssociated on this Topic with an unsaved Person.');

			$intRowCount = Topic::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Id, $this->intId),
					QQ::Equal(QQN::Topic()->PersonAsReadOnce->PersonId, $objPerson->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a PersonAsReadOnce
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePersonAsReadOnce(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsReadOnce on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsReadOnce on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `read_once_topic_person_assn` (
					`topic_id`,
					`person_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objPerson->Id) . '
				)
			');
		}

		/**
		 * Unassociates a PersonAsReadOnce
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePersonAsReadOnce(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsReadOnce on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsReadOnce on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_once_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');
		}

		/**
		 * Unassociates all PeopleAsReadOnce
		 * @return void
		*/ 
		public function UnassociateAllPeopleAsReadOnce() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllPersonAsReadOnceArray on this unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_once_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for PersonAsRead
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated PeopleAsRead as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonAsReadArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByTopicAsRead($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated PeopleAsRead
		 * @return int
		*/ 
		public function CountPeopleAsRead() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByTopicAsRead($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific PersonAsRead
		 * @param Person $objPerson
		 * @return bool
		*/
		public function IsPersonAsReadAssociated(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsReadAssociated on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAsReadAssociated on this Topic with an unsaved Person.');

			$intRowCount = Topic::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Id, $this->intId),
					QQ::Equal(QQN::Topic()->PersonAsRead->PersonId, $objPerson->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a PersonAsRead
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePersonAsRead(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsRead on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsRead on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `read_topic_person_assn` (
					`topic_id`,
					`person_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objPerson->Id) . '
				)
			');
		}

		/**
		 * Unassociates a PersonAsRead
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePersonAsRead(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsRead on this unsaved Topic.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsRead on this Topic with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');
		}

		/**
		 * Unassociates all PeopleAsRead
		 * @return void
		*/ 
		public function UnassociateAllPeopleAsRead() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllPersonAsReadArray on this unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_topic_person_assn`
				WHERE
					`topic_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Topic"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="TopicLink" type="xsd1:TopicLink"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MessageCount" type="xsd:int"/>';
			$strToReturn .= '<element name="ViewCount" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Topic', $strComplexTypeArray)) {
				$strComplexTypeArray['Topic'] = Topic::GetSoapComplexTypeXml();
				TopicLink::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Topic::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Topic();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'TopicLink')) &&
				($objSoapObject->TopicLink))
				$objToReturn->TopicLink = TopicLink::GetObjectFromSoapObject($objSoapObject->TopicLink);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if (property_exists($objSoapObject, 'MessageCount'))
				$objToReturn->intMessageCount = $objSoapObject->MessageCount;
			if (property_exists($objSoapObject, 'ViewCount'))
				$objToReturn->intViewCount = $objSoapObject->ViewCount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Topic::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objTopicLink)
				$objObject->objTopicLink = TopicLink::GetSoapObjectFromObject($objObject->objTopicLink, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTopicLinkId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeTopicPersonAsEmail extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'personasemail';

		protected $strTableName = 'email_topic_person_assn';
		protected $strPrimaryKey = 'topic_id';
		protected $strClassName = 'Person';

		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
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

	class QQNodeTopicPersonAsReadOnce extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'personasreadonce';

		protected $strTableName = 'read_once_topic_person_assn';
		protected $strPrimaryKey = 'topic_id';
		protected $strClassName = 'Person';

		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
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

	class QQNodeTopicPersonAsRead extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'personasread';

		protected $strTableName = 'read_topic_person_assn';
		protected $strPrimaryKey = 'topic_id';
		protected $strClassName = 'Person';

		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
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

	class QQNodeTopic extends QQNode {
		protected $strTableName = 'topic';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Topic';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TopicLinkId':
					return new QQNode('topic_link_id', 'TopicLinkId', 'integer', $this);
				case 'TopicLink':
					return new QQNodeTopicLink('topic_link_id', 'TopicLink', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'ViewCount':
					return new QQNode('view_count', 'ViewCount', 'integer', $this);
				case 'PersonAsEmail':
					return new QQNodeTopicPersonAsEmail($this);
				case 'PersonAsReadOnce':
					return new QQNodeTopicPersonAsReadOnce($this);
				case 'PersonAsRead':
					return new QQNodeTopicPersonAsRead($this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'topic_id');

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

	class QQReverseReferenceNodeTopic extends QQReverseReferenceNode {
		protected $strTableName = 'topic';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Topic';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TopicLinkId':
					return new QQNode('topic_link_id', 'TopicLinkId', 'integer', $this);
				case 'TopicLink':
					return new QQNodeTopicLink('topic_link_id', 'TopicLink', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'MessageCount':
					return new QQNode('message_count', 'MessageCount', 'integer', $this);
				case 'ViewCount':
					return new QQNode('view_count', 'ViewCount', 'integer', $this);
				case 'PersonAsEmail':
					return new QQNodeTopicPersonAsEmail($this);
				case 'PersonAsReadOnce':
					return new QQNodeTopicPersonAsReadOnce($this);
				case 'PersonAsRead':
					return new QQNodeTopicPersonAsRead($this);
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'topic_id');

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