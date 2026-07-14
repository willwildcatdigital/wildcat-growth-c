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
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'wildcat-growth-landing',
		get_template_directory_uri() . '/assets/css/landing.css',
		array( 'wildcat-growth-style' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'wildcat-growth-landing',
		get_template_directory_uri() . '/assets/js/landing.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'wildcat_growth_assets' );

/**
 * Register the standalone landing page template so it can be assigned to any Page.
 */
function wildcat_growth_page_templates( $templates ) {
	$templates['page-templates/template-wildcat-lite-landing.php'] = __( 'Wildcat Lite Landing', 'wildcat-growth-c' );
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
	$body    = "New audit request via the Wildcat Lite landing page:\n\n"
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
