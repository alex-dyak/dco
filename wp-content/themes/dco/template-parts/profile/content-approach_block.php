<?php
/**
 * Profile approach block template.
 */
?>
<div class="approach-block">
	<div class="container">
		<h2><?php the_sub_field( 'title' ); ?></h2>

		<h3><?php the_sub_field( 'sub_title' ); ?></h3>

		<?php the_sub_field( 'content' ); ?>

		<div class="graph">
			<?php $graph_image_id = get_sub_field( 'approach_graphic' ); ?>
			<?php $graph_size = 'full'; ?>
			<?php echo wp_get_attachment_image( $graph_image_id, $graph_size ); ?>
		</div>
	</div>

	<!-- Background image -->
	<?php $background = get_sub_field( 'approach_background' ); ?>
	<?php $background_size = get_sub_field( 'approach_background' ); ?>
	<?php echo wp_get_attachment_image( $background, $background_size ); ?>
</div>
