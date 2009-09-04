<div class="forum" onmouseover="this.className='forum hover';" onmouseout="this.className='forum';" onclick="document.location='forum.php/<?php print $_ITEM->Id ?>'" title="<?php _p($_ITEM->Name); ?>">
	<div class="name"><a href="forum.php/<?php print $_ITEM->Id ?>"><?php _p($_ITEM->Name); ?></a></div>
	<p class="description">
		<?php _p($_ITEM->Description, false); ?>
	</p>
	<div class="stats">
		<div class="left">
			<strong><?php _p($_ITEM->TopicLink->MessageCount); ?></strong> message<?php _p(($_ITEM->TopicLink->MessageCount != 1) ? 's' : ''); ?> in <strong><?php _p($_ITEM->TopicLink->TopicCount); ?></strong> topic<?php _p(($_ITEM->TopicLink->TopicCount != 1) ? 's' : ''); ?>
		</div>
		<div class="right">
			<?php if ($_ITEM->TopicLink->LastPostDate) { ?>
				last post on <strong><?php _p($_ITEM->TopicLink->LastPostDate->__toString('DDD MMM D, h:mm z')); ?></strong>
			<?php } ?>
		</div>
	</div>
</div>