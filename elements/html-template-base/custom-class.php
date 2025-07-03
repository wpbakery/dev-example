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
	class WPBakeryShortCode_Test_Element extends WPBakeryShortCode {

		/**
		 * Constructor
		 *
		 * @param array $settings
		 */
		public function __construct( $settings ) {
			parent::__construct( $settings ); // Important to call parent constructor to activate all logic for shortcode.
			$this->element_enqueueing_assets();
		}

		/**
		 * Register scripts and styles there (for preview and frontend editor mode).
		 */
		public function element_enqueueing_assets() {
			wp_register_script( 'test_element', plugins_url( 'assets/js/test_element.js', __FILE__ ), [ 'jquery' ], time(), false );

			// Enqueue Custom JS Script.
			wp_enqueue_script( 'test_element' );
		}

		/**
		 * Some custom helper function that can be used in content element template
		 * This function check some string if it matches "yes","true",1,"1" return TRUE if yes, false if NOT.
		 *
		 * @param string $value
		 *
		 * @return bool
		 */
		public function check_bool( $value ) {
			if ( strlen( $value ) > 0 && in_array( strtolower( $value ), [
				'yes',
				'true',
				'1',
				1,
			] )
			) {
				return true;
			}
			return false;
		}
	}
}
