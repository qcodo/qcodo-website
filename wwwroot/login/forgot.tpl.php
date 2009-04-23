<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1>Forgot Password</h1>
		<div class="mainForm">
			<p class="instructions">Please enter in your <strong>email address</strong> below.  Your <strong>Qcodo.com</strong> username will be emailed to you and
			your password will be reset.</p>

			<br/>
			<?php $this->txtEmail->RenderForForm(); ?>
			<br/>

			<?php $this->btnSend->RenderForForm(); ?>
			<br/><br/>
		</div>
		<div class="sidebar">
			<p class="hint">Not yet a member?</p>
			<?php $this->lnkRegister->Render(); ?>
			<br/><br/>
			<p class="hint">Had an epiphany?</p>
			<?php $this->lnkLogin->Render(); ?>
		</div>
	</div>
	<?php $this->dlgResult->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>