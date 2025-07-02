<?php
/**
 * Additional class that helps with rendering.
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	/**
	 * Custom WPBakery custom element class.
	 *
	 * @note you should extend your custom class with WPBakeryShortCodesContainer for the container element;
	 * otherwise, the element won't have all controls in the editor.
	 *
	 * @note class name always should start with WPBakeryShortCode_ prefix.
	 * Another part of name should be the same as the base name of the element specified in vc_map with UPPER_SNAKE_CASE.
	 */
	class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
		/**
		 * Shortcode output.
		 *
		 * @param array  $atts    Shortcode attributes.
		 * @param string $content Shortcode content.
		 * @return string
		 */
		public function content( $atts, $content = '' ) {
			$atts = shortcode_atts(
				[
					'bg_color' => '#BED74247',
				],
				$atts,
				'your_gallery'
			);

			$style = 'background-color:' . esc_attr( $atts['bg_color'] ) . ';';
			$style .= 'padding: 30px; border-radius: 10px; margin-bottom: 20px;';

			$output  = '<div class="vc-dev-example-container" style="' . esc_attr( $style ) . '">';
			$output .= do_shortcode( $content );
			$output .= '</div>';

			return $output;
		}
	}
}
