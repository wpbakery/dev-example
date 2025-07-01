<?php
/*
 * The basic element with custom php class that helps with element setting and rendering.
 */

defined( 'ABSPATH' ) || exit;

include_once( __DIR__ . '/custom-class.php' );

add_action('vc_before_init', 'vc_dev_example_with_custom_class');
if ( ! function_exists( 'vc_dev_example_with_custom_class' ) ) :
    /**
     * Registers custom element in WPBakery with custom class.
     *
     * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
     *
     * @see https://kb.wpbakery.com/docs/inner-api/vc_map/ for all possible vc_map parameters.
     */
    function vc_dev_example_with_custom_class() {
        vc_map([
            'name'        => __('With Custom Class', 'vc-dev-example'),
            'base'        => 'custom_pricing_box',
            'category'    => __('Test Elements', 'vc-dev-example'),
            'description' => __('Pricing box with discount logic that is calculated in php class.', 'vc-dev-example'),
            'params'      => [
                [
                    'type'       => 'textfield',
                    'heading'    => __('Title', 'vc-dev-example'),
                    'param_name' => 'title',
                    'value'      => __('Pro Plan', 'vc-dev-example'),
                ],
                [
                    'type'       => 'textfield',
                    'heading'    => __('Base Price ($)', 'vc-dev-example'),
                    'param_name' => 'base_price',
                    'value'      => '99',
                ],
                [
                    'type'       => 'textfield',
                    'heading'    => __('Discount (%)', 'vc-dev-example'),
                    'param_name' => 'discount',
                    'value'      => '10',
                ],
                [
                    'type'       => 'textfield',
                    'heading'    => __('Label', 'vc-dev-example'),
                    'param_name' => 'label',
                    'value'      => __('Best Value!', 'vc-dev-example'),
                ],
                [
                    'type'       => 'colorpicker',
                    'heading'    => __('Background Color', 'vc-dev-example'),
                    'param_name' => 'bg_color',
                    'value'      => '#ffffff',
                ],
                [
                    'type'       => 'textarea_html',
                    'value_type' => 'html',
                    'heading'    => __('Features List', 'vc-dev-example'),
                    'param_name' => 'content',
                    'value'      => '<br />10 Projects<br />5 Team Members<br />Premium Support<br />',
                ],
            ],
        ]);
    }
endif;
