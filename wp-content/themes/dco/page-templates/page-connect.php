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
		}
		?>
		<div class="page-connected" style="background-image: <?php echo 'url(' .  $post_image_url . ')'; ?>">
            <?php the_content(); ?>
		</div>
	<?php endwhile;
endif; ?>

<?php get_footer('connect'); ?>
