<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<link rel="alternate" type="application/rss+xml" title="Qcodo Forums" href="/rss/forums.php" />

	<div class="searchBar">
		<div class="title"><?php $this->lblHeader->Render(); ?></div>
		<div class="right">
			<?php $this->txtSearch->Render(); ?>
		</div>
		<div class="right">
			<?php $this->btnSearchAll->Render(); ?>
		</div>
		<div class="right">
			<?php $this->btnSearchThis->Render(); ?>
		</div>
	</div>

	<div class="topicsShell">
	<div class="topics" style="border-top: 0; border-color: #ccd; ">
		<?php $this->lblDescription->Render(); ?>
	 	<div class="paginator"><?php $this->dtrTopics->Paginator->Render(); ?></div>
		<?php $this->dtrTopics->Render(); ?>
	</div>
	</div>

<?php
	if (!$this->objTopic) {
		$strMessage = ($this->dtrTopics->TotalItemCount) ? 'Please select a topic on the left' : 'No topics found<br/>Please try another search'; 
?>
		<div class="topic" style="margin-top: 12px;">
			<h2><?php _p($strMessage, false); ?></h2>
		</div>

<?php
	}
?>

	<?php $this->pnlMessages->Render(); ?>
	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>