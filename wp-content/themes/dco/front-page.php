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

			<?php if ( get_field( 'select_widget_area' ) ) : ?>
					<?php the_field( 'select_widget_area' ); ?>
			<?php endif; ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>