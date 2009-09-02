<?php
	/**
	 * The TopicType class defined here contains
	 * code for the TopicType enumerated type.  It represents
	 * the enumerated values found in the "topic_type" table
	 * in the database.
	 * 
	 * To use, you should use the TopicType subclass which
	 * extends this TopicTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TopicType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TopicTypeGen extends QBaseClass {
		const Forum = 1;
		const Issue = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'Forum',
			2 => 'Issue');

		public static $TokenArray = array(
			1 => 'Forum',
			2 => 'Issue');

		public static function ToString($intTopicTypeId) {
			switch ($intTopicTypeId) {
				case 1: return 'Forum';
				case 2: return 'Issue';
				default:
					throw new QCallerException(sprintf('Invalid intTopicTypeId: %s', $intTopicTypeId));
			}
		}

		public static function ToToken($intTopicTypeId) {
			switch ($intTopicTypeId) {
				case 1: return 'Forum';
				case 2: return 'Issue';
				default:
					throw new QCallerException(sprintf('Invalid intTopicTypeId: %s', $intTopicTypeId));
			}
		}

	}
?>