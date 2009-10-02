<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">Qcodo Bugs and Issues</div>
		<div class="right issue">
			&nbsp;
			&nbsp;
			Go to Issue ID: 
			<?php $this->txtId->Render('CssClass=searchIssueTextBox','MaxLength=6'); ?>
		</div>
		<div class="right">
			<?php $this->btnNew->Render('Text=Report an Issue'); ?>
		</div>
	</div>
	
	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">
		

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