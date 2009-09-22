<?php $_FORM->pnlVotes_Refresh(); ?>
<div class="issuePanelTitle">Votes</div>
<div class="issuePanelBody">
	<?php _p($_FORM->DisplayVoteCount(), false); ?>
	<?php $_FORM->dtrVotes->Render('CssClass=dtrVotes'); ?>
	<?php $_FORM->btnVotes->Render(); ?>
</div>
