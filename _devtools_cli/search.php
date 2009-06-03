#!/usr/local/bin/php
<?php
	require(dirname(__FILE__) . '/cli_prepend.inc.php');
	ini_set('include_path', __INCLUDES__);
	require('Zend/Search/Lucene.php');

	// open the index
	$objIndex = new Zend_Search_Lucene('/tmp/feeds_index');

	if ($_SERVER['argc'] != 2) exit("error: specify a search term\r\n");
	$query = $_SERVER['argv'][1];

	$hits = $objIndex->find($query);

	echo "Index contains ".$objIndex->count()." documents.\n\n";

	echo "Search for '".$query."' returned " .count($hits). " hits\n\n";

	foreach ($hits as $hit) {
		echo $hit->title."\n";
		echo "\tScore: ".sprintf('%.2f', $hit->score)."\n";
		echo "\t".$hit->id."\n\n";
	}
?>