<?php
	/**
	 * The PersonType class defined here contains
	 * code for the PersonType enumerated type.  It represents
	 * the enumerated values found in the "person_type" table
	 * in the database.
	 * 
	 * To use, you should use the PersonType subclass which
	 * extends this PersonTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PersonType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class PersonTypeGen extends QBaseClass {
		const Administrator = 1;
		const Moderator = 2;
		const Contributor = 3;
		const RegisteredUser = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Administrator',
			2 => 'Moderator',
			3 => 'Contributor',
			4 => 'Registered User');

		public static $TokenArray = array(
			1 => 'Administrator',
			2 => 'Moderator',
			3 => 'Contributor',
			4 => 'RegisteredUser');

		public static function ToString($intPersonTypeId) {
			switch ($intPersonTypeId) {
				case 1: return 'Administrator';
				case 2: return 'Moderator';
				case 3: return 'Contributor';
				case 4: return 'Registered User';
				default:
					throw new QCallerException(sprintf('Invalid intPersonTypeId: %s', $intPersonTypeId));
			}
		}

		public static function ToToken($intPersonTypeId) {
			switch ($intPersonTypeId) {
				case 1: return 'Administrator';
				case 2: return 'Moderator';
				case 3: return 'Contributor';
				case 4: return 'RegisteredUser';
				default:
					throw new QCallerException(sprintf('Invalid intPersonTypeId: %s', $intPersonTypeId));
			}
		}

	}
?>