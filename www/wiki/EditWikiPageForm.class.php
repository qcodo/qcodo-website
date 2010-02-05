<?php
	class EditWikiPageForm extends EditWikiForm {
		protected $intWikiItemTypeId = WikiItemType::Page;

		protected $txtTitle;
		protected $txtContent;

		protected function CreateControlsForWikiVersionAndObject(WikiVersion $objWikiVersion, $objWikiObject) {
			$this->txtTitle = new QTextBox($this);
			$this->txtTitle->Text = $objWikiVersion->Name;
			$this->txtTitle->Required = true;

			$this->txtContent = new QTextBox($this);
			$this->txtContent->Text = $objWikiObject->Content;
			$this->txtContent->Required = true;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			$this->txtContent->CrossScripting = QCrossScripting::Allow;
		}

		protected function SaveWikiVersion() {
			$objWikiPage = new WikiPage();
			$objWikiPage->Content = trim($this->txtContent->Text);
			$objWikiPage->CompileHtml();

			$objWikiVersion = $this->objWikiItem->CreateNewVersion(trim($this->txtTitle->Text), $objWikiPage, 'Save', array(), QApplication::$Person, null);
			return $objWikiVersion;
		}
	}
?>