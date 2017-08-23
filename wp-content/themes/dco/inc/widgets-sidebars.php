<?php
/**
 * Widgets and Sidebars
 *
 * WordPress Widgets add content and features to your Sidebars. Examples are
 * the default widgets that come with WordPress; for post categories, tag
 * clouds, navigation, search, etc.
 *
 * Sidebar is a theme feature introduced with Version 2.2. It's basically a
 * vertical column provided by a theme for displaying information other than
 * the main content of the web page. Themes usually provide at least one
 * sidebar at the left or right of the content. Sidebars usually contain
 * widgets that an administrator of the site can customize.
 *
 * @link https://codex.wordpress.org/WordPress_Widgets
 * @link https://codex.wordpress.org/Widgets_API
 * @link https://codex.wordpress.org/Sidebars
 *
 * @package WordPress
 * @subpackage W4P-Theme
 */

if ( function_exists( 'register_sidebar' ) ) {
	/**
	 * Add Widget.
	 */
	function dco_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar Widgets', 'dco' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Profile Menu Area', 'dco' ),
			'id'            => 'profile-menu-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Client Filter Area', 'dco' ),
			'id'            => 'client-filter-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="clientPage-title">',
			'after_title'   => '</h1>',
		) );
		register_sidebar( array(
			'name'          => __( 'Profile Team Area', 'dco' ),
			'id'            => 'profile-team-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Homepage Grid Area', 'dco' ),
			'id'            => 'homepage-grid-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s grid js-grid">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Homepage Slider Area', 'dco' ),
			'id'            => 'homepage-slider-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_widget( 'W4P_Contacts_Widget' );
		register_widget( 'W4P_Social_Profiles_Widget' );
		register_widget( 'W4P_Anchor_Menu_Widget' );
		register_widget( 'W4P_Client_Filter_Widget' );
		register_widget( 'W4P_Team_Widget' );
		register_widget( 'W4P_Homepage_Grid_Widget' );
		register_widget( 'W4P_Homepage_Slider_Widget' );
	}

	add_action( 'widgets_init', 'dco_widgets_init' );
}

/**
 * W4P Contacts Widget Class
 */
class W4P_Contacts_Widget extends WP_Widget {


	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Contacts', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title       = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		$items       = $instance['items'];
		$phone_url   = $instance['phone_url'];
		$skype_url   = $instance['skype_url'];
		$item_titles = $instance['item_titles'];
		$address     = get_option( 'w4p_contacts_address' );
		$phones      = get_option( 'w4p_contacts_phones' );
		$skype       = get_option( 'w4p_contacts_skype' );
		echo $before_widget; ?>

		<?php if ( $title ) {
			echo $before_title . $title . $after_title;
		} ?>
		<?php
		if ( ! empty( $address ) || ! empty( $phones ) || ! empty( $skype ) ) { ?>
            <ul class="contacts-list">
				<?php
				foreach ( $items as $item ) {
					switch ( $item ) {
						case 'address':
							if ( ! empty( $address ) ) { ?>
                                <li>
									<?php if ( ! empty( $item_titles ) ) : ?>
                                        <h4><?php esc_html_e( 'Address:', 'dco' ); ?></h4>
									<?php endif; ?>
									<?php echo esc_html( $address ); ?>
                                </li>
							<?php }
							break;
						case 'phones':
							if ( ! empty( $phones ) ) { ?>
                                <li>
									<?php
									if ( ! empty( $item_titles ) ) : ?>
                                        <h4><?php esc_html_e( 'Phones:', 'dco' ); ?></h4>
									<?php endif;
									foreach ( explode( ',', $phones ) as $phone ) {
										if ( ! empty( $phone ) ) { ?>
											<?php if ( ! empty( $phone_url ) ) : ?>
                                                <a href="tel:<?php echo esc_attr( trim( $phone ) ); ?>"><?php echo esc_html( trim( $phone ) ); ?></a>&nbsp;
											<?php else : ?>
												<?php echo esc_html( trim( $phone ) ); ?>&nbsp;
											<?php endif; ?>
										<?php }
									} ?>
                                </li>
							<?php }
							break;
						case 'skype':
							if ( ! empty( $skype ) ) : ?>
                                <li>
									<?php if ( ! empty( $item_titles ) ) : ?>
                                        <h4><?php esc_html_e( 'Skype:', 'dco' ); ?></h4>
									<?php endif; ?>
									<?php if ( ! empty( $skype_url ) ) : ?>
                                        <a href="skype:<?php echo esc_attr( $skype ); ?>"><?php echo esc_html( $skype ); ?></a>&nbsp;
									<?php else : ?>
										<?php echo esc_html( $skype ); ?>
									<?php endif; ?>
                                </li>
							<?php endif; ?>
							<?php break;
					} ?>
				<?php } ?>
            </ul>
		<?php }
		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['items']       = $new_instance['items'];
		$instance['item_titles'] = $new_instance['item_titles'];
		$instance['phone_url']   = $new_instance['phone_url'];
		$instance['skype_url']   = $new_instance['skype_url'];

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		$item_list = array(
			'Address' => 'address',
			'Phones'  => 'phones',
			'Skype'   => 'skype',
		);
		// Set up some default widget settings.
		$defaults = array(
			'title'       => __( 'Contacts', 'dco' ),
			'items'       => array(),
			'skype_url'   => TRUE,
			'phone_url'   => TRUE,
			'item_titles' => FALSE
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title       = esc_attr( $instance['title'] );
			$items       = $instance['items'];
			$phone_url   = $instance['phone_url'];
			$skype_url   = $instance['skype_url'];
			$item_titles = $instance['item_titles'];
		} ?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"><?php esc_html_e( 'Choose the Contacts to display:', 'dco' ); ?></label>
            <select
                    id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"
                    class="select-toggle" size="3"
                    multiple="multiple"
                    name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[]">
				<?php foreach ( $item_list as $label => $item ) { ?>
                    <option <?php echo in_array( $item, (array) $items, TRUE ) ? ' selected="selected" ' : ''; ?>
                            value="<?php echo esc_attr( $item ); ?>"><?php echo esc_html( $label ); ?></option>
				<?php } ?>
            </select>
        </p>
        <p>
            <input class="checkbox"
                   type="checkbox" <?php checked( $item_titles, 'on' ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'item_titles' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'item_titles' ) ); ?>"/>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'item_titles' ) ); ?>"><?php esc_html_e( 'Display item titles', 'dco' ) ?></label>
        </p>
        <p>
            <input class="checkbox"
                   type="checkbox" <?php checked( $phone_url, 'on' ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'phone_url' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'phone_url' ) ); ?>"/>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'phone_url' ) ); ?>"><?php esc_html_e( 'Phones as URL', 'dco' ) ?></label>
        </p>
        <p>
            <input class="checkbox"
                   type="checkbox" <?php checked( $skype_url, 'on' ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'skype_url' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'skype_url' ) ); ?>"/>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'skype_url' ) ); ?>"><?php esc_html_e( 'Skype as URL', 'dco' ) ?></label>
        </p>
		<?php
	}
} /* End class W4P_Contacts_Widget. */

/**
 * W4P Social Profiles Widget Class
 */
class W4P_Social_Profiles_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Social Profiles', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		$items = $instance['items'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$social_profiles = get_option( 'w4p_social_profiles' );
		if ( ! empty( $items ) && ! empty( $social_profiles ) ) {
			$social_profile_index = array();
			foreach ( (array) $social_profiles as $name => $element ) {
				foreach ( $element as $index => $value ) {
					array_push( $social_profile_index, $name . '_' . $index );
				}
			} ?>
            <ul class="social-profile-list">
				<?php
				foreach ( (array) $social_profiles as $name => $element ) {
					foreach ( $element as $index => $value ) { ?>
						<?php if ( in_array( (string) ( $name . '_' . $index ), (array) $items, TRUE ) ) { ?>
                            <li>
                                <a class="<?php echo esc_attr( $name ); ?>"
                                   href="<?php echo esc_url( $value ) ?>"><?php echo esc_html( $name ); ?></a>
                            </li>
						<?php } ?>
					<?php }
				} ?>
            </ul>
		<?php }
		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items'] = $new_instance['items'];

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array(
			'title' => __( 'Social Profiles', 'dco' ),
			'items' => array()
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title = esc_attr( $instance['title'] );
			$items = $instance['items'];
		}
		$social_profiles      = get_option( 'w4p_social_profiles' );
		$social_profile_index = array();
		if ( ! empty( $social_profiles ) ) {
			foreach ( (array) $social_profiles as $name => $element ) {
				foreach ( $element as $index => $value ) {
					array_push( $social_profile_index, $name . '_' . $index );
				}
			}
		} ?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"><?php esc_html_e( 'Choose the Social Profiles to display:', 'dco' ); ?></label><br>
            <select
                    id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"
                    class="select-toggle"
                    size="<?php echo count( $social_profile_index ); ?>"
                    multiple="multiple"
                    name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[]"
                    style="min-width: 150px;">
				<?php
				if ( ! empty( $social_profiles ) ) {
					foreach ( (array) $social_profiles as $name => $element ) {
						foreach ( $element as $index => $value ) { ?>
                            <option
								<?php echo in_array( (string) ( $name . '_' . $index ), (array) $items, TRUE ) ? ' selected="selected" ' : ''; ?>
                                    value="<?php echo esc_attr( $name . '_' . $index ); ?>"
                                    tooltip="<?php echo esc_attr( $value ); ?>"
                                    title="<?php echo esc_attr( $value ); ?>"
                            ><?php echo esc_html( ucfirst( $name ) ); ?>
                            </option>
						<?php }
					}
				} ?>
            </select>
        </p>
	<?php }
} /* End class W4P_Contacts_Widget. */

/**
 * W4P Anchor Menu Widget Class
 */
class W4P_Anchor_Menu_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Anchor Menu', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );

		echo $before_widget;

		$menu = $this->get_page_achors();

		dco_locate_template( 'widgets/anchor-menu', array( 'menu' => $menu ) );

		echo $after_widget;
	}

	function get_page_achors() {
		$post_id = get_the_ID();
		$group   = $this->dco_get_field_objects( get_the_ID() );

		$menu = array();
		foreach ( $group as $fields ) {
			if ( ! empty( $fields['value'] ) && is_array( $fields['value'] ) ) {
				foreach ( $fields['value'] as $key => $field ) {
					if ( $field['acf_fc_layout'] == 'anchor_section' ) {
						$field_values = array_values( $field );
						if ( ! empty( $field_values[1] ) && ! empty( $field_values[2] ) ) {
							$menu[ $field_values[2] ] = $field_values[1];
						}
					}
				}
			}
		}

		return $menu;
	}


	function dco_get_field_objects( $post_id = FALSE, $format_value = TRUE, $load_value = TRUE ) {

		// global
		global $wpdb;


		// filter post_id
		$post_id = acf_get_valid_post_id( $post_id );


		// vars
		$meta   = array();
		$fields = array();


		// get field_names
		if ( ! is_numeric( $post_id ) ) {
			return;
		}

		$meta = get_post_meta( $post_id );

		// bail early if no meta
		if ( empty( $meta ) ) {

			return FALSE;

		}


		// populate vars
		foreach ( $meta as $k => $v ) {

			// Hopefuly improve efficiency: bail early if $k does start with an '_'
			if ( $k[0] === '_' ) {

				continue;

			}

			// does a field key exist for this value?
			if ( ! array_key_exists( "_{$k}", $meta ) ) {

				continue;

			}

			// get field
			$field_key = $meta["_{$k}"][0];
			$field     = acf_get_field( $field_key );


			// bail early if not a parent field
			if ( ! $field || acf_is_sub_field( $field ) ) {

				continue;

			}


			// load value
			if ( $load_value ) {

				$field['value'] = acf_get_value( $post_id, $field );

			}

			// append to $value
			$fields[ $field['name'] ] = $field;

		}


		// no value
		if ( empty( $fields ) ) {

			return FALSE;

		}


		// return
		return $fields;
	}
} /* End class W4P_Anchor_Menu_Widget. */

/**
 * W4P Team Widget Class
 */
class W4P_Team_Widget extends WP_Widget {
	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Team', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title = ! empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : __( 'Team', 'dco' ); /* The widget title. */

		echo $before_widget;

		$members = $this->get_team_members();
		dco_locate_template( 'widgets/team', array(
			'members' => $members,
			'title'   => $title
		) );
		echo $after_widget;
	}

	function get_team_members() {
		$members = new WP_Query( array(
			'posts_per_page' => - 1,
			'post_type'      => 'team',
			'meta_key'       => 'member_surname',
			'orderby'        => 'date',
			'order'          => 'ASC',
		) );
		$data    = array();
		add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		if ( $members->have_posts() ):
			while ( $members->have_posts() ) : $members->the_post();
				$member_id                                       = get_the_ID();
				$data[ $member_id ]['name'][]                    = get_field( 'member_name', $member_id );
				$data[ $member_id ]['name'][]                    = get_field( 'member_surname', $member_id );
				$data[ $member_id ]['position']                  = get_field( 'position', $member_id );
				$data[ $member_id ]['description']               = get_the_content();
				$data[ $member_id ]['position_description_text'] = get_field( 'position_description_text', $member_id );
				$data[ $member_id ]['close_link_color']          = get_field( 'close_link_color', $member_id );
				$big_photo_id                                    = get_field( 'big_photo', $member_id );
				$data[ $member_id ]['photo']                     = wp_get_attachment_image( $big_photo_id, 'profile_team_image' );
				$data[ $member_id ]['photo_preview']             = get_the_post_thumbnail( $member_id, 'full' );
			endwhile;
			wp_reset_postdata();
		endif;
		remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

		return $data;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Team', 'dco' ) );
		$instance = wp_parse_args( (array) $instance, $defaults );
		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title = esc_attr( $instance['title'] );
		}
		?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>
	<?php }
} /* End class W4P_Team_Widget. */

/**
 * W4P Client Filter Widget Class
 */
class W4P_Client_Filter_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Client Filter', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */

		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		dco_locate_template( 'widgets/client-list' );

		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array(
			'title' => __( 'Client List', 'dco' ),
			'items' => array()
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title = esc_attr( $instance['title'] );
		}
		?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>
	<?php }

} /* End class W4P_Client_Filter_Widget. */

/**
 * W4P Homepage Grid Widget Class
 */
class W4P_Homepage_Grid_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( FALSE, $name = __( '[W4P] Homepage Grid', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title',
			$instance['title'] ); /* The widget title. */


		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array(
			'posts_per_page' => 1,
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
                <div class="grid-sizer"></div>
                <div class="newsBox gridItem">
                    <span class="newsBox-inner">
                        <span class="newsBox-date"><?php echo $date; ?></span>
                        <span
                                class="newsBox-description"><?php echo wp_trim_words( get_the_content(), 15, '' ); ?></span>
                    </span>
                </div>
				<?php
			}
		}
		wp_reset_postdata();

		if ( have_rows( 'homepage_grid' ) ) {
			while ( have_rows( 'homepage_grid' ) ) {
				the_row();
				if ( get_row_layout() == 'two_story_image' ) {

					get_template_part( 'template-parts/widgets/homepage-grid/two_story_image' );

				} elseif ( get_row_layout() == 'join_our_team' ) {

					get_template_part( 'template-parts/widgets/homepage-grid/join_our_team' );

				} elseif ( get_row_layout() == 'reed_h_image' ) {

					get_template_part( 'template-parts/widgets/homepage-grid/reed_h_image' );

				} elseif ( get_row_layout() == 'forest_image' ) {

					get_template_part( 'template-parts/widgets/homepage-grid/forest_image' );

				} elseif ( get_row_layout() == 'projects_block' ) {

					get_template_part( 'template-parts/widgets/homepage-grid/projects_block' );

				}
			}
		}

		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Homepage Grid', 'dco' ) );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title = esc_attr( $instance['title'] );
		}
		?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>

	<?php }

} /* End class W4P_Home_Page_Grid_Widget. */

/**
 * W4P Homepage Slider Widget Class
 */
class W4P_Homepage_Slider_Widget extends WP_Widget {

	function __construct() {

		if (!isset($_COOKIE['firsttime_visit'])) {
			setcookie("firsttime_visit", "no");
		}

		parent::__construct( FALSE, $name = __( '[W4P] Homepage Slider', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
	    $firsttime_visit = FALSE;
		if (!isset($_COOKIE['firsttime_visit'])) {
			$firsttime_visit = TRUE;
		}

		$slider_data = $first_slide_data = '';
		$slider_items = array();

		extract( $args );
		$title = apply_filters( 'widget_title',
			$instance['title'] ); /* The widget title. */
		$first_slide_data = array();

		/**
		 * @var $before_widget;
		 */
		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

//		$first_slides_data = $this->get_first_slider_data();
		$slider_data = $this->get_slider_data($firsttime_visit);

		if(!empty($slider_data['slides']) && is_array($slider_data['slides'])){
			$slider_items = $slider_data['slides'];
        }

		if(!empty($slider_data['first_slides']) && is_array($slider_data['first_slides'])){
		    if($firsttime_visit){
			    array_unshift($slider_items, $slider_data['first_slides'][0]);
            }else{
			    array_unshift($slider_items, $slider_data['first_slides'][array_rand($slider_data['first_slides'])]);
            }
		}


		dco_locate_template( 'widgets/homepage-slider/content-banner-slider', array(
			'slider' => $slider_items,
            'title' => $slider_data['title'],
            'speed' => $slider_data['speed'],
		) );

		/**
		 * @var $after_widget;
		 */
		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Homepage Slider', 'dco' ) );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title = esc_attr( $instance['title'] );
		}
		?>
        <p>
            <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
            <input
                    id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                    type="text"
                    value="<?php echo esc_attr( $title ); ?>"/>
        </p>

	<?php }

	/**
	 *  Return slider data except first slide.
	 *
	 */
	function get_slider_data($firsttime_visit = FALSE) {
		$slider_array = $first_slider_array = array();
		if ( have_rows( 'slider_block' ) ) {
			while (have_rows('slider_block')) { the_row();
				$slider_data['speed'] = get_sub_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' )
					: 6000;

				$slider_data['title'] = get_sub_field( 'title' ) ? get_sub_field( 'title' ) : '';

				if (get_row_layout() == 'slider') {

					if ( have_rows( 'first_slide_content' ) ):
						$f = (int)0;
						while ( have_rows( 'first_slide_content' ) ) : the_row();

						    if($f == 0 && !$firsttime_visit){
						        $f++;
                                continue;
                            }

							$first_slider_array[ $f ]['background_color']        = get_sub_field( 'background_color' );
							$first_slider_array[ $f ]['title_color']             = get_sub_field( 'title_color' );
							$first_slider_array[ $f ]['text_color']              = get_sub_field( 'text_color' );
							$first_slider_array[ $f ]['link_url']                = get_sub_field( 'link_url' );
							$first_slider_array[ $f ]['title_extension']         = get_sub_field( 'title_extension' );
							$first_slider_array[ $f ]['teaser']                  = get_sub_field( 'teaser' );
							$first_slider_array[ $f ]['teaser_full_height_list'] = get_sub_field( 'teaser_full_height_list' );
							$first_slider_array[ $f ]['first_slide_teaser'] = get_sub_field( 'first_slide_teaser' );
							$first_slider_array[ $f ]['link_text']               = get_sub_field( 'link_text' );

							if ( have_rows( 'image_or_video' ) ) :
								while ( have_rows( 'image_or_video' ) ) : the_row();

									if ( get_row_layout() == 'image_layout' ) {
										$image = get_sub_field( 'image' );
										if ( ! empty( $image ) && is_int( $image ) ) :
											$first_slider_array[ $f ]['image'][] = $image;
										endif;
									}

									if ( get_row_layout() == 'video_layout' ) {
										$video        = get_sub_field( 'video' );

										$first_slider_array[ $f ]['video_poster'] = get_sub_field( 'video_poster' );
										if ( ! empty ( $video ) ):
											$first_slider_array[ $f ]['video_url'] = $video['url'];
										endif;
									}

								endwhile;
							endif;

							$f ++;
						endwhile;
						$slider_data['first_slides'] = $first_slider_array;
					endif;


					if (have_rows('slider_content')):
						$i = 0;
						while (have_rows('slider_content')) : the_row();
							$slider_array[$i]['background_color']        = get_sub_field('background_color');
							$slider_array[$i]['title_color']             = get_sub_field('title_color');
							$slider_array[$i]['text_color']              = get_sub_field('text_color') ? get_sub_field('text_color') : '';
							$slider_array[$i]['link_url']                = get_sub_field('link_url');
							$slider_array[$i]['title_extension']         = get_sub_field('title_extension');
							$slider_array[$i]['teaser']                  = get_sub_field('teaser');
							$slider_array[$i]['teaser_full_height_list'] = get_sub_field('teaser_full_height_list');
							$slider_array[$i]['link_text']               = get_sub_field('link_text');

							if (have_rows('image_or_video')) :
								while (have_rows('image_or_video')) : the_row();

									if (get_row_layout() == 'image_layout') {
										$image = get_sub_field('image');
										if (!empty($image) && is_int($image)) :
											$slider_array[$i]['image'][] = $image;
										endif;
									}

									if (get_row_layout() == 'video_layout') {
										$video        = get_sub_field('video');
										$slider_array[ $i ]['video_poster'] = get_sub_field( 'video_poster' );
										if (!empty ($video)):
											$slider_array[$i]['video_url'] = $video['url'];
										endif;
									}

								endwhile;
							endif;

							$i++;
						endwhile;
						$slider_data['slides'] = $slider_array;
					endif;

				}
			}
		}

		return $slider_data;
	}

	/**
	 * Function return first slide data.
	 */
	function get_first_slider_data() {
		$first_slider_array = array();

		if ( have_rows( 'slider_block' ) ) {
			while ( have_rows( 'slider_block' ) ) {
				the_row();
				if ( get_row_layout() == 'slider' ) {
					if ( have_rows( 'first_slide_content' ) ):
						$f = 0;
						while ( have_rows( 'first_slide_content' ) ) : the_row();
							$first_slider_array[ $f ]['background_color']        = get_sub_field( 'background_color' );
							$first_slider_array[ $f ]['title_color']             = get_sub_field( 'title_color' );
							$first_slider_array[ $f ]['text_color']              = get_sub_field( 'text_color' );
							$first_slider_array[ $f ]['link_url']                = get_sub_field( 'link_url' );
							$first_slider_array[ $f ]['title_extension']         = get_sub_field( 'title_extension' );
							$first_slider_array[ $f ]['teaser']                  = get_sub_field( 'teaser' );
							$first_slider_array[ $f ]['teaser_full_height_list'] = get_sub_field( 'teaser_full_height_list' );
							$first_slider_array[ $f ]['link_text']               = get_sub_field( 'link_text' );

							if ( have_rows( 'image_or_video' ) ) :
								while ( have_rows( 'image_or_video' ) ) : the_row();

									if ( get_row_layout() == 'image_layout' ) {
										$image = get_sub_field( 'image' );
										if ( ! empty( $image ) && is_int( $image ) ) :
											$first_slider_array[ $f ]['image'][] = $image;
										endif;
									}

									if ( get_row_layout() == 'video_layout' ) {
										$video        = get_sub_field( 'video' );
										$video_poster = get_sub_field( 'video_poster' );
										if ( ! empty ( $video ) ):
											$first_slider_array[ $f ]['video_url'] = $video['url'];
										endif;
									}

								endwhile;
							endif;

							$f ++;
						endwhile;
					endif;
				}
			}
		}

		return $first_slider_array;
	}


} /* End class W4P_Homepage_Slider_Widget. */
