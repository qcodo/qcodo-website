<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1><?php _p($this->strPageTitle); ?></h1>
		<div class="mainForm" style="border: 0;">
			<p class="instructions">Please update your account information below.  All fields are required.</p>
			<br/>

			<?php $this->txtUsername->RenderForForm('Instructions=6 - 20 alphanumeric characters'); ?>
			<?php $this->txtFirstName->RenderForForm(); ?>
			<?php $this->txtLastName->RenderForForm(); ?>
			<?php $this->txtEmail->RenderForForm(); ?>

<?php if ($this->lstPersonType) { ?>
			<div class="subsection">
				<?php $this->lstPersonType->RenderForForm('Name=Qcodo.com Role'); ?>
				<?php $this->chkDonatedFlag->RenderForForm('Name=Financial Contributor'); ?>
			</div>
<?php } ?>

			<br/>
			<div class="renderForForm">
				<div class="left">&nbsp;</div>
				<div class="right">
					<?php $this->btnUpdate->Render('Text=Update'); ?>
					&nbsp;or&nbsp;
					<?php $this->btnCancel->Render('Text=Cancel'); ?>
				</div>
			</div>
			<br/><br/>
		</div>
	</div>
	

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>