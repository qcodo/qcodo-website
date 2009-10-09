<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">
		<h1><?php _p($this->strPageTitle); ?></h1>
		<div class="mainForm" style="border: 0;">
			<p class="instructions">Please update any of your user preferences below.</p>
			<br/>

			<?php $this->lstTimezone->RenderForForm('Name=Your Timezone'); ?>
			<br/>

			<?php $this->chkDisplayRealNameFlag->RenderForForm('Name=Display Real Name',
				'Instructions=Leave unchecked to use your Username as your Display Name'); ?>
			<?php $this->chkDisplayEmailFlag->RenderForForm('Name=Display Email Address',
				'Instructions=Allows others to see your email address on your profile page'); ?>
			<?php $this->chkOptInFlag->RenderForForm('Name=Opt-In to Emails',
				'Instructions=Opt-In to occasional email announcements from Qcodo'); ?>
			<br/>

			<?php $this->txtLocation->RenderForForm('Name=Your Location', 'Instructions=e.g., "Sunnyvale, CA"'); ?>
			<?php $this->lstCountry->RenderForForm('Name=Display Country Flag'); ?>
			<?php $this->txtUrl->RenderForForm('Name=Website URL', 'Instructions=Be sure and include "http://"'); ?>
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