<div class="twoStoryImage container">
	<?php $image = get_sub_field( 'two_story_image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="twoStoryImage-image">
			<img src="<?php echo $url; ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'two_story_title' ) && get_sub_field( 'two_story_body' ) ): ?>
		<div class="twoStoryImage-body">
			<?php if ( get_sub_field( 'two_story_title' ) ): ?>
				<h2 class="twoStoryImage-title"><?php echo the_sub_field( 'two_story_title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'two_story_body' ) ): ?>
				<div class="twoStoryImage-body">
					<?php echo the_sub_field( 'two_story_body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
