<?php
	require(__DATAGEN_CLASSES__ . '/PackageVersionGen.class.php');

	/**
	 * The PackageVersion class defined here contains any
	 * customized code for the PackageVersion class in the
	 * Object Relational Model.  It represents the "package_version" table 
	 * in the database, and extends from the code generated abstract PackageVersionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class PackageVersion extends PackageVersionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPackageVersion->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('PackageVersion Object %s',  $this->intId);
		}

		public function SaveFile($strPayload, $strPayloadCompressed) {
			QApplication::MakeDirectory($this->GetFolder(), 0777);
			file_put_contents($this->GetFilePath(), $strPayload);
			file_put_contents($this->GetFilePathCompressed(), $strPayloadCompressed, FILE_BINARY);
			chmod($this->GetFilePath(), 0666);
			chmod($this->GetFilePathCompressed(), 0666);
		}

		public function GetFolder() {
			return __QPM_PACKAGES__ . '/' . $this->PackageContribution->Package->Id . '/' . $this->PackageContribution->Id;
		}

		public function GetFilePathCompressed() {
			return $this->GetFolder() . '/' . $this->VersionNumber . '.qpm.gz';
		}

		public function GetFilePath() {
			return $this->GetFolder() . '/' . $this->VersionNumber . '.qpm';
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PackageVersion objects
			return PackageVersion::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PackageVersion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PackageVersion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PackageVersion object
			return PackageVersion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PackageVersion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PackageVersion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PackageVersion objects
			return PackageVersion::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PackageVersion()->Param1, $strParam1),
					QQ::Equal(QQN::PackageVersion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = PackageVersion::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`package_version`.*
				FROM
					`package_version` AS `package_version`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PackageVersion::InstantiateDbResult($objDbResult);
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