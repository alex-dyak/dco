<?php $title_color = get_field( 'title_color' ); ?>

<div class="successModule container">

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ) : ?>
		<div class="successModule-body">
			<?php if ( get_sub_field( 'header' ) ): ?>
				<h2 class="successModule-body-title"
				    style="color: <?php echo $title_color; ?>"><?php echo the_sub_field( 'header' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'body' ) ): ?>
				<div class="successModule-body-description">
					<?php echo the_sub_field( 'body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div>