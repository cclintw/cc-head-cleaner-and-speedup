<?php
// Include plugin setting data
include CCPO_PLUGIN_DIR . 'includes/settings-data.php';
?>

<div class="wrap">
    <h1><?php esc_html_e( 'WP Performance and Optimizer', 'cc-performance-optimizer' ); ?></h1>
    <p>
        <?php esc_html_e( 'Clean unnecessary <head> Meta/Link/Script outputs, remove default WordPress JS/CSS loading and external resource requests to enhance site performance, security, and privacy compliance.', 'cc-performance-optimizer' ); ?>
    </p>
    
    <form method="post" action="options.php">
        <?php settings_fields( 'wdo_settings_group' ); ?>
        
        <?php
        wdo_render_group_table(
            __( 'Clean <head> output', 'cc-performance-optimizer' ),
            $slug[0],
            $group_head
        );

        wdo_render_group_table(
            __( 'Disable features', 'cc-performance-optimizer' ),
            $slug[1],
            $group_features
        );

        wdo_render_group_table(
            __( 'System configuration (wp-config.php)', 'cc-performance-optimizer' ),
            $slug[2],
            $group_config
        );
        ?>
        
        <?php submit_button(); ?>
    </form>
</div>