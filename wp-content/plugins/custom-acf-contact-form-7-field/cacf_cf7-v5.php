<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// check if class already exists
if ( ! class_exists( 'acf_field_cacf_form' ) ) :


	class acf_field_cacf_form extends acf_field {


		/*
		*  __construct
		*
		*  This function will setup the field type data
		*
		*  @type	function
		*  @date	5/03/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function __construct() {

			/*
			*  name (string) Single word, no spaces. Underscores allowed
			*/

			$this->name = 'cacf_form';


			/*
			*  label (string) Multiple words, can include spaces, visible when selecting a field type
			*/

			$this->label = __( 'Custom ACF: Form', 'acf-cacf_form' );


			/*
			*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
			*/

			$this->category = 'basic';


			/*
			*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
			*/

			$this->defaults = array(
				'font_size' => 14,
			);


			/*
			*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
			*  var message = acf._e('cacf_form', 'error');
			*/

			$this->l10n = array(
				'error' => __( 'Error! Please enter a higher value', 'acf-cacf_form' ),
			);


			// do not delete!
			parent::__construct();

		}

		/*
		*  render_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param	$field (array) the $field being rendered
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

		function render_field( $field ) {


			/*
			*  Create a simple text input using the 'font_size' setting.
			*/
			echo sprintf( '<select id="%d" class="%s" name="%s">', esc_attr( $field['id'] ), esc_attr( $field['class'] ), esc_attr( $field['name'] ) );

			$forms = get_posts( array(
				'post_type'      => 'wpcf7_contact_form',
				'orderby'        => 'id',
				'order'          => 'ASC',
				'posts_per_page' => - 1,
			) );

			if ( $forms ) {
				foreach ( $forms as $k => $form ) {
					$key      = $form->ID;
					$value    = $form->post_title;
					$selected = '';

					// Mark form as selected as required
					if ( is_array( $field['value'] ) ) {
						// If the value is an array (multiple select), loop through values and check if it is selected
						if ( in_array( $key, $field['value'] ) ) {
							$selected = 'selected="selected"';
						}
					} else {
						// If not a multiple select, just check normaly
						if ( $key == $field['value'] ) {
							$selected = 'selected="selected"';
						}
					}

					echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
				}
			}

			echo '</select>';

		}

	}


// initialize
	new acf_field_cacf_form();


// class_exists check
endif;

?>
