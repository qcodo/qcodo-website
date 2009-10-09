<?php require(__INCLUDES__ . '/header.inc.php'); ?>
	<div class="form">

		<h1><?php _p($this->strHeadline); ?></h1>

		<div class="mainForm">
			<p class="instructions">Fields in <strong>BOLD</strong> are required.</p>
			<br/>

			<?php $this->txtTitle->RenderSideBySideErrorBelow('Width=346px', 'Name=Title'); ?>
			<?php $this->txtContent->RenderSideBySideErrorBelow('Width=350px', 'Height=250px', 'Name=Content'); ?>
			
			<br/>
			
			<div class="renderForForm"><div class="left">&nbsp;</div><div class="right">
				<?php $this->btnOkay->Render(); ?>
				&nbsp;or&nbsp;
				<?php $this->btnCancel->Render(); ?>
			</div></div>
		</div>

		<div class="sidebar">
			<p>To apply formatting, you can use <br/><strong>QTextStyle</strong> formatting properties.</p>
			<p>For more information, please<br/>see <a href="/wiki/qcodo/qtextstyle">QTextStyle Formatting</a>.</p>
		</div>
		
		<br clear="all"/><br/>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>