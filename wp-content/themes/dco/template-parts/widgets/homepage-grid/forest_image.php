<div class="forestImage container">
	<?php $image = get_sub_field( 'forest_image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="forestImage-image">
			<img src="<?php echo $url; ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'forest_title' ) && get_sub_field( 'forest_body' ) ): ?>
		<?php
		$background_image = get_sub_field( 'forest_background_image' );
		if( ! empty( $background_image ) ) {
			$background_url = $background_image['url'];
		} ?>
		<div class="forestImage-body" style="background-image: url(<?php echo $background_url; ?>)">
			<?php if ( get_sub_field( 'forest_title' ) ): ?>
				<h2 class="forestImage-title"><?php echo the_sub_field( 'forest_title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'forest_body' ) ): ?>
				<div class="forestImage-body">
					<?php the_sub_field( 'forest_body' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_sub_field( 'forest_social_icon' ) || get_sub_field( 'forest_link_text' ) ): ?>
				<div class="forestImage-social-icon">
					<?php if ( get_sub_field( 'forest_social_link' ) ): ?>
						<div class="forestImage-social-link">
							<a href="<?php the_sub_field( 'forest_social_link' ); ?>" target="_blank">
								<i class="fa fa-<?php the_sub_field( 'forest_social_icon' ); ?>" aria-hidden="true"></i>
								<?php the_sub_field( 'forest_link_text' ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>