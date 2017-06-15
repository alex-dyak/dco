<?php $title_color = get_field( 'title_color' ); ?>

<div class="imageSmallModuleA container">
	<?php $video = get_sub_field( 'video' );
	if ( ! empty ( $video ) ):
		$url = $video['url']; ?>
        <div class="imageSmallModuleA-image">
            <video autoplay>
                <source src="<?php echo $url; ?>">
            </video>
        </div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
        <div class="imageSmallModuleA-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
                <h2 class="imageSmallModuleA-body-title"
                    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
                <div class="imageSmallModuleA-body-description">
					<?php echo the_sub_field( 'body' ); ?>
                </div>
			<?php endif; ?>
        </div>
	<?php endif; ?>

</div>