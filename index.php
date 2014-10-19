<?php

/**
 * Returns asset file rewritten to include modification time (cache busting)
 * @param  string $file
 * @return string
 * @version 1.0
 */
function basey_asset_helper($file) {

	if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
		$actual_file = basename($file);
		$file_ext = pathinfo($actual_file, PATHINFO_EXTENSION);
		$file_no_ext = str_replace('.' . $file_ext, '.', $file);

		// Set default timezone
		date_default_timezone_set('UTC');

		return $file_no_ext . date('Ymdhis', filemtime($_SERVER['DOCUMENT_ROOT'] . $file)) . '.' . $file_ext;
	}
	// Cannot read file or path doesn't exist
	else {
		return $file;
	}
}

/**
 * Returns body class based on first sub-folder instance
 * @return string
 */
function basey_body_class() {

	$request = $_SERVER['REQUEST_URI'];
	$request_parts = explode('/', $request);

	if (empty($request_parts[1])) {
		return 'home';
	}
	return $request_parts[1];
}

?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Basey Static</title>
		<link rel="stylesheet" href="<?php echo basey_asset_helper('/assets/css/build/app.css'); ?>">
		<script src="<?php echo basey_asset_helper('/assets/js/build/vendor/modernizr.js'); ?>"></script>
		<!--[if lte IE 8]>
			<script src="<?php echo basey_asset_helper('/assets/js/build/ie.min.js'); ?>"></script>
		<![endif]-->
	</head>
	<body class="<?php echo basey_body_class(); ?>">

		<h2 class="uk-text-center">Let's do this!</h2>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo basey_asset_helper('/assets/js/build/vendor/jquery.min.js'); ?>"><\/script>')</script>
		<script src="<?php echo basey_asset_helper('/assets/js/build/dep.min.js'); ?>"></script>
		<script src="<?php echo basey_asset_helper('/assets/js/build/app.min.js'); ?>"></script>
	</body>
</html>