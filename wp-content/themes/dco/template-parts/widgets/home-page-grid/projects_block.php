<div class="project js-testimonialsSlider">
	<?php if ( have_rows( 'project' ) ): ?>
		<?php while ( have_rows( 'project' ) ) : the_row();
			if ( get_sub_field( 'project_background_color' ) ) {
				$background_color = get_sub_field( 'project_background_color' );
			} else {
				$background_color = '';
			}
			?>

			<div class="project container">
				<?php $image = get_sub_field( 'project_image' );
				if ( ! empty ( $image ) ):
					$url = $image['url'];
					?>
					<div class="project-image">
						<img src="<?php echo $url; ?>">
					</div>
				<?php endif; ?>

				<?php if ( get_sub_field( 'project_title' ) && get_sub_field( 'project_body' ) ): ?>
					<div class="project-body"
					     style="background-color: <?php echo $background_color; ?>">
						<?php if ( get_sub_field( 'project_title' ) ): ?>
							<h2 class="project-title"><?php echo the_sub_field( 'project_title' ); ?></h2>
						<?php endif; ?>

						<?php if ( get_sub_field( 'project_body' ) ): ?>
							<div class="project-body">
								<?php echo the_sub_field( 'project_body' ); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</div>
