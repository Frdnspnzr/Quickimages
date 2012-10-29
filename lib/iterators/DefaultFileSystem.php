<?php

Class DefaultFileSystem extends ImageIterator {

	/*
	 * IMAGE FORMAT
	 *
	 * ["name"] Image filename
	 * ["extension"] Image file extension
	 * ["directory"] Directory of image
	 * ["filename"] The images filename (most likely a combination of name and extension)
	 * ["path"] Complete image path (most likely a combination of filename and "path")
	 * ["keywords"] List of keywords for searching
	 *
	 */

	protected function getAllImages() {

		$allImages = array();

		$fileList = scandir(Config::get()->read("imagePath"));

		for ($i = 0; $i < sizeof($fileList); $i++) {

			$image = array();

			$fileName = explode('.', $fileList[$i]);
			$image['name'] = $fileName[0];
			$image['extension'] = strtolower($fileName[1]);
			$image['directory'] = Config::get()->read("imagePath");
			$image['path'] = $image['directory'] . $image['name'] . '.' . $image['extension'];
			$image['keywords'] = explode('_',$image['name']);
			$image['filename'] = $fileList[$i];

			if ($image['name'] != '')
				array_push($allImages, $image);

		}

		return $allImages;
	}
}

?>