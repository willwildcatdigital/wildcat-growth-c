<?php
/**
 * Generic page template — used for any Page that isn't the landing page
 * (About, Services, Contact, etc). Simple title + content, styled to match
 * the rest of the site.
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
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
	?>
</div>

<?php
get_footer();
