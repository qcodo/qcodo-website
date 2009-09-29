<?php $_FORM->pnlContentHeadline->Render(); ?>

<div style="float: left;">
	<a href="<?php _p($this->objWikiVersion->WikiFile->GetDownloadUrl()); ?>" title="Download <?php _p($this->objWikiVersion->WikiFile->FileName); ?>"><img src="/images/download.png"/></a>
</div><div style="float: left; font-size: 11px; padding-top: 25px; padding-left: 4px; ">
	<a href="<?php _p($this->objWikiVersion->WikiFile->GetDownloadUrl()); ?>" title="Download <?php _p($this->objWikiVersion->WikiFile->FileName); ?>" style="font-size: 18px;">Download <strong><?php _p($this->objWikiVersion->WikiFile->FileName); ?></strong></a>

	<h3>
		filename:
		<strong><?php _p($this->objWikiVersion->WikiFile->FileName); ?></strong>

		&nbsp;|&nbsp;

		mime type: <strong><?php _p($this->objWikiVersion->WikiFile->FileMime); ?></strong>

		&nbsp;|&nbsp;

		file size: <strong><?php _p(QApplication::DisplayByteSize($this->objWikiVersion->WikiFile->FileSize)); ?></strong>
	</h3>
</div>
