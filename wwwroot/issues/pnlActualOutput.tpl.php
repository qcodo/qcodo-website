<?php
	if ($_FORM->objIssue->ActualOutput) {
?>
		<div class="issuePanelTitle">Actual Result</div>
		<div class="issuePanelBody" style="overflow: auto;">
			<pre><?php _p($this->objIssue->ActualOutput); ?></pre>
		</div>
<?php	
	}
?>