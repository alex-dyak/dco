<?php
/**
 * The template for displaying all project posts and attachments
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>



	<?php endwhile;
endif; ?>

<?php post_navigation(); ?>


<?php get_footer(); ?>
