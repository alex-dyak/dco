<?php $title_color = get_field( 'title_color' ); ?>

<div class="imageSmallModuleATurned container-medium">

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>
		<div class="imageSmallModuleA-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="imageSmallModuleA-body-title" style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="imageSmallModuleA-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php $image = get_sub_field( 'image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="imageSmallModuleA-image">
			<img src="<?php echo $url; ?>">
		</div>
	<?php endif; ?>

</div>