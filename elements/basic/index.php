<?php
/**
 * The most basic element example base on regular WP shortcode.
 *
 * @see https://codex.wordpress.org/Shortcode
 */

defined( 'ABSPATH' ) || exit;

add_action( 'vc_before_init', 'wpb_dev_example_basic_element' );
if ( ! function_exists( 'wpb_dev_example_basic_element' ) ) :
	/**
	 * Registers a basic element with WPBakery.
	 *
	 * Here we specify all the parameters that help us see and edit the element in WPBakery editors.
	 *
	 * @see https://kb.wpbakery.com/docs/inner-api/vpb_map/ for all possible wpb_map parameters.
	 */
	function wpb_dev_example_basic_element() {
		wpb_map([
			'name'        => __( 'Basic', 'wpb-dev-example' ),
			// base should be the same as the shortcode slug.
			'base'        => 'wpb_dev_example_basic_element',
			'description' => __( 'Box with title and content', 'wpb-dev-example' ),
			'category'    => __( 'Test Elements', 'wpb-dev-example' ),
			'params'      => [
				[
					'type'       => 'textfield',
					'heading'    => __( 'Title', 'wpb-dev-example' ),
					'param_name' => 'text',
					'value'      => __( 'Welcome to My Box', 'wpb-dev-example' ),
				],
				[
					'type'       => 'textarea_html',
					'heading'    => __( 'Content', 'wpb-dev-example' ),
					'param_name' => 'content',
					'value'      => '<p>This is some example content. You can customize it using the WPBakery editor.</p>',
				],
				[
					'type'       => 'colorpicker',
					'heading'    => __( 'Background Color', 'wpb-dev-example' ),
					'param_name' => 'bg_color',
					'value'      => '#f7f7f7',
				],
				[
					'type'       => 'colorpicker',
					'heading'    => __( 'Text Color', 'wpb-dev-example' ),
					'param_name' => 'text_color',
					'value'      => '#222222',
				],
			],
		]);
	}
endif;

add_shortcode( 'wpb_dev_example_basic_element', 'wpb_dev_example_basic_shortcode' );
if ( ! function_exists( 'wpb_dev_example_basic_shortcode' ) ) :
	/**
	 * Shortcode handler for the custom box element.
	 *
	 * WPBakery uses regular WordPress shortcodes as the base output for its elements.
	 *
	 * @param array $atts
	 * @param string $content
	 * @return string
	 */
	function wpb_dev_example_basic_shortcode( $atts, $content = '' ) {
		$atts = shortcode_atts([
			'text'       => 'Welcome to My Box',
			'content'    => '',
			'bg_color'   => '#f7f7f7',
			'text_color' => '#222222',
		], $atts, 'custom_box');

		$style = 'background-color:' . esc_attr( $atts['bg_color'] ) . ';';
		$style .= 'color:' . esc_attr( $atts['text_color'] ) . ';';
		$style .= 'padding: 30px;';
		$style .= 'border-radius: 10px;';
		$style .= 'text-align: center;';
		$style .= 'box-shadow: 0 0 15px rgba(0,0,0,0.05);';

		$output = '<div style="' . $style . '">';

		if ( ! empty( $atts['text'] ) ) {
			$output .= '<h3 style="margin-bottom:15px;">' . esc_html( $atts['text'] ) . '</h3>';
		}

		if ( ! empty( $content ) ) {
			$output .= '<div style="font-size:16px;line-height:1.6;">' . wp_kses_post( $content ) . '</div>';
		}

		$output .= '</div>';

		return $output;
	}
endif;
