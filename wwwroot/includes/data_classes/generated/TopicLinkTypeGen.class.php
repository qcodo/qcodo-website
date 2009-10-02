<?php
	/**
	 * The TopicLinkType class defined here contains
	 * code for the TopicLinkType enumerated type.  It represents
	 * the enumerated values found in the "topic_link_type" table
	 * in the database.
	 * 
	 * To use, you should use the TopicLinkType subclass which
	 * extends this TopicLinkTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TopicLinkType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TopicLinkTypeGen extends QBaseClass {
		const Forum = 1;
		const Issue = 2;
		const WikiItem = 3;
		const Package = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'Forum',
			2 => 'Issue',
			3 => 'Wiki Item',
			4 => 'Package');

		public static $TokenArray = array(
			1 => 'Forum',
			2 => 'Issue',
			3 => 'WikiItem',
			4 => 'Package');

		public static function ToString($intTopicLinkTypeId) {
			switch ($intTopicLinkTypeId) {
				case 1: return 'Forum';
				case 2: return 'Issue';
				case 3: return 'Wiki Item';
				case 4: return 'Package';
				default:
					throw new QCallerException(sprintf('Invalid intTopicLinkTypeId: %s', $intTopicLinkTypeId));
			}
		}

		public static function ToToken($intTopicLinkTypeId) {
			switch ($intTopicLinkTypeId) {
				case 1: return 'Forum';
				case 2: return 'Issue';
				case 3: return 'WikiItem';
				case 4: return 'Package';
				default:
					throw new QCallerException(sprintf('Invalid intTopicLinkTypeId: %s', $intTopicLinkTypeId));
			}
		}

	}
?>