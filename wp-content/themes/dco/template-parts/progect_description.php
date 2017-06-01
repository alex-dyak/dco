<?php if ( get_sub_field( 'header' ) ): ?>
	<h2 class="header-description">
		<?php echo the_sub_field( 'header' ); ?>
	</h2>
<?php endif; ?>

<?php if ( get_sub_field( 'subheader' ) ): ?>
	<h3 class="subheader-description">
		<?php echo the_sub_field( 'subheader' ); ?>
	</h3>
<?php endif; ?>

<?php if ( get_sub_field( 'body' ) ): ?>
	<div class="body-description">
		<?php echo the_sub_field( 'body' ); ?>
	</div>
<?php endif; ?>

