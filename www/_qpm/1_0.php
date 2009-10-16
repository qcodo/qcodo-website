<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	
	class QpmService extends QSoapService {
		
	}

	if (QApplication::PathInfo(0)) {
	} else
		QpmService::Run('QpmService');
?>