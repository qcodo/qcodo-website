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

	<div class="topic">
<?php if (!$this->objTopic) { ?>
	<h2>Please select a topic on the left</h2>
<?php } else { ?>
	<h1><?php _p($this->objTopic->Name); ?></h1>
	<h3>
		thread:
		<strong><?php _p($this->objTopic->ReplyCount); ?></strong>
		&nbsp;|&nbsp;
		last: <strong><?php _p(QDateTime::Now()->Difference($this->objTopic->LastPostDate)->SimpleDisplay()); ?> ago</strong>
		&nbsp;|&nbsp;
		started: <strong><?php _p(strtolower($this->objFirstMessage->PostDate->__toString('DDDD, MMMM D, YYYY, h:mm z')))?></strong>
	</h3>

	<div class="controlBar">
		<div class="controls">
			<?php $this->btnRespond->Render(); ?>
			<a href="#" class="action" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Respond</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
			<div class="spacer">&nbsp;</div>
			<a href="#" class="action actionActive" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Email Notification</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
			<div class="spacer">&nbsp;</div>
			<a href="#" class="action" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Marked as Read</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
		</div>
		<div class="paginator"><?php $this->dtrMessages->Paginator->Render(); ?></div>
	</div>

	<br clear="all"/>
	<?php $this->dtrMessages->Render(); ?>
	<br clear="all"/>

	<div class="controlBar">
		<div class="controls">
			<a href="#" class="action" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Respond</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
			<div class="spacer">&nbsp;</div>
			<a href="#" class="action actionActive" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Email Notification</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
			<div class="spacer">&nbsp;</div>
			<a href="#" class="action" onclick="return false;">
				<div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div><div class="d">&nbsp;</div><div class="e">&nbsp;</div>
				<div class="f">Marked as Read</div>
				<div class="e">&nbsp;</div><div class="d">&nbsp;</div><div class="c">&nbsp;</div><div class="b">&nbsp;</div><div class="a">&nbsp;</div>
			</a>
		</div>
		<div class="paginator"><?php $this->dtrMessages->PaginatorAlternate->Render(); ?></div>
	</div>
<?php } /* if (!$this->objTopic) */ ?>
	</div>

	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>