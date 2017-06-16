<?php
/**
 * Homepage page slider template.
 */
?>

<?php
// Slider speed value. Could be changed from admin panel.
$speed = get_sub_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' )
	: 6000;
$title = get_sub_field( 'title' ) ? get_sub_field( 'title' ) : '';
?>

<?php if ( have_rows( 'slider_content' ) ): ?>
	<div class="homepage-slider-holder">
		<div class="homepage-slider js-homepage-slider"
		     data-speed="<?php echo $speed; ?>">

			<?php while (have_rows( 'slider_content' )) :
				the_row(); ?>
				<?php
				$background_color = get_sub_field( 'background_color' )
					? get_sub_field( 'background_color' ) : '';
				$link_url         = get_sub_field( 'link_url' )
					? get_sub_field( 'link_url' ) : '#';
				$title_extension  = get_sub_field( 'title_extension' )
					? get_sub_field( 'title_extension' ) : '';
				$teaser           = get_sub_field( 'teaser' )
					? get_sub_field( 'teaser' ) : '';
				$link_text        = get_sub_field( 'link_text' )
					? get_sub_field( 'link_text' ) : '';

				if ( have_rows( 'image_or_video' ) ) : ?>
				<?php while ( have_rows( 'image_or_video' ) ) :
					the_row();
					if ( get_row_layout() == 'image_layout' ) {
					$image = get_sub_field( 'image' );
					if ( ! empty ( $image ) ):
					$url = $image['url'];
					?>
					<div class="slider-item">
						<?php echo $title; ?>
						<img src="<?php echo $url; ?>">
						<?php endif; ?>
						<?php
						}
						if ( get_row_layout() == 'video_layout' ) {
						$video = get_sub_field( 'video' );
						if ( ! empty ( $video ) ):
						$url = $video['url'];
						?>
						<div class="slider-item">
							<?php // echo $title; ?>
							<div
								class="videoLargeModuleB-video videoBox js-videoBox">
								<div class="videoBox-video js-video">
									<video width="100%" loop>
										<source
											src="<?php echo $url; ?>">
									</video>
								</div>
							</div>
							<?php endif;
							}
							if ( $title_extension ) : ?>
								<div
									style="background-color: <?php echo $background_color; ?>">

									<p><?php echo $title_extension; ?></p>

									<?php if ( $teaser ) : ?>
										<p><?php echo $teaser; ?></p>
									<?php endif; ?>

									<?php if ( $link_text ) : ?>
										<p>
											<a href="<?php $link_url; ?>"><?php echo $link_text; ?></a>
										</p>
									<?php endif; ?>

								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>