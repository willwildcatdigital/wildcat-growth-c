<?php
/**
 * Template Name: Wildcat Lite Landing
 *
 * Assignable page template that renders the same landing page as
 * front-page.php — use this if the landing page should live on a page
 * other than the site homepage (e.g. /wildcat-lite/).
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/landing-content' );
get_footer();
