<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RI_Shows_DIN
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			// Last updated show
			$loop = new WP_Query( array(
			  'posts_per_page'=>1,
			  'post_type'=>'tribe_events'
			) );
			while ($loop->have_posts()) :
			  $loop->the_post();
			  $last_update = get_the_modified_date();
			endwhile; wp_reset_postdata();
			echo '<h4>Last updated</h4>' . $last_update;
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
