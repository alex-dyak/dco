<?php if ( get_sub_field( 'widgets' ) && function_exists( 'dynamic_sidebar' ) ) : ?>
	<?php dynamic_sidebar( get_sub_field( 'widgets' ) ); ?>
<?php endif; ?>