<div class="statisticBlock container">

	<?php if ( get_sub_field( 'header' ) && get_sub_field( 'body' ) ): ?>

        <?php if ( get_sub_field( 'header' ) ): ?>

            <h1 class="statisticBlock-title"><?php the_sub_field( 'header' ); ?></h1>

        <?php endif; ?>

		<div class="statisticBlock-body">

			<?php if ( get_sub_field( 'body' ) ): ?>

				<div class="statisticBlock-body-description">

					<?php the_sub_field( 'body' ); ?>

				</div>

			<?php endif; ?>

		</div>

	<?php endif; ?>

	<?php if ( have_rows( 'statistics' ) ): ?>

		<div class="statisticBlock-stats">

			<?php while ( have_rows( 'statistics' ) ) : the_row();
				if ( get_sub_field( 'number_color' ) ) {
					$number_color = get_sub_field( 'number_color' );
				} else {
					$number_color = '';
				}
				?>
                <div class="statisticBlock-stats-item">
                    <?php if ( get_sub_field( 'number' ) ): ?>

                        <div class="statisticBlock-stats-number" style="color: <?php echo $number_color; ?>"><?php the_sub_field( 'number' ); ?></div>

                    <?php endif; ?>

                    <?php if ( get_sub_field( 'text' ) ): ?>

                            <div class="statisticBlock-stats-text"><?php the_sub_field( 'text' ); ?></div>

                    <?php endif; ?>
                </div>
			<?php endwhile; ?>

		</div>

	<?php endif; ?>

</div>
