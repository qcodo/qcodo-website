<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm">
			<p class="instructions">Select and upload a new image file below.  Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtTitle->RenderSideBySideErrorBelow('Width=346px', 'Name=Title'); ?>
			<?php $this->flcImage->RenderSideBySideErrorBelow('Name=Image File'); ?>
			<?php $this->txtDescription->RenderSideBySideErrorBelow('Name=Description or Caption', 'Width=350px', 'Height=100px'); ?>

			<br/>
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			<p style="width: 200px;">Image files uploaded must be one of the following file formats:
			<ul style="width: 100px;">
				<li>GIF</li>
				<li>JPEG</li>
				<li>PNG</li>
			</ul>
			</p>
		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>