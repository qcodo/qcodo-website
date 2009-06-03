<?php
	require(__DATAGEN_CLASSES__ . '/MessageGen.class.php');

	/**
	 * The Message class defined here contains any
	 * customized code for the Message class in the
	 * Object Relational Model.  It represents the "message" table 
	 * in the database, and extends from the code generated abstract MessageGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class Message extends MessageGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objMessage->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Message Object %s',  $this->intId);
		}

		public function RefreshCompiledHtml() {
			$this->strCompiledHtml = QTextStyle::DisplayAsHtml($this->strMessage);
		}

//		/**
//		 * Save this Message
//		 * @param bool $blnForceInsert
//		 * @param bool $blnForceUpdate
//		 * @return int
//		 */
//		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
//print strlen($this->strMessage) . " - ";
//$fltStartTime = microtime(true);
//			$intReturn = parent::Save($blnForceInsert, $blnForceUpdate);
//$fltEndTime = microtime(true);
//print ($fltEndTime - $fltStartTime);
//print " - " . $intReturn . " - " . $this->intId . "\r\n";
//			return $intReturn;
//		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Message objects
			return Message::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Message()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Message()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Message object
			return Message::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Message()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Message()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Message objects
			return Message::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Message()->Param1, $strParam1),
					QQ::Equal(QQN::Message()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Message::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`message`.*
				FROM
					`message` AS `message`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Message::InstantiateDbResult($objDbResult);
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