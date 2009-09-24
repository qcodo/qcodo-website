<?php
	$strRelative = QDateTime::Now()->Difference($_FORM->objWikiVersion->PostDate)->SimpleDisplay();
	if ($strRelative == 'a day')
		$strRelative = 'yesterday';
	else if (!$strRelative)
		$strRelative = 'just now';
	else
		$strRelative .= ' ago';
?>
	<h3>
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

	<br clear="all"/>
	<?php $_FORM->btnEdit->Render('Text=Edit Page', 'FontSize=10px'); ?>
	<br clear="all"/>
	
	<?php _p($_FORM->objWikiVersion->WikiPage->CompiledHtml, false); ?>