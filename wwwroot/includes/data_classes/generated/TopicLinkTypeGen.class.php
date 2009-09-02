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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intTopicLinkTypeId) {
			switch ($intTopicLinkTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intTopicLinkTypeId: %s', $intTopicLinkTypeId));
			}
		}

		public static function ToToken($intTopicLinkTypeId) {
			switch ($intTopicLinkTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intTopicLinkTypeId: %s', $intTopicLinkTypeId));
			}
		}

	}
?>