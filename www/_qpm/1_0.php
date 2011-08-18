<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	ini_set('memory_limit', '256M');

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
		 * Looks up a package version count given the PackageName and User.
		 * This will throw an exception if the Package or Username does not exist
		 * @param string $strPackageName
		 * @param string $strUsername
		 * @return integer
		 */
		public function GetPackageVersionCount($strPackageName, $strUsername) {
			$objPackage = Package::LoadByToken(trim(strtolower($strPackageName)));
			if (!$objPackage) throw new Exception('Package does not exist');
			$objPerson = Person::LoadByUsername(trim(strtolower($strUsername)));
			if (!$objPerson) throw new Exception('Person does not exist');
			
			$objPackageContribution = PackageContribution::LoadByPackageIdPersonId($objPackage->Id, $objPerson->Id);
			if (!$objPackageContribution) return 0;
			return $objPackageContribution->CountPackageVersions();
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


		/**
		 * This performs the actual upload of the package's payload
		 * @param string $strPackageName
		 * @param string $strUsername
		 * @param string $strPassword
		 * @param boolean $blnGzCompress
		 * @param string $strQpmXml
		 * @return string
		 */
		public function UploadPackage($strPackageName, $strUsername, $strPassword, $blnGzCompress, $strQpmXml) {
			$objPerson = Person::Load($this->Login($strUsername, $strPassword));
			$objPackage = Package::Load($this->GetPackageId($strPackageName));

			if ($blnGzCompress) {
				$strQpmXml = gzuncompress($strQpmXml);
			}

			try {
				$objContribution = $objPackage->PostContributionVersion($objPerson, $strQpmXml, null);
			} catch (Exception $objExc) {
				return 'a server exception was thrown by the qpm webservice: ' . $objExc->getMessage();
			}

			if ($objContribution) {
				$objPackage->PostMessage('A new version of this package was uploaded by ' . $objPerson->DisplayName, null, null);
				return sprintf('package %s/%s uploaded successfully', $objPerson->Username, $objPackage->Token);
			} else {
				return 'an unknown error has occurred, package not uploaded';
			}
		}


		/**
		 * @param string $strPackageName
		 * @param string $strUsername
		 * @param boolean $blnGzCompress
		 * @return string
		 */
		public function DownloadPackage($strPackageName, $strUsername, $blnGzCompress) {
			$objPerson = Person::LoadByUsername($strUsername);
			$objPackage = Package::Load($this->GetPackageId($strPackageName));
			if (!$objPerson) return null;
			if (!$objPackage) return null;
			
			$objPackageContribution = PackageContribution::LoadByPackageIdPersonId($objPackage->Id, $objPerson->Id);
			if (!$objPackageContribution) return null;
			if (!$objPackageContribution->CurrentPackageVersion) return null;

			$objPackageContribution->CurrentPackageVersion->DownloadCount++;
			$objPackageContribution->CurrentPackageVersion->Save();
			$objPackageContribution->RefreshStats();

			if ($blnGzCompress) {
				$strPath = $objPackageContribution->CurrentPackageVersion->GetFilePathCompressed();
			} else {
				$strPath = $objPackageContribution->CurrentPackageVersion->GetFilePath();
			}

			header('Content-Length: ' . filesize($strPath));
			return file_get_contents($strPath);
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
			case 'GetPackageVersionCount':
				print $objService->GetPackageVersionCount(QApplication::QueryString('name'), QApplication::QueryString('u'));
				break;
			case 'UploadPackage':
				$strPackageName = QApplication::QueryString('name');
				$strUsername = QApplication::QueryString('u');
				$strPassword = QApplication::QueryString('p');
				$blnGzCompress = QApplication::QueryString('gz');
				$strQpmXml = file_get_contents('php://input');
				print $objService->UploadPackage($strPackageName, $strUsername, $strPassword, $blnGzCompress, $strQpmXml);
				break;
			case 'DownloadPackage':
				$strPackageName = QApplication::QueryString('name');
				$strUsername = QApplication::QueryString('u');
				$blnGzCompress = QApplication::QueryString('gz');
				$strToReturn = $objService->DownloadPackage($strPackageName, $strUsername, $blnGzCompress);
				if ($strToReturn) {
					if ($blnGzCompress) {
						header('Content-Type: application/x-gzip');
					} else {
						header('Content-Type: text/xml');
					}
					print $strToReturn;
				}
				break;
		}
	} else
		QpmService::Run('QpmService');
?>