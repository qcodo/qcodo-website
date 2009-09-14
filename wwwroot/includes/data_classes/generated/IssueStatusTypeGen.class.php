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
		const Critical = 1;
		const High = 10;
		const Standard = 50;
		const Low = 100;
		const NewIssue = 101;
		const Open = 102;
		const Assigned = 103;
		const Fixed = 104;
		const Closed = 105;

		const MaxId = 105;

		public static $NameArray = array(
			1 => 'Critical',
			10 => 'High',
			50 => 'Standard',
			100 => 'Low',
			101 => 'New Issue',
			102 => 'Open',
			103 => 'Assigned',
			104 => 'Fixed',
			105 => 'Closed');

		public static $TokenArray = array(
			1 => 'Critical',
			10 => 'High',
			50 => 'Standard',
			100 => 'Low',
			101 => 'NewIssue',
			102 => 'Open',
			103 => 'Assigned',
			104 => 'Fixed',
			105 => 'Closed');

		public static function ToString($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				case 1: return 'Critical';
				case 10: return 'High';
				case 50: return 'Standard';
				case 100: return 'Low';
				case 101: return 'New Issue';
				case 102: return 'Open';
				case 103: return 'Assigned';
				case 104: return 'Fixed';
				case 105: return 'Closed';
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

		public static function ToToken($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				case 1: return 'Critical';
				case 10: return 'High';
				case 50: return 'Standard';
				case 100: return 'Low';
				case 101: return 'NewIssue';
				case 102: return 'Open';
				case 103: return 'Assigned';
				case 104: return 'Fixed';
				case 105: return 'Closed';
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

	}
?>