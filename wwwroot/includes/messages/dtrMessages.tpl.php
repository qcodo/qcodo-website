<?php
	$dttLocalize = QApplication::LocalizeDateTime($_ITEM->PostDate);
?>
<div class="messageBarRound <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBarRoundAlternate'; ?>"><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div></div>
<div class="messageBar <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBarAlternate'; ?>">
	<div class="name">
<?php
	if ($_CONTROL->ParentControl->IsMessageEditable($_ITEM)) {
		if ($_ITEM->ReplyNumber) {
			printf('<span class="replyNumber"><a href="#" title="Edit This Post" %s>Reply #%s</a> &nbsp;|&nbsp; </span>',
				$_CONTROL->ParentControl->pxyEditMessage->RenderAsEvents($_ITEM->Id, false), $_ITEM->ReplyNumber);
		} else {
			printf('<span class="replyNumber"><a href="#" title="Edit This Post" %s>Edit</a> &nbsp;|&nbsp; </span>',
				$_CONTROL->ParentControl->pxyEditMessage->RenderAsEvents($_ITEM->Id, false));
		}
	} else {
		if ($_ITEM->ReplyNumber) {
			printf('<span class="replyNumber">Reply #%s &nbsp;|&nbsp; </span>', $_ITEM->ReplyNumber);
		}
	}
?>
	<?php _p($_ITEM->Person->DisplayForForums, false); ?>
	</div>
	<div class="date">
	<?php _p($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm zz')); ?>
	<?php QApplication::DisplayTimezoneLink($dttLocalize); ?>
	</div>
</div>
<div class="messageBody <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBodyAlternate'; ?>">
	<?php _p($_ITEM->CompiledHtml, false); ?>
</div>
