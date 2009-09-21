<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p(QApplication::$PathInfo); ?></h1>
	<p>This wiki document does not yet exist.</p>
	
	<p>To create a new wiki document at this location, please select a Wiki Item Type to create:</p>
	<ul>
		<?php foreach (WikiItemType::$NameArray as $strWikiItemType) { ?>
			<li><a href="/wiki/edit_<?php _p(strtolower($strWikiItemType) . '.php' . QApplication::$PathInfo); ?>"><?php _p($strWikiItemType); ?></a></li>
		<?php } ?>
	</ul>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>