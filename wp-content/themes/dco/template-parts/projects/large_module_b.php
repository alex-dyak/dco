<?php
$video        = get_sub_field( 'video' );
$video_poster = get_sub_field( 'video_poster' );
$select       = get_sub_field( 'select_place' );
$quote_title  = get_sub_field( 'pullquote_title' );
$quote_body   = get_sub_field( 'pullquote_body' );
$quote_author = get_sub_field( 'pullquote_author' );

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

if ( ! empty ( $video_poster ) ) {
	$url                     = $video_poster['url'];
	$full_img_mobile_small   = $video_poster['sizes']['full_img_mobile_small'];
	$full_img_mobile_large   = $video_poster['sizes']['full_img_mobile_large'];
	$full_img_tablet         = $video_poster['sizes']['full_img_tablet'];
	$full_img_desktop_small  = $video_poster['sizes']['full_img_desktop_small'];
	$full_img_desktop_medium = $video_poster['sizes']['full_img_desktop_medium'];
	$full_img_desktop_large  = $video_poster['sizes']['full_img_desktop_large'];
}
?>

<div class="videoLargeModuleB">
	<?php if ( $quote_title || $quote_body ) : ?>
        <div class="videoLargeModuleB-quote location-<?php echo $class_title; ?>">
            <div class="videoLargeModuleB-quote-inner position-<?php echo $class_title; ?>"
                 style="background: <?php echo $background_color; ?>">
				<?php if ( $quote_title ) : ?>
                    <div class="videoLargeModuleB-quote-title"
					     <?php if ( $class_title == "middle_left" ): ?>style="color: <?php echo $title_color; ?>"<?php endif; ?>><?php echo $quote_title; ?></div>
				<?php endif; ?>

				<?php if ( $quote_body ) : ?>
                    <div class="videoLargeModuleB-quote-body">
						<?php echo $quote_body; ?>
                    </div>
				<?php endif; ?>

				<?php if ( $quote_author ) : ?>
                    <div class="videoLargeModuleB-quote-author"><?php echo $quote_author; ?></div>
				<?php endif; ?>
            </div>
        </div>
	<?php endif; ?>


	<?php if ( ! empty ( $video ) ):
		$url = $video['url']; ?>
        <div class="videoLargeModuleB-video videoBox js-videoBox">
            <div class="videoBox-poster lazyload js-videoPoster"
                 data-bgset="<?php echo $full_img_mobile_small; ?> 480w,
                    <?php echo $full_img_mobile_large; ?> 768w,
                    <?php echo $full_img_tablet; ?> 992w,
                    <?php echo $full_img_desktop_small; ?> 1200w,
                    <?php echo $full_img_desktop_medium; ?> 1620w,
                    <?php echo $full_img_desktop_large; ?> 1920w"
                 data-sizes="auto"></div>

            <div class="videoBox-video js-video">
                <video width="100%" loop>
                    <source src="<?php echo $url; ?>">
                </video>
            </div>
        </div>
	<?php endif; ?>
</div>

