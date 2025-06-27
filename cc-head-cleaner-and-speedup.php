<?php

/**
 * Plugin Name: CC Head Cleaner & Speed Up
 * Description: Make your WordPress website faster and cleaner! This plugin allows you to easily remove unnecessary meta, link, style, and script tags from your site's head and disable unused WordPress features
 * Version: 1.0.3
 * Author: Chance Lin
 * Author URI: https://github.com/cclintw
 * Text Domain: cc-head-cleaner-and-speedup
 * Domain Path: /languages
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Contributors: lin chun cheng
 * Donate link: https://www.paypal.me/chancelintw
 */


if (! defined('ABSPATH')) {
    exit; // Prevent direct access
}

/**
 * Define core plugin constants
 */
define('CCHCS_VERSION', '1.0');
define('CCHCS_PLUGIN_FILE', __FILE__);
define('CCHCS_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('CCHCS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CCHCS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CCHCS_PLUGIN_LANGUAGES', CCHCS_PLUGIN_DIR . 'languages');
define('CCHCS_PLUGIN_NAME', 'CC Head Cleaner & Speed Up'); // 顯示用名稱
define('CCHCS_TEXT_DOMAIN', 'cc-head-cleaner-and-speedup'); // 語系用 domain

/**
 * Load plugin translation files
 */
function cchcs_load_textdomain()
{
    load_plugin_textdomain('cc-head-cleaner-and-speedup', false, dirname(CCHCS_PLUGIN_BASENAME) . '/languages');
}
add_action('plugins_loaded', 'cchcs_load_textdomain');

/**
 * Add custom link to plugin row meta
 */

function cchcs_plugin_row_meta($meta, $plugin_file)
{
    if ($plugin_file === CCHCS_PLUGIN_BASENAME) {

        $locale = determine_locale(); // 取得目前語系

        if ($locale === 'zh_TW') {
            $details_file = 'includes/view-details-zh_TW.html';
        } else {
            $details_file = 'includes/view-details.html';
        }

        $meta[] = '<a href="' . CCHCS_PLUGIN_URL . $details_file . '?TB_iframe=true&width=772&height=587" class="thickbox">' . esc_html__('View Details', 'cc-head-cleaner-and-speedup') . '</a>';
    }
    return $meta;
}

add_filter('plugin_row_meta', 'cchcs_plugin_row_meta', 10, 2);

/**
 * Add settings link to plugin action links
 */
add_filter('plugin_action_links_' . CCHCS_PLUGIN_BASENAME, function ($links) {
    $settings = '<a href="' . admin_url('admin.php?page=cchcs-settings') . '">' . __('Settings', 'cc-head-cleaner-and-speedup') . '</a>';
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
register_activation_hook(CCHCS_PLUGIN_FILE, 'cchcs_write_wp_config_on_activation');
