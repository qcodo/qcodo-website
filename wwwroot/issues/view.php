<?php
	require('../includes/prepend.inc.php');
	require(__INCLUDES__ . '/messages/MessagesPanel.class.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $objIssue;

		protected $pnlDetails;

		protected $pnlVotes;
		protected $dtrVotes;
		protected $btnVotes;

		protected $pnlExampleCode;
		protected $pnlExampleTemplate;
		protected $pnlExampleData;
		protected $pnlExpectedOutput;
		protected $pnlActualOutput;

		protected $pnlMessages;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->objIssue = Issue::Load(QApplication::PathInfo(0));
			if (!$this->objIssue) QApplication::Redirect('/issues/');
			$this->strPageTitle .= $this->objIssue->Title;

			$this->pnlDetails = new QPanel($this);
			$this->pnlDetails->Template = dirname(__FILE__) . '/pnlDetails.tpl.php';
			
			$this->pnlVotes = new QPanel($this);
			$this->pnlVotes->CssClass = 'pnlVotes';
			$this->pnlVotes->Template = dirname(__FILE__) . '/pnlVotes.tpl.php';
			
			$this->dtrVotes = new QDataRepeater($this->pnlVotes);
			$this->dtrVotes->SetDataBinder('dtrVotes_Bind');
			$this->dtrVotes->Template = dirname(__FILE__) . '/dtrVotes.tpl.php';

			$this->btnVotes = new RoundedLinkButton($this->pnlVotes);
			$this->btnVotes->AddAction(new QClickEvent(), new QAjaxAction('pnlVotes_Click'));
			$this->btnVotes->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->pnlExampleCode = new QPanel($this);
			$this->pnlExampleCode->Template = dirname(__FILE__) . '/pnlExampleCode.tpl.php';

			$this->pnlExampleTemplate = new QPanel($this);
			$this->pnlExampleTemplate->Template = dirname(__FILE__) . '/pnlExampleTemplate.tpl.php';

			$this->pnlExampleData = new QPanel($this);
			$this->pnlExampleData->Template = dirname(__FILE__) . '/pnlExampleData.tpl.php';

			$this->pnlExpectedOutput = new QPanel($this);
			$this->pnlExpectedOutput->Template = dirname(__FILE__) . '/pnlExpectedOutput.tpl.php';

			$this->pnlActualOutput = new QPanel($this);
			$this->pnlActualOutput->Template = dirname(__FILE__) . '/pnlActualOutput.tpl.php';

			$this->pnlMessages = new MessagesPanel($this);
			$this->pnlMessages->SelectTopic($this->objIssue->TopicLink->GetTopic());
			$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfoForIssue.tpl.php');
			
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleCode->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleTemplate->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleData->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExpectedOutput->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlActualOutput->ControlId)); 
		}

		protected function pnlVotes_Refresh() {
			if (!QApplication::$Person) {
				$this->btnVotes->Text = 'Vote for Issue';
				$this->btnVotes->AddCssClass('roundedLinkGray');
			} else if ($this->objIssue->IsPersonVoted(QApplication::$Person)) {
				$this->btnVotes->Text = 'Voted for Issue';
				$this->btnVotes->RemoveCssClass('roundedLinkGray');
			} else {
				$this->btnVotes->Text = 'Vote for Issue';
				$this->btnVotes->AddCssClass('roundedLinkGray');
			}
		}

		protected function pnlVotes_Click() {
			if (!QApplication::$Person) {
				QApplication::RedirectToLogin();
			} else if ($this->objIssue->IsPersonVoted(QApplication::$Person)) {
				$this->objIssue->ClearVote(QApplication::$Person);
				$this->pnlVotes->Refresh();
			} else {
				$this->objIssue->SetVote(QApplication::$Person);
				$this->pnlVotes->Refresh();
			}
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
		
		protected function dtrVotes_Bind() {
			$this->dtrVotes->DataSource = $this->objIssue->GetIssueVoteArray(array(QQ::OrderBy(QQN::IssueVote()->Person->DisplayName), QQ::Expand(QQN::IssueVote()->Person->FirstName)));
			if (count($this->dtrVotes->DataSource) >= 8)
				$this->dtrVotes->Height = '100px';
			else
				$this->dtrVotes->Height = null;
		}

		protected function DisplayVoteCount() {
			$intVoteCount = $this->objIssue->CountIssueVotes();
			if ($intVoteCount > 1)
				return 'There are <strong>' . $intVoteCount . ' votes</strong> for this issue';
			else if ($intVoteCount == 1)
				return 'There is <strong>1 vote</strong> for this issue';
			else
				return 'There are <strong>no votes</strong> for this issue';
		}
		
		protected function DisplayField($strLabel, $strValue, $blnHtmlEntities = true) {
			if ($strValue) {
?>
				<div class="issuePanelField">
					<div class="left"><?php _p($strLabel); ?></div>
					<div class="right"><?php _p($strValue, $blnHtmlEntities); ?></div>
				</div>
<?php				
			}
		}
	}

	QcodoForm::Run('QcodoForm');
?>