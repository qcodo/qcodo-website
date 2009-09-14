<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php $this->txtId->RenderForForm(); ?>
	
	<div style="background-color: #edd; padding: 10px;">

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Summary<br/>
			<?php $this->txtSummary->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Priority<br/>
			<?php $this->lstPriority->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Status<br/>
			<?php $this->lstStatus->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Category<br/>
			<?php $this->lstCategory->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Posted By<br/>
			<?php $this->txtPostedBy->Render('Width=140px'); ?>
		</div>

		<div style="float: left; font-size: 11px; font-weight: bold; margin-right: 15px;">
			Assigned To<br/>
			<?php $this->txtAssignedTo->Render('Width=140px'); ?>
		</div>

		<br clear="all"/>
	</div>
	<br/>
	<?php $this->dtgIssues->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>