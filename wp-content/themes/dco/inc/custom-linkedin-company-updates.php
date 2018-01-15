<?php

if ( ! class_exists( 'Custom_Linkedin_Company_Updates' ) ) {

	class Custom_Linkedin_Company_Updates extends Linkedin_Company_Updates {

		//---- Set up variables
		protected $client_id     = '';
		protected $redirect_url  = '';
		protected $admin_url     = '';
		protected $token_life    = 0;
		protected $tag           = 'linkedin_company_updates';
		protected $version       = '1.5.3';
		protected $options       = array();
		protected $meta_boxes    = array();

		public function __construct() {

			// call Grandpa's constructor
			parent::__construct();

		}


		/**
		 * Add the handy settings link to the plugins page
		 * @param   array Links for the plugin page
		 */
		public function add_plugin_links ( $links ) {
			$links[] = '<a href="' . $this->admin_url . '">' . __( 'Settings', 'company-updates-for-linkedin' ) . '</a>';
			return $links;
		}

		/**
		 * Setup the settings page for the plugin
		 */
		public function admin_menu() {
			$title = __( 'Linkedin Company Updates', 'company-updates-for-linkedin' );
			add_options_page( $title, $title, 'manage_options', $this->tag, array( $this, 'settings_page' ) );
		}

		/**
		 * Enqueue javascript
		 */
		public function admin_enqueue_script() {
			wp_enqueue_script( $this->tag . '_script', plugins_url( 'js/script.js' ), null, $this->version );
			wp_enqueue_style( $this->tag . '_style', plugins_url( 'css/style-admin.css' ), null, $this->version );
		}

		/**
		 * Constructs a string detailing how long the access token remains valid for
		 * @return number Difference between access token & the current time in milliseconds
		 */
		public function token_life() {

			$life = intval( $this->auth_options['expires_in'] ) - strtotime( date('Y-m-d H:m:s') );

			// if the token is past expiration, deal with it
			if ( 0 > $life ) {

				$life = false;

				// check if we should send an email
				if ( isset( $this->options['email-when-expired'] ) && $this->options['email-when-expired'] && ! get_option( $this->tag . '_emailed' ) ) {

					// store that we already emailed an admin
					update_option( $this->tag . '_emailed', 1 );

					// email
					$this->email_admin();

				}

				// add an admin notification
				add_action( 'admin_notices', array( &$this, 'regenerate_notification') );

			}

			$this->token_life = $life;
			return;

		}

		/**
		 * Setup the settings page for the plugin
		 */
		public function settings_sections() {

			foreach ( $this->meta_boxes as $section => $meta_box ) {

				$section_id = $this->tag . '_' . $section;

				// add the plugin settings section
				add_settings_section(
					$section_id,
					null,
					null,
					$section
				);

				// build the settings fields
				foreach ( $meta_box['settings'] as $id => $options ) {
					$options['id'] = $id;
					add_settings_field(
						$this->tag . '_' . $id . '_settings',
						$options['title'],
						array( &$this, 'settings_field' ),
						$section,
						$section_id,
						$options
					);
				}

				// register validation
				register_setting(
					$section,
					$this->tag,
					array( &$this, 'settings_validate' )
				);

			}



		}

		/**
		 * Validate settings
		 * @param  array $input Form fields to be evaluated
		 * @return mixed        Returns the input iff it is valid
		 */
		public function settings_validate( $input ) {
			return $input;
		}

		/**
		 * Add input fields to the settings section
		 * @param  array  $options Options regarding how to build the HTML
		 * @return string          HTML for each settings field
		 */
		public function settings_field( array $options = array() ) {

			$type = $options['type'];

			switch ( $type ) {

				// authorize button
				case 'authorize':
					$this->echo_auth_html();
					break;

				// redirect url
				case 'redirect':
					$string = __('Add this URL to your LinkedIn App\'s <i>Authorized Redirect URLs</i>:', 'company-updates-for-linkedin');

					echo <<< HTML
						<p>
							$string
							<br />
							<input class="lcu-fullwidth" type="text" readonly onclick="this.select()" value="$this->redirect_url" />
						</p>
HTML;
break;

				// text / number / checkbox
				default:
					$title       = $options['title'];
					$type        = $options['type'];
					$id          = $options['id'];
					$id_string   = $this->tag . '_' . str_replace( ' ', '-', $id );
					$name        = $this->tag . '[' . $id . ']';
					$placeholder = isset( $options['placeholder'] ) ? 'placeholder="' . $options['placeholder'] . '"' : '';
					$description = isset( $options['description'] ) ? $options['description'] : '';

					// set the value
					if ( isset( $this->options[ $id ] ) && $this->options[ $id ] ) {

						$value = 'checkbox' === $type ? '1" checked="checked' : $this->options[ $id ];

					} else {

						$value = 'checkbox' === $type ? 1 : '';

					}

					echo <<< HTML
					<label>
						<input type="$type" name="$name" value="$value" id="$id_string" $placeholder />
						$description
					</label>
HTML;
break;

			}

		}

		/**
		 * echos out the reauthorize button for the access token
		 */
		public function echo_auth_html() {

			// Build parameters for the authorize link
			$_SESSION['state'] = $state = substr(md5(rand()), 0, 7);
		    $params = array(
				'response_type' => 'code',
				'client_id'     => $this->client_id,
				'state'         => $state,
				'redirect_uri'  => $this->redirect_url,
		    );

		    // if re-authorizing
			if( $this->auth_options ) {

				$authorize_string      = 'Regenerate Access Token';
				$authorization_message = '<p>' . $this->get_auth_expiration_string( $this->auth_options['expires_in'] ) . '</p>';

			// if authorizing for the first time
			} else {

				$authorize_string      = 'Authorize Me';
				$authorization_message = '<p>' . __('You must authorize first to create a shortcode.', 'company-updates-for-linkedin') . '</p>';

			}

			// Output all the things
			echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query( $params ) . '" id="authorize-linkedin" class="button-secondary">' . $authorize_string . '</a>';
			echo $authorization_message;

		}

		/**
		 * Generates a string reflecting when a token will expire
		 * @param  number $time Unix Timestamp
		 * @return string
		 */
		private function get_auth_expiration_string( $time ) {

			if ( $this->token_life ) {

				$datetime = new DateTime( '@' . $this->token_life, new DateTimeZone('UTC') );
				$date     = new DateTime();
				$times    = array(
					'days'    => $datetime->format('z'),
					'hours'   => $datetime->format('G'),
				);
				$date->modify( '+' . $times['days'] . ' days' );

				return sprintf(
					__('Expires in %s days, %s hours ( <i>%s</i> ) ', 'company-updates-for-linkedin'),
					$times['days'],
					$times['hours'],
					$date->format('m / d / Y')
				);

			} else {

				return __('Authorization token has expired, please regenerate.', 'company-updates-for-linkedin');

			}

		}

		/**
		 * Fetches the API access token
		 * @param  string $code Linkedin API authentication code
		 * @return array | false
		 */
		private function get_access_token( $code ) {

			// build the url
			$params = array(
				'grant_type'    => 'authorization_code',
				'client_id'     => $this->client_id,
				'client_secret' => isset( $this->options['client-secret'] ) ? $this->options['client-secret'] : '',
				'code'          => $code,
				'redirect_uri'  => $this->redirect_url,
			);
			$url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query( $params );

			// get the json
			$json = $this->get_remote_json( $url, 'Failed to make request for access token.' );

			// if there's something wrong with the access token, say so
			if( ! isset( $json['access_token'] ) || 5 >= strlen( $json['access_token'] ) ) {

				$this->notification( __( 'Did not recieve an access token.', 'company-updates-for-linkedin' ) );
				return false;

			}

			return $json;

		}


		/**
		 * GETs remote json data
		 * @param  string $url           url from which to fetch the data
		 * @param  string $error_message Text error message
		 * @return array | false
		 */
		private function get_remote_json( $url, $error_message ) {

			// make the GET request
			$response = wp_remote_get( $url );

			// try to parse it
			try {

				$json = json_decode( $response['body'], 1 );

				// check for errors
				if ( isset( $json['error'] ) ) {

					throw new Error( $json['error_description'] );

				}

				return $json;

			// handle errors
			} catch ( Exception $ex ) {

				$this->notification( $ex->getMessage() );
				return false;

			}

		}

		/**
		 * Grabs data from the Linkedin API
		 * @param  string $path   Path to the resources relative to /companies
		 * @param  string $key    Array key to use for the json response
		 * @param  array  $params URL parameters
		 * @return array | false
		 */
		private function linkedin_api_call( $path, $key, $params = array() ) {

			// build the url
			$default_params = array(
				'format'              => 'json',
				'oauth2_access_token' => $this->auth_options['access_token']
			);
	 		$url = 'https://api.linkedin.com/v1/companies/' . $path . '?' . http_build_query( array_merge( $default_params, $params ) );

	 		// get the json
			$json = $this->get_remote_json( $url, __( 'Failed to make request for access token.', 'company-updates-for-linkedin' ) );

			// check for undesirable results
			if ( false === $json || ! isset( $json[ $key ] ) || empty( $json[ $key ] ) ) {
				return false;
			}

			return $json[ $key ];

		}




		/**
		 * Shortcode
		 * @param  array $atts User arguments
		 * @return string      HTML
		 */
		public function get_updates( $atts = null ) {

			// Set up shortcode attributes
			$args = shortcode_atts( array(
				'con_class'  => isset( $this->options['update-items-container-class'] ) ? $this->options['update-items-container-class'] : '',
				'item_class' => isset( $this->options['update-item-class'] ) ? $this->options['update-item-class'] : '',
				'company'    => isset( $this->options['company-id'] ) ? $this->options['company-id'] : '',
				'limit'      => isset( $this->options['limit'] ) ? $this->options['limit'] : '',
			), $atts );

			// Set up options
			$company_id = $args['company'];

			// Make sure auth token isn't expired
		    if ( $this->token_life ) {

		    	// make some linkedin api calls
				$array_updates = $this->linkedin_api_call( $company_id . '/updates', 'values', array( 'count' => $args['limit'], 'event-type' => 'status-update' ) );
				$logo_url      = $this->linkedin_api_call( $company_id . ':(id,name,ticker,description,square-logo-url)', 'squareLogoUrl', array() );

				// Build the list of updates
				$company_updates = '<ul id="linkedin-con" class="' . $args['con_class'] . '">';

				if ( $array_updates ) {
					foreach ($array_updates as $update) {

						// Set up the time ago strings
						$update_share = $update['updateContent']['companyStatusUpdate']['share'];


						// Add picture if there is one
						$img = '';
						if( array_key_exists( 'content', $update_share ) ) {
							$shared_content = $update_share['content'];

							if( array_key_exists( 'submittedImageUrl', $shared_content ) 
								&& 'https://static.licdn.com/scds/common/u/img/spacer.gif' !== $shared_content['submittedImageUrl'] ) {

									$update_image_url = $shared_content['submittedImageUrl'];
									$img = '<img alt="" class="linkedin-update-image" src="' . $update_image_url . '" />';
							}

						}

						// Filter the content for links
						$update_content = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a target="_blank" href="$1">$1</a>', $update_share['comment']);

						// Create the link to the post
						$update_pieces = explode( '-', $update['updateKey'] );
						$update_id = end( $update_pieces );

						// Add this item to the update string
						$company_updates .= '<li id="linkedin-item" class="' . $args['item_class'] . '">';
						$company_updates .= 	'<div>';
						$company_updates .= 		$img;
						$company_updates .= 		'<p>' . $update_content . '</p>';
						$company_updates .= 	'</div>';
						$company_updates .= '</li>';
					}
				} else {
					$company_updates .= '<li>' . __( 'Sorry, no posts were received from LinkedIn!', 'company-updates-for-linkedin' ) . '</li>';
				}
				$company_updates .= '</ul>';

				return $company_updates;
			}

		}

	}

	$custom_linkedin = new Custom_Linkedin_Company_Updates;
	$custom_linkedin->get_updates();
}
