<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">
			<span class="subtitle">QPM Repository / </span>
			<?php _p($this->objCategory->Name); ?>
		</div>
		<div class="right wiki">
			<a href="/qpm/">Back to <strong>All Repositories</strong></a>
		</div>
		<div class="right">
			<?php $this->btnNew->Render('Text=Create a New QPM Package'); ?>
		</div>
	</div>

	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">
		<?php _p($this->objCategory->Description); ?>
	</div>
	<br/>

	<?php $this->dtgPackages->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>