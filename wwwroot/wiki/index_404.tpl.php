<?php $strWikiItemType = WikiItemType::$NameArray[$this->intWikiItemTypeId]; ?>
<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span style="font-weight: normal; font-size: 12px;">Wiki <?php _p($strWikiItemType); ?> /</span>
			Wiki Not Found
		</div>
	</div>

	<div style="border: 1px solid #600; margin: 20px 0; padding: 10px; background-color: #fee; color: #600; font-size: 14px;">
		The wiki <?php _p(strtolower($strWikiItemType)); ?>
		for &ldquo;<strong><?php _p($this->strSanitizedPath); ?></strong>&rdquo; does not yet exist.
	</div>
	
	<p>To create a new wiki <?php _p(strtolower($strWikiItemType)); ?> at this location, please click on the button below.</p>
	<div class="roundedLink"><a href="/wiki/edit.php<?php _p(QApplication::$PathInfo); ?>">Create New Wiki <?php _p($strWikiItemType); ?></a></div>
	<br clear="all"/><br/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>