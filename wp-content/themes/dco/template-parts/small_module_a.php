<?php if ( get_sub_field( 'image' ) ): ?>
	<div class="image-small-module-a">
		<img src="<?php echo get_sub_field( 'image' ); ?>"/>
	</div>
<?php endif; ?>

<?php if ( get_sub_field( 'header' ) ): ?>
	<h2 class="header-small-module-a">
		<?php echo the_sub_field( 'header' ); ?>
	</h2>
<?php endif; ?>

<?php if ( get_sub_field( 'body' ) ): ?>
	<div class="body-small-module-a">
		<?php echo the_sub_field( 'body' ); ?>
	</div>
<?php endif; ?>
