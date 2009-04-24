<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<strong>User Profile</strong>
<h1><?php _p($this->mctPerson->Person->DisplayName); ?></h1>
<br/>
<?php $this->lblName->RenderForForm(); ?>
<?php $this->lblRegistrationDate->RenderForForm(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>