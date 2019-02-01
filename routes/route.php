<?php
class Route {
	/**
	 * @var array $_listUri List of URI's to match against
	 */
	private $_listUri = array();
	/**
	 * @var array $_listCall List of closures to call
	 */
	private $_listCall = array();
	/**
	 * @var string $_trim Used class-wide items to clean strings
	 */
	private $_trim = '/\^$';
	/**
	 * add - Adds a URI and Function to the two lists
	 *
	 * @param string $uri A path such as about/system
	 * @param object $function An anonymous function
	 */
	public function add($uri, $function) {
		$uri               = trim($uri, $this->_trim);
		$this->_listUri[]  = $uri;
		$this->_listCall[] = $function;
	}

	public function listen() {
		add_action('parse_request', [$this, 'Td_custom_url_handler']);
	}

	/**
	 * Td_custom_url_handler
	 * @desc Looks for a match for the URI and runs the related function
	 */
	public function Td_custom_url_handler($url) {
		global $wp;
		$uri               = isset($wp->request) ? $wp->request : '/';
		$uri               = trim($uri, $this->_trim);
		$replacementValues = array();
		/**
		 * List through the stored URI's
		 */

		foreach ($this->_listUri as $listKey => $listUri) {
			//var_dump($listUri);
			/**
			 * See if there is a match
			 */

			if (preg_match("#^$listUri$#", $uri)) {
				/**
				 * Replace the values
				 */
				$realUri = explode('/', $uri);
				$fakeUri = explode('/', $listUri);
				/**
				 * Gather the .+ values with the real values in the URI
				 */

				foreach ($fakeUri as $key => $value) {
					if ($value == '.+') {
						$replacementValues[] = $realUri[$key];
					}
				}

				/**
				 * Pass an array for arguments
				 */
				get_header();
				call_user_func_array($this->_listCall[$listKey], $replacementValues);
				get_footer();
				exit();

			}
		} // End of Loop

	}

}