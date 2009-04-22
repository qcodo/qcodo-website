<?php
	/**
	 * The abstract PersonGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Person subclass which
	 * extends this PersonGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Person class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonTypeId the value for intPersonTypeId (Not Null)
	 * @property string $Username the value for strUsername (Not Null)
	 * @property string $Password the value for strPassword 
	 * @property string $FirstName the value for strFirstName (Not Null)
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $Email the value for strEmail (Unique)
	 * @property boolean $PasswordResetFlag the value for blnPasswordResetFlag 
	 * @property boolean $DisplayRealNameFlag the value for blnDisplayRealNameFlag 
	 * @property boolean $DisplayEmailFlag the value for blnDisplayEmailFlag 
	 * @property boolean $OptInFlag the value for blnOptInFlag 
	 * @property boolean $DonatedFlag the value for blnDonatedFlag 
	 * @property string $Location the value for strLocation 
	 * @property integer $CountryId the value for intCountryId 
	 * @property string $Url the value for strUrl 
	 * @property integer $Timezone the value for intTimezone 
	 * @property QDateTime $RegistrationDate the value for dttRegistrationDate 
	 * @property Country $Country the value for the Country object referenced by intCountryId 
	 * @property Timezone $TimezoneObject the value for the Timezone object referenced by intTimezone 
	 * @property-read Topic $_TopicAsEmail the value for the private _objTopicAsEmail (Read-Only) if set due to an expansion on the email_topic_person_assn association table
	 * @property-read Topic[] $_TopicAsEmailArray the value for the private _objTopicAsEmailArray (Read-Only) if set due to an ExpandAsArray on the email_topic_person_assn association table
	 * @property-read Topic $_TopicAsReadOnce the value for the private _objTopicAsReadOnce (Read-Only) if set due to an expansion on the read_once_topic_person_assn association table
	 * @property-read Topic[] $_TopicAsReadOnceArray the value for the private _objTopicAsReadOnceArray (Read-Only) if set due to an ExpandAsArray on the read_once_topic_person_assn association table
	 * @property-read Topic $_TopicAsRead the value for the private _objTopicAsRead (Read-Only) if set due to an expansion on the read_topic_person_assn association table
	 * @property-read Topic[] $_TopicAsReadArray the value for the private _objTopicAsReadArray (Read-Only) if set due to an ExpandAsArray on the read_topic_person_assn association table
	 * @property-read Download $_Download the value for the private _objDownload (Read-Only) if set due to an expansion on the download.person_id reverse relationship
	 * @property-read Download[] $_DownloadArray the value for the private _objDownloadArray (Read-Only) if set due to an ExpandAsArray on the download.person_id reverse relationship
	 * @property-read LoginTicket $_LoginTicket the value for the private _objLoginTicket (Read-Only) if set due to an expansion on the login_ticket.person_id reverse relationship
	 * @property-read LoginTicket[] $_LoginTicketArray the value for the private _objLoginTicketArray (Read-Only) if set due to an ExpandAsArray on the login_ticket.person_id reverse relationship
	 * @property-read Message $_Message the value for the private _objMessage (Read-Only) if set due to an expansion on the message.person_id reverse relationship
	 * @property-read Message[] $_MessageArray the value for the private _objMessageArray (Read-Only) if set due to an ExpandAsArray on the message.person_id reverse relationship
	 * @property-read Topic $_Topic the value for the private _objTopic (Read-Only) if set due to an expansion on the topic.person_id reverse relationship
	 * @property-read Topic[] $_TopicArray the value for the private _objTopicArray (Read-Only) if set due to an ExpandAsArray on the topic.person_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PersonGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column person.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.person_type_id
		 * @var integer intPersonTypeId
		 */
		protected $intPersonTypeId;
		const PersonTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameMaxLength = 20;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 100;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column person.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 150;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column person.password_reset_flag
		 * @var boolean blnPasswordResetFlag
		 */
		protected $blnPasswordResetFlag;
		const PasswordResetFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.display_real_name_flag
		 * @var boolean blnDisplayRealNameFlag
		 */
		protected $blnDisplayRealNameFlag;
		const DisplayRealNameFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.display_email_flag
		 * @var boolean blnDisplayEmailFlag
		 */
		protected $blnDisplayEmailFlag;
		const DisplayEmailFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.opt_in_flag
		 * @var boolean blnOptInFlag
		 */
		protected $blnOptInFlag;
		const OptInFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.donated_flag
		 * @var boolean blnDonatedFlag
		 */
		protected $blnDonatedFlag;
		const DonatedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.location
		 * @var string strLocation
		 */
		protected $strLocation;
		const LocationMaxLength = 100;
		const LocationDefault = null;


		/**
		 * Protected member variable that maps to the database column person.country_id
		 * @var integer intCountryId
		 */
		protected $intCountryId;
		const CountryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.url
		 * @var string strUrl
		 */
		protected $strUrl;
		const UrlMaxLength = 100;
		const UrlDefault = null;


		/**
		 * Protected member variable that maps to the database column person.timezone
		 * @var integer intTimezone
		 */
		protected $intTimezone;
		const TimezoneDefault = null;


		/**
		 * Protected member variable that maps to the database column person.registration_date
		 * @var QDateTime dttRegistrationDate
		 */
		protected $dttRegistrationDate;
		const RegistrationDateDefault = null;


		/**
		 * Private member variable that stores a reference to a single TopicAsEmail object
		 * (of type Topic), if this Person object was restored with
		 * an expansion on the email_topic_person_assn association table.
		 * @var Topic _objTopicAsEmail;
		 */
		private $_objTopicAsEmail;

		/**
		 * Private member variable that stores a reference to an array of TopicAsEmail objects
		 * (of type Topic[]), if this Person object was restored with
		 * an ExpandAsArray on the email_topic_person_assn association table.
		 * @var Topic[] _objTopicAsEmailArray;
		 */
		private $_objTopicAsEmailArray = array();

		/**
		 * Private member variable that stores a reference to a single TopicAsReadOnce object
		 * (of type Topic), if this Person object was restored with
		 * an expansion on the read_once_topic_person_assn association table.
		 * @var Topic _objTopicAsReadOnce;
		 */
		private $_objTopicAsReadOnce;

		/**
		 * Private member variable that stores a reference to an array of TopicAsReadOnce objects
		 * (of type Topic[]), if this Person object was restored with
		 * an ExpandAsArray on the read_once_topic_person_assn association table.
		 * @var Topic[] _objTopicAsReadOnceArray;
		 */
		private $_objTopicAsReadOnceArray = array();

		/**
		 * Private member variable that stores a reference to a single TopicAsRead object
		 * (of type Topic), if this Person object was restored with
		 * an expansion on the read_topic_person_assn association table.
		 * @var Topic _objTopicAsRead;
		 */
		private $_objTopicAsRead;

		/**
		 * Private member variable that stores a reference to an array of TopicAsRead objects
		 * (of type Topic[]), if this Person object was restored with
		 * an ExpandAsArray on the read_topic_person_assn association table.
		 * @var Topic[] _objTopicAsReadArray;
		 */
		private $_objTopicAsReadArray = array();

		/**
		 * Private member variable that stores a reference to a single Download object
		 * (of type Download), if this Person object was restored with
		 * an expansion on the download association table.
		 * @var Download _objDownload;
		 */
		private $_objDownload;

		/**
		 * Private member variable that stores a reference to an array of Download objects
		 * (of type Download[]), if this Person object was restored with
		 * an ExpandAsArray on the download association table.
		 * @var Download[] _objDownloadArray;
		 */
		private $_objDownloadArray = array();

		/**
		 * Private member variable that stores a reference to a single LoginTicket object
		 * (of type LoginTicket), if this Person object was restored with
		 * an expansion on the login_ticket association table.
		 * @var LoginTicket _objLoginTicket;
		 */
		private $_objLoginTicket;

		/**
		 * Private member variable that stores a reference to an array of LoginTicket objects
		 * (of type LoginTicket[]), if this Person object was restored with
		 * an ExpandAsArray on the login_ticket association table.
		 * @var LoginTicket[] _objLoginTicketArray;
		 */
		private $_objLoginTicketArray = array();

		/**
		 * Private member variable that stores a reference to a single Message object
		 * (of type Message), if this Person object was restored with
		 * an expansion on the message association table.
		 * @var Message _objMessage;
		 */
		private $_objMessage;

		/**
		 * Private member variable that stores a reference to an array of Message objects
		 * (of type Message[]), if this Person object was restored with
		 * an ExpandAsArray on the message association table.
		 * @var Message[] _objMessageArray;
		 */
		private $_objMessageArray = array();

		/**
		 * Private member variable that stores a reference to a single Topic object
		 * (of type Topic), if this Person object was restored with
		 * an expansion on the topic association table.
		 * @var Topic _objTopic;
		 */
		private $_objTopic;

		/**
		 * Private member variable that stores a reference to an array of Topic objects
		 * (of type Topic[]), if this Person object was restored with
		 * an ExpandAsArray on the topic association table.
		 * @var Topic[] _objTopicArray;
		 */
		private $_objTopicArray = array();

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
		 * in the database column person.country_id.
		 *
		 * NOTE: Always use the Country property getter to correctly retrieve this Country object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Country objCountry
		 */
		protected $objCountry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.timezone.
		 *
		 * NOTE: Always use the TimezoneObject property getter to correctly retrieve this Timezone object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Timezone objTimezoneObject
		 */
		protected $objTimezoneObject;





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
		 * Load a Person from PK Info
		 * @param integer $intId
		 * @return Person
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->Id, $intId)
			);
		}

		/**
		 * Load all People
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadAll query
			try {
				return Person::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all People
		 * @return int
		 */
		public static function CountAll() {
			// Call Person::QueryCount to perform the CountAll query
			return Person::QueryCount(QQ::All());
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
			$objDatabase = Person::GetDatabase();

			// Create/Build out the QueryBuilder object with Person-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'person');
			Person::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('person');

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
		 * Static Qcodo Query method to query for a single Person object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Person object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Person::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Person::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'person_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Person-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Person::GetSelectFields($objQueryBuilder);
				Person::GetFromFields($objQueryBuilder);

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
			return Person::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Person
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'person';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_type_id', $strAliasPrefix . 'person_type_id');
			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'password_reset_flag', $strAliasPrefix . 'password_reset_flag');
			$objBuilder->AddSelectItem($strTableName, 'display_real_name_flag', $strAliasPrefix . 'display_real_name_flag');
			$objBuilder->AddSelectItem($strTableName, 'display_email_flag', $strAliasPrefix . 'display_email_flag');
			$objBuilder->AddSelectItem($strTableName, 'opt_in_flag', $strAliasPrefix . 'opt_in_flag');
			$objBuilder->AddSelectItem($strTableName, 'donated_flag', $strAliasPrefix . 'donated_flag');
			$objBuilder->AddSelectItem($strTableName, 'location', $strAliasPrefix . 'location');
			$objBuilder->AddSelectItem($strTableName, 'country_id', $strAliasPrefix . 'country_id');
			$objBuilder->AddSelectItem($strTableName, 'url', $strAliasPrefix . 'url');
			$objBuilder->AddSelectItem($strTableName, 'timezone', $strAliasPrefix . 'timezone');
			$objBuilder->AddSelectItem($strTableName, 'registration_date', $strAliasPrefix . 'registration_date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Person from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Person::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Person
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
					$strAliasPrefix = 'person__';

				$strAlias = $strAliasPrefix . 'topicasemail__topic_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTopicAsEmailArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTopicAsEmailArray[$intPreviousChildItemCount - 1];
						$objChildItem = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasemail__topic_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTopicAsEmailArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTopicAsEmailArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasemail__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'topicasreadonce__topic_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTopicAsReadOnceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTopicAsReadOnceArray[$intPreviousChildItemCount - 1];
						$objChildItem = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasreadonce__topic_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTopicAsReadOnceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTopicAsReadOnceArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasreadonce__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'topicasread__topic_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTopicAsReadArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTopicAsReadArray[$intPreviousChildItemCount - 1];
						$objChildItem = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasread__topic_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTopicAsReadArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTopicAsReadArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasread__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'download__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDownloadArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDownloadArray[$intPreviousChildItemCount - 1];
						$objChildItem = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objDownloadArray[] = $objChildItem;
					} else
						$objPreviousItem->_objDownloadArray[] = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'loginticket__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLoginTicketArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLoginTicketArray[$intPreviousChildItemCount - 1];
						$objChildItem = LoginTicket::InstantiateDbRow($objDbRow, $strAliasPrefix . 'loginticket__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLoginTicketArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLoginTicketArray[] = LoginTicket::InstantiateDbRow($objDbRow, $strAliasPrefix . 'loginticket__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'message__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMessageArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMessageArray[$intPreviousChildItemCount - 1];
						$objChildItem = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMessageArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMessageArray[] = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'topic__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTopicArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTopicArray[$intPreviousChildItemCount - 1];
						$objChildItem = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTopicArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTopicArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'person__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Person object
			$objToReturn = new Person();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_type_id'] : $strAliasPrefix . 'person_type_id';
			$objToReturn->intPersonTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password_reset_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password_reset_flag'] : $strAliasPrefix . 'password_reset_flag';
			$objToReturn->blnPasswordResetFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'display_real_name_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'display_real_name_flag'] : $strAliasPrefix . 'display_real_name_flag';
			$objToReturn->blnDisplayRealNameFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'display_email_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'display_email_flag'] : $strAliasPrefix . 'display_email_flag';
			$objToReturn->blnDisplayEmailFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'opt_in_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'opt_in_flag'] : $strAliasPrefix . 'opt_in_flag';
			$objToReturn->blnOptInFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'donated_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'donated_flag'] : $strAliasPrefix . 'donated_flag';
			$objToReturn->blnDonatedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'location', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location'] : $strAliasPrefix . 'location';
			$objToReturn->strLocation = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'country_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country_id'] : $strAliasPrefix . 'country_id';
			$objToReturn->intCountryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'url', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'url'] : $strAliasPrefix . 'url';
			$objToReturn->strUrl = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'timezone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'timezone'] : $strAliasPrefix . 'timezone';
			$objToReturn->intTimezone = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'registration_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'registration_date'] : $strAliasPrefix . 'registration_date';
			$objToReturn->dttRegistrationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'person__';

			// Check for Country Early Binding
			$strAlias = $strAliasPrefix . 'country_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCountry = Country::InstantiateDbRow($objDbRow, $strAliasPrefix . 'country_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for TimezoneObject Early Binding
			$strAlias = $strAliasPrefix . 'timezone__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTimezoneObject = Timezone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timezone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for TopicAsEmail Virtual Binding
			$strAlias = $strAliasPrefix . 'topicasemail__topic_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTopicAsEmailArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasemail__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTopicAsEmail = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasemail__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TopicAsReadOnce Virtual Binding
			$strAlias = $strAliasPrefix . 'topicasreadonce__topic_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTopicAsReadOnceArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasreadonce__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTopicAsReadOnce = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasreadonce__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TopicAsRead Virtual Binding
			$strAlias = $strAliasPrefix . 'topicasread__topic_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTopicAsReadArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasread__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTopicAsRead = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topicasread__topic_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for Download Virtual Binding
			$strAlias = $strAliasPrefix . 'download__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDownloadArray[] = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDownload = Download::InstantiateDbRow($objDbRow, $strAliasPrefix . 'download__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LoginTicket Virtual Binding
			$strAlias = $strAliasPrefix . 'loginticket__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLoginTicketArray[] = LoginTicket::InstantiateDbRow($objDbRow, $strAliasPrefix . 'loginticket__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLoginTicket = LoginTicket::InstantiateDbRow($objDbRow, $strAliasPrefix . 'loginticket__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Message Virtual Binding
			$strAlias = $strAliasPrefix . 'message__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMessageArray[] = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMessage = Message::InstantiateDbRow($objDbRow, $strAliasPrefix . 'message__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Topic Virtual Binding
			$strAlias = $strAliasPrefix . 'topic__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTopicArray[] = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTopic = Topic::InstantiateDbRow($objDbRow, $strAliasPrefix . 'topic__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of People from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Person[]
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
					$objItem = Person::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Person::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Person object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Person
		*/
		public static function LoadById($intId) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Person object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @return Person
		*/
		public static function LoadByEmail($strEmail) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->Email, $strEmail)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by PersonTypeId Index(es)
		 * @param integer $intPersonTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByPersonTypeId($intPersonTypeId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByPersonTypeId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->PersonTypeId, $intPersonTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by PersonTypeId Index(es)
		 * @param integer $intPersonTypeId
		 * @return int
		*/
		public static function CountByPersonTypeId($intPersonTypeId) {
			// Call Person::QueryCount to perform the CountByPersonTypeId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->PersonTypeId, $intPersonTypeId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by Username Index(es)
		 * @param string $strUsername
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByUsername($strUsername, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByUsername query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->Username, $strUsername),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by Username Index(es)
		 * @param string $strUsername
		 * @return int
		*/
		public static function CountByUsername($strUsername) {
			// Call Person::QueryCount to perform the CountByUsername query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->Username, $strUsername)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByCountryId($intCountryId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByCountryId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->CountryId, $intCountryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @return int
		*/
		public static function CountByCountryId($intCountryId) {
			// Call Person::QueryCount to perform the CountByCountryId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->CountryId, $intCountryId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by Timezone Index(es)
		 * @param integer $intTimezone
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByTimezone($intTimezone, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByTimezone query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->Timezone, $intTimezone),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by Timezone Index(es)
		 * @param integer $intTimezone
		 * @return int
		*/
		public static function CountByTimezone($intTimezone) {
			// Call Person::QueryCount to perform the CountByTimezone query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->Timezone, $intTimezone)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Topic objects for a given TopicAsEmail
		 * via the email_topic_person_assn table
		 * @param integer $intTopicId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByTopicAsEmail($intTopicId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByTopicAsEmail query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->TopicAsEmail->TopicId, $intTopicId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given TopicAsEmail
		 * via the email_topic_person_assn table
		 * @param integer $intTopicId
		 * @return int
		*/
		public static function CountByTopicAsEmail($intTopicId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->TopicAsEmail->TopicId, $intTopicId)
			);
		}
			/**
		 * Load an array of Topic objects for a given TopicAsReadOnce
		 * via the read_once_topic_person_assn table
		 * @param integer $intTopicId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByTopicAsReadOnce($intTopicId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByTopicAsReadOnce query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->TopicAsReadOnce->TopicId, $intTopicId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given TopicAsReadOnce
		 * via the read_once_topic_person_assn table
		 * @param integer $intTopicId
		 * @return int
		*/
		public static function CountByTopicAsReadOnce($intTopicId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->TopicAsReadOnce->TopicId, $intTopicId)
			);
		}
			/**
		 * Load an array of Topic objects for a given TopicAsRead
		 * via the read_topic_person_assn table
		 * @param integer $intTopicId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByTopicAsRead($intTopicId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByTopicAsRead query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->TopicAsRead->TopicId, $intTopicId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given TopicAsRead
		 * via the read_topic_person_assn table
		 * @param integer $intTopicId
		 * @return int
		*/
		public static function CountByTopicAsRead($intTopicId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->TopicAsRead->TopicId, $intTopicId)
			);
		}




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Person
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `person` (
							`person_type_id`,
							`username`,
							`password`,
							`first_name`,
							`last_name`,
							`email`,
							`password_reset_flag`,
							`display_real_name_flag`,
							`display_email_flag`,
							`opt_in_flag`,
							`donated_flag`,
							`location`,
							`country_id`,
							`url`,
							`timezone`,
							`registration_date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonTypeId) . ',
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->blnPasswordResetFlag) . ',
							' . $objDatabase->SqlVariable($this->blnDisplayRealNameFlag) . ',
							' . $objDatabase->SqlVariable($this->blnDisplayEmailFlag) . ',
							' . $objDatabase->SqlVariable($this->blnOptInFlag) . ',
							' . $objDatabase->SqlVariable($this->blnDonatedFlag) . ',
							' . $objDatabase->SqlVariable($this->strLocation) . ',
							' . $objDatabase->SqlVariable($this->intCountryId) . ',
							' . $objDatabase->SqlVariable($this->strUrl) . ',
							' . $objDatabase->SqlVariable($this->intTimezone) . ',
							' . $objDatabase->SqlVariable($this->dttRegistrationDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('person', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`person`
						SET
							`person_type_id` = ' . $objDatabase->SqlVariable($this->intPersonTypeId) . ',
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`password_reset_flag` = ' . $objDatabase->SqlVariable($this->blnPasswordResetFlag) . ',
							`display_real_name_flag` = ' . $objDatabase->SqlVariable($this->blnDisplayRealNameFlag) . ',
							`display_email_flag` = ' . $objDatabase->SqlVariable($this->blnDisplayEmailFlag) . ',
							`opt_in_flag` = ' . $objDatabase->SqlVariable($this->blnOptInFlag) . ',
							`donated_flag` = ' . $objDatabase->SqlVariable($this->blnDonatedFlag) . ',
							`location` = ' . $objDatabase->SqlVariable($this->strLocation) . ',
							`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . ',
							`url` = ' . $objDatabase->SqlVariable($this->strUrl) . ',
							`timezone` = ' . $objDatabase->SqlVariable($this->intTimezone) . ',
							`registration_date` = ' . $objDatabase->SqlVariable($this->dttRegistrationDate) . '
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
		 * Delete this Person
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Person with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all People
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`');
		}

		/**
		 * Truncate person table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `person`');
		}

		/**
		 * Reload this Person from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Person object.');

			// Reload the Object
			$objReloaded = Person::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonTypeId = $objReloaded->PersonTypeId;
			$this->strUsername = $objReloaded->strUsername;
			$this->strPassword = $objReloaded->strPassword;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEmail = $objReloaded->strEmail;
			$this->blnPasswordResetFlag = $objReloaded->blnPasswordResetFlag;
			$this->blnDisplayRealNameFlag = $objReloaded->blnDisplayRealNameFlag;
			$this->blnDisplayEmailFlag = $objReloaded->blnDisplayEmailFlag;
			$this->blnOptInFlag = $objReloaded->blnOptInFlag;
			$this->blnDonatedFlag = $objReloaded->blnDonatedFlag;
			$this->strLocation = $objReloaded->strLocation;
			$this->CountryId = $objReloaded->CountryId;
			$this->strUrl = $objReloaded->strUrl;
			$this->Timezone = $objReloaded->Timezone;
			$this->dttRegistrationDate = $objReloaded->dttRegistrationDate;
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

				case 'PersonTypeId':
					/**
					 * Gets the value for intPersonTypeId (Not Null)
					 * @return integer
					 */
					return $this->intPersonTypeId;

				case 'Username':
					/**
					 * Gets the value for strUsername (Not Null)
					 * @return string
					 */
					return $this->strUsername;

				case 'Password':
					/**
					 * Gets the value for strPassword 
					 * @return string
					 */
					return $this->strPassword;

				case 'FirstName':
					/**
					 * Gets the value for strFirstName (Not Null)
					 * @return string
					 */
					return $this->strFirstName;

				case 'LastName':
					/**
					 * Gets the value for strLastName (Not Null)
					 * @return string
					 */
					return $this->strLastName;

				case 'Email':
					/**
					 * Gets the value for strEmail (Unique)
					 * @return string
					 */
					return $this->strEmail;

				case 'PasswordResetFlag':
					/**
					 * Gets the value for blnPasswordResetFlag 
					 * @return boolean
					 */
					return $this->blnPasswordResetFlag;

				case 'DisplayRealNameFlag':
					/**
					 * Gets the value for blnDisplayRealNameFlag 
					 * @return boolean
					 */
					return $this->blnDisplayRealNameFlag;

				case 'DisplayEmailFlag':
					/**
					 * Gets the value for blnDisplayEmailFlag 
					 * @return boolean
					 */
					return $this->blnDisplayEmailFlag;

				case 'OptInFlag':
					/**
					 * Gets the value for blnOptInFlag 
					 * @return boolean
					 */
					return $this->blnOptInFlag;

				case 'DonatedFlag':
					/**
					 * Gets the value for blnDonatedFlag 
					 * @return boolean
					 */
					return $this->blnDonatedFlag;

				case 'Location':
					/**
					 * Gets the value for strLocation 
					 * @return string
					 */
					return $this->strLocation;

				case 'CountryId':
					/**
					 * Gets the value for intCountryId 
					 * @return integer
					 */
					return $this->intCountryId;

				case 'Url':
					/**
					 * Gets the value for strUrl 
					 * @return string
					 */
					return $this->strUrl;

				case 'Timezone':
					/**
					 * Gets the value for intTimezone 
					 * @return integer
					 */
					return $this->intTimezone;

				case 'RegistrationDate':
					/**
					 * Gets the value for dttRegistrationDate 
					 * @return QDateTime
					 */
					return $this->dttRegistrationDate;


				///////////////////
				// Member Objects
				///////////////////
				case 'Country':
					/**
					 * Gets the value for the Country object referenced by intCountryId 
					 * @return Country
					 */
					try {
						if ((!$this->objCountry) && (!is_null($this->intCountryId)))
							$this->objCountry = Country::Load($this->intCountryId);
						return $this->objCountry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TimezoneObject':
					/**
					 * Gets the value for the Timezone object referenced by intTimezone 
					 * @return Timezone
					 */
					try {
						if ((!$this->objTimezoneObject) && (!is_null($this->intTimezone)))
							$this->objTimezoneObject = Timezone::Load($this->intTimezone);
						return $this->objTimezoneObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_TopicAsEmail':
					/**
					 * Gets the value for the private _objTopicAsEmail (Read-Only)
					 * if set due to an expansion on the email_topic_person_assn association table
					 * @return Topic
					 */
					return $this->_objTopicAsEmail;

				case '_TopicAsEmailArray':
					/**
					 * Gets the value for the private _objTopicAsEmailArray (Read-Only)
					 * if set due to an ExpandAsArray on the email_topic_person_assn association table
					 * @return Topic[]
					 */
					return (array) $this->_objTopicAsEmailArray;

				case '_TopicAsReadOnce':
					/**
					 * Gets the value for the private _objTopicAsReadOnce (Read-Only)
					 * if set due to an expansion on the read_once_topic_person_assn association table
					 * @return Topic
					 */
					return $this->_objTopicAsReadOnce;

				case '_TopicAsReadOnceArray':
					/**
					 * Gets the value for the private _objTopicAsReadOnceArray (Read-Only)
					 * if set due to an ExpandAsArray on the read_once_topic_person_assn association table
					 * @return Topic[]
					 */
					return (array) $this->_objTopicAsReadOnceArray;

				case '_TopicAsRead':
					/**
					 * Gets the value for the private _objTopicAsRead (Read-Only)
					 * if set due to an expansion on the read_topic_person_assn association table
					 * @return Topic
					 */
					return $this->_objTopicAsRead;

				case '_TopicAsReadArray':
					/**
					 * Gets the value for the private _objTopicAsReadArray (Read-Only)
					 * if set due to an ExpandAsArray on the read_topic_person_assn association table
					 * @return Topic[]
					 */
					return (array) $this->_objTopicAsReadArray;

				case '_Download':
					/**
					 * Gets the value for the private _objDownload (Read-Only)
					 * if set due to an expansion on the download.person_id reverse relationship
					 * @return Download
					 */
					return $this->_objDownload;

				case '_DownloadArray':
					/**
					 * Gets the value for the private _objDownloadArray (Read-Only)
					 * if set due to an ExpandAsArray on the download.person_id reverse relationship
					 * @return Download[]
					 */
					return (array) $this->_objDownloadArray;

				case '_LoginTicket':
					/**
					 * Gets the value for the private _objLoginTicket (Read-Only)
					 * if set due to an expansion on the login_ticket.person_id reverse relationship
					 * @return LoginTicket
					 */
					return $this->_objLoginTicket;

				case '_LoginTicketArray':
					/**
					 * Gets the value for the private _objLoginTicketArray (Read-Only)
					 * if set due to an ExpandAsArray on the login_ticket.person_id reverse relationship
					 * @return LoginTicket[]
					 */
					return (array) $this->_objLoginTicketArray;

				case '_Message':
					/**
					 * Gets the value for the private _objMessage (Read-Only)
					 * if set due to an expansion on the message.person_id reverse relationship
					 * @return Message
					 */
					return $this->_objMessage;

				case '_MessageArray':
					/**
					 * Gets the value for the private _objMessageArray (Read-Only)
					 * if set due to an ExpandAsArray on the message.person_id reverse relationship
					 * @return Message[]
					 */
					return (array) $this->_objMessageArray;

				case '_Topic':
					/**
					 * Gets the value for the private _objTopic (Read-Only)
					 * if set due to an expansion on the topic.person_id reverse relationship
					 * @return Topic
					 */
					return $this->_objTopic;

				case '_TopicArray':
					/**
					 * Gets the value for the private _objTopicArray (Read-Only)
					 * if set due to an ExpandAsArray on the topic.person_id reverse relationship
					 * @return Topic[]
					 */
					return (array) $this->_objTopicArray;


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
				case 'PersonTypeId':
					/**
					 * Sets the value for intPersonTypeId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPersonTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Username':
					/**
					 * Sets the value for strUsername (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					/**
					 * Sets the value for strPassword 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					/**
					 * Sets the value for strFirstName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					/**
					 * Sets the value for strLastName (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PasswordResetFlag':
					/**
					 * Sets the value for blnPasswordResetFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnPasswordResetFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DisplayRealNameFlag':
					/**
					 * Sets the value for blnDisplayRealNameFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDisplayRealNameFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DisplayEmailFlag':
					/**
					 * Sets the value for blnDisplayEmailFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDisplayEmailFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OptInFlag':
					/**
					 * Sets the value for blnOptInFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnOptInFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DonatedFlag':
					/**
					 * Sets the value for blnDonatedFlag 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDonatedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Location':
					/**
					 * Sets the value for strLocation 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLocation = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CountryId':
					/**
					 * Sets the value for intCountryId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCountry = null;
						return ($this->intCountryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Url':
					/**
					 * Sets the value for strUrl 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUrl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Timezone':
					/**
					 * Sets the value for intTimezone 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTimezoneObject = null;
						return ($this->intTimezone = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistrationDate':
					/**
					 * Sets the value for dttRegistrationDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttRegistrationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Country':
					/**
					 * Sets the value for the Country object referenced by intCountryId 
					 * @param Country $mixValue
					 * @return Country
					 */
					if (is_null($mixValue)) {
						$this->intCountryId = null;
						$this->objCountry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Country object
						try {
							$mixValue = QType::Cast($mixValue, 'Country');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Country object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Country for this Person');

						// Update Local Member Variables
						$this->objCountry = $mixValue;
						$this->intCountryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TimezoneObject':
					/**
					 * Sets the value for the Timezone object referenced by intTimezone 
					 * @param Timezone $mixValue
					 * @return Timezone
					 */
					if (is_null($mixValue)) {
						$this->intTimezone = null;
						$this->objTimezoneObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Timezone object
						try {
							$mixValue = QType::Cast($mixValue, 'Timezone');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Timezone object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TimezoneObject for this Person');

						// Update Local Member Variables
						$this->objTimezoneObject = $mixValue;
						$this->intTimezone = $mixValue->Id;

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

			
		
		// Related Objects' Methods for Download
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Downloads as an array of Download objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Download[]
		*/ 
		public function GetDownloadArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Download::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Downloads
		 * @return int
		*/ 
		public function CountDownloads() {
			if ((is_null($this->intId)))
				return 0;

			return Download::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function AssociateDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDownload on this unsaved Person.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDownload on this Person with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . '
			');
		}

		/**
		 * Unassociates a Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function UnassociateDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved Person.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this Person with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Downloads
		 * @return void
		*/ 
		public function UnassociateAllDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`download`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Download
		 * @param Download $objDownload
		 * @return void
		*/ 
		public function DeleteAssociatedDownload(Download $objDownload) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved Person.');
			if ((is_null($objDownload->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this Person with an unsaved Download.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDownload->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Downloads
		 * @return void
		*/ 
		public function DeleteAllDownloads() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDownload on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`download`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LoginTicket
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LoginTickets as an array of LoginTicket objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LoginTicket[]
		*/ 
		public function GetLoginTicketArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LoginTicket::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LoginTickets
		 * @return int
		*/ 
		public function CountLoginTickets() {
			if ((is_null($this->intId)))
				return 0;

			return LoginTicket::CountByPersonId($this->intId);
		}

		/**
		 * Associates a LoginTicket
		 * @param LoginTicket $objLoginTicket
		 * @return void
		*/ 
		public function AssociateLoginTicket(LoginTicket $objLoginTicket) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLoginTicket on this unsaved Person.');
			if ((is_null($objLoginTicket->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLoginTicket on this Person with an unsaved LoginTicket.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`login_ticket`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLoginTicket->Id) . '
			');
		}

		/**
		 * Unassociates a LoginTicket
		 * @param LoginTicket $objLoginTicket
		 * @return void
		*/ 
		public function UnassociateLoginTicket(LoginTicket $objLoginTicket) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this unsaved Person.');
			if ((is_null($objLoginTicket->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this Person with an unsaved LoginTicket.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`login_ticket`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLoginTicket->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all LoginTickets
		 * @return void
		*/ 
		public function UnassociateAllLoginTickets() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`login_ticket`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LoginTicket
		 * @param LoginTicket $objLoginTicket
		 * @return void
		*/ 
		public function DeleteAssociatedLoginTicket(LoginTicket $objLoginTicket) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this unsaved Person.');
			if ((is_null($objLoginTicket->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this Person with an unsaved LoginTicket.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login_ticket`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLoginTicket->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated LoginTickets
		 * @return void
		*/ 
		public function DeleteAllLoginTickets() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLoginTicket on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login_ticket`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Message
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Messages as an array of Message objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Message[]
		*/ 
		public function GetMessageArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Message::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Messages
		 * @return int
		*/ 
		public function CountMessages() {
			if ((is_null($this->intId)))
				return 0;

			return Message::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function AssociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this unsaved Person.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMessage on this Person with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . '
			');
		}

		/**
		 * Unassociates a Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function UnassociateMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Person.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Person with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Messages
		 * @return void
		*/ 
		public function UnassociateAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`message`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Message
		 * @param Message $objMessage
		 * @return void
		*/ 
		public function DeleteAssociatedMessage(Message $objMessage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Person.');
			if ((is_null($objMessage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this Person with an unsaved Message.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMessage->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Messages
		 * @return void
		*/ 
		public function DeleteAllMessages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMessage on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`message`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Topic
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Topics as an array of Topic objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/ 
		public function GetTopicArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Topic::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Topics
		 * @return int
		*/ 
		public function CountTopics() {
			if ((is_null($this->intId)))
				return 0;

			return Topic::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopic on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . '
			');
		}

		/**
		 * Unassociates a Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function UnassociateTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Topics
		 * @return void
		*/ 
		public function UnassociateAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`topic`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Topic
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function DeleteAssociatedTopic(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTopic->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Topics
		 * @return void
		*/ 
		public function DeleteAllTopics() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopic on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`topic`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for TopicAsEmail
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated TopicsAsEmail as an array of Topic objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/ 
		public function GetTopicAsEmailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Topic::LoadArrayByPersonAsEmail($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated TopicsAsEmail
		 * @return int
		*/ 
		public function CountTopicsAsEmail() {
			if ((is_null($this->intId)))
				return 0;

			return Topic::CountByPersonAsEmail($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific TopicAsEmail
		 * @param Topic $objTopic
		 * @return bool
		*/
		public function IsTopicAsEmailAssociated(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsEmailAssociated on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsEmailAssociated on this Person with an unsaved Topic.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->TopicAsEmail->TopicId, $objTopic->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a TopicAsEmail
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopicAsEmail(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsEmail on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsEmail on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `email_topic_person_assn` (
					`person_id`,
					`topic_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objTopic->Id) . '
				)
			');
		}

		/**
		 * Unassociates a TopicAsEmail
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function UnassociateTopicAsEmail(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsEmail on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsEmail on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`topic_id` = ' . $objDatabase->SqlVariable($objTopic->Id) . '
			');
		}

		/**
		 * Unassociates all TopicsAsEmail
		 * @return void
		*/ 
		public function UnassociateAllTopicsAsEmail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllTopicAsEmailArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for TopicAsReadOnce
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated TopicsAsReadOnce as an array of Topic objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/ 
		public function GetTopicAsReadOnceArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Topic::LoadArrayByPersonAsReadOnce($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated TopicsAsReadOnce
		 * @return int
		*/ 
		public function CountTopicsAsReadOnce() {
			if ((is_null($this->intId)))
				return 0;

			return Topic::CountByPersonAsReadOnce($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific TopicAsReadOnce
		 * @param Topic $objTopic
		 * @return bool
		*/
		public function IsTopicAsReadOnceAssociated(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsReadOnceAssociated on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsReadOnceAssociated on this Person with an unsaved Topic.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->TopicAsReadOnce->TopicId, $objTopic->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a TopicAsReadOnce
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopicAsReadOnce(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsReadOnce on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsReadOnce on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `read_once_topic_person_assn` (
					`person_id`,
					`topic_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objTopic->Id) . '
				)
			');
		}

		/**
		 * Unassociates a TopicAsReadOnce
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function UnassociateTopicAsReadOnce(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsReadOnce on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsReadOnce on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_once_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`topic_id` = ' . $objDatabase->SqlVariable($objTopic->Id) . '
			');
		}

		/**
		 * Unassociates all TopicsAsReadOnce
		 * @return void
		*/ 
		public function UnassociateAllTopicsAsReadOnce() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllTopicAsReadOnceArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_once_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for TopicAsRead
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated TopicsAsRead as an array of Topic objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Topic[]
		*/ 
		public function GetTopicAsReadArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Topic::LoadArrayByPersonAsRead($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated TopicsAsRead
		 * @return int
		*/ 
		public function CountTopicsAsRead() {
			if ((is_null($this->intId)))
				return 0;

			return Topic::CountByPersonAsRead($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific TopicAsRead
		 * @param Topic $objTopic
		 * @return bool
		*/
		public function IsTopicAsReadAssociated(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsReadAssociated on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsTopicAsReadAssociated on this Person with an unsaved Topic.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->TopicAsRead->TopicId, $objTopic->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a TopicAsRead
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function AssociateTopicAsRead(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsRead on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTopicAsRead on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `read_topic_person_assn` (
					`person_id`,
					`topic_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objTopic->Id) . '
				)
			');
		}

		/**
		 * Unassociates a TopicAsRead
		 * @param Topic $objTopic
		 * @return void
		*/ 
		public function UnassociateTopicAsRead(Topic $objTopic) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsRead on this unsaved Person.');
			if ((is_null($objTopic->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTopicAsRead on this Person with an unsaved Topic.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`topic_id` = ' . $objDatabase->SqlVariable($objTopic->Id) . '
			');
		}

		/**
		 * Unassociates all TopicsAsRead
		 * @return void
		*/ 
		public function UnassociateAllTopicsAsRead() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllTopicAsReadArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`read_topic_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Person"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PersonTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="PasswordResetFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DisplayRealNameFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DisplayEmailFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="OptInFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DonatedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Location" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd1:Country"/>';
			$strToReturn .= '<element name="Url" type="xsd:string"/>';
			$strToReturn .= '<element name="TimezoneObject" type="xsd1:Timezone"/>';
			$strToReturn .= '<element name="RegistrationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Person', $strComplexTypeArray)) {
				$strComplexTypeArray['Person'] = Person::GetSoapComplexTypeXml();
				Country::AlterSoapComplexTypeArray($strComplexTypeArray);
				Timezone::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Person::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Person();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'PersonTypeId'))
				$objToReturn->intPersonTypeId = $objSoapObject->PersonTypeId;
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'PasswordResetFlag'))
				$objToReturn->blnPasswordResetFlag = $objSoapObject->PasswordResetFlag;
			if (property_exists($objSoapObject, 'DisplayRealNameFlag'))
				$objToReturn->blnDisplayRealNameFlag = $objSoapObject->DisplayRealNameFlag;
			if (property_exists($objSoapObject, 'DisplayEmailFlag'))
				$objToReturn->blnDisplayEmailFlag = $objSoapObject->DisplayEmailFlag;
			if (property_exists($objSoapObject, 'OptInFlag'))
				$objToReturn->blnOptInFlag = $objSoapObject->OptInFlag;
			if (property_exists($objSoapObject, 'DonatedFlag'))
				$objToReturn->blnDonatedFlag = $objSoapObject->DonatedFlag;
			if (property_exists($objSoapObject, 'Location'))
				$objToReturn->strLocation = $objSoapObject->Location;
			if ((property_exists($objSoapObject, 'Country')) &&
				($objSoapObject->Country))
				$objToReturn->Country = Country::GetObjectFromSoapObject($objSoapObject->Country);
			if (property_exists($objSoapObject, 'Url'))
				$objToReturn->strUrl = $objSoapObject->Url;
			if ((property_exists($objSoapObject, 'TimezoneObject')) &&
				($objSoapObject->TimezoneObject))
				$objToReturn->TimezoneObject = Timezone::GetObjectFromSoapObject($objSoapObject->TimezoneObject);
			if (property_exists($objSoapObject, 'RegistrationDate'))
				$objToReturn->dttRegistrationDate = new QDateTime($objSoapObject->RegistrationDate);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Person::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCountry)
				$objObject->objCountry = Country::GetSoapObjectFromObject($objObject->objCountry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCountryId = null;
			if ($objObject->objTimezoneObject)
				$objObject->objTimezoneObject = Timezone::GetSoapObjectFromObject($objObject->objTimezoneObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTimezone = null;
			if ($objObject->dttRegistrationDate)
				$objObject->dttRegistrationDate = $objObject->dttRegistrationDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePersonTopicAsEmail extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'topicasemail';

		protected $strTableName = 'email_topic_person_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'Topic';

		public function __get($strName) {
			switch ($strName) {
				case 'TopicId':
					return new QQNode('topic_id', 'TopicId', 'integer', $this);
				case 'Topic':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
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

	class QQNodePersonTopicAsReadOnce extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'topicasreadonce';

		protected $strTableName = 'read_once_topic_person_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'Topic';

		public function __get($strName) {
			switch ($strName) {
				case 'TopicId':
					return new QQNode('topic_id', 'TopicId', 'integer', $this);
				case 'Topic':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
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

	class QQNodePersonTopicAsRead extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'topicasread';

		protected $strTableName = 'read_topic_person_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'Topic';

		public function __get($strName) {
			switch ($strName) {
				case 'TopicId':
					return new QQNode('topic_id', 'TopicId', 'integer', $this);
				case 'Topic':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeTopic('topic_id', 'TopicId', 'integer', $this);
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

	class QQNodePerson extends QQNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonTypeId':
					return new QQNode('person_type_id', 'PersonTypeId', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'PasswordResetFlag':
					return new QQNode('password_reset_flag', 'PasswordResetFlag', 'boolean', $this);
				case 'DisplayRealNameFlag':
					return new QQNode('display_real_name_flag', 'DisplayRealNameFlag', 'boolean', $this);
				case 'DisplayEmailFlag':
					return new QQNode('display_email_flag', 'DisplayEmailFlag', 'boolean', $this);
				case 'OptInFlag':
					return new QQNode('opt_in_flag', 'OptInFlag', 'boolean', $this);
				case 'DonatedFlag':
					return new QQNode('donated_flag', 'DonatedFlag', 'boolean', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountry('country_id', 'Country', 'integer', $this);
				case 'Url':
					return new QQNode('url', 'Url', 'string', $this);
				case 'Timezone':
					return new QQNode('timezone', 'Timezone', 'integer', $this);
				case 'TimezoneObject':
					return new QQNodeTimezone('timezone', 'TimezoneObject', 'integer', $this);
				case 'RegistrationDate':
					return new QQNode('registration_date', 'RegistrationDate', 'QDateTime', $this);
				case 'TopicAsEmail':
					return new QQNodePersonTopicAsEmail($this);
				case 'TopicAsReadOnce':
					return new QQNodePersonTopicAsReadOnce($this);
				case 'TopicAsRead':
					return new QQNodePersonTopicAsRead($this);
				case 'Download':
					return new QQReverseReferenceNodeDownload($this, 'download', 'reverse_reference', 'person_id');
				case 'LoginTicket':
					return new QQReverseReferenceNodeLoginTicket($this, 'loginticket', 'reverse_reference', 'person_id');
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'person_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'person_id');

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

	class QQReverseReferenceNodePerson extends QQReverseReferenceNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonTypeId':
					return new QQNode('person_type_id', 'PersonTypeId', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'PasswordResetFlag':
					return new QQNode('password_reset_flag', 'PasswordResetFlag', 'boolean', $this);
				case 'DisplayRealNameFlag':
					return new QQNode('display_real_name_flag', 'DisplayRealNameFlag', 'boolean', $this);
				case 'DisplayEmailFlag':
					return new QQNode('display_email_flag', 'DisplayEmailFlag', 'boolean', $this);
				case 'OptInFlag':
					return new QQNode('opt_in_flag', 'OptInFlag', 'boolean', $this);
				case 'DonatedFlag':
					return new QQNode('donated_flag', 'DonatedFlag', 'boolean', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountry('country_id', 'Country', 'integer', $this);
				case 'Url':
					return new QQNode('url', 'Url', 'string', $this);
				case 'Timezone':
					return new QQNode('timezone', 'Timezone', 'integer', $this);
				case 'TimezoneObject':
					return new QQNodeTimezone('timezone', 'TimezoneObject', 'integer', $this);
				case 'RegistrationDate':
					return new QQNode('registration_date', 'RegistrationDate', 'QDateTime', $this);
				case 'TopicAsEmail':
					return new QQNodePersonTopicAsEmail($this);
				case 'TopicAsReadOnce':
					return new QQNodePersonTopicAsReadOnce($this);
				case 'TopicAsRead':
					return new QQNodePersonTopicAsRead($this);
				case 'Download':
					return new QQReverseReferenceNodeDownload($this, 'download', 'reverse_reference', 'person_id');
				case 'LoginTicket':
					return new QQReverseReferenceNodeLoginTicket($this, 'loginticket', 'reverse_reference', 'person_id');
				case 'Message':
					return new QQReverseReferenceNodeMessage($this, 'message', 'reverse_reference', 'person_id');
				case 'Topic':
					return new QQReverseReferenceNodeTopic($this, 'topic', 'reverse_reference', 'person_id');

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