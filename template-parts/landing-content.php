<?php
/**
 * Wildcat Lite landing page content.
 *
 * Recreated from the design handoff (design_handoff_wildcat_lite_landing).
 * Copy/pricing/testimonials are hardcoded below for now — a good next step
 * is moving these into ACF fields or the block editor so they're editable
 * without touching code.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$marquee_items = array_fill( 0, 2, array( 'LOCAL TRADES', 'RETAIL', 'HOSPITALITY', 'PROFESSIONAL SERVICES', 'HEALTH & BEAUTY', 'CONSTRUCTION', 'ECOMMERCE STARTUPS' ) );
$marquee_items = array_merge( ...$marquee_items );

$why_cards = array(
	array(
		'num'   => '01',
		'title' => 'Fixed, honest scope',
		'body'  => 'You know exactly what you get each month — no vague "strategy hours" billed at an unclear rate.',
	),
	array(
		'num'   => '02',
		'title' => 'No long contracts',
		'body'  => 'Month-to-month by default. We earn your business every month, not just at renewal.',
	),
	array(
		'num'   => '03',
		'title' => 'Built for small teams',
		'body'  => 'Reports and calls are written for business owners, not marketing directors — plain English, no jargon.',
	),
	array(
		'num'   => '04',
		'title' => 'Same expertise, leaner delivery',
		'body'  => "Backed by the team behind Wildcat Digital's award-winning SEO work, just packaged for a smaller budget.",
	),
);

$steps = array(
	array(
		'n'     => '01',
		'title' => 'Free audit',
		'body'  => 'We review your site and search visibility, and tell you honestly whether SEO is worth it yet.',
	),
	array(
		'n'     => '02',
		'title' => 'Pick a plan',
		'body'  => 'Choose Starter, Growth, or Momentum based on your budget and ambition — upgrade or downgrade any time.',
	),
	array(
		'n'     => '03',
		'title' => 'We get to work',
		'body'  => 'Technical fixes, on-page optimisation, and content go live within your first month.',
	),
	array(
		'n'     => '04',
		'title' => 'Monthly reporting',
		'body'  => 'A plain-English report and a chance to ask questions — no dashboards to decode yourself.',
	),
);

$plans = array(
	array(
		'name'     => 'Starter',
		'desc'     => 'A new SEO-optimised website, done right from day one.',
		'price'    => 99,
		'featured' => false,
		'features' => array(
			'New SEO-optimised website',
			'Google Business Profile management',
			'Monthly plain-English report',
		),
	),
	array(
		'name'     => 'Growth',
		'desc'     => 'The most popular choice for local businesses.',
		'price'    => 295,
		'featured' => true,
		'features' => array(
			'Everything in Starter',
			'One proactive SEO deliverable per month',
			'e.g. blog post, landing page improvements, content optimisation, or advanced SEO feature',
			'Monthly call with your account manager',
		),
	),
	array(
		'name'     => 'Momentum',
		'desc'     => 'For businesses ready to push harder.',
		'price'    => 495,
		'featured' => false,
		'features' => array(
			'Everything in Starter',
			'1 SEO blog post per month',
			'1 additional SEO deliverable per month',
			'Priority support',
		),
	),
);

$testimonials = array(
	array(
		'quote' => 'I have really enjoyed working with Wildcat Digital. We work with them for their SEO expertise and we have seen great results.',
		'name'  => 'Michael Oszmann',
		'role'  => 'Client',
	),
	array(
		'quote' => 'The whole of the Wildcat team also reflect the above. Each add their expertise in an easy to understand and very approachable way.',
		'name'  => 'Majid Bani',
		'role'  => 'Client',
	),
	array(
		'quote' => 'They level with you to make the process so much easier to digest. The results speak for themselves, thank you for all your hard work.',
		'name'  => 'Valor Property Maintenance',
		'role'  => 'Client',
	),
);

$faqs = array(
	array(
		'q' => 'Why is this cheaper than a normal SEO agency?',
		'a' => 'Wildcat Lite runs fixed, templated packages rather than bespoke strategy work — that lets us keep delivery efficient and pass the saving on. You get the same specialists behind Wildcat Digital, working a leaner, more focused scope.',
	),
	array(
		'q' => 'Is there a minimum contract?',
		'a' => "No. Everything is month-to-month. We ask for 30 days' notice to cancel, simply so we can hand things over cleanly.",
	),
	array(
		'q' => 'Will I get a dedicated account manager?',
		'a' => 'Yes, on Growth and Momentum plans. Starter clients get a named point of contact and a monthly report.',
	),
	array(
		'q' => 'How fast will I see results?',
		'a' => 'SEO takes time to compound — most clients see meaningful movement in rankings and traffic within 3-6 months, with early technical wins often visible sooner.',
	),
	array(
		'q' => 'What if I outgrow Wildcat Lite?',
		'a' => "Great problem to have. We'll happily introduce you to the full Wildcat Digital team for a bespoke strategy once your budget and ambitions grow.",
	),
);

// phpcs:disable WordPress.Security.NonceVerification.Recommended -- read-only status flag from our own redirect.
$audit_status = isset( $_GET['audit_request'] ) ? sanitize_text_field( wp_unslash( $_GET['audit_request'] ) ) : '';
// phpcs:enable
?>

<div class="wl-wrap">

	<!-- NAV -->
	<nav class="wl-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wl-logo">
			<span class="wl-logo-mark"><span class="wl-logo-tri"></span></span>
			<span class="wl-wordmark">Wildcat <span>Lite</span></span>
		</a>
		<div class="wl-nav-links">
			<a href="#plans">Plans</a>
			<a href="#how">How it works</a>
			<a href="#proof">Results</a>
			<a href="#faq">FAQ</a>
		</div>
		<a href="#contact" class="wl-btn-pill-dark">Get your free audit</a>
	</nav>

	<!-- HERO -->
	<div class="wl-hero">
		<div>
			<div class="wl-eyebrow-pill">
				<span class="wl-eyebrow-dot"></span>
				SEO built for businesses under 10 people
			</div>
			<h1 class="wl-h1">Punch above your weight —<br>without the agency price tag.</h1>
			<p class="wl-hero-p">Wildcat Lite is straightforward SEO for small businesses: no lock-in contracts, no jargon-filled reports, no six-month minimums. A new SEO-optimised website plus ongoing SEO, from £99/month.</p>
			<div class="wl-hero-ctas">
				<a href="#contact" class="wl-btn-solid">Get your free audit</a>
				<a href="#plans" class="wl-btn-link">See plans &amp; pricing</a>
			</div>
			<div class="wl-hero-stats">
				<div>
					<div class="wl-stat-num">£99</div>
					<div class="wl-stat-label">starting monthly</div>
				</div>
				<div>
					<div class="wl-stat-num">No lock-in</div>
					<div class="wl-stat-label">cancel any month</div>
				</div>
				<div>
					<div class="wl-stat-num">14 days</div>
					<div class="wl-stat-label">to your first audit</div>
				</div>
			</div>
		</div>
		<div class="wl-hero-right">
			<div class="wl-hero-image">
				<div class="wl-hero-image-label">
					<span>PHOTO</span>
					<span>small business owner, workshop/storefront</span>
				</div>
				<div class="wl-hero-stat-card">
					<div class="wl-hero-stat-badge">+68%</div>
					<div>
						<div class="wl-hero-stat-title">Organic traffic, 6 months</div>
						<div class="wl-hero-stat-sub">Local trades client, Sheffield</div>
					</div>
				</div>
			</div>
			<div class="wl-hero-badge">from Wildcat Digital</div>
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
				<div class="wl-eyebrow">Why Wildcat Lite exists</div>
				<h2 class="wl-h2">Most SEO agencies are built for £1m+ businesses. You're not one — yet.</h2>
			</div>
			<p class="wl-why-p">Our sister agency, Wildcat Digital, works with growing and enterprise brands on £2k+/month retainers. Wildcat Lite is a separate, leaner service — same team's expertise, distilled into a fixed-scope package that actually makes sense for a five-person business, a solo tradesperson, or a shop with one location. Every package starts with a new SEO-optimised website built for you, then keeps working in the background. No strategy decks. No 12-month contracts.</p>
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
			<div class="wl-eyebrow">How it works</div>
			<h2 class="wl-h2">Four steps, no surprises</h2>
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
				<div class="wl-eyebrow wl-eyebrow--light">Plans &amp; pricing</div>
				<h2 class="wl-h2">Simple pricing, no hidden scope</h2>
				<p class="wl-plans-sub">Fixed monthly fee. Month-to-month, cancel any time.</p>
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
			<div class="wl-eyebrow">Real results</div>
			<h2 class="wl-h2">What our clients say</h2>
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
			<div class="wl-eyebrow">FAQ</div>
			<h2 class="wl-h2">Questions, answered</h2>
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
				<h2 class="wl-contact-h2">Get your free, no-obligation SEO audit</h2>
				<p class="wl-contact-p">Tell us about your business and we'll send back a plain-English breakdown of where you're losing traffic — and what it'd take to fix it.</p>
				<div class="wl-contact-details">
					<div class="wl-contact-detail"><span class="wl-contact-dot">●</span> Workstation, Paternoster Row, Sheffield S1 2BX</div>
					<div class="wl-contact-detail"><span class="wl-contact-dot">●</span> 0114 312 3641</div>
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
				<span class="wl-footer-wordmark">Wildcat Lite</span>
				<span class="wl-footer-sub">— a Wildcat Digital service</span>
			</div>
			<div class="wl-footer-copy">© <?php echo esc_html( gmdate( 'Y' ) ); ?> Wildcat Digital Ltd. All rights reserved.</div>
		</div>
	</div>

</div>
