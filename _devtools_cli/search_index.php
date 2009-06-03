#!/usr/local/bin/php
<?php
	require(dirname(__FILE__) . '/cli_prepend.inc.php');
	ini_set('include_path', __INCLUDES__);
	require('Zend/Search/Lucene.php');

	function sanitize($input) {
		return htmlentities(strip_tags( $input ));
	}

	//create the index
	$objIndex = new Zend_Search_Lucene('/tmp/feeds_index', true);

	foreach (Message::LoadAll() as $objMessage) {
		$objDocument = new Zend_Search_Lucene_Document();
		$objDocument->addField(Zend_Search_Lucene_Field::Keyword('id', $objMessage->Id));
		$objDocument->addField(Zend_Search_Lucene_Field::Text('title', $objMessage->Topic->Name));
		$objDocument->addField(Zend_Search_Lucene_Field::Unstored('contents', $objMessage->Message));

		echo "\tAdding: " . $objMessage->Id . "\n";
		$objIndex->addDocument($objDocument);
	}
	$objIndex->commit();

	echo $objIndex->count()." Documents indexed.\n";
?>