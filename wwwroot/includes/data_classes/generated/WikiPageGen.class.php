<?php
	/**
	 * The abstract WikiPageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the WikiPage subclass which
	 * extends this WikiPageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiPage class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $WikiVersionId the value for intWikiVersionId (PK)
	 * @property string $Content the value for strContent 
	 * @property string $CompiledHtml the value for strCompiledHtml 
	 * @property integer $ViewCount the value for intViewCount 
	 * @property WikiVersion $WikiVersion the value for the WikiVersion object referenced by intWikiVersionId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class WikiPageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column wiki_page.wiki_version_id
		 * @var integer intWikiVersionId
		 */
		protected $intWikiVersionId;
		const WikiVersionIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intWikiVersionId;
		 */
		protected $__intWikiVersionId;

		/**
		 * Protected member variable that maps to the database column wiki_page.content
		 * @var string strContent
		 */
		protected $strContent;
		const ContentDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_page.compiled_html
		 * @var string strCompiledHtml
		 */
		protected $strCompiledHtml;
		const CompiledHtmlDefault = null;


		/**
		 * Protected member variable that maps to the database column wiki_page.view_count
		 * @var integer intViewCount
		 */
		protected $intViewCount;
		const ViewCountDefault = null;


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
		 * in the database column wiki_page.wiki_version_id.
		 *
		 * NOTE: Always use the WikiVersion property getter to correctly retrieve this WikiVersion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WikiVersion objWikiVersion
		 */
		protected $objWikiVersion;





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
		 * Load a WikiPage from PK Info
		 * @param integer $intWikiVersionId
		 * @return WikiPage
		 */
		public static function Load($intWikiVersionId) {
			// Use QuerySingle to Perform the Query
			return WikiPage::QuerySingle(
				QQ::Equal(QQN::WikiPage()->WikiVersionId, $intWikiVersionId)
			);
		}

		/**
		 * Load all WikiPages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return WikiPage[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call WikiPage::QueryArray to perform the LoadAll query
			try {
				return WikiPage::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all WikiPages
		 * @return int
		 */
		public static function CountAll() {
			// Call WikiPage::QueryCount to perform the CountAll query
			return WikiPage::QueryCount(QQ::All());
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
			$objDatabase = WikiPage::GetDatabase();

			// Create/Build out the QueryBuilder object with WikiPage-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'wiki_page');
			WikiPage::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('wiki_page');

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
		 * Static Qcodo Query method to query for a single WikiPage object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiPage the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiPage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new WikiPage object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiPage::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of WikiPage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return WikiPage[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiPage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return WikiPage::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of WikiPage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = WikiPage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = WikiPage::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'wiki_page_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with WikiPage-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				WikiPage::GetSelectFields($objQueryBuilder);
				WikiPage::GetFromFields($objQueryBuilder);

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
			return WikiPage::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this WikiPage
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'wiki_page';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'wiki_version_id', $strAliasPrefix . 'wiki_version_id');
			$objBuilder->AddSelectItem($strTableName, 'content', $strAliasPrefix . 'content');
			$objBuilder->AddSelectItem($strTableName, 'compiled_html', $strAliasPrefix . 'compiled_html');
			$objBuilder->AddSelectItem($strTableName, 'view_count', $strAliasPrefix . 'view_count');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a WikiPage from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this WikiPage::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return WikiPage
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the WikiPage object
			$objToReturn = new WikiPage();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'wiki_version_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'wiki_version_id'] : $strAliasPrefix . 'wiki_version_id';
			$objToReturn->intWikiVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intWikiVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'content', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'content'] : $strAliasPrefix . 'content';
			$objToReturn->strContent = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'compiled_html', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'compiled_html'] : $strAliasPrefix . 'compiled_html';
			$objToReturn->strCompiledHtml = $objDbRow->GetColumn($strAliasName, 'Blob');
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
				$strAliasPrefix = 'wiki_page__';

			// Check for WikiVersion Early Binding
			$strAlias = $strAliasPrefix . 'wiki_version_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWikiVersion = WikiVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'wiki_version_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of WikiPages from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return WikiPage[]
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
					$objItem = WikiPage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = WikiPage::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single WikiPage object,
		 * by WikiVersionId Index(es)
		 * @param integer $intWikiVersionId
		 * @return WikiPage
		*/
		public static function LoadByWikiVersionId($intWikiVersionId) {
			return WikiPage::QuerySingle(
				QQ::Equal(QQN::WikiPage()->WikiVersionId, $intWikiVersionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this WikiPage
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = WikiPage::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `wiki_page` (
							`wiki_version_id`,
							`content`,
							`compiled_html`,
							`view_count`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intWikiVersionId) . ',
							' . $objDatabase->SqlVariable($this->strContent) . ',
							' . $objDatabase->SqlVariable($this->strCompiledHtml) . ',
							' . $objDatabase->SqlVariable($this->intViewCount) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`wiki_page`
						SET
							`wiki_version_id` = ' . $objDatabase->SqlVariable($this->intWikiVersionId) . ',
							`content` = ' . $objDatabase->SqlVariable($this->strContent) . ',
							`compiled_html` = ' . $objDatabase->SqlVariable($this->strCompiledHtml) . ',
							`view_count` = ' . $objDatabase->SqlVariable($this->intViewCount) . '
						WHERE
							`wiki_version_id` = ' . $objDatabase->SqlVariable($this->__intWikiVersionId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intWikiVersionId = $this->intWikiVersionId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this WikiPage
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intWikiVersionId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this WikiPage with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = WikiPage::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_page`
				WHERE
					`wiki_version_id` = ' . $objDatabase->SqlVariable($this->intWikiVersionId) . '');
		}

		/**
		 * Delete all WikiPages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = WikiPage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`wiki_page`');
		}

		/**
		 * Truncate wiki_page table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = WikiPage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `wiki_page`');
		}

		/**
		 * Reload this WikiPage from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved WikiPage object.');

			// Reload the Object
			$objReloaded = WikiPage::Load($this->intWikiVersionId);

			// Update $this's local variables to match
			$this->WikiVersionId = $objReloaded->WikiVersionId;
			$this->__intWikiVersionId = $this->intWikiVersionId;
			$this->strContent = $objReloaded->strContent;
			$this->strCompiledHtml = $objReloaded->strCompiledHtml;
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
				case 'WikiVersionId':
					/**
					 * Gets the value for intWikiVersionId (PK)
					 * @return integer
					 */
					return $this->intWikiVersionId;

				case 'Content':
					/**
					 * Gets the value for strContent 
					 * @return string
					 */
					return $this->strContent;

				case 'CompiledHtml':
					/**
					 * Gets the value for strCompiledHtml 
					 * @return string
					 */
					return $this->strCompiledHtml;

				case 'ViewCount':
					/**
					 * Gets the value for intViewCount 
					 * @return integer
					 */
					return $this->intViewCount;


				///////////////////
				// Member Objects
				///////////////////
				case 'WikiVersion':
					/**
					 * Gets the value for the WikiVersion object referenced by intWikiVersionId (PK)
					 * @return WikiVersion
					 */
					try {
						if ((!$this->objWikiVersion) && (!is_null($this->intWikiVersionId)))
							$this->objWikiVersion = WikiVersion::Load($this->intWikiVersionId);
						return $this->objWikiVersion;
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
				case 'WikiVersionId':
					/**
					 * Sets the value for intWikiVersionId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objWikiVersion = null;
						return ($this->intWikiVersionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Content':
					/**
					 * Sets the value for strContent 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CompiledHtml':
					/**
					 * Sets the value for strCompiledHtml 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCompiledHtml = QType::Cast($mixValue, QType::String));
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
				case 'WikiVersion':
					/**
					 * Sets the value for the WikiVersion object referenced by intWikiVersionId (PK)
					 * @param WikiVersion $mixValue
					 * @return WikiVersion
					 */
					if (is_null($mixValue)) {
						$this->intWikiVersionId = null;
						$this->objWikiVersion = null;
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
							throw new QCallerException('Unable to set an unsaved WikiVersion for this WikiPage');

						// Update Local Member Variables
						$this->objWikiVersion = $mixValue;
						$this->intWikiVersionId = $mixValue->Id;

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
			$strToReturn = '<complexType name="WikiPage"><sequence>';
			$strToReturn .= '<element name="WikiVersion" type="xsd1:WikiVersion"/>';
			$strToReturn .= '<element name="Content" type="xsd:string"/>';
			$strToReturn .= '<element name="CompiledHtml" type="xsd:string"/>';
			$strToReturn .= '<element name="ViewCount" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('WikiPage', $strComplexTypeArray)) {
				$strComplexTypeArray['WikiPage'] = WikiPage::GetSoapComplexTypeXml();
				WikiVersion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, WikiPage::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new WikiPage();
			if ((property_exists($objSoapObject, 'WikiVersion')) &&
				($objSoapObject->WikiVersion))
				$objToReturn->WikiVersion = WikiVersion::GetObjectFromSoapObject($objSoapObject->WikiVersion);
			if (property_exists($objSoapObject, 'Content'))
				$objToReturn->strContent = $objSoapObject->Content;
			if (property_exists($objSoapObject, 'CompiledHtml'))
				$objToReturn->strCompiledHtml = $objSoapObject->CompiledHtml;
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
				array_push($objArrayToReturn, WikiPage::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objWikiVersion)
				$objObject->objWikiVersion = WikiVersion::GetSoapObjectFromObject($objObject->objWikiVersion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWikiVersionId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeWikiPage extends QQNode {
		protected $strTableName = 'wiki_page';
		protected $strPrimaryKey = 'wiki_version_id';
		protected $strClassName = 'WikiPage';
		public function __get($strName) {
			switch ($strName) {
				case 'WikiVersionId':
					return new QQNode('wiki_version_id', 'WikiVersionId', 'integer', $this);
				case 'WikiVersion':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersion', 'integer', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'CompiledHtml':
					return new QQNode('compiled_html', 'CompiledHtml', 'string', $this);
				case 'ViewCount':
					return new QQNode('view_count', 'ViewCount', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersionId', 'integer', $this);
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

	class QQReverseReferenceNodeWikiPage extends QQReverseReferenceNode {
		protected $strTableName = 'wiki_page';
		protected $strPrimaryKey = 'wiki_version_id';
		protected $strClassName = 'WikiPage';
		public function __get($strName) {
			switch ($strName) {
				case 'WikiVersionId':
					return new QQNode('wiki_version_id', 'WikiVersionId', 'integer', $this);
				case 'WikiVersion':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersion', 'integer', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'CompiledHtml':
					return new QQNode('compiled_html', 'CompiledHtml', 'string', $this);
				case 'ViewCount':
					return new QQNode('view_count', 'ViewCount', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeWikiVersion('wiki_version_id', 'WikiVersionId', 'integer', $this);
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