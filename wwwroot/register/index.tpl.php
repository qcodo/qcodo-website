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

			<div class="renderForForm"><div class="left">Display Real Name</div><div class="right">
				<?php $this->chkDisplayRealNameFlag->Render(); ?>
				<span class="instructions forCheckbox">Leave unchecked to use your Username as your Display Name</span>
			</div></div>
			<div class="renderForForm"><div class="left">Opt-In to Emails</div><div class="right">
				<?php $this->chkOptInFlag->Render(); ?>
				<span class="instructions forCheckbox">Opt-In to occasional e-mail announcements from Qcodo</span>
			</div></div>
			<br/>

			<?php $this->txtLocation->RenderForForm(); ?>
			<?php $this->lstCountry->RenderForForm(); ?>
			<?php $this->txtUrl->RenderForForm(); ?>
			<br/> 

			<?php $this->btnRegister->RenderForForm(); ?>
			<br/><br/>
		</div>
		<div class="sidebar">
			<p class="hint">Already a member?</p>
			<?php $this->lnkLogin->Render(); ?>
		</div>
	</div>
	

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>