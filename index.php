<?php

//Load configuration
require_once('./lib/Config.php');

//Load abstract library
require_once('./lib/ImageIterator.php');
require_once('./lib/NameObfuscator.php');
require_once('./lib/ImageLoader.php');

$config = CONFIG::get();
$obfuscator = NameObfuscator::getNew();
$iterator = ImageIterator::getNew();

?>

<!DOCTYPE HTML>
<html lang="de">
<head>
	<title><?php $config->read('siteName') ?></title>
	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<script src="./jquery.js" type="text/javascript"></script>
	<script src="./scripts.js" type="text/javascript"></script>
	<meta charset="utf-8" />
</head>
<body onLoad="startup();">
	<header>
		<div id="head_container">
			<h1>
				<?php echo '<a href="' . $config->read('siteURL') . '">' . $config->read('siteName') . '</a>'; ?>
				<?php if (!isset($_GET['show'])) echo '<input name="search" />'; ?>
			</h1>
		</div>
	</header>
	<div id="container">

		<?php

		if (isset($_GET['show'])) {
			echo '<div id="singleContainer"><img src="./images/' . $obfuscator->unobfuscate($_GET['show']) . '" class="single" /></div>';
		} else {
			while ($iterator->hasNext()) {
				echo '<div class="container ';
				$tmp = $iterator->getCurrent();
				for ($i = 0; $i < sizeof($tmp['keywords']); $i++)
					echo $tmp['keywords'][$i] . ' ';
				echo '">';
				echo '<div class="image"><a href="' . $tmp['link'] . '">';

				//TODO Image Loader
				if (is_numeric(array_search($tmp['extension'], $config->read(("useImageLoader")))))
					echo '<img src="./imageloader.php?name=' . $tmp['filename'] .'&path=' . $tmp['directory'] . '" />';
				else
					echo '<img src="' . $tmp['path'] . '" />';

				echo '</a></div>';

				echo '<input name="image_path_' . $i . '" type="text" value="' .  $config->read('siteURL') . $tmp['link'] . '"
				onClick="javascript:this.select();" />';

				echo "</div>";

				$iterator->next();
			}

				// if (is_numeric(array_search($fileExtension, $config['allowedExtensions'])))
				// 	array_push($images,array("name" => $fileName, "extension" => $fileExtension, "keywords" => $keywords));
		}
		?>

	</div>

	<!-- Please be kind and leave this footer alone <3 -->
	<footer>

		Quickimages, by <a href="http://frdnspnzr.de/">Pascal Simon</a>

	</footer>

</body>