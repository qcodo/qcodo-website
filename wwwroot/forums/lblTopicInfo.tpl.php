<?php
	$dttLocalize = QApplication::LocalizeDateTime($this->objFirstMessage->PostDate);
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
	thread:
	<strong><?php _p($this->objTopic->ReplyCount); ?></strong>
	&nbsp;|&nbsp;
	last: <strong><?php _p($strRelative); ?></strong>
	&nbsp;|&nbsp;
	started: <strong><?php _p(strtolower($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm z'))); ?>
		<?php _p(strtolower(QApplication::DisplayTimezoneLink($dttLocalize, false)), false); ?></strong>
</h3>