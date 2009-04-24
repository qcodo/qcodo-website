<?php
	require('../includes/prepend.inc.php');

	if (QApplication::$Person)
		QApplication::Redirect('/profile/view.php/' . QApplication::$Person->Username);
	else
		QApplication::Redirect('/login/');
?>