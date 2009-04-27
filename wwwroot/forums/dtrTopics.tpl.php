<div class="<?php _p($_FORM->RenderTopicCss($_ITEM)); ?>"><a href="/forums/forum.php/<?php _p($_ITEM->ForumId);?>/<?php _p($_ITEM->Id);?>" title="<?php _p($_ITEM->SidenavTitle); ?>">
	<div class="title"><?php _p(QString::Truncate($_ITEM->Name, ($_FORM->IsTopicViewed($_ITEM) ? 30 : 25)), false); ?></div>
	<div class="count"><?php if ($intCount = ($_ITEM->MessageCount - 1)) _p($intCount);?></div>
</a></div>
