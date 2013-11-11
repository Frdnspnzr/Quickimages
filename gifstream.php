<?php

//Yes, we're actually using JSON!
header('content-type: application/json');

//Load configuration
require_once('./lib/Config.php');

//Load abstract library
require_once('./lib/ImageIterator.php');
require_once('./lib/NameObfuscator.php');
require_once('./lib/ImageLoader.php');

$config = CONFIG::get();
$obfuscator = NameObfuscator::getNew();
$iterator = ImageIterator::getNew();

if (!$config->read("allowGifStream"))
	die();

//Return values for GifStream
$return = array();
$images = array();

//Fixed values
$return["version"] = 1;

//Needed values
$return["title"] = $config->read("siteName");
$return["base"] = $config->read("siteURL") . $config->read("imagePath");

//Possible values
if (!is_null($config->read("gifStreamIdentifier")))
	$return["identifier"] = $config->read("gifStreamIdentifier");
else
	$return["identifier"] = $config->read("siteName");

if (!is_null($config->read("gifStreamLicense")))
	$return["license"] = $config->read("gifStreamLicense");

while ($iterator->hasNext()) {

	$nImage = array();

	$nImage["src"] = $iterator->getCurrent()['filename'];

	//LOLWUT, we're checking for extension here ^_^
	//Last time I looked GifStream doesn't break when you serve a PNG or something, but if this
	//stupid thing breaks it in the future: Go nag Philipp about it!
	if (strtolower($iterator->getCurrent()["extension"]) == "gif")
		array_push($images, $nImage);

	$iterator->next();

}

$return["files"] = $images;

echo json_encode($return);