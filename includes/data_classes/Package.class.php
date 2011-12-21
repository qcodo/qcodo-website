<?php
	require(__DATAGEN_CLASSES__ . '/PackageGen.class.php');

	/**
	 * The Package class defined here contains any
	 * customized code for the Package class in the
	 * Object Relational Model.  It represents the "package" table 
	 * in the database, and extends from the code generated abstract PackageGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class Package extends PackageGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPackage->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Package Object %s',  $this->intId);
		}

		public function IsEditableForPerson(Person $objPerson = null) {
			if (!$objPerson) return false;
			return ($objPerson->PersonTypeId == PersonType::Administrator);
		}

		/**
		 * Creates the Topic and TopicLink for this Package object.
		 * @param Person $objPerson person who created this package who will be credited with creating the linked topic
		 * @return Topic
		 */
		public function CreateTopicAndTopicLink(Person $objPerson) {
			$objTopicLink = new TopicLink();
			$objTopicLink->TopicLinkTypeId = TopicLinkType::Package;
			$objTopicLink->Package = $this;
			$objTopicLink->Save();

			$objTopic = new Topic();
			$objTopic->TopicLink = $objTopicLink;
			$objTopic->Name = $this->strName;
			$objTopic->Person = $objPerson;
			$objTopic->Save();
			
			return $objTopic;
		}

		/**
		 * Given a string, this will create a sanitized token for it
		 * @param string $strTokenCandidate
		 * @return string
		 */
		public static function SanitizeForToken($strTokenCandidate) {
			$strTokenCandidate = trim(strtolower($strTokenCandidate));
			$intLength = strlen($strTokenCandidate);

			$strToReturn = '';

			for ($intChar = 0 ; $intChar < $intLength; $intChar++) {
				$strChar = $strTokenCandidate[$intChar];
				$intOrd = ord($strChar);

				if (($intOrd >= ord('a')) && ($intOrd <= ord('z')))
					$strToReturn .= $strChar;
				else if (($intOrd >= ord('0')) && ($intOrd <= ord('9')))
					$strToReturn .= $strChar;
				else if (($strChar == ' ') ||
						 ($strChar == '.') ||
						 ($strChar == ':') ||
						 ($strChar == '-') ||
						 ($strChar == '/') ||
						 ($strChar == '(') ||
						 ($strChar == ')') ||
						 ($strChar == '_'))
					$strToReturn .= '_';
			}

			// Cleanup leading and trailing underscores
			while (QString::FirstCharacter($strToReturn) == '_') $strToReturn = substr($strToReturn, 1);
			while (QString::LastCharacter($strToReturn) == '_') $strToReturn = substr($strToReturn, 0, strlen($strToReturn) - 1);

			// Cleanup Dupe Underscores
			while (strpos($strToReturn, '__') !== false) $strToReturn = str_replace('__', '_', $strToReturn);
			
			return $strToReturn;
		}

		/**
		 * Posts a new version of this package for a given person.
		 * @param Person $objPerson
		 * @param string $strQpmXml
		 * @param QDateTime $dttPostDate optional, uses Now() if not specified
		 * @return PackageContribution
		 */
		public function PostContributionVersion(Person $objPerson, $strQpmXml, QDateTime $dttPostDate = null) {
			// Get PackageContribution
			$objContribution = PackageContribution::LoadByPackageIdPersonId($this->intId, $objPerson->Id);

			// Parse the QPM XML
			try {
				$objQpmXml = new SimpleXMLElement($strQpmXml);
			} catch (Exception $objExc) { throw new Exception('Invalid QPM Schema'); }

			// Compress the XML
			$strQpmXmlCompressed = gzencode($strQpmXml, 9);

			// Validate the XML
			$strQpmVersion = (string) $objQpmXml['version'];
			if ($strQpmVersion != '1.0') throw new Exception('Invalid QPM Schema Version: ' . $strQpmVersion);

			// Pull out the rest of the data and validate it all
			$strPackageName = (string) $objQpmXml->package['name'];
			$strPackageUsername = (string) $objQpmXml->package['user'];
			$intVersionNumber = (string) $objQpmXml->package['version'];
			$strQcodoVersionNumber = (string) $objQpmXml->package['qcodoVersion'];
			$strNotes = (string) $objQpmXml->package->notes;
			$intNewFileCount = count($objQpmXml->package->newFiles->children());
			$intChangedFileCount = count($objQpmXml->package->changedFiles->children());

			if ($strPackageName != $this->Token) throw new Exception('Invalid QPM Package Name: ' . $strPackageName);
			if (trim(strtolower($strPackageUsername)) != trim(strtolower($objPerson->Username))) throw new Exception('Invalid QPM Package User: ' . $strPackageUsername);
			if ($objContribution) {
				if ($intVersionNumber != ($objContribution->CountPackageVersions() + 1)) throw new Exception('Invalid QPM Package Version: ' . $intVersionNumber);
			} else {
				if ($intVersionNumber != 1) throw new Exception('Invalid QPM Package Version: ' . $intVersionNumber);
			}
			preg_match('/[0-9]+\\.[0-9]+\\.[0-9]+/', $strQcodoVersionNumber, $arrMatches);
			if ($arrMatches[0] != $strQcodoVersionNumber) throw new Exception('Invalid Qcodo Version Number in QpmXml: ' . $strQcodoVersionNumber);

			// Create PackageContribution (if none exists)
			if (!$objContribution) {
				$objContribution = new PackageContribution();
				$objContribution->Package = $this;
				$objContribution->Person = $objPerson;
				$objContribution->Save();
			}

			$objVersion = new PackageVersion();
			$objVersion->PackageContribution = $objContribution;
			$objVersion->Notes = $strNotes;
			$objVersion->QcodoVersion = $strQcodoVersionNumber;
			$objVersion->NewFileCount = $intNewFileCount;
			$objVersion->ChangedFileCount = $intChangedFileCount;
			$objVersion->PostDate = ($dttPostDate) ? $dttPostDate : QDateTime::Now();
			$objVersion->DownloadCount = 0;
			$objVersion->VersionNumber = $intVersionNumber;
			$objVersion->Save();

			$objContribution->CurrentPackageVersion = $objVersion;
			$objContribution->CurrentPostDate = $objVersion->PostDate;
			$objContribution->RefreshStats();

			$this->LastPostDate = $objVersion->PostDate;
			$this->LastPostedByPerson = $objPerson;
			$this->Save();

			$objVersion->SaveFile($strQpmXml, $strQpmXmlCompressed);

			$this->PackageCategory->RefreshStats();
			return $objContribution;
		}

		/**
		 * Gets the most recently updated or uploaded contribution
		 * @return PackageContribution
		 */
		public function GetMostRecentContribution() {
			return PackageContribution::QuerySingle(QQ::Equal(QQN::PackageContribution()->PackageId, $this->intId), QQ::Clause(
				QQ::OrderBy(QQN::PackageContribution()->CurrentPostDate, false),
				QQ::LimitInfo(1)
			));
		}

		/**
		 * Posts a new message/comment for this Package.  If no Person is specified, then it is assumed
		 * that this is a "System Message" for this Package.
		 * @param string $strMessageText the text of the message, itself
		 * @param Person $objPerson optional person who posted this message or performed the action
		 * @param QDateTime $dttPostDate
		 * @return Message
		 */
		public function PostMessage($strMessageText, Person $objPerson = null, QDateTime $dttPostDate = null) {
			$objTopicArray = $this->TopicLink->GetTopicArray();
			$objTopic = $objTopicArray[0];
			$objMessage = $objTopic->PostMessage($strMessageText, $objPerson, $dttPostDate);
			$objMessage->SendAlerts();
			return $objMessage;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Package objects
			return Package::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Package()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Package()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Package object
			return Package::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Package()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Package()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Package objects
			return Package::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Package()->Param1, $strParam1),
					QQ::Equal(QQN::Package()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Package::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`package`.*
				FROM
					`package` AS `package`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Package::InstantiateDbResult($objDbResult);
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