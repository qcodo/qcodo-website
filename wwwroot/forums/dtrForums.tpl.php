<div class="forum" onmouseover="this.className='forum hover';" onmouseout="this.className='forum';" onclick="document.location='forum.php/<?php print $_ITEM->Id ?>'" title="<?php _p($_ITEM->Name); ?>">
	<div class="name"><a href="forum.php/<?php print $_ITEM->Id ?>"><?php _p($_ITEM->Name); ?></a></div>
	<p class="description">
		<?php _p($_ITEM->Description, false); ?>
	</p>
	<div class="stats">
		<div class="left">
			<strong><?php _p($_ITEM->CountMessages()); ?></strong> messages in <strong><?php _p($_ITEM->CountTopics()); ?></strong> topics
		</div>
		<div class="right">
			last post on <strong><?php _p($_ITEM->LastPostDate->__toString('DDD MMM D, h:mm z')); ?></strong>
		</div>
	</div>
</div>