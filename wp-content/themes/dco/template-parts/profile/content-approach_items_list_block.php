<?php
/**
 *  Approach items list block template.
 */
?>
<?php if ( have_rows( 'approach_columns' ) ): ?>
	<div class="approach-items">
		<div class="container">

			<?php $i = 1; ?>

			<?php while ( have_rows( 'approach_columns' ) ) : the_row(); ?>

				<div class="<?php printf( 'col%s', $i ); ?>">

					<?php if ( have_rows( 'approach_items' ) ): ?>

						<?php while ( have_rows( 'approach_items' ) ) : the_row(); ?>

							<div class="approach-item">

								<h3><?php the_sub_field( 'group_title' ); ?></h3>

								<?php if ( have_rows( 'items' ) ): ?>

									<?php while ( have_rows( 'items' ) ) : the_row(); ?>

										<p><?php the_sub_field( 'item_title' ); ?></p>

									<?php endwhile; ?>

								<?php endif; ?>

							</div>

						<?php endwhile; ?>

					<?php endif; ?>

				</div>

				<?php $i ++; ?>

			<?php endwhile; ?>

		</div>

		<!-- Background image -->
		<?php
		$background_image = get_sub_field( 'background_image' );
		$image_size       = 'full';
		?>
		<?php if ( ! empty( $background_image ) && is_int( $background_image ) ) : ?>
			<?php echo wp_get_attachment_image( $background_image, $image_size ); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
