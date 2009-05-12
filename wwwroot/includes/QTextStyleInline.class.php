<?php
	class QTextStyleInlineBase extends QBaseClass {
		/**
		 * @var QTextStyleStateStack
		 */
		protected static $objStateStack;

		/**
		 * @var boolean
		 */
		public static $OutputDebugMessages = false;


		public static function Process($strContent) {
			// Reset the stack
			QTextStyleInline::$objStateStack = new QTextStyleStateStack();
			QTextStyleInline::$objStateStack->Push(QTextStyle::StateStart);

			// Continue iterating while there are items on the stack
			while (!QTextStyleInline::$objStateStack->IsEmpty()) {
				// Pull out the StateRules for the top-most stack's state
				$arrStateRules = QTextStyle::$StateRulesArray[QTextStyleInline::$objStateStack->PeekLast()->State];

				// Figure out the current character we are attempting to parse with
				$chrCurrent = QString::FirstCharacter($strContent);

				// Figure out the StateRule key to use based on the current character
				if (!strlen($strContent))
					$strKey = QTextStyle::KeyEnd;
				else if (array_key_exists($chrCurrent, $arrStateRules))
					$strKey = $chrCurrent;
				else if (array_key_exists(QTextStyle::KeyAlpha, $arrStateRules) && preg_match('/[A-Za-z]/', $chrCurrent))
					$strKey = QTextStyle::KeyAlpha;
				else if (array_key_exists(QTextStyle::KeyNumeric, $arrStateRules) && preg_match('/[0-9]/', $chrCurrent))
					$strKey = QTextStyle::KeyNumeric;
				else if (array_key_exists(QTextStyle::KeyAlphaNumeric, $arrStateRules) && preg_match('/[A-Za-z0-9]/', $chrCurrent))
					$strKey = QTextStyle::KeyAlphaNumeric;
				else
					$strKey = QTextStyle::KeyDefault;

				// Go through the rules for our current state and key
				foreach ($arrStateRules[$strKey] as $mixRule) {
					// Pull the Command and the parameters for the commad (if any)
					if (is_array($mixRule)) {
						$strCommand = $mixRule[0];
						$strParameterArray = $mixRule;
						array_shift($strParameterArray);
					} else {
						$strParameterArray = array();
						$strCommand = $mixRule;
					}

					if (QTextStyleInline::$OutputDebugMessages) {
						QTextStyleInline::DumpStack($strContent . ' - [' . $chrCurrent . '] - Key(' . $strKey . ') - Command(' . $strCommand . ')');
					}

					$strCommandReturn = QTextStyleInline::$strCommand($strContent, $chrCurrent, $strParameterArray);
				}
			}
			
			return $strCommandReturn;
		}



		/**
		 * Used for debugging purposes only.  Will, at any time, dump the state of the entire stack.
		 * @param string $strTitle optional title to display for the stack itself
		 * @param boolean $blnExit whether or not to call exit() after dumping
		 * @return unknown_type
		 */
		protected static function DumpStack($strTitle = null, $blnExit = false) {
			if ($strTitle) $strTitle = ' - ' . str_replace(' ', '&nbsp;', QApplication::HtmlEntities($strTitle));

			// Randomize a Background Color
			$strColor = '#' . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f')));

			// Print Title Line
			print '<div style="font: 12px arial; font-weight: bold; color: ' . $strColor . '; background-color: black; padding: 5px;">STACK' . $strTitle . '</div>';

			// Print Stack Contents
			print '<div style="padding: 5px; background-color: ' . $strColor . '; border: 1px solid #666; margin-bottom: 12px;">';

			for ($intIndex = 0; $intIndex < QTextStyleInline::$objStateStack->Size(); $intIndex++) {
				$objState = QTextStyleInline::$objStateStack->Peek($intIndex);
				$strBuffer = nl2br(str_replace(' ', '&nbsp;', QApplication::HtmlEntities($objState->Buffer)));

				print '<div style="font: 12px arial; font-weight: bold; float: left; width: 150px; border-bottom: 1px solid #333; height: 16px;">';
				print $objState->State;
				print '</div>';
				print '<div style="float: left; font: 11px lucida console; border-bottom: 1px solid #333; height: 16px; width: 500px;">';
				if (!$strBuffer) print '<span style="color: #666;">n/a</span>'; else print $strBuffer;
				print '</div><br clear="all"/>';
			}

			print '</div>';

			// Optional Exit
			if ($blnExit) exit();
		}



		////////////////
		// Rule Commands
		////////////////

		protected static function CommandStatePush(&$strContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->Push($strParameterArray[0]);
		}

		protected static function CommandStatePop(&$strContent, $chrCurrent, $strParameterArray) {
			$objState = self::$objStateStack->Pop();
			return $objState->Buffer;
		}

		protected static function CommandContentPop(&$strContent, $chrCurrent, $strParameterArray) {
			$strContent = substr($strContent, 1);
		}

		protected static function CommandBufferAdd(&$strContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($strParameterArray[0]);
		}

		protected static function CommandBufferAddFromContent(&$strContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($chrCurrent);
		}

		protected static function CommandCallProcessor(&$strContent, $chrCurrent, $strParameterArray) {
			$strProcessorMethod = $strParameterArray[0];
			QTextStyleInline::$strProcessorMethod($chrCurrent);
		}

		protected static function CommandStatePushIfStateExists(&$strContent, $chrCurrent, $strParameterArray) {
			$intStateToCheckIfExists = $strParameterArray[0];
			$intStateToPush = $strParameterArray[1];
			exit('HERE');
		}



		/////////////////////////////
		// Inline-Specific Processors
		/////////////////////////////

		protected static function ProcessEndQuote() {
			// Can we find a matching StartQuote?
			$blnFoundStartQuote = false;
			for ($intStartQuotePosition = self::$objStateStack->Size() - 1; ($intStartQuotePosition >= 0 && !$blnFoundStartQuote); $intStartQuotePosition--) {
				if ((self::$objStateStack->Peek($intStartQuotePosition) == self::StateStartQuote) ||
					(self::$objStateStack->Peek($intStartQuotePosition) == self::StateStartQuoteStartQuote)) {
					$blnFoundStartQuote = true;
				}
			}

			$objState = self::$objStateStack->Pop();
			$strContent = '&rdquo;' . $objState->Buffer;

			if ($blnFoundStartQuote) {
				while ((self::$objStateStack->PeekLast()->State != self::StateStartQuote) && (self::$objStateStack->PeekLast()->State != self::StateStartQuoteStartQuote)) {
					$objState = self::$objStateStack->Pop();
					$strContent = $objState->Buffer . $strContent;
				}
			}

			$objState = self::$objStateStack->Pop();
			$strContent = $objState->Buffer . $strContent;

			if ($blnFoundStartQuote)
				$strContent = '&ldquo;' . $strContent;

			self::$objStateStack->AddToTopBuffer($strContent);
		}

		protected static function ProcessStartQuote() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&ldquo;' . $objState->Buffer);
		}

		protected static function ProcessStartQuoteStartQuote() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&rdquo;' . $objState->Buffer);
		}

		protected static function ProcessText() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer($objState->Buffer);
		}

		protected static function ProcessColon() {
			self::$objStateStack->Pop();
			$strContent = ':' . self::$objBufferStack->Pop();

			self::$objStateStack->Push(self::StateText);
			self::$objBufferStack->Push($strContent);
		}

		protected static function ProcessUrl() {
			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop();

			if (array_key_exists(strtolower($strContent), self::$UrlProtocolArray) &&
				self::$UrlProtocolArray[strtolower($strContent)]) {
				self::$objStateStack->Push(self::StateUrlProtocol);
				self::$objBufferStack->Push(strtolower($strContent));

				self::$objStateStack->Push(self::StateUrlLocation);
				self::$objBufferStack->Push('');
			} else {
				self::$objStateStack->Push(self::StateText);
				self::$objBufferStack->Push(':' . $strContent);
			}
		}
		
		protected static function ProcessUrlLocation() {
			// Pop off UrlLocation
			self::$objStateStack->Pop();
			$strLocation = self::$objBufferStack->Pop();

			// Pop off UrlProtocol
			self::$objStateStack->Pop();
			$strProtocol = self::$objBufferStack->Pop();

			// Pop off End Quote
			self::$objStateStack->Pop();
			self::$objBufferStack->Pop();

			// Pop off Text
			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop();

			// Pop off Start Quote
			self::$objStateStack->Pop();
			$strContent .= self::$objBufferStack->Pop();

			// Calculate end-of-location
			$strNeedle = '/[A-Za-z0-9\\&\\=\\/]/';
			$intValue = self::StringReversePosition($strLocation, $strNeedle);
			
			// Process as link
			$strUrlLink = sprintf('<a href="%s:%s">%s</a>', $strProtocol, substr($strLocation, 0, $intValue + 1), $strContent);
			self::$objBufferStack->AppendStringToTop($strUrlLink . substr($strLocation, $intValue + 1));
		}
	}

	class QTextStyleInline extends QTextStyleInlineBase {
	}
?>