<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm">
			<p class="instructions">QPM packages are the easiest way for Qcodo community members to contribute
			patches, imrovements, fixes and enhancements for the <strong>Qcodo Development Framework</strong>.
			<br/><br/>
			
			Thank you for your willingness to post new QPM packages!  Please fill out as much information below
			on the new package.  And after creating this package entry, please remember to use the
			<strong>qpm-upload</strong> tool in your Qcodo installation to upload the code for your QPM.
			<br/><br/>

			Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->lstCategory->RenderSideBySideErrorBelow('Width=350px', 'Name=QPM Repository'); ?>
			<br/>
			<?php $this->txtToken->RenderSideBySideErrorBelow('Width=346px', 'Name=QPM Path'); ?>
			<br/>
			<?php $this->txtName->RenderSideBySideErrorBelow('Width=346px', 'Name=Title'); ?>
			<?php $this->txtDescription->RenderSideBySideErrorBelow('Width=350px', 'Height=120px', 'Name=Description'); ?>			

			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			<p style="width: 250px; color: #666; font-size: 10px;">
				Another way for community members to contribute code
				is by utilizing Git.  The Qcodo code is hosted at <strong><a href="http://github.com/qcodo/qcodo">GitHub</a></strong>,
				which provides opportunities for community members to contribute branches
				to the Qcodo codebase.
			</p>
		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>