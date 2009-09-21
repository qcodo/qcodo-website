<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objWikiItem->CurrentName); ?></h1>
	<h3>File</h3>

	<p><?php $this->lblMessage->Render(); ?></p>
	<p><?php $this->btnButton->Render(); ?></p>

<?php var_dump($_GET); ?>
<?php var_dump(QApplication::$PathInfo); ?>
<?php var_dump(QApplication::$RequestUri); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>