<?php
	/**
	 * The ImageFileType class defined here contains
	 * code for the ImageFileType enumerated type.  It represents
	 * the enumerated values found in the "image_file_type" table
	 * in the database.
	 * 
	 * To use, you should use the ImageFileType subclass which
	 * extends this ImageFileTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ImageFileType class.
	 * 
	 * @package Qcodo Website
	 * @subpackage GeneratedDataObjects
	 */
	abstract class ImageFileTypeGen extends QBaseClass {
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

		public static function ToString($intImageFileTypeId) {
			switch ($intImageFileTypeId) {
				case 1: return 'Jpeg';
				case 2: return 'Png';
				case 3: return 'Gif';
				default:
					throw new QCallerException(sprintf('Invalid intImageFileTypeId: %s', $intImageFileTypeId));
			}
		}

		public static function ToToken($intImageFileTypeId) {
			switch ($intImageFileTypeId) {
				case 1: return 'Jpeg';
				case 2: return 'Png';
				case 3: return 'Gif';
				default:
					throw new QCallerException(sprintf('Invalid intImageFileTypeId: %s', $intImageFileTypeId));
			}
		}

	}
?>