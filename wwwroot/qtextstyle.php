<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');
	set_time_limit(3);
	define('DEBUG', 1);
	
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
		/**
		 * @var QStack
		 */
		protected static $objStateStack;
		/**
		 * @var QStack
		 */
		protected static $objBufferStack;
		
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
			$strDirectives = array_key_exists(3, $strMatches) ? $strMatches[3] : null;

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
			// Let's get started
			self::$strResult = null;

			// Normalize all linebreaks
			self::$strContent = str_replace("\r\n", "\n", $strContent);

			// Normalize all tabs
			self::$strContent = str_replace("\t", "    ", self::$strContent);

			while (self::$strContent) {
				// See if we are declaring a special block
				$blnValidMatch = false;
				$strMatches = array();

				if (QString::FirstCharacter(self::$strContent) == "\n") {
					self::$strContent = substr(self::$strContent, 1);
					self::$strResult .= "<br/>\n";

				} else if (preg_match(self::PatternBlockProcedure, self::$strContent, $strMatches) &&
					(count($strMatches) >= 3) &&
					(self::CallMethod('ProcessBlock', $strMatches))) {

				} else if (preg_match(self::PatternBlockList, self::$strContent, $strMatches) &&
					(count($strMatches) >= 3) &&
					(self::CallMethod('ProcessBlock', $strMatches))) {

				} else {
					self::$strContent = 'default. ' . self::$strContent;
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

		const CommandStatePush = 'CommandStatePush';
		const CommandStatePop = 'CommandStatePop';
		const CommandContentPop = 'CommandContentPop';
		const CommandBufferAdd = 'CommandBufferAdd';
		const CommandBufferAddFromContent = 'CommandBufferAddFromContent';
		const CommandCallMethod = 'CommandCallMethod';

		const StateStart = 'StateStart';
		const StateText = 'StateText';
		const StateSpace = 'StateSpace';
		const StateLineBreak = 'StateLineBreak';
		const StateStartQuote = 'StateStartQuote';
		const StateStartQuoteStartQuote = 'StateStartQuoteStartQuote';
		const StateEndQuote = 'StateEndQuote';
		const StateColon = 'StateColon';
		const StateCode = 'StateCode';
		const StateImage = 'StateImage';
		const StateStrong = 'StateStrong';
		const StateEmphasis = 'StateEmphasis';

		protected static function DumpStack($strTitle = null, $blnExit = false) {
			if ($strTitle) $strTitle = ' - ' . str_replace(' ', '&nbsp;', htmlentities($strTitle));

			$strColor = '#' . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f'))) . chr(rand(ord('a'), ord('f')));

			print '<div style="font: 12px arial; font-weight: bold; color: ' . $strColor . '; background-color: black; padding: 5px;">STACK' . $strTitle . '</div>';
			
			print '<div style="padding: 5px; background-color: ' . $strColor . '; border: 1px solid #666; margin-bottom: 12px;">';
		
			for ($intIndex = 0; $intIndex < self::$objStateStack->Size(); $intIndex++) {
				print '<div style="font: 12px arial; font-weight: bold; float: left; width: 150px; border-bottom: 1px solid #333; height: 16px;">';
				print self::$objStateStack->Peek($intIndex);
				print '</div>';
				print '<div style="float: left; font: 11px lucida console; border-bottom: 1px solid #333; height: 16px; width: 500px;">';
				$strData = nl2br(str_replace(' ', '&nbsp;', htmlentities(self::$objBufferStack->Peek($intIndex))));
				if (!$strData) print '<span style="color: #666;">n/a</span>'; else print $strData;
				print '</div><br clear="all"/>';
			}
			
			print '</div>';
//			print('<div style="height: 12px; background-color: black; padding: 4px; font: 12px arial; color: white; font-weight: bold; ">END OF STACK</div>');
			if ($blnExit) exit();
		}

		protected static function ProcessEndQuote() {
			// Can we find a matching StartQuote?
			$blnFoundStartQuote = false;
			for ($intStartQuotePosition = self::$objStateStack->Size() - 1; ($intStartQuotePosition >= 0 && !$blnFoundStartQuote); $intStartQuotePosition--) {
				if ((self::$objStateStack->Peek($intStartQuotePosition) == self::StateStartQuote) ||
					(self::$objStateStack->Peek($intStartQuotePosition) == self::StateStartQuoteStartQuote)) {
					$blnFoundStartQuote = true;
				}
			}

			self::$objStateStack->Pop();
			$strContent = '&rdquo;' . self::$objBufferStack->Pop();

			if ($blnFoundStartQuote) {
				while ((self::$objStateStack->PeekLast() != self::StateStartQuote) && (self::$objStateStack->PeekLast() != self::StateStartQuoteStartQuote)) {
					self::$objStateStack->Pop();
					$strContent = self::$objBufferStack->Pop() . $strContent;
				}
			}

			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop() . $strContent;

			if ($blnFoundStartQuote)
				$strContent = '&ldquo;' . $strContent;

			self::$objBufferStack->AppendStringToTop($strContent);
		}

		protected static function ProcessStartQuote() {
			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop();
			self::$objBufferStack->AppendStringToTop('&ldquo;' . $strContent);
		}

		protected static function ProcessStartQuoteStartQuote() {
			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop();
			self::$objBufferStack->AppendStringToTop('&rdquo;' . $strContent);
		}

		protected static function ProcessText() {
			self::$objStateStack->Pop();
			$strContent = self::$objBufferStack->Pop();
			self::$objBufferStack->AppendStringToTop($strContent);
		}

		protected static function ProcessColon() {
			self::$objStateStack->Pop();
			$strContent = ':' . self::$objBufferStack->Pop();

			self::$objStateStack->Push(self::StateText);
			self::$objBufferStack->Push($strContent);
		}

		protected static function ProcessUrl() {
			self::$objStateStack->Pop();
			$strContent = ':' . self::$objBufferStack->Pop();

			self::$objStateStack->Push(self::StateText);
			self::$objBufferStack->Push($strContent);
		}

		protected static $StateMachineArray = array(
			self::StateStart => array(
				'"' => array(self::CommandStatePush, self::StateText, self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
				'DEFAULT' => array(self::CommandStatePush, self::StateText),
				'END' => array(self::CommandStatePop)
			),
			self::StateText => array(
				'"' => array(self::CommandStatePush, self::StateEndQuote, self::CommandContentPop),
				' ' => array(self::CommandBufferAddFromContent, self::CommandStatePush, self::StateSpace, self::CommandContentPop),
				"\n" => array(self::CommandBufferAdd, '<br/>', self::CommandStatePush, self::StateLineBreak, self::CommandContentPop),
				'DEFAULT' => array(self::CommandBufferAddFromContent, self::CommandContentPop),
				'END' => array(self::CommandCallMethod, 'ProcessText')
			),
			self::StateSpace => array(
				'"' => array(self::CommandStatePop, self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
				'DEFAULT' => array(self::CommandStatePop),
				'END' => array(self::CommandStatePop)
			),
			self::StateLineBreak => array(
				'"' => array(self::CommandStatePop, self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
				'DEFAULT' => array(self::CommandStatePop),
				'END' => array(self::CommandStatePop)
			),
			self::StateStartQuote => array(
				'"' => array(self::CommandStatePush, self::StateStartQuoteStartQuote, self::CommandContentPop),
				'DEFAULT' => array(self::CommandStatePush, self::StateText),
				'END' => array(self::CommandCallMethod, 'ProcessStartQuote')
			),
			self::StateStartQuoteStartQuote => array(
				'"' => array(self::CommandStatePush, self::StateStartQuoteStartQuote, self::CommandContentPop),
				'DEFAULT' => array(self::CommandStatePush, self::StateText),
				'END' => array(self::CommandCallMethod, 'ProcessStartQuoteStartQuote')
			),
			self::StateEndQuote => array(
				'"' => array(self::CommandCallMethod, 'ProcessEndQuote', self::CommandStatePush, self::StateEndQuote, self::CommandContentPop),
				':' => array(self::CommandStatePush, self::StateColon, self::CommandContentPop),
				'DEFAULT' => array(self::CommandCallMethod, 'ProcessEndQuote'),
				'END' => array(self::CommandCallMethod, 'ProcessEndQuote')
			),
			self::StateColon => array(
				':' => array(self::CommandCallMethod, 'ProcessUrl', self::CommandContentPop),
				'ALPHA' => array(self::CommandBufferAddFromContent, self::CommandContentPop),
				'DEFAULT' => array(self::CommandCallMethod, 'ProcessColon'),
				'END' => array(self::CommandCallMethod, 'ProcessColon')
			)
			//			self::StateStart => array(
//				'"' => array(self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
//				'DEFAifULT' => array(self::CommandStatePush, self::StateText),
//				'END' => array(self::CommandStatePop)
//			),
//			self::StateSpace => array(
//				'"' => array(self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
//				'DEFAULT' => array(self::CommandStatePush, self::StateText),
//				'END' => array(self::CommandStatePop)
//			),
//			self::StateLineBreak => array(
//				'"' => array(self::CommandStatePush, self::StateStartQuote, self::CommandContentPop),
//				'DEFAULT' => array(self::CommandStatePush, self::StateText),
//				'END' => array(self::CommandStatePop)
//			),
//			self::StateText => array(
//				'"' => array(self::CommandStatePush, self::StateEndQuote, self::CommandContentPop),
//				'<' => array(self::CommandBufferAdd, '&lt;', self::CommandContentPop),
//				'>' => array(self::CommandBufferAdd, '&gt;', self::CommandContentPop),
//				"\n" => array(self::CommandStatePush, self::StateLineBreak, self::CommandContentPop),
//				' ' =>  array(self::CommandStatePush, self::StateSpace, self::CommandContentPop),
//				'DEFAULT' => array(self::CommandBufferAddFromContent, self::CommandContentPop),
//				'END' => array(self::CommandStatePop)
//			),
//			self::StateStartQuote => array(
//				'"' => array(self::CommandStatePush, self::StateStartQuote2, self::CommandContentPop),
//				'<' => array(self::CommandBufferAdd, '&lt;', self::CommandContentPop),
//				'>' => array(self::CommandBufferAdd, '&gt;', self::CommandContentPop),
//				"\n" =>  array(self::CommandBufferAdd, '<br/>'),
//				'DEFAULT' => array(self::CommandBufferAddFromContent, self::CommandContentPop),
//				'END' => array(self::CommandStatePop)
//			),
//			self::StateEndQuote => array(
//				'DEFAULT' => array(self::CommandBufferAddFromContent, self::CommandContentPop),
//				'END' => array(self::CommandStatePop)
//			),
		);

		protected static function ProcessLine($strContent) {
			// Reset teh stacks
			self::$objStateStack = new QStack();
			self::$objStateStack->Push(self::StateStart);

			self::$objBufferStack = new QStack();
			self::$objBufferStack->Push('');

			while (self::$objStateStack->Size()) {
				$arrStateMachine = self::$StateMachineArray[self::$objStateStack->PeekLast()];
				$chrCurrent = QString::FirstCharacter($strContent);

				if (!strlen($strContent))
					$strKey = 'END';
				else if (array_key_exists($chrCurrent, $arrStateMachine))
					$strKey = $chrCurrent;
				else if (array_key_exists('ALPHA', $arrStateMachine) && preg_match('/[A-Za-z]/', $chrCurrent))
					$strKey = 'ALPHA';
				else if (array_key_exists('NUMERIC', $arrStateMachine) && preg_match('/[0-9]/', $chrCurrent))
					$strKey = 'NUMERIC';
				else if (array_key_exists('ALPHANUMERIC', $arrStateMachine) && preg_match('/[A-Za-z0-9]/', $chrCurrent))
					$strKey = 'ALPHANUMERIC';
				else
					$strKey = 'DEFAULT';


				for ($intIndex = 0; $intIndex < count($arrStateMachine[$strKey]); $intIndex++) {
if (DEBUG) self::DumpStack($strContent . ' - [' . $chrCurrent . '] - Command(' . $strKey . ', ' . $intIndex . ') - ' . $arrStateMachine[$strKey][$intIndex]);
					switch ($arrStateMachine[$strKey][$intIndex]) {
						case self::CommandStatePush:
							$mixValue = $arrStateMachine[$strKey][$intIndex + 1];
							$intIndex++;
							self::$objStateStack->Push($mixValue);
							self::$objBufferStack->Push('');
							break;
						case self::CommandStatePop:
							self::$objStateStack->Pop();
							$strBuffer = self::$objBufferStack->Pop();
							break;
						case self::CommandContentPop:
							$strContent = substr($strContent, 1);
							break;
						case self::CommandBufferAdd:
							$mixValue = $arrStateMachine[$strKey][$intIndex + 1];
							$intIndex++;
							$strBuffer = self::$objBufferStack->Pop();
							$strBuffer .= $mixValue;
							self::$objBufferStack->Push($strBuffer);
							break;
						case self::CommandBufferAddFromContent:
							$strBuffer = self::$objBufferStack->Pop();
							$strBuffer .= $chrCurrent;
							self::$objBufferStack->Push($strBuffer);
							break;
						case self::CommandCallMethod:
							$mixValue = $arrStateMachine[$strKey][$intIndex + 1];
							$intIndex++;
							self::CallMethod($mixValue, $chrCurrent);
							break;
						default:
							exit('OOPS 2');
					}
				}
			}

			return $strBuffer;
		}

//		protected static function FinishStateEndQuote($chrCurrent) {
//			self::$objBufferStack->Pop();
//			self::$objStateStack->Pop();
//			
//			$strBuffer = '&ldquo;' . self::$objBufferStack->Pop() . '&rdquo;' . $chrCurrent;
//			self::$objStateStack->Pop();
//
//			self::$objBufferStack->Push(self::$objBufferStack->Pop() . $strBuffer);
//		}
	}

//	class MyOwnVersion extends QTextStyle {
//		public static $strBlockProcArray = array('asdf' => 'GetLink');
//		public static function DisplayAsHtml($strContent) {
//			self::$Reflector = new ReflectionClass('MyOwnVersion');
//			return self::CallMethod('Run', $strContent);
//		}
//	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>QTextStyle Development Harness</title>
<style>
	body { font: 11px arial; }
	div.code { background-color: #dfe; padding: 1px 12px; margin-left: 25px; overflow: auto; width: 700px; }
	h3 {margin: 0;}
	.box { font: 11px lucida console; border: 1px solid black; overflow: auto; width: 450px; height: 500px; padding: 10px; margin-bottom: 12px;}
	textarea.box {padding: 0; width: 800px; height: 150px;}
</style>
</head>
<body>

<h3 style="float: left;">Debug Stack</h3>
<div style="float: right; font-size: 10px; font-weight: normal;">
	<a href="#" onclick="document.getElementById('stack').style.height='500px'; return false;">Grow</a>
	&nbsp;|&nbsp;
	<a href="#" onclick="document.getElementById('stack').style.height='200px'; return false;">Shrink</a>
</div>
<br clear="all"/>
<div id="stack" style="height: 200px; overflow: auto; padding: 30px; border: 1px solid black; background-color: #ddd; margin-bottom: 12px; ">
<?php 
	if (array_key_exists('sample', $_GET))
		$strContent = $_GET['sample'];
	else if (array_key_exists('sample', $_POST))
		$strContent = $_POST['sample'];
	else
		$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');

	$strHtml = QTextStyle::DisplayAsHtml($strContent);
?>
</div>

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