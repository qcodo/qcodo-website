<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="form">

		<h1>Report a Bug or Issue</h1>
		<div class="mainForm">

			<p class="instructions">Please help out the <strong>Qcodo.com</strong> team in improving Qcodo!
			The more detail you can provide, the easier it will be to debug and fix.  It's <strong>very
			important</strong> to post example code and/or instructions on how to reproduce.<br/><br/>
			
			Remember, in your example code and description, be as <strong>CONCISE</strong> as possible!<br/>
			<br/>
			Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtTitle->RenderForForm('Width=300px', 'Name=Short Description'); ?>
			<?php $this->txtExampleCode->RenderForForm('Width=300px', 'Height=80px'); ?>
			<?php $this->txtExampleTemplate->RenderForForm('Width=300px', 'Height=80px'); ?>
			<?php $this->txtExampleData->RenderForForm('Width=300px', 'Height=80px'); ?>
			<?php $this->txtExpectedOutput->RenderForForm('Width=300px', 'Height=80px'); ?>
			<?php $this->txtActualOutput->RenderForForm('Width=300px', 'Height=80px'); ?>
			
		</div>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>