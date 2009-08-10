<?php
	require(__DATAGEN_CLASSES__ . '/IssueGen.class.php');

	/**
	 * The Issue class defined here contains any
	 * customized code for the Issue class in the
	 * Object Relational Model.  It represents the "issue" table 
	 * in the database, and extends from the code generated abstract IssueGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class Issue extends IssueGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objIssue->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Issue Object %s',  $this->intId);
		}

		/**
		 * Given a selected FieldOption, this will set the field's value for this Issue for the given option.
		 * If a prior option was specified, that will be overwritten.
		 * @param IssueFieldOption $objFieldOption
		 * @return void
		 */
		public function SetFieldOption(IssueFieldOption $objFieldOption) {
			$objFieldValue = IssueFieldValue::LoadByIssueIdIssueFieldId($this->intId, $objFieldOption->IssueFieldId);
			if (!$objFieldValue) {
				$objFieldValue = new IssueFieldValue();
				$objFieldValue->Issue = $this;
				$objFieldValue->IssueFieldId = $objFieldOption->IssueFieldId;
			}
			$objFieldValue->IssueFieldOption = $objFieldOption;
			$objFieldValue->Save();
		}

		/**
		 * This will return the selected FieldOption for a given IssueField for this issue, or NULL
		 * if none was set.
		 * @param IssueField $objIssueField
		 * @return IssueFieldOption
		 */
		public function GetFieldOptionForIssueField(IssueField $objIssueField) {
			$objFieldValue = IssueFieldValue::LoadByIssueIdIssueFieldId($this->intId, $objIssueField->Id);
			if ($objFieldValue)
				return $objFieldValue->IssueFieldOption;
			else
				return null;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Issue objects
			return Issue::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Issue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Issue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Issue object
			return Issue::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Issue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Issue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Issue objects
			return Issue::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Issue()->Param1, $strParam1),
					QQ::Equal(QQN::Issue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Issue::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`issue`.*
				FROM
					`issue` AS `issue`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Issue::InstantiateDbResult($objDbResult);
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