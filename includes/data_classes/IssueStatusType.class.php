<?php
	require(__DATAGEN_CLASSES__ . '/IssueStatusTypeGen.class.php');

	/**
	 * The IssueStatusType class defined here contains any
	 * customized code for the IssueStatusType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "issue_status_type" table in the database,
	 * and extends from the code generated abstract IssueStatusTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 */
	abstract class IssueStatusType extends IssueStatusTypeGen {
	}
?>