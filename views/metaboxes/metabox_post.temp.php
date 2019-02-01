<?php
if (isset($post)): ?>
    <h1> MetaBox Test</h1>
    <p>Post Date: <?php echo $post->post_date ?></p>
<?php endif;?>
<p><textarea name="lumen_meta_test" class="regular-text"><?php echo get_post_meta(get_the_ID(), 'lumen_meta_test', true) ?></textarea></p>
