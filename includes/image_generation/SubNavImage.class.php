<?php
	class SubNavImage extends QImageBase {
		protected $strWidth = 80;
		protected $strHeight = 18;
		protected $intQuality = 5;
		public $Text = 'Learn More';
		public $Mode = NavBarImageMode::Standard ;

		public $LeftShadeFlag = true;
		public $TopShadeStartX = 0;
		public $TopShadeEndX = 80;

		protected $objDraw;
		protected $objImage;

		protected $strImageType = QImageType::Jpeg;

		protected function SetFontSize($intFontSize) {
			$this->objDraw->SetFontSize($intFontSize * $this->intQuality);
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
			switch ($this->Mode) {
				case NavBarImageMode::Standard:
				case NavBarImageMode::Hover:
					// Setup Colors
					$objBackgroundColor = new ImagickPixel('#335533');
					$objBackgroundColorHighlight = new ImagickPixel('#112211');
					$objBackgroundColorHighlightLess = new ImagickPixel('#224422');

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
					// Setup Colors
					$objBackgroundColor = new ImagickPixel('#668866');
					$objBackgroundColorHighlight = new ImagickPixel('#334433');
					$objBackgroundColorHighlightLess = new ImagickPixel('#556655');
					$objTextColor = new ImagickPixel('#ffffee');
					$objTextColorShadow = new ImagickPixel('#333333');

					// Create Objects
					$this->objImage = new IMagick();
					$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);

					$this->objDraw = new IMagickDraw();
					$this->objDraw->SetFont(__QCODO__ . '/fonts/Formata-Medium.pfb');
					$this->SetFontSize(10);
					break;
			}


			// Draw Highlights
			if ($this->LeftShadeFlag) {
				// Top and Left Shade
				$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
				$this->DrawVerticalLine(0, 0, $this->strHeight);

				$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
				$this->DrawVerticalLine(1, 0, $this->strHeight);
				
				if (!is_null($this->TopShadeStartX)) {
					$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
					$this->DrawHorizontalLine($this->TopShadeStartX, $this->TopShadeEndX, 0);

					$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
					$this->DrawHorizontalLine($this->TopShadeStartX + 1, $this->TopShadeEndX, 1);
				}

			// Top Shade Only
			} else if (!is_null($this->TopShadeStartX)) {
				$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
				$this->DrawHorizontalLine($this->TopShadeStartX, $this->TopShadeEndX, 0);

				$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
				if ($this->TopShadeStartX == 0)
					$this->DrawHorizontalLine($this->TopShadeStartX, $this->TopShadeEndX, 1);
				else
					$this->DrawHorizontalLine($this->TopShadeStartX + 1, $this->TopShadeEndX, 1);
			}

			if (isset($objTextColorShadow)) {
				// Draw Text
				$this->objDraw->setStrokeColor($objTextColorShadow);
				$this->objDraw->setFillColor($objTextColorShadow);
				$this->DrawTextCenter($this->Text, true);
			}

			$this->objDraw->setStrokeColor($objTextColor);
			$this->objDraw->setFillColor($objTextColor);
			$this->DrawTextCenter($this->Text);

			// Scale Down
			$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .7);

			return $this->RenderImageMagickHelper($this->objImage, $strPath);
		}
	}
?>