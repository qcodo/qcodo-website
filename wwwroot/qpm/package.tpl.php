<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span class="subtitle">QPM Package / </span>
			<?php _p($this->objPackage->Name); ?>
			<span class="subtitle">(<?php _p($this->objPackage->PackageCategory->Name); ?>)</span>
		</div>
		<div class="right wiki">
			<a href="/qpm/category.php/<?php _p($this->objPackage->PackageCategory->Token); ?>">Back to <strong><?php _p($this->objPackage->PackageCategory->Name); ?></strong></a>
		</div>
	</div>

	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">
		<?php _b($this->objPackage->Description); ?>
	</div>
	
	<div style="background-color: #ffd; padding: 5px 10px; border: 1px solid #cc9; margin-top: 12px; margin-bottom: 12px;">
<?php if ($objContribution = $this->objPackage->GetMostRecentContribution()) { ?>
		To install any of the QPM packages below, use the <strong>qpm-install</strong> command in your Qcodo installation, for example:<br/>
		<strong style="font-family: monaco, courier, courier new, monospaced; position: relative; left: 50px;">
			qcodo qpm-install <?php _p($objContribution->Person->Username); ?>/<?php _p($this->objPackage->Token); ?>
		</strong>
		<br/><br/>
<?php } ?>
		
		To upload your own update or version for this QPM package, use the <strong>qpm-upload</strong> command in your Qcodo installation, for example:<br/>
		<strong style="font-family: monaco, courier, courier new, monospaced; position: relative; left: 50px;">
			qcodo qpm-upload -p your-password <?php _p(QApplication::$Person ? QApplication::$Person->Username : 'your-username'); ?>/<?php _p($this->objPackage->Token); ?>
		</strong>
	</div>

	<?php $this->dtgContributions->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>