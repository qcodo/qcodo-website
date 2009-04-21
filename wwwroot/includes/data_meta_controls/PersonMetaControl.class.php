<?php
	require(__DATAGEN_META_CONTROLS__ . '/PersonMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Person class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Person object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 */
	class PersonMetaControl extends PersonMetaControlGen {
		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new EmailTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objPerson->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = Person::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new TokenTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objPerson->Username;
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = Person::UsernameMaxLength;
			return $this->txtUsername;
		}


		/**
		 * Create and setup QListBox lstCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCountry_Create($strControlId = null) {
			$this->lstCountry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
			$objCountryArray = Country::QueryArray(QQ::All(), QQ::OrderBy(QQN::Country()->Name));
			if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->Id);
				if (($this->objPerson->Country) && ($this->objPerson->Country->Id == $objCountry->Id))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}
			return $this->lstCountry;
		}
		

		/**
		 * Create and setup QTextBox txtUrl
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUrl_Create($strControlId = null) {
			$this->txtUrl = new UrlTextBox($this->objParentObject, $strControlId);
			$this->txtUrl->Name = QApplication::Translate('Url');
			$this->txtUrl->Text = $this->objPerson->Url;
			$this->txtUrl->MaxLength = Person::UrlMaxLength;
			return $this->txtUrl;
		}
	}
?>