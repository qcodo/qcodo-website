<?php
	/**
	 * The abstract PackageContributionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PackageContribution subclass which
	 * extends this PackageContributionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PackageContribution class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PackageId the value for intPackageId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $CurrentPackageVersionId the value for intCurrentPackageVersionId 
	 * @property QDateTime $CurrentPostDate the value for dttCurrentPostDate 
	 * @property integer $DownloadCount the value for intDownloadCount 
	 * @property Package $Package the value for the Package object referenced by intPackageId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property PackageVersion $CurrentPackageVersion the value for the PackageVersion object referenced by intCurrentPackageVersionId 
	 * @property-read PackageVersion $_PackageVersion the value for the private _objPackageVersion (Read-Only) if set due to an expansion on the package_version.package_contribution_id reverse relationship
	 * @property-read PackageVersion[] $_PackageVersionArray the value for the private _objPackageVersionArray (Read-Only) if set due to an ExpandAsArray on the package_version.package_contribution_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PackageContributionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column package_contribution.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_contribution.package_id
		 * @var integer intPackageId
		 */
		protected $intPackageId;
		const PackageIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_contribution.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_contribution.current_package_version_id
		 * @var integer intCurrentPackageVersionId
		 */
		protected $intCurrentPackageVersionId;
		const CurrentPackageVersionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_contribution.current_post_date
		 * @var QDateTime dttCurrentPostDate
		 */
		protected $dttCurrentPostDate;
		const CurrentPostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column package_contribution.download_count
		 * @var integer intDownloadCount
		 */
		protected $intDownloadCount;
		const DownloadCountDefault = null;


		/**
		 * Private member variable that stores a reference to a single PackageVersion object
		 * (of type PackageVersion), if this PackageContribution object was restored with
		 * an expansion on the package_version association table.
		 * @var PackageVersion _objPackageVersion;
		 */
		private $_objPackageVersion;

		/**
		 * Private member variable that stores a reference to an array of PackageVersion objects
		 * (of type PackageVersion[]), if this PackageContribution object was restored with
		 * an ExpandAsArray on the package_version association table.
		 * @var PackageVersion[] _objPackageVersionArray;
		 */
		private $_objPackageVersionArray = array();

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
		 * in the database column package_contribution.package_id.
		 *
		 * NOTE: Always use the Package property getter to correctly retrieve this Package object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Package objPackage
		 */
		protected $objPackage;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column package_contribution.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column package_contribution.current_package_version_id.
		 *
		 * NOTE: Always use the CurrentPackageVersion property getter to correctly retrieve this PackageVersion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PackageVersion objCurrentPackageVersion
		 */
		protected $objCurrentPackageVersion;





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
		 * Load a PackageContribution from PK Info
		 * @param integer $intId
		 * @return PackageContribution
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PackageContribution::QuerySingle(
				QQ::Equal(QQN::PackageContribution()->Id, $intId)
			);
		}

		/**
		 * Load all PackageContributions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PackageContribution::QueryArray to perform the LoadAll query
			try {
				return PackageContribution::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PackageContributions
		 * @return int
		 */
		public static function CountAll() {
			// Call PackageContribution::QueryCount to perform the CountAll query
			return PackageContribution::QueryCount(QQ::All());
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
			$objDatabase = PackageContribution::GetDatabase();

			// Create/Build out the QueryBuilder object with PackageContribution-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'package_contribution');
			PackageContribution::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('package_contribution');

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
		 * Static Qcodo Query method to query for a single PackageContribution object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageContribution the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PackageContribution object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageContribution::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of PackageContribution objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageContribution[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageContribution::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of PackageContribution objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PackageContribution::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'package_contribution_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PackageContribution-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PackageContribution::GetSelectFields($objQueryBuilder);
				PackageContribution::GetFromFields($objQueryBuilder);

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
			return PackageContribution::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PackageContribution
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'package_contribution';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'package_id', $strAliasPrefix . 'package_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'current_package_version_id', $strAliasPrefix . 'current_package_version_id');
			$objBuilder->AddSelectItem($strTableName, 'current_post_date', $strAliasPrefix . 'current_post_date');
			$objBuilder->AddSelectItem($strTableName, 'download_count', $strAliasPrefix . 'download_count');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PackageContribution from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PackageContribution::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PackageContribution
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
					$strAliasPrefix = 'package_contribution__';


				$strAlias = $strAliasPrefix . 'packageversion__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPackageVersionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPackageVersionArray[$intPreviousChildItemCount - 1];
						$objChildItem = PackageVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packageversion__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPackageVersionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPackageVersionArray[] = PackageVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packageversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'package_contribution__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the PackageContribution object
			$objToReturn = new PackageContribution();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'package_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'package_id'] : $strAliasPrefix . 'package_id';
			$objToReturn->intPackageId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_package_version_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_package_version_id'] : $strAliasPrefix . 'current_package_version_id';
			$objToReturn->intCurrentPackageVersionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_post_date'] : $strAliasPrefix . 'current_post_date';
			$objToReturn->dttCurrentPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'download_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'download_count'] : $strAliasPrefix . 'download_count';
			$objToReturn->intDownloadCount = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'package_contribution__';

			// Check for Package Early Binding
			$strAlias = $strAliasPrefix . 'package_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPackage = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CurrentPackageVersion Early Binding
			$strAlias = $strAliasPrefix . 'current_package_version_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCurrentPackageVersion = PackageVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'current_package_version_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for PackageVersion Virtual Binding
			$strAlias = $strAliasPrefix . 'packageversion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPackageVersionArray[] = PackageVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packageversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPackageVersion = PackageVersion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packageversion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of PackageContributions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PackageContribution[]
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
					$objItem = PackageContribution::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PackageContribution::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PackageContribution object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PackageContribution
		*/
		public static function LoadById($intId) {
			return PackageContribution::QuerySingle(
				QQ::Equal(QQN::PackageContribution()->Id, $intId)
			);
		}
			
		/**
		 * Load a single PackageContribution object,
		 * by PackageId, PersonId Index(es)
		 * @param integer $intPackageId
		 * @param integer $intPersonId
		 * @return PackageContribution
		*/
		public static function LoadByPackageIdPersonId($intPackageId, $intPersonId) {
			return PackageContribution::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::PackageContribution()->PackageId, $intPackageId),
				QQ::Equal(QQN::PackageContribution()->PersonId, $intPersonId)
				)
			);
		}
			
		/**
		 * Load an array of PackageContribution objects,
		 * by PackageId Index(es)
		 * @param integer $intPackageId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		*/
		public static function LoadArrayByPackageId($intPackageId, $objOptionalClauses = null) {
			// Call PackageContribution::QueryArray to perform the LoadArrayByPackageId query
			try {
				return PackageContribution::QueryArray(
					QQ::Equal(QQN::PackageContribution()->PackageId, $intPackageId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PackageContributions
		 * by PackageId Index(es)
		 * @param integer $intPackageId
		 * @return int
		*/
		public static function CountByPackageId($intPackageId) {
			// Call PackageContribution::QueryCount to perform the CountByPackageId query
			return PackageContribution::QueryCount(
				QQ::Equal(QQN::PackageContribution()->PackageId, $intPackageId)
			);
		}
			
		/**
		 * Load an array of PackageContribution objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call PackageContribution::QueryArray to perform the LoadArrayByPersonId query
			try {
				return PackageContribution::QueryArray(
					QQ::Equal(QQN::PackageContribution()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PackageContributions
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call PackageContribution::QueryCount to perform the CountByPersonId query
			return PackageContribution::QueryCount(
				QQ::Equal(QQN::PackageContribution()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of PackageContribution objects,
		 * by CurrentPackageVersionId Index(es)
		 * @param integer $intCurrentPackageVersionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		*/
		public static function LoadArrayByCurrentPackageVersionId($intCurrentPackageVersionId, $objOptionalClauses = null) {
			// Call PackageContribution::QueryArray to perform the LoadArrayByCurrentPackageVersionId query
			try {
				return PackageContribution::QueryArray(
					QQ::Equal(QQN::PackageContribution()->CurrentPackageVersionId, $intCurrentPackageVersionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PackageContributions
		 * by CurrentPackageVersionId Index(es)
		 * @param integer $intCurrentPackageVersionId
		 * @return int
		*/
		public static function CountByCurrentPackageVersionId($intCurrentPackageVersionId) {
			// Call PackageContribution::QueryCount to perform the CountByCurrentPackageVersionId query
			return PackageContribution::QueryCount(
				QQ::Equal(QQN::PackageContribution()->CurrentPackageVersionId, $intCurrentPackageVersionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PackageContribution
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `package_contribution` (
							`package_id`,
							`person_id`,
							`current_package_version_id`,
							`current_post_date`,
							`download_count`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPackageId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intCurrentPackageVersionId) . ',
							' . $objDatabase->SqlVariable($this->dttCurrentPostDate) . ',
							' . $objDatabase->SqlVariable($this->intDownloadCount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('package_contribution', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`package_contribution`
						SET
							`package_id` = ' . $objDatabase->SqlVariable($this->intPackageId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intCurrentPackageVersionId) . ',
							`current_post_date` = ' . $objDatabase->SqlVariable($this->dttCurrentPostDate) . ',
							`download_count` = ' . $objDatabase->SqlVariable($this->intDownloadCount) . '
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
		 * Delete this PackageContribution
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PackageContribution with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all PackageContributions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`');
		}

		/**
		 * Truncate package_contribution table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `package_contribution`');
		}

		/**
		 * Reload this PackageContribution from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PackageContribution object.');

			// Reload the Object
			$objReloaded = PackageContribution::Load($this->intId);

			// Update $this's local variables to match
			$this->PackageId = $objReloaded->PackageId;
			$this->PersonId = $objReloaded->PersonId;
			$this->CurrentPackageVersionId = $objReloaded->CurrentPackageVersionId;
			$this->dttCurrentPostDate = $objReloaded->dttCurrentPostDate;
			$this->intDownloadCount = $objReloaded->intDownloadCount;
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

				case 'PackageId':
					/**
					 * Gets the value for intPackageId (Not Null)
					 * @return integer
					 */
					return $this->intPackageId;

				case 'PersonId':
					/**
					 * Gets the value for intPersonId (Not Null)
					 * @return integer
					 */
					return $this->intPersonId;

				case 'CurrentPackageVersionId':
					/**
					 * Gets the value for intCurrentPackageVersionId 
					 * @return integer
					 */
					return $this->intCurrentPackageVersionId;

				case 'CurrentPostDate':
					/**
					 * Gets the value for dttCurrentPostDate 
					 * @return QDateTime
					 */
					return $this->dttCurrentPostDate;

				case 'DownloadCount':
					/**
					 * Gets the value for intDownloadCount 
					 * @return integer
					 */
					return $this->intDownloadCount;


				///////////////////
				// Member Objects
				///////////////////
				case 'Package':
					/**
					 * Gets the value for the Package object referenced by intPackageId (Not Null)
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

				case 'CurrentPackageVersion':
					/**
					 * Gets the value for the PackageVersion object referenced by intCurrentPackageVersionId 
					 * @return PackageVersion
					 */
					try {
						if ((!$this->objCurrentPackageVersion) && (!is_null($this->intCurrentPackageVersionId)))
							$this->objCurrentPackageVersion = PackageVersion::Load($this->intCurrentPackageVersionId);
						return $this->objCurrentPackageVersion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PackageVersion':
					/**
					 * Gets the value for the private _objPackageVersion (Read-Only)
					 * if set due to an expansion on the package_version.package_contribution_id reverse relationship
					 * @return PackageVersion
					 */
					return $this->_objPackageVersion;

				case '_PackageVersionArray':
					/**
					 * Gets the value for the private _objPackageVersionArray (Read-Only)
					 * if set due to an ExpandAsArray on the package_version.package_contribution_id reverse relationship
					 * @return PackageVersion[]
					 */
					return (array) $this->_objPackageVersionArray;


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
				case 'PackageId':
					/**
					 * Sets the value for intPackageId (Not Null)
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

				case 'CurrentPackageVersionId':
					/**
					 * Sets the value for intCurrentPackageVersionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCurrentPackageVersion = null;
						return ($this->intCurrentPackageVersionId = QType::Cast($mixValue, QType::Integer));
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

				case 'DownloadCount':
					/**
					 * Sets the value for intDownloadCount 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDownloadCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Package':
					/**
					 * Sets the value for the Package object referenced by intPackageId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Package for this PackageContribution');

						// Update Local Member Variables
						$this->objPackage = $mixValue;
						$this->intPackageId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Person for this PackageContribution');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CurrentPackageVersion':
					/**
					 * Sets the value for the PackageVersion object referenced by intCurrentPackageVersionId 
					 * @param PackageVersion $mixValue
					 * @return PackageVersion
					 */
					if (is_null($mixValue)) {
						$this->intCurrentPackageVersionId = null;
						$this->objCurrentPackageVersion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PackageVersion object
						try {
							$mixValue = QType::Cast($mixValue, 'PackageVersion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PackageVersion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CurrentPackageVersion for this PackageContribution');

						// Update Local Member Variables
						$this->objCurrentPackageVersion = $mixValue;
						$this->intCurrentPackageVersionId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for PackageVersion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PackageVersions as an array of PackageVersion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageVersion[]
		*/ 
		public function GetPackageVersionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PackageVersion::LoadArrayByPackageContributionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PackageVersions
		 * @return int
		*/ 
		public function CountPackageVersions() {
			if ((is_null($this->intId)))
				return 0;

			return PackageVersion::CountByPackageContributionId($this->intId);
		}

		/**
		 * Associates a PackageVersion
		 * @param PackageVersion $objPackageVersion
		 * @return void
		*/ 
		public function AssociatePackageVersion(PackageVersion $objPackageVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageVersion on this unsaved PackageContribution.');
			if ((is_null($objPackageVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageVersion on this PackageContribution with an unsaved PackageVersion.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_version`
				SET
					`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageVersion->Id) . '
			');
		}

		/**
		 * Unassociates a PackageVersion
		 * @param PackageVersion $objPackageVersion
		 * @return void
		*/ 
		public function UnassociatePackageVersion(PackageVersion $objPackageVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this unsaved PackageContribution.');
			if ((is_null($objPackageVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this PackageContribution with an unsaved PackageVersion.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_version`
				SET
					`package_contribution_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageVersion->Id) . ' AND
					`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PackageVersions
		 * @return void
		*/ 
		public function UnassociateAllPackageVersions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_version`
				SET
					`package_contribution_id` = null
				WHERE
					`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PackageVersion
		 * @param PackageVersion $objPackageVersion
		 * @return void
		*/ 
		public function DeleteAssociatedPackageVersion(PackageVersion $objPackageVersion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this unsaved PackageContribution.');
			if ((is_null($objPackageVersion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this PackageContribution with an unsaved PackageVersion.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_version`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageVersion->Id) . ' AND
					`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PackageVersions
		 * @return void
		*/ 
		public function DeleteAllPackageVersions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageVersion on this unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = PackageContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_version`
				WHERE
					`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="PackageContribution"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Package" type="xsd1:Package"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="CurrentPackageVersion" type="xsd1:PackageVersion"/>';
			$strToReturn .= '<element name="CurrentPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DownloadCount" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PackageContribution', $strComplexTypeArray)) {
				$strComplexTypeArray['PackageContribution'] = PackageContribution::GetSoapComplexTypeXml();
				Package::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				PackageVersion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PackageContribution::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PackageContribution();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Package')) &&
				($objSoapObject->Package))
				$objToReturn->Package = Package::GetObjectFromSoapObject($objSoapObject->Package);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'CurrentPackageVersion')) &&
				($objSoapObject->CurrentPackageVersion))
				$objToReturn->CurrentPackageVersion = PackageVersion::GetObjectFromSoapObject($objSoapObject->CurrentPackageVersion);
			if (property_exists($objSoapObject, 'CurrentPostDate'))
				$objToReturn->dttCurrentPostDate = new QDateTime($objSoapObject->CurrentPostDate);
			if (property_exists($objSoapObject, 'DownloadCount'))
				$objToReturn->intDownloadCount = $objSoapObject->DownloadCount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PackageContribution::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPackage)
				$objObject->objPackage = Package::GetSoapObjectFromObject($objObject->objPackage, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPackageId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objCurrentPackageVersion)
				$objObject->objCurrentPackageVersion = PackageVersion::GetSoapObjectFromObject($objObject->objCurrentPackageVersion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCurrentPackageVersionId = null;
			if ($objObject->dttCurrentPostDate)
				$objObject->dttCurrentPostDate = $objObject->dttCurrentPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePackageContribution extends QQNode {
		protected $strTableName = 'package_contribution';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageContribution';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageId':
					return new QQNode('package_id', 'PackageId', 'integer', $this);
				case 'Package':
					return new QQNodePackage('package_id', 'Package', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'CurrentPackageVersionId':
					return new QQNode('current_package_version_id', 'CurrentPackageVersionId', 'integer', $this);
				case 'CurrentPackageVersion':
					return new QQNodePackageVersion('current_package_version_id', 'CurrentPackageVersion', 'integer', $this);
				case 'CurrentPostDate':
					return new QQNode('current_post_date', 'CurrentPostDate', 'QDateTime', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PackageVersion':
					return new QQReverseReferenceNodePackageVersion($this, 'packageversion', 'reverse_reference', 'package_contribution_id');

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

	class QQReverseReferenceNodePackageContribution extends QQReverseReferenceNode {
		protected $strTableName = 'package_contribution';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageContribution';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageId':
					return new QQNode('package_id', 'PackageId', 'integer', $this);
				case 'Package':
					return new QQNodePackage('package_id', 'Package', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'CurrentPackageVersionId':
					return new QQNode('current_package_version_id', 'CurrentPackageVersionId', 'integer', $this);
				case 'CurrentPackageVersion':
					return new QQNodePackageVersion('current_package_version_id', 'CurrentPackageVersion', 'integer', $this);
				case 'CurrentPostDate':
					return new QQNode('current_post_date', 'CurrentPostDate', 'QDateTime', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PackageVersion':
					return new QQReverseReferenceNodePackageVersion($this, 'packageversion', 'reverse_reference', 'package_contribution_id');

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