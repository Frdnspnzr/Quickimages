<?php

$config = array(

	/*
	 * Where is your site located? I will need this information, so please don't lie.
	 */
	"siteURL" => "http://images.frdnspnzr.de/",

	/*
	 * What's your site called? Basically, that will be the headline.
	 */
	"siteName" => "Friedensbilder",

	/*
	 * Where are your images? Please name it relative to this file (or absolute)
	 * and include a trailing /.
	 */
	"imagePath" => "./images/",

	/*
	 * What file extensions would you like to allow?
	 * Supported extensions are jpg, jpeg, gif and png.
	 */
	"allowedExtensions" => array(
		"gif",
		"jpg",
		"jpeg",
		"png",
		),

	/*
	 * What file extension should use the image loader?
	 * See "imageLoader" for documentation on what exactly this will do.
	 * I recommend leaving "gif" here and using a loader that gets rid of the animation.
	 * Many animated GIFs will decrease site performance drastically. Also, they produce
	 * much more traffic.
	 */
	"useImageLoader" => array(
		"gif",
		),

	/*
	 * What obfuscator should I use?
	 * Obfuscators are a way of not giving away the filename in the link. Would you
	 * click a link with "indiana_jones_it_belongs_in_a_museum.jpg" in it? I don't think so,
	 * because you allready know, what it will show. A link like "89794388901781a35b8810e422d8096d"
	 * is about 20% cooler, isn't it?
	 *
	 * Possibilities are:
	 * - "NoObfuscation": Images will be linked with their filename. It will look like "spongebob_patrick_eating.gif"
	 * - "ROT13": Still the filename, but ROT13 encrypted. It will look like "fcbatrobo_cngevpx_rngvat.tvs"
	 * - "MD5Traverser": Uses MD5 to hash the filename. Slow, but awesome. It will look like "c4e2fe4b39bd2ae5668e90755f5bfd11"
	 *
	 * You can use your own Obfuscator if you want to, see developer documentation for this.
	 */
	"nameObfuscator" => "MD5Traverser",

	/*
	 * What image iterator should I use?
	 * If you don't know what this is just leave "DefaultFileSystem" and it
	 * will work pretty much as you'd expect. If you want to dive in a little
	 * deeper see developer documentation for this.
	 */
	"imageIterator" => "DefaultFileSystem",

	/*
	 * What image loader should I use?
	 * Image loaders can convert or manipulate images before showing them in the overview.
	 * They are, however, not intended to do anything with the images in single image view!
	 * Also, the loader is only applied to images with the extensions defined in property
	 * "useImageLoader".
	 *
	 * Possibilities are:
	 * - pngLoader: Will convert images to png. I strongly suggest this one (see "useImageLoader")!
	 *
	 * As allways, you can use your own image loader and guess what? See developer documentation for this!
	 */
	"imageLoader" => "pngLoader",

	)

?>