<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<?php
	$strRelative = QDateTime::Now()->Difference($this->objWikiVersion->PostDate)->SimpleDisplay();
	if ($strRelative == 'a day')
		$strRelative = 'yesterday';
	else if (!$strRelative)
		$strRelative = 'just now';
	else
		$strRelative .= ' ago';
?>

	<div class="searchBar">
		<div class="title">
			<span style="font-weight: normal; font-size: 12px;">Wiki Page /</span>
			<?php _p($this->objWikiVersion->Name); ?>
		</div>
		<div class="right">
			<a href="#" style="color: #ccc; font-size: 10px;" <?php $this->pxyVersions->RenderAsEvents(); ?>>View Versions</a>
		</div>
	</div>

	<div class="wiki">
		<h3>
			version:
			<strong>#<?php _p($this->objWikiVersion->VersionNumber); ?></strong>
			<?php if ($this->objWikiVersion->IsCurrentVersion()) { ?>
				(current)
			<?php } ?>

			&nbsp;|&nbsp;

			last edited by:	
			<strong><a href="<?php _p($this->objWikiVersion->PostedByPerson->ViewProfileUrl)?>"><?php _p($this->objWikiVersion->PostedByPerson->DisplayName)?></a></strong>

			&nbsp;|&nbsp;

			on: <strong><?php _p($this->strPostStartedLinkText, false); ?></strong> (<?php _p($strRelative); ?>)
		</h3>

		<?php _p($this->objWikiVersion->WikiPage->CompiledHtml, false); ?>

	</div>

	<?php $this->pnlVersions->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>