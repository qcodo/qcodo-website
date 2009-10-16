<?php
	require('../../includes/prepend.inc.php');
	require(__INCLUDES__ . '/messages/MessagesPanel.class.php');
	
	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'QPM Package - ';
		protected $intNavBarIndex = QApplication::NavGet;
		protected $intSubNavIndex = QApplication::NavGetCommunity;

		protected $btnEdit;
		protected $objPackage;
		protected $dtgContributions;

		protected $pnlMessages;
		
		protected function Form_Create() {
			parent::Form_Create();

			$this->objPackage = Package::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objPackage) QApplication::Redirect('/qpm/');

			$this->strPageTitle .= $this->objPackage->Name;

			$this->dtgContributions = new PackageContributionDataGrid($this);
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');
			$this->dtgContributions->AlternateRowStyle->CssClass = 'alternate';

			$this->dtgContributions->MetaAddColumn(QQN::PackageContribution()->Person->Username, 'Name=QPM Path for Version', 'Html=<?= $_FORM->RenderPath($_ITEM); ?>', 'Width=350px', 'VerticalAlign=top', 'FontNames=Monaco, Courier, Courier New,Monospaced', 'HtmlEntities=false');
			$this->dtgContributions->MetaAddColumn(QQN::PackageContribution()->CurrentPackageVersion->Notes, 'Name=Version Notes', 'Html=<?= $_FORM->RenderNotes($_ITEM); ?>', 'Width=400px', 'VerticalAlign=top','CssClass=small', 'HtmlEntities=false');
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


			// Setup messages panel
			if ($this->objPackage->PackageCategory->Token != 'issues') {
				$this->pnlMessages = new MessagesPanel($this);
				$this->pnlMessages->SelectTopic($this->objPackage->TopicLink->GetTopic());
				$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfoForPackage.tpl.php');
				$this->pnlMessages->btnRespond1->Text = 'Post Comment';
				$this->pnlMessages->btnRespond2->Text = 'Post Comment';
				$this->pnlMessages->strAdditionalCssClass = 'topicForPackage';
				if (array_key_exists('lastpage', $_GET)) {
					$this->pnlMessages->SetPageNumber(QPaginatedControl::LastPage);
					$this->pnlMessages_Show();
				}
			} else {
				$strTokenParts = explode('_', $this->objPackage->Token);
				if (count($strTokenParts) == 2)
					$strIssueNumber = $strTokenParts[1];
				else
					$strIssueNumber = null;

				$this->pnlMessages = new QPanel($this);
				$this->pnlMessages->CssClass = 'topic topicForPackage';
				$this->pnlMessages->Text = '<h1>Comments</h1>';
				$this->pnlMessages->Text .= '<br/>Comments for this issue-related QPM package have been disabled on this screen.  To view, post and edit comments, ';
				$this->pnlMessages->Text .= 'please do so on the <a href="/issues/view.php/' . $strIssueNumber . '">issue page</a>, itself.';
			}
		}
		
		public function RenderNotes(PackageContribution $objContribution) {
			$strNotes = sprintf('QPM Package File Count | <strong>%s</strong> new file%s | <strong>%s</strong> changed file%s',
				$objContribution->CurrentPackageVersion->NewFileCount,
				($objContribution->CurrentPackageVersion->NewFileCount == 1) ? '' : 's',
				$objContribution->CurrentPackageVersion->ChangedFileCount,
				($objContribution->CurrentPackageVersion->ChangedFileCount == 1) ? '' : 's'
			);
			$strNotes .= "\r\n\r\n";
			$strNotes .= QApplication::HtmlEntities($objContribution->CurrentPackageVersion->Notes);
			$strNotes = trim($strNotes);
			return nl2br($strNotes);
		}

		public function RenderPath(PackageContribution $objContribution) {
			return QApplication::HtmlEntities($objContribution->Person->Username) . '/' . QApplication::HtmlEntities($objContribution->Package->Token) .
				'<br/><span style="font-size: 10px; font-family: arial, helvetica, sans-serif;">built on <strong>Qcodo v' .
				QApplication::HtmlEntities($objContribution->CurrentPackageVersion->QcodoVersion) . '</strong></span>';
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