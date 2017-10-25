<?php
/**
 * Template Name: Page - Client
 * The template for displaying Client page
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php
			// Slider speed value. Could be changed from admin panel.
			$speed = get_field( 'slider_speed' ) ? get_field( 'slider_speed' ) : 6000;
			?>

            <div class="imageClientPage-slider-holder">
                <div class="imageClientPage-slider js-client-slider" data-speed="<?php echo $speed; ?>">
                    <!-- W3TC_DYNAMIC_SECURITY mfunc -->
	                <?php
	                $repeater = get_field( 'page_banner' );
	                $random_element = array_rand( $repeater );
	                $size = 'full';
	                ?>
                    <!--/mfunc W3TC_DYNAMIC_SECURITY -->
	                <?php
	                for( $i = 0; $i < count($repeater); $i++ ){

                        $title = $repeater[$i]['image_title'];
                        $image = $repeater[$i]['image'];

                        if ( ! empty ( $image ) ): ?>
                            <?php if ( ! empty( $image ) ) : ?>
                                <div>
                                    <?php echo wp_get_attachment_image( $image['id'], $size ); ?>
                                    <?php if ( $title ) : ?>
                                        <div class="imageClientPage-title"><?php echo $title; ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif;

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
