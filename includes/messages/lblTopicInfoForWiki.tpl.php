<?php
	if ($_CONTROL->ParentControl->objTopic->LastPostDate) {
		$strRelative = QDateTime::Now()->Difference($_CONTROL->ParentControl->objTopic->LastPostDate)->SimpleDisplay();
		if ($strRelative == 'a day')
			$strRelative = 'yesterday';
		else if (!$strRelative)
			$strRelative = 'just now';
		else
			$strRelative .= ' ago';
	} else {
		$strRelative = 'none';
	}
?>

<h1>Comments</h1>

<h3>
	comments:
	<strong><?php _p($_CONTROL->ParentControl->objTopic->CommentCount); ?></strong>
	
	&nbsp;|&nbsp;

	last: <strong><?php _p($strRelative); ?></strong>
</h3>