<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1>Register</h1>
		<div class="mainForm">
			<p class="instructions">In order to post messages in the Forums, contribute to the Wiki, or upload new files and patches to the Downloads,
			you must be a registered user of the <strong>Qcodo.com</strong> website.<br/>
			<br/>
			Please fill in the fields below to register.  Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtUsername->RenderForForm(); ?>
			<?php $this->txtPassword->RenderForForm(); ?>
			<?php $this->txtConfirmPassword->RenderForForm(); ?>
			<br/>

			<?php $this->txtFirstName->RenderForForm(); ?>
			<?php $this->txtLastName->RenderForForm(); ?>
			<?php $this->txtEmail->RenderForForm(); ?>
			<br/>

			<div class="renderWithName"><div class="left">&nbsp;</div><div class="right">
				<?php $this->chkRemember->Render(); ?>
				<span class="instructions forCheckbox">Keep me logged in to <strong>Qcodo.com</strong> on this computer</span>
			</div></div>

			<br/><br/>
			<?php $this->btnRegister->RenderForForm(); ?>
			<br/><br/>
		</div>
		<div class="sidebar">
			<p class="hint">Already a member?</p>
			<?php $this->lnkLogin->Render(); ?>
		</div>
	</div>
	

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>