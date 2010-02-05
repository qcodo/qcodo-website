<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm fullWidth">
			<p class="instructions">Fields in <strong>BOLD</strong> are required.</p>
			<p style="color: #999;">To apply formatting, you can use <strong>QTextStyle</strong> formatting properties.
			<br/>For more information,
			please see <a href="/wiki/qcodo/qtextstyle" target="_blank">QTextStyle Formatting</a>.
			<span style="font-size: 10px; color: #999;">(link will open in a new tab/window)</span>
			</p>
			<br/>

			<?php $this->txtTitle->RenderSideBySideErrorBelow('Width=530px', 'Name=Title'); ?>
			<?php $this->txtContent->RenderSideBySideErrorBelow('Width=534px', 'Height=350px', 'Name=Content'); ?>
			
			<br/>
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>