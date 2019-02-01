<?php
// load all classes in helper Folder
foreach (glob(TRUEDIV_TEMPLATE_PATH . 'app/Helpers/*.php') as $file) {
	require_once $file;

	// get the file name of the current file without the extension
	// which is essentially the class name
	$class = basename($file, '.php');

	if (class_exists($class)) {
		$obj = new $class;
	}
}

// load all classes in Providers Folder
foreach (glob(TRUEDIV_TEMPLATE_PATH . 'app/Providers/*.php') as $file) {
	require_once $file;

	// get the file name of the current file without the extension
	// which is essentially the class name
	$class = basename($file, '.php');

	if (class_exists($class)) {
		$obj = new $class;
	}
}

// load all classes in Widgets Folder
foreach (glob(TRUEDIV_TEMPLATE_PATH . 'app/Widgets/*.php') as $file) {

	require_once $file;

	// get the file name of the current file without the extension
	// which is essentially the class name
	$class = basename($file, '.php');

	if (class_exists($class)) {
		$obj = new $class;
	}
}

// load all classes in Controllers Folder
foreach (glob(TRUEDIV_TEMPLATE_PATH . 'app/Http/Controllers/*.php') as $file) {

	require_once $file;

	// get the file name of the current file without the extension
	// which is essentially the class name
	$class = basename($file, '.php');

	if (class_exists($class)) {
		$obj = new $class;
	}
}