<?php
namespace App\Http\Controllers;

class LoginShortcodeController {
	protected $helper, $request, $auth, $user, $validator;

	/**
	 * Create a new controller instance.
	 * @var $helper LumenHelper
	 * @var $user WpUser
	 * $user
	 */
	public function __construct(LumenHelper $helper) {
		$this->helper  = $helper;
		$this->request = $this->helper->request();
	}

	public function template() {
		return $this->helper->view('auth.login', array('user' => $this->request->user()));
	}
}
