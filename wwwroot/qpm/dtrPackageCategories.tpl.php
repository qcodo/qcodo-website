<div style="padding-left: 40px; padding-bottom: 20px; margin-bottom: 20px; border-bottom: 1px solid #444;">
	<h2><a href="/qpm/category.php/<?php _p($_ITEM->Token); ?>"><?php _p($_ITEM->Name); ?></a></h2>
	<h3 style="margin-bottom: 4px;">
		packages: <strong><?php _p($_ITEM->PackageCount); ?></strong>
<?php
	if ($_ITEM->LastPostDate) {
		$strRelative = QDateTime::Now()->Difference($_ITEM->LastPostDate)->SimpleDisplay();
		if ($strRelative == 'a day')
			$strRelative = 'yesterday';
		else if (!$strRelative)
			$strRelative = 'just now';
		else
			$strRelative .= ' ago';
?>
		&nbsp;|&nbsp;
		last upload: <strong><?php _p($_ITEM->LastPostDate->__toString('DDDD, MMMM D YYYY')); ?></strong> (<?php _p($strRelative); ?>)
<?php } ?>
	</h3>
	<div style="font-size: 16px; color: #444;"><?php _p($_ITEM->Description, false); ?></div>
</div>