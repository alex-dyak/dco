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
			'before_title'  => '<h1 class="widget-title">',
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

		register_widget( 'W4P_Contacts_Widget' );
		register_widget( 'W4P_Social_Profiles_Widget' );
		register_widget( 'W4P_Anchor_Menu_Widget' );
		register_widget( 'W4P_Client_Filter_Widget' );
		register_widget( 'W4P_Team_Widget' );
	}
	add_action( 'widgets_init', 'dco_widgets_init' );
}

/**
 * W4P Contacts Widget Class
 */
class W4P_Contacts_Widget extends WP_Widget {


	function __construct() {
		parent::__construct( false, $name = __( '[W4P] Contacts', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title  = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		$items	= $instance['items'];
		$phone_url = $instance['phone_url'];
		$skype_url = $instance['skype_url'];
		$item_titles = $instance['item_titles'];
		$address = get_option( 'w4p_contacts_address' );
		$phones = get_option( 'w4p_contacts_phones' );
		$skype = get_option( 'w4p_contacts_skype' );
		echo $before_widget; ?>

		<?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
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
										<h4><?php esc_html_e( 'Address:', 'dco' );?></h4>
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
										<h4><?php esc_html_e( 'Phones:', 'dco' );?></h4>
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
										<h4><?php esc_html_e( 'Skype:', 'dco' );?></h4>
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
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items'] = $new_instance['items'];
		$instance['item_titles'] = $new_instance['item_titles'];
		$instance['phone_url'] = $new_instance['phone_url'];
		$instance['skype_url'] = $new_instance['skype_url'];

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		$item_list = array(
			'Address' => 'address',
			'Phones' => 'phones',
			'Skype' => 'skype',
		);
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Contacts', 'dco' ), 'items' => array(), 'skype_url' => true, 'phone_url' => true, 'item_titles' => false );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title 	= esc_attr( $instance['title'] );
			$items	= $instance['items'];
			$phone_url = $instance['phone_url'];
			$skype_url = $instance['skype_url'];
			$item_titles = $instance['item_titles'];
		} ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"><?php esc_html_e( 'Choose the Contacts to display:', 'dco' ); ?></label>
			<select  id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>" class="select-toggle" size="3" multiple="multiple" name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[]">
				<?php foreach ( $item_list as $label => $item ) { ?>
					<option <?php echo in_array( $item, (array) $items, true ) ? ' selected="selected" ' : ''; ?> value="<?php echo esc_attr( $item ); ?>"><?php echo esc_html( $label ); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $item_titles, 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'item_titles' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_titles' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'item_titles' ) ); ?>"><?php esc_html_e( 'Display item titles', 'dco' ) ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $phone_url, 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'phone_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_url' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone_url' ) ); ?>"><?php esc_html_e( 'Phones as URL', 'dco' ) ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $skype_url, 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'skype_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skype_url' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'skype_url' ) ); ?>"><?php esc_html_e( 'Skype as URL', 'dco' ) ?></label>
		</p>
	<?php
	}
} /* End class W4P_Contacts_Widget. */

/**
 * W4P Social Profiles Widget Class
 */
class W4P_Social_Profiles_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( false, $name = __( '[W4P] Social Profiles', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title  = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		$items	= $instance['items'];
		echo $before_widget;
		if ( $title ) { echo $before_title . $title . $after_title; }
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
					<?php if ( in_array( (string) ( $name . '_' . $index ), (array) $items, true ) ) { ?>
						<li>
							<a class="<?php echo esc_attr( $name ); ?>" href="<?php echo esc_url( $value ) ?>"><?php echo esc_html( $name ); ?></a>
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
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items'] = $new_instance['items'];

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Social Profiles', 'dco' ), 'items' => array() );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title 	= esc_attr( $instance['title'] );
			$items	= $instance['items'];
		}
		$social_profiles = get_option( 'w4p_social_profiles' );
		$social_profile_index = array();
		if ( ! empty( $social_profiles ) ) {
			foreach ( (array) $social_profiles as $name => $element ) {
				foreach ( $element as $index => $value ) {
					array_push( $social_profile_index, $name . '_' . $index );
				}
			}
		} ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"><?php esc_html_e( 'Choose the Social Profiles to display:', 'dco' ); ?></label><br>
			<select id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>" class="select-toggle" size="<?php echo count( $social_profile_index ); ?>" multiple="multiple" name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[]" style="min-width: 150px;">
				<?php
				if ( ! empty( $social_profiles ) ) {
					foreach ( (array) $social_profiles as $name => $element ) {
						foreach ( $element as $index => $value ) { ?>
							<option
								<?php echo in_array( (string) ( $name . '_' . $index ), (array) $items, true ) ? ' selected="selected" ' : ''; ?>
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
		parent::__construct( false, $name = __( '[W4P] Anchor Menu', 'dco' ) );
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
		$group = get_field_objects( get_the_ID() );
		$menu  = array();
		foreach ( $group as $fields ) {
			if ( ! empty( $fields['value'] ) && is_array( $fields['value'] ) ) {
				foreach ( $fields['value'] as $key => $field ) {
					if ( $field['acf_fc_layout'] == 'anchor_section' ) {
						if ( ! empty( $field['anchor_title'] ) && ! empty( $field['anchor_hash'] ) ) {
							$menu[ $field['anchor_hash'] ] = $field['anchor_title'];
						}
					}
				}
			}
		}

		return $menu;
	}
} /* End class W4P_Anchor_Menu_Widget. */

/**
 * W4P Team Widget Class
 */
class W4P_Team_Widget extends WP_Widget {
	function __construct() {
		parent::__construct( false, $name = __( '[W4P] Team', 'dco' ) );
	}
	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title  = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		echo $before_widget;
		/*if ( $title ) { echo $before_title . $title . $after_title; }*/
		$members = $this->get_team_members();
		dco_locate_template( 'widgets/team', array( 'members' => $members ) );
		echo $after_widget;
	}
	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
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
			$title     = esc_attr( $instance['title'] );
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php }
	function get_team_members(){
		$members = new WP_Query( array(
			'posts_per_page'   => -1,
			'post_type'        => 'team',
			'meta_key'         => 'member_surname',
			'orderby'          => 'meta_value',
			'order'            => 'ASC',
		) );
		$data = array();
		if( $members->have_posts() ):
			while ( $members->have_posts() ) : $members->the_post();
				$member_id = get_the_ID();
				$data[$member_id]['name'][] = get_field( 'member_surname',  $member_id);
				$data[$member_id]['name'][] = get_field( 'member_name', $member_id );
				$data[$member_id]['position'] = get_field( 'position', $member_id );
				$data[$member_id]['description'] = get_the_content();
				$big_photo_id = get_field( 'big_photo', $member_id );
				$data[$member_id]['photo'] = wp_get_attachment_image( $big_photo_id, 'full' );
				$data[$member_id]['photo_preview'] = get_the_post_thumbnail( $member_id, 'full');
			endwhile;
			wp_reset_postdata();
		endif;
		return $data;
	}
} /* End class W4P_Team_Widget. */

/**
 * W4P Client Filter Widget Class
 */
class W4P_Client_Filter_Widget extends WP_Widget {

	function __construct() {
		parent::__construct( false, $name = __( '[W4P] Client Filter', 'dco' ) );
	}

	/** @see WP_Widget::widget -- do not rename this */
	function widget( $args, $instance ) {
		extract( $args );
		$title  = apply_filters( 'widget_title', $instance['title'] ); /* The widget title. */
		$items	= $instance['items'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		dco_locate_template( 'widgets/client-list' );

		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/** @see WP_Widget::form -- do not rename this */
	function form( $instance ) {
		// Set up some default widget settings.
		$defaults = array( 'title' => __( 'Client List', 'dco' ), 'items' => array() );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Get widget fields values.
		if ( ! empty( $instance ) ) {
			$title 	= esc_attr( $instance['title'] );
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dco' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php }

} /* End class W4P_Client_Filter_Widget. */

