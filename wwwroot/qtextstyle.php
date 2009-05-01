<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');

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
			'DEFAULT' => 'ProcessParagraph');

		const StateText = 1;
		const StateNewLine = 2;
		const StateTag = 3;
		const StateStar = 4;
		const StateBulletedList = 5;
		const StateBulletedListItem = 6;
		const StateCode = 7;
		
		protected static function Run($strContent) {
			// Pull Class Variables
			$strBlockProcedureArray = self::GetValue('strBlockProcedureArray');

			// Reset teh stacks
			self::$objStateStack = new QStack();
			self::$objStateStack->Push(self::StateText);
			self::$objStateStack->Push(self::StateNewLine);
			self::$strBufferArray = array();
			$strToReturn = null;

			// Normalize all linebreaks
			$strContent = str_replace("\r\n", "\n", $strContent);

			while ($strContent) {
				switch (self::$objStateStack->PeekLast()) {
					case self::StateNewLine:
						// See if we are declaring a special block
						$strPattern = '/([A-Za-z][A-Za-z0-9]*)(([{\\[][A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*[}\\]])*)\\. /';
						preg_match($strPattern, $strContent, $strMatches);
//var_dump($strMatches);

						$blnValidMatch = false;

						if ((count($strMatches) >= 3) &&
							($strBlockCommand = $strMatches[0]) && ($strBlockIdentifier = strtolower($strMatches[1])) &&
							(strpos($strContent, $strBlockCommand) === 0) &&
							(array_key_exists($strBlockIdentifier, $strBlockProcedureArray))) {

							// Calculate length for the entire block command
							$intBlockCommandLength = strlen($strBlockCommand);

							// Pull the content for this block
							if (($intPosition = strpos($strContent, "\n\n")) !== false) {
								$strBlockContent = substr($strContent, $intBlockCommandLength, $intPosition - $intBlockCommandLength);
								$strNextContent = substr($strContent, strlen($strBlockCommand . $strBlockContent) + 2);
							} else {
								$strBlockContent = substr($strContent, $intBlockCommandLength);
								$strNextContent = null;
							}
	
							// Pull Directives
							$strStyle = null;
							$strOptions = null;
							$blnDirectiveFailed = false;

							if ($strDirectives = $strMatches[2]) {
								$strDirectives = preg_replace('/([\\}\\]])([\\{\\[])/', '$1\\\\$2', $strDirectives);
								$strDirectives = explode('\\', $strDirectives);

								for ($intDirectiveIndex = 0; $intDirectiveIndex < count($strDirectives); $intDirectiveIndex++) {
									$strDirective = $strDirectives[$intDirectiveIndex];

									if ((QString::FirstCharacter($strDirective) == '{') &&
										(QString::LastCharacter($strDirective) == '}'))
										$strStyle = substr($strDirective, 1, strlen($strDirective) - 2);

									else if ((QString::FirstCharacter($strDirective) == '[') &&
											 (QString::LastCharacter($strDirective) == ']'))
										$strOptions = substr($strDirective, 1, strlen($strDirective) - 2);

									else
										$blnDirectiveFailed = true;
								}
							}

							if (!$blnDirectiveFailed) {
								$strToReturn .= self::CallMethod($strBlockProcedureArray[$strBlockIdentifier], $strBlockContent, $strStyle, $strOptions);
								$blnValidMatch = true;
								$strContent = $strNextContent;
							}
						}

						if (!$blnValidMatch) {
							
							if (($intPosition = strpos($strContent, "\n\n")) !== false) {
								$strBlockContent = substr($strContent, 0, $intPosition);
								$strContent = substr($strContent, strlen($strBlockContent) + 2);
							} else {
								$strBlockContent = $strContent;
								$strContent = null;
							}

							$strToReturn .= self::CallMethod($strBlockProcedureArray['DEFAULT'], $strBlockContent);
						}
						break;
					default:
						exit("OOPS");
				}
			}

			return $strToReturn;
		}
		
		protected static function ProcessHeading2($strBlockContent, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h2%s>%s</h2>\n\n", $strStyle, $strBlockContent);
		}
		
		protected static function ProcessHeading3($strBlockContent, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<h3%s>%s</h3>\n\n", $strStyle, $strBlockContent);
		}
		
		protected static function ProcessBlockQuote($strBlockContent, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			if ($strOptions == 'fr')
				$strBlockContent = 'In French, ' . $strBlockContent;
			return sprintf("<blockquote%s>%s</blockquote>\n\n", $strStyle, $strBlockContent);
		}
		
		protected static function ProcessParagraph($strBlockContent, $strStyle = null, $strOptions = null) {
			if ($strStyle) $strStyle = ' style="' . $strStyle . '"';
			return sprintf("<p%s>%s</p>\n\n", $strStyle, $strBlockContent);
		}
	}

//	class MyOwnVersion extends QTextStyle {
//		public static $strBlockProcArray = array('asdf' => 'GetLink');
//		public static function DisplayAsHtml($strContent) {
//			self::$Reflector = new ReflectionClass('MyOwnVersion');
//			return self::CallMethod('Run', $strContent);
//		}
//	}

	$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');
	$strHtml = QTextStyle::DisplayAsHtml($strContent);
//	$strHtml = QTextStyle::DisplayAsHtml('h2{font-size: 55px;}. asjdkfalksdf');
?>

	<h3 style="margin: 0;">Original</h3>
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 150px; padding: 10px;"><?php print(nl2br(htmlentities($strContent))); ?></div>
	<br/>
	<h3 style="margin: 0;">Source HTML</h3>
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 150px; padding: 10px;"><?php print(nl2br(htmlentities($strHtml))); ?></div>
	<br/>
	<h3 style="margin: 0;">Display HTML</h3>
	<div style="font: 11px arial; border: 1px solid black; overflow: auto; width: 800px; height: 150px; padding: 10px;"><?php print($strHtml); ?></div>
	