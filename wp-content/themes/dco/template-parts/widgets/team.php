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
                <?php if ( empty( $member['description'] ) ): ?>
                    <div class="team-member no-description">
                <?php else: ?>
                    <div class="team-member">
                <?php endif; ?>
<!--				<div class="team-member">-->
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
                    <?php if ( ! empty( $member['description'] ) ): ?>
					<?php $text_position = ! empty( $member['position_description_text'] ) ? $member['position_description_text'] : 'left'; ?>
					<div class="member-modal">
						<div class="member-modal-holder <?php echo $text_position; ?>">
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
							<div class="img-holder">
								<?php echo $member['photo']; ?>
							</div>
						<?php endif; ?>
						<?php $close_link_color = ! empty($member['close_link_color']) ? $member['close_link_color'] : 'white'; ?>
						<span class="close <?php echo $close_link_color; ?>">Close</span>
					</div>
                    <?php endif; ?>
					<!-- End Member modal block -->
				</div>
			<?php endforeach; ?>
			<div class="overlay"></div>
		<?php endif; ?>
	</div>
</div>
