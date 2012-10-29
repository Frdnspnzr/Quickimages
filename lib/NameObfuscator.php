<?php

abstract Class NameObfuscator {

	public abstract function obfuscate($filename);
	public abstract function unobfuscate($filename);


	public static function getNew() {

		//Get name of concrete Iterator
		$concreteClass = Config::get()->read("nameObfuscator");

		//Include file containing the iterator
		require_once("./lib/obfuscators/" . $concreteClass . ".php");

		//Create the instance
		return new $concreteClass();

	}

}