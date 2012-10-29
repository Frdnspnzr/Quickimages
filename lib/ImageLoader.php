<?php

abstract Class ImageLoader {

	private $imagePath = null;
	private $imageName = null;
	private $imageExtension = null;


	public static function getNew() {

		//Get name of concrete loader
		$concreteClass = Config::get()->read("imageLoader");

		//Include file containing the loader
		require_once("./lib/loader/" . $concreteClass . ".php");

		//Create the instance
		return new $concreteClass();

	}

	public function setImagePath($path) {
		$this->imagePath = $path;
	}

	public function setImageName($name) {
		$this->imageName = $name;
	}

	public function setImageExtension($ext) {
		$this->imageExtension = $ext;
	}

	public function printImage() {

		if ($this->isExtensionSupported($this->imageExtension)) {

			header("Content-Type: " . $this->getContentType($this->imageExtension));
			$this->printImg($this->imagePath, $this->imageName, $this->imageExtension);

		} else {

			header ("Content-Type: image/png");

			$image = ImageCreate (300, 300);
			$background_color = ImageColorAllocate($image, 0, 0, 0);
			$text_color = ImageColorAllocate($image, 160, 160, 160);
			ImageString($image, 4, 5, 5, "Image format not supported :(", $text_color);

			imagepng($image);

			imagedestroy($image);

		}

	}

	protected abstract function getContentType($extension);
	protected abstract function printImg($path, $name, $extension);
	protected abstract function isExtensionSupported($extension);

}