<?php
	require('../includes/prepend.inc.php');

	$objRss = new QRssFeed('Qcodo Forums', 'http://www.qcodo.com/forums/',  'The Qcodo forums attempts to provide a community to post, discuss, ask, and converse about the current state of the framework, as well as provide an opportunity for members to discuss the future direction of Qcodo.');
	$objRss->Image = new QRssImage('http://www.qcodo.com/images/qcodo_smaller.png');
	$objRss->PubDate = new QDateTime(QDateTime::Now);

	$objMessageArray = Message::QueryArray(
		QQ::Equal(QQN::Message()->Topic->TopicLink->TopicLinkTypeId, TopicLinkType::Forum),
		QQ::Clause(
			QQ::OrderBy(QQN::Message()->PostDate, false),
			QQ::LimitInfo(25)
		)
	);

	foreach ($objMessageArray as $objMessage) {
		$objTopic = $objMessage->Topic;

		$strTitle = (($objTopic->CountMessages() > 1) ? 'Re: ' : '') . $objTopic->Name;
		$strLink = 'http://www.qcodo.com/forums/forum.php/' . $objTopic->TopicLink->ForumId . '/' . $objTopic->Id . '/lastpage';
		$strDescription = $objMessage->CompiledHtml;

		$objItem = new QRssItem($strTitle, $strLink, $strDescription);
		$objItem->Author = $objMessage->Person->DisplayName;
		$objItem->Comments = $objItem->Link;
		$objItem->PubDate = $objMessage->PostDate;
		$objItem->Guid = $objItem->Link;
		$objItem->GuidPermaLink = true;
		$objItem->AddCategory(new QRssCategory($objTopic->TopicLink->Forum->Name));

		$objRss->AddItem($objItem);
	}
	$objRss->Run();
?>