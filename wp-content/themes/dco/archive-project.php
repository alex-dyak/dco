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

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$counter ++;
		if( $counter%2 != 0 ) {
			$class = 'left';
		} else {
			$class = 'right';
		}
		if ( get_field( 'project_color' ) ) {
			$project_color = get_field( 'project_color' );
		}
		?>
		<?php if( get_field( 'landing_image' ) ) : ?>
			<div class="landing-title-<?php echo $class; ?>"><?php the_title(); ?></div>
			<div class="image-landing" style="background-color: <?php echo $project_color; ?>">
				<img src="<?php echo get_field( 'landing_image' ); ?>"/>
			</div>
			<?php endif; ?>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
