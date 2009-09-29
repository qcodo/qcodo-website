<?php
	class EditWikiForm extends QcodoWebsiteForm {
		protected $intWikiItemTypeId;

		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;
		protected $strSanitizedPath;
		protected $intVersionNumber;

		protected $blnEditMode;

		protected $strHeadline;

		protected $btnOkay;
		protected $btnCancel;

		protected function CreateControlsForWikiVersionAndObject(WikiVersion $objWikiVersion, $objWikiObject) {}
		protected function SaveWikiVersion() {}

		protected function Form_Create() {
			parent::Form_Create();

			$this->strSanitizedPath = WikiItem::SanitizeForPath(QApplication::$PathInfo, $intWikiItemTypeId);
			if ($this->intWikiItemTypeId != $intWikiItemTypeId) throw new Exception('WikiItemTypeId Mismatch');
			$this->objWikiItem = WikiItem::LoadByPathWikiItemTypeId($this->strSanitizedPath, $this->intWikiItemTypeId);

			$strWikiType = WikiItemType::$TokenArray[$this->intWikiItemTypeId];
			$strWikiClassName = 'Wiki' . $strWikiType;

			// See if we're editing or creating new
			if (!$this->objWikiItem) {
				$this->objWikiItem = new WikiItem();
				$objWikiVersion = new WikiVersion();
				$objWikiObject = new $strWikiClassName();

				$this->blnEditMode = false;
				$this->strPageTitle = 'Create New Wiki ' . $strWikiType;
				$this->strHeadline = 'Create a New Wiki ' . $strWikiType;
			} else {
				// Make sure this person is allowed to edit it
				if (!$this->objWikiItem->IsEditableForPerson(QApplication::$Person)) {
					QApplication::Redirect($this->objWikiItem->UrlPath);
				}

				// Get the Wiki Version object based on the $_GET variables, or use CurrentWikiVersion if none passed in
				$arrGetKeys = array_keys($_GET);
				$objWikiVersion = null;
				if (count($arrGetKeys) == 1)
					$objWikiVersion = WikiVersion::LoadByWikiItemIdVersionNumber($this->objWikiItem->Id, $arrGetKeys[0]);
				if (!$objWikiVersion)
					$objWikiVersion = $this->objWikiItem->CurrentWikiVersion;

				if (!$objWikiVersion->IsCurrentVersion())
					$this->intVersionNumber = $objWikiVersion->VersionNumber; 

				$objWikiObject = $objWikiVersion->__get($strWikiClassName);
				$this->blnEditMode = true;
				$this->strPageTitle .= $objWikiVersion->Name;
				$this->strHeadline = 'Edit Wiki ' . $strWikiType;
			}
			
			$this->CreateControlsForWikiVersionAndObject($objWikiVersion, $objWikiObject);

			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->Text = ($this->blnEditMode) ? 'Update Wiki ' : 'Save New Wiki ';
			$this->btnOkay->Text .= $strWikiType;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			
			$this->btnOkay->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnOkay));
			$this->btnOkay->AddAction(new QClickEvent(), new QServerAction('btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			$this->txtTitle->Focus();
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}

		protected function btnOkay_Click() {
			if (!$this->blnEditMode) {
				$this->objWikiItem = WikiItem::CreateNewItem($this->strSanitizedPath, $this->intWikiItemTypeId);
			}

			if (!($objWikiVersion = $this->SaveWikiVersion()))
				return;

			if ($this->blnEditMode) {
				$strMessage = sprintf('%s made created a new version (#%s) of this wiki %s.',
					QApplication::$Person->DisplayName, $objWikiVersion->VersionNumber, strtolower(WikiItemType::$NameArray[$this->intWikiItemTypeId]));				
				$this->objWikiItem->PostMessage($strMessage, null);
				QApplication::Redirect($this->objWikiItem->UrlPath . '?lastpage');
			} else {
				QApplication::Redirect($this->objWikiItem->UrlPath);
			}
		}

		protected function btnCancel_Click() {
			if ($this->intVersionNumber)
				QApplication::Redirect('/wiki' . WikiItem::GenerateFullPath($this->strSanitizedPath, $this->intWikiItemTypeId) . '?' . $this->intVersionNumber);
			else
				QApplication::Redirect('/wiki' . WikiItem::GenerateFullPath($this->strSanitizedPath, $this->intWikiItemTypeId));
		}
	}
?>