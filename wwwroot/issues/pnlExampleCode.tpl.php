<?php
	if ($_FORM->objIssue->ExampleCode) {
?>
		<div class="issuePanelTitle">Example Code</div>
		<div class="issuePanelBody" style="overflow: auto;">
			<pre><?php _p(trim(highlight_string($this->objIssue->ExampleCode, true)), false); ?></pre>
		</div>
<?php	
	}
?>