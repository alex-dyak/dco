<?php
/**
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
					$url                     = $image['url'];
					$full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
					$full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
					$full_img_tablet         = $image['sizes']['full_img_tablet'];
					$full_img_desktop_small  = $image['sizes']['full_img_desktop_small'];
					$full_img_desktop_medium = $image['sizes']['full_img_desktop_medium'];
					$full_img_desktop_large  = $image['sizes']['full_img_desktop_large'];
					?>

					<div class="imageClientPage">
						<img src="<?php echo $url; ?>" srcset="
				            <?php echo $full_img_mobile_small; ?> 480w,
				            <?php echo $full_img_mobile_large; ?> 768w,
				            <?php echo $full_img_tablet; ?> 992w,
				            <?php echo $full_img_desktop_small; ?> 1200w,
				            <?php echo $full_img_desktop_medium; ?> 1620w,
				            <?php echo $full_img_desktop_large; ?> 1920w">
						<?php if ($title) : ?>
							<div class="client_title">
								<?php echo $title; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif;
			}
			?>

			<?php if ( get_field( 'client_list_title' ) ) : ?>
				<h1 class="client-list-title"><?php the_field( 'client_list_title' ); ?></h1>
			<?php endif; ?>

			<?php
			$terms = get_terms('clients-category');
			if ( $terms ) : ?>
				<ul class="category-list">
					<a href="#"><li><?php _e( 'All', 'dco' ); ?></li></a>
				<?php foreach ( $terms as $term ) : ?>
					<a href="#"><li><?php echo $term->name; ?></li></a>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php
			$terms = get_terms( 'business-direction' );
			if ( $terms ) : ?>
				<ul class="business-direction-list">
					<?php foreach ( $terms as $term ) : ?>
						<li><?php echo $term->name; ?></li>
						<?php
						// Get Business direction items.
						$args = array(
							'numberposts'        => - 1,
							'business-direction' => $term->slug,
							'orderby'            => 'date',
							'order'              => 'DESC',
							'post_type'          => 'client',
						);
						$posts = get_posts( $args );

						foreach($posts as $post){
							setup_postdata($post);
							?>
							<a href="#">
								<p>
									<?php echo $post->post_title; ?>
								</p>
							</a>
							<?php
						}
						wp_reset_postdata();
						?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</article>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
