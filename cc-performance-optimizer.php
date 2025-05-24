<?php
/**
 * Plugin Name: Head Cleaner & Speed Up
 * Description: Make your WordPress website faster and cleaner! This plugin makes it easy to remove unnecessary code—including meta, link, css, and script tags—from the <head> section of your page source, and to disable features you don’t need
 * Version: 1.0
 * Author: Chance Lin
 * Author URI: https://cclin.cc/
 * Text Domain: cc-performance-optimizer
 * Domain Path: /languages
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

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

add_filter('plugin_row_meta', 'ccpo_plugin_row_meta', 10, 2);

function ccpo_plugin_row_meta($meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $meta[] = __('Update Pro', 'cc-performance-optimizer');
        $meta[] = '<a href="#">' . esc_html__('View Details', 'cc-performance-optimizer') . '</a>';
    }
    return $meta;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), function($links) {
    $settings = '<a href="' . admin_url('admin.php?page=ccpo-settings') . '">設定</a>';
    $docs = '<a href="https://yourplugin.com/docs" target="_blank">說明</a>';
    $github = '<a href="https://github.com/yourname/yourplugin" target="_blank">GitHub</a>';
    //array_unshift($links, $settings);//此行是加到最左邊
    $links[] = $docs;
    $links[] = $github;
    return $links;
});

// Load plugin core files
require_once CCPO_PLUGIN_DIR . 'includes/settings-page.php';
require_once CCPO_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once CCPO_PLUGIN_DIR . 'includes/feature-toggle.php';
require_once CCPO_PLUGIN_DIR . 'includes/config-writer.php';

