		<div id="navbar">
			<div class="line">&nbsp;</div>
			<div class="links"><?php foreach ($_CONTROL->ctlNavBarArray as $ctlNavBar) $ctlNavBar->Render(); ?></div>
			<div class="title"><a href="/" title="Qcodo Home">&nbsp;</a></div>
		</div>
		<div id="subnav">
<?php if ($_CONTROL->intSubNavPadding) { ?>
			<div style="width: <?php _p($_CONTROL->intSubNavPadding); ?>px; " class="right">&nbsp;</div>
<?php } ?>
			<div class="line">&nbsp;</div>
			<div class="links"><?php foreach ($_CONTROL->ctlSubNavArray as $ctlSubNav) $ctlSubNav->Render(); ?></div>
			<div class="left"><?php $_CONTROL->ctlWelcomeImage->Render(); ?><?php $_CONTROL->ctlRegisterProfile->Render(); ?><?php $_CONTROL->ctlLoginOut->Render(); ?></div>
		</div>