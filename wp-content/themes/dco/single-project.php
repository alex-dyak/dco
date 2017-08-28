<?php
/**
 * The template for displaying all project posts and attachments
 *
 * @package    WordPress
 * @subpackage W4P-Theme
 * @since      W4P Theme 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="entry-content">

				<?php

				// check if the flexible content field has rows of data
				if ( have_rows( 'progect_blocks' ) ): // loop through the rows of data

					while ( have_rows( 'progect_blocks' ) ) : the_row();

						if ( get_row_layout() == 'large_module_a' ):

							get_template_part( 'template-parts/projects/large_module_a' );

						elseif ( get_row_layout() == 'progect_description' ):

							get_template_part( 'template-parts/projects/progect_description' );

						elseif ( get_row_layout() == 'small_module_a' ):

							get_template_part( 'template-parts/projects/small_module_a' );

						elseif ( get_row_layout() == 'small_module_a_text' ):

							get_template_part( 'template-parts/projects/small_module_a_text' );

						elseif ( get_row_layout() == 'small_module_a_two_images' ):

							get_template_part( 'template-parts/projects/small_module_a_two_images' );

						elseif ( get_row_layout() == 'small_module_a_stat' ):

							get_template_part( 'template-parts/projects/small_module_a_stat' );

						elseif ( get_row_layout() == 'large_module_b' ):

							get_template_part( 'template-parts/projects/large_module_b' );

						elseif ( get_row_layout() == 'small_module_b' ):

							get_template_part( 'template-parts/projects/small_module_b' );

						elseif ( get_row_layout() == 'small_module_c' ):

							get_template_part( 'template-parts/projects/small_module_c' );

						elseif ( get_row_layout() == 'success_module' ):

							get_template_part( 'template-parts/projects/success_module' );

						elseif ( get_row_layout() == 'stats' ):

							get_template_part( 'template-parts/projects/stats_columns' );

						endif;

					endwhile;

				endif;

				?>

			</div>

		</article>

	<?php endwhile;

	post_navigation();

endif; ?>


<?php get_footer(); ?>
