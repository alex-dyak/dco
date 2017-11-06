<?php
// Slider speed value. Could be changed from admin panel.
$speed = get_sub_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' ) : 6000;
?>

<div class="profile-slider-holder">

    <div class="profile-slider js-profile-slider" data-speed="<?php echo $speed; ?>">

        <!-- W3TC_DYNAMIC_SECURITY mfunc -->
		<?php
		$images = get_sub_field( 'forest_images_gallery' );
		$size   = 'full';
		?>
        <!--/mfunc W3TC_DYNAMIC_SECURITY -->

		<?php if ( $images ) : ?>

			<?php foreach ( $images as $image ): ?>

                <div>

					<?php echo wp_get_attachment_image( $image['id'], $size ); ?>

                </div>

			<?php endforeach; ?>

		<?php endif; ?>

    </div>

    <div class="forestImageStudiesPage-bar ">

		<?php
		$forest_bar_image = get_sub_field( 'forest_bar' );
		$size             = 'full';
		?>

		<?php if ( $forest_bar_image ) : ?>

            <div>

                <?php echo wp_get_attachment_image( $forest_bar_image, $size ); ?>

            </div>

		<?php endif; ?>

    </div>

</div>
