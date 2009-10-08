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
		 * Can also be called directly via $this->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Message Object %s',  $this->intId);
		}

		public function RefreshCompiledHtml() {
			$this->strCompiledHtml = QTextStyle::DisplayAsHtml($this->strMessage);
		}

		/**
		 * For subscribers of this message topic, send out an alert to them given this new message
		 * @return void
		 */
		public function SendAlerts() {
			$strLink = sprintf('http://www.qcodo.com/forums/forum.php/%s/%s/lastpage', $this->TopicLink->ForumId, $this->TopicId);

			$strBody = "QCODO MESSAGE POSTED\r\n";
			$strBody .= sprintf("Topic: %s\r\n", $this->Topic->Name);
			$strBody .= sprintf("Posted By: %s\r\n", $this->Person->DisplayName);
			$strBody .= sprintf("Posted On: %s\r\n", $this->PostDate->__toString('DDD MMM D YYYY, h:mm zz'));
			$strBody .= sprintf("(to view this topic in its entirety, please go to %s)\r\n\r\n\r\n", $strLink);
			$strBody .= trim($this->Message);
			$strBody .= "\r\n\r\n------------------------------------------------------\r\nYou are receiving this message because you have opted-in for email notifications on this topic.  ";
			$strBody .= "If you wish to no longer be notified for this topic, please go to ";
			$strBody .= $strLink;
			$strBody .= ' and click on "Email Notification".  If the link does not show up, you will need first "Log In".';

			$strHtml = '<style type="text/css">';
			$strHtml .= '.forum_code { background-color: #ddddff; padding: 10px; margin-left: 20px; font-family: "Lucida Console", "Courier New", "Courier", "monospaced"; font-size: 11px; line-height: 13px; overflow: auto; }';
			$strHtml .= '</style>';
			$strHtml .= sprintf('<span style="font: 12px %s;">', QFontFamily::Verdana);
			$strHtml .= '<span style="font-size: 14px;"><b><a href="http://www.qcodo.com/">Qcodo</a> Message Posted</b></span><br/>';
			$strHtml .= sprintf('<b>Topic: </b>%s<br/>', $this->Topic->Name);
			$strHtml .= sprintf('<b>Posted By: </b>%s<br/>', $this->Person->DisplayName);
			$strHtml .= sprintf('<b>Posted On: </b>%s<br/>', $this->PostDate->__toString('DDD MMM D YYYY, h:mm zz'));
			$strHtml .= sprintf('(to view this post in its entirety, please go to <a href="%s">%s</a>)<br/><br/><br/>', $strLink, $strLink);
			$strHtml .= $this->CompiledHtml;
			$strHtml .= '<br/><br/><hr/><br/><span style="font: 10px;">You are receiving this message because you have opted-in for email notifications on this forum topic.  ';
			$strHtml .= 'If you wish to no longer be notified for this topic, please go to ';
			$strHtml .= $strLink;
			$strHtml .= ' and click on "Email Notification".  If the link does not show up, you will need first "Log In".';
			$strHtml .= '</span></span>';

			$strSubject = '[Qcodo] Re: ' . $this->Topic->Name;

			foreach ($this->Topic->GetPersonAsEmailArray() as $objEmailPerson) {
				if ($objEmailPerson->Id != $this->PersonId) {
					$objEmailQueue = new EmailQueue();
					$objEmailQueue->ToAddress = sprintf('%s %s <%s>', $objEmailPerson->FirstName, $objEmailPerson->LastName, $objEmailPerson->Email);
					$objEmailQueue->FromAddress = QCODO_EMAILER;
					$objEmailQueue->Subject = $strSubject;
					$objEmailQueue->Body = $strBody;
					$objEmailQueue->Html = $strHtml;
					$objEmailQueue->Save();
				}
			}
		}

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