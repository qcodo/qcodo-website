<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1>Edit My Profile</h1>
		<div class="mainForm" style="border: 0;">
			<p class="instructions">In order to post messages in the Forums, contribute to the Wiki, or upload new files and patches to the Downloads,
			you must be a registered user of the <strong>Qcodo.com</strong> website.<br/>
			<br/>
			Please fill in the fields below to register.  Fields in <strong>BOLD</strong> are required.</p>
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

			<div class="renderForForm">
				<div class="left">&nbsp;</div>
				<div class="right">
					<?php $this->btnUpdate->Render(); ?>
					&nbsp;or&nbsp;
					<?php $this->btnCancel->Render(); ?>
				</div>
			</div>
			<br/><br/>
		</div>
	</div>
	

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>