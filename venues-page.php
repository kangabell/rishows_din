<?php
/**
 * Template Name: Venues
 *
 * Displays all venues
 *
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="tribe-venues site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			$loop = new WP_Query( array(
				'post_type' => 'tribe_venue',
				'orderby' => 'post_name',
				'order' => 'ASC'
			) );
			while ($loop->have_posts()) :
				$loop->the_post();
			?>
				<h2><?php the_title(); ?></h2>
				<?php
				if ( !empty( tribe_get_address() ) ) :
				?>
					<?php echo tribe_get_address() . ', '; ?>
				<?php
				endif;
				if ( !empty( tribe_get_city() ) ) :
				?>
					<?php echo tribe_get_city(); ?><br>
				<?php
				endif;
				if ( !empty( tribe_get_city() ) ) :
				?>
					<?php echo tribe_get_venue_website_link(); ?><br>
				<?php
				endif;
				?>
			<?php
			endwhile; wp_reset_postdata();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
