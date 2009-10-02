<h2>
	Submit a Bug Fix
	<span style="font-size: 12px;">for issue #<?php _p($this->objIssue->Id); ?></span>
</h2>

<p><strong>Thank you for helping out the Qcodo Development Framework by submitting a bug fix!</strong></p>
<p style="font-size: 11px;">To maintain
quality and consistency in the codebase, all submissions are reviewed before being committed to the core.
In order to ease the review process for the Qcodo administrators, please submit your codefix in one of the following formats:</p>
<ul style="font-size: 11px;">
	<li>Packaged as a <a href="/qpm/">QPM file</a></li>
	<li>As a branch of the <a href="http://www.github.com/qcodo/qcodo">Qcodo Git repository</a></li>
</ul>
<br/>

<?php $_FORM->txtSubmitFixLink->RenderForDialog('Name=QPM File Path &nbsp; or &nbsp; Qcodo Git-Branch URL','Width=500px'); ?>
<?php $_FORM->txtSubmitFixNotes->RenderForDialog('Name=Notes','Width=500px','Height=100px'); ?>
<br/>
<?php $_FORM->btnSubmitFixOkay->Render(); ?>
 &nbsp;or&nbsp; 
<?php $_FORM->btnSubmitFixCancel->Render(); ?>
