<?php
/**
 * 
 * Template Name: Custom Post
 * Template Post Type: post
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area content-area-bg-color">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			//do_action( 'storefront_single_post_after' );
		
		endwhile; // End of the loop.
		?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//do_action( 'storefront_sidebar' );
get_footer();
