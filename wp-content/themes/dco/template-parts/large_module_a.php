<?php
$image       = get_sub_field( 'image' );
$select      = get_sub_field( 'select_place' );
$quote_title = get_sub_field( 'pullquote_title' );
$quote_body  = get_sub_field( 'pullquote_body' );

$background_color = get_field( 'background_color' );
$title_color      = get_field( 'title_color' );

switch ( $select ) {
	case 'none':
		$class_tilte = 'none';
		$class_body  = 'none';
		break;
	case 'top_right':
		$class_tilte = 'top_right';
		$class_body  = 'top_right';
		break;
	case 'middle_left':
		$class_tilte = 'middle_left';
		$class_body  = 'middle_left';
		break;
	case 'bottom_right':
		$class_tilte = 'bottom_right';
		$class_body  = 'bottom_right';
		break;
	default:
		$class_tilte = '';
		$class_body  = '';
}
if ( ! empty ( $image ) ):
	$url                     = $image['url'];
	$full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
	$full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
	$full_img_tablet         = $image['sizes']['full_img_tablet'];
	$full_img_desktop_small  = $image['sizes']['full_img_desktop_small'];
	$full_img_desktop_medium = $image['sizes']['full_img_desktop_medium'];
	$full_img_desktop_large  = $image['sizes']['full_img_desktop_large'];
	?>

	<div class="image-large-module-a">
		<div class="quote_title-<?php echo $class_tilte; ?>" style="color: <?php echo $title_color; ?>">
			<?php echo $quote_title; ?>
		</div>
		<div class="quote_body-<?php echo $class_body; ?>" style="background: <?php echo $background_color; ?>">
			<?php echo $quote_body; ?>
		</div>
		<img src="<?php echo $url; ?>" srcset="
            <?php echo $full_img_mobile_small; ?> 480w,
            <?php echo $full_img_mobile_large; ?> 768w,
            <?php echo $full_img_tablet; ?> 992w,
            <?php echo $full_img_desktop_small; ?> 1200w,
            <?php echo $full_img_desktop_medium; ?> 1620w,
            <?php echo $full_img_desktop_large; ?> 1920w">
	</div>

<?php endif; ?>
