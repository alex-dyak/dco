<?php
/**
 * Profile approach block template.
 */
?>
<div class="approach-block">
	<div class="container">
		<h2><?php the_sub_field( 'title' ); ?></h2>

		<h3><?php the_sub_field( 'sub_title' ); ?></h3>

		<div class="approach-block-text">
            <?php the_sub_field( 'content' ); ?>
        </div>

		<div class="graph">
			<?php $graph_image_id = get_sub_field( 'approach_graphic' ); ?>
            <?php if ( !empty($graph_image_id) ): ?>
                <img src="<?php echo $graph_image_id; ?>" alt="">
            <?php endif; ?>
		</div>
	</div>

	<!-- Background image -->
    <?php $background = get_sub_field( 'approach_background' ); ?>
    <?php if ( !empty($background) ): ?>
        <img src="<?php echo $background; ?>" alt="">
    <?php endif; ?>
</div>
