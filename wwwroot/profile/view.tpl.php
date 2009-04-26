<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="form">
	<h1>
		<div class="superhead">Qcodo.com User Profile</div>
		<?php _p($this->mctPerson->Person->DisplayName); ?>
	</h1>

	<div class="mainForm" <?php if (!$this->btnEdit) _p('style="border: 0;"', false); ?>>
		<br/>
		<?php $this->lblRole->RenderForForm(); ?>
		<?php $this->lblUsername->RenderForForm(); ?>
		<?php $this->lblName->RenderForForm(); ?>
		<?php $this->lblEmail->RenderForForm(); ?>
		<?php $this->lblUrl->RenderForForm(); ?>
		<?php $this->lblLocation->RenderForForm(); ?>
		<?php $this->lblRegistrationDate->RenderForForm(); ?>
	</div>

<?php if ($this->btnEdit) { ?>
	<div class="sidebar">
		<p class="hint">Don't like what you see?</p>
		<?php $this->btnEdit->Render(); ?>

		<br/><br/>
		<p class="hint">Big, life changes?</p>
		<?php $this->btnEditAccount->Render(); ?>

		<?php if ($this->btnPassword) { ?>
			<br/><br/>
			<p class="hint">Worried about Identity Theft?</p>
			<?php $this->btnPassword->Render(); ?>
		<?php } ?>
	</div>
<?php } ?>

</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>