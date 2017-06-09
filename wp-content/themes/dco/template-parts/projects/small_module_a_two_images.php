<div class="imageSmallModuleA container">
	<?php if ( have_rows( 'images' ) ): ?>
		<?php while ( have_rows( 'images' ) ) : the_row();
			$image = get_sub_field( 'image' );
			if ( ! empty ( $image ) ):
				$url = $image['url'];
				?>
				<div class="imageSmallModuleA-image">
					<img src="<?php echo $url; ?>">
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>