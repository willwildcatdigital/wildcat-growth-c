<?php
/**
 * Theme footer.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wl_footer_id      = wildcat_growth_landing_post_id();
$wl_footer_tagline = wl_field( 'footer_tagline', $wl_footer_id, '— a Wildcat Digital service' );
$wl_footer_rights  = wl_field( 'footer_rights', $wl_footer_id, 'Wildcat Digital Ltd. All rights reserved.' );
?>

	<!-- FOOTER -->
	<div class="wl-footer">
		<div class="wl-footer-inner">
			<div class="wl-footer-brand">
				<span class="wl-logo-mark wl-logo-mark--sm"><span class="wl-logo-tri"></span></span>
				<span class="wl-footer-wordmark">Wildcat Growth</span>
				<span class="wl-footer-sub"><?php echo esc_html( $wl_footer_tagline ); ?></span>
			</div>
			<div class="wl-footer-copy">© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $wl_footer_rights ); ?></div>
		</div>
	</div>

</div><!-- .wl-wrap -->

<?php wp_footer(); ?>
</body>
</html>
