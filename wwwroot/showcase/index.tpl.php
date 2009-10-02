<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Qcodo Showcase</h1>

<style type="text/css">
	div.showcase div { float: left; margin-right: 32px; margin-bottom: 32px; border: 4px solid #666; width: 100px; height: 100px; }
	div.showcase div:hover { border-color: #ba8; cursor: pointer; }
	div.showcase img { width: 100px; height: 100px; }
</style>

<p style="font-size: 18px; margin: 12px 0 24px 0;">
	The following sites, companies, projects and applications are user-contributed submissions that showcase Qcodo at work.
	Click on any icon to find out more.
</p>

<?php $this->btnNew->Render(); ?>
<br clear="all"/><br/><br/>

<div class="showcase">
<?php foreach ($this->objShowcaseArray as $objShowcase) { ?>
	<div>
		<a href="#" title="View Info on <?php _p($objShowcase->Name); ?>" <?php $this->pxyItem->RenderAsEvents($objShowcase->Id); ?>><img src="<?php _p($objShowcase->GetThumbPath()); ?>"/></a>
	</div>
<?php } ?>
</div>

<?php $this->dlgShowcaseView->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>