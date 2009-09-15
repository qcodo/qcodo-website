<?php
	if ($_FORM->objIssue->ExpectedOutput) {
?>
		<div class="issuePanelTitle">Expected Result</div>
		<div class="issuePanelBody" style="overflow: auto;">
			<pre><?php _p($this->objIssue->ExpectedOutput); ?></pre>
		</div>
<?php	
	}
?>