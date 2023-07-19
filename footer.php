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
		<nav class="footer-navigation">

			<div class="site-branding">
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri() . '/img/logo-mark_web.svg'; ?>" alt="<?php bloginfo(); ?>" />
				</a>
				<div class="text">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo-handmade-transparent_web.png' ); ?>" alt="<?php echo bloginfo('name'); ?>" >
					</a></p>
					<?php
					$rishows_din_description = get_bloginfo( 'description', 'display' );
					if ( $rishows_din_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $rishows_din_description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif;
					?>
				</div>
			</div><!-- .site-branding -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'footer-menu',
				'depth'			 => 1
			) );
			?>
		</nav><!-- #site-navigation -->
	</footer><!-- #colophon -->

	<?php
	if ( is_page() ) :
	?>
		<div id="particles"></div>
	<?php
	endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
