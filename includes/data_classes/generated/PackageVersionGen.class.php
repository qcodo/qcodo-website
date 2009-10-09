<?php
	/**
	 * The abstract PackageVersionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PackageVersion subclass which
	 * extends this PackageVersionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PackageVersion class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PackageContributionId the value for intPackageContributionId (Not Null)
	 * @property integer $VersionNumber the value for intVersionNumber (Not Null)
	 * @property string $Notes the value for strNotes 
	 * @property QDateTime $PostDate the value for dttPostDate 
	 * @property integer $DownloadCount the value for intDownloadCount 
	 * @property PackageContribution $PackageContribution the value for the PackageContribution object referenced by intPackageContributionId (Not Null)
	 * @property-read PackageContribution $_PackageContributionAsCurrent the value for the private _objPackageContributionAsCurrent (Read-Only) if set due to an expansion on the package_contribution.current_package_version_id reverse relationship
	 * @property-read PackageContribution[] $_PackageContributionAsCurrentArray the value for the private _objPackageContributionAsCurrentArray (Read-Only) if set due to an ExpandAsArray on the package_contribution.current_package_version_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PackageVersionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column package_version.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_version.package_contribution_id
		 * @var integer intPackageContributionId
		 */
		protected $intPackageContributionId;
		const PackageContributionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column package_version.version_number
		 * @var integer intVersionNumber
		 */
		protected $intVersionNumber;
		const VersionNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column package_version.notes
		 * @var string strNotes
		 */
		protected $strNotes;
		const NotesDefault = null;


		/**
		 * Protected member variable that maps to the database column package_version.post_date
		 * @var QDateTime dttPostDate
		 */
		protected $dttPostDate;
		const PostDateDefault = null;


		/**
		 * Protected member variable that maps to the database column package_version.download_count
		 * @var integer intDownloadCount
		 */
		protected $intDownloadCount;
		const DownloadCountDefault = null;


		/**
		 * Private member variable that stores a reference to a single PackageContributionAsCurrent object
		 * (of type PackageContribution), if this PackageVersion object was restored with
		 * an expansion on the package_contribution association table.
		 * @var PackageContribution _objPackageContributionAsCurrent;
		 */
		private $_objPackageContributionAsCurrent;

		/**
		 * Private member variable that stores a reference to an array of PackageContributionAsCurrent objects
		 * (of type PackageContribution[]), if this PackageVersion object was restored with
		 * an ExpandAsArray on the package_contribution association table.
		 * @var PackageContribution[] _objPackageContributionAsCurrentArray;
		 */
		private $_objPackageContributionAsCurrentArray = array();

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
		 * in the database column package_version.package_contribution_id.
		 *
		 * NOTE: Always use the PackageContribution property getter to correctly retrieve this PackageContribution object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PackageContribution objPackageContribution
		 */
		protected $objPackageContribution;





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
		 * Load a PackageVersion from PK Info
		 * @param integer $intId
		 * @return PackageVersion
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PackageVersion::QuerySingle(
				QQ::Equal(QQN::PackageVersion()->Id, $intId)
			);
		}

		/**
		 * Load all PackageVersions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageVersion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PackageVersion::QueryArray to perform the LoadAll query
			try {
				return PackageVersion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PackageVersions
		 * @return int
		 */
		public static function CountAll() {
			// Call PackageVersion::QueryCount to perform the CountAll query
			return PackageVersion::QueryCount(QQ::All());
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
			$objDatabase = PackageVersion::GetDatabase();

			// Create/Build out the QueryBuilder object with PackageVersion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'package_version');
			PackageVersion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('package_version');

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
		 * Static Qcodo Query method to query for a single PackageVersion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageVersion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PackageVersion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageVersion::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of PackageVersion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PackageVersion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PackageVersion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of PackageVersion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PackageVersion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PackageVersion::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'package_version_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PackageVersion-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PackageVersion::GetSelectFields($objQueryBuilder);
				PackageVersion::GetFromFields($objQueryBuilder);

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
			return PackageVersion::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PackageVersion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'package_version';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'package_contribution_id', $strAliasPrefix . 'package_contribution_id');
			$objBuilder->AddSelectItem($strTableName, 'version_number', $strAliasPrefix . 'version_number');
			$objBuilder->AddSelectItem($strTableName, 'notes', $strAliasPrefix . 'notes');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
			$objBuilder->AddSelectItem($strTableName, 'download_count', $strAliasPrefix . 'download_count');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PackageVersion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PackageVersion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PackageVersion
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
					$strAliasPrefix = 'package_version__';


				$strAlias = $strAliasPrefix . 'packagecontributionascurrent__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPackageContributionAsCurrentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPackageContributionAsCurrentArray[$intPreviousChildItemCount - 1];
						$objChildItem = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontributionascurrent__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPackageContributionAsCurrentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPackageContributionAsCurrentArray[] = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontributionascurrent__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'package_version__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the PackageVersion object
			$objToReturn = new PackageVersion();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'package_contribution_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'package_contribution_id'] : $strAliasPrefix . 'package_contribution_id';
			$objToReturn->intPackageContributionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'version_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'version_number'] : $strAliasPrefix . 'version_number';
			$objToReturn->intVersionNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'notes', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'notes'] : $strAliasPrefix . 'notes';
			$objToReturn->strNotes = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'post_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'post_date'] : $strAliasPrefix . 'post_date';
			$objToReturn->dttPostDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'package_version__';

			// Check for PackageContribution Early Binding
			$strAlias = $strAliasPrefix . 'package_contribution_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPackageContribution = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'package_contribution_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for PackageContributionAsCurrent Virtual Binding
			$strAlias = $strAliasPrefix . 'packagecontributionascurrent__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPackageContributionAsCurrentArray[] = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontributionascurrent__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPackageContributionAsCurrent = PackageContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'packagecontributionascurrent__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of PackageVersions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PackageVersion[]
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
					$objItem = PackageVersion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PackageVersion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PackageVersion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PackageVersion
		*/
		public static function LoadById($intId) {
			return PackageVersion::QuerySingle(
				QQ::Equal(QQN::PackageVersion()->Id, $intId)
			);
		}
			
		/**
		 * Load a single PackageVersion object,
		 * by PackageContributionId, VersionNumber Index(es)
		 * @param integer $intPackageContributionId
		 * @param integer $intVersionNumber
		 * @return PackageVersion
		*/
		public static function LoadByPackageContributionIdVersionNumber($intPackageContributionId, $intVersionNumber) {
			return PackageVersion::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::PackageVersion()->PackageContributionId, $intPackageContributionId),
				QQ::Equal(QQN::PackageVersion()->VersionNumber, $intVersionNumber)
				)
			);
		}
			
		/**
		 * Load an array of PackageVersion objects,
		 * by PackageContributionId Index(es)
		 * @param integer $intPackageContributionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageVersion[]
		*/
		public static function LoadArrayByPackageContributionId($intPackageContributionId, $objOptionalClauses = null) {
			// Call PackageVersion::QueryArray to perform the LoadArrayByPackageContributionId query
			try {
				return PackageVersion::QueryArray(
					QQ::Equal(QQN::PackageVersion()->PackageContributionId, $intPackageContributionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PackageVersions
		 * by PackageContributionId Index(es)
		 * @param integer $intPackageContributionId
		 * @return int
		*/
		public static function CountByPackageContributionId($intPackageContributionId) {
			// Call PackageVersion::QueryCount to perform the CountByPackageContributionId query
			return PackageVersion::QueryCount(
				QQ::Equal(QQN::PackageVersion()->PackageContributionId, $intPackageContributionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PackageVersion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `package_version` (
							`package_contribution_id`,
							`version_number`,
							`notes`,
							`post_date`,
							`download_count`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPackageContributionId) . ',
							' . $objDatabase->SqlVariable($this->intVersionNumber) . ',
							' . $objDatabase->SqlVariable($this->strNotes) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . ',
							' . $objDatabase->SqlVariable($this->intDownloadCount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('package_version', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`package_version`
						SET
							`package_contribution_id` = ' . $objDatabase->SqlVariable($this->intPackageContributionId) . ',
							`version_number` = ' . $objDatabase->SqlVariable($this->intVersionNumber) . ',
							`notes` = ' . $objDatabase->SqlVariable($this->strNotes) . ',
							`post_date` = ' . $objDatabase->SqlVariable($this->dttPostDate) . ',
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
		 * Delete this PackageVersion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PackageVersion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_version`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all PackageVersions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_version`');
		}

		/**
		 * Truncate package_version table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `package_version`');
		}

		/**
		 * Reload this PackageVersion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PackageVersion object.');

			// Reload the Object
			$objReloaded = PackageVersion::Load($this->intId);

			// Update $this's local variables to match
			$this->PackageContributionId = $objReloaded->PackageContributionId;
			$this->intVersionNumber = $objReloaded->intVersionNumber;
			$this->strNotes = $objReloaded->strNotes;
			$this->dttPostDate = $objReloaded->dttPostDate;
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

				case 'PackageContributionId':
					/**
					 * Gets the value for intPackageContributionId (Not Null)
					 * @return integer
					 */
					return $this->intPackageContributionId;

				case 'VersionNumber':
					/**
					 * Gets the value for intVersionNumber (Not Null)
					 * @return integer
					 */
					return $this->intVersionNumber;

				case 'Notes':
					/**
					 * Gets the value for strNotes 
					 * @return string
					 */
					return $this->strNotes;

				case 'PostDate':
					/**
					 * Gets the value for dttPostDate 
					 * @return QDateTime
					 */
					return $this->dttPostDate;

				case 'DownloadCount':
					/**
					 * Gets the value for intDownloadCount 
					 * @return integer
					 */
					return $this->intDownloadCount;


				///////////////////
				// Member Objects
				///////////////////
				case 'PackageContribution':
					/**
					 * Gets the value for the PackageContribution object referenced by intPackageContributionId (Not Null)
					 * @return PackageContribution
					 */
					try {
						if ((!$this->objPackageContribution) && (!is_null($this->intPackageContributionId)))
							$this->objPackageContribution = PackageContribution::Load($this->intPackageContributionId);
						return $this->objPackageContribution;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PackageContributionAsCurrent':
					/**
					 * Gets the value for the private _objPackageContributionAsCurrent (Read-Only)
					 * if set due to an expansion on the package_contribution.current_package_version_id reverse relationship
					 * @return PackageContribution
					 */
					return $this->_objPackageContributionAsCurrent;

				case '_PackageContributionAsCurrentArray':
					/**
					 * Gets the value for the private _objPackageContributionAsCurrentArray (Read-Only)
					 * if set due to an ExpandAsArray on the package_contribution.current_package_version_id reverse relationship
					 * @return PackageContribution[]
					 */
					return (array) $this->_objPackageContributionAsCurrentArray;


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
				case 'PackageContributionId':
					/**
					 * Sets the value for intPackageContributionId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPackageContribution = null;
						return ($this->intPackageContributionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VersionNumber':
					/**
					 * Sets the value for intVersionNumber (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intVersionNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Notes':
					/**
					 * Sets the value for strNotes 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNotes = QType::Cast($mixValue, QType::String));
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
				case 'PackageContribution':
					/**
					 * Sets the value for the PackageContribution object referenced by intPackageContributionId (Not Null)
					 * @param PackageContribution $mixValue
					 * @return PackageContribution
					 */
					if (is_null($mixValue)) {
						$this->intPackageContributionId = null;
						$this->objPackageContribution = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PackageContribution object
						try {
							$mixValue = QType::Cast($mixValue, 'PackageContribution');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PackageContribution object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PackageContribution for this PackageVersion');

						// Update Local Member Variables
						$this->objPackageContribution = $mixValue;
						$this->intPackageContributionId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for PackageContributionAsCurrent
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PackageContributionsAsCurrent as an array of PackageContribution objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PackageContribution[]
		*/ 
		public function GetPackageContributionAsCurrentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PackageContribution::LoadArrayByCurrentPackageVersionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PackageContributionsAsCurrent
		 * @return int
		*/ 
		public function CountPackageContributionsAsCurrent() {
			if ((is_null($this->intId)))
				return 0;

			return PackageContribution::CountByCurrentPackageVersionId($this->intId);
		}

		/**
		 * Associates a PackageContributionAsCurrent
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function AssociatePackageContributionAsCurrent(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageContributionAsCurrent on this unsaved PackageVersion.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePackageContributionAsCurrent on this PackageVersion with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . '
			');
		}

		/**
		 * Unassociates a PackageContributionAsCurrent
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function UnassociatePackageContributionAsCurrent(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this unsaved PackageVersion.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this PackageVersion with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`current_package_version_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . ' AND
					`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PackageContributionsAsCurrent
		 * @return void
		*/ 
		public function UnassociateAllPackageContributionsAsCurrent() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this unsaved PackageVersion.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`package_contribution`
				SET
					`current_package_version_id` = null
				WHERE
					`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PackageContributionAsCurrent
		 * @param PackageContribution $objPackageContribution
		 * @return void
		*/ 
		public function DeleteAssociatedPackageContributionAsCurrent(PackageContribution $objPackageContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this unsaved PackageVersion.');
			if ((is_null($objPackageContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this PackageVersion with an unsaved PackageContribution.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPackageContribution->Id) . ' AND
					`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PackageContributionsAsCurrent
		 * @return void
		*/ 
		public function DeleteAllPackageContributionsAsCurrent() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePackageContributionAsCurrent on this unsaved PackageVersion.');

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`package_contribution`
				WHERE
					`current_package_version_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="PackageVersion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PackageContribution" type="xsd1:PackageContribution"/>';
			$strToReturn .= '<element name="VersionNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="Notes" type="xsd:string"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DownloadCount" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PackageVersion', $strComplexTypeArray)) {
				$strComplexTypeArray['PackageVersion'] = PackageVersion::GetSoapComplexTypeXml();
				PackageContribution::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PackageVersion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PackageVersion();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'PackageContribution')) &&
				($objSoapObject->PackageContribution))
				$objToReturn->PackageContribution = PackageContribution::GetObjectFromSoapObject($objSoapObject->PackageContribution);
			if (property_exists($objSoapObject, 'VersionNumber'))
				$objToReturn->intVersionNumber = $objSoapObject->VersionNumber;
			if (property_exists($objSoapObject, 'Notes'))
				$objToReturn->strNotes = $objSoapObject->Notes;
			if (property_exists($objSoapObject, 'PostDate'))
				$objToReturn->dttPostDate = new QDateTime($objSoapObject->PostDate);
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
				array_push($objArrayToReturn, PackageVersion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPackageContribution)
				$objObject->objPackageContribution = PackageContribution::GetSoapObjectFromObject($objObject->objPackageContribution, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPackageContributionId = null;
			if ($objObject->dttPostDate)
				$objObject->dttPostDate = $objObject->dttPostDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePackageVersion extends QQNode {
		protected $strTableName = 'package_version';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageVersion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageContributionId':
					return new QQNode('package_contribution_id', 'PackageContributionId', 'integer', $this);
				case 'PackageContribution':
					return new QQNodePackageContribution('package_contribution_id', 'PackageContribution', 'integer', $this);
				case 'VersionNumber':
					return new QQNode('version_number', 'VersionNumber', 'integer', $this);
				case 'Notes':
					return new QQNode('notes', 'Notes', 'string', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PackageContributionAsCurrent':
					return new QQReverseReferenceNodePackageContribution($this, 'packagecontributionascurrent', 'reverse_reference', 'current_package_version_id');

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

	class QQReverseReferenceNodePackageVersion extends QQReverseReferenceNode {
		protected $strTableName = 'package_version';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PackageVersion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PackageContributionId':
					return new QQNode('package_contribution_id', 'PackageContributionId', 'integer', $this);
				case 'PackageContribution':
					return new QQNodePackageContribution('package_contribution_id', 'PackageContribution', 'integer', $this);
				case 'VersionNumber':
					return new QQNode('version_number', 'VersionNumber', 'integer', $this);
				case 'Notes':
					return new QQNode('notes', 'Notes', 'string', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PackageContributionAsCurrent':
					return new QQReverseReferenceNodePackageContribution($this, 'packagecontributionascurrent', 'reverse_reference', 'current_package_version_id');

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