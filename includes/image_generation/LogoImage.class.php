<?php
	class LogoImage extends QImageBase {
		protected $strWidth = 2000;
		protected $strHeight = 55;
		protected $intQuality = 5;
		protected $objDraw;
		protected $objImage;
		protected $strImageType = QImageType::Jpeg;

		protected function SetFontSize($intFontSize) {
			$this->objDraw->SetFontSize($intFontSize * $this->intQuality);
		}

		protected function DrawText($strText, $intX, $intY) {
//			$this->objDraw->SetGravity(Imagick::GRAVITY_CENTER);
			$intFontSize = $this->objDraw->GetFontSize() / $this->intQuality;
			$this->objImage->AnnotateImage($this->objDraw, $intX * $this->intQuality, $intY * $this->intQuality, 0, $strText);
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
			$objTextColor = new ImagickPixel('#eafaea');
			$objTextColorShadow = new ImagickPixel('#163616');
			$objBackgroundColor = new ImagickPixel('#5c5c5c');

			$this->objImage = new IMagick();
			$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);

			$this->objDraw = new IMagickDraw();

					// Overlay Shade
					$objNewImage = new IMagick(__DOCROOT__ . '/images/mask.png');
					$objNewImage->ResizeImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, IMagick::FILTER_GAUSSIAN, .7);
					$this->objImage->CompositeImage($objNewImage, Imagick::COMPOSITE_MULTIPLY, 0, 0);

			// Draw Text
			$this->objDraw->setStrokeColor($objTextColorShadow);
			$this->objDraw->setFillColor($objTextColorShadow);
			$this->objDraw->SetFont(__QCODO__ . '/fonts/Formata-Bold.pfb');
			$this->SetFontSize(12);
			$this->DrawText('PHP DEVELOPMENT FRAMEWORK', 159.5, 49.5);

			$this->objDraw->setStrokeColor($objTextColor);
			$this->objDraw->setFillColor($objTextColor);
			$this->DrawText('PHP DEVELOPMENT FRAMEWORK', 158, 48);

			// Scale Down
			$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .7);

			$objLogo = new IMagick(__DOCROOT__ . '/images/qcodo_logo_2.png');
			$objLogo->ResizeImage(380 * .4, 132 * .4, Imagick::FILTER_GAUSSIAN, .7);
			$this->objImage->CompositeImage($objLogo, Imagick::COMPOSITE_OVER, 4, 2);
			
			return $this->RenderImageMagickHelper($this->objImage, $strPath);
		}
	}
?>