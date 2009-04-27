<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="topicsShell">
	<div class="topicsBorder"><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div></div>
	<div class="topics">
		<div class="name"><?php _p($this->objForum->Name); ?></div>
	 	<div class="description"><?php _p($this->objForum->Description); ?></div>
	 	<div class="paginator"><?php $this->dtrTopics->Paginator->Render(); ?></div>
		<?php $this->dtrTopics->Render(); ?>
	</div>
	</div>

<?php if (!$this->objTopic) { ?>

	<div class="topic">
		<h2>Please select a topic on the left</h2>
	</div>

<?php } else { ?>

	<div class="topic">
		<?php $this->lblTopicInfo->Render(); ?>

		<div class="controlBar">
			<div class="controls">
				<?php $this->btnRespond1->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $this->btnNotify1->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $this->btnMarkAsViewed1->Render(); ?>
			</div>
			<div class="paginator"><?php $this->dtrMessages->Paginator->Render(); ?></div>
		</div>

		<br clear="all"/>
		<?php $this->dtrMessages->Render(); ?>
		<br clear="all"/>

		<div class="controlBar">
			<div class="controls">
				<?php $this->btnRespond2->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $this->btnNotify2->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $this->btnMarkAsViewed2->Render(); ?>
			</div>
			<div class="paginator"><?php $this->dtrMessages->PaginatorAlternate->Render(); ?></div>
		</div>
	</div>

<?php } /* if (!$this->objTopic) */ ?>

	<br clear="all"/>
	<?php $this->dlgMessage->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>