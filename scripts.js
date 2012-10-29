function startup() {
	$('[name="search"]').change(function() {

		searchString = $('[name="search"]').val();

		if (searchString == "") {
			$(".container").show();
		} else {
			$(".container").hide()
			classes = searchString.split(' ');
			for (i = 0; i < classes.length; i++) {
				curr = classes[i];
				$('[class*="'+curr+'"]').show();
			}
		}
	})
}