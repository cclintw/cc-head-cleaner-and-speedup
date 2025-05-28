<?php
// Include plugin setting data
include CCPO_PLUGIN_DIR . 'includes/settings-data.php';
?>

<div class="wrap">
    <h1><?php esc_html_e( 'Site Head Cleaner & Speed Up', 'cc-head-cleaner-and-speedup' ); ?></h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'wdo_settings_group' ); ?>
        
        <?php
        wdo_render_group_table(
            __('Clean &lt;head&gt; output', 'cc-head-cleaner-and-speedup' ),
            $slug[0],
            $group_head
        );

        wdo_render_group_table(
            __('Disable features', 'cc-head-cleaner-and-speedup' ),
            $slug[1],
            $group_features
        );

        wdo_render_group_table(
            __('System configuration (wp-config.php)', 'cc-head-cleaner-and-speedup' ),
            $slug[2],
            $group_config
        );
        ?>
        
        <?php submit_button(); ?>
    </form>
</div>