<?php
/**
 * Homepage page slider template.
 */
?>

<?php
// Slider speed value. Could be changed from admin panel.
?>
<?php if ( $slider ): ?>
    <div class="homepageSliderWrap js-homepage-sliderWrapp">
        <div class="homepageSlider js-homepage-slider"
             data-speed="<?php echo $speed; ?>">

			<?php foreach ($slider as $item ) : ?>
                <div class="homepageSlider-slide">

                    <!-- if user comes for a first time -->
					<?php if ( ! empty($item['video_url']) && !empty($item['video_poster']) ): ?>
                        <div class="homepageSlider-slide-title homepageSlider-slide-title--video"><?php echo $title; ?></div>
                        <div class="homepageSlider-slide-video heroVideo">
                            <div class="heroVideo-video">
                                <video loop class="js-heroVideo" poster="<?php echo $item['video_poster']['url']; ?>">
                                    <source
                                            src="<?php echo $item['video_url']; ?>">
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
					<?php endif; ?>
                    <!-- end if user comes for a first time -->

                    <!-- if user comes for a second time -->
					<?php if ( !empty($item['image']) ): ?>
                        <div class="homepageSlider-slide-title"><?php echo $title; ?></div>
                        <div class="homepageSlider-slide-img lazyload"
                             data-bgset="<?php echo wp_get_attachment_image_url( $item['image'][0], 'homepage_slider_full_large' ) ?> 1900w,
                                         <?php echo wp_get_attachment_image_url( $item['image'][0], 'homepage_slider_full' ) ?> 1600w,
                                         <?php echo wp_get_attachment_image_url( $item['image'][0], 'homepage_slider_full' ) ?> 1200w"
                             data-sizes="auto">
                        </div>
					<?php endif; ?>
                    <!-- end if user comes for a second time -->

                    <!-- this shows each time user comes -->
					<?php if ( !empty($item['title_extension']) ) : ?>
                        <div class="homepageSlider-slide-description homepageSliderCaption"
                             style="background-color: <?php echo $item['background_color']; ?>" >

                            <!-- First Overlay -->
                            <div class="firstOverlay js-firstOverlay">
                                <div class="homepageSliderCaption-inner">

                                    <div class="homepageSliderCaption-inner-title" style="color: <?php echo $item['title_color']; ?>"><?php echo $item['title_extension']; ?></div>

									<?php if ( !empty($item['teaser']) ) : ?>
                                        <div class="homepageSliderCaption-inner-text" style="color: <?php echo $item['text_color']; ?>">
                                            <p><?php echo $item['teaser']; ?></p>
											<?php if ( $item['link_text'] ) : ?>
                                                <a href="<?php $item['link_url']; ?>" style="color: <?php echo $item['text_color']; ?>"><?php echo $item['link_text']; ?></a>
											<?php endif; ?>
                                        </div>
									<?php endif; ?>
                                </div>

								<?php if($item['teaser_full_height_list']): ?>
                                    <div class="homepageSliderCaption-fullList" style="color: <?php echo $item['text_color']; ?>">
										<?php echo $item['teaser_full_height_list']; ?>
                                    </div>
								<?php endif; ?>
                            </div>
                            <!-- End First Overlay -->

                            <!-- Second Overlay -->
							<?php if(!empty($item['overlay_2'])): ?>
                                <div class="secondOverlay">
									<?php echo $item['overlay_2']; ?>
                                </div>
							<?php endif; ?>
                            <!-- End Second Overlay -->

                        </div>
					<?php endif; ?>
                    <!-- end this shows each time user comes -->

                </div>
			<?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>