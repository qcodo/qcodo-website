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
		const StateWordStartHint = 'StateWordStartHint';
		const StateLineBreak = 'StateLineBreak';
		const StateStartQuote = 'StateStartQuote';
		const StateStartQuoteStartQuote = 'StateStartQuoteStartQuote';
		const StateEndQuote = 'StateEndQuote';
		const StateColon = 'StateColon';
		const StateLinkProtocol = 'StateLinkProtocol';
		const StateLinkLocation = 'StateLinkLocation';
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





		public static $LinkProtocolArray = array(
			'http' => 'ProcessLinkLocationUrl',
			'https' => 'ProcessLinkLocationUrl',
			'ftp' => 'ProcessLinkLocationUrl',);

		public static $StateRulesArray = array(
			self::StateStart => array(
				QTextStyle::KeyDefault => array(
					array('CommandStatePush', self::StateText),
					array('CommandStatePush', self::StateWordStartHint)),
				QTextStyle::KeyEnd => array(
					array('CommandStatePop'))
			),
			self::StateText => array(
				'"' => array(
					array('CommandIfStateExistsStatePushElseBufferAdd', self::StateStartQuote, self::StateEndQuote, '&rdquo;'),
					array('CommandContentPop')),
				'<' => array(
					array('CommandBufferAdd', '&lt;'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				'>' => array(
					array('CommandBufferAdd', '&gt;'),
					array('CommandContentPop')),
				'&' => array(
					array('CommandBufferAdd', '&amp;'),
					array('CommandContentPop')),
				' ' => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandStatePush', self::StateSpace),
					array('CommandContentPop')),
				"\n" => array(
					array('CommandBufferAdd', '<br/>'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				"(" => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				"[" => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				"{" => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				"=" => array(
					array('CommandBufferAddFromContent'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessText'))
			),
			self::StateSpace => array(
				' ' => array(
					array('CommandStatePop'),
					array('CommandStatePop'),
					array('CommandBufferAdd', '&nbsp;'),
					array('CommandStatePush', self::StateWordStartHint),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePop')),
				QTextStyle::KeyEnd => array(
					array('CommandStatePop'))
			),
			self::StateWordStartHint => array(
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
				' ' => array(
					array('CommandStatePop'),
					array('CommandBufferAdd', '&quot;')),
				QTextStyle::KeyDefault => array(
					array('CommandStatePush', self::StateText)),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessStartQuote'))
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
					array('CommandCallProcessor', 'ProcessLink'),
					array('CommandContentPop')),
				QTextStyle::KeyAlpha => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyDefault => array(
					array('CommandCallProcessor', 'ProcessColon')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessColon'))
			),
			self::StateLinkLocation => array(
				' ' => array(
					array('CommandCallProcessor', 'ProcessLinkLocation')),
				"\n" => array(
					array('CommandCallProcessor', 'ProcessLinkLocation')),
				QTextStyle::KeyDefault => array(
					array('CommandBufferAddFromContent'),
					array('CommandContentPop')),
				QTextStyle::KeyEnd => array(
					array('CommandCallProcessor', 'ProcessLinkLocation'))
			)
		);

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