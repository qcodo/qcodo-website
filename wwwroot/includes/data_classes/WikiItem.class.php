<?php
	require(__DATAGEN_CLASSES__ . '/WikiItemGen.class.php');

	/**
	 * The WikiItem class defined here contains any
	 * customized code for the WikiItem class in the
	 * Object Relational Model.  It represents the "wiki_item" table 
	 * in the database, and extends from the code generated abstract WikiItemGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 * 
	 */
	class WikiItem extends WikiItemGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objWikiItem->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('WikiItem Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'UrlPath':
					return '/wiki' . WikiItem::GenerateFullPath($this->strPath, $this->intWikiItemTypeId);

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
		 * Is this Wiki Item editable for the given person
		 * @param Person $objPerson
		 * @return boolean
		 */
		public function IsEditableForPerson(Person $objPerson = null) {
			if (!$objPerson) return false;
			if ($objPerson->PersonTypeId <= $this->intEditorMinimumPersonTypeId)
				return true;
			else
				return false;
		}

		/**
		 * Is this Wiki Item adminable for the given person
		 * @param Person $objPerson
		 * @return boolean
		 */
		public function IsAdminableForPerson(Person $objPerson = null) {
			if (!$objPerson) return false;
			return ($objPerson->PersonTypeId == PersonType::Administrator);
		}
		
		/**
		 * Given a full path (typically from QApplication::PathInfo)
		 * this will validate that it is properly sanitized.  If so, it will
		 * return null.  If not, it will generate and return a sanitized version
		 * of that full path.
		 * @param string $strFullPath
		 * @return mixed null if valid, or the sanitized full path if not
		 */
		public static function ValidateOrGenerateSanitizedFullPath($strFullPath) {
			$strPath = WikiItem::SanitizeForPath($strFullPath, $intWikiItemTypeId);
			$strSanitizedFullPath = WikiItem::GenerateFullPath($strPath, $intWikiItemTypeId);
			if ($strFullPath == $strSanitizedFullPath)
				return null;
			else
				return $strSanitizedFullPath;
		}
		
		/**
		 * Assuming an already sanitized Path, this will generate
		 * a "full path", including the wikitype prefix (e.g. "file:" or "image:")
		 * for a given WikiItemType and return the full path to use in the URL.
		 * @param string $strPath
		 * @param integer $intWikiItemTypeId
		 * @return string
		 */
		public static function GenerateFullPath($strPath, $intWikiItemTypeId) {
			// Remove the leading slash ("/")
			$strPath = substr($strPath, 1);

			switch ($intWikiItemTypeId) {
				case WikiItemType::Page:
					return '/' . $strPath;

				case WikiItemType::Image:
				case WikiItemType::File:
					return sprintf('/%s:%s', strtolower(WikiItemType::$NameArray[$intWikiItemTypeId]), $strPath);

				throw new Exception('Unhandled WikiItemTypeId: ' . $intWikiItemTypeId);
			}
		}

		/**
		 * Sanitizes any string to be used as a good-looking WikiItem path.
		 * Result will only contain lower-case alphanumeric characters, 
		 * underscores and forward-slashes.  If a type prefix exists,
		 * (e.g. "file:" or "image:") then the type prefix is stripped
		 * out and the type id is returned as an output parameter.  If
		 * there is no valid type prefix, a type of Wiki Page is assumed.
		 * @param string $strPath the path to sanitize
		 * @param integer $intWikiItemTypeId the wiki item type is returned
		 * @return string
		 */
		public static function SanitizeForPath($strPath, &$intWikiItemTypeId) {
			$strPath = strtolower($strPath);
			$intWikiItemTypeId = null;

			// Figure out and strip any wiki type prefix
			foreach (WikiItemType::$NameArray as $intId => $strWikiType) {
				$strWikiTypePrefix = sprintf('/%s:', strtolower($strWikiType));
				if (substr($strPath, 0, strlen($strWikiTypePrefix)) == $strWikiTypePrefix) {
					$strPath = '/' . substr($strPath, strlen($strWikiTypePrefix));
					$intWikiItemTypeId = $intId;
					break;
				}
			}

			if (is_null($intWikiItemTypeId))
				$intWikiItemTypeId = WikiItemType::Page;

			$strPathParts = explode('/', $strPath);
			$strToReturn = '/';
			foreach ($strPathParts as $strPathPart) {
				$strPathPart = trim($strPathPart);
				$intLength = strlen($strPathPart);

				if ($intLength) {
					$strPath = '';

					for ($intChar = 0 ; $intChar < $intLength; $intChar++) {
						$strChar = $strPathPart[$intChar];
						$intOrd = ord($strChar);

						if (($intOrd >= ord('a')) && ($intOrd <= ord('z')))
							$strPath .= $strChar;
						else if (($intOrd >= ord('0')) && ($intOrd <= ord('9')))
							$strPath .= $strChar;
						else if (($strChar == ' ') ||
								 ($strChar == '.') ||
								 ($strChar == ':') ||
								 ($strChar == '-') ||
								 ($strChar == '/') ||
								 ($strChar == '(') ||
								 ($strChar == ')') ||
								 ($strChar == '_'))
							$strPath .= '_';
					}

					// Cleanup leading and trailing underscores
					while (QString::FirstCharacter($strPath) == '_') $strPath = substr($strPath, 1);
					while (QString::LastCharacter($strPath) == '_') $strPath = substr($strPath, 0, strlen($strPath) - 1);

					// Cleanup Dupe Underscores
					while (strpos($strPath, '__') !== false) $strPath = str_replace('__', '_', $strPath);

					// At this pathpart to the path
					$strToReturn .= $strPath . '/';
				}
			}

			// Take off trailing '/' if applicable
			if (strlen($strToReturn) > 1) $strToReturn = substr($strToReturn, 0, strlen($strToReturn) - 1);

			// Any blank path MUST be set to an itemtype of wikipage
			if ($strToReturn == '/')
				$intWikiItemTypeId = WikiItemType::Page;

			return $strToReturn;
		}


		/**
		 * Creates a new WikiItem for a given path and type.  If path already exists, return null.
		 * Otherwise, return the new WikiItem.
		 * @param string $strPath
		 * @param integer $intWikiItemTypeId
		 * @return WikiItem
		 */
		public static function CreateNewItem($strPath, $intWikiItemTypeId) {
			// Make sure the path doesn't yet exist
			$strPath = self::SanitizeForPath($strPath, $intId);
			if (WikiItem::LoadByPathWikiItemTypeId($strPath, $intWikiItemTypeId)) return null;

			$objWikiItem = new WikiItem();
			$objWikiItem->Path = $strPath;
			$objWikiItem->WikiItemTypeId = $intWikiItemTypeId;
			$objWikiItem->EditorMinimumPersonTypeId = PersonType::RegisteredUser;
			$objWikiItem->Save();
			
			$objWikiItem->CreateTopicAndTopicLink();

			return $objWikiItem;
		}

		/**
		 * Creates the Topic and TopicLink for this Issue object.
		 * @return Topic
		 */
		protected function CreateTopicAndTopicLink() {
			$objTopicLink = new TopicLink();
			$objTopicLink->TopicLinkTypeId = TopicLinkType::WikiItem;
			$objTopicLink->WikiItem = $this;
			$objTopicLink->Save();

			$objTopic = new Topic();
			$objTopic->TopicLink = $objTopicLink;
			$objTopic->Name = $this->CurrentName;
			$objTopic->Person = $this->CurrentPostedByPerson;
			$objTopic->Save();

			return $objTopic;
		}

		/**
		 * Updates the linked TopicLink topic name to match the current name for this wiki item.
		 * @return void
		 */
		public function UpdateTopicLinkName() {
			$objTopic = $this->TopicLink->GetTopic();
			$objTopic->Name = $this->strCurrentName;
			$objTopic->Save();
		}

		/**
		 * Given a Wiki object for this WikiItem, this will post it as a new version.
		 * 
		 * The passed in WikiObject will be saved to the database 
		 * @param string $strName the name of this WikiItem
		 * @param object $objWikiObject the linked Wiki object (e.g. WikiPage or WikiImage) that is not yet saved or assigned
		 * @param string $strSaveMethod the name of the Save method to call on the WikiObject
		 * @param array $arrSaveParameters an array of parameters to pass in to the Save method on the WikiObject
		 * @param Person $objPerson the Person who posted it
		 * @param QDateTime $dttPostDate the optional datetime of the post (will use NOW if none passed)
		 * @return WikiVersion
		 */
		public function CreateNewVersion($strName, $objWikiObject, $strSaveMethod, $arrSaveParameters, Person $objPerson, QDateTime $dttPostDate = null) {
			// Ensure the WikiObject is not yet saved or assigned
			if ($objWikiObject->WikiVersionId)
				throw new QCallerException('WikiObject is already saved or has already been assigned to a version');

			// Ensure the WikiObject is the right type
			if (WikiItemType::$ClassNameArray[$this->intWikiItemTypeId] != get_class($objWikiObject))
				throw new QCallerException('WikiObject class does not match this wiki item type');

			// Create and Save the WikiVersion
			$objWikiVersion = new WikiVersion();
			$objWikiVersion->WikiItem = $this;
			$objWikiVersion->VersionNumber = $this->CountWikiVersions() + 1;
			$objWikiVersion->Name = trim($strName);
			$objWikiVersion->PostedByPerson = $objPerson;
			$objWikiVersion->PostDate = ($dttPostDate) ? $dttPostDate : QDateTime::Now();
			$objWikiVersion->Save();

			// Assign the WikiObject
			$objWikiObject->WikiVersion = $objWikiVersion;

			// Save the WikiObject using the MethodName and MethodParameters passed in
			if (is_null($arrSaveParameters)) $arrSaveParameters = array();
			call_user_func_array(array($objWikiObject, $strSaveMethod), $arrSaveParameters);

			// Update my metadata
			$this->SetCurrentVersion($objWikiVersion);

			// Return
			return $objWikiVersion;
		}

		/**
		 * Sets the current version for this wiki with the passed in WikiVersion object
		 * @param WikiVersion $objWikiVersion the new current version
		 * @return void
		 */
		public function SetCurrentVersion(WikiVersion $objWikiVersion) {
			$this->CurrentWikiVersion = $objWikiVersion;
			$this->CurrentName = $objWikiVersion->Name;
			$this->CurrentPostedByPerson = $objWikiVersion->PostedByPerson;
			$this->CurrentPostDate = $objWikiVersion->PostDate;
			$this->Save();
			
			$this->UpdateTopicLinkName();
		}

		/**
		 * Gets the first WikiVersion for this WikiItem
		 * @return WikiVersion
		 */
		public function GetFirstVersion() {
			$objArray = $this->GetWikiVersionArray(QQ::OrderBy(QQN::WikiVersion()->VersionNumber));
			return $objArray[0];
		}

		/**
		 * Posts a new message/comment for this WikiItem.  If no Person is specified, then it is assumed
		 * that this is a "System Message" for this WikiItem.
		 * @param string $strMessageText the text of the message, itself
		 * @param Person $objPerson optional person who posted this message or performed the action
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
			// This will return an array of WikiItem objects
			return WikiItem::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single WikiItem object
			return WikiItem::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiItem()->Param1, $strParam1),
					QQ::GreaterThan(QQN::WikiItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of WikiItem objects
			return WikiItem::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::WikiItem()->Param1, $strParam1),
					QQ::Equal(QQN::WikiItem()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = WikiItem::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`wiki_item`.*
				FROM
					`wiki_item` AS `wiki_item`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return WikiItem::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;


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