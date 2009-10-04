<div style="padding-left: 40px; padding-bottom: 20px; margin-bottom: 20px; border-bottom: 1px solid #444;">
	<h2><a href="/forums/forum.php/<?php print $_ITEM->Id ?>"><?php _p($_ITEM->Name); ?></a></h2>
	<h3 style="margin-bottom: 4px;">
		topics: <strong><?php _p($_ITEM->TopicLink->TopicCount); ?></strong>
		&nbsp;|&nbsp;
		messages: <strong><?php _p($_ITEM->TopicLink->MessageCount); ?></strong>
<?php
	if ($_ITEM->TopicLink->LastPostDate) {
		$strRelative = QDateTime::Now()->Difference($_ITEM->TopicLink->LastPostDate)->SimpleDisplay();
		if ($strRelative == 'a day')
			$strRelative = 'yesterday';
		else if (!$strRelative)
			$strRelative = 'just now';
		else
			$strRelative .= ' ago';
?>
		&nbsp;|&nbsp;
		last: <strong><?php _p($_ITEM->TopicLink->LastPostDate->__toString('DDDD, MMMM D, YYYY')); ?></strong> (<?php _p($strRelative); ?>)
<?php } ?>
	</h3>
	<div style="font-size: 16px; color: #444;"><?php _p($_ITEM->Description, false); ?></div>
</div>