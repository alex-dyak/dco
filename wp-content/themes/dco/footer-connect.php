<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package    WordPress
 * @subpackage W4P-Theme
 * @since      W4P Theme 1.0
 */

?>

<footer id="footer" class="siteFooter siteFooter--connectPage" role="contentinfo">
    <div class="siteFooter-inner">
        <div class="siteFooter-body">
            <div class="siteFooter-body-copyright">
                <ul>
					<?php if ( get_field( 'copyright_1_part', 'option' ) ) : ?>
						<li><?php echo "&copy;" . date("Y") . ' ' . get_field( 'copyright_1_part', 'option' ); ?></li>
					<?php endif; ?>
					<?php if ( get_field( 'copyright_2_part', 'option' ) ) : ?>
                        <li><?php echo get_field( 'copyright_2_part', 'option' ); ?></li>
					<?php endif; ?>
					<?php if ( get_field( 'copyright_3_part', 'option' ) ) : ?>
                        <li>
                            <a href="tel:<?php echo get_field( 'copyright_3_part',
								'option' ); ?>"><?php echo get_field( 'copyright_3_part',
									'option' ); ?></a>
                        </li>
					<?php endif; ?>
					<?php if ( get_field( 'copyright_email', 'option' ) ) : ?>
                        <li>
                            <a href="mailto:<?php echo get_field( 'copyright_email',
								'option' ); ?>"><?php echo get_field( 'copyright_email',
									'option' ); ?></a>
                        </li>
					<?php endif; ?>
                </ul>
            </div>

            <div class="siteFooter-body-socials siteSocials">
				<?php
				if ( get_field( 'social_network', 'option' ) ) {
					$social_links = get_field( 'social_network', 'option' );
					foreach ( $social_links as $social_link ) { ?>
                        <a href="<?php echo $social_link['social_link']; ?>" target="_blank">
                            <i class="fa fa-<?php echo $social_link['social_icon']; ?>" aria-hidden="true"></i>
                        </a>
						<?php
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
