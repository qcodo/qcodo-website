<?php 
	class QTextStyleBase extends QBaseClass {
		const KeyDefault = 'default';
		const KeyEnd = 'end';
		const KeyAlpha = 'alpha';
		const KeyNumeric = 'numeric';
		const KeyAlphaNumeric = 'alphanumeric';

		const StateStart = 'StateStart';
		const StateText = 'StateText';
		const StateSpace = 'StateSpace';
		const StateLineBreak = 'StateLineBreak';
		const StateStartQuote = 'StateStartQuote';
		const StateStartQuoteStartQuote = 'StateStartQuoteStartQuote';
		const StateEndQuote = 'StateEndQuote';
		const StateColon = 'StateColon';
		const StateUrlProtocol = 'StateUrlProtocol';
		const StateUrlLocation = 'StateUrlLocation';
		const StateCode = 'StateCode';
		const StateImage = 'StateImage';
		const StateStrong = 'StateStrong';
		const StateEmphasis = 'StateEmphasis';

		//                              ([A-Za-z][A-Za-z0-9]*)  -  start of the pattern -- any block of text must be identified
		//                                                         with a code (e.g. p, h1, h3, bq, etc.)
		//                                                    (<|<>|>|=)?  -  optional text-align modifier
		//                                                                 [{\\[]  -  style/option directives  -  [}\\]]
		//                              the content of the directive, itself  -  [A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*
		//                                            all block definitions must end with a period and then whitesapce  -  \\.( |\\n)
		const PatternBlock = '/([A-Za-z][A-Za-z0-9]*)(<|<>|>|=)?(([{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]])*)\\.( |\\n)/';

		//                         ([*#])  -  start of the pattern -- any list must be identified with a * or #
		//                                 [{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]]  -  optional directives (same as above)
		//               all list-based block definitions must end with a single space  -  (space)
		const PatternListBlock = '/([*#])(([{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]])*) /';
		
		public static $BlockProcessorArray = array(
			'p' => 'ProcessParagraph',
			'h1' => 'ProcessHeading1',
			'h2' => 'ProcessHeading2',
			'h3' => 'ProcessHeading3',
			'h4' => 'ProcessHeading4',
			'h5' => 'ProcessHeading5',
			'h6' => 'ProcessHeading6',
			'bq' => 'ProcessBlockQuote',
			'bc' => 'ProcessBlockCode',
			'#' => 'ProcessListBlock',
			'*' => 'ProcessListBlock',
			QTextStyle::KeyDefault => 'ProcessParagraph');

		public static $BlockEndMarkerArray = array(
			'bc' => "\n.bc\n\n",
			QTextStyle::KeyDefault => "\n\n");





		public static $UrlProtocolArray = array(
			'http' => true,
			'https' => true,
			'ftp' => true);

		public static $StateRulesArray = array(
			self::StateStart => array(
				'"' => array(
					array('CommandStatePush', self::StateText),
					array('CommandStatePush', self::StateStartQuote),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePush', self::StateText)),
				QTextStyle::KeyEnd => array(
					array('CommandStatePop'))
			),
			self::StateText => array(
				'"' => array(
					array('CommandStatePush', self::StateEndQuote),
					array('CommandContentPop')),
				' ' => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateSpace),
					array('CommandContentPop')),
				"\n" => array(
					array('CommandBufferAdd', '<br/>'),
					array('CommandStatePush', self::StateLineBreak),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessText'))
			),
			self::StateSpace => array(
				'"' => array(
					array('CommandStatePop'),
					array('CommandStatePush', self::StateStartQuote),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePop')),
				QTextStyle::KeyEnd => array(
					array('CommandStatePop'))
			),
			self::StateLineBreak => array(
				'"' => array(
					array('CommandStatePop'),
					array('CommandStatePush', self::StateStartQuote),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePop')),
				QTextStyle::KeyEnd => array(
					array('CommandStatePop'))
			),
			self::StateStartQuote => array(
				'"' => array(
					array('CommandStatePush', self::StateStartQuoteStartQuote),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePush', self::StateText)),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessEndQuote'))
			),
			self::StateStartQuoteStartQuote => array(
				'"' => array(
					array('CommandStatePush', self::StateStartQuoteStartQuote),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePush', self::StateText)),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessStartQuoteStartQuote'))
			),
			self::StateEndQuote => array(
				'"' => array(
					array('CommandCallProcessor', 'ProcessEndQuote'),
					array('CommandStatePush', self::StateEndQuote),
					array('CommandContentPop')),
				':' => array(
					array('CommandStatePush', self::StateColon),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandCallProcessor', 'ProcessEndQuote')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessEndQuote'))
			),
			self::StateColon => array(
				':' => array(
					array('CommandCallProcessor', 'ProcessUrl'),
					array('CommandContentPop')),
				QTextStyle::KeyAlpha => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandCallProcessor', 'ProcessColon')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessColon'))
			),
			self::StateUrlLocation => array(
				' ' => array(
					array('CommandCallProcessor', 'ProcessUrlLocation')),
				"\n" => array(
					array('CommandCallProcessor', 'ProcessUrlLocation')),
				QTextStyle::KeyDefault => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessUrlLocation'))
			)
		);
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
	//		protected static function FinishStateEndQuote($chrCurrent) {
//			self::$objBufferStack->Pop();
//			self::$objStateStack->Pop();
//			
//			$strBuffer = '&ldquo;' . self::$objBufferStack->Pop() . '&rdquo;' . $chrCurrent;
//			self::$objStateStack->Pop();
//
//			self::$objBufferStack->Push(self::$objBufferStack->Pop() . $strBuffer);
//		}
//		);

		public static function DisplayAsHtml($strContent) {
			// Let's get started
			$strResult = null;

			// Normalize all linebreaks and tabs
			$strContent = str_replace("\r\n", "\n", $strContent);
			$strContent = str_replace("\t", "    ", $strContent);

			while ($strContent) {
				// See if we are declaring a special block
				$strMatches = array();

				// Any Blank Lines get processed as such
				if (QString::FirstCharacter($strContent) == "\n") {
					$strContent = substr($strContent, 1);
					$strResult .= "<br/>\n";

				// Any Blocks matched by the PatternBlock regexp should be processed as a block
				} else if (preg_match(self::PatternBlock, $strContent, $strMatches) &&
					(count($strMatches) >= 3) &&
					(($strProcessorResult = QTextStyleBlock::Process($strMatches, $strContent)) !== false)) {
					$strResult .= $strProcessorResult;

				// Any ListBlocks matched by the PatternListBlock regexp should be processed as a listblock (uses the same QTSBP::Process method)
				} else if (preg_match(self::PatternListBlock, $strContent, $strMatches) &&
					(count($strMatches) >= 3) &&
					(($strProcessorResult = QTextStyleBlock::Process($strMatches, $strContent)) !== false)) {
					$strResult .= $strProcessorResult;

				// Finally, anything that doesn't match any of the above will be processed as "Default"
				} else {
					$strContent = QTextStyle::KeyDefault . '. ' . $strContent;
				}
			}

			// Return the resulting HTML
			return $strResult;
		}
	}

	class QTextStyle extends QTextStyleBase {
	}
?>