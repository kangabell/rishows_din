<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = Tribe__Events__Main::postIdHelper( get_the_ID() );

?>

<main class="site-main tribe-events-single">

	<?php while ( have_posts() ) :  the_post(); ?>

		<header class="page-header">
			<?php echo tribe_get_start_date(); ?>

			<?php the_title('<h1>', '</h1>') ?>

			<?php if ( tribe_get_cost() ) : ?>
				<span class="event-meta event-cost">
					<?php echo tribe_get_cost( $event_id, true ); ?>
				</span>
			<?php endif; ?>

			<?php if ( tribe_get_event_meta() ) : ?>
				<span class="event-meta event-age">
					<?php echo tribe_get_event_meta( $event_id, '_ecp_custom_2' ); ?>
				</span>
			<?php endif; ?>
		</header>

		<?php the_content(); ?>
		<?php the_post_thumbnail(); ?>
		<p>
			<?php
			echo '<strong>' . tribe_get_venue() . '</strong><br>';
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
			?>
		</p>
		<?php
		if ( !empty( tribe_get_event_website_link() ) ) :
		?>
			<p>
				External Link:<br>
				<?php echo tribe_get_event_website_link(); ?>
			</p>
		<?php
		endif;
		?>
		<hr>
		<p>
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&#8592; All Shows', $events_label_plural ); ?></a>
		</p>

	<?php endwhile; ?>

</main>