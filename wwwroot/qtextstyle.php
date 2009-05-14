<?php
	require(dirname(__FILE__) . '/includes/prepend.inc.php');

	//////////////////////////////////
	// For purposes of the Dev Harness
	set_time_limit(3);
//	QTextStyleInline::$OutputDebugMessages = true;
	//////////////////////////////////
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>QTextStyle Development Harness</title>
<style>
	body { font: 11px arial; }
	div.code { background-color: #dfe; padding: 1px 12px; margin-left: 25px; overflow: auto; width: 700px; }
	h3 {margin: 0;}
	.box { font: 11px lucida console; border: 1px solid black; overflow: auto; width: 450px; height: 500px; padding: 10px; margin-bottom: 12px;}
	textarea.box {padding: 0; width: 800px; height: 150px;}
</style>
</head>
<body>

<?php if (QTextStyleInline::$OutputDebugMessages) { ?>
	<h3 style="float: left;">Debug Stack</h3>
	<div style="float: right; font-size: 10px; font-weight: normal;">
		<a href="#" onclick="document.getElementById('stack').style.height='500px'; return false;">Grow</a>
		&nbsp;|&nbsp;
		<a href="#" onclick="document.getElementById('stack').style.height='200px'; return false;">Shrink</a>
	</div>
	<br clear="all"/>
	<div id="stack" style="height: 200px; overflow: auto; padding: 30px; border: 1px solid black; background-color: #ddd; margin-bottom: 12px; ">
<?php } ?>

<?php 
	if (array_key_exists('sample', $_GET))
		$strContent = $_GET['sample'];
	else if (array_key_exists('sample', $_POST))
		$strContent = $_POST['sample'];
	else
		$strContent = file_get_contents(dirname(__FILE__) . '/textism_sample.txt');

	$strHtml = QTextStyle::DisplayAsHtml($strContent);
?>

<?php if (QTextStyleInline::$OutputDebugMessages) { ?>
	</div>
<?php } ?>

<form method="post" action="/qtextstyle.php">
	<h3>Original</h3>
	<textarea class="box" id="sample" name="sample"><?php _p($strContent); ?></textarea> <input type="submit" style="position: relative; top: -25px; left: 25px;">
	<br/>
	<div style="float: left;">
		<h3>Source HTML</h3>
		<div class="box"><?php print(nl2br(str_replace(' ', '&nbsp;', htmlentities($strHtml)))); ?></div>
	</div>
	<div style="float: left; margin-left: 25px;">
	<h3>Display HTML</h3>
	<div class="box" style="font-family: arial;"><?php print($strHtml); ?></div>
	</div>
</form>