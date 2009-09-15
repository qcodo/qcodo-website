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
			$this->pnlVotes->Template = dirname(__FILE__) . '/pnlVotes.tpl.php';
			
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
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
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