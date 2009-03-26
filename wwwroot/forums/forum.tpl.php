<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<style type="text/css">
		div.forumtest {
			border-top: 1px dotted #bbb; font-size: 10px; height: 20px; font-family: verdana;
		}
		
		div.forumtest a { display: block; color: #000; text-decoration: none; padding: 3px 10px 3px 10px; height: 14px;}
		div.forumtest a:hover { background-color: #aba; color: #335;}

		div.forumTopicsSelected a { background-color: #335; color: #fff; font-weight: bold; }
		
		div.forumTopic { float: left; margin-left: 25px; width: 735px;}
			div.forumTopic h1 { color: #333; margin: 0; padding: 0; }
			div.forumTopic h3 { color: #666; padding: 0; margin: 0; font-size: 10px; font-weight: normal; }
			
			span.paginator { margin: 0; padding: 0; }
				span.paginator span { list-style-type:none; display: inline; padding: 0; margin: 0; }
					span.paginator span.page a { text-decoration: none; color: #444; padding: 0 3px 0 3px; margin: 0 2px 0 2px;}
					span.paginator span.page a:hover { text-decoration: underline; color: #000; }
					span.paginator span.arrow { font-weight: bold; color: #ccc; margin: 0; padding: 0 3px 0 3px; }
					span.paginator span.arrow a { font-weight: bold; color: #444; text-decoration: none; }
					span.paginator span.arrow a:hover { text-decoration: underline; color: #000; }
					span.paginator span.selected { font-weight: bold; background-color: #ccf; padding: 0 3px 0 3px; margin: 0 2px 0 2px; border: 1px; border-style: solid; }
					span.paginator span.break { color: #666; margin: 0 5px 0 5px; }
					span.paginator span.ellipsis { color: #666; }

		a.forumAction { display: block; padding-left: 4px; text-decoration: none;}
			a.forumAction div {float: left; background-color: #d3d3d3; color: #9090a0; font-weight: bold; border-color: #e0e0e0; border-style: solid; border-width: 0;}
			a.forumAction div.a	{ width: 1px; height: 7px; position: relative; top: 3px; border-width: 1px 0; }
			a.forumAction div.b	{ width: 1px; height: 9px; position: relative; top: 2px; border-width: 1px 0; }
			a.forumAction div.c	{ width: 1px; height: 11px;position: relative; top: 1px; border-width: 1px 0; }
			a.forumAction div.d	{ width: 1px; height: 13px;position: relative; top: 1px;}
			a.forumAction div.e	{ width: 1px; height: 13px;position: relative; top: 0px; border-width: 1px 0; border-color: #ddd;}
			a.forumAction div.f	{ height: 15px; padding: 0 2px; font-size: 10px; font-family: Verdana, Arial, Helvetica; }
		a.forumActionActive div { background-color: #335; border-color: #99c; color: #fff; }
			a.forumActionActive div.e { border-color: #66a; }
		a.forumAction:hover div { background-color: #aba; border-color: #dfd; color: #335; }
			a.forumAction:hover div.e { border-color: #cec; }

		.forum_code { background-color: #ddddff; padding: 10px; margin-left: 20px; font-family: 'Lucida Console' 'Courier New' 'Courier' 'monospaced'; font-size: 11px; line-height: 13px; overflow: auto; width: auto;}

		div#dtrMessages { }
		div#dtrMessages div.messageBarRound { margin-top: 15px; }
		div#dtrMessages div.messageBarRound div { height: 1px; background-color: #aba; border-color: #dfd; border-style: solid; border-width: 0 1px 0 1px; }
		div#dtrMessages div.messageBarRound div.a { width: 725px; margin-left: 4px; }
		div#dtrMessages div.messageBarRound div.b { width: 729px; margin-left: 2px; }
		div#dtrMessages div.messageBarRound div.c { width: 731px; margin-left: 1px; }
		div#dtrMessages div.messageBarRound div.d { width: 733px; margin-left: 1px; border-width: 0; }
		div#dtrMessages div.messageBarRound div.e { width: 733px; margin-left: 0; }

		div#dtrMessages div.messageBar { background-color: #aba; height: 14px; padding: 0 10px 0 10px; }
		div#dtrMessages div.messageBar div.name { float: left; font-size: 11px; font-weight: bold; color: #343; height: 11px; position: relative; top: -3px; }
		div#dtrMessages div.messageBar div.date { float: right; font-size: 10px; font-weight: bold; font-family: arial, helvetica; color: #343; position: relative; top: -1px; }

		div#dtrMessages div.messageBody { background-color: #efe; width: 713px; padding: 10px; font-family: verdana, arial, helvetica, sans-serif; font-size: 12px; overflow: auto; border: 1px solid #aba; }
		
		div#dtrMessages div.messageBarRoundAlternate div { background-color: #ba8; border-color: #fec;}
		div#dtrMessages div.messageBarAlternate { background-color: #ba8; }
		div#dtrMessages div.messageBarAlternate div.name { color: #484030; }
		div#dtrMessages div.messageBarAlternate div.date { color: #484030; }
		div#dtrMessages div.messageBodyAlternate { background-color: #ffe; border-color: #ba8;}
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
		<div style="background-color: #eee; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 3px; font: 10px arial, helvetica; margin-top: 15px; height: 15px;">
			<div style="float: left; width: 330px;">
				<a href="#" class="forumAction" onclick="return false;">
					<div class="a"></div><div class="b"></div><div class="c"></div><div class="d"></div><div class="e"></div>
					<div class="f">Respond</div>
					<div class="e"></div><div class="d"></div><div class="c"></div><div class="b"></div><div class="a"></div>
				</a>
				<div style="float: left; margin-left: 8px; width: 0px;">&nbsp;</div>
				<a href="#" class="forumAction forumActionActive" onclick="return false;">
					<div class="a"></div><div class="b"></div><div class="c"></div><div class="d"></div><div class="e"></div>
					<div class="f">Email Notification</div>
					<div class="e"></div><div class="d"></div><div class="c"></div><div class="b"></div><div class="a"></div>
				</a>
				<div style="float: left; margin-left: 8px; width: 0px;">&nbsp;</div>
				<a href="#" class="forumAction" onclick="return false;">
					<div class="a"></div><div class="b"></div><div class="c"></div><div class="d"></div><div class="e"></div>
					<div class="f">Marked as Read</div>
					<div class="e"></div><div class="d"></div><div class="c"></div><div class="b"></div><div class="a"></div>
				</a>
			</div>
			<div style="float: right; margin-top: 1px;"><?php $this->dtrMessages->Paginator->Render(); ?></div>
		</div>
		
		<?php $this->dtrMessages->Render(); ?>
		
<?php
	}
?>
	</div>

	<br clear="all"/>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>