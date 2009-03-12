<?php
	$objMessageArray = $_ITEM->GetMessageArray(QQ::OrderBy(QQN::Message()->Id, false));
	if (count($objMessageArray) > 0) {
		$objMessage = $objMessageArray[0];
		$objPerson = $objMessage->Person;
	} else {
		$objPerson = new Person();
	}
	
	$strIcon = '<img src="/images/icons/topic.png" alt="Read Topic" title="Read Topic" width="16" height="16" border="0"/>';
	$strEmailIcon = '';
	$strStart = '';
	$strEnd = '';
	if (QApplication::$Login) {
		$objTopic = $_ITEM;
		if (!$objTopic->IsPersonAsReadOnceAssociated(QApplication::$Login)) {
			$strIcon = '<img src="/images/icons/topic_new.png" alt="New Topic" title="New Topic" width="16" height="16" border="0"/>';
			$strStart = '<b>';
			$strEnd = '</b>';
		} else if (!$objTopic->IsPersonAsReadAssociated(QApplication::$Login)) {
			$strIcon = '<img src="/images/icons/topic_unread.png" alt="New, Unread Posts" title="New, Unread Posts" width="16" height="16" border="0"/>';
			$strStart = '<b>';
			$strEnd = '</b>';
		} else
			$strIcon = '<img src="/images/icons/topic.png" alt="Already Read Topic" title="Already Read Topic" width="16" height="16" border="0"/>';

		if ($objTopic->IsPersonAsEmailAssociated(QApplication::$Login))
			$strEmailIcon = '<td width="16"><img src="/images/icons/mail.png" alt="Email Notification enabled for this topic" title="Email Notification enabled for this topic." width="16" height="16"/></td>';
		else
			$strEmailIcon = '<td width="16" class="small">&nbsp;</td>';
	}

	$strLastPostDate = 'N/A';
	if ($_ITEM->LastPostDate) {
		$dttNow = new QDateTime(QDateTime::Now);
		$intSpan = $dttNow->Timestamp - $_ITEM->LastPostDate->Timestamp;
		if ($intSpan > (60 * 60 * 24 * 10))
			$strLastPostDate = $_ITEM->LastPostDate->__toString('DDD MMM D YYYY');
		else
			$strLastPostDate = $_ITEM->LastPostDate->__toString('DDD MMM D h:mm z');
	}
?>
	<table cellpadding="5" cellspacing="1" style="margin-left: 15px; margin-bottom: -1px;">
	<tr onclick="document.location='/forums/topic.php/<?php echo $_ITEM->Id ?>/<?php echo $_CONTROL->PageNumber; ?>'" title="<?php echo(htmlentities($_ITEM->Name, ENT_COMPAT, QApplication::$EncodingType)); ?>" class="topic_item <?php _p(($_CONTROL->CurrentItemIndex % 2) ? 'topic_item_alternate' : '') ?>" id="topic_item_<?php echo $_CONTROL->CurrentItemIndex ?>" onmouseover="TopicOver(<?php echo $_CONTROL->CurrentItemIndex ?>)" onmouseout="TopicOut(<?php echo $_CONTROL->CurrentItemIndex ?>)">
			<?php _p($strEmailIcon) ?>
			<td width="16"><a href="/forums/topic.php/<?php echo $_ITEM->Id ?>/<?php echo $_CONTROL->PageNumber; ?>" class="forum_item_link"><?php _p($strIcon) ?></a></td>
			<td width="<?php _p((QApplication::$Login) ? '430' : '448'); ?>" class="topic_title"><a href="/forums/topic.php/<?php echo $_ITEM->Id ?>/<?php echo $_CONTROL->PageNumber; ?>" class="forum_item_link"><div style="overflow: hidden;"><?php echo $strStart . htmlentities($_ITEM->Name, ENT_COMPAT, QApplication::$EncodingType) . $strEnd; ?></div></a></td>
			<td width="46" class="topic_stats"><?php echo $_ITEM->CountMessages() ; ?></td>
			<td width="115" class="topic_stats"><?php print($strLastPostDate) ;?></td>
			<td width="134" class="topic_stats"><?php print($objPerson); ?></td>
	</tr></table>