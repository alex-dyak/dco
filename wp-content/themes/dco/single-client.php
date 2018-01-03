<?php

get_header(); ?>

<?php $image_id = get_field('background_image', 'option') ? get_field('background_image', 'option') : '' ; ?>
<?php if ( ! empty( $image_id ) && is_int( $image_id ) ) : ?>
	<div>
		<?php $background_image = wp_get_attachment_image_url( $image_id, 'full' ); ?>
	</div>
<?php endif; ?>

<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

		<div class="page-404" style="background-image: url(<?php echo $background_image; ?>); color: #ffffff">
			<div class="page-404-container">

				<h2 class="entry-title"><?php the_title(); ?></h2>

				<div class="entry-content">

					<?php wp_link_pages( array( 'before' => __( 'Pages: ', 'dco' ), 'next_or_number' => 'number' ) ); ?>

				</div>

			</div>
		</div>

	<?php endwhile;
endif; ?>



<?php get_footer('connect'); ?>