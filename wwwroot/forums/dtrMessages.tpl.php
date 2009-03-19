<div class="messageBarRound">
	<div class="a">&nbsp;</div>
	<div class="b">&nbsp;</div>
	<div class="c">&nbsp;</div>
	<div class="d">&nbsp;</div>
	<div class="e">&nbsp;</div>
</div>
<div class="messageBar">
	<div class="name">
		<?php _p($_ITEM->Person->DisplayForForums); ?>
	</div>
	<div class="date">
		<?php _p($_ITEM->PostDate->__toString('DDDD, MMMM D, YYYY, h:mm z')); ?>
	</div>
</div>
<div class="message">
	<?php _p(QWriteBox::DisplayHtml($_ITEM->Message, 'code'), false); ?>
</div>
