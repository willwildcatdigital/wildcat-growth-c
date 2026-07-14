<?php
/**
 * Blog index / archive fallback.
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="wl-page">
	<header class="wl-page-hero">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="wl-h1 wl-page-title"><?php single_post_title(); ?></h1>
		<?php elseif ( is_search() ) : ?>
			<h1 class="wl-h1 wl-page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'wildcat-growth-c' ), '<span>' . get_search_query() . '</span>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- query already escaped by get_search_query().
				?>
			</h1>
		<?php elseif ( is_archive() ) : ?>
			<h1 class="wl-h1 wl-page-title"><?php the_archive_title(); ?></h1>
		<?php else : ?>
			<h1 class="wl-h1 wl-page-title">Blog</h1>
		<?php endif; ?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="wl-blog-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'wl-blog-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="wl-blog-card-thumb">
							<?php the_post_thumbnail( 'medium_large' ); ?>
						</a>
					<?php endif; ?>
					<div class="wl-eyebrow"><?php echo esc_html( get_the_date() ); ?></div>
					<h2 class="wl-blog-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="wl-blog-card-excerpt"><?php the_excerpt(); ?></div>
					<a href="<?php the_permalink(); ?>" class="wl-btn-link">Read more</a>
				</article>
				<?php
			endwhile;
			?>
		</div>

		<div class="wl-blog-nav">
			<?php the_posts_navigation(); ?>
		</div>
	<?php else : ?>
		<p>Nothing found.</p>
	<?php endif; ?>
</div>

<?php
get_footer();
