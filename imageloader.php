<?php

if (!isset($_GET['name']) || !isset($_GET['path'])) {

	header ("Content-Type: image/png");

	$image = ImageCreate (300, 300);
	$background_color = ImageColorAllocate($image, 0, 0, 0);
	$text_color = ImageColorAllocate($image, 160, 160, 160);
	ImageString($image, 4, 5, 5, "Something went horribly wrong :(", $text_color);
		ImagePNG($image);

		imagedestroy($image);

	} else {

		//Load configuration
		require_once('./lib/Config.php');

		//Load abstract library
		require_once('./lib/ImageLoader.php');

		$config = CONFIG::get();

		$imagePath = $_GET['path'];
		$imageName = explode('.',$_GET['name'])[0];
		$imageExtension = strtolower(explode('.',$_GET['name'])[1]);

		$imageLoader = ImageLoader::getNew();

		$imageLoader->setImagePath($imagePath);
		$imageLoader->setImageName($imageName);
		$imageLoader->setImageExtension($imageExtension);

		$imageLoader->printImage();

	}