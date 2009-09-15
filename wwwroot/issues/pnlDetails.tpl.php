<div class="issuePanelBody" style="border-top: 0;">
	<?php _p($this->DisplayField('Issue ID', $this->objIssue->Id), false); ?>
	<?php _p($this->DisplayField('Priority', $this->objIssue->Priority), false); ?>
	<?php _p($this->DisplayField('Status', $this->objIssue->Status), false); ?>
	<?php _p($this->DisplayField('Status', $this->objIssue->Resolution), false); ?>
	<?php _p($this->DisplayField('Category', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenCategory)), false); ?>
	<?php _p($this->DisplayField('OS', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenOperatingSystem)), false); ?>
	<?php _p($this->DisplayField('Qcodo', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenQcodoVersion)), false); ?>
	<?php _p($this->DisplayField('PHP', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenPhpVersion)), false); ?>
</div>