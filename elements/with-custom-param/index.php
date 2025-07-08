<?php
/**
 * Custom element with a custom param type for WPBakery.
 */

defined( 'ABSPATH' ) || exit;

// Include the custom param type registration and styles.
require_once __DIR__ . '/custom-param.php';

/**
 * Registers new element with WPBakery.
 *
 * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
 *
 * @see https://kb.wpbakery.com/docs/inner-api/wpb_map/ for all possible wpb_map parameters.
 */
add_action('vc_before_init', function () {
	wpb_map([
		'name'        => __( 'With Custom Param', 'dev-example' ),
		'base'        => 'wpb_dev_example_custom_radio_param',
		'description' => __( 'Element with custom multi checkboxes param type', 'dev-example' ),
		'category'    => __( 'Test Elements', 'dev-example' ),
		'params'      => [
			[
				'type'        => 'custom_radio',
				'heading'     => __( 'Choose checkboxes', 'dev-example' ),
				'param_name'  => 'checkbox_choice',
				'options'     => [
					'option1' => __( 'Option 1', 'dev-example' ),
					'option2' => __( 'Option 2', 'dev-example' ),
					'option3' => __( 'Option 3', 'dev-example' ),
				],
				'description' => __( 'Select one or more checkboxes.', 'dev-example' ),
				'value'       => 'option1',
			],
		],
	]);
});

/**
 * Shortcode handler for new element.
 *
 * WPBakery uses regular WordPress shortcodes as the base output for its elements.
 *
 * @param array $atts
 * @return string
 */
add_shortcode('wpb_dev_example_custom_radio_param', function ( $atts ) {
	$atts = shortcode_atts([
		'checkbox_choice' => 'option1',
	], $atts, 'wpb_dev_example_custom_radio_param');

	$output = '<div class="custom-checkbox-param-frontend">';
	$output .= '<strong>Selected checkbox(es):</strong> ' . esc_html( $atts['checkbox_choice'] );
	$output .= '</div>';
	return $output;
});
