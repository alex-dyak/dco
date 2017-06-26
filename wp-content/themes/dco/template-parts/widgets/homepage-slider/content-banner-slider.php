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
	<div class="homepageSliderWrap">
		<div class="homepageSlider js-homepage-slider"
		     data-speed="<?php echo $speed; ?>">

			<?php while (have_rows( 'slider_content' )) :
				the_row(); ?>
            <div class="homepageSlider-slide">
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
					if ( ! empty( $image ) && is_int( $image ) ) : ?>

                        <div class="homepageSlider-slide-title"><h1><?php echo $title; ?></h1></div>
						<div class="homepageSlider-slide-img">
                              <?php
                            printf( '<img src="%s" srcset="%s">',
                                wp_get_attachment_image_url( $image ),
                                wp_get_attachment_image_srcset( $image, 'full' )
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                      						<?php
						}
						if ( get_row_layout() == 'video_layout' ) {
						$video = get_sub_field( 'video' );
						if ( ! empty ( $video ) ):
						$url = $video['url'];
						?>
							<?php // echo $title; ?>
							<div
								class="videoLargeModuleB-video videoBox">
								<div class="videoBox-video">
									<video height="568px" loop>
										<source
											src="<?php echo $url; ?>">
									</video>
								</div>
							</div>
							<?php endif;
							}
							if ( $title_extension ) : ?>
								<div class="homepageSlider-slide-description homepageSliderCaption"
									style="background-color: <?php echo $background_color; ?>" >

                                    <div class="homepageSliderCaption-inner">

									<div class="homepageSliderCaption-inner-title"><?php echo $title_extension; ?></div>

									<?php if ( $teaser ) : ?>
										<div class="homepageSliderCaption-inner-text">
                                            <p><?php echo $teaser; ?></p>
                                          <?php if ( $link_text ) : ?>
                                              <a href="<?php $link_url; ?>"><?php echo $link_text; ?></a>
                                          <?php endif; ?>
                                        </div>
									<?php endif; ?>

                                    </div>

								</div>
							<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
                </div>
			<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>