<div class="imageSmallModuleA imageSmallModuleA--images container">
	<?php if ( have_rows( 'images' ) ): ?>
		<?php while ( have_rows( 'images' ) ) : the_row();
			$image = get_sub_field( 'image' );
			if ( ! empty( $image ) && is_int( $image ) ) :
				$image = get_sub_field( 'image' );
				$size  = 'full_img_mobile_large';
				?>
				<div class="imageSmallModuleA-image">
					<?php echo wp_get_attachment_image( $image, $size ); ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>