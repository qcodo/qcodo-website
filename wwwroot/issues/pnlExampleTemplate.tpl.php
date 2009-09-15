<?php
	if ($_FORM->objIssue->ExampleTemplate) {
?>
		<div class="issuePanelTitle">Example Template</div>
		<div class="issuePanelBody">
			<code style="width: 200px;">
				<?php _b($this->objIssue->ExampleTemplate); ?>
			</code>
		</div>
<?php	
	}
?>