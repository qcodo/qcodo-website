<?php
	require(__DATAGEN_CLASSES__ . '/TopicTypeGen.class.php');

	/**
	 * The TopicType class defined here contains any
	 * customized code for the TopicType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "topic_type" table in the database,
	 * and extends from the code generated abstract TopicTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package Qcodo Website
	 * @subpackage DataObjects
	 */
	abstract class TopicType extends TopicTypeGen {
	}
?>