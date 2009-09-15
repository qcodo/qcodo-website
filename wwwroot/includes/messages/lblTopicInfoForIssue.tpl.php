<?php
	$strRelative = QDateTime::Now()->Difference($_CONTROL->ParentControl->objTopic->LastPostDate)->SimpleDisplay();
	if ($strRelative == 'a day')
		$strRelative = 'yesterday';
	else if (!$strRelative)
		$strRelative = 'just now';
	else
		$strRelative .= ' ago';
?>

<h3>
	reported: <strong><?php _p($_CONTROL->ParentControl->strPostStartedLinkText, false)?></strong>

	&nbsp;|&nbsp;

	by: <strong><?php _p($_CONTROL->ParentControl->objTopic->TopicLink->Issue->PostedByPerson->DisplayNameWithLink, false); ?></strong>

	&nbsp;|&nbsp;

	comments:
	<strong><?php _p($_CONTROL->ParentControl->objTopic->ReplyCount); ?></strong>
	
	&nbsp;|&nbsp;

	last: <strong><?php _p($strRelative); ?></strong>
</h3>