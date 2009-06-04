#!/usr/local/bin/php
<?php
	require(dirname(__FILE__) . '/cli_prepend.inc.php');
	$objIndex = Topic::CreateSearchIndex(); 

	QDataGen::DisplayForEachTaskStart($strDescription = 'Generating Index for Topics', Topic::CountAll());
	foreach (Topic::LoadAll() as $objTopic) {
		QDataGen::DisplayForEachTaskNext($strDescription);
		$objTopic->RefreshSearchIndex($objIndex);
	}
	QDataGen::DisplayForEachTaskEnd($strDescription);

	$objIndex->commit();
	print $objIndex->count() . " Documents indexed.\r\n";
?>