<?php
/**
 * Template Name: Page - Client
 * The template for displaying Client page
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php
			// Display banner.
			$banners = array();
			$counter = 0;
			if ( have_rows( 'page_banner' ) ) {
				while ( have_rows( 'page_banner' ) ) {
					the_row();
					$banners[ $counter ]['title'][] = get_sub_field( 'image_title' );
					$banners[ $counter ]['image'][] = get_sub_field( 'image' );
					$counter ++;
				}
			}
			// Get random element from $banners
			$banner = array_rand( $banners );

			if ( $banners[ $banner ] ) {
				$title = $banners[ $banner ]['title'][0];
				$image = $banners[ $banner ]['image'][0];

				if ( ! empty ( $image ) ):
					$url = $image['url'];
					$full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
					$full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
					$full_img_tablet         = $image['sizes']['full_img_tablet'];
					$full_img_desktop_small  = $image['sizes']['full_img_desktop_small'];
					$full_img_desktop_medium = $image['sizes']['full_img_desktop_medium'];
					$full_img_desktop_large  = $image['sizes']['full_img_desktop_large'];
					?>

					<div class="imageClientPage">
						<div class="imageClientPage-image">
							<div class="lazyload parallaxImg"
							     data-bgset="<?php echo $full_img_mobile_small; ?> 480w,
                                            <?php echo $full_img_mobile_large; ?> 768w,
                                            <?php echo $full_img_tablet; ?> 992w,
                                            <?php echo $full_img_desktop_small; ?> 1200w,
                                            <?php echo $full_img_desktop_medium; ?> 1620w,
                                            <?php echo $full_img_desktop_large; ?> 1920w"
							     data-sizes="auto"></div>

							<img src="<?php echo $url; ?>" srcset="
				            <?php echo $full_img_mobile_small; ?> 480w,
				            <?php echo $full_img_mobile_large; ?> 768w,
				            <?php echo $full_img_tablet; ?> 992w">
						</div>

						<?php if ( $title ) : ?>
							<div class="imageClientPage-title"><?php echo $title; ?></div>
						<?php endif; ?>
					</div>
				<?php endif;
			}
			?>

			<?php if ( get_field( 'filter_area' ) ) : ?>
				<div class="clientPage container">
					<a href="#lightbox"><?php echo get_field( 'filter_area' ); ?></a>
				</div>
			<?php endif; ?>

<!-- Clients Lightbox -->
			<div id="lightbox">
				<?php
				// Slider speed value. Could be changed from admin panel.
				$speed = get_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' ) : 6000;
				?>

				<div class="clientsLightbox container">
					<?php $images = get_field( 'slider' );
					if ( $images ): ?>
						<div class="clientsLightbox-slider">
							<div class="moduleSlider js-moduleSlider" data-speed="<?php echo $speed; ?>">
								<?php foreach ( $images as $image ): ?>
									<div>
										<img src="<?php echo $image['sizes']['module_slider']; ?>"
											alt="<?php echo $image['alt']; ?>"/>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( get_field( 'title' ) ): ?>
						<div class="clientsLightbox-body">
							<?php if ( get_sub_field( 'title' ) ): ?>
								<h2 class="clientsLightbox-title"
								    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'title' ); ?></h2>
							<?php endif; ?>

							<?php if ( get_sub_field( 'text_first_column' ) ): ?>
								<div class="clientsLightbox-text-first-column">
									<?php echo the_sub_field( 'text_first_column' ); ?>
								</div>
							<?php endif; ?>
							<?php if ( get_sub_field( 'text_second_column' ) ): ?>
								<div class="clientsLightbox-text-second-column">
									<?php echo the_sub_field( 'text_second_column' ); ?>
								</div>
							<?php endif; ?>
							<?php if ( get_sub_field( 'text_third_column' ) ): ?>
								<div class="clientsLightbox-text-third-column">
									<?php echo the_sub_field( 'text_third_column' ); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div><!-- END Clients Lightbox -->
		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
