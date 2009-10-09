<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">Administer Showcase Items</div>
		<div class="right issue">
			<a href="/showcase/">Back to Showcase</a> 
		</div>
	</div>
	
	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Filter by Live Flag<br/>
			<?php $this->lstLiveFlag->Render('Width=140px'); ?>
		</div>
		<br clear="all"/>
	</div>
	
	<br/>
	<?php $this->dtgShowcaseItems->Render(); ?>

<?php $this->dlgBox->Render(); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>