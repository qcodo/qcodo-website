<?php
	$strRelative = QDateTime::Now()->Difference($_FORM->objWikiVersion->PostDate)->SimpleDisplay();
	if ($strRelative == 'a day')
		$strRelative = 'yesterday';
	else if (!$strRelative)
		$strRelative = 'just now';
	else
		$strRelative .= ' ago';
?>
	<h3 style="margin-top: 12px;">
		version:
		<strong>#<?php _p($_FORM->objWikiVersion->VersionNumber); ?></strong>
		<?php if ($_FORM->objWikiVersion->IsCurrentVersion()) { ?>
			(current)
		<?php } ?>

		&nbsp;|&nbsp;

		last edited by:	
		<strong><a href="<?php _p($_FORM->objWikiVersion->PostedByPerson->ViewProfileUrl)?>"><?php _p($_FORM->objWikiVersion->PostedByPerson->DisplayName)?></a></strong>

		&nbsp;|&nbsp;

		on: <strong><?php _p($_FORM->strPostStartedLinkText, false); ?></strong> (<?php _p($strRelative); ?>)
	</h3>

	<div class="controlBar">
		<div class="controls" style="width: 500px;">
			<?php $_FORM->btnEdit->Render(); ?>
			<div class="spacer">&nbsp;</div>
			<?php $this->btnToggleVersions->Render(); ?>
			<div class="spacer">&nbsp;</div>
			<?php $this->btnToggleMessages->Render(); ?>

			<?php if ($_FORM->btnAdmin) { ?>
				<div class="spacer">&nbsp;</div>
				<div class="spacer">&nbsp;</div>
				<div class="spacer">&nbsp;</div>
				<?php $_FORM->btnAdmin->Render(); ?>
			<?php } ?>
		</div>
	</div>
	<br clear="all"/>