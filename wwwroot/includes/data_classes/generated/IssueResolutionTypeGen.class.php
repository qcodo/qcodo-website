<?php
	/**
	 * The IssueResolutionType class defined here contains
	 * code for the IssueResolutionType enumerated type.  It represents
	 * the enumerated values found in the "issue_resolution_type" table
	 * in the database.
	 * 
	 * To use, you should use the IssueResolutionType subclass which
	 * extends this IssueResolutionTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IssueResolutionType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class IssueResolutionTypeGen extends QBaseClass {
		const Fixed = 1;
		const WontFix = 2;
		const Duplicate = 3;
		const CannotReplicate = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Fixed',
			2 => 'Won\'t Fix',
			3 => 'Duplicate',
			4 => 'Cannot Replicate');

		public static $TokenArray = array(
			1 => 'Fixed',
			2 => 'WontFix',
			3 => 'Duplicate',
			4 => 'CannotReplicate');

		public static function ToString($intIssueResolutionTypeId) {
			switch ($intIssueResolutionTypeId) {
				case 1: return 'Fixed';
				case 2: return 'Won\'t Fix';
				case 3: return 'Duplicate';
				case 4: return 'Cannot Replicate';
				default:
					throw new QCallerException(sprintf('Invalid intIssueResolutionTypeId: %s', $intIssueResolutionTypeId));
			}
		}

		public static function ToToken($intIssueResolutionTypeId) {
			switch ($intIssueResolutionTypeId) {
				case 1: return 'Fixed';
				case 2: return 'WontFix';
				case 3: return 'Duplicate';
				case 4: return 'CannotReplicate';
				default:
					throw new QCallerException(sprintf('Invalid intIssueResolutionTypeId: %s', $intIssueResolutionTypeId));
			}
		}

	}
?>