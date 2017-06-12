<?php
/**
 * Profile page slider template.
 */
?>

<?php
// Slider speed value. Could be changed from admin panel.
$speed = get_sub_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' ) : 6000;
?>

<?php if ( have_rows( 'slider' ) ): ?>
	<div class="profile-slider-holder">
		<div class="profile-slider js-profile-slider" data-speed="<?php echo $speed; ?>">

			<?php while ( have_rows( 'slider' ) ) : the_row(); ?>
				<?php
				$image = get_sub_field( 'image' );
				$size  = 'full';
				?>

				<?php if ( ! empty( $image ) && is_int( $image ) ) : ?>
					<div>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>