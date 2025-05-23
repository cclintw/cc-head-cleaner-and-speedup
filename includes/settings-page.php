<?php
/**
 * Register admin menu and settings for the plugin.
 */

// Add a submenu item under "Settings"
function ccpo_add_settings_page() {
    add_options_page(
        __( 'WP Performance Optimizer Settings', 'cc-performance-optimizer' ),
        __( 'Performance Optimizer', 'cc-performance-optimizer' ),
        'manage_options',
        'ccpo-settings',
        'ccpo_render_settings_page'
    );
}
add_action( 'admin_menu', 'ccpo_add_settings_page' );

// Render the actual settings UI
function ccpo_render_settings_page() {
    include CCPO_PLUGIN_DIR . 'includes/settings-ui.php';
}

// Register plugin settings
add_action( 'admin_init', function () {
    register_setting( 'wdo_settings_group', 'wdo_settings' );
});