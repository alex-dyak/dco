<?php
/**
 * The template for displaying Client page
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php
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

			if ( $banners[ $banners ] ) {
				$title = $banners[ $banners ]['title'];
				$image = $banners[ $banners ]['image'];

			if ( ! empty ( $image ) ):
				$url                     = $image['url'];
				$full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
				$full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
				$full_img_tablet         = $image['sizes']['full_img_tablet'];
				$full_img_desktop_small  = $image['sizes']['full_img_desktop_small'];
				$full_img_desktop_medium = $image['sizes']['full_img_desktop_medium'];
				$full_img_desktop_large  = $image['sizes']['full_img_desktop_large'];
				?>

				<div class="imageClientPage">
					<?php if ($quote_title) : ?>
						<div class="quote_title-<?php echo $class_tilte; ?>" style="color: <?php echo $title_color; ?>">
							<?php echo $quote_title; ?>
						</div>
					<?php endif; ?>

					<img src="<?php echo $url; ?>" srcset="
			            <?php echo $full_img_mobile_small; ?> 480w,
			            <?php echo $full_img_mobile_large; ?> 768w,
			            <?php echo $full_img_tablet; ?> 992w,
			            <?php echo $full_img_desktop_small; ?> 1200w,
			            <?php echo $full_img_desktop_medium; ?> 1620w,
			            <?php echo $full_img_desktop_large; ?> 1920w">
				</div>

			<?php endif;

			}
			?>

		</article>


	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
