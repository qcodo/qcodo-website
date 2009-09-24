<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span style="font-weight: normal; font-size: 12px;">Wiki Not Found </span>
			<?php _p(QApplication::$PathInfo); ?>
		</div>
	</div>
	<p>This wiki document does not yet exist.</p>
	
	<p>To create a new wiki document at this location, please select a Wiki Item Type to create.</p>
		<?php foreach (WikiItemType::$NameArray as $strWikiItemType) { ?>
			<div class="roundedLink" style="margin-left: 25px"><a href="/wiki/edit_<?php _p(strtolower($strWikiItemType) . '.php' . QApplication::$PathInfo); ?>">New Wiki <?php _p($strWikiItemType); ?></a></div>
			<br clear="all"/><br/>
		<?php } ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>