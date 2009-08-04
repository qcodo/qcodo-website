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
		const NewIssue = 1;
		const Open = 2;
		const Assigned = 3;
		const Fixed = 4;
		const ClosedFixed = 5;
		const ClosedWontFix = 6;
		const ClosedDuplicate = 7;
		const ClosedCannotReplicate = 8;

		const MaxId = 8;

		public static $NameArray = array(
			1 => 'New Issue',
			2 => 'Open',
			3 => 'Assigned',
			4 => 'Fixed',
			5 => 'Closed - Fixed',
			6 => 'Closed - Won\'t Fix',
			7 => 'Closed - Duplicate',
			8 => 'Closed - Cannot Replicate');

		public static $TokenArray = array(
			1 => 'NewIssue',
			2 => 'Open',
			3 => 'Assigned',
			4 => 'Fixed',
			5 => 'ClosedFixed',
			6 => 'ClosedWontFix',
			7 => 'ClosedDuplicate',
			8 => 'ClosedCannotReplicate');

		public static function ToString($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				case 1: return 'New Issue';
				case 2: return 'Open';
				case 3: return 'Assigned';
				case 4: return 'Fixed';
				case 5: return 'Closed - Fixed';
				case 6: return 'Closed - Won\'t Fix';
				case 7: return 'Closed - Duplicate';
				case 8: return 'Closed - Cannot Replicate';
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

		public static function ToToken($intIssueStatusTypeId) {
			switch ($intIssueStatusTypeId) {
				case 1: return 'NewIssue';
				case 2: return 'Open';
				case 3: return 'Assigned';
				case 4: return 'Fixed';
				case 5: return 'ClosedFixed';
				case 6: return 'ClosedWontFix';
				case 7: return 'ClosedDuplicate';
				case 8: return 'ClosedCannotReplicate';
				default:
					throw new QCallerException(sprintf('Invalid intIssueStatusTypeId: %s', $intIssueStatusTypeId));
			}
		}

	}
?>