<?php if ( get_sub_field( 'title' ) ): ?>
	<h2 class="title_pullquote_1">
		<?php echo the_sub_field( 'title' ); ?>
	</h2>
<?php endif; ?>

<?php if ( get_sub_field( 'body' ) ): ?>
	<div class="body_pullquote_1">
		<?php echo the_sub_field( 'body' ); ?>
	</div>
<?php endif; ?>