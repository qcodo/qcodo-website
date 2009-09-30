<?php
	class QTextStyleBlockBase extends QBaseClass {
		/**
		 * @param string[] $strMatches the matches string-array from the "block regular expression" match
		 * @param string $strContent the entire content to be parsed, including the current block
		 * @return string the resulting text (if applicable)
		 */
		public static function Process($strMatches, &$strContent) {
			// Pull out all the components of the BlockCommand Call from the $strMatches calculated by regexp
			$strBlockCommand = $strMatches[0];
			$strBlockIdentifier = strtolower($strMatches[1]);
			$strTextAlignCode = $strMatches[2];
			$strDirectives = array_key_exists(3, $strMatches) ? $strMatches[3] : null;

			// Make sure the current block is indeed the first block to be evaluated and that
			// the Block is defined for this Block Identifier
			if (strpos($strContent, $strBlockCommand) !== 0) return false;
			if (!array_key_exists($strBlockIdentifier, QTextStyle::$BlockProcessorArray)) return false;

			// Pull the appropriate EndMarker and ProcessorMethod for this Block Identifier
			$strProcessorMethod = QTextStyle::$BlockProcessorArray[$strBlockIdentifier];

			$strEndMarker = array_key_exists($strBlockIdentifier, QTextStyle::$BlockEndMarkerArray) ?  
				QTextStyle::$BlockEndMarkerArray[$strBlockIdentifier] :
				QTextStyle::$BlockEndMarkerArray[QTextStyle::KeyDefault];
			$intEndMarkerLength = strlen($strEndMarker);

			// Calculate length for the entire block command
			$intBlockCommandLength = strlen($strBlockCommand);

			// Pull the content for this block
			if (($intPosition = strpos($strContent, $strEndMarker)) !== false) {
				$strBlockContent = substr($strContent, $intBlockCommandLength, $intPosition - $intBlockCommandLength);
				$strRemainingContent = substr($strContent, strlen($strBlockCommand . $strBlockContent) + $intEndMarkerLength);
			} else {
				$strBlockContent = substr($strContent, $intBlockCommandLength);
				$strRemainingContent = null;
			}

			// Pull Style and Options from Directives
			$strStyle = QTextStyleBlock::CalculateStyleFromTextAlignCode($strTextAlignCode);
			$strOptions = null;

			// Make sure the directives are not malformed, as well
			if (!QTextStyleBlock::CalculateStyleAndOptionsFromDirectives($strDirectives, $strStyle, $strOptions))
				return false;

			// If we made it here, we have a valid block.  Call on the processor method to render the block and update the remaining content
			$strContent = $strRemainingContent;
			return QTextStyleBlock::$strProcessorMethod($strBlockContent, $strBlockIdentifier, $strStyle, $strOptions);
		}



		//////////
		// Helpers
		//////////

		/**
		 * Figure out a style for a TextAlignCode
		 * @param string $strTextAlignCode the text align code
		 * @return string the rendered style
		 */
		protected static function CalculateStyleFromTextAlignCode($strTextAlignCode) {
			// Figure Out Initial Style
			switch ($strTextAlignCode) {
				case '<':
					return 'text-align:left;';
				case '>':
					return 'text-align:right;';
				case '<>':
					return 'text-align:justify;';
				case '=':
					return 'text-align:center;';
				default:
					return null;
			}
		}

		/**
		 * @param $strDirectives the directives to process
		 * @param $strStyle the calculated style based on the directives
		 * @param $strOptions the calculated options based on the directives
		 * @return boolean returns false if the directives are malformed at all
		 */
		protected static function CalculateStyleAndOptionsFromDirectives($strDirectives, &$strStyle, &$strOptions) {
			if ($strDirectives) {
				$strDirectives = preg_replace('/([\\}\\]])([\\{\\[])/', '$1\\\\$2', $strDirectives);
				$strDirectives = explode('\\', $strDirectives);

				for ($intDirectiveIndex = 0; $intDirectiveIndex < count($strDirectives); $intDirectiveIndex++) {
					$strDirective = $strDirectives[$intDirectiveIndex];

					if ((QString::FirstCharacter($strDirective) == '{') &&
						(QString::LastCharacter($strDirective) == '}'))
						$strStyle .= substr($strDirective, 1, strlen($strDirective) - 2);

					else if ((QString::FirstCharacter($strDirective) == '[') &&
							 (QString::LastCharacter($strDirective) == ']'))
						$strOptions = substr($strDirective, 1, strlen($strDirective) - 2);

					else
						return false;
				}
			}
			
			// If we made it here, then the directives are either null or correctly formed
			return true;
		}



		////////////////////////////
		// Block-Specific Processors
		////////////////////////////

		protected static function ProcessHeading1($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h1%s>%s</h1>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessHeading2($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h2%s>%s</h2>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessHeading3($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h3%s>%s</h3>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessHeading4($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h4%s>%s</h4>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessHeading5($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h5%s>%s</h5>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessHeading6($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h6%s>%s</h6>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessBlockQuote($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<blockquote%s>%s</blockquote>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessBlockCode($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<div class=\"code\"%s><code><pre>%s</pre></code></div>\n\n", $strStyle, QApplication::HtmlEntities($strBlockContent));
		}

		protected static function ProcessParagraph($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<p%s>%s</p>\n\n", $strStyle, QTextStyleInline::Process($strBlockContent));
		}

		protected static function ProcessListBlock($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';

			return QTextStyleBlock::ListBlockRecursion($strBlockContent, $strBlockIdentifier, $strStyle, $strOptions);
		}



		////////////////////////////////////
		// ListBlock-specific Helper Methods
		////////////////////////////////////

		protected static function ListBlockRecursion($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if (QString::FirstCharacter($strBlockIdentifier) == '#') $strTag = 'ol';
			else $strTag = 'ul';

			$strToReturn = sprintf("<%s%s>\n", $strTag, $strStyle);
			$strListItemArray = explode("\n" . $strBlockIdentifier . ' ', $strBlockContent);
			
			foreach ($strListItemArray as $strListItem) {
				$strToReturn .= sprintf('<li>' . QTextStyleBlock::ListBlockItem($strListItem, $strBlockIdentifier) . "</li>\n");
			}

			$strToReturn .= sprintf("</%s>\n\n", $strTag);
			return $strToReturn;
		}

		protected static function ListBlockItem($strListItemContent, $strBlockIdentifier) {
			// Build pattern to identify sublist
			$intBlockIdentifierLength = strlen($strBlockIdentifier);
			$strPattern = sprintf('/\\n(%s|%s) /', str_repeat('\\#', $intBlockIdentifierLength+1), str_repeat('\\*', $intBlockIdentifierLength+1));

			$strToReturn = null;
			preg_match($strPattern, $strListItemContent, $strMatches);
			if (count($strMatches) >= 1) {
				$intPosition = strpos($strListItemContent, $strMatches[0]);
				$strToReturn .= QTextStyleInline::Process(substr($strListItemContent, 0, $intPosition));
				$strListItemContent = substr($strListItemContent, $intPosition + strlen($strMatches[0]));

				$strToReturn .= QTextStyleBlock::ListBlockRecursion($strListItemContent, $strMatches[1]);
			} else {
				$strToReturn .= QTextStyleInline::Process($strListItemContent);
			}

			return $strToReturn;
		}
	}

	class QTextStyleBlock extends QTextStyleBlockBase {
		protected static function ProcessImage($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			$strPath = WikiItem::SanitizeForPath($strBlockContent, $intWikiItemTypeId);
			$strFullPath = WikiItem::GenerateFullPath($strPath, WikiItemType::Image);
			
			switch (trim($strStyle)) {
				case 'text-align:left;':
					$strStyle = 'Left';
					break;
				default:
					$strStyle = 'Right';
					break;
			}

			return sprintf('<div class="wikiThumb%s"><a href="/wiki%s"><img src="/wiki/view_thumb.php%s"/></a></div>' . "\n\n", $strStyle, $strFullPath, $strPath);
		}
	}
?>