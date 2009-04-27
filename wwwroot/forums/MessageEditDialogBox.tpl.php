	<h3 style="margin: 0;">Reply to "<?php _p($_FORM->objTopic->Name); ?>"</h3>
	<br/>

	<?php $_CONTROL->txtMessage->Render('CssClass=forumMessage'); ?>
	<br/><br/>

	<?php $_CONTROL->btnOkay->Render(); ?>
	&nbsp;or&nbsp;
	<?php $_CONTROL->btnCancel->Render(); ?>