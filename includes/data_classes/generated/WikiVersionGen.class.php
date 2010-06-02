<?php
	/**
	 * The abstract WikiVersionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the WikiVersion subclass which
	 * extends this WikiVersionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiVersion class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $WikiItemId the value for intWikiItemId (Not Null)
	 * @property integer $VersionNumber the value for intVersionNumber (Not Null)
	 * @property string $Name the value for strName 
	 * @property integer $PostedByPersonId the value for intPostedByPersonId (Not Null)
	 * @property QDateTime $PostDate the value for dttPostDate (Not Null)
	 * @property WikiItem $WikiItem the value for the WikiItem object referenced by intWikiItemId (Not Null)
	 * @property Person $PostedByPerson the value for the Person object referenced by intPostedByPersonId (Not Null)
	 * @property WikiFile $WikiFile the value for the WikiFile object that uniquely references this WikiVersion
	 * @property WikiImage $WikiImage the value for the WikiImage object that uniquely references this WikiVersion
	 * @property WikiItem $WikiItemAsCurrent the value for the WikiItem object that uniquely references this WikiVersion
	 * @property WikiPage $WikiPage the value for the WikiPage object that uniquely references this WikiVersion
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WikiVersionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column wiki_version.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_version.wiki_item_id
		 * @var integer intWikiItemId
		 */
		protected $intWikiItemId;
		const WikiItemIdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_version.version_number
		 * @var integer intVersionNumber
		 */
		protected $intVersionNumber;
		const VersionNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_version.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_version.posted_by_person_id
		 * @var integer intPostedByPersonId
		 */
		protected $intPostedByPersonId;
		const PostedByPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_version.post_date
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
		 * in the database column wiki_version.wiki_item_id.
		 *
		 * NOTE: Always use the WikiItem property getter to correctly retrieve this WikiItem object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiItem objWikiItem
		 */
		protected $objWikiItem;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column wiki_version.posted_by_person_id.
		 *
		 * NOTE: Always use the PostedByPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPostedByPerson
		 */
		protected $objPostedByPerson;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column wiki_file.wiki_version_id.
		 *
		 * NOTE: Always use the WikiFile property getter to correctly retrieve this WikiFile object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiFile objWikiFile
		 */
		protected $objWikiFile;
		
		/**
		 * Used internally to manage whether the adjoined WikiFile object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyWikiFile;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column wiki_image.wiki_version_id.
		 *
		 * NOTE: Always use the WikiImage property getter to correctly retrieve this WikiImage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiImage objWikiImage
		 */
		protected $objWikiImage;
		
		/**
		 * Used internally to manage whether the adjoined WikiImage object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyWikiImage;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column wiki_item.current_wiki_version_id.
		 *
		 * NOTE: Always use the WikiItemAsCurrent property getter to correctly retrieve this WikiItem object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiItem objWikiItemAsCurrent
		 */
		protected $objWikiItemAsCurrent;
		
		/**
		 * Used internally to manage whether the adjoined WikiItemAsCurrent object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyWikiItemAsCurrent;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column wiki_page.wiki_version_id.
		 *
		 * NOTE: Always use the WikiPage property getter to correctly retrieve this WikiPage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiPage objWikiPage
		 */
		protected $objWikiPage;
		
		/**
		 * Used internally to manage whether the adjoined WikiPage object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyWikiPage;





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
		 * Load a WikiVersion from PK Info
		 * @param integer $intId
		 * @return WikiVersion
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return WikiVersion::QuerySingle(
				QQ::Equal(QQN::WikiVersion()->Id, $intId)
			);
		}

		/**
		 * Load all WikiVersions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiVersion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call WikiVersion::QueryArray to perform the LoadAll query
			try {
				return WikiVersion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all WikiVersions
		 * @return int
		 */
		public static function CountAll() {
			// Call WikiVersion::QueryCount to perform the CountAll query
			return WikiVersion::QueryCount(QQ::All());
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
			$objDatabase = WikiVersion::GetDatabase();

			// Create/Build out the QueryBuilder object with WikiVersion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'wiki_version');
			WikiVersion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('wiki_version');

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
		 * Static Qcodo Query method to query for a single WikiVersion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiVersion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new WikiVersion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiVersion::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of WikiVersion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiVersion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiVersion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = WikiVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of WikiVersion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = WikiVersion::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'wiki_version_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with WikiVersion-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				WikiVersion::GetSelectFields($objQueryBuilder);
				WikiVersion::GetFromFields($objQueryBuilder);

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
			return WikiVersion::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this WikiVersion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'wiki_version';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'wiki_item_id', $strAliasPrefix . 'wiki_item_id');
			$objBuilder->AddSelectItem($strTableName, 'version_number', $strAliasPrefix . 'version_number');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'posted_by_person_id', $strAliasPrefix . 'posted_by_person_id');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a WikiVersion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this WikiVersion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return WikiVersion
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the WikiVersion object
			$objToReturn = new WikiVersion();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'wiki_item_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'wiki_item_id'] : $strAliasPrefix . 'wiki_item_id';
			$objToReturn->intWikiItemId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'version_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'version_number'] : $strAliasPrefix . 'version_number';
			$objToReturn->intVersionNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'posted_by_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'posted_by_person_id'] : $strAliasPrefix . 'posted_by_person_id';
			$objToReturn->intPostedByPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'wiki_version__';

			// Check for WikiItem Early Binding
			$strAlias = $strAliasPrefix . 'wiki_item_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWikiItem = WikiItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wiki_item_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PostedByPerson Early Binding
			$strAlias = $strAliasPrefix . 'posted_by_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPostedByPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'posted_by_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for WikiFile Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'wikifile__wiki_version_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objWikiFile = WikiFile::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikifile__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objWikiFile = false;
			}

			// Check for WikiImage Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'wikiimage__wiki_version_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objWikiImage = WikiImage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiimage__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objWikiImage = false;
			}

			// Check for WikiItemAsCurrent Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'wikiitemascurrent__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objWikiItemAsCurrent = WikiItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikiitemascurrent__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objWikiItemAsCurrent = false;
			}

			// Check for WikiPage Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'wikipage__wiki_version_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objWikiPage = WikiPage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wikipage__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objWikiPage = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of WikiVersions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return WikiVersion[]
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
					$objItem = WikiVersion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = WikiVersion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single WikiVersion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return WikiVersion next row resulting from the query
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
			return WikiVersion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single WikiVersion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return WikiVersion
		*/
		public static function LoadById($intId) {
			return WikiVersion::QuerySingle(
				QQ::Equal(QQN::WikiVersion()->Id, $intId)
			);
		}
			
		/**
		 * Load a single WikiVersion object,
		 * by WikiItemId, VersionNumber Index(es)
		 * @param integer $intWikiItemId
		 * @param integer $intVersionNumber
		 * @return WikiVersion
		*/
		public static function LoadByWikiItemIdVersionNumber($intWikiItemId, $intVersionNumber) {
			return WikiVersion::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::WikiVersion()->WikiItemId, $intWikiItemId),
				QQ::Equal(QQN::WikiVersion()->VersionNumber, $intVersionNumber)
				)
			);
		}
			
		/**
		 * Load an array of WikiVersion objects,
		 * by WikiItemId Index(es)
		 * @param integer $intWikiItemId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiVersion[]
		*/
		public static function LoadArrayByWikiItemId($intWikiItemId, $objOptionalClauses = null) {
			// Call WikiVersion::QueryArray to perform the LoadArrayByWikiItemId query
			try {
				return WikiVersion::QueryArray(
					QQ::Equal(QQN::WikiVersion()->WikiItemId, $intWikiItemId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WikiVersions
		 * by WikiItemId Index(es)
		 * @param integer $intWikiItemId
		 * @return int
		*/
		public static function CountByWikiItemId($intWikiItemId) {
			// Call WikiVersion::QueryCount to perform the CountByWikiItemId query
			return WikiVersion::QueryCount(
				QQ::Equal(QQN::WikiVersion()->WikiItemId, $intWikiItemId)
			);
		}
			
		/**
		 * Load an array of WikiVersion objects,
		 * by PostedByPersonId Index(es)
		 * @param integer $intPostedByPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiVersion[]
		*/
		public static function LoadArrayByPostedByPersonId($intPostedByPersonId, $objOptionalClauses = null) {
			// Call WikiVersion::QueryArray to perform the LoadArrayByPostedByPersonId query
			try {
				return WikiVersion::QueryArray(
					QQ::Equal(QQN::WikiVersion()->PostedByPersonId, $intPostedByPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count WikiVersions
		 * by PostedByPersonId Index(es)
		 * @param integer $intPostedByPersonId
		 * @return int
		*/
		public static function CountByPostedByPersonId($intPostedByPersonId) {
			// Call WikiVersion::QueryCount to perform the CountByPostedByPersonId query
			return WikiVersion::QueryCount(
				QQ::Equal(QQN::WikiVersion()->PostedByPersonId, $intPostedByPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this WikiVersion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = WikiVersion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `wiki_version` (
							`wiki_item_id`,
							`version_number`,
							`name`,
							`posted_by_person_id`,
							`post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intWikiItemId) . ',
							' . $objDatabase->SqlVariable($this->intVersionNumber) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intPostedByPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('wiki_version', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`wiki_version`
						SET
							`wiki_item_id` = ' . $objDatabase->SqlVariable($this->intWikiItemId) . ',
							`version_number` = ' . $objDatabase->SqlVariable($this->intVersionNumber) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`posted_by_person_id` = ' . $objDatabase->SqlVariable($this->intPostedByPersonId) . ',
							`post_date` = ' . $objDatabase->SqlVariable($this->dttPostDate) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

		
		
				// Update the adjoined WikiFile object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyWikiFile) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = WikiFile::LoadByWikiVersionId($this->intId)) {
						$objAssociated->WikiVersionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objWikiFile) {
						$this->objWikiFile->WikiVersionId = $this->intId;
						$this->objWikiFile->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyWikiFile = false;
				}
		
		
				// Update the adjoined WikiImage object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyWikiImage) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = WikiImage::LoadByWikiVersionId($this->intId)) {
						$objAssociated->WikiVersionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objWikiImage) {
						$this->objWikiImage->WikiVersionId = $this->intId;
						$this->objWikiImage->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyWikiImage = false;
				}
		
		
				// Update the adjoined WikiItemAsCurrent object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyWikiItemAsCurrent) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = WikiItem::LoadByCurrentWikiVersionId($this->intId)) {
						$objAssociated->CurrentWikiVersionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objWikiItemAsCurrent) {
						$this->objWikiItemAsCurrent->CurrentWikiVersionId = $this->intId;
						$this->objWikiItemAsCurrent->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyWikiItemAsCurrent = false;
				}
		
		
				// Update the adjoined WikiPage object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyWikiPage) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = WikiPage::LoadByWikiVersionId($this->intId)) {
						$objAssociated->WikiVersionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objWikiPage) {
						$this->objWikiPage->WikiVersionId = $this->intId;
						$this->objWikiPage->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyWikiPage = false;
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
		 * Delete this WikiVersion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this WikiVersion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = WikiVersion::GetDatabase();

			
			
			// Update the adjoined WikiFile object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = WikiFile::LoadByWikiVersionId($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined WikiImage object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = WikiImage::LoadByWikiVersionId($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined WikiItemAsCurrent object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = WikiItem::LoadByCurrentWikiVersionId($this->intId)) {
				$objAssociated->CurrentWikiVersionId = null;
				$objAssociated->Save();
			}
			
			
			// Update the adjoined WikiPage object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = WikiPage::LoadByWikiVersionId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_version`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all WikiVersions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = WikiVersion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_version`');
		}

		/**
		 * Truncate wiki_version table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = WikiVersion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `wiki_version`');
		}

		/**
		 * Reload this WikiVersion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved WikiVersion object.');

			// Reload the Object
			$objReloaded = WikiVersion::Load($this->intId);

			// Update $this's local variables to match
			$this->WikiItemId = $objReloaded->WikiItemId;
			$this->intVersionNumber = $objReloaded->intVersionNumber;
			$this->strName = $objReloaded->strName;
			$this->PostedByPersonId = $objReloaded->PostedByPersonId;
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
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'WikiItemId':
					// Gets the value for intWikiItemId (Not Null)
					// @return integer
					return $this->intWikiItemId;

				case 'VersionNumber':
					// Gets the value for intVersionNumber (Not Null)
					// @return integer
					return $this->intVersionNumber;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'PostedByPersonId':
					// Gets the value for intPostedByPersonId (Not Null)
					// @return integer
					return $this->intPostedByPersonId;

				case 'PostDate':
					// Gets the value for dttPostDate (Not Null)
					// @return QDateTime
					return $this->dttPostDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'WikiItem':
					// Gets the value for the WikiItem object referenced by intWikiItemId (Not Null)
					// @return WikiItem
					try {
						if ((!$this->objWikiItem) && (!is_null($this->intWikiItemId)))
							$this->objWikiItem = WikiItem::Load($this->intWikiItemId);
						return $this->objWikiItem;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostedByPerson':
					// Gets the value for the Person object referenced by intPostedByPersonId (Not Null)
					// @return Person
					try {
						if ((!$this->objPostedByPerson) && (!is_null($this->intPostedByPersonId)))
							$this->objPostedByPerson = Person::Load($this->intPostedByPersonId);
						return $this->objPostedByPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'WikiFile':
					// Gets the value for the WikiFile object that uniquely references this WikiVersion
					// by objWikiFile (Unique)
					// @return WikiFile
					try {
						if ($this->objWikiFile === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objWikiFile)
							$this->objWikiFile = WikiFile::LoadByWikiVersionId($this->intId);
						return $this->objWikiFile;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'WikiImage':
					// Gets the value for the WikiImage object that uniquely references this WikiVersion
					// by objWikiImage (Unique)
					// @return WikiImage
					try {
						if ($this->objWikiImage === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objWikiImage)
							$this->objWikiImage = WikiImage::LoadByWikiVersionId($this->intId);
						return $this->objWikiImage;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'WikiItemAsCurrent':
					// Gets the value for the WikiItem object that uniquely references this WikiVersion
					// by objWikiItemAsCurrent (Unique)
					// @return WikiItem
					try {
						if ($this->objWikiItemAsCurrent === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objWikiItemAsCurrent)
							$this->objWikiItemAsCurrent = WikiItem::LoadByCurrentWikiVersionId($this->intId);
						return $this->objWikiItemAsCurrent;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'WikiPage':
					// Gets the value for the WikiPage object that uniquely references this WikiVersion
					// by objWikiPage (Unique)
					// @return WikiPage
					try {
						if ($this->objWikiPage === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objWikiPage)
							$this->objWikiPage = WikiPage::LoadByWikiVersionId($this->intId);
						return $this->objWikiPage;
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
				case 'WikiItemId':
					// Sets the value for intWikiItemId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objWikiItem = null;
						return ($this->intWikiItemId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VersionNumber':
					// Sets the value for intVersionNumber (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intVersionNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostedByPersonId':
					// Sets the value for intPostedByPersonId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPostedByPerson = null;
						return ($this->intPostedByPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostDate':
					// Sets the value for dttPostDate (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'WikiItem':
					// Sets the value for the WikiItem object referenced by intWikiItemId (Not Null)
					// @param WikiItem $mixValue
					// @return WikiItem
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
							throw new QCallerException('Unable to set an unsaved WikiItem for this WikiVersion');

						// Update Local Member Variables
						$this->objWikiItem = $mixValue;
						$this->intWikiItemId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PostedByPerson':
					// Sets the value for the Person object referenced by intPostedByPersonId (Not Null)
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intPostedByPersonId = null;
						$this->objPostedByPerson = null;
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
							throw new QCallerException('Unable to set an unsaved PostedByPerson for this WikiVersion');

						// Update Local Member Variables
						$this->objPostedByPerson = $mixValue;
						$this->intPostedByPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WikiFile':
					// Sets the value for the WikiFile object referenced by objWikiFile (Unique)
					// @param WikiFile $mixValue
					// @return WikiFile
					if (is_null($mixValue)) {
						$this->objWikiFile = null;

						// Make sure we update the adjoined WikiFile object the next time we call Save()
						$this->blnDirtyWikiFile = true;

						return null;
					} else {
						// Make sure $mixValue actually is a WikiFile object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiFile');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objWikiFile to a DIFFERENT $mixValue?
						if ((!$this->WikiFile) || ($this->WikiFile->WikiVersionId != $mixValue->WikiVersionId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined WikiFile object the next time we call Save()
							$this->blnDirtyWikiFile = true;

							// Update Local Member Variable
							$this->objWikiFile = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WikiImage':
					// Sets the value for the WikiImage object referenced by objWikiImage (Unique)
					// @param WikiImage $mixValue
					// @return WikiImage
					if (is_null($mixValue)) {
						$this->objWikiImage = null;

						// Make sure we update the adjoined WikiImage object the next time we call Save()
						$this->blnDirtyWikiImage = true;

						return null;
					} else {
						// Make sure $mixValue actually is a WikiImage object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiImage');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objWikiImage to a DIFFERENT $mixValue?
						if ((!$this->WikiImage) || ($this->WikiImage->WikiVersionId != $mixValue->WikiVersionId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined WikiImage object the next time we call Save()
							$this->blnDirtyWikiImage = true;

							// Update Local Member Variable
							$this->objWikiImage = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WikiItemAsCurrent':
					// Sets the value for the WikiItem object referenced by objWikiItemAsCurrent (Unique)
					// @param WikiItem $mixValue
					// @return WikiItem
					if (is_null($mixValue)) {
						$this->objWikiItemAsCurrent = null;

						// Make sure we update the adjoined WikiItem object the next time we call Save()
						$this->blnDirtyWikiItemAsCurrent = true;

						return null;
					} else {
						// Make sure $mixValue actually is a WikiItem object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiItem');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objWikiItemAsCurrent to a DIFFERENT $mixValue?
						if ((!$this->WikiItemAsCurrent) || ($this->WikiItemAsCurrent->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined WikiItem object the next time we call Save()
							$this->blnDirtyWikiItemAsCurrent = true;

							// Update Local Member Variable
							$this->objWikiItemAsCurrent = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WikiPage':
					// Sets the value for the WikiPage object referenced by objWikiPage (Unique)
					// @param WikiPage $mixValue
					// @return WikiPage
					if (is_null($mixValue)) {
						$this->objWikiPage = null;

						// Make sure we update the adjoined WikiPage object the next time we call Save()
						$this->blnDirtyWikiPage = true;

						return null;
					} else {
						// Make sure $mixValue actually is a WikiPage object
						try {
							$mixValue = QType::Cast($mixValue, 'WikiPage');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objWikiPage to a DIFFERENT $mixValue?
						if ((!$this->WikiPage) || ($this->WikiPage->WikiVersionId != $mixValue->WikiVersionId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined WikiPage object the next time we call Save()
							$this->blnDirtyWikiPage = true;

							// Update Local Member Variable
							$this->objWikiPage = $mixValue;
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
			$strToReturn = '<complexType name="WikiVersion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="WikiItem" type="xsd1:WikiItem"/>';
			$strToReturn .= '<element name="VersionNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="PostedByPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('WikiVersion', $strComplexTypeArray)) {
				$strComplexTypeArray['WikiVersion'] = WikiVersion::GetSoapComplexTypeXml();
				WikiItem::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, WikiVersion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new WikiVersion();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'WikiItem')) &&
				($objSoapObject->WikiItem))
				$objToReturn->WikiItem = WikiItem::GetObjectFromSoapObject($objSoapObject->WikiItem);
			if (property_exists($objSoapObject, 'VersionNumber'))
				$objToReturn->intVersionNumber = $objSoapObject->VersionNumber;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'PostedByPerson')) &&
				($objSoapObject->PostedByPerson))
				$objToReturn->PostedByPerson = Person::GetObjectFromSoapObject($objSoapObject->PostedByPerson);
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
				array_push($objArrayToReturn, WikiVersion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objWikiItem)
				$objObject->objWikiItem = WikiItem::GetSoapObjectFromObject($objObject->objWikiItem, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWikiItemId = null;
			if ($objObject->objPostedByPerson)
				$objObject->objPostedByPerson = Person::GetSoapObjectFromObject($objObject->objPostedByPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPostedByPersonId = null;
			if ($objObject->dttPostDate)
				$objObject->dttPostDate = $objObject->dttPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeWikiVersion extends QQNode {
		protected $strTableName = 'wiki_version';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'WikiVersion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'WikiItemId':
					return new QQNode('wiki_item_id', 'WikiItemId', 'integer', $this);
				case 'WikiItem':
					return new QQNodeWikiItem('wiki_item_id', 'WikiItem', 'integer', $this);
				case 'VersionNumber':
					return new QQNode('version_number', 'VersionNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PostedByPersonId':
					return new QQNode('posted_by_person_id', 'PostedByPersonId', 'integer', $this);
				case 'PostedByPerson':
					return new QQNodePerson('posted_by_person_id', 'PostedByPerson', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'WikiFile':
					return new QQReverseReferenceNodeWikiFile($this, 'wikifile', 'reverse_reference', 'wiki_version_id', 'WikiFile');
				case 'WikiImage':
					return new QQReverseReferenceNodeWikiImage($this, 'wikiimage', 'reverse_reference', 'wiki_version_id', 'WikiImage');
				case 'WikiItemAsCurrent':
					return new QQReverseReferenceNodeWikiItem($this, 'wikiitemascurrent', 'reverse_reference', 'current_wiki_version_id', 'WikiItemAsCurrent');
				case 'WikiPage':
					return new QQReverseReferenceNodeWikiPage($this, 'wikipage', 'reverse_reference', 'wiki_version_id', 'WikiPage');

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

	class QQReverseReferenceNodeWikiVersion extends QQReverseReferenceNode {
		protected $strTableName = 'wiki_version';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'WikiVersion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'WikiItemId':
					return new QQNode('wiki_item_id', 'WikiItemId', 'integer', $this);
				case 'WikiItem':
					return new QQNodeWikiItem('wiki_item_id', 'WikiItem', 'integer', $this);
				case 'VersionNumber':
					return new QQNode('version_number', 'VersionNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PostedByPersonId':
					return new QQNode('posted_by_person_id', 'PostedByPersonId', 'integer', $this);
				case 'PostedByPerson':
					return new QQNodePerson('posted_by_person_id', 'PostedByPerson', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'WikiFile':
					return new QQReverseReferenceNodeWikiFile($this, 'wikifile', 'reverse_reference', 'wiki_version_id', 'WikiFile');
				case 'WikiImage':
					return new QQReverseReferenceNodeWikiImage($this, 'wikiimage', 'reverse_reference', 'wiki_version_id', 'WikiImage');
				case 'WikiItemAsCurrent':
					return new QQReverseReferenceNodeWikiItem($this, 'wikiitemascurrent', 'reverse_reference', 'current_wiki_version_id', 'WikiItemAsCurrent');
				case 'WikiPage':
					return new QQReverseReferenceNodeWikiPage($this, 'wikipage', 'reverse_reference', 'wiki_version_id', 'WikiPage');

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