<?php
	/**
	 * The IssueStatusType class defined here contains
	 * code for the IssueStatusType enumerated type.  It represents
	 * the enumerated values found in the "issue_status_type" table
	 * in the database.
	 * 
	 * To use, you should use the IssueStatusType subclass which
	 * extends this IssueStatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueStatusType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class IssueStatusTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

		public static function ToToken($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

	}
?>