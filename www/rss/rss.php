<?php
	require('../../includes/prepend.inc.php');

	$objRss = new QRssFeed('Qcodo.com RSS Feed', 'http://www.qcodo.com/',
		'The Qcodo Development Framework is an open-source PHP framework that focuses on freeing developers from unnecessary tedious, mundane coding.  ' .
		'This RSS feed reports on the most recent activity, posts and community contributions to the framework via the Qcodo.com website.');
	$objRss->Image = new QRssImage('http://www.qcodo.com/images/qcodo_smaller.png');
	$objRss->PubDate = new QDateTime(QDateTime::Now);

	$objMessageArray = Message::QueryArray(
		QQ::Equal(QQN::Message()->Topic->TopicLink->TopicLinkTypeId, TopicLinkType::Forum),
		QQ::Clause(
			QQ::OrderBy(QQN::Message()->PostDate, false),
			QQ::LimitInfo(25)
		)
	);

	$objMessageArray = Message::LoadAll(
		QQ::Clause(
			QQ::OrderBy(QQN::Message()->PostDate, false),
			QQ::LimitInfo(25)
		)
	);

	foreach ($objMessageArray as $objMessage) {
		$objTopic = $objMessage->Topic;

		$strTitle = (($objTopic->CountMessages() > 1) ? 'Re: ' : '') . $objTopic->Name;
		$strLink = 'http://www.qcodo.com' . $objTopic->LinkLastPage;
		$strDescription = $objMessage->CompiledHtml;

		switch ($objTopic->TopicLink->TopicLinkTypeId) {
			case TopicLinkType::Forum:
				$strTitle = '[Forums] ' . $strTitle;
				break;
			case TopicLinkType::Issue:
				$strTitle = '[Issue] ' . $strTitle;
				break;
			case TopicLinkType::Package:
				$strTitle = '[QPM] ' . $strTitle;
				break;
			case TopicLinkType::WikiItem:
				$strTitle = '[Wiki] ' . $strTitle;
				break;
		}

		$objItem = new QRssItem($strTitle, $strLink, $strDescription);
		$objItem->Author = ($objMessage->Person) ? $objMessage->Person->DisplayName : 'Qcodo System Message';
		$objItem->Comments = $objItem->Link;
		$objItem->PubDate = $objMessage->PostDate;
		$objItem->Guid = $objItem->Link . '#' . $objMessage->ReplyNumber;
		$objItem->GuidPermaLink = true;
		
		switch ($objTopic->TopicLink->TopicLinkTypeId) {
			case TopicLinkType::Forum:
				$objItem->AddCategory(new QRssCategory($objTopic->TopicLink->Forum->Name));
				break;
			case TopicLinkType::Issue:
				break;
			case TopicLinkType::Package:
				break;
			case TopicLinkType::WikiItem:
				break;
		}

		$objRss->AddItem($objItem);
	}
	$objRss->Run();
?>