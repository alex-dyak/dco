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
				{
					while ( have_rows( 'progect_blocks' ) ) : the_row();

						if ( get_row_layout() == 'large_module_a' ):

							get_template_part( 'template-parts/large_module_a' );

						elseif ( get_row_layout() == 'progect_description' ):

							get_template_part( 'template-parts/progect_description' );

						elseif ( get_row_layout() == 'small_module_a' ):

							get_template_part( 'template-parts/small_module_a' );

						elseif ( get_row_layout() == 'small_module_a_turned' ):

							get_template_part( 'template-parts/small_module_a_turned' );

						elseif ( get_row_layout() == 'large_module_b' ):

							get_template_part( 'template-parts/large_module_b' );

						elseif ( get_row_layout() == 'large_module_b_quote_turned' ):

							get_template_part( 'template-parts/large_module_b_quote_turned' );

						elseif ( get_row_layout() == 'small_module_b' ):

							get_template_part( 'template-parts/small_module_b' );

						elseif ( get_row_layout() == 'success_module' ):

							get_template_part( 'template-parts/success_module' );

						endif;

					endwhile;
				}

				endif;

				?>

			</div>

		</article>

	<?php endwhile;
endif; ?>

<?php post_navigation(); ?>


<?php get_footer(); ?>
