<div class="twoStoryImage gridItem">
    <div class="twoStoryImage-inner">
	<?php $image = get_sub_field( 'two_story_image' );
	if ( ! empty( $image ) && is_int( $image ) ) : ?>
		<div class="twoStoryImage-image">
            <img src="<?php echo wp_get_attachment_image_url( $image, 'homepage_grid_long_image' ); ?>" alt="<?php the_sub_field( 'two_story_title' ); ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'two_story_title' ) && get_sub_field( 'two_story_body' ) ): ?>
		<div class="twoStoryImage-body">
			<?php if ( get_sub_field( 'two_story_title' ) ): ?>
				<h2 class="twoStoryImage-body-title"><?php the_sub_field( 'two_story_title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'two_story_body' ) ): ?>
				<div class="twoStoryImage-body-text">
					<?php the_sub_field( 'two_story_body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
    </div>
</div>
