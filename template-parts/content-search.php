<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RI_Shows_DIN
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( 'tribe_events' === get_post_type() ) :
		?>
			<span class="event-meta event-date">
				<?php echo tribe_get_start_date(); ?>
			</span>
		<?php
		endif;

		if ( function_exists('relevanssi_query') ) {
			relevanssi_the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) :
		?>
			<div class="entry-meta">
				<?php
				rishows_din_posted_on();
				rishows_din_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php
		elseif ( 'tribe_events' === get_post_type() ) :
		?>
			<span class="event-meta event-venue">
				<?php echo tribe_get_venue(); ?>
			</span>
		<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php rishows_din_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
