<?php
	require '/var/www/qcodo-website/_devtools_cli/cli_prepend.inc.php';
	
	for ($intIndex = 0; $intIndex < 10; $intIndex++)
		print QRandomDataGenerator::GenerateTitle(5, 15) . "\r\n";
?>