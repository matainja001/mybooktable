<div class="mbt-book-overview">
	<h3 class="mbt-book-overview-title"><?php _e('About the Book', 'mybooktable'); ?></h3>
	<div class="mbt-book-overview-content">
		<?php
			if(function_exists('st_remove_st_add_link')) { st_remove_st_add_link(''); }
			global $post; echo(apply_filters("the_content", $post->post_content));
		?>
	</div>
</div>