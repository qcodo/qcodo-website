<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');

	class QTextStyleBlock extends QBaseClass {
		
	}
	
	class QTextStyle extends QBaseClass {
		// These need to be overridden at a minimum
		

		public static function DisplayAsHtml($strContent) {
			self::$Reflector = new ReflectionClass('QTextStyle');
			return self::CallMethod('Run', $strContent);
		}


		// These should never be changed
			protected static $Reflector;
			
			protected static function CallMethod($strMethodName) {
				$arrParameters = func_get_args();
				array_shift($arrParameters);
				return call_user_func_array(array(self::$Reflector->getName(), $strMethodName), $arrParameters);
			}
	
			protected static function GetValue($strProperty) {
				return self::$Reflector->getStaticPropertyValue($strProperty);
			}
		/////////////////////////////////


		// This is the logic
		protected static $objStateStack;
		protected static $strBufferArray;
		
		protected static $strContent;
		protected static $strResult;

		public static $strBlockProcedureArray = array(
			'p' => 'ProcessParagraph',
			'h1' => 'ProcessHeading1',
			'h2' => 'ProcessHeading2',
			'h3' => 'ProcessHeading3',
			'h4' => 'ProcessHeading4',
			'h5' => 'ProcessHeading5',
			'h6' => 'ProcessHeading6',
			'bq' => 'ProcessBlockQuote',
			'bc' => 'ProcessBlockCode',
			'#' => 'ProcessList',
			'*' => 'ProcessList',
			'default' => 'ProcessParagraph');

		public static $strBlockEndMarkerArray = array(
			'bc' => "\n.bc\n\n",
			'default' => "\n\n");

		const StateText = 1;
		const StateNewLine = 2;
		const StateTag = 3;
		const StateStar = 4;
		const StateBulletedList = 5;
		const StateBulletedListItem = 6;
		const StateCode = 7;

		//                              ([A-Za-z][A-Za-z0-9]*)  -  start of the pattern -- any block of text must be identified
		//                                                         with a code (e.g. p, h1, h3, bq, etc.)
		//                                                    (<|<>|>|=)?  -  optional text-align modifier
		//                                                                 [{\\[]  -  style/option directives  -  [}\\]]
		//                              the content of the directive, itself  -  [A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*
		//                                            all block definitions must end with a period and then whitesapce  -  \\.( |\\n)
		const PatternBlockProcedure = '/([A-Za-z][A-Za-z0-9]*)(<|<>|>|=)?(([{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]])*)\\.( |\\n)/';

		//                         ([*#])  -  start of the pattern -- any list must be identified with a * or #
		//                                 [{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]]  -  optional directives (same as above)
		//               all list-based block definitions must end with a single space  -  (space)
		const PatternBlockList = '/([*#])(([{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]])*) /';

		/**
		 * @param string[] $strMatches
		 * @return boolean whether or not something was actually processed
		 */
		protected static function ProcessBlock($strMatches) {
			// Pull Class Variables
			$strBlockProcedureArray = self::GetValue('strBlockProcedureArray');
			$strBlockEndMarkerArray = self::GetValue('strBlockEndMarkerArray');
			
			// Define components of a BlockCommand Call
			$strBlockCommand = $strMatches[0];
			$strBlockIdentifier = strtolower($strMatches[1]);
			$strPosition = $strMatches[2];
			$strDirectives = $strMatches[3];

			if (strpos(self::$strContent, $strBlockCommand) !== 0) return false;
			if (!array_key_exists($strBlockIdentifier, $strBlockProcedureArray)) return false;

			if (array_key_exists($strBlockIdentifier, $strBlockEndMarkerArray)) {
				$strEndMarker = $strBlockEndMarkerArray[$strBlockIdentifier];
			} else {
				$strEndMarker = $strBlockEndMarkerArray['default'];
			}
			$intEndMarkerLength = strlen($strEndMarker);

			// Calculate length for the entire block command
			$intBlockCommandLength = strlen($strBlockCommand);

			// Pull the content for this block
			if (($intPosition = strpos(self::$strContent, $strEndMarker)) !== false) {
				$strBlockContent = substr(self::$strContent, $intBlockCommandLength, $intPosition - $intBlockCommandLength);
				$strRemainingContent = substr(self::$strContent, strlen($strBlockCommand . $strBlockContent) + $intEndMarkerLength);
			} else {
				$strBlockContent = substr(self::$strContent, $intBlockCommandLength);
				$strRemainingContent = null;
			}

			// Figure Out Initial Style
			switch ($strPosition) {
				case '<':
					$strStyle = 'text-align:left;';
					break;
				case '>':
					$strStyle = 'text-align:right;';
					break;
				case '<>':
					$strStyle = 'text-align:justify;';
					break;
				case '=':
					$strStyle = 'text-align:center;';
					break;
				default:
					$strStyle = null;
			}
			// Pull Directives
			$strOptions = null;

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

			self::$strResult .= self::CallMethod($strBlockProcedureArray[$strBlockIdentifier], $strBlockContent, $strBlockIdentifier, $strStyle, $strOptions);
			self::$strContent = $strRemainingContent;
			return true;
		}

		protected static function Run($strContent) {
			// Reset teh stacks
			self::$objStateStack = new QStack();
			self::$objStateStack->Push(self::StateText);
			self::$objStateStack->Push(self::StateNewLine);
			self::$strBufferArray = array();
			self::$strResult = null;

			// Normalize all linebreaks
			self::$strContent = str_replace("\r\n", "\n", $strContent);

			// Normalize all tabs
			self::$strContent = str_replace("\t", "    ", self::$strContent);

			while (self::$strContent) {
				switch (self::$objStateStack->PeekLast()) {
					case self::StateNewLine:
						// See if we are declaring a special block
						$blnValidMatch = false;
						$strMatches = array();

						if (QString::FirstCharacter(self::$strContent) == "\n") {
							self::$strContent = substr(self::$strContent, 1);
							self::$strResult .= "<br/>\n";

						} else if (preg_match(self::PatternBlockProcedure, self::$strContent, $strMatches) &&
							(count($strMatches) >= 4) &&
							(self::CallMethod('ProcessBlock', $strMatches))) {

						} else if (preg_match(self::PatternBlockList, self::$strContent, $strMatches) &&
							(count($strMatches) >= 4) &&
							(self::CallMethod('ProcessBlock', $strMatches))) {

						} else {
							self::$strContent = 'default. ' . self::$strContent;
						}
						
						break;
					default:
						exit("OOPS");
				}
			}

			return self::$strResult;
		}

		protected static function ProcessHeading1($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h1%s>%s</h1>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessHeading2($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h2%s>%s</h2>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessHeading3($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h3%s>%s</h3>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessHeading4($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h4%s>%s</h4>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessHeading5($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h5%s>%s</h5>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessHeading6($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h6%s>%s</h6>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessBlockQuote($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<blockquote%s>%s</blockquote>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}

		protected static function ProcessBlockCode($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<div class=\"code\"%s><code><pre>%s</pre></code></div>\n\n", $strStyle, QApplication::HtmlEntities($strBlockContent));
		}

		protected static function ProcessParagraph($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<p%s>%s</p>\n\n", $strStyle, self::CallMethod('ProcessLine', $strBlockContent));
		}
		
		protected static function ProcessList($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';

			return self::ProcessListRecursion($strBlockContent, $strBlockIdentifier, $strStyle, $strOptions);
		}

		protected static function ProcessListRecursion($strBlockContent, $strBlockIdentifier, $strStyle = null, $strOptions = null) {
			if (QString::FirstCharacter($strBlockIdentifier) == '#') $strTag = 'ol';
			else $strTag = 'ul';

			$strToReturn = sprintf("<%s%s>\n", $strTag, $strStyle);
			$strListItemArray = explode("\n" . $strBlockIdentifier . ' ', $strBlockContent);
			
			foreach ($strListItemArray as $strListItem) {
				$strToReturn .= sprintf('<li>' . self::ProcessListItem($strListItem, $strBlockIdentifier) . "</li>\n");
			}

			$strToReturn .= sprintf("</%s>\n\n", $strTag);
			return $strToReturn;
		}

		protected static function ProcessListItem($strListItemContent, $strBlockIdentifier) {
			// Build pattern to identify sublist
			$intBlockIdentifierLength = strlen($strBlockIdentifier);
			$strPattern = sprintf('/\\n(%s|%s) /', str_repeat('\\#', $intBlockIdentifierLength+1), str_repeat('\\*', $intBlockIdentifierLength+1));

			$strToReturn = null;
			preg_match($strPattern, $strListItemContent, $strMatches);
			if (count($strMatches) >= 1) {
				$intPosition = strpos($strListItemContent, $strMatches[0]);
				$strToReturn .= self::CallMethod('ProcessLine', substr($strListItemContent, 0, $intPosition));
				$strListItemContent = substr($strListItemContent, $intPosition + strlen($strMatches[0]));

				$strToReturn .= self::ProcessListRecursion($strListItemContent, $strMatches[1]);
			} else {
				$strToReturn .= self::CallMethod('ProcessLine', $strListItemContent);
			}
			
			return $strToReturn;
		}

		protected static function ProcessLine($strContent) {
			return nl2br(htmlentities($strContent));
		}
	}

//	class MyOwnVersion extends QTextStyle {
//		public static $strBlockProcArray = array('asdf' => 'GetLink');
//		public static function DisplayAsHtml($strContent) {
//			self::$Reflector = new ReflectionClass('MyOwnVersion');
//			return self::CallMethod('Run', $strContent);
//		}
//	}

	if (array_key_exists('sample', $_POST))
		$strContent = $_POST['sample'];
	else
		$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');

	$strHtml = QTextStyle::DisplayAsHtml($strContent);
//	$strHtml = QTextStyle::DisplayAsHtml('h2{font-size: 55px;}. asjdkfalksdf');
?>

<style>
	div.code { background-color: #dfe; padding: 1px 12px; margin-left: 25px; overflow: auto; width: 700px; }
	h3 {margin: 0;}
	.box { font: 11px lucida console; border: 1px solid black; overflow: auto; width: 450px; height: 500px; padding: 10px; margin-bottom: 12px;}
	textarea.box {padding: 0; width: 800px; height: 150px;}
</style>

<form method="post" action="/qtextstyle.php">
	<h3>Original</h3>
	<textarea class="box" id="sample" name="sample"><?php _p($strContent); ?></textarea> <input type="submit" style="position: relative; top: -25px; left: 25px;">
	<br/>
	<div style="float: left;">
		<h3>Source HTML</h3>
		<div class="box"><?php print(nl2br(str_replace(' ', '&nbsp;', htmlentities($strHtml)))); ?></div>
	</div>
	<div style="float: left; margin-left: 25px;">
	<h3>Display HTML</h3>
	<div class="box" style="font-family: arial;"><?php print($strHtml); ?></div>
	</div>
</form>