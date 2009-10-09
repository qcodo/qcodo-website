<?php
	require('../../includes/prepend.inc.php');
	if (!ShowcaseItem::IsAdminableForPerson(QApplication::$Person)) QApplication::Redirect('/showcase/');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Showcase - Admin';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutShowcase;

		protected $dtgShowcaseItems;
		protected $pxyView;
		protected $pxyToggle;

		protected $lstLiveFlag;

		protected $objSelectedShowcase;
		protected $dlgBox;
		protected $btnClose;

		protected function Form_Create() {
			parent::Form_Create();

			$this->dtgShowcaseItems = new ShowcaseItemDataGrid($this);
			$this->dtgShowcaseItems->Paginator = new QPaginator($this->dtgShowcaseItems);
			$this->dtgShowcaseItems->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgShowcaseItems->Noun = 'showcase item';
			$this->dtgShowcaseItems->NounPlural = 'showcase items';
			$this->dtgShowcaseItems->SetDataBinder('dtgShowcaseItems_Bind');
			$this->dtgShowcaseItems->ItemsPerPage = 20;

			$this->dtgShowcaseItems->AddColumn(new QDataGridColumn('Actions', '<?= $_FORM->RenderActions($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'FontSize=10px'));
			$this->dtgShowcaseItems->MetaAddColumn('Name', 'Width=400px');
			$this->dtgShowcaseItems->MetaAddColumn('Url', 'Width=285px');
			$this->dtgShowcaseItems->MetaAddColumn('LiveFlag', 'Name=Live?', 'Width=50px');
			$this->dtgShowcaseItems->MetaAddColumn(QQN::ShowcaseItem()->Person->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');

			$this->lstLiveFlag = new QListBox($this);
			$this->lstLiveFlag->Name = 'Filter by Live Flag';
			$this->lstLiveFlag->AddItem('- View All -', null);
			$this->lstLiveFlag->AddItem('Live', true);
			$this->lstLiveFlag->AddItem('Not Live', false);
			$this->lstLiveFlag->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));

			$this->pxyToggle = new QControlProxy($this);
			$this->pxyToggle->AddAction(new QClickEvent(), new QAjaxAction('pxyToggle_Click'));
			$this->pxyToggle->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyView = new QControlProxy($this);
			$this->pxyView->AddAction(new QClickEvent(), new QAjaxAction('pxyView_Click'));
			$this->pxyView->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgBox = new QDialogBox($this);
			$this->dlgBox->MatteClickable = false;
			$this->dlgBox->HideDialogBox();
			
			$this->btnClose = new QButton($this->dlgBox);
			$this->btnClose->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgBox));
		}

		public function dtgShowcaseItems_Bind() {
			$objCondition = QQ::All();

			if (!is_null($blnValue = $this->lstLiveFlag->SelectedValue)) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ShowcaseItem()->LiveFlag, $blnValue)
				);
			}

			$this->dtgShowcaseItems->TotalItemCount = ShowcaseItem::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgShowcaseItems->LimitClause)
				$objClauses[] = $objClause; 
			if ($objClause = $this->dtgShowcaseItems->OrderByClause)
				$objClauses[] = $objClause; 

			$this->dtgShowcaseItems->DataSource = ShowcaseItem::QueryArray($objCondition, $objClauses);
		}

		public function Refresh() {
			$this->dtgShowcaseItems->PageNumber = 1;
			$this->dtgShowcaseItems->Refresh();
		}

		public function RenderPostedBy(ShowcaseItem $objShowcaseItem) {
			return sprintf('<a href="%s">%s</a>', $objShowcaseItem->Person->ViewProfileUrl, $objShowcaseItem->Person->DisplayName);
		}

		public function RenderActions(ShowcaseItem $objShowcaseItem) {
			if ($objShowcaseItem->LiveFlag) {
				$this->dtgShowcaseItems->OverrideRowStyle($this->dtgShowcaseItems->CurrentRowIndex, null);
			} else {
				$objRowStyle = new QDataGridRowStyle();
				$objRowStyle->BackColor = '#a66';
				$this->dtgShowcaseItems->OverrideRowStyle($this->dtgShowcaseItems->CurrentRowIndex, $objRowStyle);
			}
			
			return sprintf('<a href="#" %s>View</a> &nbsp;|&nbsp; <a href="#" %s>Toggle Live</a>',
				$this->pxyView->RenderAsEvents($objShowcaseItem->Id, false), $this->pxyToggle->RenderAsEvents($objShowcaseItem->Id, false));
		}

		protected function pxyToggle_Click($strFormId, $strControlId, $strParameter) {
			$objShowcaseItem = ShowcaseItem::Load($strParameter);
			if (!$objShowcaseItem) return;
			
			$objShowcaseItem->LiveFlag = !$objShowcaseItem->LiveFlag;
			$objShowcaseItem->Save();
			
			$this->dtgShowcaseItems->Refresh();
		}

		protected function pxyView_Click($strFormId, $strControlId, $strParameter) {
			$objShowcaseItem = ShowcaseItem::Load($strParameter);
			if (!$objShowcaseItem) return;
			
			$this->objSelectedShowcase = $objShowcaseItem;
			$this->dlgBox->Template = dirname(__FILE__) . '/dlgBox_ShowcaseView.tpl.php';
			$this->dlgBox->ShowDialogBox();
		}
	}

	QcodoForm::Run('QcodoForm');
?>