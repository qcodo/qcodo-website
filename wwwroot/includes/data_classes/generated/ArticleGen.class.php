<?php
	/**
	 * The abstract ArticleGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Article subclass which
	 * extends this ArticleGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Article class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ArticleSectionId the value for intArticleSectionId (Not Null)
	 * @property string $Title the value for strTitle (Not Null)
	 * @property string $Description the value for strDescription 
	 * @property string $Byline the value for strByline 
	 * @property string $Article the value for strArticle 
	 * @property QDateTime $PostDate the value for dttPostDate 
	 * @property QDateTime $LastUpdatedDate the value for dttLastUpdatedDate 
	 * @property ArticleSection $ArticleSection the value for the ArticleSection object referenced by intArticleSectionId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ArticleGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column article.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column article.article_section_id
		 * @var integer intArticleSectionId
		 */
		protected $intArticleSectionId;
		const ArticleSectionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column article.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 200;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column article.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column article.byline
		 * @var string strByline
		 */
		protected $strByline;
		const BylineMaxLength = 200;
		const BylineDefault = null;


		/**
		 * Protected member variable that maps to the database column article.article
		 * @var string strArticle
		 */
		protected $strArticle;
		const ArticleDefault = null;


		/**
		 * Protected member variable that maps to the database column article.post_date
		 * @var QDateTime dttPostDate
		 */
		protected $dttPostDate;
		const PostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column article.last_updated_date
		 * @var QDateTime dttLastUpdatedDate
		 */
		protected $dttLastUpdatedDate;
		const LastUpdatedDateDefault = null;


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
		 * in the database column article.article_section_id.
		 *
		 * NOTE: Always use the ArticleSection property getter to correctly retrieve this ArticleSection object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ArticleSection objArticleSection
		 */
		protected $objArticleSection;





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
		 * Load a Article from PK Info
		 * @param integer $intId
		 * @return Article
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Article::QuerySingle(
				QQ::Equal(QQN::Article()->Id, $intId)
			);
		}

		/**
		 * Load all Articles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Article::QueryArray to perform the LoadAll query
			try {
				return Article::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Articles
		 * @return int
		 */
		public static function CountAll() {
			// Call Article::QueryCount to perform the CountAll query
			return Article::QueryCount(QQ::All());
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
			$objDatabase = Article::GetDatabase();

			// Create/Build out the QueryBuilder object with Article-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'article');
			Article::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('article');

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
		 * Static Qcodo Query method to query for a single Article object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Article the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Article object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Article::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Article objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Article[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Article::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Article objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Article::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Article::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'article_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Article-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Article::GetSelectFields($objQueryBuilder);
				Article::GetFromFields($objQueryBuilder);

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
			return Article::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Article
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'article';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'article_section_id', $strAliasPrefix . 'article_section_id');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'byline', $strAliasPrefix . 'byline');
			$objBuilder->AddSelectItem($strTableName, 'article', $strAliasPrefix . 'article');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
			$objBuilder->AddSelectItem($strTableName, 'last_updated_date', $strAliasPrefix . 'last_updated_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Article from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Article::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Article
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Article object
			$objToReturn = new Article();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'article_section_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article_section_id'] : $strAliasPrefix . 'article_section_id';
			$objToReturn->intArticleSectionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'byline', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'byline'] : $strAliasPrefix . 'byline';
			$objToReturn->strByline = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'article', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'article'] : $strAliasPrefix . 'article';
			$objToReturn->strArticle = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'post_date'] : $strAliasPrefix . 'post_date';
			$objToReturn->dttPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_updated_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_updated_date'] : $strAliasPrefix . 'last_updated_date';
			$objToReturn->dttLastUpdatedDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'article__';

			// Check for ArticleSection Early Binding
			$strAlias = $strAliasPrefix . 'article_section_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objArticleSection = ArticleSection::InstantiateDbRow($objDbRow, $strAliasPrefix . 'article_section_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Articles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Article[]
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
					$objItem = Article::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Article::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Article object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Article
		*/
		public static function LoadById($intId) {
			return Article::QuerySingle(
				QQ::Equal(QQN::Article()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Article objects,
		 * by ArticleSectionId Index(es)
		 * @param integer $intArticleSectionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Article[]
		*/
		public static function LoadArrayByArticleSectionId($intArticleSectionId, $objOptionalClauses = null) {
			// Call Article::QueryArray to perform the LoadArrayByArticleSectionId query
			try {
				return Article::QueryArray(
					QQ::Equal(QQN::Article()->ArticleSectionId, $intArticleSectionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Articles
		 * by ArticleSectionId Index(es)
		 * @param integer $intArticleSectionId
		 * @return int
		*/
		public static function CountByArticleSectionId($intArticleSectionId) {
			// Call Article::QueryCount to perform the CountByArticleSectionId query
			return Article::QueryCount(
				QQ::Equal(QQN::Article()->ArticleSectionId, $intArticleSectionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Article
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `article` (
							`article_section_id`,
							`title`,
							`description`,
							`byline`,
							`article`,
							`post_date`,
							`last_updated_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intArticleSectionId) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strByline) . ',
							' . $objDatabase->SqlVariable($this->strArticle) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . ',
							' . $objDatabase->SqlVariable($this->dttLastUpdatedDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('article', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`article`
						SET
							`article_section_id` = ' . $objDatabase->SqlVariable($this->intArticleSectionId) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`byline` = ' . $objDatabase->SqlVariable($this->strByline) . ',
							`article` = ' . $objDatabase->SqlVariable($this->strArticle) . ',
							`post_date` = ' . $objDatabase->SqlVariable($this->dttPostDate) . ',
							`last_updated_date` = ' . $objDatabase->SqlVariable($this->dttLastUpdatedDate) . '
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
		 * Delete this Article
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Article with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Articles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`article`');
		}

		/**
		 * Truncate article table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Article::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `article`');
		}

		/**
		 * Reload this Article from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Article object.');

			// Reload the Object
			$objReloaded = Article::Load($this->intId);

			// Update $this's local variables to match
			$this->ArticleSectionId = $objReloaded->ArticleSectionId;
			$this->strTitle = $objReloaded->strTitle;
			$this->strDescription = $objReloaded->strDescription;
			$this->strByline = $objReloaded->strByline;
			$this->strArticle = $objReloaded->strArticle;
			$this->dttPostDate = $objReloaded->dttPostDate;
			$this->dttLastUpdatedDate = $objReloaded->dttLastUpdatedDate;
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

				case 'ArticleSectionId':
					/**
					 * Gets the value for intArticleSectionId (Not Null)
					 * @return integer
					 */
					return $this->intArticleSectionId;

				case 'Title':
					/**
					 * Gets the value for strTitle (Not Null)
					 * @return string
					 */
					return $this->strTitle;

				case 'Description':
					/**
					 * Gets the value for strDescription 
					 * @return string
					 */
					return $this->strDescription;

				case 'Byline':
					/**
					 * Gets the value for strByline 
					 * @return string
					 */
					return $this->strByline;

				case 'Article':
					/**
					 * Gets the value for strArticle 
					 * @return string
					 */
					return $this->strArticle;

				case 'PostDate':
					/**
					 * Gets the value for dttPostDate 
					 * @return QDateTime
					 */
					return $this->dttPostDate;

				case 'LastUpdatedDate':
					/**
					 * Gets the value for dttLastUpdatedDate 
					 * @return QDateTime
					 */
					return $this->dttLastUpdatedDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleSection':
					/**
					 * Gets the value for the ArticleSection object referenced by intArticleSectionId (Not Null)
					 * @return ArticleSection
					 */
					try {
						if ((!$this->objArticleSection) && (!is_null($this->intArticleSectionId)))
							$this->objArticleSection = ArticleSection::Load($this->intArticleSectionId);
						return $this->objArticleSection;
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
				case 'ArticleSectionId':
					/**
					 * Sets the value for intArticleSectionId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objArticleSection = null;
						return ($this->intArticleSectionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					/**
					 * Sets the value for strTitle (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
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

				case 'Byline':
					/**
					 * Sets the value for strByline 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strByline = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Article':
					/**
					 * Sets the value for strArticle 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strArticle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostDate':
					/**
					 * Sets the value for dttPostDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastUpdatedDate':
					/**
					 * Sets the value for dttLastUpdatedDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttLastUpdatedDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ArticleSection':
					/**
					 * Sets the value for the ArticleSection object referenced by intArticleSectionId (Not Null)
					 * @param ArticleSection $mixValue
					 * @return ArticleSection
					 */
					if (is_null($mixValue)) {
						$this->intArticleSectionId = null;
						$this->objArticleSection = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ArticleSection object
						try {
							$mixValue = QType::Cast($mixValue, 'ArticleSection');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ArticleSection object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ArticleSection for this Article');

						// Update Local Member Variables
						$this->objArticleSection = $mixValue;
						$this->intArticleSectionId = $mixValue->Id;

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
			$strToReturn = '<complexType name="Article"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ArticleSection" type="xsd1:ArticleSection"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Byline" type="xsd:string"/>';
			$strToReturn .= '<element name="Article" type="xsd:string"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="LastUpdatedDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Article', $strComplexTypeArray)) {
				$strComplexTypeArray['Article'] = Article::GetSoapComplexTypeXml();
				ArticleSection::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Article::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Article();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ArticleSection')) &&
				($objSoapObject->ArticleSection))
				$objToReturn->ArticleSection = ArticleSection::GetObjectFromSoapObject($objSoapObject->ArticleSection);
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Byline'))
				$objToReturn->strByline = $objSoapObject->Byline;
			if (property_exists($objSoapObject, 'Article'))
				$objToReturn->strArticle = $objSoapObject->Article;
			if (property_exists($objSoapObject, 'PostDate'))
				$objToReturn->dttPostDate = new QDateTime($objSoapObject->PostDate);
			if (property_exists($objSoapObject, 'LastUpdatedDate'))
				$objToReturn->dttLastUpdatedDate = new QDateTime($objSoapObject->LastUpdatedDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Article::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objArticleSection)
				$objObject->objArticleSection = ArticleSection::GetSoapObjectFromObject($objObject->objArticleSection, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intArticleSectionId = null;
			if ($objObject->dttPostDate)
				$objObject->dttPostDate = $objObject->dttPostDate->__toString(QDateTime::FormatSoap);
			if ($objObject->dttLastUpdatedDate)
				$objObject->dttLastUpdatedDate = $objObject->dttLastUpdatedDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeArticle extends QQNode {
		protected $strTableName = 'article';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Article';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleSectionId':
					return new QQNode('article_section_id', 'ArticleSectionId', 'integer', $this);
				case 'ArticleSection':
					return new QQNodeArticleSection('article_section_id', 'ArticleSection', 'integer', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Byline':
					return new QQNode('byline', 'Byline', 'string', $this);
				case 'Article':
					return new QQNode('article', 'Article', 'string', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'LastUpdatedDate':
					return new QQNode('last_updated_date', 'LastUpdatedDate', 'QDateTime', $this);

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

	class QQReverseReferenceNodeArticle extends QQReverseReferenceNode {
		protected $strTableName = 'article';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Article';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ArticleSectionId':
					return new QQNode('article_section_id', 'ArticleSectionId', 'integer', $this);
				case 'ArticleSection':
					return new QQNodeArticleSection('article_section_id', 'ArticleSection', 'integer', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Byline':
					return new QQNode('byline', 'Byline', 'string', $this);
				case 'Article':
					return new QQNode('article', 'Article', 'string', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'LastUpdatedDate':
					return new QQNode('last_updated_date', 'LastUpdatedDate', 'QDateTime', $this);

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