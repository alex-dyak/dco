<?php
$image = get_sub_field( 'image' );
if ( ! empty ( $image ) ):
	$url = $image['url'];
	$mobile_img   = $image['sizes'][ 'mobile_img' ];
	$plunshet_img = $image['sizes'][ 'plunshet_img' ];
	?>

	<div class="image-large-module-a">
		<img src="<?php echo $url; ?>" srcset="<?php echo $mobile_img; ?> 480w, <?php echo $plunshet_img; ?> 768w">
	</div>

<?php endif; ?>
