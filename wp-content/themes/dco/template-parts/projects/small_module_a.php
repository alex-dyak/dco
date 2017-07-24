<?php $title_color = get_field( 'title_color' ); ?>
<?php $blocks_revert = get_sub_field( 'blocks_reverse' );
if ( $blocks_revert ) {
	$block_revert_class = "imageSmallModuleA--reverse ";
} else {
	$block_revert_class = "";
}

if ( get_sub_field( 'header' ) ) {
  $block_title = get_sub_field( 'header' );
}
else {
  $block_title = "";
}
?>

<div class="imageSmallModuleA <?php echo $block_revert_class; ?>container">
	<?php $image = get_sub_field( 'image' );
	if ( ! empty( $image ) && is_int( $image ) ) :
		$image = get_sub_field( 'image' );
		$size  = 'module_img';
		?>
		<div class="imageSmallModuleA-image">
      <img src="<?php echo wp_get_attachment_image_url($image, 'module_img'); ?>" alt="<?php echo $block_title; ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="imageSmallModuleA-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="imageSmallModuleA-body-title"
				    style="color: <?php echo $title_color; ?>"><?php the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="imageSmallModuleA-body-description">
					<?php the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>
