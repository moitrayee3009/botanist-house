<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full f-header">
			<div >
				botanist house
			</div>
			<div class="f-details">
				
					<span><a href="" target="_blank">INSTAGRAM</a></span>
					<span><a href="" target="_blank">TUMBLR</a></span>
					<span><a href="" target="_blank">TWITTER</a></span>
			 	
				<p >	<a href="mailto:inquire@botanisthouse.se"
					target="_blank" class="email">INQUIRE@BOTANISTHOUSE.SE</a>
				</p>
				<p>HORNSGATAN 158B,  117 28, STOCKHOLM</p>
			</div>

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

		</pHORNSGATAN&nbsp;158B,&nbsp;117&nbsp;28,&nbsp;STOCKHOLM><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
