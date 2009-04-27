<?php
	$dttLocalize = QApplication::LocalizeDateTime($_ITEM->PostDate);
?>
<div class="messageBarRound <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBarRoundAlternate'; ?>"><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div></div>
<div class="messageBar <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBarAlternate'; ?>">
	<div class="name">
	<?php if ($_ITEM->ReplyNumber) _p('#' . $_ITEM->ReplyNumber . ' '); ?>
	<?php _p($_ITEM->Person->DisplayForForums, false); ?>
	</div>
	<div class="date">
	<?php _p($dttLocalize->__toString('DDDD, MMMM D, YYYY, h:mm zz')); ?>
	<?php QApplication::DisplayTimezoneLink($dttLocalize); ?>
	</div>
</div>
<div class="messageBody <?php if ($_CONTROL->CurrentItemIndex % 2) print 'messageBodyAlternate'; ?>">
	<?php _p(QWriteBox::DisplayHtml($_ITEM->Message, 'forum_code'), false); ?>
</div>
