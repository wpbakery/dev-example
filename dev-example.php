<?php
/**
 * Plugin Name:       WPBakery: Kitchen sink custom elements
 * Plugin URI:        https://github.com/wpbakery/vc-dev-example
 * Description:       Study code to see how you can achieve interesting things in WPBakery with your own custom content elements
 * Author:            Michael M - WPBakery.com
 * Author URI:        http://wpbakery.com
 * Text Domain:       wpb-dev-example
 * Domain Path:       /languages
 * Version:           1.0
 *
 * Requires at least: 4.9
 * Requires PHP:      5.6
 */

defined( 'ABSPATH' ) || exit;

const WPB_DEV_EXAMPLE_VERSION = '1.0';

add_action( 'admin_notices', 'wpb_test_map_dependencies' );
if ( ! function_exists( 'wpb_test_map_dependencies' ) ) :
    /**
     * Test if WPBakery Page Builder is installed and activated.
     */
    function wpb_test_map_dependencies() {
        if ( ! defined( 'WPB_WPB_VERSION' ) ) {
            echo '
            <div class="updated">
                <p><strong>WPBakery: Kitchen sink custom elements</strong> ' . esc_html__( 'requires', 'wpb-dev-example' ) . ' <strong><a href="https://wpbakery.com/wpbakery-page-builder-license" target="_blank">WPBakery</a></strong> ' . esc_html__( 'plugin to be installed and activated on your site.', 'wpb-dev-example' ) . '</p>
            </div>';
        }
    }
endif;


require_once __DIR__ . '/elements/basic/index.php';
require_once __DIR__ . '/elements/with-custom-class/index.php';
require_once __DIR__ . '/elements/html-template-base/index.php';
require_once __DIR__ . '/elements/with-custom-param/index.php';
require_once __DIR__ . '/elements/container/index.php';
