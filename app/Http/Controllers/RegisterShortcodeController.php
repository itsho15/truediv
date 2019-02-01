<?php
namespace App\Http\Controllers;

class RegisterShortcodeController {

	public function template() {
		return td_view('auth.register', array('user' => 'user'));
	}
	static function test($name, $test) {
		echo "Name $name<br>";
		echo "Name $test";
		//echo "yes";
	}
}
