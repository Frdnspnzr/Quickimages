<?php

class MD5Traverser {

	public function obfuscate($filename) {
		return md5($filename);
	}

	public function unobfuscate($filename) {

		$fileList = scandir(Config::get()->read("imagePath"));

		for ($i = 0; $i < sizeof($fileList); $i++) {

			if (md5($fileList[$i]) == $filename) {
				return $fileList[$i];
			}

		}

	}

}