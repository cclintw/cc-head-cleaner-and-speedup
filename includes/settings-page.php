<?php
/**
 * Register admin menu and settings for the plugin.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access.
}

/**
 * Add a submenu item under Settings menu
 */
function cchcs_add_settings_page() {
    add_options_page(
        __( 'Site Cleaner & Speed Up', 'cc-head-cleaner-and-speedup' ), // Page title
        __( 'Site Cleanup', 'cc-head-cleaner-and-speedup' ),             // Menu label
        'manage_options',                                               // Capability required
        'cchcs-settings',                                               // Menu slug
        'cchcs_render_settings_page'                                    // Callback to render content
    );
}
add_action( 'admin_menu', 'cchcs_add_settings_page' );

/**
 * Render the plugin settings page
 */
function cchcs_render_settings_page() {
    include CCHCS_PLUGIN_DIR . 'includes/settings-ui.php';
}

/**
 * Register plugin settings for storing options
 */
add_action( 'admin_init', function () {
    register_setting( 'cchcs_settings_group', 'cchcs_settings' );
});