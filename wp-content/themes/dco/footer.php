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
			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>

</html>
