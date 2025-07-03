<?php
/**
 * The basic element with custom php class that helps with element setting and rendering.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'vc_before_init', function () {
	require_once __DIR__ . '/custom-class.php';

	/**
	 * Registers custom element in WPBakery with custom class.
	 *
	 * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
	 *
	 * @see https://kb.wpbakery.com/docs/inner-api/wpb_map/ for all possible wpb_map parameters.
	 */
	wpb_map([
		'name'        => __( 'With Custom Class', 'wpb-dev-example' ),
		'base'        => 'custom_pricing_box',
		'category'    => __( 'Test Elements', 'wpb-dev-example' ),
		'description' => __( 'Pricing box with discount logic that is calculated in php class.', 'wpb-dev-example' ),
		'params'      => [
			[
				'type'       => 'textfield',
				'heading'    => __( 'Title', 'wpb-dev-example' ),
				'param_name' => 'title',
				'value'      => __( 'Pro Plan', 'wpb-dev-example' ),
			],
			[
				'type'       => 'textfield',
				'heading'    => __( 'Base Price ($)', 'wpb-dev-example' ),
				'param_name' => 'base_price',
				'value'      => '99',
			],
			[
				'type'       => 'textfield',
				'heading'    => __( 'Discount (%)', 'wpb-dev-example' ),
				'param_name' => 'discount',
				'value'      => '10',
			],
			[
				'type'       => 'textfield',
				'heading'    => __( 'Label', 'wpb-dev-example' ),
				'param_name' => 'label',
				'value'      => __( 'Best Value!', 'wpb-dev-example' ),
			],
			[
				'type'       => 'colorpicker',
				'heading'    => __( 'Background Color', 'wpb-dev-example' ),
				'param_name' => 'bg_color',
				'value'      => '#ffffff',
			],
			[
				'type'       => 'textarea_html',
				'value_type' => 'html',
				'heading'    => __( 'Features List', 'wpb-dev-example' ),
				'param_name' => 'content',
				'value'      => '<br />10 Projects<br />5 Team Members<br />Premium Support<br />',
			],
		],
	]);
});
