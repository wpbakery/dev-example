<?php
/**
 * Additional class that helps
 * with rendering and additional calculations WPBakery custom element.
 */

defined( 'ABSPATH' ) || exit;
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Custom WPBakery element class.
	 *
	 * @note Class name always should start with WPBakeryShortCode_ prefix.
	 * Another part of name should be the same as the base name of the element specified in vc_map.
	 * With appearance of underscores instead of dashes.
	 *
	 * @note you always should extend WPBakeryShortCode class to get all the necessary methods and properties.
	 */
	class WPBakeryShortCode_Custom_Pricing_Box extends WPBakeryShortCode {
		/**
		 * Calculate the final price after applying a discount.
		 *
		 * @param string $base_price
		 * @param string $discount
		 * @return float
		 */
		public function calculate_discounted_price( $base_price, $discount ) {
			$base_price = floatval( $base_price );
			$discount = floatval( $discount );
			$final_price = $base_price - ( $base_price * $discount / 100 );
			return round( $final_price, 2 );
		}

		/**
		 * Render the content of the custom pricing box.
		 *
		 * @param array $atts
		 * @param string $content
		 * @return string
		 */
		public function content( $atts, $content = '' ) {
			$atts = shortcode_atts([
				'title'      => 'Pro Plan',
				'base_price' => '99',
				'discount'   => '10',
				'label'      => 'Best Value!',
				'bg_color'   => '#ffffff',
			], $atts, 'custom_pricing_box');

			$final_price = $this->calculate_discounted_price( $atts['base_price'], $atts['discount'] );

			$style = 'background:' . esc_attr( $atts['bg_color'] ) . ';';
			$style .= 'border-radius:10px;padding:30px;text-align:center;';
			$style .= 'box-shadow:0 0 15px rgba(0,0,0,0.1);';

			$output = '<div class="custom-pricing-box" style="' . $style . '">';
			$output .= '<h2 style="margin-bottom:10px;">' . esc_html( $atts['title'] ) . '</h2>';
			$output .= '<p style="font-size:14px;color:#888;margin-bottom:20px;">' . esc_html( $atts['label'] ) . '</p>';
			$output .= '<div style="font-size:16px;color:#999;text-decoration:line-through;">$' . esc_html( $atts['base_price'] ) . '</div>';
			$output .= '<div style="font-size:28px;font-weight:bold;margin:10px 0 20px;">$' . esc_html( $final_price ) . '</div>';
			$output .= '<div style="text-align:left;">' . wp_kses_post( $content ) . '</div>';
			$output .= '</div>';

			return $output;
		}
	}
}
