<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">Wiki Directory</div>
	</div>
	
	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Wiki Type<br/>
			<?php $this->lstWikiItemType->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Title<br/>
			<?php $this->txtTitle->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Path Starts With<br/>
			<?php $this->txtPath->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Last Updated By<br/>
			<?php $this->txtPostedBy->Render('Width=140px'); ?>
		</div>

		<br clear="all"/>
	</div>
	<br/>
	<?php $this->dtgWikiItems->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>