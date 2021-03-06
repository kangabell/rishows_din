<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * @version 4.6.19
 * (heavily modified)
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>

<span class="event-meta event-date">
	<?php echo tribe_get_start_date( $event, false ); ?>	
</span>

<h3 class="event-meta event-title">
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h3>

<span class="event-meta event-venue">
	<?php echo tribe_get_venue(); ?>
</span>

<?php if ( tribe_get_start_time() ) : ?>
	<span class="event-meta event-time">
		<?php
		$time = tribe_get_start_time();
		echo preg_replace( "/(:)0{2} /", "", $time ); // remove ":00 "
		?>
	</span>
<?php endif; ?>

<?php if ( tribe_get_cost() ) : ?>
	<span class="event-meta event-cost">
		<?php echo tribe_get_cost( $post_id, true ); ?>
	</span>
<?php endif; ?>

<?php if ( tribe_get_event_meta() ) : ?>
	<span class="event-meta event-age">
		<?php echo tribe_get_event_meta( $postId, '_ecp_custom_2' ); ?>
	</span>
<?php endif; ?>

<hr>
