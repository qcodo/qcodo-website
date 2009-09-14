<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h4 style="margin: 0; padding: 0;">Issue #<?php _p($this->objIssue->Id); ?></h4>
	<h1><?php _p($this->objIssue->Title); ?></h1>

	<div class="issuePanelTitle">Issue Details</div>
	<div class="issuePanelBody">
		<?php _p($this->DisplayField('Priority', $this->objIssue->Priority), false); ?>
		<?php _p($this->DisplayField('Status', $this->objIssue->Status), false); ?>
		<?php _p($this->DisplayField('Status', $this->objIssue->Resolution), false); ?>
		<?php _p($this->DisplayField('Category', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenCategory)), false); ?>
		<?php _p($this->DisplayField('OS', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenOperatingSystem)), false); ?>
		<?php _p($this->DisplayField('Qcodo', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenQcodoVersion)), false); ?>
		<?php _p($this->DisplayField('PHP', $this->objIssue->GetFieldOptionValueForIssueFieldToken(IssueField::TokenPhpVersion)), false); ?>
	</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>