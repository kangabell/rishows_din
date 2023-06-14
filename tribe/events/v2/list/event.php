<?php
/**
 * View: List Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

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
