<div class="<?php _p($_FORM->RenderTopicCss($_ITEM)); ?>" title="<?php _p($_ITEM->SidenavTitle); ?>" onmouseover="topicOver(this);" onmouseout="topicOut(this);" onclick="document.location='<?php _p($_FORM->RenderTopicLink($_ITEM)); ?>'">
	<div class="title"><div style="width: 600px;">
		<a href="<?php _p($_FORM->RenderTopicLink($_ITEM)); ?>" title="<?php _p($_ITEM->SidenavTitle); ?>"><?php _p(QString::Truncate($_ITEM->Name, 60), false); ?></a>
	</div></div>
	<div class="count"><?php _p($_ITEM->MessageCount);?></div>
</div>