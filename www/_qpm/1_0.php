<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	
	class QpmService extends QSoapService {
		/**
		 * Returns the current Qcodo version, for stable or development
		 * Returns a string formatted as int.int.int (three integers, separated by two periods)
		 * representing the major version number, minor version number, and build number
		 * @param boolean $blnDevelopment
		 * @return string
		 */
		public function GetCurrentQcodoVersion($blnDevelopment) {
			if ($blnDevelopment) return trim(file_get_contents(__QCODO_BUILDS__ . '/DEVELOPMENT'));
			return trim(file_get_contents(__QCODO_BUILDS__ . '/STABLE'));
		}
	}

	if (QApplication::PathInfo(0)) {
		$objService = new QpmService('QpmService', null);

		switch (QApplication::PathInfo(0)) {
			case 'GetCurrentQcodoVersion':
				print $objService->GetCurrentQcodoVersion(QApplication::QueryString('dev'));
		}
	} else
		QpmService::Run('QpmService');
?>