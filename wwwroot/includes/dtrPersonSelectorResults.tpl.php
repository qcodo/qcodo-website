<?php
	if (!$_ITEM) {
		printf('<div %s>&lt;Set to None&gt;</div>', $_CONTROL->ParentControl->pxyName->RenderAsEvents(null, false));
	} else {
		printf('<div %s>%s</div>', $_CONTROL->ParentControl->pxyName->RenderAsEvents($_ITEM->Id, false), QApplication::HtmlEntities($_ITEM->DisplayName));
	}
?>