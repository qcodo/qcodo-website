<?php
	class WikiVersionsPanel extends QPanel {
		public $dtrVersions;
		protected $objWikiItem;

		public function __construct(WikiItem $objWikiItem, $objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->objWikiItem = $objWikiItem;
			$this->strTemplate = dirname(__FILE__) . '/WikiVersionsPanel.tpl.php';
			$this->strCssClass = 'wikiVersions';

			$this->dtrVersions = new QDataRepeater($this);
			$this->dtrVersions->CssClass = 'wikiVersionsDtr';
			$this->dtrVersions->SetDataBinder('dtrVersions_Bind', $this);
			$this->dtrVersions->Template = dirname(__FILE__) . '/WikiVersionDataRepeater.tpl.php';
		}

		public function dtrVersions_Bind() {
			$this->dtrVersions->DataSource = $this->objWikiItem->GetWikiVersionArray(QQ::OrderBy(QQN::WikiVersion()->VersionNumber, false));
		}
	}
?>