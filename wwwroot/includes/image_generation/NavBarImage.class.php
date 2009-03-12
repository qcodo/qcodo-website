<?php
	class NavBarImage extends QImageBase {
		protected $strWidth = 200;
		protected $strHeight = 55;
		protected $intQuality = 5;
		public $Text = 'FOO BAR';
		public $Mode = NavBarImageMode::Standard;

		protected $objDraw;
		protected $objImage;

		protected $strImageType = QImageType::Jpeg;

		protected function SetFontSize($intFontSize) {
			$this->objDraw->SetFontSize($intFontSize * $this->intQuality);
		}

		protected function DrawTextCenterBottom($strText, $intBottomPad = 0) {
			$this->objDraw->SetGravity(Imagick::GRAVITY_CENTER);
			$intFontSize = $this->objDraw->GetFontSize() / $this->intQuality;
			$intYValue = -1 * $intBottomPad;
			$intYValue += ($this->strHeight - $intFontSize) / 2;
			$intYValue *= $this->intQuality;
			$this->objImage->AnnotateImage($this->objDraw, 0, $intYValue, 0, $strText);
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

					if ($this->Mode == NavBarImageMode::Standard) {
						$objTextColor = new ImagickPixel('#bbc5bb');
						$objBackgroundColor = new ImagickPixel('#5c5c5c');
						$objBackgroundColorHighlight = new ImagickPixel('#808080');
						$objBackgroundColorHighlightLess = new ImagickPixel('#696969');
					} else {
						$objTextColor = new ImagickPixel('#ffffff');
						$objBackgroundColor = new ImagickPixel('#667066');
						$objBackgroundColorHighlight = new ImagickPixel('#99a599');
						$objBackgroundColorHighlightLess = new ImagickPixel('#778277');
					}

					// Create Objects
					$this->objImage = new IMagick();
					$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);
					$this->objDraw = new IMagickDraw();

					// Draw Highlights
					$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
					$this->DrawHorizontalLine(0, $this->strWidth, 0);
					$this->DrawVerticalLine(0, 0, $this->strHeight);

					$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
					$this->DrawHorizontalLine(1, $this->strWidth, 1);
					$this->DrawVerticalLine(1, 1, $this->strHeight);

					// Overlay Shade
					$objNewImage = new IMagick(__DOCROOT__ . '/images/mask.png');
					$objNewImage->ResizeImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, IMagick::FILTER_GAUSSIAN, .7);
					$this->objImage->CompositeImage($objNewImage, Imagick::COMPOSITE_MULTIPLY, 0, 0);

					// Draw Text
					$this->objDraw->setTextAntiAlias(false);
					$this->objDraw->setStrokeColor($objTextColor);
					$this->objDraw->setFillColor($objTextColor);
					$this->objDraw->SetFont('Formata-Medium.pfb');
					$this->SetFontSize(14);
					$this->DrawTextCenterBottom($this->Text, 4);

					// Scale Down
					$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .7);
					break;

				default:
					$objBackgroundColor = new ImagickPixel('#335533');
					$objBackgroundColorHighlight = new ImagickPixel('#112211');
					$objBackgroundColorHighlightLess = new ImagickPixel('#224422');
					$objTextColor = new ImagickPixel('#ffffee');

					// Create Objects
					$this->objImage = new IMagick();
					$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);
					$this->objDraw = new IMagickDraw();

					// Draw Highlights
					$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
//					$this->DrawHorizontalLine(0, $this->strWidth, 0);
					$this->DrawVerticalLine(0, 0, $this->strHeight);

					$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
//					$this->DrawHorizontalLine(1, $this->strWidth, 1);
					$this->DrawVerticalLine(1, 0, $this->strHeight);

					// Draw Text
					$this->objDraw->setTextAntiAlias(false);
					$this->objDraw->setStrokeColor($objTextColor);
					$this->objDraw->setFillColor($objTextColor);
					$this->objDraw->SetFont('Formata-Medium.pfb');
					$this->SetFontSize(14);
					$this->DrawTextCenterBottom($this->Text, 4);

					// Scale Down
					$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .7);
					break;
			}

			return $this->RenderImageMagickHelper($this->objImage, $strPath);
		}
	}
?>