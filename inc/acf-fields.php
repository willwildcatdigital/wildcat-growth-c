<?php
/**
 * ACF field group for the Wildcat Lite landing page.
 *
 * Registered in code (not built by hand in the ACF UI) so the field
 * structure is version-controlled alongside the theme. Editors fill in
 * VALUES on the page edit screen — they don't see or edit this file.
 *
 * Built for the free version of ACF: no Repeater / Flexible Content /
 * Group fields (those are ACF PRO only). Fixed-count items (why cards,
 * steps, plans, testimonials, FAQs) are instead individual numbered
 * fields, and short lists (marquee tags, plan features) are single
 * textareas with one item per line.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

/**
 * Small helper to cut down repetition below.
 *
 * @param string $key      Unique field key suffix (no "field_" prefix needed here).
 * @param string $label    Field label shown in wp-admin.
 * @param string $name     Field name used with get_field().
 * @param string $type     ACF field type.
 * @param array  $extra    Any extra field args (default_value, rows, instructions, etc).
 */
function wl_acf_field( $key, $label, $name, $type = 'text', $extra = array() ) {
	return array_merge(
		array(
			'key'   => 'field_wl_' . $key,
			'label' => $label,
			'name'  => $name,
			'type'  => $type,
		),
		$extra
	);
}

$fields = array();

// --- Hero -----------------------------------------------------------
$fields[] = wl_acf_field( 'hero_tab', 'Hero', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'hero_eyebrow', 'Eyebrow pill text', 'hero_eyebrow', 'text', array( 'default_value' => 'SEO built for businesses under 10 people' ) );
$fields[] = wl_acf_field( 'hero_heading', 'Headline', 'hero_heading', 'textarea', array(
	'default_value' => "Punch above your weight —\nwithout the agency price tag.",
	'rows'          => 2,
	'instructions'  => 'Line breaks here become <br> in the headline.',
) );
$fields[] = wl_acf_field( 'hero_paragraph', 'Supporting paragraph', 'hero_paragraph', 'textarea', array(
	'default_value' => 'Wildcat Lite is straightforward SEO for small businesses: no lock-in contracts, no jargon-filled reports, no six-month minimums. A new SEO-optimised website plus ongoing SEO, from £99/month.',
	'rows'          => 3,
) );
$fields[] = wl_acf_field( 'hero_cta_primary', 'Primary button text', 'hero_cta_primary', 'text', array( 'default_value' => 'Get your free audit' ) );
$fields[] = wl_acf_field( 'hero_cta_secondary', 'Secondary link text', 'hero_cta_secondary', 'text', array( 'default_value' => 'See plans & pricing' ) );

$hero_stat_defaults = array(
	1 => array( '£99', 'starting monthly' ),
	2 => array( 'No lock-in', 'cancel any month' ),
	3 => array( '14 days', 'to your first audit' ),
);
foreach ( $hero_stat_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "hero_stat_{$i}_value", "Stat {$i} value", "hero_stat_{$i}_value", 'text', array( 'default_value' => $vals[0] ) );
	$fields[] = wl_acf_field( "hero_stat_{$i}_label", "Stat {$i} label", "hero_stat_{$i}_label", 'text', array( 'default_value' => $vals[1] ) );
}

$fields[] = wl_acf_field( 'hero_image', 'Hero image', 'hero_image', 'image', array(
	'return_format' => 'url',
	'instructions'  => 'Leave empty to keep the "PHOTO" placeholder block.',
) );
$fields[] = wl_acf_field( 'hero_placeholder_label', 'Placeholder caption (used when no image set)', 'hero_placeholder_label', 'text', array( 'default_value' => 'small business owner, workshop/storefront' ) );
$fields[] = wl_acf_field( 'hero_badge_percentage', 'Floating stat card — number', 'hero_badge_percentage', 'text', array( 'default_value' => '+68%' ) );
$fields[] = wl_acf_field( 'hero_badge_title', 'Floating stat card — title', 'hero_badge_title', 'text', array( 'default_value' => 'Organic traffic, 6 months' ) );
$fields[] = wl_acf_field( 'hero_badge_subtitle', 'Floating stat card — subtitle', 'hero_badge_subtitle', 'text', array( 'default_value' => 'Local trades client, Sheffield' ) );
$fields[] = wl_acf_field( 'hero_corner_badge', 'Gold corner badge text', 'hero_corner_badge', 'text', array( 'default_value' => 'from Wildcat Digital' ) );

// --- Marquee ----------------------------------------------------------
$fields[] = wl_acf_field( 'marquee_tab', 'Logo Marquee', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'marquee_items', 'Scrolling tags (one per line)', 'marquee_items', 'textarea', array(
	'default_value' => "LOCAL TRADES\nRETAIL\nHOSPITALITY\nPROFESSIONAL SERVICES\nHEALTH & BEAUTY\nCONSTRUCTION\nECOMMERCE STARTUPS",
	'rows'          => 7,
) );

// --- Why Wildcat Lite ---------------------------------------------------
$fields[] = wl_acf_field( 'why_tab', 'Why Us', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'why_eyebrow', 'Eyebrow', 'why_eyebrow', 'text', array( 'default_value' => 'Why Wildcat Lite exists' ) );
$fields[] = wl_acf_field( 'why_heading', 'Heading', 'why_heading', 'text', array( 'default_value' => "Most SEO agencies are built for £1m+ businesses. You're not one — yet." ) );
$fields[] = wl_acf_field( 'why_paragraph', 'Paragraph', 'why_paragraph', 'textarea', array(
	'default_value' => "Our sister agency, Wildcat Digital, works with growing and enterprise brands on £2k+/month retainers. Wildcat Lite is a separate, leaner service — same team's expertise, distilled into a fixed-scope package that actually makes sense for a five-person business, a solo tradesperson, or a shop with one location. Every package starts with a new SEO-optimised website built for you, then keeps working in the background. No strategy decks. No 12-month contracts.",
	'rows'          => 4,
) );

$why_card_defaults = array(
	1 => array( '01', 'Fixed, honest scope', 'You know exactly what you get each month — no vague "strategy hours" billed at an unclear rate.' ),
	2 => array( '02', 'No long contracts', 'Month-to-month by default. We earn your business every month, not just at renewal.' ),
	3 => array( '03', 'Built for small teams', 'Reports and calls are written for business owners, not marketing directors — plain English, no jargon.' ),
	4 => array( '04', 'Same expertise, leaner delivery', "Backed by the team behind Wildcat Digital's award-winning SEO work, just packaged for a smaller budget." ),
);
foreach ( $why_card_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "why_card_{$i}_num", "Card {$i} number", "why_card_{$i}_num", 'text', array( 'default_value' => $vals[0] ) );
	$fields[] = wl_acf_field( "why_card_{$i}_title", "Card {$i} title", "why_card_{$i}_title", 'text', array( 'default_value' => $vals[1] ) );
	$fields[] = wl_acf_field( "why_card_{$i}_body", "Card {$i} body", "why_card_{$i}_body", 'textarea', array( 'default_value' => $vals[2], 'rows' => 2 ) );
}

// --- How It Works -------------------------------------------------------
$fields[] = wl_acf_field( 'how_tab', 'How It Works', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'how_eyebrow', 'Eyebrow', 'how_eyebrow', 'text', array( 'default_value' => 'How it works' ) );
$fields[] = wl_acf_field( 'how_heading', 'Heading', 'how_heading', 'text', array( 'default_value' => 'Four steps, no surprises' ) );

$step_defaults = array(
	1 => array( '01', 'Free audit', 'We review your site and search visibility, and tell you honestly whether SEO is worth it yet.' ),
	2 => array( '02', 'Pick a plan', 'Choose Starter, Growth, or Momentum based on your budget and ambition — upgrade or downgrade any time.' ),
	3 => array( '03', 'We get to work', 'Technical fixes, on-page optimisation, and content go live within your first month.' ),
	4 => array( '04', 'Monthly reporting', 'A plain-English report and a chance to ask questions — no dashboards to decode yourself.' ),
);
foreach ( $step_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "step_{$i}_num", "Step {$i} number", "step_{$i}_num", 'text', array( 'default_value' => $vals[0] ) );
	$fields[] = wl_acf_field( "step_{$i}_title", "Step {$i} title", "step_{$i}_title", 'text', array( 'default_value' => $vals[1] ) );
	$fields[] = wl_acf_field( "step_{$i}_body", "Step {$i} body", "step_{$i}_body", 'textarea', array( 'default_value' => $vals[2], 'rows' => 2 ) );
}

// --- Plans ----------------------------------------------------------------
$fields[] = wl_acf_field( 'plans_tab', 'Plans & Pricing', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'plans_eyebrow', 'Eyebrow', 'plans_eyebrow', 'text', array( 'default_value' => 'Plans & pricing' ) );
$fields[] = wl_acf_field( 'plans_heading', 'Heading', 'plans_heading', 'text', array( 'default_value' => 'Simple pricing, no hidden scope' ) );
$fields[] = wl_acf_field( 'plans_subheading', 'Subheading', 'plans_subheading', 'text', array( 'default_value' => 'Fixed monthly fee. Month-to-month, cancel any time.' ) );

$plan_defaults = array(
	1 => array(
		'name'     => 'Starter',
		'desc'     => 'A new SEO-optimised website, done right from day one.',
		'price'    => 99,
		'featured' => 0,
		'features' => "New SEO-optimised website\nGoogle Business Profile management\nMonthly plain-English report",
	),
	2 => array(
		'name'     => 'Growth',
		'desc'     => 'The most popular choice for local businesses.',
		'price'    => 295,
		'featured' => 1,
		'features' => "Everything in Starter\nOne proactive SEO deliverable per month\ne.g. blog post, landing page improvements, content optimisation, or advanced SEO feature\nMonthly call with your account manager",
	),
	3 => array(
		'name'     => 'Momentum',
		'desc'     => 'For businesses ready to push harder.',
		'price'    => 495,
		'featured' => 0,
		'features' => "Everything in Starter\n1 SEO blog post per month\n1 additional SEO deliverable per month\nPriority support",
	),
);
foreach ( $plan_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "plan_{$i}_name", "Plan {$i} name", "plan_{$i}_name", 'text', array( 'default_value' => $vals['name'] ) );
	$fields[] = wl_acf_field( "plan_{$i}_desc", "Plan {$i} description", "plan_{$i}_desc", 'text', array( 'default_value' => $vals['desc'] ) );
	$fields[] = wl_acf_field( "plan_{$i}_price", "Plan {$i} price (£/month)", "plan_{$i}_price", 'number', array( 'default_value' => $vals['price'] ) );
	$fields[] = wl_acf_field( "plan_{$i}_featured", 'Highlight as "Most Popular"', "plan_{$i}_featured", 'true_false', array( 'default_value' => $vals['featured'], 'ui' => 1 ) );
	$fields[] = wl_acf_field( "plan_{$i}_features", "Plan {$i} features (one per line)", "plan_{$i}_features", 'textarea', array( 'default_value' => $vals['features'], 'rows' => 4 ) );
}

// --- Results / Testimonials ----------------------------------------------
$fields[] = wl_acf_field( 'proof_tab', 'Results', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'proof_eyebrow', 'Eyebrow', 'proof_eyebrow', 'text', array( 'default_value' => 'Real results' ) );
$fields[] = wl_acf_field( 'proof_heading', 'Heading', 'proof_heading', 'text', array( 'default_value' => 'What our clients say' ) );

$testimonial_defaults = array(
	1 => array( 'I have really enjoyed working with Wildcat Digital. We work with them for their SEO expertise and we have seen great results.', 'Michael Oszmann', 'Client' ),
	2 => array( 'The whole of the Wildcat team also reflect the above. Each add their expertise in an easy to understand and very approachable way.', 'Majid Bani', 'Client' ),
	3 => array( 'They level with you to make the process so much easier to digest. The results speak for themselves, thank you for all your hard work.', 'Valor Property Maintenance', 'Client' ),
);
foreach ( $testimonial_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "testimonial_{$i}_quote", "Testimonial {$i} quote", "testimonial_{$i}_quote", 'textarea', array( 'default_value' => $vals[0], 'rows' => 2 ) );
	$fields[] = wl_acf_field( "testimonial_{$i}_name", "Testimonial {$i} name", "testimonial_{$i}_name", 'text', array( 'default_value' => $vals[1] ) );
	$fields[] = wl_acf_field( "testimonial_{$i}_role", "Testimonial {$i} role", "testimonial_{$i}_role", 'text', array( 'default_value' => $vals[2] ) );
}

// --- FAQ --------------------------------------------------------------
$fields[] = wl_acf_field( 'faq_tab', 'FAQ', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'faq_eyebrow', 'Eyebrow', 'faq_eyebrow', 'text', array( 'default_value' => 'FAQ' ) );
$fields[] = wl_acf_field( 'faq_heading', 'Heading', 'faq_heading', 'text', array( 'default_value' => 'Questions, answered' ) );

$faq_defaults = array(
	1 => array( 'Why is this cheaper than a normal SEO agency?', 'Wildcat Lite runs fixed, templated packages rather than bespoke strategy work — that lets us keep delivery efficient and pass the saving on. You get the same specialists behind Wildcat Digital, working a leaner, more focused scope.' ),
	2 => array( 'Is there a minimum contract?', "No. Everything is month-to-month. We ask for 30 days' notice to cancel, simply so we can hand things over cleanly." ),
	3 => array( 'Will I get a dedicated account manager?', 'Yes, on Growth and Momentum plans. Starter clients get a named point of contact and a monthly report.' ),
	4 => array( 'How fast will I see results?', 'SEO takes time to compound — most clients see meaningful movement in rankings and traffic within 3-6 months, with early technical wins often visible sooner.' ),
	5 => array( 'What if I outgrow Wildcat Lite?', "Great problem to have. We'll happily introduce you to the full Wildcat Digital team for a bespoke strategy once your budget and ambitions grow." ),
);
foreach ( $faq_defaults as $i => $vals ) {
	$fields[] = wl_acf_field( "faq_{$i}_question", "FAQ {$i} question", "faq_{$i}_question", 'text', array( 'default_value' => $vals[0] ) );
	$fields[] = wl_acf_field( "faq_{$i}_answer", "FAQ {$i} answer", "faq_{$i}_answer", 'textarea', array( 'default_value' => $vals[1], 'rows' => 2 ) );
}

// --- Contact ------------------------------------------------------------
$fields[] = wl_acf_field( 'contact_tab', 'Contact', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'contact_heading', 'Heading', 'contact_heading', 'text', array( 'default_value' => 'Get your free, no-obligation SEO audit' ) );
$fields[] = wl_acf_field( 'contact_paragraph', 'Paragraph', 'contact_paragraph', 'textarea', array(
	'default_value' => "Tell us about your business and we'll send back a plain-English breakdown of where you're losing traffic — and what it'd take to fix it.",
	'rows'          => 2,
) );
$fields[] = wl_acf_field( 'contact_address', 'Address', 'contact_address', 'text', array( 'default_value' => 'Workstation, Paternoster Row, Sheffield S1 2BX' ) );
$fields[] = wl_acf_field( 'contact_phone', 'Phone', 'contact_phone', 'text', array( 'default_value' => '0114 312 3641' ) );

// --- Footer ---------------------------------------------------------------
$fields[] = wl_acf_field( 'footer_tab', 'Footer', '', 'tab', array( 'placement' => 'top' ) );
$fields[] = wl_acf_field( 'footer_tagline', 'Tagline next to logo', 'footer_tagline', 'text', array( 'default_value' => '— a Wildcat Digital service' ) );
$fields[] = wl_acf_field( 'footer_rights', 'Copyright line (year is added automatically)', 'footer_rights', 'text', array( 'default_value' => 'Wildcat Digital Ltd. All rights reserved.' ) );

acf_add_local_field_group( array(
	'key'                   => 'group_wildcat_lite_landing',
	'title'                 => 'Wildcat Lite Landing Content',
	'fields'                => $fields,
	'location'              => array(
		array(
			array(
				'param'    => 'page_type',
				'operator' => '==',
				'value'    => 'front_page',
			),
		),
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-wildcat-lite-landing.php',
			),
		),
	),
	'menu_order'            => 0,
	'position'              => 'normal',
	'style'                 => 'default',
	'label_placement'       => 'top',
	'instruction_placement' => 'label',
) );
