<?php
class WordpressServiceProvider {

	private $TdHelper;

	public function __construct() {
		$this->TdHelper = new TdHelper();
	}

	/**
	 * Register any application services.
	 * @return void
	 */

	public function register() {

		$options = $this->TdHelper->config('theme');

		foreach ($options as $method => $option) {
			if (method_exists($this, $method)) {
				$this->$method($option);
				continue;
			}
			if (method_exists(ThemeOptions::class, $method)) {
				\call_user_func(ThemeOptions::class . "::${method}", $option);
			}
		}
		/** Add FrontEnd Widget **/
		$this->TdHelper
			->addWidget(
				'ExampleFrontEndWidget'
			);

		/** Add Admin Bar Nodes **/
		$this->TdHelper
			->addAdminBarNode(
				false,
				'lumen_bar_node2',
				'Lumen Bar Node',
				'#'
			)->addAdminBarNode(
			'lumen_bar_node2',
			'lumen_bar_node2_child1',
			'Node Child 1',
			'#'
		)->addAdminBarNode(
			'lumen_bar_node2',
			'lumen_bar_node2_child2',
			'Node Child 2',
			'#'
		)->addAdminBarNode(
			'lumen_bar_node2',
			'lumen_bar_node2_child3',
			'Node Child 2',
			'#'
		);

		/** Add Shortcodes **/
		$this->TdHelper
			->addShortcode(
				'auth_register',
				function ($parameters, $content) {
					$shortcode = new \App\Http\Controllers\RegisterShortcodeController();
					return $shortcode->template($parameters, $content);
				}
			)
			->addShortcode(
				'auth_login',
				function ($parameters, $content) {
					$shortcode = new \App\Http\Controllers\LoginShortcodeController();
					return $shortcode->template($parameters, $content);
				}
			);

		/** Add MetaBoxes **/
		$this->TdHelper
			->addMetaBox(
				'example_meta_box',
				'Example Meta Box',
				function ($post, $metabox_attributes) {
					$metaboxClass = new \App\Http\Controllers\MetaBoxController();
					return $metaboxClass->template($post, $metabox_attributes);
				},
				'post',
				'normal',
				'default',
				2
			)
			->addAction(
				'save_post',
				function ($post_id, $post, $update) {
					if ($post->post_type == 'post') {
						$metaboxsave = new \App\Http\Controllers\MetaBoxController();
						return $metaboxsave->save($post_id, $post, $update);
					}
				},
				10,
				3
			);

		/** Add Nav Menu MetaBoxes **/
		$this->TdHelper->addMetaBox(
			'example_menu_meta_box',
			'Truediv Routes',
			function ($object, $arguments) {
				$TruedivRoutes = new \App\Http\Controllers\MetaBoxController();
				return $TruedivRoutes->menuMetaBox($object, $arguments);
			},
			'nav-menus',
			'side',
			'default',
			2
		);

		/** Add Dashboard Widget **/
		$this->TdHelper
			->addDashboardWidget(
				'example_admin_widget',
				'Example Admin Widget',
				function () {
					$addDashboardWidget = new \App\Widgets\ExampleAdminWidget();
					return $addDashboardWidget->template();
				}
			);

		/** Add CSS & Scripts **/
		$this->TdHelper
			->enqueueStyle(
				'lumen',
				$this->TdHelper->asset('resources/assets/build/example.css'),
				array(),
				'1.0.0',
				'all'
			)
			->enqueueScript(
				'lumen',
				$this->TdHelper->asset('resources/assets/build/example.js'),
				array('jquery'),
				'1.0.0',
				true
			);

	}

}
$wp_providers = new WordpressServiceProvider();
$wp_providers->register();
