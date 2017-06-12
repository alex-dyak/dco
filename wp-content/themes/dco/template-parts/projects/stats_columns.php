<?php if ( get_sub_field( 'stat_content' ) ): ?>
	<div class="StatsModule four-column container">
<?php else: ?>
	<div class="StatsModule three-column container">
<?php endif; ?>

		<?php if ( have_rows( 'stats_column' ) ): ?>

			<?php while ( have_rows( 'stats_column' ) ) : the_row();
				if ( get_sub_field( 'amount_color' ) ) {
					$amount_color = get_sub_field( 'amount_color' );
				} else {
					$amount_color = '';
				}
				?>
				<div class="StatsModule item">
					<?php if ( get_sub_field( 'stat_amount' ) ): ?>
						<div class="statColumns-stat-amount" style="color: <?php echo $amount_color; ?>">
							<?php the_sub_field( 'stat_amount' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( get_sub_field( 'stat_description' ) ): ?>
						<div class="StatsModule-stat-description">
							<?php the_sub_field( 'stat_description' ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>

		<?php endif; ?>

		<?php if ( get_sub_field( 'stat_content' ) ): ?>
			<div class="StatsModule content">
				<?php the_sub_field( 'stat_content' ); ?>
			</div>
		<?php endif; ?>

	</div>