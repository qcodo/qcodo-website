<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm">
			<p class="instructions">Select and upload a new file below.  Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtTitle->RenderSideBySideErrorBelow('Width=346px', 'Name=Title'); ?>
			<?php $this->flcFile->RenderSideBySideErrorBelow('Name=File'); ?>
			<?php $this->txtDescription->RenderSideBySideErrorBelow('Name=Description or Caption', 'Width=350px', 'Height=100px'); ?>

			<br/>
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			<p style="width: 200px;">Content goes here
			</p>
		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>