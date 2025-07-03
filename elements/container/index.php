<?php
/**
 * Custom Container element for WPBakery.
 * Allows nesting of other elements.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'vc_before_init', function () {
    require_once __DIR__ . '/custom-class.php';

	// Register "container" content element. It will hold all your inner (child) content elements.
	wpb_map(
		[
			'name'                    => __( 'Container', 'my-text-domain' ),
			'category'                => __( 'Test Elements', 'wpb-dev-example' ),
			'description'             => __( 'Container for other elements or nested shortcode realization', 'my-text-domain' ),
			'base'                    => 'your_gallery',
			// Use only|except attributes to limit child shortcodes.
			'as_parent'              => [
				'only' => 'vc_images_carousel, vc_single_image',
			],
			'content_element'        => true,
			'show_settings_on_create' => false,
			'is_container'           => true,
			'params'                 => [
				[
					'type'       => 'colorpicker',
					'heading'    => __( 'Background Color', 'my-text-domain' ),
					'param_name' => 'bg_color',
					'value'      => '#BED74247',
				],
			],
			'js_view'                => 'VcColumnView',
		]
	);
} );
