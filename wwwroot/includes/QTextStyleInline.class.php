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


		public static function Process($strInlineContent) {
			// Reset the stack
			QTextStyleInline::$objStateStack = new QTextStyleStateStack();
			QTextStyleInline::$objStateStack->Push(QTextStyle::StateStart);

			// Continue iterating while there are items on the stack
			while (!QTextStyleInline::$objStateStack->IsEmpty()) {
				// Pull out the StateRules for the top-most stack's state
				$arrStateRules = QTextStyle::$StateRulesArray[QTextStyleInline::$objStateStack->PeekTop()->State];

				// Figure out the current character we are attempting to parse with
				$chrCurrent = QString::FirstCharacter($strInlineContent);

				// Figure out the StateRule key to use based on the current character
				if (!strlen($strInlineContent))
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
						if (is_array($mixRule))
							$strDisplayCommand = implode(', ', $mixRule);
						else
							$strDisplayCommand = $strCommand;
						QTextStyleInline::DumpStack($strInlineContent . ' - [' . $chrCurrent . '] - Key(' . $strKey . ') - Command(' . $strDisplayCommand . ')');
					}

					$strCommandReturn = QTextStyleInline::$strCommand($strInlineContent, $chrCurrent, $strParameterArray);
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
			if ($strTitle) {
				$strTitle = sprintf('<a name="%s"><a href="#%s">STACK</a></a> - %s',
					md5($strTitle),
					md5($strTitle),
					str_replace(' ', '&nbsp;', QApplication::HtmlEntities($strTitle)));
			} else {
				$strTitle = 'STACK';
			}

			// Randomize a Background Color
			$strColor = '#' . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f')));

			// Print Title Line
			print '<div style="font: 12px arial; font-weight: bold; color: ' . $strColor . '; background-color: black; padding: 5px;">' . $strTitle . '</div>';

			// Print Stack Contents
			print '<div style="padding: 5px; background-color: ' . $strColor . '; border: 1px solid #666; margin-bottom: 12px;">';

			for ($intIndex = 0; $intIndex < QTextStyleInline::$objStateStack->Size(); $intIndex++) {
				$objState = QTextStyleInline::$objStateStack->Peek($intIndex);
				$strBuffer = nl2br(str_replace(' ', '&nbsp;', QApplication::HtmlEntities($objState->Buffer)));

				print '<div style="font: 12px arial; font-weight: bold; float: left; width: 180px; border-bottom: 1px solid #333; height: 16px;">';
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

		protected static function CommandStatePush(&$strInlineContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->Push($strParameterArray[0]);
		}

		protected static function CommandStatePop(&$strInlineContent, $chrCurrent, $strParameterArray) {
			$objState = self::$objStateStack->Pop();
			return $objState->Buffer;
		}

		protected static function CommandContentPop(&$strInlineContent, $chrCurrent, $strParameterArray) {
			$strInlineContent = substr($strInlineContent, 1);
		}

		protected static function CommandBufferAdd(&$strInlineContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($strParameterArray[0]);
		}

		protected static function CommandBufferAddFromContent(&$strInlineContent, $chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($chrCurrent);
		}

		protected static function CommandCallProcessor(&$strInlineContent, $chrCurrent, $strParameterArray) {
			$strProcessorMethod = $strParameterArray[0];
			QTextStyleInline::$strProcessorMethod($strInlineContent, $chrCurrent);
		}

		protected static function CommandIfStateExistsStatePushElseBufferAdd(&$strInlineContent, $chrCurrent, $strParameterArray) {
			$intStateToCheckIfExists = $strParameterArray[0];
			$intStateToPush = $strParameterArray[1];
			$strBufferToAdd = $strParameterArray[2];
			
			if (self::$objStateStack->GetStackPosition($intStateToCheckIfExists)) {
				self::$objStateStack->Push($intStateToPush);
			} else {
				self::$objStateStack->AddToTopBuffer($strBufferToAdd);
			}
		}


		/////////////////////////////
		// Inline-Specific Processors
		/////////////////////////////

		protected static function ProcessEndQuote(&$strInlineContent, $chrCurrent) {
			// Pop off this end quote state and pull the buffer.
			$objState = self::$objStateStack->Pop();
			$strContent = '&rdquo;' . $objState->Buffer;

			while ((self::$objStateStack->PeekTop()->State != QTextStyle::StateStartQuote) && (self::$objStateStack->PeekTop()->State != QTextStyle::StateStartQuoteStartQuote)) {
				$objState = self::$objStateStack->Pop();
				$strContent = $objState->Buffer . $strContent;
			}

			// And finally, add the content of the startquotestate buffer, itself
			$objState = self::$objStateStack->Pop();
			$strContent = '&ldquo;' . $objState->Buffer . $strContent;

			// If we currently aren't a Text state (because we're at, for example, another start quote), let's add it
			if (self::$objStateStack->PeekTop()->State != QTextStyle::StateText)
				self::$objStateStack->Push(QTextStyle::StateText);

			self::$objStateStack->AddToTopBuffer($strContent);
		}

		protected static function ProcessStartQuote(&$strInlineContent, $chrCurrent) {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&ldquo;' . $objState->Buffer);
		}

		protected static function ProcessStartQuoteStartQuote(&$strInlineContent, $chrCurrent) {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&rdquo;' . $objState->Buffer);
		}

		protected static function ProcessText(&$strInlineContent, $chrCurrent) {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer($objState->Buffer);
		}

		protected static function ProcessColon(&$strInlineContent, $chrCurrent) {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->Push(QTextStyle::StateText, ':' . $objState->Buffer);
		}

		protected static function ProcessLink(&$strInlineContent, $chrCurrent) {
			$objState = self::$objStateStack->Pop();
			$strContent = $objState->Buffer;

			if (array_key_exists(strtolower($strContent), QTextStyle::$LinkProtocolArray)) {
				self::$objStateStack->Push(QTextStyle::StateLinkProtocol, strtolower($strContent));
				self::$objStateStack->Push(QTextStyle::StateLinkLocation);
			} else {
				self::$objStateStack->Push(QTextStyle::StateText, ':' . $strContent);
			}
		}
		
		protected static function ProcessLinkLocation(&$strInlineContent, $chrCurrent) {
			// Delegate the Processing based on the LinkProtocol Used
			
			// Figure out the LinkProtocol
			// Top of Stack is the Link Location, so we need to get the 2nd-Top
			$intPosition = self::$objStateStack->Size() - 2;
			$objLinkProtocolState = self::$objStateStack->Peek($intPosition);

			if ($objLinkProtocolState->State != QTextStyle::StateLinkProtocol)
				throw new Exception('Could not find LinkProtocol State');

			if (array_key_exists($objLinkProtocolState->Buffer, QTextStyle::$LinkProtocolArray)) {
				$strProcessorCommand = QTextStyle::$LinkProtocolArray[$objLinkProtocolState->Buffer];
				self::$strProcessorCommand($strInlineContent, $chrCurrent);
			} else {
				throw new Exception('Could not determine a valid Link Protocol');
			}
		}
		
		protected static function ProcessLinkLocationUrl(&$strInlineContent, $chrCurrent) {
			// Pop off LinkLocation
			$objState = self::$objStateStack->Pop();
			$strLocation = $objState->Buffer;

			// Pop off LinkProtocol
			$objState = self::$objStateStack->Pop();
			$strProtocol = $objState->Buffer;

			// Pop off End Quote
			$objState = self::$objStateStack->Pop();
			if ($objState->State != QTextStyle::StateEndQuote)
				throw new Exception('Could not find In-LinkContent EndQuote State');

			// Pop off Text
			$objState = self::$objStateStack->Pop();
			if ($objState->State != QTextStyle::StateText)
				throw new Exception('Could not find In-LinkContent Text State, instead found: ' . $objState->State);
			$strContent = $objState->Buffer;

			// Pop off Start Quote
			$objState = self::$objStateStack->Pop();
			if (($objState->State != QTextStyle::StateStartQuote) && ($objState->State != QTextStyle::StateStartQuoteStartQuote))
				throw new Exception('Could not find In-LinkContent StartQuote State');
			$strContent = $objState->Buffer . $strContent;

			// A Valid URL?
			if (substr($strLocation, 0, 2) == '//') {
				// Calculate end-of-location
				$strNeedle = '/[A-Za-z0-9\\&\\=\\/]/';
				$intValue = QString::StringReversePosition($strLocation, $strNeedle);

				// Process as a URL-based link
				$strUrlLink = sprintf('<a href="%s:%s">%s</a>', $strProtocol, substr($strLocation, 0, $intValue + 1), $strContent);
				self::$objStateStack->AddToTopBuffer($strUrlLink);

				// Add any tail/unprocessed stuff back to the content stack
				$strInlineContent = substr($strLocation, $intValue + 1) . $strInlineContent;
			} else {
				// Process as just regular text all throughout
				self::$objStateStack->AddToTopBuffer('&ldquo;' . $strContent . '&rdquo;' . ':');

				// Add any tail/unprocessed stuff back to the content stack
				$strInlineContent = $strProtocol . ':' . $strLocation . $strInlineContent;
			}
		}
	}

	class QTextStyleInline extends QTextStyleInlineBase {
	}
?>