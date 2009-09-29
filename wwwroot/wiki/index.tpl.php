<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span style="font-weight: normal; font-size: 12px;">Wiki <?php _p(WikiItemType::$NameArray[$this->objWikiItem->WikiItemTypeId]); ?> /</span>
			<?php _p($this->objWikiVersion->Name); ?>
		</div>
		<div class="right">
			&nbsp;
		</div>
	</div>

	<?php if (!$this->IsViewingCurrent()) { ?>
		<div class="wikiNotice">You are currently viewing an alternate version (#<?php _p($this->objWikiVersion->VersionNumber); ?>).
			<?php if ($this->btnSetAsCurrentVersion) { ?>
				&nbsp;
				<?php $this->btnSetAsCurrentVersion->Render(); ?>
			<?php } ?>
		</div>
	<?php } ?>

	<?php $this->pnlContent->Render(); ?>

	<?php $this->pnlVersions->Render(); ?>
	<br clear="all"/>

	<?php $this->pnlMessages->Render(); ?>
	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>