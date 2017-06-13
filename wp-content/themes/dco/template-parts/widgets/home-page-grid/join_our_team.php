<div class="joinOurTeam container">
	<?php $image = get_sub_field( 'image' );
	if ( ! empty ( $image ) ):
		$url = $image['url'];
		?>
		<div class="joinOurTeam-image">
			<img src="<?php echo $url; ?>">
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'title' ) && get_sub_field( 'body' ) ): ?>
		<div class="joinOurTeam-body">
			<?php if ( get_sub_field( 'title' ) ): ?>
				<h2 class="joinOurTeam-title"><?php echo the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="joinOurTeam-body">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>