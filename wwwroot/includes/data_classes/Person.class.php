<?php
	require(__DATAGEN_CLASSES__ . '/PersonGen.class.php');

	/**
	 * The Person class defined here contains any
	 * customized code for the Person class in the
	 * Object Relational Model.  It represents the "person" table 
	 * in the database, and extends from the code generated abstract PersonGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class Person extends PersonGen {
		const PasswordMaxLength = 12;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPerson->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return $this->DisplayName;
		}

		public static function LoadArrayForMemberSearch($strDisplayName, $objOptionalClauses = null) {
			return Person::QueryArray(QQ::Like(QQN::Person()->DisplayName, '%' . $strDisplayName . '%'), $objOptionalClauses);
		}
		public static function CountForMemberSearch($strDisplayName) {
			return Person::QueryCount(QQ::Like(QQN::Person()->DisplayName, '%' . $strDisplayName . '%'));
		}
		
		public function __get($strName) {
			switch ($strName) {
				case 'DisplayForForums':
							$strToReturn = sprintf('<a href="%s" title="View Profile">%s</a>',
								$this->ViewProfileUrl, QApplication::HtmlEntities($this->DisplayName));

							if ($this->strLocation)
								$strToReturn .= ' (' . QApplication::HtmlEntities($this->strLocation, ENT_COMPAT, QApplication::$EncodingType) . ')';
		
							// Display the Flag (if applicable)
							if ($this->Country) {
								$strCode = strtolower($this->Country->Code);
								$strImageFile = sprintf('/images/flags/%s.png', $strCode);
								if (file_exists(QApplication::$DocumentRoot . $strImageFile))
									$strToReturn .= sprintf(' <img src="%s" title="%s" alt="%s" width="16" height="11"/>',
										$strImageFile, $this->Country->Name, $this->Country->Name);
							}
		
							// Display the Star (if applicable)
							$strStarIcon = ' <img src="/images/star_icon.png" style="vertical-align: bottom;" title="%s" alt="%s" width="16" height="16"/>';
							if ($this->intPersonTypeId == PersonType::Administrator)
								$strToReturn .= sprintf($strStarIcon, 'Qcodo Administrator', 'Qcodo Administrator');
							else if ($this->intPersonTypeId == PersonType::Contributor)
								$strToReturn .= sprintf($strStarIcon, 'Qcodo Core Contributor', 'Qcodo Core Contributor');
							else if ($this->blnDonatedFlag)
								$strToReturn .= sprintf($strStarIcon, 'Financial Contributor', 'Financial Contributor');
								
							return $strToReturn;

				case 'ViewProfileUrl':
					return '/profile/view.php/' . $this->strUsername;

				case 'DisplayNameWithLink':
					return sprintf('<a href="%s" title="View Profile">%s</a>', $this->ViewProfileUrl, QApplication::HtmlEntities($this->DisplayName));

				case 'SmtpEmailAddress':
					return $this->strFirstName . ' ' . $this->strLastName . ' <' . $this->strEmail . '>';

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
		 * Based on the preferences of this user, this will update the DisplayName property accordingly.
		 * The DisplayName property is to be used throughout the application to display this user's display name.
		 * @return void
		 */
		public function RefreshDisplayName() {
			if ($this->blnDisplayRealNameFlag)
				$this->strDisplayName = $this->strFirstName . ' ' . $this->strLastName;
			else
				$this->strDisplayName = $this->strUsername;
			$this->Save();
		}

		/**
		 * Returns whether or not the passed-in password is valid
		 * @param string $strPassword
		 * @return boolean
		 */
		public function IsPasswordValid($strPassword) {
			return ($this->strPassword == $this->EncryptPassword($strPassword));
		}

		/**
		 * Actually performs the encryption of the password, itself
		 * @param string $strPassword the password to encrypt
		 * @return string the encrypted password
		 */
		protected function EncryptPassword($strPassword) {
			$strPassword = trim(strtolower($strPassword));
			$strMd5 = md5('salt' . $strPassword);
			return strtolower($strMd5);
		}

		/**
		 * Sets the password and encrypts it
		 * @param string $strPassword
		 * @return void
		 */
		public function SetPassword($strPassword) {
			$this->strPassword = $this->EncryptPassword($strPassword);
		}

		/**
		 * Resets the password and generates a random one for the user.
		 * Then, queues up an email message alerting the user of the new password.
		 * @return string the new, randomly generated password
		 */
		public function ResetPassword() {
			$strPassword = strtolower(substr(md5(microtime()), 4, 8));
			$this->SetPassword($strPassword);
			$this->PasswordResetFlag = true;
			$this->Save();

			// Setup Token Array
			$strTokenArray = array(
				'NAME' => $this->strFirstName . ' ' . $this->strLastName,
				'USERNAME' => $this->strUsername,
				'PASSWORD' => $strPassword
			);

			// Send Message
			QApplication::SendEmailUsingTemplate('forgot_password', 'Qcodo.com Credentials', QCODO_EMAILER,
				$this->SmtpEmailAddress, $strTokenArray, true);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Person objects
			return Person::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Person object
			return Person::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Person objects
			return Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::Equal(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`person`.*
				FROM
					`person` AS `person`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>