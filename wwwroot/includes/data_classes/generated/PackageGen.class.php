<?php
	/**
	 * The abstract PackageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Package subclass which
	 * extends this PackageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Package class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PackageCategoryId the value for intPackageCategoryId (Not Null)
	 * @property string $Token the value for strToken (Unique)
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property QDateTime $LastPostDate the value for dttLastPostDate 
	 * @property integer $LastPostedByPersonId the value for intLastPostedByPersonId 
	 * @property PackageCategory $PackageCategory the value for the PackageCategory object referenced by intPackageCategoryId (Not Null)
	 * @property Person $LastPostedByPerson the value for the Person object referenced by intLastPostedByPersonId 
	 * @property TopicLink $TopicLink the value for the TopicLink object that uniquely references this Package
	 * @property-read PackageContribution $_PackageContribution the value for the private _objPackageContribution (Read-Only) if set due to an expansion on the package_contribution.package_id reverse relationship
	 * @property-read PackageContribution[] $_PackageContributionArray the value for the private _objPackageContributionArray (Read-Only) if set due to an ExpandAsArray on the package_contribution.package_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PackageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column package.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column package.package_category_id
		 * @var integer intPackageCategoryId
		 */
		protected $intPackageCategoryId;
		const PackageCategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 80;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column package.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column package.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column package.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column package.last_posted_by_person_id
		 * @var integer intLastPostedByPersonId
		 */
		protected $intLastPostedByPersonId;
		const LastPostedByPersonIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single PackageContribution object
		 * (of type PackageContribution), if this Package object was restored with
		 * an expansion on the package_contribution association table.
		 * @var PackageContribution _objPackageContribution;
		 */
		private $_objPackageContribution;

		/**
		 * Private member variable that stores a reference to an array of PackageContribution objects
		 * (of type PackageContribution[]), if this Package object was restored with
		 * an ExpandAsArray on the package_contribution association table.
		 * @var PackageContribution[] _objPackageContributionArray;
		 */
		private $_objPackageContributionArray = array();

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
		 * in the database column package.package_category_id.
		 *
		 * NOTE: Always use the PackageCategory property getter to correctly retrieve this PackageCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PackageCategory objPackageCategory
		 */
		protected $objPackageCategory;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column package.last_posted_by_person_id.
		 *
		 * NOTE: Always use the LastPostedByPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objLastPostedByPerson
		 */
		protected $objLastPostedByPerson;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column topic_link.package_id.
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
		 * Load a Package from PK Info
		 * @param integer $intId
		 * @return Package
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Package::QuerySingle(
				QQ::Equal(QQN::Package()->Id, $intId)
			);
		}

		/**
		 * Load all Packages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Package[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Package::QueryArray to perform the LoadAll query
			try {
				return Package::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Packages
		 * @return int
		 */
		public static function CountAll() {
			// Call Package::QueryCount to perform the CountAll query
			return Package::QueryCount(QQ::All());
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
			$objDatabase = Package::GetDatabase();

			// Create/Build out the QueryBuilder object with Package-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'package');
			Package::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('package');

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
		 * Static Qcodo Query method to query for a single Package object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Package the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Package::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Package object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Package::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Package objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Package[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Package::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Package::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Package objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Package::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Package::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'package_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Package-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Package::GetSelectFields($objQueryBuilder);
				Package::GetFromFields($objQueryBuilder);

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
			return Package::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Package
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'package';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'package_category_id', $strAliasPrefix . 'package_category_id');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'last_post_date', $strAliasPrefix . 'last_post_date');
			$objBuilder->AddSelectItem($strTableName, 'last_posted_by_person_id', $strAliasPrefix . 'last_posted_by_person_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Package from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Package::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Package
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
					$strAliasPrefix = 'package__';


				$strAlias = $strAliasPrefix . 'packagecontribution__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPackageContributionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPackageContributionArray[$intPreviousChildItemCount - 1];
						$objChildItem = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontribution__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPackageContributionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPackageContributionArray[] = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'package__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Package object
			$objToReturn = new Package();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'package_category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'package_category_id'] : $strAliasPrefix . 'package_category_id';
			$objToReturn->intPackageCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_post_date'] : $strAliasPrefix . 'last_post_date';
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_posted_by_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_posted_by_person_id'] : $strAliasPrefix . 'last_posted_by_person_id';
			$objToReturn->intLastPostedByPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'package__';

			// Check for PackageCategory Early Binding
			$strAlias = $strAliasPrefix . 'package_category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPackageCategory = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package_category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for LastPostedByPerson Early Binding
			$strAlias = $strAliasPrefix . 'last_posted_by_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLastPostedByPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'last_posted_by_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


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



			// Check for PackageContribution Virtual Binding
			$strAlias = $strAliasPrefix . 'packagecontribution__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPackageContributionArray[] = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPackageContribution = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Packages from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Package[]
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
					$objItem = Package::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Package::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Package object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Package
		*/
		public static function LoadById($intId) {
			return Package::QuerySingle(
				QQ::Equal(QQN::Package()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Package object,
		 * by Token Index(es)
		 * @param string $strToken
		 * @return Package
		*/
		public static function LoadByToken($strToken) {
			return Package::QuerySingle(
				QQ::Equal(QQN::Package()->Token, $strToken)
			);
		}
			
		/**
		 * Load an array of Package objects,
		 * by PackageCategoryId Index(es)
		 * @param integer $intPackageCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Package[]
		*/
		public static function LoadArrayByPackageCategoryId($intPackageCategoryId, $objOptionalClauses = null) {
			// Call Package::QueryArray to perform the LoadArrayByPackageCategoryId query
			try {
				return Package::QueryArray(
					QQ::Equal(QQN::Package()->PackageCategoryId, $intPackageCategoryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Packages
		 * by PackageCategoryId Index(es)
		 * @param integer $intPackageCategoryId
		 * @return int
		*/
		public static function CountByPackageCategoryId($intPackageCategoryId) {
			// Call Package::QueryCount to perform the CountByPackageCategoryId query
			return Package::QueryCount(
				QQ::Equal(QQN::Package()->PackageCategoryId, $intPackageCategoryId)
			);
		}
			
		/**
		 * Load an array of Package objects,
		 * by LastPostedByPersonId Index(es)
		 * @param integer $intLastPostedByPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Package[]
		*/
		public static function LoadArrayByLastPostedByPersonId($intLastPostedByPersonId, $objOptionalClauses = null) {
			// Call Package::QueryArray to perform the LoadArrayByLastPostedByPersonId query
			try {
				return Package::QueryArray(
					QQ::Equal(QQN::Package()->LastPostedByPersonId, $intLastPostedByPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Packages
		 * by LastPostedByPersonId Index(es)
		 * @param integer $intLastPostedByPersonId
		 * @return int
		*/
		public static function CountByLastPostedByPersonId($intLastPostedByPersonId) {
			// Call Package::QueryCount to perform the CountByLastPostedByPersonId query
			return Package::QueryCount(
				QQ::Equal(QQN::Package()->LastPostedByPersonId, $intLastPostedByPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Package
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `package` (
							`package_category_id`,
							`token`,
							`name`,
							`description`,
							`last_post_date`,
							`last_posted_by_person_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPackageCategoryId) . ',
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							' . $objDatabase->SqlVariable($this->intLastPostedByPersonId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('package', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`package`
						SET
							`package_category_id` = ' . $objDatabase->SqlVariable($this->intPackageCategoryId) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . ',
							`last_posted_by_person_id` = ' . $objDatabase->SqlVariable($this->intLastPostedByPersonId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

		
		
				// Update the adjoined TopicLink object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyTopicLink) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = TopicLink::LoadByPackageId($this->intId)) {
						$objAssociated->PackageId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objTopicLink) {
						$this->objTopicLink->PackageId = $this->intId;
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
		 * Delete this Package
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Package with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			
			
			// Update the adjoined TopicLink object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = TopicLink::LoadByPackageId($this->intId)) {
				$objAssociated->PackageId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Packages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package`');
		}

		/**
		 * Truncate package table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `package`');
		}

		/**
		 * Reload this Package from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Package object.');

			// Reload the Object
			$objReloaded = Package::Load($this->intId);

			// Update $this's local variables to match
			$this->PackageCategoryId = $objReloaded->PackageCategoryId;
			$this->strToken = $objReloaded->strToken;
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
			$this->LastPostedByPersonId = $objReloaded->LastPostedByPersonId;
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

				case 'PackageCategoryId':
					/**
					 * Gets the value for intPackageCategoryId (Not Null)
					 * @return integer
					 */
					return $this->intPackageCategoryId;

				case 'Token':
					/**
					 * Gets the value for strToken (Unique)
					 * @return string
					 */
					return $this->strToken;

				case 'Name':
					/**
					 * Gets the value for strName 
					 * @return string
					 */
					return $this->strName;

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

				case 'LastPostedByPersonId':
					/**
					 * Gets the value for intLastPostedByPersonId 
					 * @return integer
					 */
					return $this->intLastPostedByPersonId;


				///////////////////
				// Member Objects
				///////////////////
				case 'PackageCategory':
					/**
					 * Gets the value for the PackageCategory object referenced by intPackageCategoryId (Not Null)
					 * @return PackageCategory
					 */
					try {
						if ((!$this->objPackageCategory) && (!is_null($this->intPackageCategoryId)))
							$this->objPackageCategory = PackageCategory::Load($this->intPackageCategoryId);
						return $this->objPackageCategory;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastPostedByPerson':
					/**
					 * Gets the value for the Person object referenced by intLastPostedByPersonId 
					 * @return Person
					 */
					try {
						if ((!$this->objLastPostedByPerson) && (!is_null($this->intLastPostedByPersonId)))
							$this->objLastPostedByPerson = Person::Load($this->intLastPostedByPersonId);
						return $this->objLastPostedByPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'TopicLink':
					/**
					 * Gets the value for the TopicLink object that uniquely references this Package
					 * by objTopicLink (Unique)
					 * @return TopicLink
					 */
					try {
						if ($this->objTopicLink === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objTopicLink)
							$this->objTopicLink = TopicLink::LoadByPackageId($this->intId);
						return $this->objTopicLink;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PackageContribution':
					/**
					 * Gets the value for the private _objPackageContribution (Read-Only)
					 * if set due to an expansion on the package_contribution.package_id reverse relationship
					 * @return PackageContribution
					 */
					return $this->_objPackageContribution;

				case '_PackageContributionArray':
					/**
					 * Gets the value for the private _objPackageContributionArray (Read-Only)
					 * if set due to an ExpandAsArray on the package_contribution.package_id reverse relationship
					 * @return PackageContribution[]
					 */
					return (array) $this->_objPackageContributionArray;


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
				case 'PackageCategoryId':
					/**
					 * Sets the value for intPackageCategoryId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPackageCategory = null;
						return ($this->intPackageCategoryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Token':
					/**
					 * Sets the value for strToken (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
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

				case 'LastPostedByPersonId':
					/**
					 * Sets the value for intLastPostedByPersonId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objLastPostedByPerson = null;
						return ($this->intLastPostedByPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'PackageCategory':
					/**
					 * Sets the value for the PackageCategory object referenced by intPackageCategoryId (Not Null)
					 * @param PackageCategory $mixValue
					 * @return PackageCategory
					 */
					if (is_null($mixValue)) {
						$this->intPackageCategoryId = null;
						$this->objPackageCategory = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PackageCategory object
						try {
							$mixValue = QType::Cast($mixValue, 'PackageCategory');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PackageCategory object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PackageCategory for this Package');

						// Update Local Member Variables
						$this->objPackageCategory = $mixValue;
						$this->intPackageCategoryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'LastPostedByPerson':
					/**
					 * Sets the value for the Person object referenced by intLastPostedByPersonId 
					 * @param Person $mixValue
					 * @return Person
					 */
					if (is_null($mixValue)) {
						$this->intLastPostedByPersonId = null;
						$this->objLastPostedByPerson = null;
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
							throw new QCallerException('Unable to set an unsaved LastPostedByPerson for this Package');

						// Update Local Member Variables
						$this->objLastPostedByPerson = $mixValue;
						$this->intLastPostedByPersonId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for PackageContribution
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PackageContributions as an array of PackageContribution objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		*/ 
		public function GetPackageContributionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PackageContribution::LoadArrayByPackageId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PackageContributions
		 * @return int
		*/ 
		public function CountPackageContributions() {
			if ((is_null($this->intId)))
				return 0;

			return PackageContribution::CountByPackageId($this->intId);
		}

		/**
		 * Associates a PackageContribution
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function AssociatePackageContribution(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageContribution on this unsaved Package.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageContribution on this Package with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`package_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . '
			');
		}

		/**
		 * Unassociates a PackageContribution
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function UnassociatePackageContribution(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this unsaved Package.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this Package with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`package_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . ' AND
					`package_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PackageContributions
		 * @return void
		*/ 
		public function UnassociateAllPackageContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this unsaved Package.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`package_id` = null
				WHERE
					`package_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PackageContribution
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function DeleteAssociatedPackageContribution(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this unsaved Package.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this Package with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . ' AND
					`package_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PackageContributions
		 * @return void
		*/ 
		public function DeleteAllPackageContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContribution on this unsaved Package.');

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`
				WHERE
					`package_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Package"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PackageCategory" type="xsd1:PackageCategory"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="LastPostedByPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Package', $strComplexTypeArray)) {
				$strComplexTypeArray['Package'] = Package::GetSoapComplexTypeXml();
				PackageCategory::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Package::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Package();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'PackageCategory')) &&
				($objSoapObject->PackageCategory))
				$objToReturn->PackageCategory = PackageCategory::GetObjectFromSoapObject($objSoapObject->PackageCategory);
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if ((property_exists($objSoapObject, 'LastPostedByPerson')) &&
				($objSoapObject->LastPostedByPerson))
				$objToReturn->LastPostedByPerson = Person::GetObjectFromSoapObject($objSoapObject->LastPostedByPerson);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Package::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPackageCategory)
				$objObject->objPackageCategory = PackageCategory::GetSoapObjectFromObject($objObject->objPackageCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPackageCategoryId = null;
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			if ($objObject->objLastPostedByPerson)
				$objObject->objLastPostedByPerson = Person::GetSoapObjectFromObject($objObject->objLastPostedByPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLastPostedByPersonId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePackage extends QQNode {
		protected $strTableName = 'package';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Package';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageCategoryId':
					return new QQNode('package_category_id', 'PackageCategoryId', 'integer', $this);
				case 'PackageCategory':
					return new QQNodePackageCategory('package_category_id', 'PackageCategory', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'LastPostedByPersonId':
					return new QQNode('last_posted_by_person_id', 'LastPostedByPersonId', 'integer', $this);
				case 'LastPostedByPerson':
					return new QQNodePerson('last_posted_by_person_id', 'LastPostedByPerson', 'integer', $this);
				case 'PackageContribution':
					return new QQReverseReferenceNodePackageContribution($this, 'packagecontribution', 'reverse_reference', 'package_id');
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'package_id', 'TopicLink');

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

	class QQReverseReferenceNodePackage extends QQReverseReferenceNode {
		protected $strTableName = 'package';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Package';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageCategoryId':
					return new QQNode('package_category_id', 'PackageCategoryId', 'integer', $this);
				case 'PackageCategory':
					return new QQNodePackageCategory('package_category_id', 'PackageCategory', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'LastPostedByPersonId':
					return new QQNode('last_posted_by_person_id', 'LastPostedByPersonId', 'integer', $this);
				case 'LastPostedByPerson':
					return new QQNodePerson('last_posted_by_person_id', 'LastPostedByPerson', 'integer', $this);
				case 'PackageContribution':
					return new QQReverseReferenceNodePackageContribution($this, 'packagecontribution', 'reverse_reference', 'package_id');
				case 'TopicLink':
					return new QQReverseReferenceNodeTopicLink($this, 'topiclink', 'reverse_reference', 'package_id', 'TopicLink');

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