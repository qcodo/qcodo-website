<div class="item <?php if ($_FORM->objTopic && ($_ITEM->Id == $_FORM->objTopic->Id)) _p('selected'); ?>"><a href="/forums/forum.php/<?php _p($_ITEM->ForumId);?>/<?php _p($_ITEM->Id);?>" title="<?php _p($_ITEM->SidenavTitle); ?>">
	<div class="title"><?php _p(QString::Truncate($_ITEM->Name, 36)); ?></div>
	<div class="count"><?php _p($_ITEM->CountMessages() - 1);?></div>
</a></div>
