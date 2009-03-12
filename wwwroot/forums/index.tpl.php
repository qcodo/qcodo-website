<?php require(__INCLUDES__ . '/header.inc.php'); ?>

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