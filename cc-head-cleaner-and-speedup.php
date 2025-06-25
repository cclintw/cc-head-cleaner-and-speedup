<?php
/**
 * Plugin Name: CC Head Cleaner & Speed Up
 * Description: Make your WordPress website faster and cleaner! This plugin allows you to easily remove unnecessary <meta>, <link>, <style>, and <script> tags from your site's <head> and disable unused WordPress features
 * Version: 1.0
 * Author: Chance Lin
 * Author URI: https://github.com/cclintw
 * Text Domain: cc-head-cleaner-and-speedup
 * Domain Path: /languages
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access.
}

// Define plugin directory path constant
define( 'CCHCS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Load plugin translation files
 */
function cchcs_load_textdomain() {
    load_plugin_textdomain( 'cc-head-cleaner-and-speedup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'cchcs_load_textdomain' );

/**
 * Add custom link to plugin row meta
 */
function cchcs_plugin_row_meta( $meta, $plugin_file ) {
    if ( $plugin_file === plugin_basename( __FILE__ ) ) {
         //TB_iframe
        $meta[] = '<a href="' . plugins_url('includes/details-content-txt.php', __FILE__) . '?TB_iframe=true&width=772&height=617" class="thickbox">' . esc_html__('View Details', 'cc-head-cleaner-and-speedup') . '</a>';
    }
    return $meta;
}
add_filter( 'plugin_row_meta', 'cchcs_plugin_row_meta', 10, 2 );

/**
 * Add settings link to plugin action links
 */

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function( $links ) {
    $settings = '<a href="' . admin_url( 'admin.php?page=ccpo-settings' ) . '">' . __( 'Settings','cc-head-cleaner-and-speedup' ) . '</a>';
    $links[] = $settings;
    return $links;
});

// Include core files with proper validation
require_once CCHCS_PLUGIN_DIR . 'includes/settings-page.php';
require_once CCHCS_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once CCHCS_PLUGIN_DIR . 'includes/feature-toggle.php';
require_once CCHCS_PLUGIN_DIR . 'includes/config-writer.php';

/**
 * Ensure wp-config.php updates run on plugin activation
 */
register_activation_hook( __FILE__, 'cchcs_write_wp_config_on_activation' );
