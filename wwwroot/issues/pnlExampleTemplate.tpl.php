<?php
	if ($_FORM->objIssue->ExampleTemplate) {
?>
		<div class="issuePanelTitle">Example Template</div>
		<div class="issuePanelBody" style="overflow: auto;">
			<pre><?php _p(trim(highlight_string($this->objIssue->ExampleTemplate, true)), false); ?></pre>
		</div>
<?php	
	}
?>