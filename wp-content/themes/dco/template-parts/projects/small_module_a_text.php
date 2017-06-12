<?php $title_color = get_field( 'title_color' ); ?>

<div class="imageSmallModuleA container">

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="imageSmallModuleA-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="imageSmallModuleA-body-title"
				    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="imageSmallModuleA-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php $image = get_sub_field( 'image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="imageSmallModuleA-image">
			<img src="<?php echo $url; ?>">

			<?php if ( have_rows( 'beside_image_text' ) ): ?>
				<div class="imageText container">
					<?php while ( have_rows( 'beside_image_text' ) ) : the_row();
						if ( get_sub_field( 'text_color' ) ) {
							$text_color = get_sub_field( 'text_color' );
						} else {
							$text_color = '';
						}
						?>
						<div class="imageText item">
							<?php if ( get_sub_field( 'text' ) ): ?>
								<div class="imageText-text" style="color: <?php echo $text_color; ?>">
									<?php echo the_sub_field( 'text' ); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</div>
	<?php endif; ?>

</div>