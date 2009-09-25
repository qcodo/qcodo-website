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

		protected $pxyZoom;
		protected $dlgZoom;
		protected $btnZoomClose;
		protected $lblZoomHeadline;
		protected $pnlZoomCode;
		
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
			$this->btnVotes->AddAction(new QClickEvent(), new QAjaxAction('btnVotes_Click'));
			$this->btnVotes->AddAction(new QClickEvent(), new QTerminateAction());
			if (QApplication::$Person && (QApplication::$Person->Id == $this->objIssue->PostedByPersonId))
				$this->btnVotes->Visible = false;
			$this->btnVotes->SetCustomStyle('margin-top', '10px');
			$this->btnVotes->SetCustomStyle('margin-bottom', '4px');
			
			$this->pnlExampleCode = new QPanel($this, 'ExampleCode');
			$this->pnlExampleCode->Template = dirname(__FILE__) . '/pnlExample.tpl.php';

			$this->pnlExampleTemplate = new QPanel($this, 'ExampleTemplate');
			$this->pnlExampleTemplate->Template = dirname(__FILE__) . '/pnlExample.tpl.php';

			$this->pnlExampleData = new QPanel($this, 'ExampleData');
			$this->pnlExampleData->Template = dirname(__FILE__) . '/pnlExample.tpl.php';

			$this->pnlExpectedOutput = new QPanel($this, 'ExpectedOutput');
			$this->pnlExpectedOutput->Template = dirname(__FILE__) . '/pnlExample.tpl.php';

			$this->pnlActualOutput = new QPanel($this, 'ActualOutput');
			$this->pnlActualOutput->Template = dirname(__FILE__) . '/pnlExample.tpl.php';

			$objTopic = $this->objIssue->TopicLink->GetTopic();
			$objTopic->MarkAsViewed();
			$this->pnlMessages = new MessagesPanel($this);
			$this->pnlMessages->SelectTopic($objTopic);
			$this->pnlMessages->lblTopicInfo_SetTemplate(__INCLUDES__ . '/messages/lblTopicInfoForIssue.tpl.php');
			if (QApplication::PathInfo(1) == 'lastpage')
				$this->pnlMessages->SetPageNumber(QPaginatedControl::LastPage);
				
			$this->pxyZoom = new QControlProxy($this);
			$this->pxyZoom->AddAction(new QClickEvent(), new QAjaxAction('pxyZoom_Click'));
			$this->pxyZoom->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgZoom = new QDialogBox($this);
			$this->dlgZoom->Template = dirname(__FILE__) . '/dlgZoom.tpl.php';
			$this->dlgZoom->MatteClickable = false;
			$this->dlgZoom->AddCssClass('dlgZoom');
			$this->dlgZoom->HideDialogBox();

			$this->lblZoomHeadline = new QLabel($this->dlgZoom);
			$this->lblZoomHeadline->TagName = 'h2';

			$this->pnlZoomCode = new QPanel($this->dlgZoom);
			$this->pnlZoomCode->CssClass = 'pnlZoomCode';

			$this->btnZoomClose = new QButton($this->dlgZoom);
			$this->btnZoomClose->Text = 'Close';
			$this->btnZoomClose->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgZoom));

			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleCode->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleTemplate->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExampleData->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlExpectedOutput->ControlId)); 
			QApplication::ExecuteJavaScript(sprintf('SetIssuePanelMaximumHeight("%s", 200);', $this->pnlActualOutput->ControlId)); 
		}

		protected function GetLabelForExamplePanel($strControlId) {
			switch ($strControlId) {
				case 'ExampleCode':
					return 'Example Code';

				case 'ExampleTemplate':
					return 'Example Template';

				case 'ExampleData':
					return 'Example Data';

				case 'ExpectedOutput':
					return 'Expected Output';

				case 'ActualOutput':
					return 'Actual Output';
			}
		}
		
		protected function GetContentForExamplePanel($strControlId) {
			switch ($strControlId) {
				case 'ExampleCode':
					return sprintf('<pre>%s</pre>', trim(highlight_string($this->objIssue->ExampleCode, true)));

				case 'ExampleTemplate':
					return sprintf('<pre>%s</pre>', trim(highlight_string($this->objIssue->ExampleTemplate, true)));

				case 'ExampleData':
					return sprintf('<pre>%s</pre>', trim($this->objIssue->ExampleData));

				case 'ExpectedOutput':
					return sprintf('<pre>%s</pre>', trim($this->objIssue->ExpectedOutput));

				case 'ActualOutput':
					return sprintf('<pre>%s</pre>', trim($this->objIssue->ActualOutput));
			}
		}

		protected function pxyZoom_Click($strFormId, $strControlId, $strParameter) {
			$this->lblZoomHeadline->Text = $this->GetLabelForExamplePanel($strParameter);
			$this->pnlZoomCode->Text = $this->GetContentForExamplePanel($strParameter);
			$this->dlgZoom->ShowDialogBox();
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

		protected function btnVotes_Click() {
			if (!QApplication::$Person) {
				QApplication::RedirectToLogin();
			} else if ($this->objIssue->IsPersonVoted(QApplication::$Person)) {
				$this->objIssue->ClearVote(QApplication::$Person);
				$this->pnlVotes->Refresh();
			} else if ($this->objIssue->PostedByPersonId == QApplication::$Person->Id) {
				QApplication::DisplayAlert('Sorry!  You cannot vote on bugs and issues you posted yourself.');
			} else {
				$this->objIssue->SetVote(QApplication::$Person);
				$this->pnlVotes->Refresh();
			}
		}

		protected function dtrVotes_Bind() {
			$this->dtrVotes->DataSource = $this->objIssue->GetIssueVoteArray(array(QQ::OrderBy(QQN::IssueVote()->Person->DisplayName), QQ::Expand(QQN::IssueVote()->Person->FirstName)));
			if (count($this->dtrVotes->DataSource) >= 8)
				$this->dtrVotes->Height = '100px';
			else if (count($this->dtrVotes->DataSource) <= 3)
				$this->dtrVotes->Height = '50px';
			else
				$this->dtrVotes->Height = null;
		}

		protected function DisplayVoteCount() {
			$intVoteCount = $this->objIssue->CountIssueVotes();
			if ($intVoteCount > 1)
				return 'There are <strong>' . $intVoteCount . ' votes</strong> for this issue:';
			else if ($intVoteCount == 1)
				return 'There is <strong>1 vote</strong> for this issue:';
			else
				return 'There are <strong>no votes</strong> for this issue.';
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