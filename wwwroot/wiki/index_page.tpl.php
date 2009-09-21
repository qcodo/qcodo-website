<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1><?php _p($this->objWikiItem->CurrentName); ?></h1>

	<?php _p($this->objWikiVersion->WikiPage->CompiledHtml, false); ?>

	<div style="margin-top: 12px; border-top: 1px solid #666; padding-top: 12px; font-size: 11px; font-style: italic; color: #666;"/>
		Version <strong>#<?php _p($this->objWikiVersion->VersionNumber); ?></strong> edited by <strong><?php _p($this->objWikiVersion->PostedByPerson->DisplayName)?></strong> on
		<strong><?php _p($this->objWikiVersion->PostDate); ?></strong>.
	</div>
<?php var_dump($_GET); ?>
<?php var_dump(QApplication::$PathInfo); ?>
<?php var_dump(QApplication::$RequestUri); ?>

	<p><?php $this->lblMessage->Render(); ?></p>
	<p><?php $this->btnButton->Render(); ?></p>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>