<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">Qcodo Forums</div>
		<div class="right">
			<?php $this->txtSearch->Render(); ?>
		</div>
		<div class="right">
			<?php // $this->btnSearchAll->Render(); ?>
		</div>
		<div class="right">
			<?php // $this->btnSearchThis->Render(); ?>
		</div>
	</div>

	<p>The Qcodo Discussion Forums provide a community to post, discuss, ask, and converse about the current state of the framework,
	as well as giving an opportunity for members to discuss the future direction of Qcodo.</p>

	<?php $this->dtrForums->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>