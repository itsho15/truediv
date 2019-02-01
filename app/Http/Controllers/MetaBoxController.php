<?php
namespace App\Http\Controllers;

class MetaBoxController {
	private $helper, $post, $request;

	public function template($post, $metabox_attributes) {
		$post = $post;
		return td_view('metaboxes.metabox_post', compact('post', 'metabox_attributes'));
	}

	public function save($post, $post_id, $update) {

		//update_post_meta($post_id, 'lumen_meta_test', $_POST['lumen_meta_test']);
		if (!add_post_meta($post_id->ID, 'lumen_meta_test', sanitize_text_field($_POST['lumen_meta_test']), true)) {
			update_post_meta($post_id->ID, 'lumen_meta_test', sanitize_text_field($_POST['lumen_meta_test']));
		}
	}

	public function menuMetaBox() {
		/*
			        $routes = app('router')->getRoutes();

			        foreach ($routes as $key => $value) {
			            if ($value['method'] == 'GET') {
			                $allroutes[] = $value['uri'];

			            }
			        }
		*/
		$key       = 1;
		$allroutes = ['url/1', 'url/2'];

		?>

		<div id="CustomPluginLinks" class="posttypediv">
        		<div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
        			<ul id ="wishlist-login-checklist" class="categorychecklist form-no-clear">
        				<?php foreach ($allroutes as $route) {?>
        				<li>
        					<label class="menu-item-title">
        						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-<?php echo $key ?>][menu-item-object-id]" value="-<?php echo $key ?>"><?php echo ltrim($route, '/'); ?>
        					</label>
        					<input type="hidden" class="menu-item-type" name="menu-item[-<?php echo $key ?>][menu-item-type]" value="custom">
        					<input type="hidden" class="menu-item-title" name="menu-item[-<?php echo $key ?>][menu-item-title]" value="<?php echo ltrim($route, '/'); ?>">
        					<input type="hidden" class="menu-item-url" name="menu-item[-<?php echo $key ?>][menu-item-url]" value="<?php bloginfo("wpurl");?>/<?php echo ltrim($route, '/'); ?>">
        					<input type="hidden" class="menu-item-classes" name="menu-item[-<?php echo $key ?>][menu-item-classes]" value="<?php echo ltrim($route, '/'); ?>-pop">
        				</li>
        				<?php $key++;?>

        				<?php }?>
        			</ul>
        		</div>

        		<p class="button-controls">
        			<span class="list-controls">
        				<a href="<?php bloginfo("wpurl");?>/wp-admin/nav-menus.php?page-tab=all&amp;selectall=1#CustomPluginLinks" class="select-all">Select All</a>
        			</span>
        			<span class="add-to-menu">
        				<input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-post-type-menu-item" id="submit-CustomPluginLinks">
        				<span class="spinner"></span>
        			</span>
        		</p>
        </div>

       <?php
}
}
