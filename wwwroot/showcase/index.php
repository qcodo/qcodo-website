<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Showcase';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutShowcase;

		protected $objShowcaseArray;
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
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
	}

	QcodoForm::Run('QcodoForm');
?>