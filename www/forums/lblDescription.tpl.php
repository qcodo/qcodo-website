<p style="margin-top: 0; margin-bottom: 6px;"><?php _p($this->objForum->Description); ?></p>
<?php if ($this->btnPost->Visible) { ?>
	<div style="margin-top: 0; margin-bottom: 6px; font-size: 10px; font-family: arial, helvetica; font-style: normal;"><?php $this->btnPost->Render(); ?><br/></div>
<?php } ?>