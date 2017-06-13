<!-- Careers block template-->
<div class="careers-block">
	<h2><?php the_sub_field( 'title' ); ?></h2>
	<?php the_sub_field( 'description' ); ?>

	<!-- Background image -->
	<?php $image_id = get_sub_field( 'form_background' ); ?>
	<?php if( $image_id && is_numeric( $image_id ) ): ?>
		<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
	<?php endif; ?>
	<!-- End Background image -->

	<!-- CF7 block -->
	<?php if ( get_sub_field( 'form' ) && is_numeric( get_sub_field( 'form' ) ) ) : ?>
		<?php
		$post      = get_post( get_sub_field( 'form' ) );
		$post      = WPCF7_ContactForm::get_instance( $post );
		$shortcode = $post->shortcode();

		if ( $shortcode ) {
			echo do_shortcode( $shortcode );
		}
		?>
	<?php endif; ?>
	<!-- End CF7 block -->

</div>
