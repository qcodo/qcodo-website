	<h3 style="margin: 0;">Reply to "<?php _p($_FORM->objTopic ? $_FORM->objTopic->Name : null); ?>"</h3>
	<br/>

	<?php $_CONTROL->txtMessage->Render('CssClass=forumMessage'); ?>
	<br/><br/>

	<?php $_CONTROL->btnOkay->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_CONTROL->btnCancel->Render(); ?>