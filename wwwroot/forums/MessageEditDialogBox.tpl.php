	<?php $_CONTROL->lblHeading->Render(); ?>
	<br/>

	<strong style="font-size: 10px;">FORUM</strong><br/>
	<?php $_CONTROL->lstForum->Render('Width=400px'); ?>
	<br/><br/>

	<strong style="font-size: 10px;">TOPIC TITLE</strong><br/>
	<?php $_CONTROL->txtTopicName->Render('CssClass=forumTopicName textbox'); ?>
	<br/><br/>

	<strong style="font-size: 10px;">MESSAGE CONTENT</strong><br/>
	<?php $_CONTROL->txtMessage->Render('CssClass=forumMessage'); ?>
	<br/><br/>

	<?php $_CONTROL->btnOkay->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_CONTROL->btnCancel->Render(); ?>