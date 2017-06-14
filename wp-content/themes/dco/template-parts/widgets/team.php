<?php
/**
 * Team block template.
 */
?>
<div class="team-holder container">
	<h3 class="widget-title">Team</h3> <!--TODO Need to change this to a variable-->
	<div class="team-block">
		<?php if ( ! empty( $members ) ): ?>
			<?php foreach ( $members as $member_id => $member ) : ?>
				<div class="team-member">
					<div class="team-member-holder">
						<?php if ( ! empty( $member['name'] ) ): ?>
							<span class="name">
								<?php echo implode( ' ', $member['name'] ) ?>
							</span>
						<?php endif; ?>

						<?php if ( ! empty( $member['position'] ) ): ?>
							<span class="position">
								<?php echo $member['position']; ?>
							</span>
						<?php endif; ?>
						<div class="dots"></div>
					</div>

					<?php if ( ! empty( $member['photo_preview'] ) ): ?>
						<?php echo $member['photo_preview']; ?>
					<?php endif; ?>

					<!-- Member modal block -->
					<div class="member-modal">
						<div class="member-modal-holder">
							<?php if ( ! empty( $member['name'] ) ): ?>
								<span class="name">
								<?php echo implode( ' ', $member['name'] ) ?>
							</span>
							<?php endif; ?>

							<?php if ( ! empty( $member['position'] ) ): ?>
								<span class="position">
								<?php echo $member['position']; ?>
							</span>
							<?php endif; ?>

							<?php if ( ! empty( $member['description'] ) ): ?>
								<?php echo $member['description']; ?>
							<?php endif; ?>
						</div>

						<?php if ( ! empty( $member['photo'] ) ): ?>
							<?php echo $member['photo']; ?>
						<?php endif; ?>

						<span class="close">Close</span>
						<div class="overlay"></div>
					</div>
					<!-- End Member modal block -->

				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>