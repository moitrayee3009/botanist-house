<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>
<div id="app"></div>
<article id="page-content" <?php post_class(); ?> style="display: none;">
	<?php
/**
 * Functions hooked in to storefront_page add_action
 *
 * @hooked storefront_page_header          - 10
 * @hooked storefront_page_content         - 20
 */
do_action('storefront_page');
?>
</article><!-- #post-## -->
