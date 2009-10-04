<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Repository';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $dtrPackageCategories;
		protected $btnNew;

		protected function Form_Create() {
			parent::Form_Create();

			$this->dtrPackageCategories = new QDataRepeater($this);
			$this->dtrPackageCategories->Template = 'dtrPackageCategories.tpl.php';
			$this->dtrPackageCategories->SetDataBinder('dtrPackageCategories_Bind');

			$this->btnNew = new RoundedLinkButton($this);
			$this->btnNew->CssClass = 'searchOption';
			$this->btnNew->ToolTip = 'Create a new QPM package';
			$this->btnNew->LinkUrl = '/qpm/edit.php/new';
		}

		protected function dtrPackageCategories_Bind() {
			$this->dtrPackageCategories->DataSource = PackageCategory::LoadAll(QQ::OrderBy(QQN::PackageCategory()->OrderNumber));
		}
	}

	QcodoForm::Run('QcodoForm');
?>