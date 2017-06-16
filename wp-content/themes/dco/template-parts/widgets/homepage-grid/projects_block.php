<div class="project js-testimonialsSlider">
	<?php if ( have_rows( 'project' ) ): ?>
		<?php while ( have_rows( 'project' ) ) : the_row();
			if ( get_sub_field( 'project_background_color' ) ) {
				$background_color = get_sub_field( 'project_background_color' );
				$title_color      = get_sub_field( 'project_title_color' );
				$body_color       = get_sub_field( 'project_body_color' );
			} else {
				$background_color = '';
				$title_color      = '';
				$body_color       = '';
			}
			?>

			<div class="project container">
				<?php $image = get_sub_field( 'project_image' );
				if ( ! empty( $image ) && is_int( $image ) ) : ?>
					<div class="project-image">
						<?php
						printf( '<img src="%s" srcset="%s">',
							wp_get_attachment_image_url( $image ),
							wp_get_attachment_image_srcset( $image, 'middle' )
						);
						?>
					</div>
				<?php endif; ?>

				<?php if ( get_sub_field( 'project_title' ) && get_sub_field( 'project_body' ) ): ?>
					<div class="project-body"
					     style="background-color: <?php echo $background_color; ?>">
						<?php if ( get_sub_field( 'project_title' ) ): ?>
							<h2 class="project-title" style=" color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'project_title' ); ?></h2>
						<?php endif; ?>

						<?php if ( get_sub_field( 'project_body' ) ): ?>
							<div class="project-body" style=" color: <?php echo $body_color; ?>">
								<?php echo the_sub_field( 'project_body' ); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</div>
