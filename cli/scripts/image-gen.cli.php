<?php
	require(__INCLUDES__ . '/image_generation/BottomImage.class.php');
	require(__INCLUDES__ . '/image_generation/LogoImage.class.php');
	require(__INCLUDES__ . '/image_generation/NavBarImage.class.php');
	require(__INCLUDES__ . '/image_generation/SubNavImage.class.php');

	define('IMAGE_GEN', __DOCROOT__ . '/images/gen/');


	// REMOVE OLD IMAGES
	exec('rm -r -f ' . __DOCROOT__ . '/images/gen/*');


	// LOGO IMAGE
	$objImage = new LogoImage(null);
	$objImage->RenderImage(IMAGE_GEN . 'logo.jpg');


	// NAV IMAGES
	$intNavIndex = 0;
	print 'Generating ' . count(QApplication::$NavBarArray) . ' Nav Images... [0]';
	foreach (QApplication::$NavBarArray as $arrNavBar) {
		print (str_repeat(chr(8), strlen($intNavIndex) + 1));
		print $intNavIndex . ']';

		$objImage = new NavBarImage(null);
		$objImage->Width = $arrNavBar[2];
		$objImage->Text = strtoupper($arrNavBar[0]);

		$objImage->Mode = NavBarImageMode::Standard;
		$objImage->RenderImage(IMAGE_GEN . 'nav_' . $intNavIndex . '.jpg');

		$objImage->Mode = NavBarImageMode::Hover;
		$objImage->RenderImage(IMAGE_GEN . 'nav_' . $intNavIndex . '_hov.jpg');

		$objImage->Mode = NavBarImageMode::Selected;
		$objImage->RenderImage(IMAGE_GEN . 'nav_' . $intNavIndex . '_sel.jpg');

		$intNavIndex++; 
	}
	print " Done.\r\n";


	// SUBNAV BG AND PADDING IMAGES
	$objImage = new SubNavIdentityImage(null);
	$objImage->Text = '';
	$objImage->RenderImage(IMAGE_GEN . 'subnav_background.jpg');

	$objImage->Width = 300;
	$objImage->LeftShadeFlag = true;
	$objImage->RenderImage(IMAGE_GEN . 'subnav_padding.jpg');


	// LOG IN/OUT, REGISTER, PROFILE
	$objImage->LeftShadeFlag = false;

	$objImage->Width = 50;
	$objImage->Text = 'Log Out';
	$objImage->Mode = NavBarImageMode::Standard;
	$objImage->RenderImage(IMAGE_GEN . 'logout.jpg');
	$objImage->Mode = NavBarImageMode::Hover;
	$objImage->RenderImage(IMAGE_GEN . 'logout_hov.jpg');

	$objImage->Text = 'Log In';
	$objImage->Mode = NavBarImageMode::Standard;
	$objImage->RenderImage(IMAGE_GEN . 'login.jpg');
	$objImage->Mode = NavBarImageMode::Hover;
	$objImage->RenderImage(IMAGE_GEN . 'login_hov.jpg');

	$objImage->Width = 60;
	$objImage->Text = 'My Profile';
	$objImage->Mode = NavBarImageMode::Standard;
	$objImage->RenderImage(IMAGE_GEN . 'profile.jpg');
	$objImage->Mode = NavBarImageMode::Hover;
	$objImage->RenderImage(IMAGE_GEN . 'profile_hov.jpg');

	$objImage->Text = 'Register';
	$objImage->Mode = NavBarImageMode::Standard;
	$objImage->RenderImage(IMAGE_GEN . 'register.jpg');
	$objImage->Mode = NavBarImageMode::Hover;
	$objImage->RenderImage(IMAGE_GEN . 'register_hov.jpg');


	// SUBNAV IMAGES
	print 'Generating ' . count(QApplication::$NavBarArray) . ' Subnav Images... [0]';
	for ($intNavIndex = 0; $intNavIndex < count(QApplication::$NavBarArray); $intNavIndex++) {
		print (str_repeat(chr(8), strlen($intNavIndex) + 1)); print $intNavIndex . ']';

		$arrNavBar = QApplication::$NavBarArray[$intNavIndex];
		$objSubNavArray = $arrNavBar[3];

		$intSubNavWidth = 0;
		$intSubNavPadding = 0;

		// Calculate the SubNavWidth and the SubNavPadding values
		$blnFoundSelected = false;
		for ($intIndex = 0; $intIndex < count(QApplication::$NavBarArray); $intIndex++) {
			if ($intIndex == $intNavIndex) {
				$blnFoundSelected = true;
				foreach (QApplication::$NavBarArray[$intIndex][3] as $arrSubNav)
					$intSubNavWidth += $arrSubNav[2] + 1;
			}
			if ($blnFoundSelected)
				$intSubNavPadding += QApplication::$NavBarArray[$intIndex][2] + 1;
		}

		$intNavWindowXStart = $intSubNavPadding;
		$intNavWindowXEnd = $intNavWindowXStart - $arrNavBar[2] - 1;

		$intSubNavPadding -= $intSubNavWidth;
		if ($intSubNavPadding <= 0)
			$intSubNavPadding = 0;
		$intSubNavWidth--;

		$intSubNavIndex = 0;
		foreach ($objSubNavArray as $arrSubNav) {
			$intSubNavXStart = $intSubNavWidth + $intSubNavPadding;
			$intSubNavXEnd = $intSubNavXStart - $arrSubNav[2] - 1;
			
			switch (true) {
				case ($intSubNavXStart < $intNavWindowXStart) && ($intSubNavXEnd >= $intNavWindowXEnd):
					$intTopShadeStart = null;
					$intTopShadeEnd = null;
					break;
				case ($intSubNavXStart >= $intNavWindowXStart) && ($intSubNavXEnd >= $intNavWindowXEnd):
					$intTopShadeStart = 0;
					$intTopShadeEnd = $intSubNavXStart - $intNavWindowXStart;
					break;
				case ($intSubNavXStart < $intNavWindowXStart) && ($intSubNavXStart > $intNavWindowXEnd) && ($intSubNavXEnd < $intNavWindowXEnd):
					$intTopShadeStart = $intSubNavXStart - $intNavWindowXEnd - 1;
					$intTopShadeEnd = $arrSubNav[2];
					break;
				case ($intSubNavXStart >= $intNavWindowXStart) && ($intSubNavXEnd < $intNavWindowXEnd):
					$intTopShadeStart = null;
					$intTopShadeEnd = null;
					break;
				default:
					$intTopShadeStart = 0;
					$intTopShadeEnd = $arrSubNav[2];
					break;
			}

			$intSubNavWidth -= $arrSubNav[2] - 1;
			$objImage = new SubNavImage(null);
			$objImage->Width = $arrSubNav[2];
			$objImage->Text = $arrSubNav[0];
			$objImage->LeftShadeFlag = ($intSubNavIndex == 0);
			$objImage->TopShadeStartX = $intTopShadeStart;
			$objImage->TopShadeEndX = $intTopShadeEnd;

			$objImage->Mode = NavBarImageMode::Standard;
			$objImage->RenderImage(IMAGE_GEN . 'sub_' . $intNavIndex . '_' . $intSubNavIndex . '.jpg');

			$objImage->Mode = NavBarImageMode::Selected;
			$objImage->RenderImage(IMAGE_GEN . 'sub_' . $intNavIndex . '_' . $intSubNavIndex . '_sel.jpg');

			$objImage->Mode = NavBarImageMode::Hover;
			$objImage->RenderImage(IMAGE_GEN . 'sub_' . $intNavIndex . '_' . $intSubNavIndex . '_hov.jpg');

			$intSubNavIndex++;
		}
	}
	print " Done.\r\n";

	// BOTTOM IMAGES
	$objImage = new BottomImage(null);
	$objImage->Text = 'COPYRIGHT & OPEN-SOURCE LICENSE INFORMATION';
	$objImage->RenderImage(IMAGE_GEN . 'bottom_copyright.jpg');

	$objImage->XPosition = 116;
	$objImage->Width = 200;
	$objImage->Text = 'SOLI DEO GLORIA';
	$objImage->RenderImage(IMAGE_GEN . 'bottom_sdg.jpg');

	$objImage->Text = '';
	$objImage->RenderImage(IMAGE_GEN . 'bottom.jpg');

	print ("Done.\r\n");
?>