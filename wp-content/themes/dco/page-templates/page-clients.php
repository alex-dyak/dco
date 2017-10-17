<?php
/**
 * Template Name: Page - Client
 * The template for displaying Client page
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">
            <!-- W3TC_DYNAMIC_SECURITY mfunc -->
			<?php
			// Slider speed value. Could be changed from admin panel.
			$speed = get_field( 'slider_speed' ) ? get_field( 'slider_speed' ) : 6000;

			// Display banner.
			$banners = [];
			$counter = 0;
			?>
            <!--/mfunc W3TC_DYNAMIC_SECURITY -->
            <div class="profile-slider-holder">
                <div class="profile-slider js-profile-slider"
                     data-speed="<?php echo $speed; ?>">
					<?php
					if ( have_rows( 'page_banner' ) ) {
						while ( have_rows( 'page_banner' ) ) {
							the_row();

							$title = get_sub_field( 'image_title' );
							$image = get_sub_field( 'image' );
							$size = 'full';


							if ( ! empty ( $image ) ): ?>
								<?php if ( ! empty( $image ) ) : ?>
                                    <div>
										<?php echo wp_get_attachment_image( $image['id'],
											$size ); ?>
										<?php if ( $title ) : ?>
                                            <div class="imageClientPage-title"><?php echo $title; ?></div>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
							<?php endif;
						}
					}
					?>
                </div>
            </div>


			<?php if ( get_field( 'filter_area' ) ) : ?>
                <div class="clientPage container">
					<?php echo get_field( 'filter_area' ); ?>
                </div>
			<?php endif; ?>
        </article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
