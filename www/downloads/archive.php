<?php
	require('../../includes/prepend.inc.php');

	$strFilename = QApplication::PathInfo(0);
	if (strpos('/', $strFilename) !== false) QApplication::Redirect('/');

	if (file_exists(__QCODO_BUILDS__ . '/' . $strFilename)) {
		if (strpos('.gz', $strFilename))
			header('Content-Type: application/x-gzip');
		else
			header('Content-Type: application/x-zip');
		
		header('Content-Disposition: attachment; filename="' . $strFilename . '"');
		header('Content-Length: ' . filesize(__QCODO_BUILDS__ . '/' . $strFilename));
		print file_get_contents(__QCODO_BUILDS__ . '/' . $strFilename);
	} else {
		QApplication::Redirect('/');
	}
?>