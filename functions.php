<?php
/**
 * Wildcat Growth theme functions.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

/**
 * Theme setup.
 */
function wildcat_growth_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'wildcat_growth_setup' );

/**
 * Enqueue styles and scripts.
 */
function wildcat_growth_assets() {
	wp_enqueue_style(
		'wildcat-growth-fonts',
		'https://fonts.googleapis.com/css2?family=Archivo:wght@500;700;800;900&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'wildcat-growth-style',
		get_stylesheet_uri(),
		array(),
		wildcat_growth_asset_version( '/style.css' )
	);

	wp_enqueue_style(
		'wildcat-growth-landing',
		get_template_directory_uri() . '/assets/css/landing.css',
		array( 'wildcat-growth-style' ),
		wildcat_growth_asset_version( '/assets/css/landing.css' )
	);

	wp_enqueue_script(
		'wildcat-growth-landing',
		get_template_directory_uri() . '/assets/js/landing.js',
		array(),
		wildcat_growth_asset_version( '/assets/js/landing.js' ),
		true
	);
}

/**
 * Version an asset by its file modification time so browsers fetch a fresh
 * copy every time the CSS/JS actually changes, instead of caching across
 * deploys (the theme's style.css "Version:" header only changes when we
 * remember to bump it by hand).
 *
 * @param string $relative_path Path relative to the theme root, e.g. '/assets/css/landing.css'.
 * @return string
 */
function wildcat_growth_asset_version( $relative_path ) {
	$file = get_template_directory() . $relative_path;
	if ( file_exists( $file ) ) {
		return (string) filemtime( $file );
	}
	return wp_get_theme()->get( 'Version' );
}
add_action( 'wp_enqueue_scripts', 'wildcat_growth_assets' );

/**
 * Load the ACF field group definitions (no-ops safely if ACF isn't active).
 */
require_once get_template_directory() . '/inc/acf-fields.php';

/**
 * Warn in wp-admin if the free ACF plugin isn't installed/active, since the
 * landing page content fields depend on it.
 */
function wildcat_growth_acf_admin_notice() {
	if ( function_exists( 'get_field' ) ) {
		return;
	}
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>Wildcat Growth theme:</strong> install and activate the free <a href="' . esc_url( admin_url( 'plugin-install.php?s=advanced-custom-fields&tab=search&type=term' ) ) . '">Advanced Custom Fields</a> plugin to edit the landing page content. Until then, the page is showing built-in default copy.</p></div>';
}
add_action( 'admin_notices', 'wildcat_growth_acf_admin_notice' );

/**
 * Get a landing-page field value via ACF, falling back to a literal default
 * if ACF isn't active yet (keeps the page from breaking before the plugin
 * is installed).
 *
 * @param string $selector Field name.
 * @param int    $post_id  Post ID the field is attached to.
 * @param mixed  $default  Fallback value.
 * @return mixed
 */
function wl_field( $selector, $post_id, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $selector, $post_id );
		if ( '' !== $value && null !== $value ) {
			return $value;
		}
	}
	return $default;
}

/**
 * Resolve the post ID whose ACF fields should back the landing page —
 * the site's configured static front page when rendered via front-page.php,
 * or the current page ID when rendered via the assignable page template.
 *
 * @return int
 */
function wildcat_growth_landing_post_id() {
	if ( is_front_page() && ! is_home() ) {
		$front_id = (int) get_option( 'page_on_front' );
		if ( $front_id ) {
			return $front_id;
		}
	}
	return get_queried_object_id();
}

/**
 * Split a "one item per line" textarea field into a clean array.
 *
 * @param string $text Raw textarea value.
 * @return array
 */
function wildcat_growth_lines_to_array( $text ) {
	$lines = preg_split( '/\r\n|\r|\n/', (string) $text );
	$lines = array_map( 'trim', $lines );
	return array_values( array_filter( $lines, 'strlen' ) );
}

/**
 * One-time cleanup: if ACF already saved field VALUES to the database
 * containing the old "Wildcat Lite" copy (e.g. because the page was opened
 * and saved in wp-admin before this rename), those saved values now take
 * priority over the new code defaults and keep showing the old text. This
 * sweeps known text fields on the landing page(s) and swaps the wording,
 * then marks itself done so it only ever runs once.
 */
function wildcat_growth_migrate_lite_to_growth_copy() {
	if ( get_option( 'wildcat_growth_rebrand_migrated_v1' ) ) {
		return;
	}
	if ( ! function_exists( 'get_field' ) ) {
		return; // Wait until ACF is active so we don't mark this done prematurely.
	}

	$post_ids = array();
	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id ) {
		$post_ids[] = $front_id;
	}
	$templated = get_posts( array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'meta_key'       => '_wp_page_template', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
		'meta_value'     => 'page-templates/template-wildcat-lite-landing.php', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
	) );
	$post_ids  = array_unique( array_merge( $post_ids, $templated ) );

	$text_fields = array(
		'hero_paragraph',
		'why_eyebrow',
		'why_paragraph',
		'faq_1_question',
		'faq_1_answer',
		'faq_5_question',
		'faq_5_answer',
	);

	foreach ( $post_ids as $post_id ) {
		foreach ( $text_fields as $field_name ) {
			$value = get_post_meta( $post_id, $field_name, true );
			if ( is_string( $value ) && false !== strpos( $value, 'Wildcat Lite' ) ) {
				update_post_meta( $post_id, $field_name, str_replace( 'Wildcat Lite', 'Wildcat Growth', $value ) );
			}
		}
	}

	update_option( 'wildcat_growth_rebrand_migrated_v1', 1 );
}
add_action( 'init', 'wildcat_growth_migrate_lite_to_growth_copy', 20 );

/**
 * Register the standalone landing page template so it can be assigned to any Page.
 */
function wildcat_growth_page_templates( $templates ) {
	$templates['page-templates/template-wildcat-lite-landing.php'] = __( 'Wildcat Growth Landing', 'wildcat-growth-c' );
	return $templates;
}
add_filter( 'theme_page_templates', 'wildcat_growth_page_templates' );

/**
 * Handle the "Request my free audit" contact form submission.
 *
 * Sends a plain email to the site admin. Swap this out for Gravity Forms /
 * WPForms / Contact Form 7 if you'd rather manage submissions through a
 * dedicated plugin later — the form markup lives in
 * template-parts/landing-content.php.
 */
function wildcat_growth_handle_audit_request() {
	if ( ! isset( $_POST['wildcat_audit_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wildcat_audit_nonce'] ) ), 'wildcat_audit_request' ) ) {
		wp_safe_redirect( add_query_arg( 'audit_request', 'error', wp_get_referer() ? wp_get_referer() : home_url( '/' ) ) );
		exit;
	}

	$first_name  = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last_name   = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$website_url = isset( $_POST['website_url'] ) ? esc_url_raw( wp_unslash( $_POST['website_url'] ) ) : '';
	$message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect = remove_query_arg( 'audit_request', $redirect );

	if ( empty( $email ) || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'audit_request', 'error', $redirect ) . '#contact' );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( 'New free audit request from %s %s', $first_name, $last_name );
	$body    = "New audit request via the Wildcat Growth landing page:\n\n"
		. "Name: {$first_name} {$last_name}\n"
		. "Email: {$email}\n"
		. "Website: {$website_url}\n\n"
		. "Message:\n{$message}\n";

	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
	if ( ! empty( $email ) ) {
		$headers[] = 'Reply-To: ' . $email;
	}

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'audit_request', $sent ? 'success' : 'error', $redirect ) . '#contact' );
	exit;
}
add_action( 'admin_post_wildcat_audit_request', 'wildcat_growth_handle_audit_request' );
add_action( 'admin_post_nopriv_wildcat_audit_request', 'wildcat_growth_handle_audit_request' );
