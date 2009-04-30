<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');
	
	class QTextStyle extends QBaseClass {
		public function DisplayAsHtml($strContent) {
			return $strContent;
		}
	}
	
	$objStyle = new QTextStyle();
	$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');
	$strHtml = $objStyle->DisplayAsHtml($strContent);
?>

	<h3 style="margin: 0;">Original</h3>
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print(nl2br(htmlentities($strContent))); ?></div>
	<br/>
	<h3 style="margin: 0;">Source HTML</h3>
	<div style="font: 11px lucida console; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print(nl2br(htmlentities($strHtml))); ?></div>
	<br/>
	<h3 style="margin: 0;">Display HTML</h3>
	<div style="font: 11px arial; border: 1px solid black; overflow: auto; width: 800px; height: 200px; padding: 10px;"><?php print($strHtml); ?></div>
	