<?php
	function RefreshGitData($strRepository, $strRegistryName) {
		$strXml = file_get_contents('https://github.com/qcodo/' . $strRepository . '/commits/master.atom');
		$objXml = new SimpleXMLElement($strXml);
		$objMostRecentCommit = $objXml->entry[0];
		$dttCommit = new QDateTime((string) $objMostRecentCommit->updated);

		$strMessage = trim((string) $objMostRecentCommit->title);
		$strDate = $dttCommit->__toString('DDDD, MMMM D, YYYY');
		$strUrl = (string)($objMostRecentCommit->link['href']);

		// Cleanup Message
		if (($intPosition = strpos($strMessage, "\n")) !== false) {
			$strMessage = trim(substr($strMessage, 0, $intPosition));
		}

		Registry::SetValue('gitinfo_' . $strRegistryName . '_message', $strMessage);
		Registry::SetValue('gitinfo_' . $strRegistryName . '_date', $strDate);
		Registry::SetValue('gitinfo_' . $strRegistryName . '_url', $strUrl);
	}

	RefreshGitData('qcodo-website', 'qcodo-website');
	RefreshGitData('qcodo', 'qcodo');
?>