<?php
	/**
	 * The abstract PackageCategoryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PackageCategory subclass which
	 * extends this PackageCategoryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PackageCategory class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ParentPackageCategoryId the value for intParentPackageCategoryId 
	 * @property string $Token the value for strToken (Unique)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property integer $PackageCount the value for intPackageCount 
	 * @property QDateTime $LastPostDate the value for dttLastPostDate 
	 * @property PackageCategory $ParentPackageCategory the value for the PackageCategory object referenced by intParentPackageCategoryId 
	 * @property Package $_Package the value for the private _objPackage (Read-Only) if set due to an expansion on the package.package_category_id reverse relationship
	 * @property Package[] $_PackageArray the value for the private _objPackageArray (Read-Only) if set due to an ExpandAsArray on the package.package_category_id reverse relationship
	 * @property PackageCategory $_ChildPackageCategory the value for the private _objChildPackageCategory (Read-Only) if set due to an expansion on the package_category.parent_package_category_id reverse relationship
	 * @property PackageCategory[] $_ChildPackageCategoryArray the value for the private _objChildPackageCategoryArray (Read-Only) if set due to an ExpandAsArray on the package_category.parent_package_category_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PackageCategoryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column package_category.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.parent_package_category_id
		 * @var integer intParentPackageCategoryId
		 */
		protected $intParentPackageCategoryId;
		const ParentPackageCategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 80;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.package_count
		 * @var integer intPackageCount
		 */
		protected $intPackageCount;
		const PackageCountDefault = null;


		/**
		 * Protected member variable that maps to the database column package_category.last_post_date
		 * @var QDateTime dttLastPostDate
		 */
		protected $dttLastPostDate;
		const LastPostDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single Package object
		 * (of type Package), if this PackageCategory object was restored with
		 * an expansion on the package association table.
		 * @var Package _objPackage;
		 */
		private $_objPackage;

		/**
		 * Private member variable that stores a reference to an array of Package objects
		 * (of type Package[]), if this PackageCategory object was restored with
		 * an ExpandAsArray on the package association table.
		 * @var Package[] _objPackageArray;
		 */
		private $_objPackageArray = array();

		/**
		 * Private member variable that stores a reference to a single ChildPackageCategory object
		 * (of type PackageCategory), if this PackageCategory object was restored with
		 * an expansion on the package_category association table.
		 * @var PackageCategory _objChildPackageCategory;
		 */
		private $_objChildPackageCategory;

		/**
		 * Private member variable that stores a reference to an array of ChildPackageCategory objects
		 * (of type PackageCategory[]), if this PackageCategory object was restored with
		 * an ExpandAsArray on the package_category association table.
		 * @var PackageCategory[] _objChildPackageCategoryArray;
		 */
		private $_objChildPackageCategoryArray = array();

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
		 * in the database column package_category.parent_package_category_id.
		 *
		 * NOTE: Always use the ParentPackageCategory property getter to correctly retrieve this PackageCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PackageCategory objParentPackageCategory
		 */
		protected $objParentPackageCategory;





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
		 * Load a PackageCategory from PK Info
		 * @param integer $intId
		 * @return PackageCategory
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PackageCategory::QuerySingle(
				QQ::Equal(QQN::PackageCategory()->Id, $intId)
			);
		}

		/**
		 * Load all PackageCategories
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageCategory[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PackageCategory::QueryArray to perform the LoadAll query
			try {
				return PackageCategory::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PackageCategories
		 * @return int
		 */
		public static function CountAll() {
			// Call PackageCategory::QueryCount to perform the CountAll query
			return PackageCategory::QueryCount(QQ::All());
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
			$objDatabase = PackageCategory::GetDatabase();

			// Create/Build out the QueryBuilder object with PackageCategory-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'package_category');
			PackageCategory::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('package_category');

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
		 * Static Qcodo Query method to query for a single PackageCategory object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageCategory the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PackageCategory object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageCategory::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of PackageCategory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageCategory[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageCategory::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PackageCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of PackageCategory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageCategory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PackageCategory::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'package_category_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PackageCategory-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PackageCategory::GetSelectFields($objQueryBuilder);
				PackageCategory::GetFromFields($objQueryBuilder);

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
			return PackageCategory::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PackageCategory
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'package_category';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'parent_package_category_id', $strAliasPrefix . 'parent_package_category_id');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'order_number', $strAliasPrefix . 'order_number');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'package_count', $strAliasPrefix . 'package_count');
			$objBuilder->AddSelectItem($strTableName, 'last_post_date', $strAliasPrefix . 'last_post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PackageCategory from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PackageCategory::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PackageCategory
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
					$strAliasPrefix = 'package_category__';


				$strAlias = $strAliasPrefix . 'package__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPackageArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPackageArray[$intPreviousChildItemCount - 1];
						$objChildItem = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPackageArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPackageArray[] = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'childpackagecategory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildPackageCategoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildPackageCategoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childpackagecategory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildPackageCategoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildPackageCategoryArray[] = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childpackagecategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'package_category__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the PackageCategory object
			$objToReturn = new PackageCategory();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_package_category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_package_category_id'] : $strAliasPrefix . 'parent_package_category_id';
			$objToReturn->intParentPackageCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'order_number'] : $strAliasPrefix . 'order_number';
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'package_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'package_count'] : $strAliasPrefix . 'package_count';
			$objToReturn->intPackageCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_post_date'] : $strAliasPrefix . 'last_post_date';
			$objToReturn->dttLastPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'package_category__';

			// Check for ParentPackageCategory Early Binding
			$strAlias = $strAliasPrefix . 'parent_package_category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPackageCategory = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_package_category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for Package Virtual Binding
			$strAlias = $strAliasPrefix . 'package__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPackageArray[] = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPackage = Package::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ChildPackageCategory Virtual Binding
			$strAlias = $strAliasPrefix . 'childpackagecategory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildPackageCategoryArray[] = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childpackagecategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildPackageCategory = PackageCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childpackagecategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of PackageCategories from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PackageCategory[]
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
					$objItem = PackageCategory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PackageCategory::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single PackageCategory object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PackageCategory next row resulting from the query
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
			return PackageCategory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PackageCategory object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PackageCategory
		*/
		public static function LoadById($intId) {
			return PackageCategory::QuerySingle(
				QQ::Equal(QQN::PackageCategory()->Id, $intId)
			);
		}
			
		/**
		 * Load a single PackageCategory object,
		 * by Token Index(es)
		 * @param string $strToken
		 * @return PackageCategory
		*/
		public static function LoadByToken($strToken) {
			return PackageCategory::QuerySingle(
				QQ::Equal(QQN::PackageCategory()->Token, $strToken)
			);
		}
			
		/**
		 * Load an array of PackageCategory objects,
		 * by ParentPackageCategoryId Index(es)
		 * @param integer $intParentPackageCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageCategory[]
		*/
		public static function LoadArrayByParentPackageCategoryId($intParentPackageCategoryId, $objOptionalClauses = null) {
			// Call PackageCategory::QueryArray to perform the LoadArrayByParentPackageCategoryId query
			try {
				return PackageCategory::QueryArray(
					QQ::Equal(QQN::PackageCategory()->ParentPackageCategoryId, $intParentPackageCategoryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PackageCategories
		 * by ParentPackageCategoryId Index(es)
		 * @param integer $intParentPackageCategoryId
		 * @return int
		*/
		public static function CountByParentPackageCategoryId($intParentPackageCategoryId) {
			// Call PackageCategory::QueryCount to perform the CountByParentPackageCategoryId query
			return PackageCategory::QueryCount(
				QQ::Equal(QQN::PackageCategory()->ParentPackageCategoryId, $intParentPackageCategoryId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PackageCategory
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `package_category` (
							`parent_package_category_id`,
							`token`,
							`order_number`,
							`name`,
							`description`,
							`package_count`,
							`last_post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intParentPackageCategoryId) . ',
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intPackageCount) . ',
							' . $objDatabase->SqlVariable($this->dttLastPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('package_category', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`package_category`
						SET
							`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intParentPackageCategoryId) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`package_count` = ' . $objDatabase->SqlVariable($this->intPackageCount) . ',
							`last_post_date` = ' . $objDatabase->SqlVariable($this->dttLastPostDate) . '
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
		 * Delete this PackageCategory
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PackageCategory with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_category`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all PackageCategories
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_category`');
		}

		/**
		 * Truncate package_category table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `package_category`');
		}

		/**
		 * Reload this PackageCategory from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PackageCategory object.');

			// Reload the Object
			$objReloaded = PackageCategory::Load($this->intId);

			// Update $this's local variables to match
			$this->ParentPackageCategoryId = $objReloaded->ParentPackageCategoryId;
			$this->strToken = $objReloaded->strToken;
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->intPackageCount = $objReloaded->intPackageCount;
			$this->dttLastPostDate = $objReloaded->dttLastPostDate;
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

				case 'ParentPackageCategoryId':
					// Gets the value for intParentPackageCategoryId 
					// @return integer
					return $this->intParentPackageCategoryId;

				case 'Token':
					// Gets the value for strToken (Unique)
					// @return string
					return $this->strToken;

				case 'OrderNumber':
					// Gets the value for intOrderNumber 
					// @return integer
					return $this->intOrderNumber;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'PackageCount':
					// Gets the value for intPackageCount 
					// @return integer
					return $this->intPackageCount;

				case 'LastPostDate':
					// Gets the value for dttLastPostDate 
					// @return QDateTime
					return $this->dttLastPostDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPackageCategory':
					// Gets the value for the PackageCategory object referenced by intParentPackageCategoryId 
					// @return PackageCategory
					try {
						if ((!$this->objParentPackageCategory) && (!is_null($this->intParentPackageCategoryId)))
							$this->objParentPackageCategory = PackageCategory::Load($this->intParentPackageCategoryId);
						return $this->objParentPackageCategory;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Package':
					// Gets the value for the private _objPackage (Read-Only)
					// if set due to an expansion on the package.package_category_id reverse relationship
					// @return Package
					return $this->_objPackage;

				case '_PackageArray':
					// Gets the value for the private _objPackageArray (Read-Only)
					// if set due to an ExpandAsArray on the package.package_category_id reverse relationship
					// @return Package[]
					return (array) $this->_objPackageArray;

				case '_ChildPackageCategory':
					// Gets the value for the private _objChildPackageCategory (Read-Only)
					// if set due to an expansion on the package_category.parent_package_category_id reverse relationship
					// @return PackageCategory
					return $this->_objChildPackageCategory;

				case '_ChildPackageCategoryArray':
					// Gets the value for the private _objChildPackageCategoryArray (Read-Only)
					// if set due to an ExpandAsArray on the package_category.parent_package_category_id reverse relationship
					// @return PackageCategory[]
					return (array) $this->_objChildPackageCategoryArray;


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
				case 'ParentPackageCategoryId':
					// Sets the value for intParentPackageCategoryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPackageCategory = null;
						return ($this->intParentPackageCategoryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Token':
					// Sets the value for strToken (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderNumber':
					// Sets the value for intOrderNumber 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intOrderNumber = QType::Cast($mixValue, QType::Integer));
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

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PackageCount':
					// Sets the value for intPackageCount 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPackageCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastPostDate':
					// Sets the value for dttLastPostDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttLastPostDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPackageCategory':
					// Sets the value for the PackageCategory object referenced by intParentPackageCategoryId 
					// @param PackageCategory $mixValue
					// @return PackageCategory
					if (is_null($mixValue)) {
						$this->intParentPackageCategoryId = null;
						$this->objParentPackageCategory = null;
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
							throw new QCallerException('Unable to set an unsaved ParentPackageCategory for this PackageCategory');

						// Update Local Member Variables
						$this->objParentPackageCategory = $mixValue;
						$this->intParentPackageCategoryId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for Package
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Packages as an array of Package objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Package[]
		*/ 
		public function GetPackageArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Package::LoadArrayByPackageCategoryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Packages
		 * @return int
		*/ 
		public function CountPackages() {
			if ((is_null($this->intId)))
				return 0;

			return Package::CountByPackageCategoryId($this->intId);
		}

		/**
		 * Associates a Package
		 * @param Package $objPackage
		 * @return void
		*/ 
		public function AssociatePackage(Package $objPackage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackage on this unsaved PackageCategory.');
			if ((is_null($objPackage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackage on this PackageCategory with an unsaved Package.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package`
				SET
					`package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackage->Id) . '
			');
		}

		/**
		 * Unassociates a Package
		 * @param Package $objPackage
		 * @return void
		*/ 
		public function UnassociatePackage(Package $objPackage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this unsaved PackageCategory.');
			if ((is_null($objPackage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this PackageCategory with an unsaved Package.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package`
				SET
					`package_category_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackage->Id) . ' AND
					`package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Packages
		 * @return void
		*/ 
		public function UnassociateAllPackages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package`
				SET
					`package_category_id` = null
				WHERE
					`package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Package
		 * @param Package $objPackage
		 * @return void
		*/ 
		public function DeleteAssociatedPackage(Package $objPackage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this unsaved PackageCategory.');
			if ((is_null($objPackage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this PackageCategory with an unsaved Package.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackage->Id) . ' AND
					`package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Packages
		 * @return void
		*/ 
		public function DeleteAllPackages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackage on this unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package`
				WHERE
					`package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ChildPackageCategory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildPackageCategories as an array of PackageCategory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageCategory[]
		*/ 
		public function GetChildPackageCategoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PackageCategory::LoadArrayByParentPackageCategoryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildPackageCategories
		 * @return int
		*/ 
		public function CountChildPackageCategories() {
			if ((is_null($this->intId)))
				return 0;

			return PackageCategory::CountByParentPackageCategoryId($this->intId);
		}

		/**
		 * Associates a ChildPackageCategory
		 * @param PackageCategory $objPackageCategory
		 * @return void
		*/ 
		public function AssociateChildPackageCategory(PackageCategory $objPackageCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildPackageCategory on this unsaved PackageCategory.');
			if ((is_null($objPackageCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildPackageCategory on this PackageCategory with an unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_category`
				SET
					`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageCategory->Id) . '
			');
		}

		/**
		 * Unassociates a ChildPackageCategory
		 * @param PackageCategory $objPackageCategory
		 * @return void
		*/ 
		public function UnassociateChildPackageCategory(PackageCategory $objPackageCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this unsaved PackageCategory.');
			if ((is_null($objPackageCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this PackageCategory with an unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_category`
				SET
					`parent_package_category_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageCategory->Id) . ' AND
					`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ChildPackageCategories
		 * @return void
		*/ 
		public function UnassociateAllChildPackageCategories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_category`
				SET
					`parent_package_category_id` = null
				WHERE
					`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ChildPackageCategory
		 * @param PackageCategory $objPackageCategory
		 * @return void
		*/ 
		public function DeleteAssociatedChildPackageCategory(PackageCategory $objPackageCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this unsaved PackageCategory.');
			if ((is_null($objPackageCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this PackageCategory with an unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_category`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageCategory->Id) . ' AND
					`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ChildPackageCategories
		 * @return void
		*/ 
		public function DeleteAllChildPackageCategories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildPackageCategory on this unsaved PackageCategory.');

			// Get the Database Object for this Class
			$objDatabase = PackageCategory::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_category`
				WHERE
					`parent_package_category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="PackageCategory"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentPackageCategory" type="xsd1:PackageCategory"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="PackageCount" type="xsd:int"/>';
			$strToReturn .= '<element name="LastPostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PackageCategory', $strComplexTypeArray)) {
				$strComplexTypeArray['PackageCategory'] = PackageCategory::GetSoapComplexTypeXml();
				PackageCategory::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PackageCategory::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PackageCategory();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ParentPackageCategory')) &&
				($objSoapObject->ParentPackageCategory))
				$objToReturn->ParentPackageCategory = PackageCategory::GetObjectFromSoapObject($objSoapObject->ParentPackageCategory);
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, 'OrderNumber'))
				$objToReturn->intOrderNumber = $objSoapObject->OrderNumber;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'PackageCount'))
				$objToReturn->intPackageCount = $objSoapObject->PackageCount;
			if (property_exists($objSoapObject, 'LastPostDate'))
				$objToReturn->dttLastPostDate = new QDateTime($objSoapObject->LastPostDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PackageCategory::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentPackageCategory)
				$objObject->objParentPackageCategory = PackageCategory::GetSoapObjectFromObject($objObject->objParentPackageCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPackageCategoryId = null;
			if ($objObject->dttLastPostDate)
				$objObject->dttLastPostDate = $objObject->dttLastPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePackageCategory extends QQNode {
		protected $strTableName = 'package_category';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageCategory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ParentPackageCategoryId':
					return new QQNode('parent_package_category_id', 'ParentPackageCategoryId', 'integer', $this);
				case 'ParentPackageCategory':
					return new QQNodePackageCategory('parent_package_category_id', 'ParentPackageCategory', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'PackageCount':
					return new QQNode('package_count', 'PackageCount', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'Package':
					return new QQReverseReferenceNodePackage($this, 'package', 'reverse_reference', 'package_category_id');
				case 'ChildPackageCategory':
					return new QQReverseReferenceNodePackageCategory($this, 'childpackagecategory', 'reverse_reference', 'parent_package_category_id');

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

	class QQReverseReferenceNodePackageCategory extends QQReverseReferenceNode {
		protected $strTableName = 'package_category';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageCategory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ParentPackageCategoryId':
					return new QQNode('parent_package_category_id', 'ParentPackageCategoryId', 'integer', $this);
				case 'ParentPackageCategory':
					return new QQNodePackageCategory('parent_package_category_id', 'ParentPackageCategory', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'PackageCount':
					return new QQNode('package_count', 'PackageCount', 'integer', $this);
				case 'LastPostDate':
					return new QQNode('last_post_date', 'LastPostDate', 'QDateTime', $this);
				case 'Package':
					return new QQReverseReferenceNodePackage($this, 'package', 'reverse_reference', 'package_category_id');
				case 'ChildPackageCategory':
					return new QQReverseReferenceNodePackageCategory($this, 'childpackagecategory', 'reverse_reference', 'parent_package_category_id');

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