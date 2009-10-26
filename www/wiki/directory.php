<?php
	require('../../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Wiki Directory';
		protected $intNavBarIndex = QApplication::NavCommunity;
		protected $intSubNavIndex = QApplication::NavCommunityWiki;

		protected $dtgWikiItems;

		protected $lstWikiItemType;
		protected $txtTitle;
		protected $txtPath;
		protected $txtPostedBy;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->dtgWikiItems = new WikiItemDataGrid($this);
//			$this->dtgWikiItems->CssClass = 'datagrid issuesDataGrid';
			$this->dtgWikiItems->Paginator = new QPaginator($this->dtgWikiItems);
			$this->dtgWikiItems->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgWikiItems->Noun = 'wiki item';
			$this->dtgWikiItems->NounPlural = 'wiki items';
			$this->dtgWikiItems->SetDataBinder('dtgWikiItems_Bind');
			$this->dtgWikiItems->ItemsPerPage = 20;

			$this->dtgWikiItems->MetaAddTypeColumn('WikiItemTypeId', 'WikiItemType', 'Name=Wiki Type', 'Width=80px');
			$this->dtgWikiItems->MetaAddColumn('CurrentName', 'Name=Title', 'Width=340px');
			$this->dtgWikiItems->MetaAddColumn('Path', 'Html=<?= $_FORM->RenderPath($_ITEM); ?>', 'HtmlEntities=false', 'Width=310px');
			$this->dtgWikiItems->MetaAddColumn('CurrentPostDate', 'Name=Last Updated', 'Width=110px', 'CssClass=small');
			$this->dtgWikiItems->MetaAddColumn(QQN::WikiItem()->CurrentPostedByPerson->DisplayName, 'Name=By', 'Html=<?= $_FORM->RenderPostedBy($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px', 'CssClass=small reverseLink');

			$this->dtgWikiItems->GetColumnByName('Wiki Type')->OrderByClause = QQ::OrderBy(QQN::WikiItem()->WikiItemTypeId, QQN::WikiItem()->CurrentName);
			$this->dtgWikiItems->GetColumnByName('Wiki Type')->ReverseOrderByClause = QQ::OrderBy(QQN::WikiItem()->WikiItemTypeId, false, QQN::WikiItem()->CurrentName, false);
			$this->dtgWikiItems->SortColumnIndex = 0;

			$this->lstWikiItemType = new QListBox($this);
			$this->lstWikiItemType->Name = 'Wiki Type';
			$this->lstWikiItemType->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->lstWikiItemType->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->lstWikiItemType->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->lstWikiItemType->AddItem('- View All -', null);
			foreach (WikiItemType::$NameArray as $intId => $strName) {
				$this->lstWikiItemType->AddItem($strName, $intId);
			}
			
			$this->txtTitle = new QTextBox($this);
			$this->txtTitle->Name = 'Title';
			$this->txtTitle->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtTitle->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtTitle->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtPath = new QTextBox($this);
			$this->txtPath->Name = 'Path';
			$this->txtPath->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtPath->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtPath->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtPostedBy = new QTextBox($this);
			$this->txtPostedBy->Name = 'Posted By';
			$this->txtPostedBy->AddAction(new QChangeEvent(), new QAjaxAction('Refresh'));
			$this->txtPostedBy->AddAction(new QEnterKeyEvent(), new QAjaxAction('Refresh'));
			$this->txtPostedBy->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		public function dtgWikiItems_Bind() {
			$objCondition = QQ::All();

			if (trim($this->txtTitle->Text)) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::WikiItem()->CurrentName, '%' . trim($this->txtTitle->Text) . '%')
				);
			}
			
			if ($strPath = trim($this->txtPath->Text)) {
				$strPath = WikiItem::SanitizeForPath($strPath, $intWikiItemTypeId);
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::WikiItem()->Path, $strPath . '%')
				);
			}
			
			if ($intValue = $this->lstWikiItemType->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::WikiItem()->WikiItemTypeId, $intValue)
				);
			}

			if (trim($this->txtPostedBy->Text)) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::WikiItem()->CurrentPostedByPerson->DisplayName, trim($this->txtPostedBy->Text) . '%')
				);
			}

			$this->dtgWikiItems->TotalItemCount = WikiItem::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgWikiItems->LimitClause)
				$objClauses[] = $objClause; 
			if ($objClause = $this->dtgWikiItems->OrderByClause)
				$objClauses[] = $objClause; 

			$this->dtgWikiItems->DataSource = WikiItem::QueryArray($objCondition, $objClauses);
		}

		public function Refresh() {
			$this->dtgWikiItems->PageNumber = 1;
			$this->dtgWikiItems->Refresh();
		}
		
		public function RenderPath(WikiItem $objWikiItem) {
			return sprintf('<div style="width: 300px; overflow: hidden;"><a href="%s">%s</a></div>', $objWikiItem->UrlPath, $objWikiItem->Path);
		}

		public function RenderPostedBy(WikiItem $objWikiItem) {
			return sprintf('<a href="%s">%s</a>', $objWikiItem->CurrentPostedByPerson->ViewProfileUrl, $objWikiItem->CurrentPostedByPerson->DisplayName);
		}
	}

	QcodoForm::Run('QcodoForm');
?>