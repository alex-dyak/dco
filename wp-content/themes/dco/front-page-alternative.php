<?php
/**
 * Template Name: Page - Front Alternative
 * The template for displaying Front Alternative page
 */

get_header('alternative'); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<?php if ( get_field( 'select_slider_area' ) ) : ?>
				<div class="homepageSliderArea">
					<?php the_field( 'select_slider_area' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_field( 'select_grid_area' ) ) : ?>
				<div class="homepageGridArea">
                    <?php the_field( 'select_grid_area' ); ?>
				</div>
			<?php endif; ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
