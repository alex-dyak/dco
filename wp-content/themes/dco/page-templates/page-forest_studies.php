<?php
/**
 * Template Name: Page - Forest Image Studies
 * The template for displaying Forest Image Studies page
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php

			// check if the flexible content field has rows of data
			if ( have_rows( 'forest_image_studies_blocks' ) ):

				// loop through the rows of data
				while ( have_rows( 'forest_image_studies_blocks' ) ) : the_row();

					if ( get_row_layout() == 'forest_images_slider' ):

						get_template_part( 'template-parts/forest-studies/forest-images-slider' );

					elseif ( get_row_layout() == 'statistic_block' ):

						get_template_part( 'template-parts/forest-studies/statistic-block' );

					elseif ( get_row_layout() == 'image_with_quote' ):

						get_template_part( 'template-parts/forest-studies/image-with-quote' );

					endif;

				endwhile;

			endif; ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
