<?php
	require(__DATAGEN_CLASSES__ . '/TopicGen.class.php');

	/**
	 * The Topic class defined here contains any
	 * customized code for the Topic class in the
	 * Object Relational Model.  It represents the "topic" table 
	 * in the database, and extends from the code generated abstract TopicGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class Topic extends TopicGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTopic->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Topic Object %s',  $this->intId);
		}


		public function __get($strName) {
			switch ($strName) {
				case 'ReplyCount': 
					$intMessageCount = $this->MessageCount - 1;
					if ($intMessageCount == 0) return 'no replies';
					else if ($intMessageCount == 1) return '1 reply';
					else return $intMessageCount . ' replies';
				case 'SidenavTitle':
					return sprintf('[%s] %s', $this->dttLastPostDate->__toString('YYYY-MM-DD'), $this->strName);

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
		 * Given a Topic and the number of items in a "page", this will
		 * return the page number that the topic shows up in
		 * when listing all topics for the Topic's forum, assuming
		 * the list of topics is ordered by reverse last_post_date
		 * @param Topic $objTopic the topic to search for
		 * @param integer $intItemsPerPage
		 * @return unknown_type
		 */
		public static function GetPageNumber(Topic $objTopic, $intItemsPerPage) {
			$objResult = Topic::GetDatabase()->Query('SELECT id FROM topic WHERE forum_id=' . $objTopic->ForumId . ' ORDER BY last_post_date DESC');
			$intRecordNumber = 0;
			while ($objRow = $objResult->GetNextRow()) {
				$intRecordNumber++;
				if ($objRow->GetColumn('id') == $objTopic->Id)
					break;
			}
			
			$intPageNumber = floor($intRecordNumber / $intItemsPerPage);
			if ($intRecordNumber % $intItemsPerPage) $intPageNumber++;
			return $intPageNumber;
		}


		/**
		 * This will refresh all the stats (last post date, message count) and save the record to the database
		 * @return void
		 */
		public function RefreshStats() {
			$objMessage = Message::QuerySingle(QQ::Equal(QQN::Message()->TopicId, $this->intId), QQ::Clause(QQ::OrderBy(QQN::Message()->PostDate, false), QQ::LimitInfo(1)));
			$this->dttLastPostDate = $objMessage->PostDate;

			$this->intMessageCount = Message::CountByTopicId($this->intId);

			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Topic objects
			return Topic::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Topic()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Topic object
			return Topic::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Topic()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Topic objects
			return Topic::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Topic()->Param1, $strParam1),
					QQ::Equal(QQN::Topic()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Topic::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`topic`.*
				FROM
					`topic` AS `topic`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Topic::InstantiateDbResult($objDbResult);
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