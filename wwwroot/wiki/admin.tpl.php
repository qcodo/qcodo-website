<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1>Admin Wiki Item</h1>

		<div class="mainForm">
			<p class="instructions">Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->lstEditorMinimum->RenderSideBySideErrorBelow('Name=Minimum Editor Role'); ?>
			<?php $this->lstNavItem->RenderSideBySideErrorBelow('Name=Nav Item'); ?>
			<?php $this->lstSubNavItem->RenderSideBySideErrorBelow('Name=SubNav Item'); ?>
			
			<br/>
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			&nbsp;
		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>