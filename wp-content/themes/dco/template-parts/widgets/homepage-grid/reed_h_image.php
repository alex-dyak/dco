<div class="instagram-box gridItem">

	<div class="instagram-title">
		<?php _e( 'Instagram', 'dco' ); ?>
	</div>

	<div class="instagram-content">
		<?php echo do_shortcode( '[easy-instagram user_id="1070527289" author_text="" time_text="" thumb_size="465"]' ); ?>
	</div>

	<div class="grid-body-socials siteSocials">
	<?php
	if ( get_field( 'social_network', 'option' ) ) {
		$social_links = get_field( 'social_network', 'option' );
		foreach ( $social_links as $social_link ) {
			if( $social_link['social_icon'] == 'instagram' ) { ?>
				<a href="<?php echo get_field( 'connect_page', 'option' ); ?>" target="_blank">
					<i class="fa fa-<?php echo $social_link['social_icon']; ?>" aria-hidden="true"></i>
				</a>
				<?php
			}
		}
	} ?>
	</div>

</div>
