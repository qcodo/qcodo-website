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

		/**
		 * Looks up a package given the PackageName and returns the ID if it exists, 0 otherwise
		 * @param string $strPackageName
		 * @return integer
		 */
		public function GetPackageId($strPackageName) {
			$objPackage = Package::LoadByToken(trim(strtolower($strPackageName)));
			if ($objPackage) return $objPackage->Id;
			return 0;
		}

		/**
		 * Given a Qcodo.com username and password, this will either return the user ID or 0 if the credentials are invalid
		 * @param string $strUsername
		 * @param string $strPassword
		 * @return integer
		 */
		public function Login($strUsername, $strPassword) {
			$objPerson = Person::LoadByUsername(trim(strtolower($strUsername)));
			if (!$objPerson) return 0;
			if ($objPerson->IsPasswordValid($strPassword)) return $objPerson->Id;
			return 0;
		}
	}

	if (QApplication::PathInfo(0)) {
		$objService = new QpmService('QpmService', null);

		switch (QApplication::PathInfo(0)) {
			case 'GetCurrentQcodoVersion':
				print $objService->GetCurrentQcodoVersion(QApplication::QueryString('dev'));
				break;
			case 'Login':
				print $objService->Login(QApplication::QueryString('u'), QApplication::QueryString('p'));
				break;
			case 'GetPackageId':
				print $objService->GetPackageId(QApplication::QueryString('name'));
				break;
		}
	} else
		QpmService::Run('QpmService');
?>