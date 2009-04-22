<?php
	require '/var/www/qcodo-website/_devtools_cli/cli_prepend.inc.php';
	
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
		$strEmail = QRandomDataGenerator::GenerateUsername($strFirstName, $strLastName);
		print $strFirstName . ' ' . $strLastName . '  -  ' . $strEmail . "\r\n";
	}

//	print (wordwrap(QRandomDataGenerator::GenerateContent(5), 139)) . "\r\n";
?>