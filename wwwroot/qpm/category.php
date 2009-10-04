<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Repository - ';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $objCategory;
		protected $dtgPackages;
		
		protected $btnNew;

		protected function Form_Create() {
			parent::Form_Create();

			$this->objCategory = PackageCategory::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objCategory) QApplication::Redirect('/qpm/');

			$this->strPageTitle .= $this->objCategory->Name;
			
			$this->dtgPackages = new PackageDataGrid($this);
			$this->dtgPackages->SetDataBinder('dtgPackages_Bind');
			$this->dtgPackages->AlternateRowStyle->CssClass = 'alternate';

			$this->dtgPackages->MetaAddColumn('Name', 'VerticalAlign=top', 'Width=250px');
			$this->dtgPackages->MetaAddColumn('Token', 'Name=Path', 'VerticalAlign=top', 'Width=190px', 'HtmlEntities=false',
				'Html=<a href="/qpm/package.php/<?= $_ITEM->Token; ?>" title="View Package Details"><?= $_ITEM->Token; ?></a>');
			$this->dtgPackages->MetaAddColumn('Description', 'CssClass=small', 'Width=300px');
			$this->dtgPackages->MetaAddColumn('LastPostDate', 'Name=Last Upload', 'Width=100px', 'VerticalAlign=top', 'CssClass=small');
			$this->dtgPackages->MetaAddColumn(QQN::Package()->LastPostedByPerson->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink', 'VerticalAlign=top');

			$this->dtgPackages->Paginator = new QPaginator($this->dtgPackages);

			$this->btnNew = new RoundedLinkButton($this);
			$this->btnNew->CssClass = 'searchOption';
			$this->btnNew->ToolTip = 'Create a new QPM package';
			$this->btnNew->LinkUrl = '/qpm/edit.php/new';
		}

		protected function dtgPackages_Bind() {
			$objCondition = QQ::Equal(QQN::Package()->PackageCategoryId, $this->objCategory->Id);

			$this->dtgPackages->TotalItemCount = Package::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgPackages->LimitClause)
				$objClauses[] = $objClause; 
			if ($objClause = $this->dtgPackages->OrderByClause)
				$objClauses[] = $objClause; 

			$this->dtgPackages->DataSource = Package::QueryArray($objCondition, $objClauses);
		}

		public function RenderPostedBy(Package $objPackage) {
			if ($objPackage->LastPostedByPerson)
				return sprintf('<a href="%s">%s</a>', $objPackage->LastPostedByPerson->ViewProfileUrl, $objPackage->LastPostedByPerson->DisplayName);
		}
	}

	QcodoForm::Run('QcodoForm');
?>