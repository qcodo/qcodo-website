<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	// Sanitize the Path in the PathInfo
	$strSanitizedFullPath = WikiItem::ValidateOrGenerateSanitizedFullPath(QApplication::$PathInfo);
	if ($strSanitizedFullPath) {
		QApplication::Redirect('/wiki/edit.php' . $strSanitizedFullPath . QApplication::GenerateQueryString());
	}

	// Get the WikiItemTypeId
	WikiItem::SanitizeForPath(QApplication::$PathInfo, $intWikiItemTypeId);

	// Based on the requested WikiItemTypeId, figure out the EditWikiForm to use
	$strWikiItemType = WikiItemType::$TokenArray[$intWikiItemTypeId];
	$strEditWikiClassName = 'EditWiki' . $strWikiItemType . 'Form';

	// Include the required class files
	require(dirname(__FILE__) . '/EditWikiForm.class.php');
	require(dirname(__FILE__) . '/' . $strEditWikiClassName . '.class.php');

	// Make a call to the QForm::Run() for that Form
	call_user_func_array(
		array($strEditWikiClassName, 'Run'),
		array($strEditWikiClassName, dirname(__FILE__) . '/' . $strEditWikiClassName . '.tpl.php')
	);
?>