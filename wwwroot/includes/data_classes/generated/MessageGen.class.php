<?php
	/**
	 * The abstract MessageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Message subclass which
	 * extends this MessageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Message class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ForumId the value for intForumId (Not Null)
	 * @property integer $TopicId the value for intTopicId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property string $Message the value for strMessage 
	 * @property integer $ReplyNumber the value for intReplyNumber 
	 * @property QDateTime $PostDate the value for dttPostDate (Not Null)
	 * @property Forum $Forum the value for the Forum object referenced by intForumId (Not Null)
	 * @property Topic $Topic the value for the Topic object referenced by intTopicId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MessageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column message.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column message.forum_id
		 * @var integer intForumId
		 */
		protected $intForumId;
		const ForumIdDefault = null;


		/**
		 * Protected member variable that maps to the database column message.topic_id
		 * @var integer intTopicId
		 */
		protected $intTopicId;
		const TopicIdDefault = null;


		/**
		 * Protected member variable that maps to the database column message.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column message.message
		 * @var string strMessage
		 */
		protected $strMessage;
		const MessageDefault = null;


		/**
		 * Protected member variable that maps to the database column message.reply_number
		 * @var integer intReplyNumber
		 */
		protected $intReplyNumber;
		const ReplyNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column message.post_date
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
		 * in the database column message.forum_id.
		 *
		 * NOTE: Always use the Forum property getter to correctly retrieve this Forum object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Forum objForum
		 */
		protected $objForum;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column message.topic_id.
		 *
		 * NOTE: Always use the Topic property getter to correctly retrieve this Topic object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Topic objTopic
		 */
		protected $objTopic;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column message.person_id.
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
		 * Load a Message from PK Info
		 * @param integer $intId
		 * @return Message
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Message::QuerySingle(
				QQ::Equal(QQN::Message()->Id, $intId)
			);
		}

		/**
		 * Load all Messages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Message::QueryArray to perform the LoadAll query
			try {
				return Message::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Messages
		 * @return int
		 */
		public static function CountAll() {
			// Call Message::QueryCount to perform the CountAll query
			return Message::QueryCount(QQ::All());
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
			$objDatabase = Message::GetDatabase();

			// Create/Build out the QueryBuilder object with Message-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'message');
			Message::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('message');

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
		 * Static Qcodo Query method to query for a single Message object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Message the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Message object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Message::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Message objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Message[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Message::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Message objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Message::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Message::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'message_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Message-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Message::GetSelectFields($objQueryBuilder);
				Message::GetFromFields($objQueryBuilder);

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
			return Message::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Message
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'message';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'forum_id', $strAliasPrefix . 'forum_id');
			$objBuilder->AddSelectItem($strTableName, 'topic_id', $strAliasPrefix . 'topic_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'message', $strAliasPrefix . 'message');
			$objBuilder->AddSelectItem($strTableName, 'reply_number', $strAliasPrefix . 'reply_number');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Message from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Message::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Message
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Message object
			$objToReturn = new Message();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'forum_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'forum_id'] : $strAliasPrefix . 'forum_id';
			$objToReturn->intForumId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'topic_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'topic_id'] : $strAliasPrefix . 'topic_id';
			$objToReturn->intTopicId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'message__';

			// Check for Forum Early Binding
			$strAlias = $strAliasPrefix . 'forum_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objForum = Forum::InstantiateDbRow($objDbRow, $strAliasPrefix . 'forum_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Topic Early Binding
			$strAlias = $strAliasPrefix . 'topic_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTopic = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Messages from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Message[]
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
					$objItem = Message::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Message::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Message object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Message
		*/
		public static function LoadById($intId) {
			return Message::QuerySingle(
				QQ::Equal(QQN::Message()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Message objects,
		 * by ForumId Index(es)
		 * @param integer $intForumId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/
		public static function LoadArrayByForumId($intForumId, $objOptionalClauses = null) {
			// Call Message::QueryArray to perform the LoadArrayByForumId query
			try {
				return Message::QueryArray(
					QQ::Equal(QQN::Message()->ForumId, $intForumId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Messages
		 * by ForumId Index(es)
		 * @param integer $intForumId
		 * @return int
		*/
		public static function CountByForumId($intForumId) {
			// Call Message::QueryCount to perform the CountByForumId query
			return Message::QueryCount(
				QQ::Equal(QQN::Message()->ForumId, $intForumId)
			);
		}
			
		/**
		 * Load an array of Message objects,
		 * by TopicId Index(es)
		 * @param integer $intTopicId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/
		public static function LoadArrayByTopicId($intTopicId, $objOptionalClauses = null) {
			// Call Message::QueryArray to perform the LoadArrayByTopicId query
			try {
				return Message::QueryArray(
					QQ::Equal(QQN::Message()->TopicId, $intTopicId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Messages
		 * by TopicId Index(es)
		 * @param integer $intTopicId
		 * @return int
		*/
		public static function CountByTopicId($intTopicId) {
			// Call Message::QueryCount to perform the CountByTopicId query
			return Message::QueryCount(
				QQ::Equal(QQN::Message()->TopicId, $intTopicId)
			);
		}
			
		/**
		 * Load an array of Message objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Message::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Message::QueryArray(
					QQ::Equal(QQN::Message()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Messages
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call Message::QueryCount to perform the CountByPersonId query
			return Message::QueryCount(
				QQ::Equal(QQN::Message()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Message
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `message` (
							`forum_id`,
							`topic_id`,
							`person_id`,
							`message`,
							`reply_number`,
							`post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intForumId) . ',
							' . $objDatabase->SqlVariable($this->intTopicId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->strMessage) . ',
							' . $objDatabase->SqlVariable($this->intReplyNumber) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('message', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`message`
						SET
							`forum_id` = ' . $objDatabase->SqlVariable($this->intForumId) . ',
							`topic_id` = ' . $objDatabase->SqlVariable($this->intTopicId) . ',
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
		 * Delete this Message
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Message with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Messages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`');
		}

		/**
		 * Truncate message table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `message`');
		}

		/**
		 * Reload this Message from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Message object.');

			// Reload the Object
			$objReloaded = Message::Load($this->intId);

			// Update $this's local variables to match
			$this->ForumId = $objReloaded->ForumId;
			$this->TopicId = $objReloaded->TopicId;
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

				case 'ForumId':
					/**
					 * Gets the value for intForumId (Not Null)
					 * @return integer
					 */
					return $this->intForumId;

				case 'TopicId':
					/**
					 * Gets the value for intTopicId (Not Null)
					 * @return integer
					 */
					return $this->intTopicId;

				case 'PersonId':
					/**
					 * Gets the value for intPersonId (Not Null)
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
				case 'Forum':
					/**
					 * Gets the value for the Forum object referenced by intForumId (Not Null)
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

				case 'Topic':
					/**
					 * Gets the value for the Topic object referenced by intTopicId (Not Null)
					 * @return Topic
					 */
					try {
						if ((!$this->objTopic) && (!is_null($this->intTopicId)))
							$this->objTopic = Topic::Load($this->intTopicId);
						return $this->objTopic;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Person':
					/**
					 * Gets the value for the Person object referenced by intPersonId (Not Null)
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
				case 'ForumId':
					/**
					 * Sets the value for intForumId (Not Null)
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

				case 'TopicId':
					/**
					 * Sets the value for intTopicId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTopic = null;
						return ($this->intTopicId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonId':
					/**
					 * Sets the value for intPersonId (Not Null)
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
				case 'Forum':
					/**
					 * Sets the value for the Forum object referenced by intForumId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Forum for this Message');

						// Update Local Member Variables
						$this->objForum = $mixValue;
						$this->intForumId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Topic':
					/**
					 * Sets the value for the Topic object referenced by intTopicId (Not Null)
					 * @param Topic $mixValue
					 * @return Topic
					 */
					if (is_null($mixValue)) {
						$this->intTopicId = null;
						$this->objTopic = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Topic object
						try {
							$mixValue = QType::Cast($mixValue, 'Topic');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Topic object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Topic for this Message');

						// Update Local Member Variables
						$this->objTopic = $mixValue;
						$this->intTopicId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Person':
					/**
					 * Sets the value for the Person object referenced by intPersonId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Person for this Message');

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
			$strToReturn = '<complexType name="Message"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Forum" type="xsd1:Forum"/>';
			$strToReturn .= '<element name="Topic" type="xsd1:Topic"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="Message" type="xsd:string"/>';
			$strToReturn .= '<element name="ReplyNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Message', $strComplexTypeArray)) {
				$strComplexTypeArray['Message'] = Message::GetSoapComplexTypeXml();
				Forum::AlterSoapComplexTypeArray($strComplexTypeArray);
				Topic::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Message::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Message();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Forum')) &&
				($objSoapObject->Forum))
				$objToReturn->Forum = Forum::GetObjectFromSoapObject($objSoapObject->Forum);
			if ((property_exists($objSoapObject, 'Topic')) &&
				($objSoapObject->Topic))
				$objToReturn->Topic = Topic::GetObjectFromSoapObject($objSoapObject->Topic);
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
				array_push($objArrayToReturn, Message::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objForum)
				$objObject->objForum = Forum::GetSoapObjectFromObject($objObject->objForum, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intForumId = null;
			if ($objObject->objTopic)
				$objObject->objTopic = Topic::GetSoapObjectFromObject($objObject->objTopic, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTopicId = null;
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

	class QQNodeMessage extends QQNode {
		protected $strTableName = 'message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Message';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ForumId':
					return new QQNode('forum_id', 'ForumId', 'integer', $this);
				case 'Forum':
					return new QQNodeForum('forum_id', 'Forum', 'integer', $this);
				case 'TopicId':
					return new QQNode('topic_id', 'TopicId', 'integer', $this);
				case 'Topic':
					return new QQNodeTopic('topic_id', 'Topic', 'integer', $this);
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

	class QQReverseReferenceNodeMessage extends QQReverseReferenceNode {
		protected $strTableName = 'message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Message';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ForumId':
					return new QQNode('forum_id', 'ForumId', 'integer', $this);
				case 'Forum':
					return new QQNodeForum('forum_id', 'Forum', 'integer', $this);
				case 'TopicId':
					return new QQNode('topic_id', 'TopicId', 'integer', $this);
				case 'Topic':
					return new QQNodeTopic('topic_id', 'Topic', 'integer', $this);
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