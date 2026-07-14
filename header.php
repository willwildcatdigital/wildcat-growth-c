<?php
/**
 * Theme header.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wl-wrap">

	<!-- NAV -->
	<nav class="wl-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wl-logo">
			<span class="wl-logo-mark"><span class="wl-logo-tri"></span></span>
			<span class="wl-wordmark">Wildcat <span>Growth</span></span>
		</a>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'wl-nav-links',
				'depth'          => 1,
			) );
		} else {
			wildcat_growth_default_nav_fallback();
		}
		?>
		<a href="<?php echo esc_url( wildcat_growth_anchor( 'contact' ) ); ?>" class="wl-btn-pill-dark">Get your free audit</a>
	</nav>
