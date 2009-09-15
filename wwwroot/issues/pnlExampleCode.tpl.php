<?php
	if ($_FORM->objIssue->ExampleCode) {
?>
		<div class="issuePanelTitle">Example Code</div>
		<div class="issuePanelBody">
			<code style="width: 200px;">
				<?php _b($this->objIssue->ExampleCode); ?>
			</code>
		</div>
<?php	
	}
?>