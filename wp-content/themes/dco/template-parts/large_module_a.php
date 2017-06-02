<?php
$image = get_sub_field( 'image' );
if ( ! empty ( $image ) ):
        $url = $image['url'];
        $full_img_mobile_small = $image['sizes'][ 'full_img_mobile_small' ];
        $full_img_mobile_large = $image['sizes'][ 'full_img_mobile_large' ];
        $full_img_tablet = $image['sizes'][ 'full_img_tablet' ];
        $full_img_desktop_small = $image['sizes'][ 'full_img_desktop_small' ];
        $full_img_desktop_medium = $image['sizes'][ 'full_img_desktop_medium' ];
        $full_img_desktop_large = $image['sizes'][ 'full_img_desktop_large' ];
	?>

	<div class="image-large-module-a">
		<img src="<?php echo $url; ?>" srcset="
            <?php echo $full_img_mobile_small; ?> 480w,
            <?php echo $full_img_mobile_large; ?> 768w,
            <?php echo $full_img_tablet; ?> 992w,
            <?php echo $full_img_desktop_small; ?> 1200w,
            <?php echo $full_img_desktop_medium; ?> 1620w,
            <?php echo $full_img_desktop_large; ?> 1920w">
	</div>

<?php endif; ?>
