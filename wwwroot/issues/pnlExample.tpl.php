<?php
	if ($_FORM->objIssue->__get($_CONTROL->ControlId)) {
?>
		<div class="issuePanelTitle">
			<div class="left"><?php _p($_FORM->GetLabelForExamplePanel($_CONTROL->ControlId)); ?></div>
			<div class="right"><a href="#" <?php $_FORM->pxyZoom->RenderAsEvents($_CONTROL->ControlId); ?>>Zoom</a></div>
		</div>
		<div class="issuePanelBody">
			<pre><?php _p($_FORM->GetContentForExamplePanel($_CONTROL->ControlId), false); ?></pre>
		</div>
<?php	
	}
?>