<div class="joinOurTeam">
    <div class="joinOurTeam-inner">
	<?php $image = get_sub_field( 'join_our_team_image' );
	if ( ! empty( $image ) && is_int( $image ) ) : ?>
		<div class="joinOurTeam-image" style="background-image: url('<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>');">
<!--            <img src="--><?php //echo wp_get_attachment_image_url( $image, 'full' ); ?><!--" alt="">-->
<!--			--><?php
//			printf( '<img src="%s" srcset="%s">',
//				wp_get_attachment_image_url( $image ),
//				wp_get_attachment_image_srcset( $image, 'middle' )
//			);
//			?>
		</div>
	<?php endif; ?>

	<?php if ( get_sub_field( 'join_our_team_title' ) && get_sub_field( 'join_our_team_body' ) ): ?>
		<div class="joinOurTeam-body">
			<?php if ( get_sub_field( 'join_our_team_title' ) ): ?>
				<h2 class="joinOurTeam-title"><?php echo the_sub_field( 'join_our_team_title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'join_our_team_body' ) ): ?>
				<div class="joinOurTeam-body">
					<?php echo the_sub_field( 'join_our_team_body' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
    </div>
</div>