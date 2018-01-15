<div class="joinOurTeam gridItem">
    <div class="joinOurTeam-inner">
        <?php if ( get_sub_field( 'join_our_team_title' ) && get_sub_field( 'join_our_team_body' ) ): ?>
            <div class="joinOurTeam-body">
                <div class="joinOurTeam-body-inner">
	                <?php if ( get_sub_field( 'join_our_team_pretitle' ) ): ?>
                        <span class="joinOurTeam-body-pretitle"><?php echo strtoupper( get_sub_field( 'join_our_team_pretitle' ) ); ?></span>
	                <?php endif; ?>

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

		  <div class="linkedin-title">

			  <div class="linkedin-title">
				  <?php _e( 'Linkedin', 'dco' ); ?>
			  </div>

			  <div class="linkedin-content">
				  <?php

				  $linkedin_options = get_option('linkedin_company_updates');
				  $limit = $linkedin_options['limit'];
				  $company_id = $linkedin_options['company-id'];

				  echo do_shortcode( "[li-company-updates limit=$limit company=$company_id]" ); ?>
			  </div>

			  <div class="grid-body-socials siteSocials">
				  <?php
				  if ( get_field( 'social_network', 'option' ) ) {
					  $social_links = get_field( 'social_network', 'option' );
					  foreach ( $social_links as $social_link ) {
						  if( $social_link['social_icon'] == 'linkedin' ) { ?>
							  <a href="<?php echo get_field( 'connect_page', 'option' ); ?>" target="_blank">
								  <i class="fa fa-<?php echo $social_link['social_icon']; ?>" aria-hidden="true"></i>
							  </a>
							  <?php
						  }
					  }
				  } ?>
			  </div>

		  </div>

    </div>
</div>