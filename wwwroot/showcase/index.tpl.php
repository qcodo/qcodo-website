<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Qcodo Showcase</h1>

<style type="text/css">
	div.showcase div { float: left; margin-right: 32px; margin-bottom: 32px; border: 4px solid #666; width: 100px; height: 100px; }
	div.showcase div:hover { border-color: #ba8; cursor: pointer; }
	div.showcase img { width: 100px; height: 100px; }
</style>

<p style="font-size: 18px; margin: 12px 0 24px 0;">
	The following are sites, companies, projects and applications that showcase Qcodo at work.<br/>
	Click on any icon to find out more, or feel free and submit your own.
</p>


<div class="controlBar">
	<div class="controls" style="font-size: 11px;">
		<?php $this->btnNew->Render(); ?>
		<?php if ($this->btnAdmin) { ?>
			<div class="spacer">&nbsp;</div>
			<?php $this->btnAdmin->Render(); ?>
		<?php } ?>
	</div>
</div>

<br clear="all"/><br/>

<div class="showcase">
<?php foreach ($this->objShowcaseArray as $objShowcase) { ?>
	<div>
		<a href="#" title="View Info on &quot;<?php _p($objShowcase->Name); ?>&quot;" <?php $this->pxyItem->RenderAsEvents($objShowcase->Id); ?>><img src="<?php _p($objShowcase->GetThumbPath()); ?>"/></a>
	</div>
<?php } ?>
</div>

<?php $this->dlgBox->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>