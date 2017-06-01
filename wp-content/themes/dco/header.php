<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */
?><!doctype html>

<!--[if lt IE 7 ]>
<html
	class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html
	class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html
	class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head data-template-set="W4P-Theme">

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<meta name="description" content="<?php bloginfo( 'description' ); ?>"/>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="wrapper">


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

    $homePage = "";
    if( is_front_page() ) {
        $homePage = 'overviewMenu--home ';
    };
    ?>

	<header id="header" class="siteHeader">
        <div class="siteHeader-logo">
            <?php
            if ( get_header_image() && ! display_header_text() ) : /* If there's a header image but no header text. */ { ?>
                <a href="<?php echo esc_url( home_url() ); ?>"
                   title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="logo"><img
                        src="<?php header_image(); ?>"
                        width="<?php echo esc_attr( get_custom_header()->width ); ?>"
                        height="<?php echo esc_attr( get_custom_header()->height ); ?>"
                        alt=""/></a>
            <?php } elseif ( get_header_image() ) : /* If there's a header image. */ { ?>
                <img src="<?php header_image(); ?>"
                     width="<?php echo absint( get_custom_header()->width ); ?>"
                     height="<?php echo absint( get_custom_header()->height ); ?>"
                     alt=""/>
            <?php } endif; /* End check for header image. */ ?>

        </div>
        <div class="siteHeader-menu">
            <button type="button" class="menuBtn js-menuTrigger">
                <span><?php _e('menu'); ?></span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>

	</header>


    <div class="overviewMenu <?php echo $homePage; ?>js-menu ">
        <button type="button" class="overviewMenu-close js-closeMenu"></button>

        <div class="overviewMenu-inner">
            <div class="overviewMenu-inner-center">
                <div class="overviewMenu-logo">
                    <a href="<?php echo esc_url( home_url() ); ?>"
                       title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="logo">
                        <img
                                src="<?php header_image(); ?>"
                                width="<?php echo esc_attr( get_custom_header()->width ); ?>"
                                height="<?php echo esc_attr( get_custom_header()->height ); ?>"
                                alt=""/>
                    </a>
                </div>
            <div class="menuBox">
                <div class="menuBox-left">
                    <nav id="nav" class="siteNavigation" role="navigation">
                      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </nav>

                    <!-- Socials icons -->
                    <div class="loginPopup-socials">
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
                </div>

                <div class="menuBox-right">
                    <div class="newsList">
                      <?php
                      if ( is_front_page() ) {
                        $args = array(
                          'posts_per_page' => 3,
                          'orderby'        => 'post_date',
                          'order'          => 'DESC',
                          'post_type'      => 'post',
                          'post_status'    => 'publish',
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                            $query->the_post();
                            $date = get_the_date( 'm.d.y' );
                            if ( get_field( 'external_link' ) ) {
                              $link = get_field( 'external_link' );
                            } else {
                              $link = get_the_permalink();
                            }
                            ?>
                              <a href="<?php echo $link; ?>" class="newsList-box">
                                  <span class="newsList-box-date"><?php echo $date; ?></span>
                                  <span class="newsList-box-description"><?php echo wp_trim_words( get_the_content(), 15, '' ); ?></span>
                              </a>
                            <?php
                          }
                        }
                        wp_reset_postdata();
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </div>

