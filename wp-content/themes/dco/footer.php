<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

?>

            <?php
                $homePageFooter = "";
                if ( is_front_page() ) {
                    $homePageFooter = 'siteFooter--home ';
                };
            ?>

			<footer id="footer" class="siteFooter <?php echo $homePageFooter; ?>">
                <div class="siteFooter-inner">
                    <div class="siteFooter-preFooter">
                        <div class="siteFooter-preFooter-body">
                            <div class="footerConnect">
                                <a href="<?php echo get_field( 'connect_page', 'option' ); ?>" class="btn btn--blue btn--connect"><?php echo sprintf( '<span>%s</span><span>%s</span><span>%s</span>', __( 'D', 'text_domain' ), __( '&CO', 'text_domain') , __( 'NNECT', 'text_domain' )  ); ?></a>
                            </div>
                            <div class="footerDescription"><?php echo get_field( 'footer_description', 'option' ); ?></div>
                        </div>
                        <div class="footerGoTop">
                            <button type="button" class="goTop js-goTop"><?php _e( 'RETURN TO TOP', 'dco' ); ?></button>
                        </div>
                    </div>

                    <div class="siteFooter-body">
                      <?php if ( get_field( 'footer_logo', 'option' ) ) : ?>
                          <div class="siteFooter-body-logo">
                              <a href="<?php echo esc_url( home_url() ); ?>">
                                <img src="<?php echo get_field( 'footer_logo', 'option' ); ?>" alt="footerLogo"/>
                              </a>
                          </div>
                      <?php endif; ?>

                        <div class="siteFooter-body-copyright">
                            <ul>
                              <?php if ( get_field( 'copyright_1_part', 'option' ) ) : ?>
                                  <li><?php echo "&copy;" . date("Y") . ' ' . get_field( 'copyright_1_part', 'option' ); ?></li>
                              <?php endif; ?>
                              <?php if ( get_field( 'copyright_2_part', 'option' ) ) : ?>
                                  <li><?php echo get_field( 'copyright_2_part', 'option' ); ?></li>
                              <?php endif; ?>
                              <?php if ( get_field( 'copyright_3_part', 'option' ) ) : ?>
                                  <li><a href="tel:<?php echo get_field( 'copyright_3_part', 'option' ); ?>"><?php echo get_field( 'copyright_3_part', 'option' ); ?></a></li>
                              <?php endif; ?>
                              <?php if ( get_field( 'copyright_email', 'option' ) ) : ?>
                                  <li><a href="mailto:<?php echo get_field( 'copyright_email', 'option' ); ?>"><?php echo get_field( 'copyright_email', 'option' ); ?></a></li>
                              <?php endif; ?>
                            </ul>
                        </div>

                        <div class="siteFooter-body-socials siteSocials">
                          <?php
                          if ( get_field('social_network', 'option') ) {
                            $social_links = get_field('social_network', 'option');
                            foreach ( $social_links as $social_link ) {
                              if( $social_link['display_in_the_footer'] ) { ?>
								  <a href="<?php echo $social_link['social_link']; ?>"
									  target="_blank">
									  <i class="fa fa-<?php echo $social_link['social_icon']; ?>"
										  aria-hidden="true"></i>
								  </a>
                                <?php
                              }
                            }
                          } ?>
                        </div>
                    </div>
                </div>
			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>

</html>
