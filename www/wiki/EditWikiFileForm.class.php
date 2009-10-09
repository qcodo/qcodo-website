<?php
	class EditWikiFileForm extends EditWikiForm {
		protected $intWikiItemTypeId = WikiItemType::File;

		protected $txtTitle;
		protected $flcFile;
		protected $txtDescription;
		
		protected function CreateControlsForWikiVersionAndObject(WikiVersion $objWikiVersion, $objWikiObject) {
			$this->txtTitle = new QTextBox($this);
			$this->txtTitle->Text = $objWikiVersion->Name;
			$this->txtTitle->Required = true;

			$this->flcFile = new QFileControl($this, 'flc');
			$this->flcFile->Required = true;

			$this->txtDescription = new QTextBox($this);
			$this->txtDescription->Text = $objWikiObject->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
		}

		protected function SaveWikiVersion() {
			// Create the Parameters for Save
			$objWikiFile = new WikiFile();
			$objWikiFile->Description = trim($this->txtDescription->Text);
			$arrMethodParameters = array($this->flcFile->File, $this->flcFile->FileName);

			$objWikiVersion = $this->objWikiItem->CreateNewVersion(trim($this->txtTitle->Text), $objWikiFile, 'SaveFile', $arrMethodParameters, QApplication::$Person, null);
			return $objWikiVersion;
		}
	}
?>