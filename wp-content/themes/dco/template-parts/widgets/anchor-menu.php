<?php
/**
 * @var $menu
 */
?>
<?php if ( ! empty( $menu ) && is_array( $menu ) ) : ?>

	<ul class="anchor-menu container u-list--plain u-list--inline">

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