<main class="site-main tribe-events-single">

	<?php while ( have_posts() ) :  the_post(); ?>

		<?php echo tribe_get_start_date(); ?>
		<?php the_title('<h1>', '</h1>') ?>
		<?php the_content(); ?>
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
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; All Shows', $events_label_plural ); ?></a>
		</p>

	<?php endwhile; ?>

</main>