<h2>Assign Issue</h2>

<p>Please enter the name of a user below and hit ENTER,<br/>then select the user from the results list.</p>

<?php $_CONTROL->txtMemberSearch->RenderForDialog('Name=Name or Username'); ?>
<?php $_CONTROL->dtrResults->RenderForDialog('Name=Member Search Results'); ?>
<br/>
<?php $_CONTROL->btnCancel->Render(); ?>