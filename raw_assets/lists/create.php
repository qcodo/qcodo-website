<?php
	$strContents = file_get_contents(dirname(__FILE__) . '/firstNames.txt');

	class Foo {
		static public $FooBar = array('1', '2');
	}

	$strMaleArray = array();
	$strFemaleArray = array();
	$blnMaleFlag = false;
	$strRecent = 'Aaaa';

	foreach (explode("\n", $strContents) as $strName) {
		$strName = trim($strName);

		if ($strName[0] == '-')
			$blnMaleFlag = true;
		else {
			if ($strRecent[0] != $strName[0])
				$blnMaleFlag = false;

			if ($blnMaleFlag)
				$strMaleArray[] = $strName;
			else
				$strFemaleArray[] = $strName;

			$strRecent = $strName;
		}
	}

	print "Male - " . count($strMaleArray) . "\r\n";
	print "Female - " . count($strFemaleArray) . "\r\n";

	$strContent = '		static public $MaleFirstNameArray = array(';
	$intCount = 4;
	foreach ($strMaleArray as $strName) {
		$strContent .= "'" . $strName . "',";
		if ($intCount % 10)
			$strContent .= ' ';
		else
			$strContent .= "\r\n\t\t\t";
		$intCount++;
	}
	$strContent = substr($strContent, 0, strlen($strContent) - 2);
	$strContent .= ');';
	file_put_contents(dirname(__FILE__) . '/male.txt', $strContent);

	$strContent = '		static public $FemaleFirstNameArray = array(';
	$intCount = 4;
	foreach ($strFemaleArray as $strName) {
		$strContent .= "'" . $strName . "',";
		if ($intCount % 10)
			$strContent .= ' ';
		else
			$strContent .= "\r\n\t\t\t";
		$intCount++;
	}
	$strContent = substr($strContent, 0, strlen($strContent) - 2);
	$strContent .= ');';
	file_put_contents(dirname(__FILE__) . '/female.txt', $strContent);

	$strContent = '		static public $LastNameArray = array(';
	$intCount = 4;
	foreach (explode("\n", file_get_contents(dirname(__FILE__) . '/lastNames.txt')) as $strName) {
		$strName = trim(str_replace("'", "\\'", $strName));
		$strContent .= "'" . $strName . "',";
		if ($intCount % 10)
			$strContent .= ' ';
		else
			$strContent .= "\r\n\t\t\t";
		$intCount++;
	}
	$strContent = substr($strContent, 0, strlen($strContent) - 2);
	$strContent .= ');';
	file_put_contents(dirname(__FILE__) . '/last.txt', $strContent);

	$strContent = '		static public $WordArray = array(';
	$intCount = 4;
	foreach (explode("\n", file_get_contents(dirname(__FILE__) . '/wordList.txt')) as $strName) {
		$strName = trim(str_replace("'", "\\'", $strName));
		$strName = strtolower($strName);
		$strContent .= "'" . $strName . "',";
		if ($intCount % 10)
			$strContent .= ' ';
		else
			$strContent .= "\r\n\t\t\t";
		$intCount++;
	}
	$strContent = substr($strContent, 0, strlen($strContent) - 2);
	$strContent .= ');';
	file_put_contents(dirname(__FILE__) . '/words.txt', $strContent);
?>