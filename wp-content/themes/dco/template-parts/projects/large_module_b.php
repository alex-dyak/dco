<?php
$video       = get_sub_field( 'video' );
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
?>

	<div class="videoLargeModuleB">
        <?php if ($quote_title || $quote_body) : ?>
            <div class="videoLargeModuleB-quote position-<?php echo $class_title; ?>" style="background: <?php echo $background_color; ?>">
                <?php if ($quote_title) : ?>
                    <div class="videoLargeModuleB-quote-title"
                      <?php if($class_title == "middle_left"): ?>style="color: <?php echo $title_color; ?>"<?php endif; ?>><?php echo $quote_title; ?></div>
                <?php endif; ?>

                <?php if ($quote_body) : ?>
                    <div class="videoLargeModuleB-quote-body">
                        <?php echo $quote_body; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

		<?php if ( ! empty ( $video ) ):
			$url = $video['url']; ?>
		<video autoplay>
			<source src="<?php echo $url; ?>">
		</video>
	</div>

<?php endif; ?>