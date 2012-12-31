<?php
/*
 * Template Name: Book Archive Page
 */

get_header();
?>

<div id="<?php echo((get_option('template') === 'twentyeleven') ? 'primary' : 'container'); ?>">
	<div id="content" role="main">

		<?php if(function_exists('woo_loop_before')) { woo_loop_before(); } ?>

		<?php if(have_posts()) { ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if(is_post_type_archive('mbt_books')) {
							echo('Books');
						} else if(is_tax('mbt_genres')) {
							echo('Genre: '.get_queried_object()->name);
						} else if(is_tax('mbt_series')) {
							echo('Series: '.get_queried_object()->name);
						}
					?>
				</h1>
				<?php
					if(isset(get_queried_object()->description) and !empty(get_queried_object()->description)) {
						echo('<div class="mbt-archive-description">'.get_queried_object()->description.'</div>');
					}
				?>
			</header>

			<?php while(have_posts()){ the_post(); ?>

				<?php include(mbt_locate_template("content-books.php")); ?>

			<?php } ?>

		<?php } else { ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e('Nothing Found', 'twentyeleven'); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven'); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php } ?>

		<?php if(function_exists('woo_loop_after')) { woo_loop_after(); } ?>

	</div><!-- end #content -->

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>