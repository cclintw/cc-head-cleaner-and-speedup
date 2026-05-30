<?php
/*
 * Plugin Name: CC Head Cleaner & Speed Up
 * Description: Clean WordPress head output and optionally disable selected features for a lighter frontend.
 * Version: 1.0.3
 * Author: Chance Lin
 * Text Domain: cc-head-cleaner-and-speedup
 * Domain Path: /languages
 * Author URI: https://cclin.cc
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access
}

/**
 * Define core plugin constants
 */
define('CCHCS_VERSION', '1.0.3');
define('CCHCS_PLUGIN_FILE', __FILE__);
define('CCHCS_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('CCHCS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CCHCS_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Add settings link to plugin action links
 */
add_filter('plugin_action_links_' . CCHCS_PLUGIN_BASENAME, function ($links) {
    $settings = sprintf(
        '<a href="%1$s">%2$s</a>',
        esc_url(admin_url('options-general.php?page=cchcs-settings')),
        esc_html__('Settings', 'cc-head-cleaner-and-speedup')
    );
    $links[] = $settings;
    return $links;
});

// Include core files with proper validation
require_once CCHCS_PLUGIN_DIR . 'includes/settings-page.php';
require_once CCHCS_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once CCHCS_PLUGIN_DIR . 'includes/feature-toggle.php';
