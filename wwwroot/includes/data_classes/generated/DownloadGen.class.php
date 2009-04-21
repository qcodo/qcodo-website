<?php
	/**
	 * The abstract DownloadGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Download subclass which
	 * extends this DownloadGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Download class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ParentDownloadId the value for intParentDownloadId 
	 * @property integer $DownloadCategoryId the value for intDownloadCategoryId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property string $Name the value for strName (Not Null)
	 * @property string $Version the value for strVersion 
	 * @property string $Description the value for strDescription 
	 * @property string $Filename the value for strFilename 
	 * @property integer $DownloadCount the value for intDownloadCount 
	 * @property QDateTime $PostDate the value for dttPostDate (Not Null)
	 * @property Download $ParentDownload the value for the Download object referenced by intParentDownloadId 
	 * @property DownloadCategory $DownloadCategory the value for the DownloadCategory object referenced by intDownloadCategoryId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property-read Download $_ChildDownload the value for the private _objChildDownload (Read-Only) if set due to an expansion on the download.parent_download_id reverse relationship
	 * @property-read Download[] $_ChildDownloadArray the value for the private _objChildDownloadArray (Read-Only) if set due to an ExpandAsArray on the download.parent_download_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DownloadGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column download.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column download.parent_download_id
		 * @var integer intParentDownloadId
		 */
		protected $intParentDownloadId;
		const ParentDownloadIdDefault = null;


		/**
		 * Protected member variable that maps to the database column download.download_category_id
		 * @var integer intDownloadCategoryId
		 */
		protected $intDownloadCategoryId;
		const DownloadCategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column download.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column download.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column download.version
		 * @var string strVersion
		 */
		protected $strVersion;
		const VersionMaxLength = 40;
		const VersionDefault = null;


		/**
		 * Protected member variable that maps to the database column download.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column download.filename
		 * @var string strFilename
		 */
		protected $strFilename;
		const FilenameMaxLength = 100;
		const FilenameDefault = null;


		/**
		 * Protected member variable that maps to the database column download.download_count
		 * @var integer intDownloadCount
		 */
		protected $intDownloadCount;
		const DownloadCountDefault = null;


		/**
		 * Protected member variable that maps to the database column download.post_date
		 * @var QDateTime dttPostDate
		 */
		protected $dttPostDate;
		const PostDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single ChildDownload object
		 * (of type Download), if this Download object was restored with
		 * an expansion on the download association table.
		 * @var Download _objChildDownload;
		 */
		private $_objChildDownload;

		/**
		 * Private member variable that stores a reference to an array of ChildDownload objects
		 * (of type Download[]), if this Download object was restored with
		 * an ExpandAsArray on the download association table.
		 * @var Download[] _objChildDownloadArray;
		 */
		private $_objChildDownloadArray = array();

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
		 * in the database column download.parent_download_id.
		 *
		 * NOTE: Always use the ParentDownload property getter to correctly retrieve this Download object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Download objParentDownload
		 */
		protected $objParentDownload;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column download.download_category_id.
		 *
		 * NOTE: Always use the DownloadCategory property getter to correctly retrieve this DownloadCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DownloadCategory objDownloadCategory
		 */
		protected $objDownloadCategory;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column download.person_id.
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
		 * Load a Download from PK Info
		 * @param integer $intId
		 * @return Download
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Download::QuerySingle(
				QQ::Equal(QQN::Download()->Id, $intId)
			);
		}

		/**
		 * Load all Downloads
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Download::QueryArray to perform the LoadAll query
			try {
				return Download::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Downloads
		 * @return int
		 */
		public static function CountAll() {
			// Call Download::QueryCount to perform the CountAll query
			return Download::QueryCount(QQ::All());
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
			$objDatabase = Download::GetDatabase();

			// Create/Build out the QueryBuilder object with Download-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'download');
			Download::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('download');

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
		 * Static Qcodo Query method to query for a single Download object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Download the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Download::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Download object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Download::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Download objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Download[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Download::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Download::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Download objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Download::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Download::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'download_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Download-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Download::GetSelectFields($objQueryBuilder);
				Download::GetFromFields($objQueryBuilder);

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
			return Download::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Download
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'download';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'parent_download_id', $strAliasPrefix . 'parent_download_id');
			$objBuilder->AddSelectItem($strTableName, 'download_category_id', $strAliasPrefix . 'download_category_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'version', $strAliasPrefix . 'version');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'filename', $strAliasPrefix . 'filename');
			$objBuilder->AddSelectItem($strTableName, 'download_count', $strAliasPrefix . 'download_count');
			$objBuilder->AddSelectItem($strTableName, 'post_date', $strAliasPrefix . 'post_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Download from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Download::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Download
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
					$strAliasPrefix = 'download__';


				$strAlias = $strAliasPrefix . 'childdownload__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildDownloadArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildDownloadArray[$intPreviousChildItemCount - 1];
						$objChildItem = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childdownload__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildDownloadArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildDownloadArray[] = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childdownload__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'download__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Download object
			$objToReturn = new Download();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_download_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_download_id'] : $strAliasPrefix . 'parent_download_id';
			$objToReturn->intParentDownloadId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'download_category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'download_category_id'] : $strAliasPrefix . 'download_category_id';
			$objToReturn->intDownloadCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'version', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'version'] : $strAliasPrefix . 'version';
			$objToReturn->strVersion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'filename', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'filename'] : $strAliasPrefix . 'filename';
			$objToReturn->strFilename = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'download_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'download_count'] : $strAliasPrefix . 'download_count';
			$objToReturn->intDownloadCount = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'download__';

			// Check for ParentDownload Early Binding
			$strAlias = $strAliasPrefix . 'parent_download_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentDownload = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_download_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for DownloadCategory Early Binding
			$strAlias = $strAliasPrefix . 'download_category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDownloadCategory = DownloadCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download_category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ChildDownload Virtual Binding
			$strAlias = $strAliasPrefix . 'childdownload__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildDownloadArray[] = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childdownload__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildDownload = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childdownload__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Downloads from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Download[]
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
					$objItem = Download::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Download::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Download object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Download
		*/
		public static function LoadById($intId) {
			return Download::QuerySingle(
				QQ::Equal(QQN::Download()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Download objects,
		 * by ParentDownloadId Index(es)
		 * @param integer $intParentDownloadId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/
		public static function LoadArrayByParentDownloadId($intParentDownloadId, $objOptionalClauses = null) {
			// Call Download::QueryArray to perform the LoadArrayByParentDownloadId query
			try {
				return Download::QueryArray(
					QQ::Equal(QQN::Download()->ParentDownloadId, $intParentDownloadId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Downloads
		 * by ParentDownloadId Index(es)
		 * @param integer $intParentDownloadId
		 * @return int
		*/
		public static function CountByParentDownloadId($intParentDownloadId) {
			// Call Download::QueryCount to perform the CountByParentDownloadId query
			return Download::QueryCount(
				QQ::Equal(QQN::Download()->ParentDownloadId, $intParentDownloadId)
			);
		}
			
		/**
		 * Load an array of Download objects,
		 * by DownloadCategoryId Index(es)
		 * @param integer $intDownloadCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/
		public static function LoadArrayByDownloadCategoryId($intDownloadCategoryId, $objOptionalClauses = null) {
			// Call Download::QueryArray to perform the LoadArrayByDownloadCategoryId query
			try {
				return Download::QueryArray(
					QQ::Equal(QQN::Download()->DownloadCategoryId, $intDownloadCategoryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Downloads
		 * by DownloadCategoryId Index(es)
		 * @param integer $intDownloadCategoryId
		 * @return int
		*/
		public static function CountByDownloadCategoryId($intDownloadCategoryId) {
			// Call Download::QueryCount to perform the CountByDownloadCategoryId query
			return Download::QueryCount(
				QQ::Equal(QQN::Download()->DownloadCategoryId, $intDownloadCategoryId)
			);
		}
			
		/**
		 * Load an array of Download objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Download::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Download::QueryArray(
					QQ::Equal(QQN::Download()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Downloads
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call Download::QueryCount to perform the CountByPersonId query
			return Download::QueryCount(
				QQ::Equal(QQN::Download()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Download
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `download` (
							`parent_download_id`,
							`download_category_id`,
							`person_id`,
							`name`,
							`version`,
							`description`,
							`filename`,
							`download_count`,
							`post_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intParentDownloadId) . ',
							' . $objDatabase->SqlVariable($this->intDownloadCategoryId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strVersion) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strFilename) . ',
							' . $objDatabase->SqlVariable($this->intDownloadCount) . ',
							' . $objDatabase->SqlVariable($this->dttPostDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('download', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`download`
						SET
							`parent_download_id` = ' . $objDatabase->SqlVariable($this->intParentDownloadId) . ',
							`download_category_id` = ' . $objDatabase->SqlVariable($this->intDownloadCategoryId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`version` = ' . $objDatabase->SqlVariable($this->strVersion) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`filename` = ' . $objDatabase->SqlVariable($this->strFilename) . ',
							`download_count` = ' . $objDatabase->SqlVariable($this->intDownloadCount) . ',
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
		 * Delete this Download
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Download with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Downloads
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`');
		}

		/**
		 * Truncate download table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `download`');
		}

		/**
		 * Reload this Download from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Download object.');

			// Reload the Object
			$objReloaded = Download::Load($this->intId);

			// Update $this's local variables to match
			$this->ParentDownloadId = $objReloaded->ParentDownloadId;
			$this->DownloadCategoryId = $objReloaded->DownloadCategoryId;
			$this->PersonId = $objReloaded->PersonId;
			$this->strName = $objReloaded->strName;
			$this->strVersion = $objReloaded->strVersion;
			$this->strDescription = $objReloaded->strDescription;
			$this->strFilename = $objReloaded->strFilename;
			$this->intDownloadCount = $objReloaded->intDownloadCount;
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

				case 'ParentDownloadId':
					/**
					 * Gets the value for intParentDownloadId 
					 * @return integer
					 */
					return $this->intParentDownloadId;

				case 'DownloadCategoryId':
					/**
					 * Gets the value for intDownloadCategoryId (Not Null)
					 * @return integer
					 */
					return $this->intDownloadCategoryId;

				case 'PersonId':
					/**
					 * Gets the value for intPersonId (Not Null)
					 * @return integer
					 */
					return $this->intPersonId;

				case 'Name':
					/**
					 * Gets the value for strName (Not Null)
					 * @return string
					 */
					return $this->strName;

				case 'Version':
					/**
					 * Gets the value for strVersion 
					 * @return string
					 */
					return $this->strVersion;

				case 'Description':
					/**
					 * Gets the value for strDescription 
					 * @return string
					 */
					return $this->strDescription;

				case 'Filename':
					/**
					 * Gets the value for strFilename 
					 * @return string
					 */
					return $this->strFilename;

				case 'DownloadCount':
					/**
					 * Gets the value for intDownloadCount 
					 * @return integer
					 */
					return $this->intDownloadCount;

				case 'PostDate':
					/**
					 * Gets the value for dttPostDate (Not Null)
					 * @return QDateTime
					 */
					return $this->dttPostDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentDownload':
					/**
					 * Gets the value for the Download object referenced by intParentDownloadId 
					 * @return Download
					 */
					try {
						if ((!$this->objParentDownload) && (!is_null($this->intParentDownloadId)))
							$this->objParentDownload = Download::Load($this->intParentDownloadId);
						return $this->objParentDownload;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DownloadCategory':
					/**
					 * Gets the value for the DownloadCategory object referenced by intDownloadCategoryId (Not Null)
					 * @return DownloadCategory
					 */
					try {
						if ((!$this->objDownloadCategory) && (!is_null($this->intDownloadCategoryId)))
							$this->objDownloadCategory = DownloadCategory::Load($this->intDownloadCategoryId);
						return $this->objDownloadCategory;
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

				case '_ChildDownload':
					/**
					 * Gets the value for the private _objChildDownload (Read-Only)
					 * if set due to an expansion on the download.parent_download_id reverse relationship
					 * @return Download
					 */
					return $this->_objChildDownload;

				case '_ChildDownloadArray':
					/**
					 * Gets the value for the private _objChildDownloadArray (Read-Only)
					 * if set due to an ExpandAsArray on the download.parent_download_id reverse relationship
					 * @return Download[]
					 */
					return (array) $this->_objChildDownloadArray;


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
				case 'ParentDownloadId':
					/**
					 * Sets the value for intParentDownloadId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objParentDownload = null;
						return ($this->intParentDownloadId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DownloadCategoryId':
					/**
					 * Sets the value for intDownloadCategoryId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDownloadCategory = null;
						return ($this->intDownloadCategoryId = QType::Cast($mixValue, QType::Integer));
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

				case 'Name':
					/**
					 * Sets the value for strName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Version':
					/**
					 * Sets the value for strVersion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strVersion = QType::Cast($mixValue, QType::String));
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

				case 'Filename':
					/**
					 * Sets the value for strFilename 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFilename = QType::Cast($mixValue, QType::String));
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
				case 'ParentDownload':
					/**
					 * Sets the value for the Download object referenced by intParentDownloadId 
					 * @param Download $mixValue
					 * @return Download
					 */
					if (is_null($mixValue)) {
						$this->intParentDownloadId = null;
						$this->objParentDownload = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Download object
						try {
							$mixValue = QType::Cast($mixValue, 'Download');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Download object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentDownload for this Download');

						// Update Local Member Variables
						$this->objParentDownload = $mixValue;
						$this->intParentDownloadId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DownloadCategory':
					/**
					 * Sets the value for the DownloadCategory object referenced by intDownloadCategoryId (Not Null)
					 * @param DownloadCategory $mixValue
					 * @return DownloadCategory
					 */
					if (is_null($mixValue)) {
						$this->intDownloadCategoryId = null;
						$this->objDownloadCategory = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DownloadCategory object
						try {
							$mixValue = QType::Cast($mixValue, 'DownloadCategory');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED DownloadCategory object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved DownloadCategory for this Download');

						// Update Local Member Variables
						$this->objDownloadCategory = $mixValue;
						$this->intDownloadCategoryId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Person for this Download');

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

			
		
		// Related Objects' Methods for ChildDownload
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildDownloads as an array of Download objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/ 
		public function GetChildDownloadArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Download::LoadArrayByParentDownloadId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildDownloads
		 * @return int
		*/ 
		public function CountChildDownloads() {
			if ((is_null($this->intId)))
				return 0;

			return Download::CountByParentDownloadId($this->intId);
		}

		/**
		 * Associates a ChildDownload
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function AssociateChildDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildDownload on this unsaved Download.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildDownload on this Download with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`parent_download_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . '
			');
		}

		/**
		 * Unassociates a ChildDownload
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function UnassociateChildDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this unsaved Download.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this Download with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`parent_download_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`parent_download_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ChildDownloads
		 * @return void
		*/ 
		public function UnassociateAllChildDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`parent_download_id` = null
				WHERE
					`parent_download_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ChildDownload
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function DeleteAssociatedChildDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this unsaved Download.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this Download with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`parent_download_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ChildDownloads
		 * @return void
		*/ 
		public function DeleteAllChildDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildDownload on this unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Download::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`parent_download_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Download"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentDownload" type="xsd1:Download"/>';
			$strToReturn .= '<element name="DownloadCategory" type="xsd1:DownloadCategory"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Version" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Filename" type="xsd:string"/>';
			$strToReturn .= '<element name="DownloadCount" type="xsd:int"/>';
			$strToReturn .= '<element name="PostDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Download', $strComplexTypeArray)) {
				$strComplexTypeArray['Download'] = Download::GetSoapComplexTypeXml();
				Download::AlterSoapComplexTypeArray($strComplexTypeArray);
				DownloadCategory::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Download::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Download();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ParentDownload')) &&
				($objSoapObject->ParentDownload))
				$objToReturn->ParentDownload = Download::GetObjectFromSoapObject($objSoapObject->ParentDownload);
			if ((property_exists($objSoapObject, 'DownloadCategory')) &&
				($objSoapObject->DownloadCategory))
				$objToReturn->DownloadCategory = DownloadCategory::GetObjectFromSoapObject($objSoapObject->DownloadCategory);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Version'))
				$objToReturn->strVersion = $objSoapObject->Version;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Filename'))
				$objToReturn->strFilename = $objSoapObject->Filename;
			if (property_exists($objSoapObject, 'DownloadCount'))
				$objToReturn->intDownloadCount = $objSoapObject->DownloadCount;
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
				array_push($objArrayToReturn, Download::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentDownload)
				$objObject->objParentDownload = Download::GetSoapObjectFromObject($objObject->objParentDownload, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentDownloadId = null;
			if ($objObject->objDownloadCategory)
				$objObject->objDownloadCategory = DownloadCategory::GetSoapObjectFromObject($objObject->objDownloadCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDownloadCategoryId = null;
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

	class QQNodeDownload extends QQNode {
		protected $strTableName = 'download';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Download';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ParentDownloadId':
					return new QQNode('parent_download_id', 'ParentDownloadId', 'integer', $this);
				case 'ParentDownload':
					return new QQNodeDownload('parent_download_id', 'ParentDownload', 'integer', $this);
				case 'DownloadCategoryId':
					return new QQNode('download_category_id', 'DownloadCategoryId', 'integer', $this);
				case 'DownloadCategory':
					return new QQNodeDownloadCategory('download_category_id', 'DownloadCategory', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Version':
					return new QQNode('version', 'Version', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Filename':
					return new QQNode('filename', 'Filename', 'string', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'ChildDownload':
					return new QQReverseReferenceNodeDownload($this, 'childdownload', 'reverse_reference', 'parent_download_id');

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

	class QQReverseReferenceNodeDownload extends QQReverseReferenceNode {
		protected $strTableName = 'download';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Download';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ParentDownloadId':
					return new QQNode('parent_download_id', 'ParentDownloadId', 'integer', $this);
				case 'ParentDownload':
					return new QQNodeDownload('parent_download_id', 'ParentDownload', 'integer', $this);
				case 'DownloadCategoryId':
					return new QQNode('download_category_id', 'DownloadCategoryId', 'integer', $this);
				case 'DownloadCategory':
					return new QQNodeDownloadCategory('download_category_id', 'DownloadCategory', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Version':
					return new QQNode('version', 'Version', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Filename':
					return new QQNode('filename', 'Filename', 'string', $this);
				case 'DownloadCount':
					return new QQNode('download_count', 'DownloadCount', 'integer', $this);
				case 'PostDate':
					return new QQNode('post_date', 'PostDate', 'QDateTime', $this);
				case 'ChildDownload':
					return new QQReverseReferenceNodeDownload($this, 'childdownload', 'reverse_reference', 'parent_download_id');

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