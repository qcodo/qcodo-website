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
		const Critical = 1;
		const High = 10;
		const Standard = 50;
		const Low = 100;

		const MaxId = 100;

		public static $NameArray = array(
			1 => 'Critical',
			10 => 'High',
			50 => 'Standard',
			100 => 'Low');

		public static $TokenArray = array(
			1 => 'Critical',
			10 => 'High',
			50 => 'Standard',
			100 => 'Low');

		public static function ToString($intIssuePriorityTypeId) {
			switch ($intIssuePriorityTypeId) {
				case 1: return 'Critical';
				case 10: return 'High';
				case 50: return 'Standard';
				case 100: return 'Low';
				default:
					throw new QCallerException(sprintf('Invalid intIssuePriorityTypeId: %s', $intIssuePriorityTypeId));
			}
		}

		public static function ToToken($intIssuePriorityTypeId) {
			switch ($intIssuePriorityTypeId) {
				case 1: return 'Critical';
				case 10: return 'High';
				case 50: return 'Standard';
				case 100: return 'Low';
				default:
					throw new QCallerException(sprintf('Invalid intIssuePriorityTypeId: %s', $intIssuePriorityTypeId));
			}
		}

	}
?>