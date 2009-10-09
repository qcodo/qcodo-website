<?php
	/**
	 * The WikiItemType class defined here contains
	 * code for the WikiItemType enumerated type.  It represents
	 * the enumerated values found in the "wiki_item_type" table
	 * in the database.
	 * 
	 * To use, you should use the WikiItemType subclass which
	 * extends this WikiItemTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiItemType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class WikiItemTypeGen extends QBaseClass {
		const Page = 1;
		const Image = 2;
		const File = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Page',
			2 => 'Image',
			3 => 'File');

		public static $TokenArray = array(
			1 => 'Page',
			2 => 'Image',
			3 => 'File');

		public static function ToString($intWikiItemTypeId) {
			switch ($intWikiItemTypeId) {
				case 1: return 'Page';
				case 2: return 'Image';
				case 3: return 'File';
				default:
					throw new QCallerException(sprintf('Invalid intWikiItemTypeId: %s', $intWikiItemTypeId));
			}
		}

		public static function ToToken($intWikiItemTypeId) {
			switch ($intWikiItemTypeId) {
				case 1: return 'Page';
				case 2: return 'Image';
				case 3: return 'File';
				default:
					throw new QCallerException(sprintf('Invalid intWikiItemTypeId: %s', $intWikiItemTypeId));
			}
		}

	}
?>