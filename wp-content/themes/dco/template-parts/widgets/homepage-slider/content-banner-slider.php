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
	<div class="homepageSliderWrap js-homepage-sliderWrapp">
		<div class="homepageSlider js-homepage-slider"
		     data-speed="<?php echo $speed; ?>">

			<?php while (have_rows( 'slider_content' )) :
				the_row(); ?>
            <div class="homepageSlider-slide">
				<?php
				$background_color = get_sub_field( 'background_color' )
					? get_sub_field( 'background_color' ) : '';
                $title_color = get_sub_field( 'title_color' )
                  ? get_sub_field( 'title_color' ) : '';
                $text_color = get_sub_field( 'text_color' )
                  ? get_sub_field( 'text_color' ) : '';
				$link_url         = get_sub_field( 'link_url' )
					? get_sub_field( 'link_url' ) : '#';
				$title_extension  = get_sub_field( 'title_extension' )
					? get_sub_field( 'title_extension' ) : '';
				$teaser           = get_sub_field( 'teaser' )
					? get_sub_field( 'teaser' ) : '';
                $teaser_full_height_list = get_sub_field( 'teaser_full_height_list' )
                  ? get_sub_field( 'teaser_full_height_list' ) : '';
				$link_text        = get_sub_field( 'link_text' )
					? get_sub_field( 'link_text' ) : '';

				if ( have_rows( 'image_or_video' ) ) : ?>
				<?php while ( have_rows( 'image_or_video' ) ) :
					the_row();
					if ( get_row_layout() == 'image_layout' ) {
					$image = get_sub_field( 'image' );
					if ( ! empty( $image ) && is_int( $image ) ) : ?>

                        <div class="homepageSlider-slide-title"><?php echo $title; ?></div>
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
						$video_poster = get_sub_field( 'video_poster' );
						if ( ! empty ( $video ) ):
						$url = $video['url'];
						?>
                            <div class="homepageSlider-slide-title homepageSlider-slide-title--video"><?php echo $title; ?></div>
							<div class="homepageSlider-slide-video heroVideo">
								<div class="heroVideo-video">
									<video loop class="js-heroVideo" poster="<?php echo $video_poster['url'] ?>">
										<source
											src="<?php echo $url; ?>">
									</video>
                                    <ul class="heroVideo-video-controls js-videoControls" style="display: none">
                                        <li>
                                            <button type="button" class="js-videoPause"><i class="fa fa-pause" aria-hidden="true"></i></button>
                                            <button type="button" class="js-videoPlay" style="display: none"><i class="fa fa-play" aria-hidden="true"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" class="js-videoMute"><i class="fa fa-volume-off" aria-hidden="true"></i></button>
                                            <button type="button" class="js-videoSound" style="display: none"><i class="fa fa-volume-up" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>
								</div>
							</div>
							<?php endif;
							}
							if ( $title_extension ) : ?>
								<div class="homepageSlider-slide-description homepageSliderCaption"
									style="background-color: <?php echo $background_color; ?>" >

                                    <div class="homepageSliderCaption-inner">

									<div class="homepageSliderCaption-inner-title" style="color: <?php echo $title_color; ?>"><?php echo $title_extension; ?></div>

									<?php if ( $teaser ) : ?>
										<div class="homepageSliderCaption-inner-text" style="color: <?php echo $text_color; ?>">
                                            <p><?php echo $teaser; ?></p>
                                          <?php if ( $link_text ) : ?>
                                              <a href="<?php $link_url; ?>" style="color: <?php echo $text_color; ?>"><?php echo $link_text; ?></a>
                                          <?php endif; ?>
                                        </div>
									<?php endif; ?>
                                    </div>

                                    <?php if($teaser_full_height_list): ?>
                                        <div class="homepageSliderCaption-fullList" style="color: <?php echo $text_color; ?>">
                                            <?php echo $teaser_full_height_list; ?>
                                        </div>
                                    <?php endif; ?>

								</div>
							<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
                </div>
			<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>
