<?php $title_color = get_field( 'title_color' ); ?>

<div class="imageSmallModuleB container">
	<?php $images = get_sub_field( 'slider_image' );
	if( $images ): ?>
	<div class="imageSmallModuleB-slider">
		<div class="moduleSlider js-moduleSlider">
			<?php foreach( $images as $image ): ?>
				<div>
                    <img src="<?php echo $image['sizes']['full_img_mobile_small']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="imageSmallModuleB-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="imageSmallModuleB-body-title" style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="imageSmallModuleB-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>