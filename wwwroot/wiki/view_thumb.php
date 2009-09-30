<?php
	require('../includes/prepend.inc.php');

	$strPath = WikiItem::SanitizeForPath(QApplication::PathInfo(0), $intWikiItemTypeId);
	$objWikiItem = WikiItem::LoadByPathWikiItemTypeId($strPath, WikiItemType::Image);

	if ($objWikiItem) {
		$objWikiImage = $objWikiItem->CurrentWikiVersion->WikiImage;
		header('Content-Type: ' . WikiImageType::$ContentTypeArray[$objWikiImage->WikiImageTypeId]);
		header('Content-Length: ' . filesize($objWikiImage->GetPath()));
		print(file_get_contents($objWikiImage->GetPath()));
	} else {
		$strImagePath = __DOCROOT__ . '/images/no_image.png';
		header('Content-Type: image/png');
		header('Content-Length: ' . filesize($strImagePath));
		print(file_get_contents($strImagePath));
	}
?>