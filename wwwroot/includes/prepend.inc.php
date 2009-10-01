<?php
	if (!defined('__PREPEND_INCLUDED__')) {
		// Ensure prepend.inc is only executed once
		define('__PREPEND_INCLUDED__', 1);


		///////////////////////////////////
		// Define Server-specific constants
		///////////////////////////////////	
		/*
		 * This assumes that the configuration include file is in the same directory
		 * as this prepend include file.  For security reasons, you can feel free
		 * to move the configuration file anywhere you want.  But be sure to provide
		 * a relative or absolute path to the file.
		 */
		require(dirname(__FILE__) . '/configuration.inc.php');


		//////////////////////////////
		// Include the Qcodo Framework
		//////////////////////////////
		require(__QCODO_CORE__ . '/qcodo.inc.php');


		///////////////////////////////
		// Define the Application Class
		///////////////////////////////
		/**
		 * The Application class is an abstract class that statically provides
		 * information and global utilities for the entire web application.
		 *
		 * Custom constants for this webapp, as well as global variables and global
		 * methods should be declared in this abstract class (declared statically).
		 *
		 * This Application class should extend from the ApplicationBase class in
		 * the framework.
		 */
		abstract class QApplication extends QApplicationBase {
			/**
			 * This is called by the PHP5 Autoloader.  This method overrides the
			 * one in ApplicationBase.
			 *
			 * @return void
			 */
			public static function Autoload($strClassName) {
				// First use the Qcodo Autoloader
				if (!parent::Autoload($strClassName)) {
					// TODO: Run any custom autoloading functionality (if any) here...
				}
			}

			////////////////////////////
			// QApplication Customizations (e.g. EncodingType, etc.)
			////////////////////////////
			// public static $EncodingType = 'ISO-8859-1';

			////////////////////////////
			// Additional Static Methods
			////////////////////////////
			public static $NavBarArray = array(
				array('About', '/', 80, array(
					array('Home', '/', 50),
					array('Overview', '/wiki/qcodo/overview/', 70),
					array('Presentations', '/wiki/qcodo/presentations/', 80),
					array('Showcase', '/showcase/', 60))),
				array('Learn', '/wiki/qcodo/learn/', 80, array(
					array('Demos', '/wiki/qcodo/demos/', 60),
					array('Examples Site', 'http://examples.qcodo.com/', 90),
					array('API Cheet Sheet', '/wiki/qcodo/api/', 100),
					array('API Online Guide', 'http://api.qcodo.com/', 100))),
				array('Get', '/downloads/', 80, array(
					array('Qcodo Release', '/downloads/', 90),
					array('Community Contributions', '/plugins/', 135))),
				array('Community', '/forums/', 125, array(
					array('Forums', '/forums/', 60),
					array('Wiki', '/wiki/', 60),
					array('Other Projects', '/wiki/qcodo/other_projects/', 98))),
				array('Development', '/wiki/qcodo/development/', 135, array(
					array('Bug Tracking', '/issues/', 90),
					array('Contribute', '/wiki/qcodo/development/contribute/', 80),
					array('Donate', '/donate/', 60)))
				);
			const NavAbout = 0;
			const NavLearn = 1;
			const NavGet = 2;
			const NavCommunity = 3;
			const NavDevelopment = 4;
			
			const NavAboutHome = 0;
			const NavAboutOverview = 1;
			const NavAboutPresentations = 2;
			const NavAboutShowcase = 3;
			
			const NavLearnDemos = 0;
			const NavLearnExamples = 1;
			const NavLearnApiSheet = 2;
			const NavLearnApiOnline = 3;
			
			const NavGetQcodo = 0;
			const NavGetCommunity = 1;
			
			const NavCommunityForums = 0;
			const NavCommunityWiki = 1;
			const NavCommunityOther = 2;
			
			const NavDevelopmentBugs = 0;
			const NavDevelopmentContribute = 1;
			const NavDevelopmentDonate = 2;

			// Login and Authorization/Authentication

			/**
			 * @var Person
			 */
			public static $Person;

			/**
			 * This shouuld be called on the top of any page that requires authentication.
			 * This checks to make sure a person is actually logged in on order to view the page.
			 * This will redirect to the login page if the user is NOT logged in.
			 * @return void
			 */
			public static function Authenticate() {
				if (!QApplication::$Person) QApplication::RedirectToLogin();
			}

			/**
			 * Redirect the user to the Login page, specifying that the user gets redirected
			 * back to this "current page" after a successful login.
			 * @return void
			 */
			public static function RedirectToLogin() {
				QApplication::Redirect('/login/?strReferer=' . urlencode(QApplication::$RequestUri));
			}

			/**
			 * Called within prepend.inc.php to hidrate the $Person object into QApplication
			 * if the person_id is stored in session (e.g. if a Person is logged in)
			 * OR if a LoginTicket exists in the cookie
			 * @return void
			 */
			public static function InitializePerson() {
				if (array_key_exists('intPersonId', $_SESSION))
					QApplication::$Person = Person::Load($_SESSION['intPersonId']);
				else if ($objTicket = QApplication::GetLoginTicketFromCookie()) {
					$objPerson = $objTicket->Person;
					QApplication::LoginPerson($objPerson);

					// Delete and Create New Ticket (to prevent ticket stealing)
					$objTicket->Delete();
					QApplication::SetLoginTicketToCookie($objPerson);
				}
			}

			/**
			 * Logs in a Person/User
			 * @param Person $objPerson
			 * @return void
			 */
			public static function LoginPerson(Person $objPerson) {
				$_SESSION['intPersonId'] = $objPerson->Id;
				QApplication::$Person = $objPerson;
				
				// Mark any topics as viewed if applicable
				if (array_key_exists('intViewedTopicArray', $_SESSION)) {
					foreach ($_SESSION['intViewedTopicArray'] as $intTopicId => $blnValue) {
						if ($blnValue) {
							$objTopic = Topic::Load($intTopicId);
							if ($objTopic && !$objTopic->IsPersonAsReadAssociated($objPerson)) {
								$objTopic->AssociatePersonAsRead($objPerson);
							}
						}
					}
				}
				QApplication::ClearViewedTopicArray();
			}

			/**
			 * Logs out the Person (if currently logged in)
			 * @return void
			 */
			public static function LogoutPerson() {
				// Log out the person
				$_SESSION['intPersonId'] = null;
				unset($_SESSION['intPersonId']);
				QApplication::$Person = null;

				// Clear any login cookies (if applicable)
				QApplication::ClearLoginTicketFromCookie();
			}

			/**
			 * Clears out the Viewed Topic array
			 * @return void
			 */
			public static function ClearViewedTopicArray() {
				// Clear out any viewed data (if applicable)
				$_SESSION['intViewedTopicArray'] = null;
				unset($_SESSION['intViewedTopicArray']);
			}

			/**
			 * Create and store in the user's cookie a login ticket so that they
			 * can stay logged in across browser sessions
			 * @param $objPerson Person
			 * @return void
			 */
			public static function SetLoginTicketToCookie(Person $objPerson) {
				// Create a new ticket for this user
				$objTicket = new LoginTicket();
				$objTicket->Person = $objPerson;
				$objTicket->Save();

				$objCrypto = new QCryptography();
				$strTicket = $objCrypto->Encrypt($objTicket->Id . '_' . $objPerson->Id);

				setcookie('strTicket', $strTicket, time() + 60*60*24*365, '/', /* '.qcodo.com' */ null);
			}

			/**
			 * Return a LoginTicket based on cookie information, if applicable
			 * @return LoginTicket
			 */
			public static function GetLoginTicketFromCookie() {
				if (array_key_exists('strTicket', $_COOKIE) && $_COOKIE['strTicket']) {
					$objCrypto = new QCryptography();
					$strTicket = $objCrypto->Decrypt($_COOKIE['strTicket']);

					$strTicketArray = explode('_', $strTicket);
					$intTicketId = $strTicketArray[0];
					$intPersonId = $strTicketArray[1];

					$objTicket = LoginTicket::Load($intTicketId);
					if (($objTicket) && ($objTicket->PersonId == $intPersonId))
						return $objTicket;
				}

				// If we're here, no valid login ticket existed in the cookie
				return null;
			}

			/**
			 * Clears any LoginTicket information from the cookie and the database, if applicable
			 * @return void
			 */
			public static function ClearLoginTicketFromCookie() {
				// First, Delete the Ticket Record from the DB (if applicable)
				if ($objTicket = QApplication::GetLoginTicketFromCookie())
					$objTicket->Delete();

				// Next, Clear the Ticket from the Cookie, itself
				setcookie('strTicket', '', time() - 60*60*24*365, '/', /* '.qcodo.com' */ null);
			}

			/**
			 * Updates the cookie to specify whether or not this user is viewing comments in the wiki
			 * @param boolean $blnShow 
			 * @return void
			 */
			public static function SetWikiViewComments($blnShow) {
				setcookie('blnWikiViewComments', ($blnShow) ? 1 : 0, null, '/', /* '.qcodo.com' */ null);
				
			}

			/**
			 * Returns whether or not the user is viewing comments in the wiki
			 * @return boolean
			 */
			public static function IsWikiViewComments() {
				return (array_key_exists('blnWikiViewComments', $_COOKIE) && $_COOKIE['blnWikiViewComments']);
			}

			/**
			 * Using an email template, this will queue up an email into the email queue to be sent out.
			 * @param string $strTemplateName the name of the template to use
			 * @param string $strSubject the subject of the email
			 * @param string $strFrom who the email is sent from
			 * @param string $strTo who the email shout be sent to
			 * @param string $strTokenArray the replacement token array
			 * @param boolean $blnHighPriorityFlag whether or not this is a high priority message (to be sent before all other queued messages)
			 * @return void
			 */
			public static function SendEmailUsingTemplate($strTemplateName, $strSubject, $strFrom, $strTo, $strTokenArray, $blnHighPriorityFlag = false) {
				$strContent = file_get_contents(__INCLUDES__ . '/email_templates/' . $strTemplateName . '.txt');
				foreach ($strTokenArray as $strKey => $strValue) {
					$strContent = str_replace('%' . $strKey . '%', $strValue, $strContent);
				}
				$objEmail = new EmailQueue();
				$objEmail->ToAddress = $strTo;
				$objEmail->FromAddress = $strFrom;
				$objEmail->Subject = $strSubject;
				$objEmail->Body = $strContent;
				$objEmail->HighPriorityFlag = $blnHighPriorityFlag;
				$objEmail->Save();
			}
			
			public static function LocalizeDateTime(QDateTime $dttDateTime) {
				if (QApplication::$Person && QApplication::$Person->Timezone) {
					$dttToReturn = new QDateTime($dttDateTime);
					$dttToReturn->ConvertToTimezone(QApplication::$Person->Timezone->Name);
					return $dttToReturn;
				} else {
					return $dttDateTime;
				}
			}

			/**
			 * Displays the timezone of a given datetime WITH a link to the user's "Edit Profile" page (to update
			 * his/her timezone preferences) if the user is logged in.
			 * @param QDateTime $dttDateTime
			 * @param boolean $blnDisplayOutput whether or not to print the actual output, or just return it
			 * @return string the html to be outputted
			 */
			public static function DisplayTimezoneLink(QDateTime $dttDateTime, $blnDisplayOutput = true) {
				if ($dttDateTime) {
					if (QApplication::$Person)
						$strToReturn = '<a href="/profile/edit.php" title="update timezone settings">' . $dttDateTime->__toString('ttt') . '</a>';
					else
						$strToReturn = $dttDateTime->__toString('ttt');
				} else {
					$strToReturn = '';
				}
				
				if ($blnDisplayOutput) print $strToReturn;
				return $strToReturn;
			}
			
			public static function DisplayByteSize($intBytes) {
				if (is_null($intBytes)) return 'n/a';
				if ($intBytes == 0) return '0 KB';

				$strToReturn = '';
				if ($intBytes < 0) {
					$intBytes = $intBytes * -1;
					$strToReturn .= '-';
				}

				if ($intBytes < 1024)
					$strToReturn .= $intBytes . ' bytes';
				else if ($intBytes < (1024 * 1024))
					$strToReturn .= sprintf('%.2f KB', $intBytes / (1024));
				else if ($intBytes < (1024 * 1024 * 1024))
					$strToReturn .= sprintf('%.2f MB', $intBytes / (1024*1024));
				else
					$strToReturn .= sprintf('%.2f GB', $intBytes / (1024*1024*1024));

				return $strToReturn;
			}
			
			/**
			 * Given QTextStyle-generated HTML content, this will return the same content, with any wiki-based links
			 * reconciled against actual data in the wiki database.
			 * @param string $strContent
			 * @return string
			 */
			public static function DisplayWithWikiLinks($strContent) {
				// Fix up for images
				$strContent = (preg_replace('/<wikiImage position="(Left|Right)" path="\\/([a-z0-9\\_\\/]*)"\\/>/', '<div class="wikiThumb wikiThumb${1}"><a href="/wiki/image:${2}" title="Edit This Image"><img src="/wiki/view_thumb.php/${2}"/></a></div>', $strContent));

				// Fix up for files
				$intCount = preg_match_all('/<wikiFile path="([a-z0-9\\_\\/]*)"\\/>/', $strContent, $arrMatches);
				for ($intMatch = 0; $intMatch < $intCount; $intMatch++) {
					$strTagToReplace = $arrMatches[0][$intMatch];
					$strPath = $arrMatches[1][$intMatch];

					$objWikiItem = WikiItem::LoadByPathWikiItemTypeId($strPath, WikiItemType::File);
					
					if ($objWikiItem) {
						$strContent = str_replace($strTagToReplace, $objWikiItem->CurrentWikiVersion->WikiFile->DisplayDownloadLink(true), $strContent);
					} else {
						$strContent = str_replace($strTagToReplace, WikiFile::DisplayUploadNewLinkForPath($strPath), $strContent);
					}
				}

				return $strContent;
			}

			public static function GetQcodoVersion($blnStableVersion = true) {
				if ($blnStableVersion)
					return trim(file_get_contents(__QCODO_BUILDS__ . '/STABLE'));
				else
					return trim(file_get_contents(__QCODO_BUILDS__ . '/DEVELOPMENT'));
			}

			public static function GetQcodoChangelog() {
				return file_get_contents(__QCODO_BUILDS__ . '/changelog.txt');
			}

			/**
			 * @return QDateTime
			 */
			public static function GetQcodoVersionDate($blnStableVersion = true) {
				$strVersion = QApplication::GetQcodoVersion($blnStableVersion);
				return QDateTime::FromTimestamp(filemtime(__QCODO_BUILDS__ . '/qcodo-' . $strVersion . '.tar.gz'));
			}

			/**
			 * @return string
			 */
			public static function GetQcodoVersionSize($blnStableVersion = true, $blnTarGz = true) {
				$strVersion = QApplication::GetQcodoVersion($blnStableVersion);
				$strExtension = ($blnTarGz) ? '.tar.gz' : '.zip';
				return QApplication::DisplayByteSize(filesize(__QCODO_BUILDS__ . '/qcodo-' . $strVersion . $strExtension));
			}
		}


		//////////////////////////
		// Custom Global Functions
		//////////////////////////	
		// TODO: Define any custom global functions (if any) here...


		////////////////
		// Include Files
		////////////////

		// For Searching using Zend Framework's Lucene Search library
		ini_set('include_path', '.:' . __INCLUDES__);
		require('Zend/Search/Lucene.php');


		///////////////////////
		// Setup Error Handling
		///////////////////////
		/*
		 * Set Error/Exception Handling to the default
		 * Qcodo HandleError and HandlException functions
		 * (Only in non CLI mode)
		 *
		 * Feel free to change, if needed, to your own
		 * custom error handling script(s).
		 */
		if (array_key_exists('SERVER_PROTOCOL', $_SERVER)) {
			set_error_handler('QcodoHandleError');
			set_exception_handler('QcodoHandleException');
		}


		////////////////////////////////////////////////
		// Initialize the Application and DB Connections
		////////////////////////////////////////////////
		QApplication::Initialize();
		QApplication::InitializeDatabaseConnections();


		/////////////////////////////
		// Start Session Handler (if required)
		/////////////////////////////
		session_start();
		QApplication::InitializePerson();


		//////////////////////////////////////////////
		// Setup Internationalization and Localization (if applicable)
		// Note, this is where you would implement code to do Language Setting discovery, as well, for example:
		// * Checking against $_GET['language_code']
		// * checking against session (example provided below)
		// * Checking the URL
		// * etc.
		// TODO: options to do this are left to the developer
		//////////////////////////////////////////////
		if (isset($_SESSION)) {
			if (array_key_exists('country_code', $_SESSION))
				QApplication::$CountryCode = $_SESSION['country_code'];
			if (array_key_exists('language_code', $_SESSION))
				QApplication::$LanguageCode = $_SESSION['language_code'];
		}

		// Initialize I18n if QApplication::$LanguageCode is set
		if (QApplication::$LanguageCode)
			QI18n::Initialize();
		else {
			// QApplication::$CountryCode = 'us';
			// QApplication::$LanguageCode = 'en';
			// QI18n::Initialize();
		}
	}
?>