<?php
	$strRelative = QDateTime::Now()->Difference($this->objTopic->LastPostDate)->SimpleDisplay();
	if ($strRelative == 'a day')
		$strRelative = 'yesterday';
	else if (!$strRelative)
		$strRelative = 'just now';
	else
		$strRelative .= ' ago';
?>

<h1><?php _p($this->objTopic->Name); ?></h1>
<h3>
	forum:
	<strong><?php _p(strtolower($this->objTopic->Forum->Name)); ?></strong>

	<br/>

	thread:
	<strong><?php _p($this->objTopic->ReplyCount); ?></strong>
	
	&nbsp;|&nbsp;

	last: <strong><?php _p($strRelative); ?></strong>

	&nbsp;|&nbsp;

	started: <strong><?php _p($this->strPostStartedLinkText, false)?></strong>
</h3>