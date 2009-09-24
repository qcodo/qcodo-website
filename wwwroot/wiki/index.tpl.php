<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span style="font-weight: normal; font-size: 12px;">Wiki Page /</span>
			<?php _p($this->objWikiVersion->Name); ?>
		</div>
		<div class="right">
			<?php $this->btnToggleVersions->Render(); ?>
		</div>
	</div>

	<?php if (!$this->IsViewingCurrent()) { ?>
		<div class="wikiNotice">You are currently viewing an alternate version (#<?php _p($this->objWikiVersion->VersionNumber); ?>).
			&nbsp;
			<?php $this->btnSetAsCurrentVersion->Render(); ?>
		</div>
	<?php } ?>

	<?php $this->pnlContent->Render(); ?>

	<?php $this->pnlVersions->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>