<div class="projectDescription container">
	<div class="projectDescription-header">
		<?php if ( get_sub_field( 'header' ) ): ?>
			<h1 class="projectDescription-header-title"><?php echo the_sub_field( 'header' ); ?></h1>
		<?php endif; ?>

		<?php if ( get_sub_field( 'subheader' ) ): ?>
			<h3 class="projectDescription-header-subtitle"><?php echo the_sub_field( 'subheader' ); ?></h3>
		<?php endif; ?>
	</div>

	<?php if ( get_sub_field( 'body' ) ): ?>
		<div
			class="projectDescription-description"><?php echo the_sub_field( 'body' ); ?></div>
	<?php endif; ?>
</div>


