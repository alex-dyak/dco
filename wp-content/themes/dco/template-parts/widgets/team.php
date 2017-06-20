<?php
/**
 * Team block template.
 */
?>
<div class="team-holder container">
	<?php if ( ! empty( $title ) ): ?>
		<h3 class="widget-title"><?php echo esc_attr( $title ); ?></h3>
	<?php endif; ?>
	<div class="team-block">
		<?php if ( ! empty( $members ) ): ?>
			<?php foreach ( $members as $member_id => $member ) : ?>
				<div class="team-member">
					<div class="team-member-container">
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
							<span class="close">Close</span>
						</div>

						<?php if ( ! empty( $member['photo_preview'] ) ): ?>
							<?php echo $member['photo_preview']; ?>
						<?php endif; ?>
					</div>

					<!-- Member modal block -->
					<div class="member-modal">
						<div class="member-modal-holder right">
							<div class="arrow arrow-up"></div>
							<div class="member-modal-frame">
								<div>
									<div class="member-modal-container">
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
								</div>
							</div>
							<div class="arrow arrow-down"></div>
						</div>

						<?php if ( ! empty( $member['photo'] ) ): ?>
							<?php echo $member['photo']; ?>
						<?php endif; ?>

						<span class="close">Close</span>
					</div>
					<!-- End Member modal block -->
					<div class="overlay"></div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>