<?php
/**
 * Template Name: Page - Log In
 * The template for displaying Log In page
 */
get_header( 'login' );
?>
<?php if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<div class="login-img" style="background-image: url( <?php the_post_thumbnail_url(); ?> )"></div>
		<div class="login-page">
			<div class="login-page-holder">
				<div class="login-branding">
					<?php
					$login_logo = get_field ( 'login_logo' );
					if ( ! empty( $login_logo ) && is_int( $login_logo ) ) {
						echo wp_get_attachment_image( $login_logo, 'full' );
					} ?>
				</div>

				<div>
					<?php
					if ( ! is_user_logged_in() ) { // Display WordPress login form:
						$args = array(
							'redirect' => admin_url(),
							'form_id' => 'loginform-custom',
							'label_username' => __( 'Username or Email Address' ),
							'label_password' => __( 'Password' ),
							'label_remember' => __( 'Stay signed in' ),
							'label_log_in'   => __( 'Log in' ),
							'remember'       => true
						);
						wp_login_form( $args );
					} else { // If logged in:
						wp_loginout( home_url() ); // Display "Log Out" link.
						echo " | ";
						wp_register('', ''); // Display "Site Admin" link.
					}
					?>
				</div>
			</div>
		</div>

	<?php endwhile;
endif;

get_footer( 'login' );?>

