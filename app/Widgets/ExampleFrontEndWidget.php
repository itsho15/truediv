<?php

class ExampleFrontEndWidget extends \WP_Widget {

	function __construct() {

		parent::__construct(
			'wp_lumen_widget',
			'Lumen Widget',
			array(
				'classname'   => 'wp_lumen_list_child_pages',
				'description' => 'List Child Pages for the current page',
			)
		);
	}

	public function form($instance) {
		echo '<p>Controls</p>'; //Expects at least one paragraph.
	}

	public function widget($args, $instance) {
		return td_view('widgets.testWidget', compact('args', 'instance'));
	}

	public function update($new_instance, $old_instance) {

		return $new_instance;
	}
}