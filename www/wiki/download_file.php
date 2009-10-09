<?php
	require('../../includes/prepend.inc.php');
	$objWikiFile = WikiFile::LoadByWikiVersionId(QApplication::PathInfo(0));

	if ($objWikiFile->FileName != QApplication::PathInfo(1))
		QApplication::Redirect($objWikiFile->WikiVersion->WikiItem->UrlPath);

	$objWikiFile->DownloadCount++;
	$objWikiFile->Save();

	header('Content-Type: ' . $objWikiFile->FileMime);
	header('Content-Length: ' . filesize($objWikiFile->GetPath()));
	header('Content-Disposition: attachment; filename="' . $objWikiFile->FileName . '"');
	print(file_get_contents($objWikiFile->GetPath()));
?>