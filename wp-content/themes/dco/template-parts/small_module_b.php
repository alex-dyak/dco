<?php $title_color = get_field( 'title_color' ); ?>

<div class="imageSmallModuleB container-medium">
	<?php $images = get_sub_field( 'slider_image' );
	if( $images ): ?>
	<div class="imageSmallModuleB-image">
		<ul>
			<?php foreach( $images as $image ): ?>
				<li>
					<a href="<?php echo $image['url']; ?>">
						<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>
					<p><?php echo $image['caption']; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
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