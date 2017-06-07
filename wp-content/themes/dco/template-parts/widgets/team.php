<?php
/**
 * Team block template.
 */
?>
<?php if ( ! empty( $members ) ): ?>
	<?php foreach ( $members as $member_id => $member ) : ?>

		<?php if ( ! empty( $member['name'] ) ): ?>
			<?php echo implode( ' ', $member['name'] ) ?>
		<?php endif; ?>

		<span>
			<?php if ( ! empty( $member['position'] ) ): ?>
				<?php echo $member['position']; ?>
			<?php endif; ?>
		</span>

		<?php if ( ! empty( $member['photo_preview'] ) ): ?>
			<?php echo $member['photo_preview']; ?>
		<?php endif; ?>

		<!-- Member modal block -->
		<div class="member-modal">

			<?php if ( ! empty( $member['photo'] ) ): ?>
				<?php echo $member['photo']; ?>
			<?php endif; ?>

			<?php if ( ! empty( $member['description'] ) ): ?>
				<?php echo $member['description']; ?>
			<?php endif; ?>

		</div>
		<!-- End Member modal block -->

	<?php endforeach; ?>
<?php endif; ?>
