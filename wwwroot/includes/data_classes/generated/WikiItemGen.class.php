<?php
	/**
	 * The abstract WikiItemGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the WikiItem subclass which
	 * extends this WikiItemGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiItem class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Path the value for strPath (Unique)
	 * @property integer $WikiItemTypeId the value for intWikiItemTypeId (Not Null)
	 * @property integer $CurrentWikiVersionId the value for intCurrentWikiVersionId (Unique)
	 * @property string $CurrentName the value for strCurrentName 
	 * @property integer $CurrentPostedByPersonId the value for intCurrentPostedByPersonId 
	 * @property QDateTime $CurrentPostDate the value for dttCurrentPostDate 
	 * @property WikiVersion $CurrentWikiVersion the value for the WikiVersion object referenced by intCurrentWikiVersionId (Unique)
	 * @property Person $CurrentPostedByPerson the value for the Person object referenced by intCurrentPostedByPersonId 
	 * @property TopicLink $TopicLink the value for the TopicLink object that uniquely references this WikiItem
	 * @property-read WikiVersion $_WikiVersion the value for the private _objWikiVersion (Read-Only) if set due to an expansion on the wiki_version.wiki_item_id reverse relationship
	 * @property-read WikiVersion[] $_WikiVersionArray the value for the private _objWikiVersionArray (Read-Only) if set due to an ExpandAsArray on the wiki_version.wiki_item_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WikiItemGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column wiki_item.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.path
		 * @var string strPath
		 */
		protected $strPath;
		const PathMaxLength = 200;
		const PathDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.wiki_item_type_id
		 * @var integer intWikiItemTypeId
		 */
		protected $intWikiItemTypeId;
		const WikiItemTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.current_wiki_version_id
		 * @var integer intCurrentWikiVersionId
		 */
		protected $intCurrentWikiVersionId;
		const CurrentWikiVersionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.current_name
		 * @var string strCurrentName
		 */
		protected $strCurrentName;
		const CurrentNameMaxLength = 200;
		const CurrentNameDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.current_posted_by_person_id
		 * @var integer intCurrentPostedByPersonId
		 */
		protected $intCurrentPostedByPersonId;
		const CurrentPostedByPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_item.current_post_date
		 * @var QDateTime dttCurrentPostDate
		 */
		protected $dttCurrentPostDate;
		const CurrentPostDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single WikiVersion object
		 * (of type WikiVersion), if this WikiItem object was restored with
		 * an expansion on the wiki_version association table.
		 * @var WikiVersion _objWikiVersion;
		 */
		private $_objWikiVersion;

		/**
		 * Private member variable that stores a reference to an array of WikiVersion objects
		 * (of type WikiVersion[]), if this WikiItem object was restored with
		 * an ExpandAsArray on the wiki_version association table.
		 * @var WikiVersion[] _objWikiVersionArray;
		 */
		private $_objWikiVersionArray = array();

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
		 * in the database column wiki_item.current_wiki_version_id.
		 *
		 * NOTE: Always use the CurrentWikiVersion property getter to correctly retrieve this WikiVersion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiVersion objCurrentWikiVersion
		 */
		protected $objCurrentWikiVersion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column wiki_item.current_posted_by_person_id.
		 *
		 * NOTE: Always use the CurrentPostedByPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objCurrentPostedByPerson
		 */
		protected $objCurrentPostedByPerson;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column topic_link.wiki_item_id.
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
		 * Load a WikiItem from PK Info
		 * @param integer $intId
		 * @return WikiItem
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return WikiItem::QuerySingle(
				QQ::Equal(QQN::WikiItem()->Id, $intId)
			);
		}

		/**
		 * Load all WikiItems
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiItem[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call WikiItem::QueryArray to perform the LoadAll query
			try {
				return WikiItem::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all WikiItems
		 * @return int
		 */
		public static function CountAll() {
			// Call WikiItem::QueryCount to perform the CountAll query
			return WikiItem::QueryCount(QQ::All());
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
			$objDatabase = WikiItem::GetDatabase();

			// Create/Build out the QueryBuilder object with WikiItem-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'wiki_item');
			WikiItem::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('wiki_item');

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
		 * Static Qcodo Query method to query for a single WikiItem object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiItem the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new WikiItem object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiItem::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of WikiItem objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiItem[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiItem::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of WikiItem objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = WikiItem::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'wiki_item_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with WikiItem-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				WikiItem::GetSelectFields($objQueryBuilder);
				WikiItem::GetFromFields($objQueryBuilder);

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
			return WikiItem::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this WikiItem
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'wiki_item';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'path', $strAliasPrefix . 'path');
			$objBuilder->AddSelectItem($strTableName, 'wiki_item_type_id', $strAliasPrefix . 'wiki_item_type_id');
			$objBuilder->AddSelectItem($strTableName, 'current_wiki_version_id', $strAliasPrefix . 'current_wiki_version_id');
			$objBuilder->AddSelectItem($strTableName, 'current_name', $strAliasPrefix . 'current_name');
			$objBuilder->AddSelectItem($strTableName, 'current_posted_by_person_id', $strAliasPrefix . 'current_posted_by_person_id');
			$objBuilder->AddSelectItem($strTableName, 'current_post_date', $strAliasPrefix . 'current_post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a WikiItem from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this WikiItem::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return WikiItem
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
					$strAliasPrefix = 'wiki_item__';


				$strAlias = $strAliasPrefix . 'wikiversion__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objWikiVersionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objWikiVersionArray[$intPreviousChildItemCount - 1];
						$objChildItem = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiversion__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objWikiVersionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objWikiVersionArray[] = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'wiki_item__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the WikiItem object
			$objToReturn = new WikiItem();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'path'] : $strAliasPrefix . 'path';
			$objToReturn->strPath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'wiki_item_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'wiki_item_type_id'] : $strAliasPrefix . 'wiki_item_type_id';
			$objToReturn->intWikiItemTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_wiki_version_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_wiki_version_id'] : $strAliasPrefix . 'current_wiki_version_id';
			$objToReturn->intCurrentWikiVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_name'] : $strAliasPrefix . 'current_name';
			$objToReturn->strCurrentName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_posted_by_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_posted_by_person_id'] : $strAliasPrefix . 'current_posted_by_person_id';
			$objToReturn->intCurrentPostedByPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_post_date'] : $strAliasPrefix . 'current_post_date';
			$objToReturn->dttCurrentPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'wiki_item__';

			// Check for CurrentWikiVersion Early Binding
			$strAlias = $strAliasPrefix . 'current_wiki_version_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCurrentWikiVersion = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'current_wiki_version_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CurrentPostedByPerson Early Binding
			$strAlias = $strAliasPrefix . 'current_posted_by_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCurrentPostedByPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'current_posted_by_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


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



			// Check for WikiVersion Virtual Binding
			$strAlias = $strAliasPrefix . 'wikiversion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objWikiVersionArray[] = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objWikiVersion = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of WikiItems from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return WikiItem[]
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
					$objItem = WikiItem::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = WikiItem::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single WikiItem object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return WikiItem
		*/
		public static function LoadById($intId) {
			return WikiItem::QuerySingle(
				QQ::Equal(QQN::WikiItem()->Id, $intId)
			);
		}
			
		/**
		 * Load a single WikiItem object,
		 * by Path Index(es)
		 * @param string $strPath
		 * @return WikiItem
		*/
		public static function LoadByPath($strPath) {
			return WikiItem::QuerySingle(
				QQ::Equal(QQN::WikiItem()->Path, $strPath)
			);
		}
			
		/**
		 * Load a single WikiItem object,
		 * by CurrentWikiVersionId Index(es)
		 * @param integer $intCurrentWikiVersionId
		 * @return WikiItem
		*/
		public static function LoadByCurrentWikiVersionId($intCurrentWikiVersionId) {
			return WikiItem::QuerySingle(
				QQ::Equal(QQN::WikiItem()->CurrentWikiVersionId, $intCurrentWikiVersionId)
			);
		}
			
		/**
		 * Load an array of WikiItem objects,
		 * by WikiItemTypeId Index(es)
		 * @param integer $intWikiItemTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiItem[]
		*/
		public static function LoadArrayByWikiItemTypeId($intWikiItemTypeId, $objOptionalClauses = null) {
			// Call WikiItem::QueryArray to perform the LoadArrayByWikiItemTypeId query
			try {
				return WikiItem::QueryArray(
					QQ::Equal(QQN::WikiItem()->WikiItemTypeId, $intWikiItemTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WikiItems
		 * by WikiItemTypeId Index(es)
		 * @param integer $intWikiItemTypeId
		 * @return int
		*/
		public static function CountByWikiItemTypeId($intWikiItemTypeId) {
			// Call WikiItem::QueryCount to perform the CountByWikiItemTypeId query
			return WikiItem::QueryCount(
				QQ::Equal(QQN::WikiItem()->WikiItemTypeId, $intWikiItemTypeId)
			);
		}
			
		/**
		 * Load an array of WikiItem objects,
		 * by CurrentPostedByPersonId Index(es)
		 * @param integer $intCurrentPostedByPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiItem[]
		*/
		public static function LoadArrayByCurrentPostedByPersonId($intCurrentPostedByPersonId, $objOptionalClauses = null) {
			// Call WikiItem::QueryArray to perform the LoadArrayByCurrentPostedByPersonId query
			try {
				return WikiItem::QueryArray(
					QQ::Equal(QQN::WikiItem()->CurrentPostedByPersonId, $intCurrentPostedByPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WikiItems
		 * by CurrentPostedByPersonId Index(es)
		 * @param integer $intCurrentPostedByPersonId
		 * @return int
		*/
		public static function CountByCurrentPostedByPersonId($intCurrentPostedByPersonId) {
			// Call WikiItem::QueryCount to perform the CountByCurrentPostedByPersonId query
			return WikiItem::QueryCount(
				QQ::Equal(QQN::WikiItem()->CurrentPostedByPersonId, $intCurrentPostedByPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this WikiItem
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `wiki_item` (
							`path`,
							`wiki_item_type_id`,
							`current_wiki_version_id`,
							`current_name`,
							`current_posted_by_person_id`,
							`current_post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strPath) . ',
							' . $objDatabase->SqlVariable($this->intWikiItemTypeId) . ',
							' . $objDatabase->SqlVariable($this->intCurrentWikiVersionId) . ',
							' . $objDatabase->SqlVariable($this->strCurrentName) . ',
							' . $objDatabase->SqlVariable($this->intCurrentPostedByPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttCurrentPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('wiki_item', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`wiki_item`
						SET
							`path` = ' . $objDatabase->SqlVariable($this->strPath) . ',
							`wiki_item_type_id` = ' . $objDatabase->SqlVariable($this->intWikiItemTypeId) . ',
							`current_wiki_version_id` = ' . $objDatabase->SqlVariable($this->intCurrentWikiVersionId) . ',
							`current_name` = ' . $objDatabase->SqlVariable($this->strCurrentName) . ',
							`current_posted_by_person_id` = ' . $objDatabase->SqlVariable($this->intCurrentPostedByPersonId) . ',
							`current_post_date` = ' . $objDatabase->SqlVariable($this->dttCurrentPostDate) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

		
		
				// Update the adjoined TopicLink object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyTopicLink) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = TopicLink::LoadByWikiItemId($this->intId)) {
						$objAssociated->WikiItemId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objTopicLink) {
						$this->objTopicLink->WikiItemId = $this->intId;
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
		 * Delete this WikiItem
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this WikiItem with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			
			
			// Update the adjoined TopicLink object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = TopicLink::LoadByWikiItemId($this->intId)) {
				$objAssociated->WikiItemId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all WikiItems
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_item`');
		}

		/**
		 * Truncate wiki_item table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `wiki_item`');
		}

		/**
		 * Reload this WikiItem from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved WikiItem object.');

			// Reload the Object
			$objReloaded = WikiItem::Load($this->intId);

			// Update $this's local variables to match
			$this->strPath = $objReloaded->strPath;
			$this->WikiItemTypeId = $objReloaded->WikiItemTypeId;
			$this->CurrentWikiVersionId = $objReloaded->CurrentWikiVersionId;
			$this->strCurrentName = $objReloaded->strCurrentName;
			$this->CurrentPostedByPersonId = $objReloaded->CurrentPostedByPersonId;
			$this->dttCurrentPostDate = $objReloaded->dttCurrentPostDate;
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

				case 'Path':
					/**
					 * Gets the value for strPath (Unique)
					 * @return string
					 */
					return $this->strPath;

				case 'WikiItemTypeId':
					/**
					 * Gets the value for intWikiItemTypeId (Not Null)
					 * @return integer
					 */
					return $this->intWikiItemTypeId;

				case 'CurrentWikiVersionId':
					/**
					 * Gets the value for intCurrentWikiVersionId (Unique)
					 * @return integer
					 */
					return $this->intCurrentWikiVersionId;

				case 'CurrentName':
					/**
					 * Gets the value for strCurrentName 
					 * @return string
					 */
					return $this->strCurrentName;

				case 'CurrentPostedByPersonId':
					/**
					 * Gets the value for intCurrentPostedByPersonId 
					 * @return integer
					 */
					return $this->intCurrentPostedByPersonId;

				case 'CurrentPostDate':
					/**
					 * Gets the value for dttCurrentPostDate 
					 * @return QDateTime
					 */
					return $this->dttCurrentPostDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'CurrentWikiVersion':
					/**
					 * Gets the value for the WikiVersion object referenced by intCurrentWikiVersionId (Unique)
					 * @return WikiVersion
					 */
					try {
						if ((!$this->objCurrentWikiVersion) && (!is_null($this->intCurrentWikiVersionId)))
							$this->objCurrentWikiVersion = WikiVersion::Load($this->intCurrentWikiVersionId);
						return $this->objCurrentWikiVersion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentPostedByPerson':
					/**
					 * Gets the value for the Person object referenced by intCurrentPostedByPersonId 
					 * @return Person
					 */
					try {
						if ((!$this->objCurrentPostedByPerson) && (!is_null($this->intCurrentPostedByPersonId)))
							$this->objCurrentPostedByPerson = Person::Load($this->intCurrentPostedByPersonId);
						return $this->objCurrentPostedByPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'TopicLink':
					/**
					 * Gets the value for the TopicLink object that uniquely references this WikiItem
					 * by objTopicLink (Unique)
					 * @return TopicLink
					 */
					try {
						if ($this->objTopicLink === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objTopicLink)
							$this->objTopicLink = TopicLink::LoadByWikiItemId($this->intId);
						return $this->objTopicLink;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_WikiVersion':
					/**
					 * Gets the value for the private _objWikiVersion (Read-Only)
					 * if set due to an expansion on the wiki_version.wiki_item_id reverse relationship
					 * @return WikiVersion
					 */
					return $this->_objWikiVersion;

				case '_WikiVersionArray':
					/**
					 * Gets the value for the private _objWikiVersionArray (Read-Only)
					 * if set due to an ExpandAsArray on the wiki_version.wiki_item_id reverse relationship
					 * @return WikiVersion[]
					 */
					return (array) $this->_objWikiVersionArray;


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
				case 'Path':
					/**
					 * Sets the value for strPath (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPath = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'WikiItemTypeId':
					/**
					 * Sets the value for intWikiItemTypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intWikiItemTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentWikiVersionId':
					/**
					 * Sets the value for intCurrentWikiVersionId (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCurrentWikiVersion = null;
						return ($this->intCurrentWikiVersionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentName':
					/**
					 * Sets the value for strCurrentName 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCurrentName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentPostedByPersonId':
					/**
					 * Sets the value for intCurrentPostedByPersonId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCurrentPostedByPerson = null;
						return ($this->intCurrentPostedByPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentPostDate':
					/**
					 * Sets the value for dttCurrentPostDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCurrentPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CurrentWikiVersion':
					/**
					 * Sets the value for the WikiVersion object referenced by intCurrentWikiVersionId (Unique)
					 * @param WikiVersion $mixValue
					 * @return WikiVersion
					 */
					if (is_null($mixValue)) {
						$this->intCurrentWikiVersionId = null;
						$this->objCurrentWikiVersion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a WikiVersion object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiVersion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED WikiVersion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CurrentWikiVersion for this WikiItem');

						// Update Local Member Variables
						$this->objCurrentWikiVersion = $mixValue;
						$this->intCurrentWikiVersionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CurrentPostedByPerson':
					/**
					 * Sets the value for the Person object referenced by intCurrentPostedByPersonId 
					 * @param Person $mixValue
					 * @return Person
					 */
					if (is_null($mixValue)) {
						$this->intCurrentPostedByPersonId = null;
						$this->objCurrentPostedByPerson = null;
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
							throw new QCallerException('Unable to set an unsaved CurrentPostedByPerson for this WikiItem');

						// Update Local Member Variables
						$this->objCurrentPostedByPerson = $mixValue;
						$this->intCurrentPostedByPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TopicLink':
					/**
					 * Sets the value for the TopicLink object referenced by objTopicLink (Unique)
					 * @param TopicLink $mixValue
					 * @return TopicLink
					 */
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

			
		
		// Related Objects' Methods for WikiVersion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated WikiVersions as an array of WikiVersion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiVersion[]
		*/ 
		public function GetWikiVersionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return WikiVersion::LoadArrayByWikiItemId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated WikiVersions
		 * @return int
		*/ 
		public function CountWikiVersions() {
			if ((is_null($this->intId)))
				return 0;

			return WikiVersion::CountByWikiItemId($this->intId);
		}

		/**
		 * Associates a WikiVersion
		 * @param WikiVersion $objWikiVersion
		 * @return void
		*/ 
		public function AssociateWikiVersion(WikiVersion $objWikiVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateWikiVersion on this unsaved WikiItem.');
			if ((is_null($objWikiVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateWikiVersion on this WikiItem with an unsaved WikiVersion.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`wiki_version`
				SET
					`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objWikiVersion->Id) . '
			');
		}

		/**
		 * Unassociates a WikiVersion
		 * @param WikiVersion $objWikiVersion
		 * @return void
		*/ 
		public function UnassociateWikiVersion(WikiVersion $objWikiVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this unsaved WikiItem.');
			if ((is_null($objWikiVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this WikiItem with an unsaved WikiVersion.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`wiki_version`
				SET
					`wiki_item_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objWikiVersion->Id) . ' AND
					`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all WikiVersions
		 * @return void
		*/ 
		public function UnassociateAllWikiVersions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this unsaved WikiItem.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`wiki_version`
				SET
					`wiki_item_id` = null
				WHERE
					`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated WikiVersion
		 * @param WikiVersion $objWikiVersion
		 * @return void
		*/ 
		public function DeleteAssociatedWikiVersion(WikiVersion $objWikiVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this unsaved WikiItem.');
			if ((is_null($objWikiVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this WikiItem with an unsaved WikiVersion.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_version`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objWikiVersion->Id) . ' AND
					`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated WikiVersions
		 * @return void
		*/ 
		public function DeleteAllWikiVersions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateWikiVersion on this unsaved WikiItem.');

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_version`
				WHERE
					`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="WikiItem"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Path" type="xsd:string"/>';
			$strToReturn .= '<element name="WikiItemTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="CurrentWikiVersion" type="xsd1:WikiVersion"/>';
			$strToReturn .= '<element name="CurrentName" type="xsd:string"/>';
			$strToReturn .= '<element name="CurrentPostedByPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="CurrentPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('WikiItem', $strComplexTypeArray)) {
				$strComplexTypeArray['WikiItem'] = WikiItem::GetSoapComplexTypeXml();
				WikiVersion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, WikiItem::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new WikiItem();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Path'))
				$objToReturn->strPath = $objSoapObject->Path;
			if (property_exists($objSoapObject, 'WikiItemTypeId'))
				$objToReturn->intWikiItemTypeId = $objSoapObject->WikiItemTypeId;
			if ((property_exists($objSoapObject, 'CurrentWikiVersion')) &&
				($objSoapObject->CurrentWikiVersion))
				$objToReturn->CurrentWikiVersion = WikiVersion::GetObjectFromSoapObject($objSoapObject->CurrentWikiVersion);
			if (property_exists($objSoapObject, 'CurrentName'))
				$objToReturn->strCurrentName = $objSoapObject->CurrentName;
			if ((property_exists($objSoapObject, 'CurrentPostedByPerson')) &&
				($objSoapObject->CurrentPostedByPerson))
				$objToReturn->CurrentPostedByPerson = Person::GetObjectFromSoapObject($objSoapObject->CurrentPostedByPerson);
			if (property_exists($objSoapObject, 'CurrentPostDate'))
				$objToReturn->dttCurrentPostDate = new QDateTime($objSoapObject->CurrentPostDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, WikiItem::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCurrentWikiVersion)
				$objObject->objCurrentWikiVersion = WikiVersion::GetSoapObjectFromObject($objObject->objCurrentWikiVersion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCurrentWikiVersionId = null;
			if ($objObject->objCurrentPostedByPerson)
				$objObject->objCurrentPostedByPerson = Person::GetSoapObjectFromObject($objObject->objCurrentPostedByPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCurrentPostedByPersonId = null;
			if ($objObject->dttCurrentPostDate)
				$objObject->dttCurrentPostDate = $objObject->dttCurrentPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeWikiItem extends QQNode {
		protected $strTableName = 'wiki_item';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'WikiItem';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Path':
					return new QQNode('path', 'Path', 'string', $this);
				case 'WikiItemTypeId':
					return new QQNode('wiki_item_type_id', 'WikiItemTypeId', 'integer', $this);
				case 'CurrentWikiVersionId':
					return new QQNode('current_wiki_version_id', 'CurrentWikiVersionId', 'integer', $this);
				case 'CurrentWikiVersion':
					return new QQNodeWikiVersion('current_wiki_version_id', 'CurrentWikiVersion', 'integer', $this);
				case 'CurrentName':
					return new QQNode('current_name', 'CurrentName', 'string', $this);
				case 'CurrentPostedByPersonId':
					return new QQNode('current_posted_by_person_id', 'CurrentPostedByPersonId', 'integer', $this);
				case 'CurrentPostedByPerson':
					return new QQNodePerson('current_posted_by_person_id', 'CurrentPostedByPerson', 'integer', $this);
				case 'CurrentPostDate':
					return new QQNode('current_post_date', 'CurrentPostDate', 'QDateTime', $this);
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'wiki_item_id', 'TopicLink');
				case 'WikiVersion':
					return new QQReverseReferenceNodeWikiVersion($this, 'wikiversion', 'reverse_reference', 'wiki_item_id');

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

	class QQReverseReferenceNodeWikiItem extends QQReverseReferenceNode {
		protected $strTableName = 'wiki_item';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'WikiItem';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Path':
					return new QQNode('path', 'Path', 'string', $this);
				case 'WikiItemTypeId':
					return new QQNode('wiki_item_type_id', 'WikiItemTypeId', 'integer', $this);
				case 'CurrentWikiVersionId':
					return new QQNode('current_wiki_version_id', 'CurrentWikiVersionId', 'integer', $this);
				case 'CurrentWikiVersion':
					return new QQNodeWikiVersion('current_wiki_version_id', 'CurrentWikiVersion', 'integer', $this);
				case 'CurrentName':
					return new QQNode('current_name', 'CurrentName', 'string', $this);
				case 'CurrentPostedByPersonId':
					return new QQNode('current_posted_by_person_id', 'CurrentPostedByPersonId', 'integer', $this);
				case 'CurrentPostedByPerson':
					return new QQNodePerson('current_posted_by_person_id', 'CurrentPostedByPerson', 'integer', $this);
				case 'CurrentPostDate':
					return new QQNode('current_post_date', 'CurrentPostDate', 'QDateTime', $this);
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'wiki_item_id', 'TopicLink');
				case 'WikiVersion':
					return new QQReverseReferenceNodeWikiVersion($this, 'wikiversion', 'reverse_reference', 'wiki_item_id');

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