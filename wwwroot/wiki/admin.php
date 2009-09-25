<?php
	require('../includes/prepend.inc.php');
	QApplication::Authenticate();

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Admin Wiki Page - ';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $objWikiItem;

		protected $lstEditorMinimum;
		protected $lstNavItem;
		protected $lstSubNavItem;

		protected $btnOkay;
		protected $btnCancel;

		protected function Form_Run() {
			// Sanitize the Path in the PathInfo
			$strPath = WikiItem::SanitizeForPath(QApplication::$PathInfo);
			if ($strPath != QApplication::$PathInfo) {
				QApplication::Redirect('/wiki/admin.php' . $strPath . QApplication::GenerateQueryString());
			}
		}

		protected function Form_Create() {
			parent::Form_Create();

			// Get the Wiki Item and confirm that it exists and that he is authorized to admin
			$this->objWikiItem = WikiItem::LoadByPath(QApplication::$PathInfo);
			if (!$this->objWikiItem) QApplication::Redirect('/');
			if (!$this->objWikiItem->IsAdminableForPerson(QApplication::$Person)) QApplication::RedirectToLogin();

			$this->strPageTitle .= $this->objWikiItem->CurrentName;

			$this->lstEditorMinimum = new QListBox($this);
			foreach (PersonType::$NameArray as $intTypeId => $strName) {
				$this->lstEditorMinimum->AddItem($strName, $intTypeId, $intTypeId == $this->objWikiItem->EditorMinimumPersonTypeId);
			}

			$this->lstNavItem = new QListBox($this);
			$this->lstNavItem->AddItem('- Default -', null);
			foreach (QApplication::$NavBarArray as $intIndex => $arrItems) {
				$this->lstNavItem->AddItem($arrItems[0], $intIndex, !is_null($this->objWikiItem->OverrideNavbarIndex) && ($this->objWikiItem->OverrideNavbarIndex == $intIndex));
			}
			if (is_null($this->lstNavItem->SelectedValue)) $this->lstNavItem->SelectedIndex = 0;
			$this->lstNavItem->AddAction(new QChangeEvent(), new QAjaxAction('lstNavItem_Change'));

			$this->lstSubNavItem = new QListBox($this);
			$this->lstNavItem_Change(null, null, null);

			$this->btnOkay = new QButton($this);
			$this->btnOkay->CausesValidation = true;
			$this->btnOkay->Text = 'Update';

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			
			$this->btnOkay->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnOkay));
			$this->btnOkay->AddAction(new QClickEvent(), new QAjaxAction('btnOkay_Click'));

			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function lstNavItem_Change($strFormId, $strControlId, $strParameter) {
			$this->lstSubNavItem->RemoveAllItems();
			$this->lstSubNavItem->AddItem('- None -', null);
			if (!is_null($this->lstNavItem->SelectedValue)) {
				$this->lstSubNavItem->Enabled = true;
				foreach (QApplication::$NavBarArray[$this->lstNavItem->SelectedValue][3] as $intIndex => $arrItems) {
					$this->lstSubNavItem->AddItem($arrItems[0], $intIndex, is_null($strFormId) && !is_null($this->objWikiItem->OverrideSubnavIndex) && ($this->objWikiItem->OverrideSubnavIndex == $intIndex));
				}
			} else {
				$this->lstSubNavItem->Enabled = false;
			}
		}

		protected function Form_PreRender() {
			$this->btnOkay->Enabled = true;
		}

		protected function btnOkay_Click() {
			$this->objWikiItem->EditorMinimumPersonTypeId = $this->lstEditorMinimum->SelectedValue;
			$this->objWikiItem->OverrideNavbarIndex = $this->lstNavItem->SelectedValue;
			$this->objWikiItem->OverrideSubnavIndex = $this->lstSubNavItem->SelectedValue;
			$this->objWikiItem->Save();
			QApplication::Redirect($this->objWikiItem->UrlPath);
		}

		protected function btnCancel_Click() {
			QApplication::Redirect($this->objWikiItem->UrlPath);
		}
	}
	
	QcodoForm::Run('QcodoForm');
?>