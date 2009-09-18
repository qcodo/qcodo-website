<?php
	require(__DATAGEN_CLASSES__ . '/IssueFieldGen.class.php');

	/**
	 * The IssueField class defined here contains any
	 * customized code for the IssueField class in the
	 * Object Relational Model.  It represents the "issue_field" table 
	 * in the database, and extends from the code generated abstract IssueFieldGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class IssueField extends IssueFieldGen {
		const TokenQcodoVersion = 'qcodo_version';
		const TokenPhpVersion = 'php_version';
		const TokenCategory = 'category';
		const TokenBrowser = 'browser';
		const TokenWebServer = 'web_server';
		const TokenDatabase = 'database';
		const TokenOperatingSystem = 'os';

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objIssueField->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('IssueField Object %s',  $this->intId);
		}
		
		/**
		 * Will create and save to the database a new IssueFieldOption for this IssueField
		 * @param string $strName
		 * @return IssueFieldOption
		 */
		public function CreateNewIssueFieldOption($strName) {
			$objIssueFieldOption = new IssueFieldOption();
			$objIssueFieldOption->IssueField = $this;
			$objIssueFieldOption->Name = trim($strName);
			$objIssueFieldOption->SetToken();
			$objIssueFieldOption->OrderNumber = $this->CountIssueFieldOptions() + 1;
			$objIssueFieldOption->ActiveFlag = true;
			$objIssueFieldOption->Save();
			return $objIssueFieldOption;
		}

		/**
		 * Gets the array of active IssueFieldOptions for this IssueField in the appropriate order
		 * @return IssueFieldOption[]
		 */
		public function GetOptionArray() {
			return IssueFieldOption::LoadArrayByIssueFieldIdActiveFlag($this->intId, true, QQ::OrderBy(QQN::IssueFieldOption()->OrderNumber));
		}

		/**
		 * Gets the IssueField object for the Category field
		 * @return IssueField
		 */
		public static function LoadIssueFieldForCategory() {
			return IssueField::LoadByToken(IssueField::TokenCategory);
		}
		
		/**
		 * Gets the IssueField object for the PhpVersion field
		 * @return IssueField
		 */
		public static function LoadIssueFieldForPhpVersion() {
			return IssueField::LoadByToken(IssueField::TokenPhpVersion);
		}

		/**
		 * Gets the IssueField object for the QcodoVersion field
		 * @return IssueField
		 */
		public static function LoadIssueFieldForQcodoVersion() {
			return IssueField::LoadByToken(IssueField::TokenQcodoVersion);
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of IssueField objects
			return IssueField::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::IssueField()->Param1, $strParam1),
					QQ::GreaterThan(QQN::IssueField()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single IssueField object
			return IssueField::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::IssueField()->Param1, $strParam1),
					QQ::GreaterThan(QQN::IssueField()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of IssueField objects
			return IssueField::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::IssueField()->Param1, $strParam1),
					QQ::Equal(QQN::IssueField()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = IssueField::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`issue_field`.*
				FROM
					`issue_field` AS `issue_field`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return IssueField::InstantiateDbResult($objDbResult);
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