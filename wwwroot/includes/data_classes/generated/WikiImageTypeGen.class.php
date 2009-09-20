<?php
	/**
	 * The WikiImageType class defined here contains
	 * code for the WikiImageType enumerated type.  It represents
	 * the enumerated values found in the "wiki_image_type" table
	 * in the database.
	 * 
	 * To use, you should use the WikiImageType subclass which
	 * extends this WikiImageTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the WikiImageType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class WikiImageTypeGen extends QBaseClass {
		const Jpeg = 1;
		const Png = 2;
		const Gif = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Jpeg',
			2 => 'Png',
			3 => 'Gif');

		public static $TokenArray = array(
			1 => 'Jpeg',
			2 => 'Png',
			3 => 'Gif');

		public static function ToString($intWikiImageTypeId) {
			switch ($intWikiImageTypeId) {
				case 1: return 'Jpeg';
				case 2: return 'Png';
				case 3: return 'Gif';
				default:
					throw new QCallerException(sprintf('Invalid intWikiImageTypeId: %s', $intWikiImageTypeId));
			}
		}

		public static function ToToken($intWikiImageTypeId) {
			switch ($intWikiImageTypeId) {
				case 1: return 'Jpeg';
				case 2: return 'Png';
				case 3: return 'Gif';
				default:
					throw new QCallerException(sprintf('Invalid intWikiImageTypeId: %s', $intWikiImageTypeId));
			}
		}

	}
?>