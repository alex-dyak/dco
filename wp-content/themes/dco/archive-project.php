<?php
/**
 * The template for displaying all project posts and attachments
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

get_header(); ?>

<?php
$counter = 0;
?>
<div class="landing">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$counter ++;
			if( $counter%2 != 0 ) {
				$class = 'left';
			} else {
				$class = 'right';
			}
			if ( get_field( 'background_color' ) ) {
				$project_color = get_field( 'background_color' );
			}
			?>

			<?php
				$image = get_field( 'landing_image' );
			if ( ! empty ( $image ) ) {
				$url = $image['url'];
				$full_img_mobile_small = $image['sizes']['full_img_mobile_small'];
				$full_img_mobile_large = $image['sizes']['full_img_mobile_large'];
				$full_img_tablet = $image['sizes']['full_img_tablet'];
				$full_img_desktop_small = $image['sizes']['full_img_desktop_small'];
				$full_img_desktop_large = $image['sizes']['full_img_desktop_large'];
			}
			?>

			<?php if( get_field( 'landing_image' ) ) : ?>
				<a href="<?php the_permalink(); ?>" class="landing-block">
					<div class="landing-title <?php echo $class; ?>"  style="background-color: <?php echo $project_color; ?>"><strong><?php the_title(); ?></strong></div>
					<div class="landing-image">
						<img src="<?php echo $url; ?>" srcset="
							<?php echo $full_img_mobile_small; ?> 480w,
							<?php echo $full_img_mobile_large; ?> 768w,
							<?php echo $full_img_tablet; ?> 992w,
							<?php echo $full_img_desktop_small; ?> 1200w,
							<?php echo $full_img_desktop_large; ?> 1920w">
					</div>
				</a>
			<?php endif; ?>

		<?php endwhile;
	endif; ?>
</div>


<?php get_footer(); ?>
