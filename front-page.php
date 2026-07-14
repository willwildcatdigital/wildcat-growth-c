<?php
/**
 * Front page — renders the Wildcat Growth landing page by default.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/landing-content' );
get_footer();
