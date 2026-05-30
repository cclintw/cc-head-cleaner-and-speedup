<?php
/**
 * Settings Page UI for CC Head Cleaner & Speed Up
 * Outputs the settings form and options tables.
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access.
}

// Load option definitions
require_once CCHCS_PLUGIN_DIR . 'includes/settings-data.php';
?>
<div class="wrap">
	<h1><?php esc_html_e('Site Head Cleaner & Speed Up', 'cc-head-cleaner-and-speedup'); ?></h1>

	<form method="post" action="options.php">
		<?php
        // Output security fields for settings
        settings_fields('cchcs_settings_group');

        foreach (cchcs_get_settings_groups() as $cchcs_group) {
            cchcs_render_group_table($cchcs_group['title'], $cchcs_group['action'], $cchcs_group['items']);
        }
        ?>

		<?php submit_button(); ?>
	</form>
</div>
