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
	if ( ! empty ( $image ) ):
		$url                     = $image['url'];
		$full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
		$full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
		$full_img_tablet         = $image['sizes']['full_img_tablet'];
		$full_img_desktop_small  = $image['sizes']['full_img_desktop_small'];
		$full_img_desktop_medium = $image['sizes']['full_img_desktop_medium'];
		$full_img_desktop_large  = $image['sizes']['full_img_desktop_large'];
	?>
    <div class="smallModuleStatsImage container">
        <img src="<?php echo $url; ?>" srcset="
                    <?php echo $full_img_mobile_small; ?> 480w,
                    <?php echo $full_img_mobile_large; ?> 768w,
                    <?php echo $full_img_tablet; ?> 992w,
                    <?php echo $full_img_desktop_small; ?> 1200w,
                    <?php echo $full_img_desktop_medium; ?> 1620w,
                    <?php echo $full_img_desktop_large; ?> 1920w">
    </div>
<?php endif; ?>

