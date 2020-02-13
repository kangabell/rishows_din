<main class="site-main tribe-events-single">

	<?php while ( have_posts() ) :  the_post(); ?>

		<header class="page-header">
			<?php echo tribe_get_start_date(); ?>

			<?php the_title('<h1>', '</h1>') ?>

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