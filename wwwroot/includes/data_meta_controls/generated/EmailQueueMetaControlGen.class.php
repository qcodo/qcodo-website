<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EmailQueue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EmailQueue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EmailQueueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package Qcodo Website
	 * @subpackage MetaControls
	 * property-read EmailQueue $EmailQueue the actual EmailQueue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ToAddressControl
	 * property-read QLabel $ToAddressLabel
	 * property QTextBox $FromAddressControl
	 * property-read QLabel $FromAddressLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $BodyControl
	 * property-read QLabel $BodyLabel
	 * property QTextBox $HtmlControl
	 * property-read QLabel $HtmlLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EmailQueueMetaControlGen extends QBaseClass {
		// General Variables
		protected $objEmailQueue;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of EmailQueue's individual data fields
		protected $lblId;
		protected $txtToAddress;
		protected $txtFromAddress;
		protected $txtSubject;
		protected $txtBody;
		protected $txtHtml;

		// Controls that allow the viewing of EmailQueue's individual data fields
		protected $lblToAddress;
		protected $lblFromAddress;
		protected $lblSubject;
		protected $lblBody;
		protected $lblHtml;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EmailQueueMetaControl to edit a single EmailQueue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EmailQueue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailQueueMetaControl
		 * @param EmailQueue $objEmailQueue new or existing EmailQueue object
		 */
		 public function __construct($objParentObject, EmailQueue $objEmailQueue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EmailQueueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EmailQueue object
			$this->objEmailQueue = $objEmailQueue;

			// Figure out if we're Editing or Creating New
			if ($this->objEmailQueue->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailQueueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EmailQueue object creation - defaults to CreateOrEdit
 		 * @return EmailQueueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEmailQueue = EmailQueue::Load($intId);

				// EmailQueue was found -- return it!
				if ($objEmailQueue)
					return new EmailQueueMetaControl($objParentObject, $objEmailQueue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EmailQueue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EmailQueueMetaControl($objParentObject, new EmailQueue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailQueue object creation - defaults to CreateOrEdit
		 * @return EmailQueueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EmailQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailQueue object creation - defaults to CreateOrEdit
		 * @return EmailQueueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EmailQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objEmailQueue->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtToAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToAddress_Create($strControlId = null) {
			$this->txtToAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToAddress->Name = QApplication::Translate('To Address');
			$this->txtToAddress->Text = $this->objEmailQueue->ToAddress;
			$this->txtToAddress->MaxLength = EmailQueue::ToAddressMaxLength;
			return $this->txtToAddress;
		}

		/**
		 * Create and setup QLabel lblToAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToAddress_Create($strControlId = null) {
			$this->lblToAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblToAddress->Name = QApplication::Translate('To Address');
			$this->lblToAddress->Text = $this->objEmailQueue->ToAddress;
			return $this->lblToAddress;
		}

		/**
		 * Create and setup QTextBox txtFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFromAddress_Create($strControlId = null) {
			$this->txtFromAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFromAddress->Name = QApplication::Translate('From Address');
			$this->txtFromAddress->Text = $this->objEmailQueue->FromAddress;
			$this->txtFromAddress->MaxLength = EmailQueue::FromAddressMaxLength;
			return $this->txtFromAddress;
		}

		/**
		 * Create and setup QLabel lblFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromAddress_Create($strControlId = null) {
			$this->lblFromAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromAddress->Name = QApplication::Translate('From Address');
			$this->lblFromAddress->Text = $this->objEmailQueue->FromAddress;
			return $this->lblFromAddress;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objEmailQueue->Subject;
			$this->txtSubject->TextMode = QTextMode::MultiLine;
			return $this->txtSubject;
		}

		/**
		 * Create and setup QLabel lblSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSubject_Create($strControlId = null) {
			$this->lblSubject = new QLabel($this->objParentObject, $strControlId);
			$this->lblSubject->Name = QApplication::Translate('Subject');
			$this->lblSubject->Text = $this->objEmailQueue->Subject;
			return $this->lblSubject;
		}

		/**
		 * Create and setup QTextBox txtBody
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBody_Create($strControlId = null) {
			$this->txtBody = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBody->Name = QApplication::Translate('Body');
			$this->txtBody->Text = $this->objEmailQueue->Body;
			$this->txtBody->TextMode = QTextMode::MultiLine;
			return $this->txtBody;
		}

		/**
		 * Create and setup QLabel lblBody
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBody_Create($strControlId = null) {
			$this->lblBody = new QLabel($this->objParentObject, $strControlId);
			$this->lblBody->Name = QApplication::Translate('Body');
			$this->lblBody->Text = $this->objEmailQueue->Body;
			return $this->lblBody;
		}

		/**
		 * Create and setup QTextBox txtHtml
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtHtml_Create($strControlId = null) {
			$this->txtHtml = new QTextBox($this->objParentObject, $strControlId);
			$this->txtHtml->Name = QApplication::Translate('Html');
			$this->txtHtml->Text = $this->objEmailQueue->Html;
			$this->txtHtml->TextMode = QTextMode::MultiLine;
			return $this->txtHtml;
		}

		/**
		 * Create and setup QLabel lblHtml
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHtml_Create($strControlId = null) {
			$this->lblHtml = new QLabel($this->objParentObject, $strControlId);
			$this->lblHtml->Name = QApplication::Translate('Html');
			$this->lblHtml->Text = $this->objEmailQueue->Html;
			return $this->lblHtml;
		}



		/**
		 * Refresh this MetaControl with Data from the local EmailQueue object.
		 * @param boolean $blnReload reload EmailQueue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEmailQueue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEmailQueue->Id;

			if ($this->txtToAddress) $this->txtToAddress->Text = $this->objEmailQueue->ToAddress;
			if ($this->lblToAddress) $this->lblToAddress->Text = $this->objEmailQueue->ToAddress;

			if ($this->txtFromAddress) $this->txtFromAddress->Text = $this->objEmailQueue->FromAddress;
			if ($this->lblFromAddress) $this->lblFromAddress->Text = $this->objEmailQueue->FromAddress;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objEmailQueue->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objEmailQueue->Subject;

			if ($this->txtBody) $this->txtBody->Text = $this->objEmailQueue->Body;
			if ($this->lblBody) $this->lblBody->Text = $this->objEmailQueue->Body;

			if ($this->txtHtml) $this->txtHtml->Text = $this->objEmailQueue->Html;
			if ($this->lblHtml) $this->lblHtml->Text = $this->objEmailQueue->Html;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EMAILQUEUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EmailQueue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEmailQueue() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtToAddress) $this->objEmailQueue->ToAddress = $this->txtToAddress->Text;
				if ($this->txtFromAddress) $this->objEmailQueue->FromAddress = $this->txtFromAddress->Text;
				if ($this->txtSubject) $this->objEmailQueue->Subject = $this->txtSubject->Text;
				if ($this->txtBody) $this->objEmailQueue->Body = $this->txtBody->Text;
				if ($this->txtHtml) $this->objEmailQueue->Html = $this->txtHtml->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EmailQueue object
				$this->objEmailQueue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EmailQueue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEmailQueue() {
			$this->objEmailQueue->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'EmailQueue': return $this->objEmailQueue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EmailQueue fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ToAddressControl':
					if (!$this->txtToAddress) return $this->txtToAddress_Create();
					return $this->txtToAddress;
				case 'ToAddressLabel':
					if (!$this->lblToAddress) return $this->lblToAddress_Create();
					return $this->lblToAddress;
				case 'FromAddressControl':
					if (!$this->txtFromAddress) return $this->txtFromAddress_Create();
					return $this->txtFromAddress;
				case 'FromAddressLabel':
					if (!$this->lblFromAddress) return $this->lblFromAddress_Create();
					return $this->lblFromAddress;
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'BodyControl':
					if (!$this->txtBody) return $this->txtBody_Create();
					return $this->txtBody;
				case 'BodyLabel':
					if (!$this->lblBody) return $this->lblBody_Create();
					return $this->lblBody;
				case 'HtmlControl':
					if (!$this->txtHtml) return $this->txtHtml_Create();
					return $this->txtHtml;
				case 'HtmlLabel':
					if (!$this->lblHtml) return $this->lblHtml_Create();
					return $this->lblHtml;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to EmailQueue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ToAddressControl':
						return ($this->txtToAddress = QType::Cast($mixValue, 'QControl'));
					case 'FromAddressControl':
						return ($this->txtFromAddress = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'BodyControl':
						return ($this->txtBody = QType::Cast($mixValue, 'QControl'));
					case 'HtmlControl':
						return ($this->txtHtml = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>