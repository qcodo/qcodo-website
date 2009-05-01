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
			'bc' => 'ProcessBlockCode');
		
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

			// Normalize all linebreaks
			$strContent = str_replace("\r\n", "\n", $strContent);

			switch (self::$objStateStack->PeekLast()) {
				case self::StateNewLine:
					// See if we are declaring a special block
					$strPattern = '/([A-Za-z][A-Za-z0-9]*)({[A-Za-z0-9:;,._" \'\\(\\)\\/\\-]*})?\\. /';
					preg_match($strPattern, $strContent, $strMatches);
var_dump($strMatches);
					if ((count($strMatches) >= 2) &&
						($strBlockCommand = $strMatches[0]) && ($strBlockIdentifier = strtolower($strMatches[1])) &&
						(strpos($strContent, $strBlockCommand) === 0) &&
						(array_key_exists($strBlockIdentifier, $strBlockProcedureArray))) {

						// Calculate length for the entire block command
						$intBlockCommandLength = strlen($strBlockCommand);

						// Pull the content for this block
						if (($intPosition = strpos($strContent, "\n\n")) !== false) {
							$strBlockContent = substr($strContent, $intBlockCommandLength, $intPosition - $intBlockCommandLength);
						} else {
							$strBlockContent = substr($strContent, $intBlockCommandLength);
						}

						// Pull Style Directives
						if (array_key_exists(2, $strMatches)) {
							$strStyleDirective = $strMatches[2];
							$strStyleDirective = substr($strStyleDirective, 1, strlen($strStyleDirective) - 2);
						} else {
							$strStyleDirective = null;
						}

						return self::CallMethod($strBlockProcedureArray[$strBlockIdentifier], $strBlockContent, $strStyleDirective);
					} else {
						return "NONE";
					}
					break;
				default:
					exit("OOPS");
			}
			$strStuff = var_export(self::GetValue('strBlockProcedureArray'));
			return $strStuff . ' - ' . $strContent;
		}
		
		protected static function ProcessHeading2($strBlockContent, $strStyleDirective) {
			if ($strStyleDirective) $strStyleDirective = ' style="' . $strStyleDirective . '"';
			return sprintf('<h2%s>%s</h2>', $strStyleDirective, $strBlockContent);
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
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print(nl2br(htmlentities($strContent))); ?></div>
	<br/>
	<h3 style="margin: 0;">Source HTML</h3>
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print(nl2br(htmlentities($strHtml))); ?></div>
	<br/>
	<h3 style="margin: 0;">Display HTML</h3>
	<div style="font: 11px arial; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print($strHtml); ?></div>
	