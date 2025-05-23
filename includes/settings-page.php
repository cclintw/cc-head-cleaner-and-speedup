<?php
function wdo_add_settings_page() {
    add_options_page(
        'WP Deploy Optimizer 設定',
        'WP Deploy Optimizer',
        'manage_options',
        'wdo-settings',
        'wdo_render_settings_page'
    );
}
add_action('admin_menu', 'wdo_add_settings_page');

function wdo_render_settings_page() {
    include WDO_PLUGIN_DIR . 'includes/settings-ui.php';
}

add_action('admin_init', function () {
    register_setting('wdo_settings_group', 'wdo_settings');
});