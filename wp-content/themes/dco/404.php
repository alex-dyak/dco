<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

get_header(); ?>

<?php $image_id = get_field('background_image', 'option') ? get_field('background_image', 'option') : '' ; ?>
<?php if ( ! empty( $image_id ) && is_int( $image_id ) ) : ?>
	<div>
		<?php $background_image = wp_get_attachment_image_url( $image_id, 'full' ); ?>
	</div>
<?php endif; ?>

<div class="page-404" style="background-image: url(<?php echo $background_image; ?>); color: #ffffff">
	<div class="page-404-container">
		<h2><?php esc_html_e( '404' ); ?></h2>
		<?php
		if ( get_field('text_before_page_name', 'option') ) {
			$text_before_page_name = get_field('text_before_page_name', 'option');
		}
		if ( get_field('text_after_page_name', 'option') ) {
			$text_after_page_name = get_field('text_after_page_name', 'option');
		}

		echo $text_before_page_name . ' "/' . $name . '" ' . $text_after_page_name;
		?>
	</div>
</div>
