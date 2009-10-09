<h2>Submit Your Site or Project</h2>

<p>Have you developed something using Qcodo you would like to share with others?  Feel free and post your site, company, project or application here!</p>
<p>Fields in <strong>BOLD</strong> are required.</p>
<p style="font-style: italic; font-size: 10px; color: #666;">Please note: submissions are not automatically posted and most be cleared for publish by a Qcodo administrator.</p>

<?php $_FORM->txtName->RenderForDialog('Name=Name of Site or Application', 'Width=350px'); ?>
<?php $_FORM->txtDescription->RenderForDialog('Name=Description', 'Width=350px', 'Height=100px'); ?>
<?php $_FORM->txtUrl->RenderForDialog('Name=URL', 'Width=350px'); ?>
<?php $_FORM->flcImage->RenderForDialog('Name=Icon or Image', 'Instructions=Must be a square PNG, JPG or GIF image, no larger than 500x500'); ?>

<br/>

<?php $_FORM->btnOkay->Render('Text=Update'); ?>
&nbsp;or&nbsp;
<?php $_FORM->btnCancel->Render('Text=Cancel'); ?>
