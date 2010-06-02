<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Person class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Person object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read Person $Person the actual Person data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonTypeIdControl
	 * property-read QLabel $PersonTypeIdLabel
	 * property QTextBox $UsernameControl
	 * property-read QLabel $UsernameLabel
	 * property QTextBox $PasswordControl
	 * property-read QLabel $PasswordLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $DisplayNameControl
	 * property-read QLabel $DisplayNameLabel
	 * property QCheckBox $PasswordResetFlagControl
	 * property-read QLabel $PasswordResetFlagLabel
	 * property QCheckBox $DisplayRealNameFlagControl
	 * property-read QLabel $DisplayRealNameFlagLabel
	 * property QCheckBox $DisplayEmailFlagControl
	 * property-read QLabel $DisplayEmailFlagLabel
	 * property QCheckBox $OptInFlagControl
	 * property-read QLabel $OptInFlagLabel
	 * property QCheckBox $DonatedFlagControl
	 * property-read QLabel $DonatedFlagLabel
	 * property QTextBox $LocationControl
	 * property-read QLabel $LocationLabel
	 * property QListBox $CountryIdControl
	 * property-read QLabel $CountryIdLabel
	 * property QTextBox $UrlControl
	 * property-read QLabel $UrlLabel
	 * property QListBox $TimezoneIdControl
	 * property-read QLabel $TimezoneIdLabel
	 * property QDateTimePicker $RegistrationDateControl
	 * property-read QLabel $RegistrationDateLabel
	 * property QListBox $TopicAsEmailControl
	 * property-read QLabel $TopicAsEmailLabel
	 * property QListBox $TopicAsReadOnceControl
	 * property-read QLabel $TopicAsReadOnceLabel
	 * property QListBox $TopicAsReadControl
	 * property-read QLabel $TopicAsReadLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonMetaControlGen extends QBaseClass {
		// General Variables
		protected $objPerson;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Person's individual data fields
		protected $lblId;
		protected $lstPersonType;
		protected $txtUsername;
		protected $txtPassword;
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtEmail;
		protected $txtDisplayName;
		protected $chkPasswordResetFlag;
		protected $chkDisplayRealNameFlag;
		protected $chkDisplayEmailFlag;
		protected $chkOptInFlag;
		protected $chkDonatedFlag;
		protected $txtLocation;
		protected $lstCountry;
		protected $txtUrl;
		protected $lstTimezone;
		protected $calRegistrationDate;

		// Controls that allow the viewing of Person's individual data fields
		protected $lblPersonTypeId;
		protected $lblUsername;
		protected $lblPassword;
		protected $lblFirstName;
		protected $lblLastName;
		protected $lblEmail;
		protected $lblDisplayName;
		protected $lblPasswordResetFlag;
		protected $lblDisplayRealNameFlag;
		protected $lblDisplayEmailFlag;
		protected $lblOptInFlag;
		protected $lblDonatedFlag;
		protected $lblLocation;
		protected $lblCountryId;
		protected $lblUrl;
		protected $lblTimezoneId;
		protected $lblRegistrationDate;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstTopicsAsEmail;
		protected $lstTopicsAsReadOnce;
		protected $lstTopicsAsRead;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblTopicsAsEmail;
		protected $lblTopicsAsReadOnce;
		protected $lblTopicsAsRead;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PersonMetaControl to edit a single Person object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Person object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param Person $objPerson new or existing Person object
		 */
		 public function __construct($objParentObject, Person $objPerson) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PersonMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Person object
			$this->objPerson = $objPerson;

			// Figure out if we're Editing or Creating New
			if ($this->objPerson->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
 		 * @return PersonMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPerson = Person::Load($intId);

				// Person was found -- return it!
				if ($objPerson)
					return new PersonMetaControl($objParentObject, $objPerson);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Person object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PersonMetaControl($objParentObject, new Person());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PersonMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PersonMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objPerson->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPersonType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPersonType_Create($strControlId = null) {
			$this->lstPersonType = new QListBox($this->objParentObject, $strControlId);
			$this->lstPersonType->Name = QApplication::Translate('Person Type');
			$this->lstPersonType->Required = true;
			foreach (PersonType::$NameArray as $intId => $strValue)
				$this->lstPersonType->AddItem(new QListItem($strValue, $intId, $this->objPerson->PersonTypeId == $intId));
			return $this->lstPersonType;
		}

		/**
		 * Create and setup QLabel lblPersonTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonTypeId_Create($strControlId = null) {
			$this->lblPersonTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonTypeId->Name = QApplication::Translate('Person Type');
			$this->lblPersonTypeId->Text = ($this->objPerson->PersonTypeId) ? PersonType::$NameArray[$this->objPerson->PersonTypeId] : null;
			$this->lblPersonTypeId->Required = true;
			return $this->lblPersonTypeId;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objPerson->Username;
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = Person::UsernameMaxLength;
			return $this->txtUsername;
		}

		/**
		 * Create and setup QLabel lblUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUsername_Create($strControlId = null) {
			$this->lblUsername = new QLabel($this->objParentObject, $strControlId);
			$this->lblUsername->Name = QApplication::Translate('Username');
			$this->lblUsername->Text = $this->objPerson->Username;
			$this->lblUsername->Required = true;
			return $this->lblUsername;
		}

		/**
		 * Create and setup QTextBox txtPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPassword_Create($strControlId = null) {
			$this->txtPassword = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPassword->Name = QApplication::Translate('Password');
			$this->txtPassword->Text = $this->objPerson->Password;
			$this->txtPassword->MaxLength = Person::PasswordMaxLength;
			return $this->txtPassword;
		}

		/**
		 * Create and setup QLabel lblPassword
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPassword_Create($strControlId = null) {
			$this->lblPassword = new QLabel($this->objParentObject, $strControlId);
			$this->lblPassword->Name = QApplication::Translate('Password');
			$this->lblPassword->Text = $this->objPerson->Password;
			return $this->lblPassword;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = Person::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objPerson->FirstName;
			$this->lblFirstName->Required = true;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = Person::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objPerson->LastName;
			$this->lblLastName->Required = true;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objPerson->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = Person::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objPerson->Email;
			$this->lblEmail->Required = true;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtDisplayName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDisplayName_Create($strControlId = null) {
			$this->txtDisplayName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDisplayName->Name = QApplication::Translate('Display Name');
			$this->txtDisplayName->Text = $this->objPerson->DisplayName;
			$this->txtDisplayName->MaxLength = Person::DisplayNameMaxLength;
			return $this->txtDisplayName;
		}

		/**
		 * Create and setup QLabel lblDisplayName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDisplayName_Create($strControlId = null) {
			$this->lblDisplayName = new QLabel($this->objParentObject, $strControlId);
			$this->lblDisplayName->Name = QApplication::Translate('Display Name');
			$this->lblDisplayName->Text = $this->objPerson->DisplayName;
			return $this->lblDisplayName;
		}

		/**
		 * Create and setup QCheckBox chkPasswordResetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkPasswordResetFlag_Create($strControlId = null) {
			$this->chkPasswordResetFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkPasswordResetFlag->Name = QApplication::Translate('Password Reset Flag');
			$this->chkPasswordResetFlag->Checked = $this->objPerson->PasswordResetFlag;
			return $this->chkPasswordResetFlag;
		}

		/**
		 * Create and setup QLabel lblPasswordResetFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPasswordResetFlag_Create($strControlId = null) {
			$this->lblPasswordResetFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblPasswordResetFlag->Name = QApplication::Translate('Password Reset Flag');
			$this->lblPasswordResetFlag->Text = ($this->objPerson->PasswordResetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblPasswordResetFlag;
		}

		/**
		 * Create and setup QCheckBox chkDisplayRealNameFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDisplayRealNameFlag_Create($strControlId = null) {
			$this->chkDisplayRealNameFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDisplayRealNameFlag->Name = QApplication::Translate('Display Real Name Flag');
			$this->chkDisplayRealNameFlag->Checked = $this->objPerson->DisplayRealNameFlag;
			return $this->chkDisplayRealNameFlag;
		}

		/**
		 * Create and setup QLabel lblDisplayRealNameFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDisplayRealNameFlag_Create($strControlId = null) {
			$this->lblDisplayRealNameFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDisplayRealNameFlag->Name = QApplication::Translate('Display Real Name Flag');
			$this->lblDisplayRealNameFlag->Text = ($this->objPerson->DisplayRealNameFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDisplayRealNameFlag;
		}

		/**
		 * Create and setup QCheckBox chkDisplayEmailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDisplayEmailFlag_Create($strControlId = null) {
			$this->chkDisplayEmailFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDisplayEmailFlag->Name = QApplication::Translate('Display Email Flag');
			$this->chkDisplayEmailFlag->Checked = $this->objPerson->DisplayEmailFlag;
			return $this->chkDisplayEmailFlag;
		}

		/**
		 * Create and setup QLabel lblDisplayEmailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDisplayEmailFlag_Create($strControlId = null) {
			$this->lblDisplayEmailFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDisplayEmailFlag->Name = QApplication::Translate('Display Email Flag');
			$this->lblDisplayEmailFlag->Text = ($this->objPerson->DisplayEmailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDisplayEmailFlag;
		}

		/**
		 * Create and setup QCheckBox chkOptInFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkOptInFlag_Create($strControlId = null) {
			$this->chkOptInFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkOptInFlag->Name = QApplication::Translate('Opt In Flag');
			$this->chkOptInFlag->Checked = $this->objPerson->OptInFlag;
			return $this->chkOptInFlag;
		}

		/**
		 * Create and setup QLabel lblOptInFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOptInFlag_Create($strControlId = null) {
			$this->lblOptInFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblOptInFlag->Name = QApplication::Translate('Opt In Flag');
			$this->lblOptInFlag->Text = ($this->objPerson->OptInFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblOptInFlag;
		}

		/**
		 * Create and setup QCheckBox chkDonatedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDonatedFlag_Create($strControlId = null) {
			$this->chkDonatedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDonatedFlag->Name = QApplication::Translate('Donated Flag');
			$this->chkDonatedFlag->Checked = $this->objPerson->DonatedFlag;
			return $this->chkDonatedFlag;
		}

		/**
		 * Create and setup QLabel lblDonatedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDonatedFlag_Create($strControlId = null) {
			$this->lblDonatedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDonatedFlag->Name = QApplication::Translate('Donated Flag');
			$this->lblDonatedFlag->Text = ($this->objPerson->DonatedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDonatedFlag;
		}

		/**
		 * Create and setup QTextBox txtLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLocation_Create($strControlId = null) {
			$this->txtLocation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLocation->Name = QApplication::Translate('Location');
			$this->txtLocation->Text = $this->objPerson->Location;
			$this->txtLocation->MaxLength = Person::LocationMaxLength;
			return $this->txtLocation;
		}

		/**
		 * Create and setup QLabel lblLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocation_Create($strControlId = null) {
			$this->lblLocation = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocation->Name = QApplication::Translate('Location');
			$this->lblLocation->Text = $this->objPerson->Location;
			return $this->lblLocation;
		}

		/**
		 * Create and setup QListBox lstCountry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCountry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCountry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCountryCursor = Country::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCountry = Country::InstantiateCursor($objCountryCursor)) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->Id);
				if (($this->objPerson->Country) && ($this->objPerson->Country->Id == $objCountry->Id))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCountry;
		}

		/**
		 * Create and setup QLabel lblCountryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountryId_Create($strControlId = null) {
			$this->lblCountryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountryId->Name = QApplication::Translate('Country');
			$this->lblCountryId->Text = ($this->objPerson->Country) ? $this->objPerson->Country->__toString() : null;
			return $this->lblCountryId;
		}

		/**
		 * Create and setup QTextBox txtUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUrl_Create($strControlId = null) {
			$this->txtUrl = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUrl->Name = QApplication::Translate('Url');
			$this->txtUrl->Text = $this->objPerson->Url;
			$this->txtUrl->MaxLength = Person::UrlMaxLength;
			return $this->txtUrl;
		}

		/**
		 * Create and setup QLabel lblUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUrl_Create($strControlId = null) {
			$this->lblUrl = new QLabel($this->objParentObject, $strControlId);
			$this->lblUrl->Name = QApplication::Translate('Url');
			$this->lblUrl->Text = $this->objPerson->Url;
			return $this->lblUrl;
		}

		/**
		 * Create and setup QListBox lstTimezone
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTimezone_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTimezone = new QListBox($this->objParentObject, $strControlId);
			$this->lstTimezone->Name = QApplication::Translate('Timezone');
			$this->lstTimezone->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTimezoneCursor = Timezone::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTimezone = Timezone::InstantiateCursor($objTimezoneCursor)) {
				$objListItem = new QListItem($objTimezone->__toString(), $objTimezone->Id);
				if (($this->objPerson->Timezone) && ($this->objPerson->Timezone->Id == $objTimezone->Id))
					$objListItem->Selected = true;
				$this->lstTimezone->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTimezone;
		}

		/**
		 * Create and setup QLabel lblTimezoneId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTimezoneId_Create($strControlId = null) {
			$this->lblTimezoneId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTimezoneId->Name = QApplication::Translate('Timezone');
			$this->lblTimezoneId->Text = ($this->objPerson->Timezone) ? $this->objPerson->Timezone->__toString() : null;
			return $this->lblTimezoneId;
		}

		/**
		 * Create and setup QDateTimePicker calRegistrationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calRegistrationDate_Create($strControlId = null) {
			$this->calRegistrationDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calRegistrationDate->Name = QApplication::Translate('Registration Date');
			$this->calRegistrationDate->DateTime = $this->objPerson->RegistrationDate;
			$this->calRegistrationDate->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calRegistrationDate->Required = true;
			return $this->calRegistrationDate;
		}

		/**
		 * Create and setup QLabel lblRegistrationDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblRegistrationDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblRegistrationDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblRegistrationDate->Name = QApplication::Translate('Registration Date');
			$this->strRegistrationDateDateTimeFormat = $strDateTimeFormat;
			$this->lblRegistrationDate->Text = sprintf($this->objPerson->RegistrationDate) ? $this->objPerson->RegistrationDate->__toString($this->strRegistrationDateDateTimeFormat) : null;
			$this->lblRegistrationDate->Required = true;
			return $this->lblRegistrationDate;
		}

		protected $strRegistrationDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstTopicsAsEmail
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTopicsAsEmail_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTopicsAsEmail = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicsAsEmail->Name = QApplication::Translate('Topics As Email');
			$this->lstTopicsAsEmail->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetTopicAsEmailArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTopicCursor = Topic::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTopic = Topic::InstantiateCursor($objTopicCursor)) {
				$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objTopic->Id)
						$objListItem->Selected = true;
				}
				$this->lstTopicsAsEmail->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstTopicsAsEmail;
		}

		/**
		 * Create and setup QLabel lblTopicsAsEmail
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblTopicsAsEmail_Create($strControlId = null, $strGlue = ', ') {
			$this->lblTopicsAsEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lstTopicsAsEmail->Name = QApplication::Translate('Topics As Email');
			
			$objAssociatedArray = $this->objPerson->GetTopicAsEmailArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblTopicsAsEmail->Text = implode($strGlue, $strItems);
			return $this->lblTopicsAsEmail;
		}

		/**
		 * Create and setup QListBox lstTopicsAsReadOnce
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTopicsAsReadOnce_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTopicsAsReadOnce = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicsAsReadOnce->Name = QApplication::Translate('Topics As Read Once');
			$this->lstTopicsAsReadOnce->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetTopicAsReadOnceArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTopicCursor = Topic::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTopic = Topic::InstantiateCursor($objTopicCursor)) {
				$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objTopic->Id)
						$objListItem->Selected = true;
				}
				$this->lstTopicsAsReadOnce->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstTopicsAsReadOnce;
		}

		/**
		 * Create and setup QLabel lblTopicsAsReadOnce
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblTopicsAsReadOnce_Create($strControlId = null, $strGlue = ', ') {
			$this->lblTopicsAsReadOnce = new QLabel($this->objParentObject, $strControlId);
			$this->lstTopicsAsReadOnce->Name = QApplication::Translate('Topics As Read Once');
			
			$objAssociatedArray = $this->objPerson->GetTopicAsReadOnceArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblTopicsAsReadOnce->Text = implode($strGlue, $strItems);
			return $this->lblTopicsAsReadOnce;
		}

		/**
		 * Create and setup QListBox lstTopicsAsRead
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTopicsAsRead_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTopicsAsRead = new QListBox($this->objParentObject, $strControlId);
			$this->lstTopicsAsRead->Name = QApplication::Translate('Topics As Read');
			$this->lstTopicsAsRead->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetTopicAsReadArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTopicCursor = Topic::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTopic = Topic::InstantiateCursor($objTopicCursor)) {
				$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objTopic->Id)
						$objListItem->Selected = true;
				}
				$this->lstTopicsAsRead->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstTopicsAsRead;
		}

		/**
		 * Create and setup QLabel lblTopicsAsRead
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblTopicsAsRead_Create($strControlId = null, $strGlue = ', ') {
			$this->lblTopicsAsRead = new QLabel($this->objParentObject, $strControlId);
			$this->lstTopicsAsRead->Name = QApplication::Translate('Topics As Read');
			
			$objAssociatedArray = $this->objPerson->GetTopicAsReadArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblTopicsAsRead->Text = implode($strGlue, $strItems);
			return $this->lblTopicsAsRead;
		}



		/**
		 * Refresh this MetaControl with Data from the local Person object.
		 * @param boolean $blnReload reload Person from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPerson->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPerson->Id;

			if ($this->lstPersonType) $this->lstPersonType->SelectedValue = $this->objPerson->PersonTypeId;
			if ($this->lblPersonTypeId) $this->lblPersonTypeId->Text = ($this->objPerson->PersonTypeId) ? PersonType::$NameArray[$this->objPerson->PersonTypeId] : null;

			if ($this->txtUsername) $this->txtUsername->Text = $this->objPerson->Username;
			if ($this->lblUsername) $this->lblUsername->Text = $this->objPerson->Username;

			if ($this->txtPassword) $this->txtPassword->Text = $this->objPerson->Password;
			if ($this->lblPassword) $this->lblPassword->Text = $this->objPerson->Password;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objPerson->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objPerson->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objPerson->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objPerson->LastName;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objPerson->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objPerson->Email;

			if ($this->txtDisplayName) $this->txtDisplayName->Text = $this->objPerson->DisplayName;
			if ($this->lblDisplayName) $this->lblDisplayName->Text = $this->objPerson->DisplayName;

			if ($this->chkPasswordResetFlag) $this->chkPasswordResetFlag->Checked = $this->objPerson->PasswordResetFlag;
			if ($this->lblPasswordResetFlag) $this->lblPasswordResetFlag->Text = ($this->objPerson->PasswordResetFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkDisplayRealNameFlag) $this->chkDisplayRealNameFlag->Checked = $this->objPerson->DisplayRealNameFlag;
			if ($this->lblDisplayRealNameFlag) $this->lblDisplayRealNameFlag->Text = ($this->objPerson->DisplayRealNameFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkDisplayEmailFlag) $this->chkDisplayEmailFlag->Checked = $this->objPerson->DisplayEmailFlag;
			if ($this->lblDisplayEmailFlag) $this->lblDisplayEmailFlag->Text = ($this->objPerson->DisplayEmailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkOptInFlag) $this->chkOptInFlag->Checked = $this->objPerson->OptInFlag;
			if ($this->lblOptInFlag) $this->lblOptInFlag->Text = ($this->objPerson->OptInFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkDonatedFlag) $this->chkDonatedFlag->Checked = $this->objPerson->DonatedFlag;
			if ($this->lblDonatedFlag) $this->lblDonatedFlag->Text = ($this->objPerson->DonatedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtLocation) $this->txtLocation->Text = $this->objPerson->Location;
			if ($this->lblLocation) $this->lblLocation->Text = $this->objPerson->Location;

			if ($this->lstCountry) {
					$this->lstCountry->RemoveAllItems();
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCountryArray = Country::LoadAll();
				if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
					$objListItem = new QListItem($objCountry->__toString(), $objCountry->Id);
					if (($this->objPerson->Country) && ($this->objPerson->Country->Id == $objCountry->Id))
						$objListItem->Selected = true;
					$this->lstCountry->AddItem($objListItem);
				}
			}
			if ($this->lblCountryId) $this->lblCountryId->Text = ($this->objPerson->Country) ? $this->objPerson->Country->__toString() : null;

			if ($this->txtUrl) $this->txtUrl->Text = $this->objPerson->Url;
			if ($this->lblUrl) $this->lblUrl->Text = $this->objPerson->Url;

			if ($this->lstTimezone) {
					$this->lstTimezone->RemoveAllItems();
				$this->lstTimezone->AddItem(QApplication::Translate('- Select One -'), null);
				$objTimezoneArray = Timezone::LoadAll();
				if ($objTimezoneArray) foreach ($objTimezoneArray as $objTimezone) {
					$objListItem = new QListItem($objTimezone->__toString(), $objTimezone->Id);
					if (($this->objPerson->Timezone) && ($this->objPerson->Timezone->Id == $objTimezone->Id))
						$objListItem->Selected = true;
					$this->lstTimezone->AddItem($objListItem);
				}
			}
			if ($this->lblTimezoneId) $this->lblTimezoneId->Text = ($this->objPerson->Timezone) ? $this->objPerson->Timezone->__toString() : null;

			if ($this->calRegistrationDate) $this->calRegistrationDate->DateTime = $this->objPerson->RegistrationDate;
			if ($this->lblRegistrationDate) $this->lblRegistrationDate->Text = sprintf($this->objPerson->RegistrationDate) ? $this->objPerson->__toString($this->strRegistrationDateDateTimeFormat) : null;

			if ($this->lstTopicsAsEmail) {
				$this->lstTopicsAsEmail->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetTopicAsEmailArray();
				$objTopicArray = Topic::LoadAll();
				if ($objTopicArray) foreach ($objTopicArray as $objTopic) {
					$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objTopic->Id)
							$objListItem->Selected = true;
					}
					$this->lstTopicsAsEmail->AddItem($objListItem);
				}
			}
			if ($this->lblTopicsAsEmail) {
				$objAssociatedArray = $this->objPerson->GetTopicAsEmailArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblTopicsAsEmail->Text = implode($strGlue, $strItems);
			}

			if ($this->lstTopicsAsReadOnce) {
				$this->lstTopicsAsReadOnce->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetTopicAsReadOnceArray();
				$objTopicArray = Topic::LoadAll();
				if ($objTopicArray) foreach ($objTopicArray as $objTopic) {
					$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objTopic->Id)
							$objListItem->Selected = true;
					}
					$this->lstTopicsAsReadOnce->AddItem($objListItem);
				}
			}
			if ($this->lblTopicsAsReadOnce) {
				$objAssociatedArray = $this->objPerson->GetTopicAsReadOnceArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblTopicsAsReadOnce->Text = implode($strGlue, $strItems);
			}

			if ($this->lstTopicsAsRead) {
				$this->lstTopicsAsRead->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetTopicAsReadArray();
				$objTopicArray = Topic::LoadAll();
				if ($objTopicArray) foreach ($objTopicArray as $objTopic) {
					$objListItem = new QListItem($objTopic->__toString(), $objTopic->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objTopic->Id)
							$objListItem->Selected = true;
					}
					$this->lstTopicsAsRead->AddItem($objListItem);
				}
			}
			if ($this->lblTopicsAsRead) {
				$objAssociatedArray = $this->objPerson->GetTopicAsReadArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblTopicsAsRead->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstTopicsAsEmail_Update() {
			if ($this->lstTopicsAsEmail) {
				$this->objPerson->UnassociateAllTopicsAsEmail();
				$objSelectedListItems = $this->lstTopicsAsEmail->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateTopicAsEmail(Topic::Load($objListItem->Value));
				}
			}
		}

		protected function lstTopicsAsReadOnce_Update() {
			if ($this->lstTopicsAsReadOnce) {
				$this->objPerson->UnassociateAllTopicsAsReadOnce();
				$objSelectedListItems = $this->lstTopicsAsReadOnce->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateTopicAsReadOnce(Topic::Load($objListItem->Value));
				}
			}
		}

		protected function lstTopicsAsRead_Update() {
			if ($this->lstTopicsAsRead) {
				$this->objPerson->UnassociateAllTopicsAsRead();
				$objSelectedListItems = $this->lstTopicsAsRead->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateTopicAsRead(Topic::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC PERSON OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Person instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePerson() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPersonType) $this->objPerson->PersonTypeId = $this->lstPersonType->SelectedValue;
				if ($this->txtUsername) $this->objPerson->Username = $this->txtUsername->Text;
				if ($this->txtPassword) $this->objPerson->Password = $this->txtPassword->Text;
				if ($this->txtFirstName) $this->objPerson->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objPerson->LastName = $this->txtLastName->Text;
				if ($this->txtEmail) $this->objPerson->Email = $this->txtEmail->Text;
				if ($this->txtDisplayName) $this->objPerson->DisplayName = $this->txtDisplayName->Text;
				if ($this->chkPasswordResetFlag) $this->objPerson->PasswordResetFlag = $this->chkPasswordResetFlag->Checked;
				if ($this->chkDisplayRealNameFlag) $this->objPerson->DisplayRealNameFlag = $this->chkDisplayRealNameFlag->Checked;
				if ($this->chkDisplayEmailFlag) $this->objPerson->DisplayEmailFlag = $this->chkDisplayEmailFlag->Checked;
				if ($this->chkOptInFlag) $this->objPerson->OptInFlag = $this->chkOptInFlag->Checked;
				if ($this->chkDonatedFlag) $this->objPerson->DonatedFlag = $this->chkDonatedFlag->Checked;
				if ($this->txtLocation) $this->objPerson->Location = $this->txtLocation->Text;
				if ($this->lstCountry) $this->objPerson->CountryId = $this->lstCountry->SelectedValue;
				if ($this->txtUrl) $this->objPerson->Url = $this->txtUrl->Text;
				if ($this->lstTimezone) $this->objPerson->TimezoneId = $this->lstTimezone->SelectedValue;
				if ($this->calRegistrationDate) $this->objPerson->RegistrationDate = $this->calRegistrationDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Person object
				$this->objPerson->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstTopicsAsEmail_Update();
				$this->lstTopicsAsReadOnce_Update();
				$this->lstTopicsAsRead_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Person instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePerson() {
			$this->objPerson->UnassociateAllTopicsAsEmail();
			$this->objPerson->UnassociateAllTopicsAsReadOnce();
			$this->objPerson->UnassociateAllTopicsAsRead();
			$this->objPerson->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'Person': return $this->objPerson;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Person fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonTypeIdControl':
					if (!$this->lstPersonType) return $this->lstPersonType_Create();
					return $this->lstPersonType;
				case 'PersonTypeIdLabel':
					if (!$this->lblPersonTypeId) return $this->lblPersonTypeId_Create();
					return $this->lblPersonTypeId;
				case 'UsernameControl':
					if (!$this->txtUsername) return $this->txtUsername_Create();
					return $this->txtUsername;
				case 'UsernameLabel':
					if (!$this->lblUsername) return $this->lblUsername_Create();
					return $this->lblUsername;
				case 'PasswordControl':
					if (!$this->txtPassword) return $this->txtPassword_Create();
					return $this->txtPassword;
				case 'PasswordLabel':
					if (!$this->lblPassword) return $this->lblPassword_Create();
					return $this->lblPassword;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'DisplayNameControl':
					if (!$this->txtDisplayName) return $this->txtDisplayName_Create();
					return $this->txtDisplayName;
				case 'DisplayNameLabel':
					if (!$this->lblDisplayName) return $this->lblDisplayName_Create();
					return $this->lblDisplayName;
				case 'PasswordResetFlagControl':
					if (!$this->chkPasswordResetFlag) return $this->chkPasswordResetFlag_Create();
					return $this->chkPasswordResetFlag;
				case 'PasswordResetFlagLabel':
					if (!$this->lblPasswordResetFlag) return $this->lblPasswordResetFlag_Create();
					return $this->lblPasswordResetFlag;
				case 'DisplayRealNameFlagControl':
					if (!$this->chkDisplayRealNameFlag) return $this->chkDisplayRealNameFlag_Create();
					return $this->chkDisplayRealNameFlag;
				case 'DisplayRealNameFlagLabel':
					if (!$this->lblDisplayRealNameFlag) return $this->lblDisplayRealNameFlag_Create();
					return $this->lblDisplayRealNameFlag;
				case 'DisplayEmailFlagControl':
					if (!$this->chkDisplayEmailFlag) return $this->chkDisplayEmailFlag_Create();
					return $this->chkDisplayEmailFlag;
				case 'DisplayEmailFlagLabel':
					if (!$this->lblDisplayEmailFlag) return $this->lblDisplayEmailFlag_Create();
					return $this->lblDisplayEmailFlag;
				case 'OptInFlagControl':
					if (!$this->chkOptInFlag) return $this->chkOptInFlag_Create();
					return $this->chkOptInFlag;
				case 'OptInFlagLabel':
					if (!$this->lblOptInFlag) return $this->lblOptInFlag_Create();
					return $this->lblOptInFlag;
				case 'DonatedFlagControl':
					if (!$this->chkDonatedFlag) return $this->chkDonatedFlag_Create();
					return $this->chkDonatedFlag;
				case 'DonatedFlagLabel':
					if (!$this->lblDonatedFlag) return $this->lblDonatedFlag_Create();
					return $this->lblDonatedFlag;
				case 'LocationControl':
					if (!$this->txtLocation) return $this->txtLocation_Create();
					return $this->txtLocation;
				case 'LocationLabel':
					if (!$this->lblLocation) return $this->lblLocation_Create();
					return $this->lblLocation;
				case 'CountryIdControl':
					if (!$this->lstCountry) return $this->lstCountry_Create();
					return $this->lstCountry;
				case 'CountryIdLabel':
					if (!$this->lblCountryId) return $this->lblCountryId_Create();
					return $this->lblCountryId;
				case 'UrlControl':
					if (!$this->txtUrl) return $this->txtUrl_Create();
					return $this->txtUrl;
				case 'UrlLabel':
					if (!$this->lblUrl) return $this->lblUrl_Create();
					return $this->lblUrl;
				case 'TimezoneIdControl':
					if (!$this->lstTimezone) return $this->lstTimezone_Create();
					return $this->lstTimezone;
				case 'TimezoneIdLabel':
					if (!$this->lblTimezoneId) return $this->lblTimezoneId_Create();
					return $this->lblTimezoneId;
				case 'RegistrationDateControl':
					if (!$this->calRegistrationDate) return $this->calRegistrationDate_Create();
					return $this->calRegistrationDate;
				case 'RegistrationDateLabel':
					if (!$this->lblRegistrationDate) return $this->lblRegistrationDate_Create();
					return $this->lblRegistrationDate;
				case 'TopicAsEmailControl':
					if (!$this->lstTopicsAsEmail) return $this->lstTopicsAsEmail_Create();
					return $this->lstTopicsAsEmail;
				case 'TopicAsEmailLabel':
					if (!$this->lblTopicsAsEmail) return $this->lblTopicsAsEmail_Create();
					return $this->lblTopicsAsEmail;
				case 'TopicAsReadOnceControl':
					if (!$this->lstTopicsAsReadOnce) return $this->lstTopicsAsReadOnce_Create();
					return $this->lstTopicsAsReadOnce;
				case 'TopicAsReadOnceLabel':
					if (!$this->lblTopicsAsReadOnce) return $this->lblTopicsAsReadOnce_Create();
					return $this->lblTopicsAsReadOnce;
				case 'TopicAsReadControl':
					if (!$this->lstTopicsAsRead) return $this->lstTopicsAsRead_Create();
					return $this->lstTopicsAsRead;
				case 'TopicAsReadLabel':
					if (!$this->lblTopicsAsRead) return $this->lblTopicsAsRead_Create();
					return $this->lblTopicsAsRead;
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
			try {
				switch ($strName) {
					// Controls that point to Person fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonTypeIdControl':
						return ($this->lstPersonType = QType::Cast($mixValue, 'QControl'));
					case 'UsernameControl':
						return ($this->txtUsername = QType::Cast($mixValue, 'QControl'));
					case 'PasswordControl':
						return ($this->txtPassword = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'DisplayNameControl':
						return ($this->txtDisplayName = QType::Cast($mixValue, 'QControl'));
					case 'PasswordResetFlagControl':
						return ($this->chkPasswordResetFlag = QType::Cast($mixValue, 'QControl'));
					case 'DisplayRealNameFlagControl':
						return ($this->chkDisplayRealNameFlag = QType::Cast($mixValue, 'QControl'));
					case 'DisplayEmailFlagControl':
						return ($this->chkDisplayEmailFlag = QType::Cast($mixValue, 'QControl'));
					case 'OptInFlagControl':
						return ($this->chkOptInFlag = QType::Cast($mixValue, 'QControl'));
					case 'DonatedFlagControl':
						return ($this->chkDonatedFlag = QType::Cast($mixValue, 'QControl'));
					case 'LocationControl':
						return ($this->txtLocation = QType::Cast($mixValue, 'QControl'));
					case 'CountryIdControl':
						return ($this->lstCountry = QType::Cast($mixValue, 'QControl'));
					case 'UrlControl':
						return ($this->txtUrl = QType::Cast($mixValue, 'QControl'));
					case 'TimezoneIdControl':
						return ($this->lstTimezone = QType::Cast($mixValue, 'QControl'));
					case 'RegistrationDateControl':
						return ($this->calRegistrationDate = QType::Cast($mixValue, 'QControl'));
					case 'TopicAsEmailControl':
						return ($this->lstTopicsAsEmail = QType::Cast($mixValue, 'QControl'));
					case 'TopicAsReadOnceControl':
						return ($this->lstTopicsAsReadOnce = QType::Cast($mixValue, 'QControl'));
					case 'TopicAsReadControl':
						return ($this->lstTopicsAsRead = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>