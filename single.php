<?php
/**
 * Single blog post template.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="wl-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<header class="wl-page-hero">
			<div class="wl-eyebrow">
				<?php echo esc_html( get_the_date() ); ?>
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo ' · ' . esc_html( $categories[0]->name );
				}
				?>
			</div>
			<h1 class="wl-h1 wl-page-title"><?php the_title(); ?></h1>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="wl-page-thumb">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
		<?php endif; ?>

		<div class="wl-page-content">
			<?php the_content(); ?>
		</div>

		<?php
		$wl_blog_page_id = (int) get_option( 'page_for_posts' );
		$wl_blog_url     = $wl_blog_page_id ? get_permalink( $wl_blog_page_id ) : home_url( '/' );
		?>
		<footer class="wl-post-footer">
			<a href="<?php echo esc_url( $wl_blog_url ); ?>" class="wl-btn-link">← Back to all posts</a>
		</footer>

		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
	?>
</div>

<?php
get_footer();
