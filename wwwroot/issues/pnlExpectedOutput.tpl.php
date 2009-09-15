<?php
	if ($_FORM->objIssue->ExpectedOutput) {
?>
		<div class="issuePanelTitle">Expected Result</div>
		<div class="issuePanelBody">
			<code style="width: 200px;">
				<?php _b($this->objIssue->ExpectedOutput); ?>
			</code>
		</div>
<?php	
	}
?>