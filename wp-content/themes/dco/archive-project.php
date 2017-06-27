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
			if ( ! empty( $image ) && is_int( $image ) ) : ?>
				<a href="<?php the_permalink(); ?>" class="landing-block">
					<div class="landing-title <?php echo $class; ?>"  style="background-color: <?php echo $project_color; ?>"><strong><?php the_title(); ?></strong></div>
					<div class="landing-image">
						<?php
						printf( '<img data-src="%s" data-srcset="%s" class="lazyload">',
							wp_get_attachment_image_url( $image ),
							wp_get_attachment_image_srcset( $image, 'full' )
						);
						?>
					</div>
				</a>
			<?php endif; ?>

		<?php endwhile;
	endif; ?>
</div>


<?php get_footer(); ?>
