<?php
	if ($_FORM->objIssue->ActualOutput) {
?>
		<div class="issuePanelTitle">Actual Result</div>
		<div class="issuePanelBody">
			<code style="width: 200px;">
				<?php _b($this->objIssue->ActualOutput); ?>
			</code>
		</div>
<?php	
	}
?>