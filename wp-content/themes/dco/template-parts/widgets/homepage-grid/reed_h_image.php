<?php $image = get_sub_field( 'reed_h_image' );
	if ( ! empty( $image ) && is_int( $image ) ) : ?>
	<div class="reedHimage">
		<?php
		printf( '<img src="%s" srcset="%s">',
			wp_get_attachment_image_url( $image ),
			wp_get_attachment_image_srcset( $image, 'middle' )
		);
		?>
	</div>
<?php endif; ?>