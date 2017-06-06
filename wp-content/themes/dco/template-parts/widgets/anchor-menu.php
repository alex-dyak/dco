<?php
/**
 * @var $menu
 */
?>
<?php if ( ! empty( $menu ) && is_array( $menu ) ) : ?>

	<ul class="anchor-menu">

		<?php $lastItem = end( $menu ); ?>
		<?php foreach ( $menu as $slug => $item ) : ?>

			<li>
				<a href="#<?php echo $slug; ?>">
					<?php echo $item; ?>
				</a>

				<?php if ( $item != $lastItem ) : ?>
					<?php echo '/'; ?>
				<?php endif; ?>
			</li>

		<?php endforeach; ?>

	</ul>
<?php endif; ?>