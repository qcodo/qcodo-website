<?php
	require('../../includes/prepend.inc.php');

	$objCounter = Counter::LoadByToken(QApplication::PathInfo(0));
	if (!$objCounter)
		QApplication::Redirect('/');

	$objCounter->Counter++;
	$objCounter->Save();

	if (substr($objCounter->Filename, 0, 2) == '//') {
		$strFilename = substr($objCounter->Filename, 1);
		if (($objCounter->Token == 'release_dev_targz') ||
			($objCounter->Token == 'release_dev_zip')) {
			$strFilename = str_replace('%', QApplication::GetQcodoVersion(false), $strFilename);
		} else if (($objCounter->Token == 'release_stable_targz') ||
			($objCounter->Token == 'release_stable_zip')) {
			$strFilename = str_replace('%', QApplication::GetQcodoVersion(true), $strFilename);
		}

		$strData = file_get_contents($strFilename);

		if (strpos($strFilename, '.gz'))
			header("Content-type: application/x-gzip");
		else if (strpos($strFilename, '.zip'))
			header("Content-type: application/zip");
		else if (strpos($strFilename, '.txt'))
			header("Content-type: text/plain");
		else
			header("Content-type: application/other");

		header('Content-Length: ' . strlen($strData));
		if (!strpos($strFilename, '.txt'))
			header('Content-Disposition: attachment; filename="' . basename($strFilename) . '"');
		header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		print($strData);
	} else
		QApplication::Redirect($objCounter->Filename);
?>