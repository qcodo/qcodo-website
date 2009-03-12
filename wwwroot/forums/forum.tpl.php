<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<?php
//	require('forum_header.inc');
?>
	<h2>
		<div class="right">
			Search in
			<?php $this->lstSearch->Render() ?>
			<?php $this->txtSearch->Render('MaxLength=200'); ?>
		</div>
		Forum: <?php _p($this->objForum->Name); ?>
	</h2>
	<p>
		<?php _p($this->objForum->Description, false); ?>
	</p>

	
	<div class="toolbar_top toolbar_top_for_tables"><table class="toolbar_table"><tr>
		<td class="small" valign="top">
			<a href="/forums/" class="toolbar_link" title="Back to All Forums">
				<img src="/images/icons/back.png" alt="Back to All Forums" class="toolbar_icon"/>
				Back to All Forums</a>
<?php
	if ((!$this->objForum->AnnounceOnlyFlag) ||
		((QApplication::$Login) && (QApplication::$Login->PersonTypeId == PersonType::Administrator))) {
?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/forums/post.php/<?php echo $this->objForum->Id; ?>" class="toolbar_link" title="Post a New Topic">
			<img src="/images/icons/forum_post.png" alt="Post a New Topic" class="toolbar_icon"/>
			Post a New Topic</a>
<?php
	}
?>
		</td>
		<td class="toolbar_table_right small" valign="top">
			Search in
			&nbsp;<?php // $this->lstSearch->Render('CssClass=listbox_search') ?>&nbsp;
			<?php // $this->txtSearch->Render('CssClass=textbox_search','MaxLength=200'); ?>
			&nbsp;
		</td>
	</tr></table></div>
	<div class="toolbar_in_between">
		<table cellpadding="5" cellspacing="1" style="margin-left: 15px;">
			<tr>
				<?php if (QApplication::$Login) _p('<td width="16"></td>'); ?>
				<td width="16"></td>
				<td width="<?php _p((QApplication::$Login) ? '430' : '448'); ?>"><img src="/images/forum_topic_title.png" alt="Title" style="width: 51px; height: 5px;" /></td>
				<td width="46"><img src="/images/forum_messages.png"></td>
				<td width="115"><img src="/images/forum_last_post.png"></td>
				<td width="134"><img src="/images/forum_last_post_by.png"></td>
			</tr>
		</table>
		<?php $this->dtrTopics->Render(); ?>
	</div>
	<div class="toolbar_bottom small toolbar_bottom_for_paginator">
		<?php $this->dtrTopics->Paginator->Render(); ?>
	</div>
	
<?php
	if (QApplication::$Login) {
?>
		<br/><div class="small" style="text-align: center;">
			Legend:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="/images/icons/mail.png" alt="" class="topic_key"> E-mail Notification Enabled
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="/images/icons/topic.png" alt="" class="topic_key"> Already Read Topic
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="/images/icons/topic_unread.png" alt="" class="topic_key"> New, Unread Posts in Topic
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="/images/icons/topic_new.png" alt="" class="topic_key"> New Topic
		</div>
<?php
	}
?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
