<?php
/**
 * Template Name: Page - Connect
 * The template for displaying Let's Connect page
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
        <?php
		if( has_post_thumbnail() ){
			$post_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
		} else {
			$post_image_url = '';
        }
		?>
		<div class="page-connected" style="background-image: <?php echo 'url(' .  $post_image_url . ')'; ?>">
            <div class="page-connected-inner">
                <?php the_content(); ?>
            </div>
			<div class="social-links">
				<div class="follow-us"><?php _e('Follow Us', 'dco' ); ?></div>
				<?php
                if ( get_field( 'social_network', 'option' ) ) {
                  $social_links = get_field( 'social_network', 'option' );
                  foreach ( $social_links as $social_link ) { ?>
					  <a href="<?php echo $social_link['social_link']; ?>" target="_blank">
						  <?php echo $social_link['social_icon']; ?>
					  </a>
                    <?php
                  }
                }
				?>
			</div>
		</div>
	<?php endwhile;
endif; ?>

<?php get_footer('connect'); ?>
