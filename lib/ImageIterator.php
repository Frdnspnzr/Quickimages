<?php

abstract class ImageIterator {

	/*
	 * IMAGE FORMAT
	 *
	 * ["name"] Image filename
	 * ["extension"] Image file extension
	 * ["link"] Direct link to image
	 * ["directory"] Directory of image
	 * ["filename"] The images filename (most likely a combination of name and extension)
	 * ["path"] Complete image path (most likely a combination of filename and "path")
	 * ["keywords"] List of keywords for searching
	 *
	 */

	private $images = null;
	private $cursor = 0;
	private $nameObfuscator = null;

	public static function getNew() {

		//Get name of concrete Iterator
		$concreteClass = Config::get()->read("imageIterator");

		//Include file containing the iterator
		require_once("./lib/iterators/" . $concreteClass . ".php");

		//Create the instance
		return new $concreteClass();

	}

	protected abstract function getAllImages();

	public function __construct() {
		$this->images = $this->getAllImages();
		$this->nameObfuscator = NameObfuscator::getNew();

		for ($i = 0; $i < sizeof($this->images); $i++)
			$this->images[$i]['link'] = $this->nameObfuscator->obfuscate($this->images[$i]["filename"]);

	}

	public function getCurrent() {
		return $this->images[$this->cursor];
	}

	public function next() {
		$this->cursor++;
	}

	public function hasNext() {
		if ($this->cursor < sizeof($this->images))
			return true;
		return false;
	}

}