<?php
/**
 * Register admin menu and settings for the plugin.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access.
}

/**
 * Add a submenu item under Settings menu.
 */
function cchcs_add_settings_page()
{
    add_options_page(
        __('Site Cleaner & Speed Up', 'cc-head-cleaner-and-speedup'),
        __('Site Cleanup', 'cc-head-cleaner-and-speedup'),
        'manage_options',
        'cchcs-settings',
        'cchcs_render_settings_page'
    );
}
add_action('admin_menu', 'cchcs_add_settings_page');

/**
 * Render the plugin settings page.
 */
function cchcs_render_settings_page()
{
    include CCHCS_PLUGIN_DIR . 'includes/settings-ui.php';
}

/**
 * Sanitize settings using the known option IDs as a whitelist.
 *
 * @param mixed $input Submitted option value.
 * @return array<string,int>
 */
function cchcs_sanitize_settings($input)
{
    require_once CCHCS_PLUGIN_DIR . 'includes/settings-data.php';

    $sanitized = [];
    $input     = is_array($input) ? $input : [];

    foreach (cchcs_get_allowed_setting_ids() as $id) {
        if (! empty($input[$id])) {
            $sanitized[$id] = 1;
        }
    }

    foreach (cchcs_get_dependent_settings() as $parent_id => $dependent_ids) {
        if (empty($sanitized[$parent_id])) {
            continue;
        }

        foreach ($dependent_ids as $dependent_id) {
            $sanitized[$dependent_id] = 1;
        }
    }

    return $sanitized;
}

/**
 * Register plugin settings for storing options.
 */
add_action('admin_init', function () {
    register_setting(
        'cchcs_settings_group',
        'cchcs_settings',
        [
            'type'              => 'array',
            'sanitize_callback' => 'cchcs_sanitize_settings',
            'default'           => [],
        ]
    );
});
