<?php if ($_FORM->objSelectedShowcase) { ?>
	<h2><?php _p($_FORM->objSelectedShowcase->Name); ?></h2>
	<img src="<?php _p($_FORM->objSelectedShowcase->GetDialogBoxPath()); ?>" style="width: 300px; height: 300px; margin: 20px 45px;"/><br/>
	<?php _b($_FORM->objSelectedShowcase->Description); ?><br/>
	<p>For more information, visit <a href="<?php _p($_FORM->objSelectedShowcase->Url); ?>"><?php _p($_FORM->objSelectedShowcase->Url); ?></a></p>
	<p><?php $this->btnClose->Render('Text=Close Window'); ?></p>
<?php } ?>