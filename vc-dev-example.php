<?php
/**
 * Plugin Name:       WPBakery: Kitchen sink custom elements
 * Plugin URI:        https://github.com/wpbakery/vc-dev-example
 * Description:       Study code to see how you can achieve interesting things in WPBakery with your own custom content elements
 * Author:            Michael M - WPBakery.com
 * Author URI:        http://wpbakery.com
 * Text Domain:       vc-dev-example
 * Domain Path:       /languages
 * Version:           0.2
 *
 * Requires at least: 4.9
 * Requires PHP:      5.6
 */

defined( 'ABSPATH' ) || exit;

function test_vc_map_dependencies() {
	if ( ! defined( 'WPB_VC_VERSION' ) ) {
		$plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="https://wpbakery.com/wpbakery-page-builder-license" target="_blank">WPBakery</a></strong> plugin to be installed and activated on your site.', 'vc-dev-example'), $plugin_data['Name']).'</p>
        </div>';
	}
}
add_action( 'admin_notices', 'test_vc_map_dependencies' );

include_once( __DIR__ . '/elements/basic/index.php' );
