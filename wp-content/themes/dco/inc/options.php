<?php
/**
 * W4P Theme Options
 *
 * @link http://codex.wordpress.org/Shortcode_API
 *
 * @package WordPress
 * @subpackage W4P-Theme
 */

// Call late so child themes can override.
add_action( 'after_setup_theme', 'dco_custom_header_setup', 15 );

/**
 * Adds support for the WordPress 'custom-header' theme feature and registers custom headers.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function dco_custom_header_setup() {

	add_theme_support(
		'custom-header',
		array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 1280,
			'height'                 => 400,
			'flex-width'             => true,
			'flex-height'            => true,
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => 'dco_custom_header_wp_head',
		)
	);

}

/**
 * Callback function for outputting the custom header CSS to `wp_head`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function dco_custom_header_wp_head() {

	if ( ! display_header_text() ) {
		return;
	}

	$hex = get_header_textcolor();

	if ( ! $hex ) {
		return;
	}

	$style = "body.custom-header #site-title a { color: #{$hex}; }";

	echo "\n" . '<style type="text/css" id="custom-header-css">' . esc_html( trim( $style ) ) . '</style>' . "\n";
}


/**
 * Class dcoSettingsPage
 */
class dcoSettingsPage {

	/**
	 * Holds Social profiles. You can add more in __construct() function.
	 *
	 * @var array
	 */
	public $social = array();

	/**
	 * Holds the values to be used in the fields callbacks
	 *
	 * @var $options
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		$this->social = array(
			'facebook'           => __( 'Facebook', 'dco' ),
			'twitter'            => __( 'Twitter', 'dco' ),
			'googleplus'         => __( 'Google+', 'dco' ),
			'instagram'          => __( 'Instagram', 'dco' ),
			'linkedin'           => __( 'LinkedIn', 'dco' ),
			'info_email_address' => __( 'Info Email', 'dco' ),
		);
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		// This page will be under "Settings".
		add_theme_page(
			__( 'Theme Options', 'dco' ),
			__( 'Theme Options', 'dco' ),
			'manage_options',
			'theme_options',
			array( $this, 'create_theme_options_page' )
		);
	}

	/**
	 * Options page callback
	 */
	public function create_theme_options_page() {
		// Set class property.
		$this->options = array( 'w4p_social_profiles' => get_option( 'w4p_social_profiles' ) );

		$this->options['w4p_contacts_address'] = get_option( 'w4p_contacts_address' );
		$this->options['w4p_contacts_phones']  = get_option( 'w4p_contacts_phones' );
		$this->options['w4p_contacts_skype']   = get_option( 'w4p_contacts_skype' );

		$this->options['info_email_address'] = get_option( 'info_email_address' );

		$this->options['w4p_copyright'] = get_option( 'w4p_copyright' ); ?>
		<div class="wrap">
			<!-- <h2>My Settings</h2> -->
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields.
				settings_fields( 'w4p_options_group' );
				do_settings_sections( 'theme_options' );
				submit_button();
				?>
			</form>
		</div>
	<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
			'w4p_options_group', /* Option group */
			'w4p_social_profiles', /* Option name */
			array( $this, 'sanitize_profiles' ) /* Sanitize */
		);

		register_setting(
			'w4p_options_group', /* Option group */
			'w4p_contacts_address' /* Option name */
		);
		register_setting(
			'w4p_options_group', /* Option group */
			'w4p_contacts_phones' /* Option name */
		);
		register_setting(
			'w4p_options_group', /* Option group */
			'w4p_contacts_skype' /* Option name */
		);

		register_setting(
			'w4p_options_group', /* Option group */
			'w4p_copyright', /* Option name */
			array( $this, 'sanitize_copyright' ) /* Sanitize */
		);

		register_setting(
			'w4p_options_group', /* Option group */
			'info_email_address' /* Option name */
		);

		add_settings_section(
			'setting_section_id', /* ID */
			__( 'W4P Theme Options', 'dco' ), /* Title */
			array( $this, 'print_section_info' ), /* Callback */
			'theme_options' /* Page */
		);

		add_settings_field(
			'w4p_social_profiles', /* ID */
			__( 'Social Profiles', 'dco' ), /* Title */
			array( $this, 'social_profile_callback' ), /* Callback */
			'theme_options', /* Page */
			'setting_section_id' /* Section */
		);

		add_settings_field(
			'w4p_contacts',
			__( 'Contacts', 'dco' ),
			array( $this, 'contacts_callback' ),
			'theme_options',
			'setting_section_id'
		);

		add_settings_field(
			'w4p_copyright',
			__( 'Copyright', 'dco' ),
			array( $this, 'copyright_callback' ),
			'theme_options',
			'setting_section_id'
		);

		add_settings_field(
			'info_email',
			__( 'Info Email', 'dco' ),
			array( $this, 'info_email_callback' ),
			'theme_options',
			'setting_section_id'
		);
	}

	/**
	 * Get the info email.
	 */
	public function info_email_callback() {
		?>
		<div class="w4p-info-email-wrapper">
			<label for="info_email_address" class="w4p-option-label"><?php esc_html_e( 'Email:', 'dco' ); ?></label>
			<input
				type="text"
				id="info_email_address"
				name="info_email_address"
				value="<?php echo ! empty( $this->options['info_email_address'] ) ? esc_attr( $this->options['info_email_address'] ) : '' ?>"
				placeholder="<?php esc_html_e( 'mail@example.com', 'dco' ); ?>"
				/>
			<hr>
		</div>
	<?php }

	/**
	 * 	/**
	 * Sanitize each setting field as needed.
	 *
	 * @param array $input Contains all settings fields as array keys.
	 * @return array
	 */
	public function sanitize_profiles( $input ) {
		$new_input = array();
		// Sanitize Social Profiles values.
		foreach ( (array) $input as $name => $element ) {
			foreach ( $element as $index => $value ) {
				if ( ! empty( $value ) ) {
					$new_input[ $name ][ $index + 1 ] = esc_url( $value );
				}
			}
		}

		return $new_input;
	}

	/**
	 * 	/**
	 * Sanitize each setting field as needed.
	 *
	 * @param array $input Contains all settings fields as array keys.
	 * @return array
	 */
	public function sanitize_copyright( $input ) {
		// Sanitize Copyright value.
		if ( isset( $input ) ) {
			$new_input = ! empty( $input ) ? esc_html( $input ) : $this->get_default_copyright();
		} else {
			$new_input = $this->get_default_copyright();
		}

		return $new_input;
	}

	/**
	 * Return default copyright field text.
	 *
	 * @return string
	 */
	public function get_default_copyright() {
		return sprintf( esc_html__( 'Copyright © %d. %s. All Rights Reserved.', 'dco' ), date( 'Y' ), get_bloginfo( 'name' ) );
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		esc_html_e( 'Enter your settings below:', 'dco' );
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function social_profile_callback() {
		if ( ! empty( $this->options['w4p_social_profiles'] ) ) {
			foreach ( (array) $this->options['w4p_social_profiles'] as $name => $element ) {
				foreach ( $element as $index => $value ) { ?>
					<div class="w4p-social-profile">
						<label for="w4p_social_profiles_<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $index + 1 ); ?>" class="w4p-option-label">
							<?php echo esc_html( $this->social[ $name ] ); ?>:
						</label>
						<input
							type="text"
							id="w4p_social_profiles_<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $index + 1 ); ?>"
							name="w4p_social_profiles[<?php echo esc_attr( $name ); ?>][]"
							class="<?php echo esc_attr( $name ); ?>"
							value="<?php echo esc_attr( $value ); ?>"
							placeholder="<?php esc_attr_e( 'http://', 'dco' ); ?>"
						/>
						<button class="button w4p-social-remove"><b>&#8211;</b></button>
					</div>
					<?php
				}
			}
		} else { ?>
			<div class="w4p-social-profile">
				<label for="w4p_social_profiles_facebook_1" class="w4p-option-label"><?php echo esc_html( $this->social['facebook'] ); ?>:</label>
				<input
					type="text"
					id="w4p_social_profiles_facebook_1"
					name="w4p_social_profiles[facebook][]"
					class="facebook"
					value=""
					placeholder="<?php esc_attr_e( 'http://', 'dco' ); ?>"
				/>
				<button class="button w4p-social-remove">-</button>
			</div>
			<?php	} ?>

		<hr>
		<div class="w4p-social-profile-selector-wrapper">
			<label for="social_profile_selector" class="w4p-option-label"><?php esc_attr_e( 'Select profile: ', 'dco' ); ?></label>
			<select id="social_profile_selector">
				<?php
				foreach ( $this->social as $name => $option ) { ?>
					<option <?php selected( $name, 'facebook' ); ?> value="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $option ); ?></option>
				<?php } ?>
			</select>
			<button id="social_profile_add" class="button">Add new...</button>
		</div>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function contacts_callback() {
		?>
		<div class="w4p-contacts-wrapper">
			<label for="w4p_contacts_address" class="w4p-option-label"><?php esc_html_e( 'Address:', 'dco' ); ?></label>
			<input
				type="text"
				id="w4p_contacts_address"
				name="w4p_contacts_address"
				value="<?php echo ! empty( $this->options['w4p_contacts_address'] ) ? esc_attr( $this->options['w4p_contacts_address'] ) : '' ?>"
				placeholder="<?php esc_html_e( 'St George St, St Augustine, FL 32084, USA', 'dco' ); ?>"
			/>
			<hr>
			<label for="w4p_contacts_phones" class="w4p-option-label"><?php esc_html_e( 'Telephones:', 'dco' ); ?></label>
			<input
				type="text"
				id="w4p_contacts_phones"
				name="w4p_contacts_phones"
				value="<?php echo ! empty( $this->options['w4p_contacts_phones'] ) ? esc_attr( $this->options['w4p_contacts_phones'] ) : '' ?>"
				placeholder="<?php esc_html_e( '+38 (123) 123-456-7, +38 (222) 765-432-1', 'dco' ); ?>"
			/>
			<hr>
			<label for="w4p_contacts_skype" class="w4p-option-label"><?php esc_html_e( 'Skype:', 'dco' ); ?></label>
			<input
				type="text"
				id="w4p_contacts_skype"
				name="w4p_contacts_skype"
				value="<?php echo ! empty( $this->options['w4p_contacts_skype'] ) ? esc_attr( $this->options['w4p_contacts_skype'] ) : '' ?>"
				placeholder="<?php esc_html_e( 'Skype ID', 'dco' ); ?>"
			/>
		</div>
	<?php }


	/**
	 * Get the settings option array and print one of its values
	 */
	public function copyright_callback() {
		?>
		<div class="w4p-copyright-wrapper">
			<label for="w4p_copyright" class="w4p-option-label"><?php esc_html_e( 'Copyright:', 'dco' ); ?></label>
			<input
				type="text"
				id="w4p_copyright"
				name="w4p_copyright"
				value="<?php echo ! empty( $this->options['w4p_copyright'] ) ? esc_attr( $this->options['w4p_copyright'] ) : '' ?>"
				placeholder="<?php echo esc_attr( $this->get_default_copyright() ); ?>"
			/>
		</div>
	<?php }
}

if ( is_admin() ) {
	$settings_page = new dcoSettingsPage();
}

function load_option_page_style() {
	wp_register_script( 'dco-options-script', get_template_directory_uri() . '/inc/js/theme_options.js', array( 'jquery' ), '1.0.0', true );
	wp_register_style( 'dco-options-style', get_template_directory_uri() . '/inc/css/theme_options.css' );
	wp_enqueue_script( 'dco-options-script' );
	wp_enqueue_style( 'dco-options-style' );
}

add_action( 'admin_enqueue_scripts', 'load_option_page_style' );