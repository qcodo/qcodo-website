<?php
	class SubNavIdentityImage extends QImageBase {
		protected $strWidth = 120;
		protected $strHeight = 18;
		protected $intQuality = 3;
		public $Text = 'Welcome Qcodo User!';
		public $Mode = null;
		public $LeftShadeFlag = false;

		protected $objDraw;
		protected $objImage;

		protected $strImageType = QImageType::Jpeg;

		protected function SetFontSize($intFontSize) {
			$this->objDraw->SetFontSize($intFontSize * $this->intQuality);
		}

		protected function DrawText($strText, $intX, $intY) {
			$intFontSize = $this->objDraw->GetFontSize() / $this->intQuality;
			$this->objImage->AnnotateImage($this->objDraw, $intX * $this->intQuality, $intY * $this->intQuality, 0, $strText);
		}

		protected function DrawTextCenter($strText, $blnShadow = false) {
			$this->objDraw->SetGravity(Imagick::GRAVITY_CENTER);
			$intFontSize = $this->objDraw->GetFontSize() / $this->intQuality;
			if ($blnShadow)
				$this->objImage->AnnotateImage($this->objDraw, $this->intQuality, $this->intQuality, 0, $strText);
			else
				$this->objImage->AnnotateImage($this->objDraw, 0, 0, 0, $strText);
		}

		protected function DrawHorizontalLine($intStartX, $intEndX, $intY) {
			$this->objDraw->SetFillColor($this->objDraw->GetStrokeColor());
			$this->objDraw->rectangle($intStartX * $this->intQuality, $intY * $this->intQuality, $intEndX * $this->intQuality, ($intY + 1) * $this->intQuality);
			$this->objImage->DrawImage($this->objDraw);
		}

		protected function DrawVerticalLine($intX, $intStartY, $intEndY) {
			$this->objDraw->SetFillColor($this->objDraw->GetStrokeColor());
			$this->objDraw->rectangle($intX * $this->intQuality, $intStartY * $this->intQuality, ($intX + 1) * $this->intQuality, $intEndY * $this->intQuality);
			$this->objImage->DrawImage($this->objDraw);
		}

		public function RenderImage($strPath = null) {
			$objBackgroundColor = new ImagickPixel('#2d2d2d');
			$objBackgroundColorHighlight = new ImagickPixel('#464646');
			$objBackgroundColorHighlightLess = new ImagickPixel('#3a3a3a');

			switch ($this->Mode) {
				case NavBarImageMode::Standard:
				case NavBarImageMode::Hover:
					if ($this->Mode == NavBarImageMode::Standard)
						$objTextColor = new ImagickPixel('#bbc5bb');
					else
						$objTextColor = new ImagickPixel('#ffffff');

					// Create Objects
					$this->objImage = new IMagick();
					$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);

					$this->objDraw = new IMagickDraw();
					$this->objDraw->SetFont(__QCODO__ . '/fonts/Formata-Regular.pfb');
					$this->SetFontSize(10);
					break;
				default:
					$objTextColor = new ImagickPixel('#ffffff');

					// Create Objects
					$this->objImage = new IMagick();
					$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);
					
					$this->objDraw = new IMagickDraw();
					$this->objDraw->SetFont(__QCODO__ . '/fonts/Formata-Medium.pfb');
					$this->SetFontSize(10);
					break;
			}

			// Draw Highlights
			$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
			$this->DrawHorizontalLine(0, $this->strWidth, 0);
			$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
			$this->DrawHorizontalLine(0, $this->strWidth, 1);

			if ($this->LeftShadeFlag) {
				$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
				$this->DrawVerticalLine(0, 0, $this->strHeight);
				$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
				$this->DrawVerticalLine(1, 1, $this->strHeight);
			}

			$this->objDraw->setStrokeColor($objTextColor);
			$this->objDraw->setFillColor($objTextColor);
			$this->DrawText($this->Text, 9, 12);

			// Scale Down
			$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .6);

			return $this->RenderImageMagickHelper($this->objImage, $strPath);
		}
	}
?>