<?php
	if ($_FORM->objIssue->ExampleData) {
?>
		<div class="issuePanelTitle">Example Data</div>
		<div class="issuePanelBody" style="overflow: auto;">
			<pre><?php _p($this->objIssue->ExampleData); ?></pre>
		</div>
<?php	
	}
?>