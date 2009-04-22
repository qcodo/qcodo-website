<?php
	require '/var/www/qcodo-website/_devtools_cli/cli_prepend.inc.php';
//	foreach (DateTimeZone::listIdentifiers() as $strName)
//		if (strpos($strName, '/') !== false)
//			print "INSERT INTO timezone(name) VALUES ('" . $strName . "');\r\n";

/*	foreach (DateTimeZone::listAbbreviations() as $strKey=>$strArray) {
		$blnPrint = false;
		foreach ($strArray as $strTimeZone)
			if ($strTimeZone['timezone_id'] == 'America/Los_Angeles')
				$blnPrint = true;

		if ($blnPrint)
			print $strKey . "\r\n";

		if ($strKey == 'est') var_dump($strArray);
	}*/

	$dttNow = QDateTime::Now();
	print ($dttNow->__toString('MMM D - hh:mm:ss z ttt tttt')) . "\r\n";

	$dttNow->ConvertToTimezone('America/Chicago');
	print ($dttNow->__toString('MMM D - hh:mm:ss z ttt tttt')) . "\r\n";
	
	
	
	exit();
/*	for ($intIndex = 0; $intIndex < 10; $intIndex++)
		print
			QRandomDataGenerator::GenerateDateTime(
				new QDateTime('2008-01-01'),
				QDateTime::Now()
			)->__toString('YYYY-MM-DD hhhh:mm:ss') . "\r\n";
*/
	for ($intIndex = 0; $intIndex < 10; $intIndex++) {
		$strFirstName = QRandomDataGenerator::GenerateFirstName();
		$strLastName = QRandomDataGenerator::GenerateLastName();
		$strEmail = QRandomDataGenerator::GenerateWebsiteUrl($strFirstName, $strLastName);
		print $strFirstName . ' ' . $strLastName . '  -  ' . $strEmail . "\r\n";
	}

//	print (wordwrap(QRandomDataGenerator::GenerateContent(5), 139)) . "\r\n";
?>