<?php
/**
 * Plugin Name: CC WP Performance and Optimizer
 * Description: Clean unnecessary Meta/Link/Script elements from the <head>, remove unused default WordPress scripts/styles and external requests to improve performance, security, and privacy compliance.
 * Version: 1.0
 * Author: Chance Lin
 * Text Domain: cc-performance-optimizer
 * Domain Path: /languages
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Register activation hook ONLY in main plugin file
// In your main plugin file, use:
register_activation_hook( __FILE__, 'ccpo_write_wp_config_on_activation' );

// Define plugin directory path constant
define( 'CCPO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function ccpo_load_plugin_textdomain() {
    load_plugin_textdomain(
        'cc-performance-optimizer',
        false,
        dirname(plugin_basename(__FILE__)) . '/languages'
    );
}
add_action('plugins_loaded', 'ccpo_load_plugin_textdomain');

// Load plugin core files
require_once CCPO_PLUGIN_DIR . 'includes/settings-page.php';
require_once CCPO_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once CCPO_PLUGIN_DIR . 'includes/feature-toggle.php';
require_once CCPO_PLUGIN_DIR . 'includes/config-writer.php';

// 額外顯示多語描述於後台外掛列表中
add_filter('plugin_row_meta', 'ccpo_custom_plugin_description', 10, 2);
function ccpo_custom_plugin_description($plugin_meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $plugin_meta[] = '<span style="color: #666;">' . esc_html__(
            'Clean unnecessary head elements to improve performance, security, and privacy.',
            'cc-performance-optimizer'
        ) . '</span>';
    }
    return $plugin_meta;
}