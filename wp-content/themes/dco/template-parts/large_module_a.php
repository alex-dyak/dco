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
	$url = $image['url'];
	$mobile_img   = $image['sizes'][ 'mobile_img' ];
	$plunshet_img = $image['sizes'][ 'plunshet_img' ];
	?>

	<div class="image-large-module-a">
		<div class="quote_title-<?php echo $class_tilte; ?>" style="color: <?php echo $title_color; ?>">
			<?php echo $quote_title; ?>
		</div>
		<div class="quote_body-<?php echo $class_body; ?>" style="background: <?php echo $background_color; ?>">
			<?php echo $quote_body; ?>
		</div>
		<img src="<?php echo $url; ?>" srcset="<?php echo $mobile_img; ?> 480w, <?php echo $plunshet_img; ?> 768w">
	</div>

<?php endif; ?>
