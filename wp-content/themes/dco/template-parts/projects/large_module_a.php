<?php
$image          = get_sub_field( 'image' );
$select         = get_sub_field( 'select_place' );
$quote_title    = get_sub_field( 'pullquote_title' );
$quote_body     = get_sub_field( 'pullquote_body' );
$quote_body_size = get_sub_field( 'pullquote_size' );
$apply_parallax = get_sub_field( 'apply_parallax' );
$full_height = get_sub_field( 'full_height' );

$background_color            = get_field( 'background_color' );
$title_color                 = get_field( 'title_color' );


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
if ( ! empty( $image ) && is_int( $image ) ) : ?>

    <?php if ( $full_height ) {
        $full_height_class = 'js-fullHeight fullHeight';
    } else {
        $full_height_class = '';
    }
    ?>

	<div class="imageLargeModuleA <?php echo $full_height_class; ?>">
		<?php if ( $quote_title || $quote_body ) : ?>
            <?php $quote_body_size_class = "" ?>
            <?php if($quote_body_size): ?>
                <?php $quote_body_size_class = ' imageLargeModuleA-quote-inner--large' ?>
            <?php endif; ?>
			<div class="imageLargeModuleA-quote">
				<div class="imageLargeModuleA-quote-inner<?php echo $quote_body_size_class; ?> position-<?php echo $class_title; ?>"
					style="background: <?php echo $background_color; ?>">
					<?php if ( $quote_title ) : ?>
						<div class="imageLargeModuleA-quote-title"
						     <?php if ( $class_title == "middle_left" ) : ?>
							     style="color: <?php echo $title_color; ?>"
						     <?php endif; ?>>
							<?php echo $quote_title; ?>
						</div>
					<?php endif; ?>

					<?php if ( $quote_body ) : ?>
						<div class="imageLargeModuleA-quote-body">
							<?php echo $quote_body; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $apply_parallax ): ?>
			<div class="imageLargeModuleA-image imageLargeModuleA-image--parallax">
                <?php if ( $full_height ): ?>
                    <div class="lazyload parallaxImg"
                         data-bgset="<?php echo wp_get_attachment_image_url($image, 'full_height_img_desktop_large'); ?> 1900w"
                         data-sizes="auto"></div>
                <?php else: ?>
                    <div class="lazyload parallaxImg"
                         data-bgset="<?php echo wp_get_attachment_image_url($image, 'full_img_mobile_small'); ?> 480w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_img_mobile_large'); ?> 760w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_img_tablet'); ?> 990w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_img_desktop_small'); ?> 1200w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_img_desktop_medium'); ?> 1600w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_img_desktop_large'); ?> 1900w"
                         data-sizes="auto"></div>
                <?php endif; ?>
			</div>
		<?php else: ?>
			<div class="imageLargeModuleA-image">
                <?php if ( $full_height ): ?>
                    <div class="lazyload defaultFullHeightImage js-fullHeightDefault"
                         data-bgset="<?php echo wp_get_attachment_image_url($image, 'full_height_img_desktop_large'); ?> 1900w"
                         data-sizes="auto"></div>
                <?php else: ?>
                    <img data-src="<?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_large'); ?>" class="lazyload defaultImage" alt="<?php echo $quote_title; ?>"
                        data-srcset="<?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_mobile_small'); ?> 480w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_mobile_large'); ?> 760w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_tablet'); ?> 990w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_small'); ?> 1200w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_medium'); ?> 1600w,
                                     <?php echo wp_get_attachment_image_url($image, 'full_default_img_desktop_large'); ?> 1900w">
                <?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>
