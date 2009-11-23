<?php
	require('../../includes/prepend.inc.php');

	$objTopic = Topic::Load(QApplication::PathInfo(0));
	if (!$objTopic || ($objTopic->TopicLink->TopicLinkTypeId != TopicLinkType::Forum)) {
		QApplication::Redirect('/');
	} else {
		QApplication::Redirect('/forums/forum.php/' . $objTopic->TopicLink->ForumId . '/' . $objTopic->Id);
	}
?>