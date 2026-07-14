<?php
/**
 * Wildcat Growth landing page content.
 *
 * Recreated from the design handoff (design_handoff_wildcat_lite_landing).
 * All copy/pricing/testimonials below come from ACF fields (see
 * inc/acf-fields.php) attached to whichever Page renders this — editors
 * change everything from the Page edit screen in wp-admin, no code
 * changes needed. The literal strings here are just fallback defaults
 * used if ACF isn't installed/active yet.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$landing_id = wildcat_growth_landing_post_id();

// --- Hero -----------------------------------------------------------
$hero_eyebrow      = wl_field( 'hero_eyebrow', $landing_id, 'SEO built for businesses under 10 people' );
$hero_heading      = wl_field( 'hero_heading', $landing_id, "Punch above your weight —\nwithout the agency price tag." );
$hero_paragraph    = wl_field( 'hero_paragraph', $landing_id, 'Wildcat Growth is straightforward SEO for small businesses: no lock-in contracts, no jargon-filled reports, no six-month minimums. A new SEO-optimised website plus ongoing SEO, from £99/month.' );
$hero_cta_primary  = wl_field( 'hero_cta_primary', $landing_id, 'Get your free audit' );
$hero_cta_secondary = wl_field( 'hero_cta_secondary', $landing_id, 'See plans & pricing' );

$hero_stats = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$hero_stats[] = array(
		'value' => wl_field( "hero_stat_{$i}_value", $landing_id, '' ),
		'label' => wl_field( "hero_stat_{$i}_label", $landing_id, '' ),
	);
}

$hero_image             = wl_field( 'hero_image', $landing_id, '' );
$hero_placeholder_label = wl_field( 'hero_placeholder_label', $landing_id, 'small business owner, workshop/storefront' );
$hero_badge_percentage  = wl_field( 'hero_badge_percentage', $landing_id, '+68%' );
$hero_badge_title       = wl_field( 'hero_badge_title', $landing_id, 'Organic traffic, 6 months' );
$hero_badge_subtitle    = wl_field( 'hero_badge_subtitle', $landing_id, 'Local trades client, Sheffield' );
$hero_corner_badge      = wl_field( 'hero_corner_badge', $landing_id, 'from Wildcat Digital' );

// --- Marquee ------------------------------------------------------------
$marquee_raw   = wl_field( 'marquee_items', $landing_id, "LOCAL TRADES\nRETAIL\nHOSPITALITY\nPROFESSIONAL SERVICES\nHEALTH & BEAUTY\nCONSTRUCTION\nECOMMERCE STARTUPS" );
$marquee_items = wildcat_growth_lines_to_array( $marquee_raw );
$marquee_items = array_merge( $marquee_items, $marquee_items ); // duplicate for a seamless scroll loop.

// --- Why Wildcat Growth -----------------------------------------------------
$why_eyebrow   = wl_field( 'why_eyebrow', $landing_id, 'Why Wildcat Growth exists' );
$why_heading   = wl_field( 'why_heading', $landing_id, "Most SEO agencies are built for £1m+ businesses. You're not one — yet." );
$why_paragraph = wl_field( 'why_paragraph', $landing_id, "Our sister agency, Wildcat Digital, works with growing and enterprise brands on £2k+/month retainers. Wildcat Growth is a separate, leaner service — same team's expertise, distilled into a fixed-scope package that actually makes sense for a five-person business, a solo tradesperson, or a shop with one location. Every package starts with a new SEO-optimised website built for you, then keeps working in the background. No strategy decks. No 12-month contracts." );

$why_cards = array();
for ( $i = 1; $i <= 4; $i++ ) {
	$why_cards[] = array(
		'num'   => wl_field( "why_card_{$i}_num", $landing_id, sprintf( '%02d', $i ) ),
		'title' => wl_field( "why_card_{$i}_title", $landing_id, '' ),
		'body'  => wl_field( "why_card_{$i}_body", $landing_id, '' ),
	);
}

// --- How It Works ---------------------------------------------------------
$how_eyebrow = wl_field( 'how_eyebrow', $landing_id, 'How it works' );
$how_heading = wl_field( 'how_heading', $landing_id, 'Four steps, no surprises' );

$steps = array();
for ( $i = 1; $i <= 4; $i++ ) {
	$steps[] = array(
		'n'     => wl_field( "step_{$i}_num", $landing_id, sprintf( '%02d', $i ) ),
		'title' => wl_field( "step_{$i}_title", $landing_id, '' ),
		'body'  => wl_field( "step_{$i}_body", $landing_id, '' ),
	);
}

// --- Plans ------------------------------------------------------------------
$plans_eyebrow    = wl_field( 'plans_eyebrow', $landing_id, 'Plans & pricing' );
$plans_heading    = wl_field( 'plans_heading', $landing_id, 'Simple pricing, no hidden scope' );
$plans_subheading = wl_field( 'plans_subheading', $landing_id, 'Fixed monthly fee. Month-to-month, cancel any time.' );

$plans = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$plans[] = array(
		'name'     => wl_field( "plan_{$i}_name", $landing_id, '' ),
		'desc'     => wl_field( "plan_{$i}_desc", $landing_id, '' ),
		'price'    => wl_field( "plan_{$i}_price", $landing_id, 0 ),
		'featured' => function_exists( 'get_field' ) ? (bool) get_field( "plan_{$i}_featured", $landing_id ) : ( 2 === $i ),
		'features' => wildcat_growth_lines_to_array( wl_field( "plan_{$i}_features", $landing_id, '' ) ),
	);
}

// --- Results / Testimonials --------------------------------------------
$proof_eyebrow = wl_field( 'proof_eyebrow', $landing_id, 'Real results' );
$proof_heading = wl_field( 'proof_heading', $landing_id, 'What our clients say' );

$testimonials = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$testimonials[] = array(
		'quote' => wl_field( "testimonial_{$i}_quote", $landing_id, '' ),
		'name'  => wl_field( "testimonial_{$i}_name", $landing_id, '' ),
		'role'  => wl_field( "testimonial_{$i}_role", $landing_id, '' ),
	);
}

// --- FAQ -------------------------------------------------------------------
$faq_eyebrow = wl_field( 'faq_eyebrow', $landing_id, 'FAQ' );
$faq_heading = wl_field( 'faq_heading', $landing_id, 'Questions, answered' );

$faqs = array();
for ( $i = 1; $i <= 5; $i++ ) {
	$faqs[] = array(
		'q' => wl_field( "faq_{$i}_question", $landing_id, '' ),
		'a' => wl_field( "faq_{$i}_answer", $landing_id, '' ),
	);
}

// --- Contact -----------------------------------------------------------
$contact_heading   = wl_field( 'contact_heading', $landing_id, 'Get your free, no-obligation SEO audit' );
$contact_paragraph = wl_field( 'contact_paragraph', $landing_id, "Tell us about your business and we'll send back a plain-English breakdown of where you're losing traffic — and what it'd take to fix it." );
$contact_address   = wl_field( 'contact_address', $landing_id, 'Workstation, Paternoster Row, Sheffield S1 2BX' );
$contact_phone     = wl_field( 'contact_phone', $landing_id, '0114 312 3641' );

// --- Footer --------------------------------------------------------------
$footer_tagline = wl_field( 'footer_tagline', $landing_id, '— a Wildcat Digital service' );
$footer_rights  = wl_field( 'footer_rights', $landing_id, 'Wildcat Digital Ltd. All rights reserved.' );

// phpcs:disable WordPress.Security.NonceVerification.Recommended -- read-only status flag from our own redirect.
$audit_status = isset( $_GET['audit_request'] ) ? sanitize_text_field( wp_unslash( $_GET['audit_request'] ) ) : '';
// phpcs:enable
?>

<div class="wl-wrap">

	<!-- NAV -->
	<nav class="wl-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wl-logo">
			<span class="wl-logo-mark"><span class="wl-logo-tri"></span></span>
			<span class="wl-wordmark">Wildcat <span>Growth</span></span>
		</a>
		<div class="wl-nav-links">
			<a href="#plans">Plans</a>
			<a href="#how">How it works</a>
			<a href="#proof">Results</a>
			<a href="#faq">FAQ</a>
		</div>
		<a href="#contact" class="wl-btn-pill-dark"><?php echo esc_html( $hero_cta_primary ); ?></a>
	</nav>

	<!-- HERO -->
	<div class="wl-hero">
		<div>
			<div class="wl-eyebrow-pill">
				<span class="wl-eyebrow-dot"></span>
				<?php echo esc_html( $hero_eyebrow ); ?>
			</div>
			<h1 class="wl-h1"><?php echo nl2br( esc_html( $hero_heading ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- nl2br output of already-escaped text. ?></h1>
			<p class="wl-hero-p"><?php echo esc_html( $hero_paragraph ); ?></p>
			<div class="wl-hero-ctas">
				<a href="#contact" class="wl-btn-solid"><?php echo esc_html( $hero_cta_primary ); ?></a>
				<a href="#plans" class="wl-btn-link"><?php echo esc_html( $hero_cta_secondary ); ?></a>
			</div>
			<div class="wl-hero-stats">
				<?php foreach ( $hero_stats as $stat ) : ?>
					<?php if ( '' === $stat['value'] && '' === $stat['label'] ) { continue; } ?>
					<div>
						<div class="wl-stat-num"><?php echo esc_html( $stat['value'] ); ?></div>
						<div class="wl-stat-label"><?php echo esc_html( $stat['label'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="wl-hero-right">
			<div class="wl-hero-image"<?php echo $hero_image ? ' style="background-image:url(' . esc_url( $hero_image ) . ');background-size:cover;background-position:center;"' : ''; ?>>
				<?php if ( ! $hero_image ) : ?>
					<div class="wl-hero-image-label">
						<span>PHOTO</span>
						<span><?php echo esc_html( $hero_placeholder_label ); ?></span>
					</div>
				<?php endif; ?>
				<div class="wl-hero-stat-card">
					<div class="wl-hero-stat-badge"><?php echo esc_html( $hero_badge_percentage ); ?></div>
					<div>
						<div class="wl-hero-stat-title"><?php echo esc_html( $hero_badge_title ); ?></div>
						<div class="wl-hero-stat-sub"><?php echo esc_html( $hero_badge_subtitle ); ?></div>
					</div>
				</div>
			</div>
			<div class="wl-hero-badge"><?php echo esc_html( $hero_corner_badge ); ?></div>
		</div>
	</div>

	<!-- LOGO MARQUEE -->
	<div class="wl-marquee">
		<div class="wl-marquee-track">
			<?php foreach ( $marquee_items as $item ) : ?>
				<span><?php echo esc_html( $item ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- WHY WILDCAT LITE -->
	<div class="wl-why">
		<div class="wl-why-intro">
			<div>
				<div class="wl-eyebrow"><?php echo esc_html( $why_eyebrow ); ?></div>
				<h2 class="wl-h2"><?php echo esc_html( $why_heading ); ?></h2>
			</div>
			<p class="wl-why-p"><?php echo esc_html( $why_paragraph ); ?></p>
		</div>

		<div class="wl-why-grid">
			<?php foreach ( $why_cards as $card ) : ?>
				<div class="wl-why-card">
					<div class="wl-why-num"><?php echo esc_html( $card['num'] ); ?></div>
					<div class="wl-why-title"><?php echo esc_html( $card['title'] ); ?></div>
					<div class="wl-why-body"><?php echo esc_html( $card['body'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- HOW IT WORKS -->
	<div id="how" class="wl-how">
		<div class="wl-section-head">
			<div class="wl-eyebrow"><?php echo esc_html( $how_eyebrow ); ?></div>
			<h2 class="wl-h2"><?php echo esc_html( $how_heading ); ?></h2>
		</div>
		<div class="wl-how-grid">
			<?php foreach ( $steps as $step ) : ?>
				<div class="wl-step">
					<div class="wl-step-num"><?php echo esc_html( $step['n'] ); ?></div>
					<div class="wl-step-title"><?php echo esc_html( $step['title'] ); ?></div>
					<div class="wl-step-body"><?php echo esc_html( $step['body'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- PLANS -->
	<div id="plans" class="wl-plans">
		<div class="wl-plans-inner">
			<div class="wl-plans-head">
				<div class="wl-eyebrow wl-eyebrow--light"><?php echo esc_html( $plans_eyebrow ); ?></div>
				<h2 class="wl-h2"><?php echo esc_html( $plans_heading ); ?></h2>
				<p class="wl-plans-sub"><?php echo esc_html( $plans_subheading ); ?></p>
			</div>
			<div class="wl-plans-grid">
				<?php foreach ( $plans as $plan ) : ?>
					<div class="wl-plan-card<?php echo $plan['featured'] ? ' wl-plan-card--featured' : ''; ?>">
						<?php if ( $plan['featured'] ) : ?>
							<div class="wl-plan-badge">MOST POPULAR</div>
						<?php endif; ?>
						<div class="wl-plan-name"><?php echo esc_html( $plan['name'] ); ?></div>
						<div class="wl-plan-desc"><?php echo esc_html( $plan['desc'] ); ?></div>
						<div class="wl-plan-price">
							<div class="wl-plan-price-amount">£<?php echo esc_html( $plan['price'] ); ?></div>
							<div class="wl-plan-price-period">/month</div>
						</div>
						<a href="#contact" class="wl-plan-btn<?php echo $plan['featured'] ? ' wl-plan-btn--featured' : ''; ?>">Get started</a>
						<div class="wl-plan-divider"></div>
						<?php foreach ( $plan['features'] as $feature ) : ?>
							<div class="wl-plan-feature">
								<span class="wl-plan-feature-check">✓</span>
								<span><?php echo esc_html( $feature ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<!-- PROOF -->
	<div id="proof" class="wl-proof">
		<div class="wl-section-head">
			<div class="wl-eyebrow"><?php echo esc_html( $proof_eyebrow ); ?></div>
			<h2 class="wl-h2"><?php echo esc_html( $proof_heading ); ?></h2>
		</div>
		<div class="wl-proof-grid">
			<?php foreach ( $testimonials as $t ) : ?>
				<div class="wl-testimonial">
					<div class="wl-testimonial-quote">"<?php echo esc_html( $t['quote'] ); ?>"</div>
					<div class="wl-testimonial-name"><?php echo esc_html( $t['name'] ); ?></div>
					<div class="wl-testimonial-role"><?php echo esc_html( $t['role'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- FAQ -->
	<div id="faq" class="wl-faq">
		<div class="wl-section-head">
			<div class="wl-eyebrow"><?php echo esc_html( $faq_eyebrow ); ?></div>
			<h2 class="wl-h2"><?php echo esc_html( $faq_heading ); ?></h2>
		</div>
		<?php foreach ( $faqs as $faq ) : ?>
			<div class="wl-faq-item">
				<button type="button" class="wl-faq-question">
					<span class="wl-faq-q"><?php echo esc_html( $faq['q'] ); ?></span>
					<span class="wl-faq-icon">+</span>
				</button>
				<div class="wl-faq-answer"><?php echo esc_html( $faq['a'] ); ?></div>
			</div>
		<?php endforeach; ?>
	</div>

	<!-- CONTACT / CTA -->
	<div id="contact" class="wl-contact">
		<div class="wl-contact-inner">
			<div>
				<h2 class="wl-contact-h2"><?php echo esc_html( $contact_heading ); ?></h2>
				<p class="wl-contact-p"><?php echo esc_html( $contact_paragraph ); ?></p>
				<div class="wl-contact-details">
					<div class="wl-contact-detail"><span class="wl-contact-dot">●</span> <?php echo esc_html( $contact_address ); ?></div>
					<div class="wl-contact-detail"><span class="wl-contact-dot">●</span> <?php echo esc_html( $contact_phone ); ?></div>
				</div>
			</div>
			<div>
				<?php if ( 'success' === $audit_status ) : ?>
					<div class="wl-form-message wl-form-message--success">Thanks — we've got your request and will be in touch shortly.</div>
				<?php elseif ( 'error' === $audit_status ) : ?>
					<div class="wl-form-message wl-form-message--error">Something went wrong sending that — please check your details and try again.</div>
				<?php endif; ?>
				<form class="wl-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="wildcat_audit_request">
					<?php wp_nonce_field( 'wildcat_audit_request', 'wildcat_audit_nonce' ); ?>
					<div class="wl-form-row">
						<input class="wl-input" type="text" name="first_name" placeholder="First name" required>
						<input class="wl-input" type="text" name="last_name" placeholder="Last name" required>
					</div>
					<input class="wl-input" type="email" name="email" placeholder="Email address" required>
					<input class="wl-input" type="url" name="website_url" placeholder="Website URL">
					<textarea class="wl-textarea" name="message" placeholder="What are you hoping to achieve?" rows="3"></textarea>
					<button type="submit" class="wl-submit">Request my free audit</button>
				</form>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<div class="wl-footer">
		<div class="wl-footer-inner">
			<div class="wl-footer-brand">
				<span class="wl-logo-mark wl-logo-mark--sm"><span class="wl-logo-tri"></span></span>
				<span class="wl-footer-wordmark">Wildcat Growth</span>
				<span class="wl-footer-sub"><?php echo esc_html( $footer_tagline ); ?></span>
			</div>
			<div class="wl-footer-copy">© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $footer_rights ); ?></div>
		</div>
	</div>

</div>
