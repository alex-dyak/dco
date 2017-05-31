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
			<footer id="footer" class="source-org vcard copyright" role="contentinfo">
				<!-- Mail to Button -->
				<p><a href="mailto:<?php echo get_option( 'info_email_address' ); ?>" class="btn connect"><?php _e( 'D&CONNECT', 'dco' ); ?></a></p>
				<!-- Return to top link -->
				<p><a href="#top"><?php _e( 'RETURN TO TOP', 'dco' ); ?></a></p>
				<!-- Copyright -->
				<small>
					<?php
					if ( $copyright = get_option( 'w4p_copyright' ) ) {
						echo esc_html( $copyright ) . ' <a href="mailto:' . get_option( 'info_email_address' ) . '">' . get_option( 'info_email_address' ) . '</a>';
					} else {
						echo sprintf( esc_html__( 'Copyright © %d. %s. All Rights Reserved.', 'dco' ), date( 'Y' ), get_bloginfo( 'name' ) );
					}
					?>
				</small>

				<!-- Socials icons -->
				<?php
				if ( isset( get_option( 'w4p_social_profiles' )['twitter'][1] ) ) {
					$twitter_link = get_option( 'w4p_social_profiles' )['twitter'][1];
				} else {
					$twitter_link = '';
				}
				if ( isset( get_option( 'w4p_social_profiles' )['linkedin'][1] ) ) {
					$linkedin_link = get_option( 'w4p_social_profiles' )['linkedin'][1];
				} else {
					$linkedin_link = '';
				}
				if ( isset( get_option( 'w4p_social_profiles' )['facebook'][1] ) ) {
					$facebook_link = get_option( 'w4p_social_profiles' )['facebook'][1];
				} else {
					$facebook_link = '';
				}
				?>
				<div class="footer-social">
					<?php if ( $facebook_link ) : ?>
						<a href="<?php echo $facebook_link; ?>" class="socialLink socialLink--in"
						   target="_blank" title="Follow us on Facebook">
							<span>
								<svg class="svgIcon svgFacebook">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
								</svg>
							</span>
						</a>
					<?php endif; ?>
					<?php if ( $linkedin_link ) : ?>
						<a href="<?php echo $linkedin_link; ?>" class="socialLink socialLink--in"
						   target="_blank" title="Follow us on LinkedIn">
							<span>
								<svg class="svgIcon svgLinkedin">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#linkedin"></use>
								</svg>
							</span>
						</a>
					<?php endif; ?>
					<?php if ( $twitter_link ) : ?>
						<a href="<?php echo $twitter_link; ?>" class="socialLink socialLink--tw"
						   target="_blank" title="Follow us on Twitter">
							<span>
								<svg class="svgIcon svgTwitter">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
								</svg>
							</span>
						</a>
					<?php endif; ?>
				</div>

			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>

</html>
