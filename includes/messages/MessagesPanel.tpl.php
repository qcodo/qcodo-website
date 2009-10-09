
	<div class="topic <?php _p($_CONTROL->strAdditionalCssClass); ?>">
		<?php $_CONTROL->lblTopicInfo->Render(); ?>

		<div class="controlBar">
			<div class="controls">
				<?php $_CONTROL->btnRespond1->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $_CONTROL->btnNotify1->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $_CONTROL->btnMarkAsViewed1->Render(); ?>
			</div>
			<div class="paginator"><?php $_CONTROL->dtrMessages->Paginator->Render(); ?></div>
		</div>

		<br clear="all"/>
		<?php $_CONTROL->dtrMessages->Render(); ?>
		<br clear="all"/>

		<div class="controlBar">
			<div class="controls">
				<?php $_CONTROL->btnRespond2->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $_CONTROL->btnNotify2->Render(); ?>
				<div class="spacer">&nbsp;</div>
				<?php $_CONTROL->btnMarkAsViewed2->Render(); ?>
			</div>
			<div class="paginator"><?php $_CONTROL->dtrMessages->PaginatorAlternate->Render(); ?></div>
		</div>
	</div>

	<?php $_CONTROL->dlgMessage->Render(); ?>
