<?php
	require(__DATAGEN_CLASSES__ . '/ImageFileTypeGen.class.php');

	/**
	 * The ImageFileType class defined here contains any
	 * customized code for the ImageFileType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "wiki_image_type" table in the database,
	 * and extends from the code generated abstract ImageFileTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 */
	abstract class ImageFileType extends ImageFileTypeGen {
		public static $ExtensionArray = array(
			1 => 'jpg',
			2 => 'png',
			3 => 'gif');
		public static $ContentTypeArray = array(
			1 => 'image/jpeg',
			2 => 'image/png',
			3 => 'image/gif');
	}
?>