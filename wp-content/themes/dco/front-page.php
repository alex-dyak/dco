<?php
/**
 * The template for displaying front page
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<?php if ( is_active_sidebar( 'homepage-grid-area' ) ) : ?>
					<?php dynamic_sidebar( 'homepage-grid-area' ); ?>
			<?php endif; ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
