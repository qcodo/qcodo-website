<?php
	require(__DATAGEN_META_CONTROLS__ . '/MessageMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Message class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Message object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MessageMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */
	class MessageMetaControl extends MessageMetaControlGen {
		public function ReplaceObject(Message $objMessage) {
			$this->objMessage = $objMessage;
			$this->Refresh();
		}
	}
?>