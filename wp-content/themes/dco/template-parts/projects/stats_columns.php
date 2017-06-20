<?php if (get_sub_field( 'stat_content' )): ?>
<div class="statsModule four-column container js-statSlider">
	<?php else: ?>
	<div class="statsModule three-column container js-statSlider">
		<?php endif; ?>

		<?php if ( have_rows( 'stats_column' ) ) : ?>

			<?php while ( have_rows( 'stats_column' ) ) : the_row();
				if ( get_sub_field( 'amount_color' ) ) {
					$amount_color = get_sub_field( 'amount_color' );
				} else {
					$amount_color = '';
				}
				?>
				<div class="statsModule-item">
					<?php if ( get_sub_field( 'stat_amount' ) ) : ?>
						<div class="statsModule-item-amount" style="color: <?php echo $amount_color; ?>"><?php the_sub_field( 'stat_amount' ); ?></div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'stat_description' ) ): ?>
						<div class="statsModule-item-description"><?php the_sub_field( 'stat_description' ); ?></div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>

		<?php endif; ?>

		<?php if ( get_sub_field( 'stat_content' ) ) : ?>
			<div class="statsModule-item statsModule-item--content"><?php the_sub_field( 'stat_content' ); ?></div>
		<?php endif; ?>

	</div>