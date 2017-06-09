<?php if ( have_rows( 'stats_column' ) ): ?>

	<div class="StatsColumn container">

		<?php while ( have_rows( 'stats_column' ) ) : the_row(); ?>

			<div class="StatsColumn item">
				<?php if ( get_sub_field( 'stat_amount' ) ): ?>
					<div class="statColumns-stat-amount">
						<?php echo the_sub_field( 'stat_amount' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( get_sub_field( 'stat_description' ) ): ?>
					<div class="statColumns-stat-description">
						<?php echo the_sub_field( 'stat_description' ); ?>
					</div>
				<?php endif; ?>
			</div>

		<?php endwhile; ?>

	</div>

<?php endif; ?>