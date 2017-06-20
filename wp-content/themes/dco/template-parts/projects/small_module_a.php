<?php $title_color = get_field( 'title_color' ); ?>
<?php $blocks_revert = get_sub_field( 'blocks_reverse' );
if ( $blocks_revert ) {
	$block_revert_class = "imageSmallModuleA--reverse ";
} else {
	$block_revert_class = "";
}
?>


<div class="imageSmallModuleA <?php echo $block_revert_class; ?>container">
	<?php $image = get_sub_field( 'image' );
	if ( ! empty( $image ) && is_int( $image ) ) :
		$image = get_sub_field( 'image' );
		$size  = 'full_img_mobile_large';
		?>
		<div class="imageSmallModuleA-image">
			<?php echo wp_get_attachment_image( $image, $size ); ?>
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="imageSmallModuleA-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="imageSmallModuleA-body-title"
				    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="imageSmallModuleA-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>