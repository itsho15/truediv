<?php
require_once 'route.php';

$route = new Route();
// example class function
$route->add('name/.+/.+', array('\App\Http\Controllers\RegisterShortcodeController', 'test')); // class RegisterShortcodeController and method = test
// example anony function
$route->add('/name/.+', function ($name) {
	echo "Name $name";
});
$route->add('/name', function () {
	echo "Name page";
});
// example anony function
$route->add('/this/is/the/.+/story/of/.+', function ($first, $second) {
	echo "This is the $first story of $second";
});

$route->listen();