<?php
$title_color = get_field( 'title_color' );
?>

<div class="smallModuleStats container">

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="smallModuleStats-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="smallModuleStats-body-title"
				    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="smallModuleStats-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>


	<?php if ( have_rows( 'text_block' ) ): ?>
		<div class="smallModuleStats-stats">
			<?php while ( have_rows( 'text_block' ) ) : the_row();
				if ( get_sub_field( 'text_color' ) ) {
					$text_color = get_sub_field( 'text_color' );
				} else {
					$text_color = '';
				}
				?>
				<?php if ( get_sub_field( 'text' ) ): ?>
					<div class="smallModuleStats-stats-item"
					     style="color: <?php echo $text_color; ?>"><?php echo the_sub_field( 'text' ); ?></div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

</div>

<?php $image = get_sub_field( 'image' );
if ( ! empty( $image ) && is_int( $image ) ) : ?>
	<div class="smallModuleStatsImage container">
		<img data-src="<?php echo wp_get_attachment_image_url($image, 'full_img_tablet'); ?>" class="lazyload"
         data-srcset="<?php echo wp_get_attachment_image_url($image, 'full_img_mobile_small'); ?> 480w,
             <?php echo wp_get_attachment_image_url($image, 'full_img_mobile_large'); ?> 760w,
             <?php echo wp_get_attachment_image_url($image, 'full_img_tablet'); ?> 990w,
             <?php echo wp_get_attachment_image_url($image, 'full_img_tablet'); ?> 1900w">
	</div>
<?php endif; ?>

