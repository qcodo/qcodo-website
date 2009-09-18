<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm">
			<p class="instructions">Please help out the <strong>Qcodo.com</strong> team in improving Qcodo!
			The more detail you can provide, the easier it will be to debug and fix.  It's <strong>very
			important</strong> to post example code and/or instructions on how to reproduce.<br/><br/>
			
			Remember, in your example code and description, be as <strong>CONCISE</strong> as possible!<br/>
			<br/>
			Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtTitle->RenderSideBySideErrorBelow('Width=346px', 'Name=Short Description'); ?>
			<?php $this->txtLongDescription->RenderSideBySideErrorBelow('Width=350px', 'Height=120px', 'Name=Long Description'); ?>
			
			<br/>
			
			<?php $this->txtExampleCode->RenderForForm('Width=350px', 'Height=120px'); ?>
			<?php $this->txtExampleTemplate->RenderForForm('Width=350px', 'Height=120px'); ?>
			<?php $this->txtExampleData->RenderForForm('Width=350px', 'Height=120px'); ?>
			<?php $this->txtExpectedOutput->RenderForForm('Width=350px', 'Height=80px'); ?>
			<?php $this->txtActualOutput->RenderForForm('Width=350px', 'Height=80px'); ?>
			
			<br/>
			
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			<p style="height: 115px;">&nbsp;</p>
			<?php $this->lstPriority->RenderForDialog('Name=Priority','Width=180px'); ?>
			<?php $this->lstStatus->RenderForDialog('Name=Status','Width=180px'); ?>
			<?php $this->lstResolution->RenderForDialog('Name=Resolution','Width=180px'); ?>
			<?php $this->txtAssignedTo->RenderForDialog('Name=Assigned To','Width=180px'); ?>
			<?php $this->txtDueDate->HtmlAfter = ' &nbsp; ' . $this->calDueDate->Render(false); ?>
			<?php $this->txtDueDate->RenderForDialog('Name=Due Date','Width=150px'); ?>
			<?php $this->dlgAssignedTo->Render(); ?>
			<br/><br/>
			
<?php 
			foreach ($this->lstRequiredFields as $lstField) {
				if (array_key_exists($lstField->ActionParameter, $this->txtMutableFields)) {
					$lstField->HtmlAfter = '<br/>' . $this->txtMutableFields[$lstField->ActionParameter]->Render(false, 'Width=175px'); 
				}
				$lstField->RenderForDialog('Width=180px');
			}
?>
			<br/><br/>
<?php 
			foreach ($this->lstOptionalFields as $lstField) {
				if (array_key_exists($lstField->ActionParameter, $this->txtMutableFields))
					$lstField->HtmlAfter = '<br/>' . $this->txtMutableFields[$lstField->ActionParameter]->Render(false, 'Width=175px'); 
				$lstField->RenderForDialog('Width=180px');
			}
?>

		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>