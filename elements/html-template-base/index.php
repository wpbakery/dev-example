<?php
/**
 * Custom element with rendering in an HTML template
 * that specifies by the html_template vc_map parameter.
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/custom-class.php';

add_action( 'vc_before_init', 'vc_dev_example_html_template_base_example' );
if ( ! function_exists( 'vc_dev_example_html_template_base_example' ) ) :
	/**
	 * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
	 *
	 * @see https://kb.wpbakery.com/docs/inner-api/vc_map/ for all possible vc_map parameters.
	 *
	 * Main features:
	 * - Uses html_template vc_map parameter to specify file for element output.
	 * - JS/CSS files different for backend and frontend editors.
	 */
	function vc_dev_example_html_template_base_example() {
		vc_map( [
			// shortcode name.
			'name' => __( 'HTML template base', 'vc-dev-example' ),
			// shortcode base slug [test_element].
			'base' => 'test_element',
			// param category tab in add elements view.
			'category'                => __( 'Test Elements', 'vc-dev-example' ),
			// element description in add elements view.
			'description'             => __( 'Round chat rendering in template set in html_template vc_map.', 'vc-dev-example' ),
			// don't show params window after adding.
			'show_settings_on_create' => false,
			// Depends on ordering in list, Higher weight first.
			'weight'                  => -5,
			// if you extend WPBakery within your theme then you don't need this,
			// WPBakery will look for shortcode template in "wp-content/themes/your_theme/vc_templates/test_element.php" automatically.
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
					'heading'     => __( 'Chart value(1-100)', 'vc-dev-example' ),
					'param_name'  => 'value',
					'description' => __( 'Chart value(number).', 'vc-dev-example' ),
				],
				[
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => 'custom_class_for_element', // will be outputted in the backend editor.
					'heading'     => __( 'Content', 'vc-dev-example' ),
					'param_name'  => 'content', // param_name for textarea_html must be named "content".
					'value'       => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo..</p>',
					'description' => __( 'Dummy text for content element.', 'vc-dev-example' ),
				],
			],
		] );
	}
endif;
