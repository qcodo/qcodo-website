<?php
	/**
	 * The IssuePriorityType class defined here contains
	 * code for the IssuePriorityType enumerated type.  It represents
	 * the enumerated values found in the "issue_priority_type" table
	 * in the database.
	 * 
	 * To use, you should use the IssuePriorityType subclass which
	 * extends this IssuePriorityTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssuePriorityType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class IssuePriorityTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intIssuePriorityTypeId) {
			switch ($intIssuePriorityTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIssuePriorityTypeId: %s', $intIssuePriorityTypeId));
			}
		}

		public static function ToToken($intIssuePriorityTypeId) {
			switch ($intIssuePriorityTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIssuePriorityTypeId: %s', $intIssuePriorityTypeId));
			}
		}

	}
?>