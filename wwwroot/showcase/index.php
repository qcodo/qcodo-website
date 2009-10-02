<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Showcase';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutShowcase;

		protected $objShowcaseArray;

		protected $btnNew;
		protected $pxyItem;

		protected $objSelectedShowcase;
		protected $dlgShowcaseView;
		protected $btnClose;

		protected function Form_Create() {
			parent::Form_Create();
			
			$objShowcases = ShowcaseItem::LoadArrayByLiveFlag(true);
			$this->objShowcaseArray = array();

			while ((count($this->objShowcaseArray) < 14) && (count($objShowcases))) {
				$intKeyArray = array_keys($objShowcases);
				$intRandomKey = $intKeyArray[rand(0, count($intKeyArray) - 1)];
				$this->objShowcaseArray[] = $objShowcases[$intRandomKey];
				unset($objShowcases[$intRandomKey]);
			}

			$this->btnNew = new RoundedLinkButton($this);
			$this->btnNew->LinkUrl = '/showcase/new.php';
			$this->btnNew->Text = 'Submit a Project or Site';
			
			$this->pxyItem = new QControlProxy($this);
			$this->pxyItem->AddAction(new QClickEvent(), new QAjaxAction('pxyItem_Click'));
			$this->pxyItem->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgShowcaseView = new QDialogBox($this);
			$this->dlgShowcaseView->Template = dirname(__FILE__) . '/dlgShowcaseView.tpl.php';
			$this->dlgShowcaseView->MatteClickable = false;
			$this->dlgShowcaseView->HideDialogBox();
			
			$this->btnClose = new QButton($this->dlgShowcaseView);
			$this->btnClose->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgShowcaseView));
		}

		protected function pxyItem_Click($strFormId, $strControlId, $strParameter) {
			$this->objSelectedShowcase = ShowcaseItem::Load($strParameter);
			if (!$this->objSelectedShowcase || !$this->objSelectedShowcase->LiveFlag) return;

			$this->dlgShowcaseView->ShowDialogBox();
		}
	}

	QcodoForm::Run('QcodoForm');
?>