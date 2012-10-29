<?php

class pngLoader extends ImageLoader {


	protected function getContentType($extension) {

		if ($extension == 'jpeg')
			$ext = 'jpg';
		else
			$ext = $extension;

		return "image/" . $ext;

	}

	protected function printImg($path, $name, $extension) {

		$imagePath = $path . $name . '.' . $extension;

		if ($extension == "png")
			$image = imagecreatefrompng($imagePath);
		else if ($extension == "gif")
			$image = imagecreatefromgif($imagePath);
		else if ($extension == "jpg" || $extension == "jpeg")
			$image = imagecreatefromjpeg($imagePath);

		imagepng($image);

		imagedestroy($image);

	}

	protected function isExtensionSupported($extension) {
		if ($extension == 'png' || $extension == 'jpg' || $extension == 'gif' || $extension == 'jpeg')
			return true;
		else
			return false;
	}

}