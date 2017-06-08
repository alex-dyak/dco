<?php
$image       = get_sub_field( 'image' );
$select      = get_sub_field( 'select_place' );
$quote_title = get_sub_field( 'pullquote_title' );
$quote_body  = get_sub_field( 'pullquote_body' );

$background_color = get_field( 'background_color' );
$title_color      = get_field( 'title_color' );

switch ( $select ) {
	case 'none':
		$class_title = 'none';
		$class_body  = 'none';
		break;
	case 'top_right':
		$class_title = 'top_right';
		$class_body  = 'top_right';
		break;
	case 'middle_left':
		$class_title = 'middle_left';
		$class_body  = 'middle_left';
		break;
	case 'bottom_right':
		$class_title = 'bottom_right';
		$class_body  = 'bottom_right';
		break;
	default:
		$class_title = '';
		$class_body  = '';
}
if ( ! empty ( $image ) ):
        $url                     = $image['url'];
        $full_img_mobile_small   = $image['sizes']['full_img_mobile_small'];
        $full_img_mobile_large   = $image['sizes']['full_img_mobile_large'];
        $full_img_tablet         = $image['sizes']['full_img_tablet'];
	?>

	<div class="imageLargeModuleA">
        <?php if ($quote_title || $quote_body) : ?>
            <div class="imageLargeModuleA-quote">
                <div class="imageLargeModuleA-quote-inner position-<?php echo $class_title; ?>" style="background: <?php echo $background_color; ?>">
                    <?php if ($quote_title) : ?>
                        <div class="imageLargeModuleA-quote-title"
                          <?php if($class_title == "middle_left"): ?>style="color: <?php echo $title_color; ?>"<?php endif; ?>><?php echo $quote_title; ?></div>
                    <?php endif; ?>

                    <?php if ($quote_body) : ?>
                        <div class="imageLargeModuleA-quote-body">
                            <?php echo $quote_body; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="parallaxImg" data-parallax="scroll" data-image-src="<?php echo $url; ?>"></div>
        <img src="<?php echo $url; ?>" srcset="
            <?php echo $full_img_mobile_small; ?> 480w,
            <?php echo $full_img_mobile_large; ?> 768w,
            <?php echo $full_img_tablet; ?> 992w">
	</div>

<?php endif; ?>
