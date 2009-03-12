<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<style type="text/css">
		div.forumtest {
			border-top: 1px dotted #bbb; font-size: 10px; height: 20px; font-family: verdana;
		}
		
		div.forumtest a { display: block; color: #000; text-decoration: none; padding: 3px 10px 3px 10px; height: 14px;}
		div.forumtest a:hover { background-color: #aba; color: #335;}
		
		div.selected a { background-color: #335; color: #fff; }
	</style>

	<div style="width: 220px; border: 5px solid #aba; font: 12px Verdana, Arial, Helvetica; float: left; ">
		<div style="background-color: #aba; font-size: 12px; font-weight: bold; padding: 0 10px 5px 10px; color: #343;">
			<?php _p($this->objForum->Name); ?>
		</div>
		
	 	<div style="padding: 5px 10px 5px 10px; font: 11px arial; font-style: italic; color: #666;">
	 		<?php _p($this->objForum->Description); ?>
		</div>
		<?php 
		$objTopicArray = Topic::LoadArrayByForumId($this->objForum->Id, QQ::Clause(QQ::LimitInfo(20)));
		
		foreach ($objTopicArray as $objTopic) { ?>
			<div class="forumtest <?php if ($this->objTopic && ($objTopic->Id == $this->objTopic->Id)) _p('selected'); ?>"><a href="/forums/forum.php/<?php _p($objTopic->ForumId);?>/<?php _p($objTopic->Id);?>" title="<?php _p($objTopic->Name); ?> (<?php _p($objTopic->LastPostDate->__toString('MMM D YYYY')); ?>)">
				<div style="float: left; width: 180px; height: 14px; overflow: hidden;"><?php _p(QString::Truncate($objTopic->Name, 36)); ?></div>
				<div style="float: right; width: 20px; text-align: right; height: 14px; overflow: hidden; font-family: arial, helvetica; font-size: 10px; font-style: italic; font-weight: bold; color: #999;"><?php _p($objTopic->CountMessages() - 1);?></div>
			</a></div>
		<?php } ?>
	</div>
	
	<div style="float: left; margin-left: 25px;">
<?php
	if ($this->objTopic) {
		print ($this->objTopic->Name);
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