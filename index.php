<?php
/**
 * Fallback template (blog index / generic loop).
 *
 * @package WildcatGrowth
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="wl-wrap" style="padding: 96px 56px;">
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?> style="max-width: 760px; margin: 0 auto 64px;">
				<h2 class="wl-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div><?php the_excerpt(); ?></div>
			</article>
			<?php
		endwhile;

		the_posts_navigation();
	else :
		?>
		<p>Nothing found.</p>
		<?php
	endif;
	?>
</main>

<?php
get_footer();
