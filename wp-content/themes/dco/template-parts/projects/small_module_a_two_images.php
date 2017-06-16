<div class="imageSmallModuleA imageSmallModuleA--images container">
	<?php if ( have_rows( 'images' ) ): ?>
		<?php while ( have_rows( 'images' ) ) : the_row();
			$image = get_sub_field( 'image' );
			if ( ! empty ( $image ) ):
				$url = $image['url'];
				?>
                <div class="imageSmallModuleA-image">
                    <img src="<?php echo $image['sizes']['full_img_mobile_large']; ?>">
                </div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>