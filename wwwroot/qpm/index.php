<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Repository';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $dtrPackageCategories;

		protected function Form_Create() {
			parent::Form_Create();

			$this->dtrPackageCategories = new QDataRepeater($this);
			$this->dtrPackageCategories->Template = 'dtrPackageCategories.tpl.php';
			$this->dtrPackageCategories->SetDataBinder('dtrPackageCategories_Bind');
		}

		protected function dtrPackageCategories_Bind() {
			$this->dtrPackageCategories->DataSource = PackageCategory::LoadAll(QQ::OrderBy(QQN::PackageCategory()->OrderNumber));
		}
	}

	QcodoForm::Run('QcodoForm');
?>