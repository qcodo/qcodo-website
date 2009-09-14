<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Bugs and Issues - ';
		protected $intNavBarIndex = QApplication::NavDevelopment;
		protected $intSubNavIndex = QApplication::NavDevelopmentBugs;

		protected $objIssue;

		protected function Form_Create() {
			parent::Form_Create();
			
			$this->objIssue = Issue::Load(QApplication::PathInfo(0));
			if (!$this->objIssue) QApplication::Redirect('/issues/');
			$this->strPageTitle .= $this->objIssue->Title;
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
		}
		
		protected function DisplayField($strLabel, $strValue) {
			if ($strValue) {
?>
				<div class="issuePanelField">
					<div class="left"><?php _p($strLabel); ?></div>
					<div class="right"><?php _p($strValue); ?></div>
				</div>
<?php				
			}
		}
	}

	QcodoForm::Run('QcodoForm');
?>