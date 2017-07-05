<div class="joinOurTeam gridItem">
    <div class="joinOurTeam-inner">
        <?php if ( get_sub_field( 'join_our_team_title' ) && get_sub_field( 'join_our_team_body' ) ): ?>
            <div class="joinOurTeam-body">
                <div class="joinOurTeam-body-inner">
                    <?php if ( get_sub_field( 'join_our_team_title' ) ): ?>
                        <h2 class="joinOurTeam-body-title"><?php the_sub_field( 'join_our_team_title' ); ?></h2>
                    <?php endif; ?>

                    <?php if ( get_sub_field( 'join_our_team_body' ) ): ?>
                        <div class="joinOurTeam-body-description">
                            <?php the_sub_field( 'join_our_team_body' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php $image = get_sub_field( 'join_our_team_image' );
            if ( ! empty( $image ) && is_int( $image ) ) : ?>
              <div class="joinOurTeam-image">
                  <img src="<?php echo wp_get_attachment_image_url( $image, 'homepage_grid_small_image' ); ?>" alt="<?php the_sub_field( 'join_our_team_title' ); ?>">
              </div>
        <?php endif; ?>
    </div>
</div>