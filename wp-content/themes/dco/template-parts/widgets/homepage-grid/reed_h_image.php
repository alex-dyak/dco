<?php $image = get_sub_field( 'reed_h_image' );
	if ( ! empty( $image ) && is_int( $image ) ) : ?>
	<div class="reedHimage gridItem">
        <img src="<?php echo wp_get_attachment_image_url( $image, 'homepage_grid_small_image' ) ?>" alt="">
	</div>
<?php endif; ?>