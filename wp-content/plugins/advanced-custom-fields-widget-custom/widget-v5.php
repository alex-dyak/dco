<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if class exists, only run code if it does not
if ( ! class_exists( 'acf_5_field_widget' ) ) {

	class acf_5_field_widget extends acf_field {


		/**
		 *  Set everything up
		 */

		function __construct() {

			/**
			 * Name of field
			 */
			$this->name = 'cacf_cf7';

			/**
			 *  label visible when selecting a field type
			 */
			$this->label = __( 'Widget', 'acf_widget' );

			/**
			 *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
			 */
			$this->category = 'content';

			/**
			 *  defaults (array) Array of default settings which are merged into the field object.
			 */
			$this->defaults = array();

			/**
			 *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
			 *  var message = acf._e('FIELD_NAME', 'error');
			 */
			$this->l10n = array();

			// do not delete!
			parent::__construct();

		}

		/**
		 *  Create the HTML interface for your field
		 *
		 * @param    $field (array) the $field being rendered
		 *
		 * @param    $field (array) the $field being edited
		 *
		 * @return    n/a
		 */

		function render_field( $field ) {

			// create Field HTML
			echo sprintf( '<select id="%d" class="%s" name="%s">', esc_attr( $field['id'] ), esc_attr( $field['class'] ), esc_attr( $field['name'] ) );

			global $wp_widget_factory;
			$i = 0;

			foreach ( $wp_widget_factory->widgets as $widget_class => $widget_args ) {
				$widgets[ $i ]['id']   = $widget_class;
				$widgets[ $i ]['name'] = $widget_args->name;
				$i ++;
			}

			foreach ( $widgets as $widget ) {
				$selected = selected( $field['value'], $widget['id'] );
				echo sprintf( '<option value="%1$s" %3$s>%2$s</option>', esc_attr( $widget['id'] ), esc_attr( $widget['name'] ), $selected );
			}

			echo '</select>';

		}

		/**
		 *
		 *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
		 *
		 * @param    $value (mixed) the value which was loaded from the database
		 * @param    $post_id (mixed) the $post_id from which the value was loaded
		 * @param    $field (array) the field array holding all the field options
		 *
		 * @return string The HTML value of the sidebar.
		 */
		function format_value( $value, $post_id, $field ) {

			// bail early if no value
			if ( empty( $value ) ) {
				return;
			}

			if ( class_exists( $value ) ) {

				$widget    = new $value;
				$settings  = $widget->get_settings();
				$instances = $params = array();

				if ( ! empty( $settings ) && is_array( $settings ) ) {
					foreach ( array_values( $settings ) as $args ) {
						if ( ! empty( $args ) ) {
							foreach ( $args as $argument => $arg_value ) {
								$instances[] = $argument . '=' . $arg_value;
							}
						}
					}

					$params = implode( ',', $instances );
				}


				the_widget( $value, $params );
			}

		}

	}

	// create field
	new acf_5_field_widget();

}