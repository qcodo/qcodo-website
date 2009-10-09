<?php
	require('../../includes/prepend.inc.php');

	if (QApplication::$Person)
		QApplication::Redirect(QApplication::$Person->ViewProfileUrl);
	else
		QApplication::Redirect('/login/');
?>