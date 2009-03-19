<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<style type="text/css">
		div.forumtest {
			border-top: 1px dotted #bbb; font-size: 10px; height: 20px; font-family: verdana;
		}
		
		div.forumtest a { display: block; color: #000; text-decoration: none; padding: 3px 10px 3px 10px; height: 14px;}
		div.forumtest a:hover { background-color: #aba; color: #335;}

		div.forumTopicsSelected a { background-color: #335; color: #fff; }
		
		div.forumTopic { float: left; margin-left: 25px; width: 735px;}
			div.forumTopic h1 { color: #333; margin: 0; padding: 0; }
			div.forumTopic h3 { color: #666; padding: 0; margin: 0; font-size: 10px; font-weight: normal; }

		div#dtrMessages { }
		div#dtrMessages div.messageBarRound div { height: 1px; background-color: #408050; border-color: #ddffbb; border-style: solid; border-width: 0 1px 0 1px; }
		div#dtrMessages div.messageBarRound div.a { width: 725px; margin-left: 4px; }
		div#dtrMessages div.messageBarRound div.b { width: 729px; margin-left: 2px; }
		div#dtrMessages div.messageBarRound div.c { width: 731px; margin-left: 1px; }
		div#dtrMessages div.messageBarRound div.d { width: 733px; margin-left: 1px; border-width: 0; }
		div#dtrMessages div.messageBarRound div.e { width: 733px; margin-left: 0; }

		div#dtrMessages div.messageBar { background-color: #408050; height: 13px; padding: 0 5px 0 5px; }
		div#dtrMessages div.messageBar div.name { float: left; font-size: 11px; font-weight: bold; color: #fff; line-height: 8px;}
		div#dtrMessages div.messageBar div.date { float: right; font-size: 10px; font-weight: bold; font-family: arial, helvetica; color: #ddffbb; }

		div#dtrMessages div.message {margin-bottom: 15px; }

	</style>

	<div style="width: 220px; border: 5px solid #aba; font: 12px Verdana, Arial, Helvetica; float: left; ">
		<div style="background-color: #aba; font-size: 12px; font-weight: bold; padding: 0 10px 5px 10px; color: #343;">
			<?php _p($this->objForum->Name); ?>
		</div>
		
	 	<div style="padding: 5px 10px 5px 10px; font: 11px arial; font-style: italic; color: #666;">
	 		<?php _p($this->objForum->Description); ?>
		</div>
		<?php 
		$objTopicArray = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause(QQ::OrderBy(QQN::Topic()->LastPostDate, false), QQ::LimitInfo(20)));
		
		foreach ($objTopicArray as $objTopic) { ?>
			<div class="forumtest <?php if ($this->objTopic && ($objTopic->Id == $this->objTopic->Id)) _p('forumTopicsSelected'); ?>"><a href="/forums/forum.php/<?php _p($objTopic->ForumId);?>/<?php _p($objTopic->Id);?>" title="<?php _p($objTopic->SidenavTitle); ?>">
				<div style="float: left; width: 180px; height: 14px; overflow: hidden;"><?php _p(QString::Truncate($objTopic->Name, 36)); ?></div>
				<div style="float: right; width: 20px; text-align: right; height: 14px; overflow: hidden; font-family: arial, helvetica; font-size: 10px; font-style: italic; font-weight: bold; color: #999;"><?php _p($objTopic->CountMessages() - 1);?></div>
			</a></div>
		<?php } ?>
	</div>
	
	<div class="forumTopic">
<?php
	if ($this->objTopic) {
?>
		<h1><?php _p($this->objTopic->Name); ?></h1>
		<h3>
			thread:
			<strong><?php _p($this->objTopic->ReplyCount); ?></strong>
			&nbsp;|&nbsp;
			last: <strong><?php _p(QDateTime::Now()->Difference($this->objTopic->LastPostDate)->SimpleDisplay()); ?> ago</strong>
			&nbsp;|&nbsp;
			started: <strong><?php _p(strtolower($this->objFirstMessage->PostDate->__toString('DDDD, MMMM D, YYYY, h:mm z')))?></strong>
		</h3>
		<?php $this->dtrMessages->Render(); ?>
		
<?php
	}
?>
	</div>
	<br clear="all"/>

	<h2>
		<div class="right">
			Search in
			<?php $this->lstSearch->Render() ?>
			<?php $this->txtSearch->Render('MaxLength=200'); ?>
		</div>
		Discussion Forums
	</h2>
	<p>The Qcodo Discussion Forums provide a community to post, discuss, ask, and converse about the current state of the framework,
	as well as giving an opportunity for members to discuss the future direction of Qcodo.</p>

	<?php $this->dtrForums->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>