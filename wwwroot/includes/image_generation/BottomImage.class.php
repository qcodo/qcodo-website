<?php
	class BottomImage extends QImageBase {
		protected $strWidth = 500;
		protected $strHeight = 28;
		protected $intQuality = 5;
		public $Text = 'COPYRIGHT INFORMATION';
		public $XPosition = 8;
		public $YPosition = 16;
		public $Font = 'Formata-Medium.pfb';
		public $FontSize = 9;

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

		public function RenderImage($strPath = null) {
			$objTextColor = new ImagickPixel('#bbbbbb');
			$objBackgroundColor = new ImagickPixel('#393939');
			$objBackgroundColorHighlight = new ImagickPixel('#606060');
			$objBackgroundColorHighlightLess = new ImagickPixel('#404040');

			// Create Objects
			$this->objImage = new IMagick();
			$this->objImage->NewImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, $objBackgroundColor);
			$this->objDraw = new IMagickDraw();

			// Overlay Shade
			$objNewImage = new IMagick(__DOCROOT__ . '/images/mask.png');
			$objNewImage->ResizeImage($this->strWidth * $this->intQuality, $this->strHeight * $this->intQuality, IMagick::FILTER_GAUSSIAN, .7);
			$this->objImage->CompositeImage($objNewImage, Imagick::COMPOSITE_MULTIPLY, 0, 0);

//			$this->objDraw->setStrokeColor($objBackgroundColorHighlight);
//			$this->DrawHorizontalLine(0, $this->strWidth, 0);

	//		$this->objDraw->setStrokeColor($objBackgroundColorHighlightLess);
	//		$this->DrawHorizontalLine(0, $this->strWidth, 1);

			$this->objDraw = new IMagickDraw();
			$this->objDraw->SetFont($this->Font);
			$this->SetFontSize($this->FontSize);

			$this->objDraw->setStrokeColor($objTextColor);
			$this->objDraw->setFillColor($objTextColor);
			$this->DrawText($this->Text, $this->XPosition, $this->YPosition);

			// Scale Down
			$this->objImage->ResizeImage($this->strWidth, $this->strHeight, Imagick::FILTER_GAUSSIAN, .7);

			return $this->RenderImageMagickHelper($this->objImage, $strPath);
		}
	}
?>