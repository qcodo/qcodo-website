<?php
	class NavBarPanel extends QPanel {
		public $ctlWelcomeImage;
		public $ctlLoginOut;
		public $ctlRegisterProfile;
		public $ctlSubNavBackground;
		public $ctlSubNavBackgroundPadding;
		public $ctlNavBarArray = array();
		public $ctlSubNavArray = array();
		
		public $intSubNavPadding;

		public function __construct($objParentObject, $strControlId = null, $intNavIndex = null, $intSubNavIndex = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->strTemplate = __INCLUDES__ . '/NavBarPanel.tpl.php';

			// Calculate SubNavPadding
			$intCount = count(QApplication::$NavBarArray);
			$intSubNavWidth = 0;
			$blnFoundSelected = false;
			for ($intIndex = 1; $intIndex <= $intCount; $intIndex++) {
				if ($intIndex == $intNavIndex) {
					$blnFoundSelected = true;
					foreach (QApplication::$NavBarArray[$intIndex - 1][3] as $arrSubNav)
						$intSubNavWidth += $arrSubNav[2] + 1;
				}
				if ($blnFoundSelected)
					$this->intSubNavPadding += QApplication::$NavBarArray[$intIndex - 1][2] + 1;
			}
			
			if ($blnFoundSelected) {
				$this->intSubNavPadding -= $intSubNavWidth;
				if ($this->intSubNavPadding <= 0)
					$this->intSubNavPadding = 0;
			}


			// Generate Everything
			$intIndex = 1;
			foreach (QApplication::$NavBarArray as $arrNavBar) {
				if ($intNavIndex == $intIndex) {
					$blnFoundSelected = true;

					$ctlNavBar = new QImageRollover($this);
					$ctlNavBar->ToolTip = $arrNavBar[0];
					$ctlNavBar->LinkUrl = $arrNavBar[1];
					$ctlNavBar->ImageStandard = '/images/gen/nav_' . $intIndex . '_sel.jpg';

					$intSubIndex = 1;
					foreach ($arrNavBar[3] as $arrSubNav) {
						if ($intSubNavIndex == $intSubIndex) {
							$ctlSubNav = new QImageRollover($this);
							$ctlSubNav->ToolTip = $arrSubNav[0];
							$ctlSubNav->LinkUrl = $arrSubNav[1];
							$ctlSubNav->ImageStandard = '/images/gen/sub_' . $intIndex . '_' . $intSubIndex . '_sel.jpg';
						} else {
							$ctlSubNav = new QImageRollover($this);
							$ctlSubNav->ToolTip = $arrSubNav[0];
							$ctlSubNav->LinkUrl = $arrSubNav[1];
							$ctlSubNav->ImageStandard = '/images/gen/sub_' . $intIndex . '_' . $intSubIndex . '.jpg';
							$ctlSubNav->ImageHover = '/images/gen/sub_' . $intIndex . '_' . $intSubIndex . '_hov.jpg';
						}

						$this->ctlSubNavArray[] = $ctlSubNav;
						$intSubIndex++;
					}
				} else {
					$ctlNavBar = new QImageRollover($this);
					$ctlNavBar->ToolTip = $arrNavBar[0];
					$ctlNavBar->LinkUrl = $arrNavBar[1];
					$ctlNavBar->ImageStandard = '/images/gen/nav_' . $intIndex . '.jpg';
					$ctlNavBar->ImageHover =  '/images/gen/nav_' . $intIndex . '_hov.jpg';
				}

				$this->ctlNavBarArray[] = $ctlNavBar;
				$intIndex++;
			}

			// Other Stuff
			$this->ctlWelcomeImage = new SubNavIdentityImage($this);
			$this->ctlWelcomeImage->Text = 'Welcome Mike!';
			$this->ctlWelcomeImage->Width = 249;

			$this->ctlLoginOut = new QImageRollover($this);
			$this->ctlLoginOut->ToolTip = 'Log Out';
			$this->ctlLoginOut->LinkUrl = '/logout/';
			$this->ctlLoginOut->ImageStandard = '/images/gen/logout.jpg';
			$this->ctlLoginOut->ImageHover = '/images/gen/logout_hov.jpg';

			$this->ctlRegisterProfile = new QImageRollover($this);
			$this->ctlRegisterProfile->ToolTip = 'My Profile';
			$this->ctlRegisterProfile->LinkUrl = '/profile/';
			$this->ctlRegisterProfile->ImageStandard = '/images/gen/profile.jpg';
			$this->ctlRegisterProfile->ImageHover = '/images/gen/profile_hov.jpg';
		}
	}
?>