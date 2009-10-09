<?php
	require(dirname(__FILE__) . '/../includes/prepend.inc.php');
	QApplication::LogoutPerson();
	QApplication::ClearViewedTopicArray();
	QApplication::Redirect('/login/');
?>