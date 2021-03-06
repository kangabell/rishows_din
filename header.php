<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RI_Shows_DIN
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>
		<?php
		bloginfo('name');
		echo ' &#124;&#124; ';
		if ( is_home() ) {
			bloginfo('description');
		} else {
			wp_title( '' );
		}
		?>
	</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rishows-din' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			$rishows_din_description = get_bloginfo( 'description', 'display' );
			if ( $rishows_din_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $rishows_din_description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif;

			the_custom_logo();
			if ( is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">RI <span>Shows</span></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">RI <span>Shows</span></a></p>
				<?php
			endif;
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'rishows-din' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
