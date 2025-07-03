<?php
/**
 * Custom element with rendering in an HTML template
 * that specifies by the html_template wpb_map parameter.
 */

defined( 'ABSPATH' ) || exit;


add_action( 'vc_before_init', function () {
	require_once __DIR__ . '/custom-class.php';

	/**
	 * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
	 *
	 * @see https://kb.wpbakery.com/docs/inner-api/wpb_map/ for all possible wpb_map parameters.
	 *
	 * Main features:
	 * - Use html_template wpb_map parameter to specify file for element output.
	 * - JS/CSS files different for backend and frontend editors.
	 */
	wpb_map( [
		// shortcode name.
		'name' => __( 'HTML template base', 'wpb-dev-example' ),
		// shortcode base slug [test_element].
		'base' => 'test_element',
		// param category tab in add elements view.
		'category'                => __( 'Test Elements', 'wpb-dev-example' ),
		// element description in add elements view.
		'description'             => __( 'Round chat rendering in template set in html_template wpb_map.', 'wpb-dev-example' ),
		// don't show params window after adding.
		'show_settings_on_create' => false,
		// Depends on ordering in list, Higher weight first.
		'weight'                  => -5,
		// if you extend WPBakery within your theme then you don't need this,
		// WPBakery will look for shortcode template in "wp-content/themes/your_theme/wpb_templates/test_element.php" automatically.
		// In this example we are extending WPBakery from plugin, so we rewrite template.
		'html_template'           => __DIR__ . '/templates/test_element.php',
		// This will load extra js file in backend (when you edit page with WPBakery).
		// use preg replace to be sure that "space" will not break logic.
		'admin_enqueue_js'        => preg_replace( '/\s/', '%20', plugins_url( 'assets/js/admin_enqueue.js', __FILE__ ) ),
		// This will load extra css file in backend (when you edit page with WPBakery).
		'admin_enqueue_css'       => preg_replace( '/\s/', '%20', plugins_url( 'assets/css/admin_enqueue.css', __FILE__ ) ),
		// This will load extra js file in frontend editor (when you edit page with WPBakery).
		'front_enqueue_js'        => preg_replace( '/\s/', '%20', plugins_url( 'assets/js/front_enqueue.js', __FILE__ ) ),
		// This will load extra css file in frontend editor (when you edit page with WPBakery).
		'front_enqueue_css'       => preg_replace( '/\s/', '%20', plugins_url( 'assets/css/front_enqueue.css', __FILE__ ) ),
		// JS View name for backend editor. Can be used to override or add some logic for shortcodes in backend (cloning/rendering/deleting/editing).
		'js_view'                 => 'ViewTestElement',

		'params'                  => [
			[
				'type'        => 'textfield',
				'heading'     => __( 'Chart value(1-100)', 'wpb-dev-example' ),
				'param_name'  => 'value',
				'description' => __( 'Chart value(number).', 'wpb-dev-example' ),
			],
			[
				'type'        => 'textarea_html',
				'holder'      => 'div',
				'class'       => 'custom_class_for_element', // will be outputted in the backend editor.
				'heading'     => __( 'Content', 'wpb-dev-example' ),
				'param_name'  => 'content', // param_name for textarea_html must be named "content".
				'value'       => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo..</p>',
				'description' => __( 'Dummy text for content element.', 'wpb-dev-example' ),
			],
		],
	] );
} );
