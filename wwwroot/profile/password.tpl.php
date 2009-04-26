<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1>Change My Password</h1>
		<div class="mainForm" style="border: 0;">
			<p class="instructions">Please update your password below.</p>
			<br/>

			<?php $this->txtOldPassword->RenderForForm(); ?>
			<?php $this->txtNewPassword->RenderForForm(); ?>
			<?php $this->txtConfirmPassword->RenderForForm(); ?>
			<br/>

			<div class="renderForForm">
				<div class="left">&nbsp;</div>
				<div class="right">
					<?php $this->btnUpdate->Render('Text=Update'); ?>

<?php if ($this->btnCancel) { ?>
					&nbsp;or&nbsp;
					<?php $this->btnCancel->Render('Text=Cancel'); ?>
<?php } ?>
				</div>
			</div>
			<br/><br/>
		</div>
	</div>
	

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>