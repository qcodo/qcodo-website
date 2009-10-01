<div class="<?php _p($_FORM->RenderTopicCss($_ITEM)); ?>"><a href="<?php _p($_FORM->RenderTopicLink($_ITEM)); ?>" title="<?php _p($_ITEM->SidenavTitle); ?>">
	<div class="title"><?php _p(QString::Truncate($_ITEM->Name, ($_ITEM->IsViewed() ? 30 : 25)), false); ?></div>
	<div class="count"><?php _p($_ITEM->MessageCount);?></div>
</a></div>
