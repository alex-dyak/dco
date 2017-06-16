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
	if ( ! empty( $image ) && is_int( $image ) ) : ?>
		<div class="imageSmallModuleA-box">
			<div class="imageSmallModuleA-box-inner">
				<div class="imageSmallModuleA-box-img">
					<?php echo wp_get_attachment_image( $image ); ?>
				</div>
				<div class="imageSmallModuleA-box-text">
					<?php if ( have_rows( 'beside_image_text' ) ): ?>
						<?php while ( have_rows( 'beside_image_text' ) ) : the_row();
							if ( get_sub_field( 'text_color' ) ) {
								$text_color = get_sub_field( 'text_color' );
							} else {
								$text_color = '';
							}
							?>
							<?php if ( get_sub_field( 'text' ) ): ?>
								<span
									style="color: <?php echo $text_color; ?>"><?php echo the_sub_field( 'text' ); ?></span>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>

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