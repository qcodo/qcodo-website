<div class="issuePanelBody" style="border-top: 0;">
	<?php _p($this->DisplayField('priority', $this->objIssue->Priority), false); ?>
	<?php _p($this->DisplayField('status', $this->objIssue->Status), false); ?>
	<?php _p($this->DisplayField('resolution', $this->objIssue->Resolution), false); ?>
	<?php _p($this->DisplayField('assigned to', $this->objIssue->AssignedToPerson ? $this->objIssue->AssignedToPerson->DisplayNameWithLink : null, false), false); ?>
	<?php _p($this->DisplayField('due date', $this->objIssue->DueDate), false); ?>

	<br/>

	<?php _p($this->DisplayField('qcodo', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenQcodoVersion)), false); ?>
	<?php _p($this->DisplayField('category', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenCategory)), false); ?>
	<?php _p($this->DisplayField('php', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenPhpVersion)), false); ?>
	<?php _p($this->DisplayField('database', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenDatabase)), false); ?>
	<?php _p($this->DisplayField('webserver', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenWebServer)), false); ?>
	<?php _p($this->DisplayField('os', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenOperatingSystem)), false); ?>
	<?php _p($this->DisplayField('browser', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenBrowser)), false); ?>
	<br clear="all"/>
</div>