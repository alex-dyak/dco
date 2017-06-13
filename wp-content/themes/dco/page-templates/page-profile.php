<?php
/**
 * Template Name: Page - Profile
 * The template for displaying Profile page
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php

			// check if the flexible content field has rows of data
			if ( have_rows( 'profile_fields' ) ):

				// loop through the rows of data
				while ( have_rows( 'profile_fields' ) ) : the_row();

					if ( get_row_layout() == 'slider_block' ):

						get_template_part( 'template-parts/profile/content-banner-slider' );

					elseif ( get_row_layout() == 'careers' ):

						get_template_part( 'template-parts/profile/content-careers' );

					elseif ( get_row_layout() == 'widgets_area' ):

						get_template_part( 'template-parts/profile/content-widgets_area' );

					elseif ( get_row_layout() == 'widget' ):

						get_template_part( 'template-parts/profile/content-widget' );

					elseif ( get_row_layout() == 'content_block' ):

						get_template_part( 'template-parts/profile/content-profile' );

					elseif ( get_row_layout() == 'approach_block' ):

						get_template_part( 'template-parts/profile/content-approach_block' );

					elseif ( get_row_layout() == 'anchor_section' ):

						get_template_part( 'template-parts/profile/content-anchor_section' );

					elseif ( get_row_layout() == 'approach_items_list_block' ):

						get_template_part( 'template-parts/profile/content-approach_items_list_block' );


					endif;

				endwhile;

			endif;
			?>

			<?php edit_post_link( __( 'Edit this entry', 'dco' ), '<p>', '</p>' ); ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
