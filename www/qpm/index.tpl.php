<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<div class="searchBar">
		<div class="title">Qcodo Package Manager (QPM) Repository</div>
		<div class="right wiki">
			<a href="/wiki/qcodo/qpm">Read more about <strong>QPM</strong></a>
		</div>
		<div class="right">
			<?php $this->btnNew->Render('Text=Create a New QPM Package'); ?>
		</div>
	</div>

	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">
		A repository of user-contributed QPM packages, including plugins, fixes, modifications, enhancements, etc.  While the repository
		can be browsed online here, you can use the "<strong>qpm</strong>" command line tool in your Qcodo installation to manage
		QPM packages in your system, including installing QPM packages, uploading and creating packages, etc.
	</div>
	<br/>

	<?php $this->dtrPackageCategories->Render(); ?>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>