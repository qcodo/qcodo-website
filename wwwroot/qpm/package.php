<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Package - ';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $btnEdit;
		protected $objPackage;
		protected $dtgContributions;

		protected function Form_Create() {
			parent::Form_Create();

			$this->objPackage = Package::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objPackage) QApplication::Redirect('/qpm/');

			$this->strPageTitle .= $this->objPackage->Name;

			$this->dtgContributions = new PackageContributionDataGrid($this);
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');
			$this->dtgContributions->AlternateRowStyle->CssClass = 'alternate';

			$this->dtgContributions->MetaAddColumn(QQN::PackageContribution()->Person->Username, 'Name=QPM Path for Version', 'Html=<?= $_FORM->RenderPath($_ITEM); ?>','Width=350px', 'VerticalAlign=top', 'FontNames=Monaco, Courier, Courier New,Monospaced');
			$this->dtgContributions->MetaAddColumn(QQN::PackageContribution()->CurrentPackageVersion->Notes, 'Name=Version Notes', 'Width=400px', 'VerticalAlign=top','CssClass=small');
			$this->dtgContributions->MetaAddColumn('CurrentPostDate', 'Name=Posted', 'Width=100px', 'VerticalAlign=top');
			$this->dtgContributions->MetaAddColumn(QQN::PackageContribution()->Person->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=reverseLink', 'VerticalAlign=top');
			
			$this->dtgContributions->SortColumnIndex = 2;
			$this->dtgContributions->SortDirection = 1;
			$this->dtgContributions->Paginator = new QPaginator($this->dtgContributions);
			
			if ($this->objPackage->IsEditableForPerson(QApplication::$Person)) {
				$this->btnEdit = new RoundedLinkButton($this);
				$this->btnEdit->CssClass = 'searchOption';
				$this->btnEdit->ToolTip = 'Edit This package';
				$this->btnEdit->LinkUrl = '/qpm/edit.php/' . $this->objPackage->Token;
			}
		}

		public function RenderPath(PackageContribution $objContribution) {
			return $objContribution->Person->Username . '/' . $objContribution->Package->Token;
		}
		protected function dtgContributions_Bind() {
			$objCondition = QQ::Equal(QQN::PackageContribution()->PackageId, $this->objPackage->Id);

			$this->dtgContributions->TotalItemCount = PackageContribution::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgContributions->LimitClause)
				$objClauses[] = $objClause; 
			if ($objClause = $this->dtgContributions->OrderByClause)
				$objClauses[] = $objClause; 

			$this->dtgContributions->DataSource = PackageContribution::QueryArray($objCondition, $objClauses);
		}

		public function RenderPostedBy(PackageContribution $objContribution) {
			return sprintf('<a href="%s">%s</a>', $objContribution->Person->ViewProfileUrl, $objContribution->Person->DisplayName);
		}
	}

	QcodoForm::Run('QcodoForm');
?>