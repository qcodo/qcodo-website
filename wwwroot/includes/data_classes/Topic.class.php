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
		 * This will refresh all the stats (last post date, message count) and save the record to the database
		 * @return void
		 */
		public function RefreshStats() {
			$objMessage = Message::QuerySingle(QQ::Equal(QQN::Message()->TopicId, $this->intId), QQ::Clause(QQ::OrderBy(QQN::Message()->PostDate, false), QQ::LimitInfo(1)));
			$this->dttLastPostDate = $objMessage->PostDate;

			$this->intMessageCount = Message::CountByTopicId($this->intId);

			$this->Save();

			// Update Reply Numbering
			$intNumber = 0;
			foreach ($this->GetMessageArray(QQ::OrderBy(QQN::Message()->PostDate)) as $objMessage) {
				if (!$intNumber) {
					if (!is_null($objMessage->ReplyNumber)) {
						$objMessage->ReplyNumber = null;
						$objMessage->Save();
					}
				} else {
					if ($objMessage->ReplyNumber != $intNumber) {
						$objMessage->ReplyNumber = $intNumber;
						$objMessage->Save();
					}
				}
				
				$intNumber++;
			}
		}

		/**
		 * Given a search term, this will return the List of Topic IDs as an IdArray
		 * ordered by highest rank first
		 * 
		 * @param string $strSearchQuery
		 * @param integer $intForumId optional parameter to restrict search to only within a specific Forum
		 * @return Zend_Search_Lucene_Search_QueryHit[]
		 */
		public static function GetQueryHitArrayForSearch($strSearchQuery, $intForumId = null) {
			// open the index
			$objIndex = new Zend_Search_Lucene(__SEARCH_INDEXES__ . '/forum_topics');

			$objHits = $objIndex->find($strSearchQuery);

			// No results
			if (!count($objHits)) return array();

			// Results for "All Forums" search
			if (is_null($intForumId)) return $objHits;

			// Results for a specific Forum search
			$objToReturnArray = array();
			foreach ($objHits as $objHit) {
				if ($objHit->forum_id == $intForumId) $objToReturnArray[] = $objHit;
			}
			return $objToReturnArray;
		}

		/**
		 * Given an ordered ID Array and Limit information, this will return
		 * an array of Topics
		 * @param Zend_Search_Lucene_Search_QueryHit[] $objQueryHitArray
		 * @param string $strLimitInfo
		 * @return Topic[]
		 */
		public static function LoadArrayBySearchResultArray($objQueryHitArray, $strLimitInfo) {
			// Calculate Offset and ItemsPerPage
			$strTokens = explode(',', $strLimitInfo);
			$intOffset = intval($strTokens[0]);
			$intItemsPerPage = intval($strTokens[1]);

			// Perform the Offset and LImit
			$objQueryHitArray = array_slice($objQueryHitArray, $intOffset, $intItemsPerPage);

			$objTopicArray = array();
			foreach ($objQueryHitArray as $objHit) {
				$objTopic = new Topic();
				$objTopic->intId = $objHit->db_id;
				$objTopic->intForumId = $objHit->forum_id;
				$objTopic->strName = $objHit->title;
				$objTopic->dttLastPostDate = QDateTime::FromTimestamp($objHit->last_post_date);
				$objTopic->intMessageCount = $objHit->message_count;
				$objTopicArray[] = $objTopic;
			}

			return $objTopicArray;
		}

		/**
		 * Searches using the search index for applicable topics, and returns topics as an array
		 * Note that this will return ALL topics for the search.  No limit / pagination can be applied.
		 * @param string $strSearchQuery
		 * @return Topic[]
		 */
		public static function LoadArrayBySearch($strSearchQuery) {
			// open the index
			$objIndex = new Zend_Search_Lucene(__SEARCH_INDEXES__ . '/forum_topics');

			$intIdArray = array();
			$objHits = $objIndex->find($strSearchQuery);

			if (!count($objHits)) return array();

			foreach ($objHits as $objHit) {
				$intIdArray[] = $objHit->db_id;
				// note: do we want to do anything with $objHit->score (?)
			}

			$objResult = Topic::GetDatabase()->Query('SELECT * FROM topic WHERE id IN(' . implode(',', $intIdArray) . ');');
			while ($objRow = $objResult->GetNextRow()) {
				$objTopic = Topic::InstantiateDbRow($objRow);
				$objTopicArrayById[$objTopic->Id] = $objTopic;
			}

			$objTopicArray = array();
			foreach ($objHits as $objHit) {
				$objTopicArray[] = $objTopicArrayById[intval($objHit->db_id)];
			}

			return $objTopicArray;
		}

		/**
		 * Creates the Search Index for all topics
		 * @return Zend_Search_Lucene
		 */
		public static function CreateSearchIndex() {
			if (is_dir(__SEARCH_INDEXES__ . '/forum_topics'))
				throw new QCallerException('Cannot call Topic::CreateSearchIndex() - Index directory exists');
			$objIndex = new Zend_Search_Lucene(__SEARCH_INDEXES__ . '/forum_topics', true);
			return $objIndex;
		}

		/**
		 * This will refresh the search index for this topic (for all message content under this topic)
		 * @param Zend_Search_Lucene $objIndex should be null if we are updating just one -- but for bulk index updates, you can pass in an already loaded index file
		 * @return void
		 */
		public function RefreshSearchIndex($objIndex = null) {
			if (!$objIndex) {
				$objIndex = new Zend_Search_Lucene(__SEARCH_INDEXES__ . '/forum_topics');
				$blnIndexProvided = false;
			} else {
				$blnIndexProvided = true;
			}

			// Retrievew the Index Documents (if applicable) to delete them from the index
			$objSearchTerm = new Zend_Search_Lucene_Index_Term($this->Id, 'db_id');
			foreach ($objIndex->termDocs($objSearchTerm) as $intDocId) {
				$objIndex->delete($intDocId);
			}

			// Create the Message Contents for this Topic
			$strContents = null;
			foreach ($this->GetMessageArray(QQ::OrderBy(QQN::Message()->ReplyNumber)) as $objMessage) {
				$strMessage = strip_tags(trim($objMessage->CompiledHtml));
				$strMessage = html_entity_decode($strMessage, ENT_QUOTES, 'UTF-8');
				$strContents .= $strMessage . "\r\n\r\n";
			}

			// Create the Document
			$objDocument = new Zend_Search_Lucene_Document();
			$objDocument->addField(Zend_Search_Lucene_Field::Keyword('db_id', $this->Id));
			$objDocument->addField(Zend_Search_Lucene_Field::UnIndexed('forum_id', $this->ForumId));
			$objDocument->addField(Zend_Search_Lucene_Field::UnIndexed('message_count', $this->MessageCount));
			$objDocument->addField(Zend_Search_Lucene_Field::UnIndexed('last_post_date', $this->LastPostDate->Timestamp));
			$objDocument->addField(Zend_Search_Lucene_Field::Text('title', $this->Name));
			$objDocument->addField(Zend_Search_Lucene_Field::UnStored('contents', trim($strContents)));

			// Add Document to Index
			$objIndex->addDocument($objDocument);

			// Only call commit on the index if it was provided for us
			if (!$blnIndexProvided) $objIndex->commit();
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