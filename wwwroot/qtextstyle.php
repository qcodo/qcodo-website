<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');
	
	class QTextStyle extends QBaseClass {
		public function DisplayAsHtml($strContent) {
			print $strContent;
		}
	}
	
	$objStyle = new QTextStyle();
	$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');
	print $objStyle->DisplayAsHtml($strContent);
?>