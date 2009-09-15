<?php
	if ($_FORM->objIssue->ExampleData) {
?>
		<div class="issuePanelTitle">Example Data</div>
		<div class="issuePanelBody">
			<code style="width: 200px;">
				<?php _b($this->objIssue->ExampleData); ?>
			</code>
		</div>
<?php	
	}
?>