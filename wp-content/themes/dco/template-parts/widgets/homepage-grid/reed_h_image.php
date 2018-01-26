<?php
$instagram_link = get_field( 'connect_page', 'option' );
if ( get_field( 'social_network', 'option' ) ) {
	$social_links = get_field( 'social_network', 'option' );
	foreach ( $social_links as $social_link ) {
		if( $social_link['social_icon'] == 'instagram' ) {
			$instagram_link = $social_link['social_link'];
		}
	}
} ?>

<div class="instagramBox gridItem">
    <a href="<?php echo $instagram_link; ?>" class="instagramBox-linkOverflow" target="_blank"></a>

	<div class="instagramBox-title">
		<?php _e( 'Instagram', 'dco' ); ?>
	</div>

	<div class="instagramBox-content">
		<?php

		$instagram_user_id = get_option('easy_instagram_user_id');
		echo do_shortcode( "[easy-instagram user_id=$instagram_user_id author_text='' time_text='' thumb_size='465']" ); ?>
	</div>

	<div class="instagramBox-icon">
        <i class="fa fa-instagram" aria-hidden="true"></i>
	</div>

</div>
