	<?php $_CONTROL->lblHeading->Render(); ?>
	<br/>

	<?php $_CONTROL->lstForum->RenderForDialog('Width=400px'); ?>
	<?php $_CONTROL->txtTopicName->RenderForDialog('CssClass=forumTopicName textbox'); ?>
	<?php $_CONTROL->txtMessage->RenderForDialog('CssClass=forumMessage','Instructions=To apply formatting, use <a href="/wiki/qcodo/qtextstyle" target="_blank">QTextStyle Formatting</a>.'); ?>
	
	<?php $_CONTROL->btnOkay->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_CONTROL->btnCancel->Render(); ?>