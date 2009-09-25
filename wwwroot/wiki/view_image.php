<?php
	require('../includes/prepend.inc.php');
	$objWikiImage = WikiImage::LoadByWikiVersionId(QApplication::PathInfo(0));

	header('Content-Type: ' . WikiImageType::$ContentTypeArray[$objWikiImage->WikiImageTypeId]);
	header('Content-Length: ' . filesize($objWikiImage->GetPath()));
	print(file_get_contents($objWikiImage->GetPath()));
?>