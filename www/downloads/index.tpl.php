<?php
	$strDevVersion = QApplication::GetQcodoVersion(false);
	$dttDevDate = QApplication::GetQcodoVersionDate(false);
	$strDevSizeTarGz = QApplication::GetQcodoVersionSize(false, true);
	$strDevSizeZip = QApplication::GetQcodoVersionSize(false, false);

	$strStableVersion = QApplication::GetQcodoVersion(true);
	$dttStableDate = QApplication::GetQcodoVersionDate(true);
	$strStableSizeTarGz = QApplication::GetQcodoVersionSize(true, true);
	$strStableSizeZip = QApplication::GetQcodoVersionSize(true, false);
	
	require(__INCLUDES__ . '/header.inc.php');
?>

	
	<div class="searchBar">
		<div class="title">Download Qcodo Releases</div>
		<div class="right issue">
			View the <a href="/wiki/qcodo/changelog">Change Log</a> 
		</div>
	</div>

	<div style="background-color: #ddd; padding: 5px 10px; border-bottom: 1px solid #999;">
		Users of any version >= 0.3.1 can upgrade/downgrade to any other version of Qcodo >= 0.3.1, or to the latest
		"development" or "stable", by using the "<strong>Qcodo Updater</strong>" command line
		tool.  The tool is located in the <strong>_devtools_cli</strong> or <strong>cli</strong> directory of your Qcodo installation.
		<br/><br/>
		<strong>Upgrading from Qcodo 0.3.x to 0.4.x?</strong>  Be sure and read the <a href="/wiki/upgrading_from_03x_to_04x">Wiki Page</a>
		on it for more information.
	</div>

	<h1 style="margin-top: 24px;">Current Stable Version</h1>
<?php if (QApplication::GetQcodoVersion(true)) { ?>
		<h3>
			version: <strong><?php _p($strStableVersion); ?></strong>
			&nbsp;|&nbsp;
			released: <strong><?php _p($dttStableDate->__toString(QDateTime::FormatDisplayDateTimeFull)); ?></strong>
		</h3>
	
		<div style="margin-left: 25px; margin-top: 12px; font-size: 18px;">
			<strong><a href="/downloads/get.php/release_stable_targz/qcodo-<?php _p($strStableVersion); ?>.tar.gz" class="link">qcodo-<?php _p($strStableVersion); ?>.tar.gz</a></strong>
			<h3>
				type: <strong>Mac OS X, Linux, and Unix Tarball</strong>
				&nbsp;|&nbsp;
				size: <strong><?php _p($strStableSizeTarGz) ?></strong>
			</h3>
		</div>
	
		<div style="margin-left: 25px; margin-top: 12px; font-size: 18px;">
			<strong><a href="/downloads/get.php/release_stable_zip/qcodo-<?php _p($strStableVersion); ?>.zip" class="link">qcodo-<?php _p($strStableVersion); ?>.zip</a></strong>
			<h3>
				type: <strong>Windows ZIP</strong>
				&nbsp;|&nbsp;
				size: <strong><?php _p($strStableSizeZip) ?></strong>
			</h3>
		</div>
<?php } else { ?>
		<p>Currently performing a Qcodo build...</p>
<?php } ?>



	<h1 style="margin-top: 24px;">Current Development Version</h1>
<?php if (QApplication::GetQcodoVersion(false)) { ?>
		<h3>
			version: <strong><?php _p($strDevVersion); ?></strong>
			&nbsp;|&nbsp;
			released: <strong><?php _p($dttDevDate->__toString(QDateTime::FormatDisplayDateTimeFull)); ?></strong>
		</h3>
	
		<div style="margin-left: 25px; margin-top: 12px; font-size: 18px;">
			<strong><a href="/downloads/get.php/release_dev_targz/qcodo-<?php _p($strDevVersion); ?>.tar.gz" class="link">qcodo-<?php _p($strDevVersion); ?>.tar.gz</a></strong>
			<h3>
				type: <strong>Mac OS X, Linux, and Unix Tarball</strong>
				&nbsp;|&nbsp;
				size: <strong><?php _p($strDevSizeTarGz) ?></strong>
			</h3>
		</div>
	
		<div style="margin-left: 25px; margin-top: 12px; font-size: 18px;">
			<strong><a href="/downloads/get.php/release_dev_zip/qcodo-<?php _p($strDevVersion); ?>.zip" class="link">qcodo-<?php _p($strDevVersion); ?>.zip</a></strong>
			<h3>
				type: <strong>Windows ZIP</strong>
				&nbsp;|&nbsp;
				size: <strong><?php _p($strDevSizeZip) ?></strong>
			</h3>
		</div>
<?php } else { ?>
		<p>Currently performing a Qcodo build...</p>
<?php } ?>


	<h1 style="margin-top: 24px;">Older Qcodo Releases</h1>
	Older (Beta 1 and Beta 2) releases of Qcodo are no longer available online.  If you need them for whatever reason, feel free to contact <a href="http://www.quasidea.com/">Quasidea Development</a>.

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>