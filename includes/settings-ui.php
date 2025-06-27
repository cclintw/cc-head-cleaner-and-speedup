<?php
/**
 * Settings Page UI for CC Head Cleaner & Speed Up
 * Outputs the settings form and options tables.
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access.
}

// Load option definitions
include CCHCS_PLUGIN_DIR . 'includes/settings-data.php';
?>
<div class="wrap">
	<h1><?php esc_html_e('Site Head Cleaner & Speed Up', 'cc-head-cleaner-and-speedup'); ?>
	</h1>

	<form method="post" action="options.php">
		<?php
        // Output security fields for settings
        settings_fields('cchcs_settings_group');

// Output the grouped options tables
cchcs_render_group_table(
    __('Clean head output', 'cc-head-cleaner-and-speedup'),
    $slug[0],
    $group_head
);

cchcs_render_group_table(
    __('Disable features', 'cc-head-cleaner-and-speedup'),
    $slug[1],
    $group_features
);

cchcs_render_group_table(
    __('System configuration (wp-config.php)', 'cc-head-cleaner-and-speedup'),
    $slug[2],
    $group_config
);
?>

		<?php submit_button(); ?>
	</form>
</div>