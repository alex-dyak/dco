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

	    <?php
		$linkedin_link = get_field( 'connect_page', 'option' );
	    if ( get_field( 'social_network', 'option' ) ) {
		    $social_links = get_field( 'social_network', 'option' );
		    foreach ( $social_links as $social_link ) {
			    if( $social_link['social_icon'] == 'linkedin' ) {
				    $linkedin_link = $social_link['social_link'];
			    }
		    }
	    } ?>

		  <div class="joinOurTeam-linkedinBox js-needToTrim">
              <a href="<?php echo $linkedin_link; ?>" target="_blank" class="joinOurTeam-linkedinBox-linkOverflow"></a>
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

                  <i class="fa fa-linkedin-square socialIcon" aria-hidden="true"></i>

		  </div>

    </div>
</div>
