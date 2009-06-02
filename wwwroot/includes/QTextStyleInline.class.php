<?php
	class QTextStyleInlineBase extends QBaseClass {
		/**
		 * @var QTextStyleStateStack
		 */
		protected static $objStateStack;

		/**
		 * @var string
		 */
		protected static $strInlineContent;

		/**
		 * @var boolean
		 */
		public static $OutputDebugMessages = false;


		public static function Process($strInlineContent) {
			// Setup the Content
			QTextStyleInline::$strInlineContent = $strInlineContent;

			// Reset the stack
			QTextStyleInline::$objStateStack = new QTextStyleStateStack();
			QTextStyleInline::$objStateStack->Push(QTextStyle::StateText);
			QTextStyleInline::$objStateStack->Push(QTextStyle::StateWordStartHint);

			// Continue iterating while there is content to parse and items on the stack
			while (strlen(QTextStyleInline::$strInlineContent) || (!QTextStyleInline::$objStateStack->IsEmpty())) {
				
				// If there is content, parse it!
				if (strlen(QTextStyleInline::$strInlineContent)) {
					// Figure out the current character we are attempting to parse with
					$chrCurrent = QString::FirstCharacter(QTextStyleInline::$strInlineContent);

					// Pull out the StateRules for the top-most stack's state
					$arrStateRules = QTextStyle::$StateRulesArray[QTextStyleInline::$objStateStack->PeekTop()->State];

					// Figure out the StateRule key to use based on the current character
					if (array_key_exists($chrCurrent, $arrStateRules))
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

						// Dump the stack to the output buffer (if requested)
						if (QTextStyleInline::$OutputDebugMessages) {
							if (is_array($mixRule))
								$strDisplayCommand = implode(', ', $mixRule);
							else
								$strDisplayCommand = $strCommand;
							QTextStyleInline::DumpStack(QTextStyleInline::$strInlineContent . ' - [' . $chrCurrent . '] - Key(' . $strKey . ') - Command(' . $strDisplayCommand . ')');
						}

						QTextStyleInline::$strCommand($chrCurrent, $strParameterArray);
					}

				// There is no Inline Content to process -- go ahead and call cancel on the top-most state
				} else {
					// Call the cancel method -- store any return vaue
					// If it is the last state on the stack, the return value will be returned
					$strToReturn = QTextStyleInline::CancelTopState();
				}
			}

			return $strToReturn;
		}

		protected static function CancelTopState() {
			$objState = self::$objStateStack->PeekTop();

			// Dump the stack to the output buffer (if requested)
			if (QTextStyleInline::$OutputDebugMessages) {
				QTextStyleInline::DumpStack('CancelTopState(' . $objState->State . ')');
			}

			$strCancelMethodName = QTextStyle::$CancelStateArray[$objState->State];

			return self::$strCancelMethodName();
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

		protected static function CommandStatePush($chrCurrent, $strParameterArray) {
			self::$objStateStack->Push($strParameterArray[0]);
		}

		protected static function CommandStatePop($chrCurrent, $strParameterArray) {
			$objState = self::$objStateStack->Pop();
			return $objState->Buffer;
		}

		protected static function CommandContentPop($chrCurrent, $strParameterArray) {
			QTextStyleInline::$strInlineContent = substr(QTextStyleInline::$strInlineContent, 1);
		}

		protected static function CommandBufferAdd($chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($strParameterArray[0]);
		}

		protected static function CommandBufferAddFromContent($chrCurrent, $strParameterArray) {
			self::$objStateStack->AddToTopBuffer($chrCurrent);
		}

		protected static function CommandCallProcessor($chrCurrent, $strParameterArray) {
			$strProcessorMethod = $strParameterArray[0];
			QTextStyleInline::$strProcessorMethod($chrCurrent);
		}

		protected static function CommandIfStateExistsStatePushElseBufferAdd($chrCurrent, $strParameterArray) {
			$intStateToCheckIfExists = $strParameterArray[0];
			$intStateToPush = $strParameterArray[1];
			$strBufferToAdd = $strParameterArray[2];
			
			if (self::$objStateStack->GetStackPosition($intStateToCheckIfExists) !== false) {
				self::$objStateStack->Push($intStateToPush);
			} else {
				self::$objStateStack->AddToTopBuffer($strBufferToAdd);
			}
		}

		protected static function CommandPushStateIfDoesNotExistElseBufferAdd($chrCurrent, $strParameterArray) {
			$intState = $strParameterArray[0];
			$strBufferToAdd = $strParameterArray[1];

			if (self::$objStateStack->GetStackPosition($intState) !== false) {
				self::$objStateStack->AddToTopBuffer($strBufferToAdd);
			} else {
				self::$objStateStack->Push($intState);
			}
		}

		protected static function CommandIfStateExistsPushElseBufferAdd($chrCurrent, $strParameterArray) {
			$intStateToCheckIfExists = $strParameterArray[0];
			$intStateToPush = $strParameterArray[1];
			$strBufferToAdd = $strParameterArray[2];

			if (self::$objStateStack->GetStackPosition($intStateToCheckIfExists) !== false) {
				self::$objStateStack->Push($intStateToPush);
			} else {
				self::$objStateStack->AddToTopBuffer($strBufferToAdd);
			}
		}

//		protected static function CommandIfStateExistsCallProcessorElseBufferAdd($chrCurrent, $strParameterArray) {
//			$intStateToCheckIfExists = $strParameterArray[0];
//			$strProcessorToCall = $strParameterArray[1];
//			$strBufferToAdd = $strParameterArray[2];
//
//			if (self::$objStateStack->GetStackPosition($intStateToCheckIfExists) !== false) {
//				self::$strProcessorToCall($chrCurrent);
//			} else {
//				self::$objStateStack->AddToTopBuffer($strBufferToAdd);
//			}
//		}

		/////////////////////////////
		// Inline-Specific Processors
		/////////////////////////////

		protected static function ProcessLineBreak($chrCurrent = null) {
			// Call Cancel on all state items up the stack, except for the bottom-most Text state
			while (self::$objStateStack->Size() > 1)
				QTextStyleInline::CancelTopState();

			QTextStyleInline::$strInlineContent = substr(QTextStyleInline::$strInlineContent, 1);
			self::$objStateStack->AddToTopBuffer("<br/>\n");
			self::$objStateStack->Push(QTextStyle::StateWordStartHint);
		}

		protected static function ProcessEndQuote($chrCurrent = null) {
			self::CancelThroughState(QTextStyle::StateStartQuote);
		}
		
		protected static function ProcessEndStrong($chrCurrent = null) {
			// Pop off the StateEndStrong off the stack, and pop off the closing * from the contnet
			self::$objStateStack->Pop();

			self::CancelToState(QTextStyle::StateStartStrong);
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('<strong>' .$objState->Buffer . '</strong>');
		}

		protected static function ProcessLink($chrCurrent = null) {
			$objColonState = self::$objStateStack->PeekTop();
			$strContent = $objColonState->Buffer;
			
			// Check the text for this state to see if there is already a </a>
			$objTextState = self::$objStateStack->Peek(self::$objStateStack->Size() - 3);
			if ($objTextState->State != QTextStyle::StateText) throw new Exception('Expecting StateText but is instead ' . $objTextState->State);
			
			if (strpos($objTextState->Buffer, '</a>') !== false) {
				self::$objStateStack->AddToTopBuffer(':');
				self::CancelThroughState(QTextStyle::StateStartQuote);
				return;
			}

			if (array_key_exists(strtolower($strContent), QTextStyle::$LinkProtocolArray)) {
				self::$objStateStack->Pop();
				self::$objStateStack->Push(QTextStyle::StateLinkProtocol, strtolower($strContent));
				self::$objStateStack->Push(QTextStyle::StateLinkLocation);
			} else {
				self::$objStateStack->AddToTopBuffer(':');
				self::CancelThroughState(QTextStyle::StateStartQuote);
			}
		}

		protected static function ProcessLinkLocation($chrCurrent = null) {
			// Delegate the Processing based on the LinkProtocol Used
			
			// Figure out the LinkProtocol
			// Top of Stack is the Link Location, so we need to get the 2nd-Top
			$intPosition = self::$objStateStack->Size() - 2;
			$objLinkProtocolState = self::$objStateStack->Peek($intPosition);

			if ($objLinkProtocolState->State != QTextStyle::StateLinkProtocol)
				throw new Exception('Could not find LinkProtocol State');

			if (array_key_exists($objLinkProtocolState->Buffer, QTextStyle::$LinkProtocolArray)) {
				$strProcessorCommand = QTextStyle::$LinkProtocolArray[$objLinkProtocolState->Buffer];
				self::$strProcessorCommand($chrCurrent);
			} else {
				throw new Exception('Could not determine a valid Link Protocol');
			}
		}
		
		protected static function ProcessLinkLocationUrl($chrCurrent = null) {
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

			// Cancel everything through the matching start quote
			self::CancelToState(QTextStyle::StateStartQuote);

			// Pop off the Start Quote at the top of the stack
			$objState = self::$objStateStack->Pop();
			$strContent = $objState->Buffer;

			// A Valid URL?
			if (substr($strLocation, 0, 2) == '//') {
				// Calculate end-of-location
				$strNeedle = '/[A-Za-z0-9\\&\\=\\/]/';
				$intValue = QString::StringReversePosition($strLocation, $strNeedle);

				// Process as a URL-based link
				$strUrlLink = sprintf('<a href="%s:%s">%s</a>', $strProtocol, substr($strLocation, 0, $intValue + 1), $strContent);
				self::$objStateStack->AddToTopBuffer($strUrlLink);

				// Add any tail/unprocessed stuff back to the content stack
				QTextStyleInline::$strInlineContent = substr($strLocation, $intValue + 1) . QTextStyleInline::$strInlineContent;
			} else {
				// Process as just regular text all throughout
				self::$objStateStack->AddToTopBuffer('&ldquo;' . $strContent . '&rdquo;' . ':');

				// Add any tail/unprocessed stuff back to the content stack
				QTextStyleInline::$strInlineContent = $strProtocol . ':' . $strLocation . QTextStyleInline::$strInlineContent;
			}
		}



		/////////////////////////////
		// Cancel-State Processors
		/////////////////////////////

		protected static function CancelStateText() {
			$objState = self::$objStateStack->Pop();

			// Return the buffer if the already the final state on the stack
			if (self::$objStateStack->IsEmpty())
				return $objState->Buffer;

			// Otherwise, add state to the next-state item
			else
				self::$objStateStack->AddToTopBuffer($objState->Buffer);
		}

		protected static function CancelStateSpace() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer($objState->Buffer);
		}

		protected static function CancelStateWordStartHint() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer($objState->Buffer);
		}

		protected static function CancelStateStartQuote() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&ldquo;' . $objState->Buffer);
		}

		protected static function CancelStateEndQuote() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&rdquo;' . $objState->Buffer);
		}
		
		protected static function CancelStateColon() {
			// Remember, we've got two states to pop... the Colon AND the EndQuote
			$objColonState = self::$objStateStack->Pop();
			self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('&rdquo;:' . $objColonState->Buffer);
		}

		protected static function CancelStateLinkLocation() {
			self::ProcessLinkLocation();
		}

		protected static function CancelStateLinkProtocol() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer(':' . $objState->Buffer);
		}

		protected static function CancelStateStartStrong() {
			$objState = self::$objStateStack->Pop();
			self::$objStateStack->AddToTopBuffer('*' . $objState->Buffer);
		}

		//////////
		// Helpers
		//////////

		protected static function CancelThroughState($intStateToCancelThrough) {
			$objTopState = self::$objStateStack->PeekTop();
			while ($objTopState->State != $intStateToCancelThrough) {
				$strCancelMethod = QTextStyle::$CancelStateArray[$objTopState->State];
				QTextStyleInline::$strCancelMethod();
				$objTopState = self::$objStateStack->PeekTop();
			}

			// We are cancelling THRU the state... so let's call Cancel one more time
			$strCancelMethod = QTextStyle::$CancelStateArray[$objTopState->State];
			QTextStyleInline::$strCancelMethod();
		}

		protected static function CancelToState($intStateToCancelTo) {
			$objTopState = self::$objStateStack->PeekTop();
			while ($objTopState->State != $intStateToCancelTo) {
				$strCancelMethod = QTextStyle::$CancelStateArray[$objTopState->State];
				QTextStyleInline::$strCancelMethod();
				$objTopState = self::$objStateStack->PeekTop();
			}
		}
		


	}

	class QTextStyleInline extends QTextStyleInlineBase {
	}
?>