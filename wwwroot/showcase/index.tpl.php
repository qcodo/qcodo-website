<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Qcodo Showcase</h1>

<p style="font-size: 18px; margin: 6px 0 18px 0;">
	The following sites, companies, projects and applications are user-contributed submissions that showcase Qcodo at work.
	Click on any icon to find out more.
</p>

<?php foreach ($this->objShowcaseArray as $objShowcase) { ?>
	<div style="float: left; margin-right: 38px; margin-bottom: 38px; border: 1px solid #666; width: 100px; height: 100px;">
		<img src="<?php _p($objShowcase->GetThumbPath()); ?>"/>
	</div>
<?php } ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>