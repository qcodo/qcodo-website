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

		public function __get($strName) {
			switch ($strName) {
				case 'Priority': return IssuePriorityType::$NameArray[$this->intIssuePriorityTypeId];
				case 'Status': return IssueStatusType::$NameArray[$this->intIssueStatusTypeId];
				case 'Resolution':
					if (!$this->intIssueResolutionTypeId) return null;
					return IssueResolutionType::$NameArray[$this->intIssueResolutionTypeId];
				
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
		
		/**
		 * This will return the string-based name of the selected FieldToken for this issue, or NULL if
		 * either the Field doesn't exist or if the Option doesn't exist (e.g. none was set)
		 * 
		 * @param string $strToken the token of the IssueField you want to look up
		 * @return string the value of the IssueField for this issue and token
		 */
		public function GetFieldOptionValueForIssueFieldToken($strToken) {
			$objIssueField = IssueField::LoadByToken($strToken);
			if (!$objIssueField) return null;

			$objFieldValue = IssueFieldValue::LoadByIssueIdIssueFieldId($this->intId, $objIssueField->Id);
			if (!$objFieldValue) return null;

			return $objFieldValue->IssueFieldOption->Name;
		}
		
		/**
		 * Creates the Topic and TopicLink for this Issue object.
		 * @return Topic
		 */
		public function CreateTopicAndTopicLink() {
			$objTopicLink = new TopicLink();
			$objTopicLink->TopicLinkTypeId = TopicLinkType::Issue;
			$objTopicLink->Issue = $this;
			$objTopicLink->Save();

			$objTopic = new Topic();
			$objTopic->TopicLink = $objTopicLink;
			$objTopic->Name = $this->strTitle;
			$objTopic->Person = $this->PostedByPerson;
			$objTopic->Save();
			
			return $objTopic;
		}

		/**
		 * Sets a vote for a person and updates the vote_count value for this issue.
		 * If already voted OR if person is the poster, the vote will NOT count.
		 * @param Person $objPerson the person who is voting "yes" to this issue
		 * @param QDateTime $dttVoteDate the optional datetime value of the date (or NOW() if none specified)
		 * @return void
		 */
		public function SetVote(Person $objPerson, QDateTime $dttVoteDate = null) {
			$objVote = IssueVote::LoadByIssueIdPersonId($this->intId, $objPerson->Id);
			if (!$objVote &&
				($objPerson->Id != $this->PostedByPersonId)) {
				$objVote = new IssueVote();
				$objVote->Issue = $this;
				$objVote->Person = $objPerson;
				$objVote->VoteDate = ($dttVoteDate) ? new QDateTime($dttVoteDate) : QDateTime::Now();
				$objVote->Save(); 
			}
			$this->intVoteCount = IssueVote::CountByIssueId($this->intId);
			$this->Save();
		}

		/**
		 * Specifies whether or not a given person has voted "Yes" for this Issue
		 * @param Person $objPerson
		 * @return boolean
		 */
		public function IsPersonVoted(Person $objPerson) {
			if (IssueVote::LoadByIssueIdPersonId($this->intId, $objPerson->Id))
				return true;
			else
				return false;
		}


		/**
		 * Posts a new message/comment for this Issue.  If no Person is specified, then it is assumed
		 * that this is a "System Message" for this Issue.  This will update the last_update_date on this
		 * issue.
		 * @param string $strMessageText the text of the message, itself
		 * @param Person $objPerson optional person who posted this message or performed the action
		 * @param boolean $blnSystemFlag whether this is a system message
		 * @param QDateTime $dttPostDate
		 * @return Message
		 */
		public function PostMessage($strMessageText, Person $objPerson = null, QDateTime $dttPostDate = null) {
			$objTopicArray = $this->TopicLink->GetTopicArray();
			$objTopic = $objTopicArray[0];
			return $objTopic->PostMessage($strMessageText, $objPerson, $dttPostDate);
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