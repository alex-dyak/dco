<div class="forestImage container">
	<?php $image = get_sub_field( 'image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="forestImage-image">
			<img src="<?php echo $url; ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'title' ) && get_sub_field( 'body' ) ): ?>
		<?php
		$background_image = get_sub_field( 'background_image' );
		if( ! empty( $background_image ) ) {
			$background_url = $background_image['url'];
		} ?>
		<div class="forestImage-body" style="background-image: url(<?php echo $background_url; ?>)">
			<?php if ( get_sub_field( 'title' ) ): ?>
				<h2 class="forestImage-title"><?php echo the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="forestImage-body">
					<?php the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_sub_field( 'social_icon' ) || get_sub_field( 'link_text' ) ): ?>
				<div class="forestImage-social-icon">
					<?php //if ( get_sub_field( 'link' ) ): ?>
						<div class="forestImage-social-link">
							<a href="<?php the_sub_field( 'link' ); ?>" target="_blank">
								<i class="fa fa-<?php the_sub_field( 'social_icon' ); ?>" aria-hidden="true"></i>
								<?php the_sub_field( 'link_text' ); ?>
							</a>
						</div>
					<?php// endif; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>