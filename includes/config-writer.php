<?php

/**
 * Inject configuration constants into wp-config.php on plugin activation
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access.
}

/**
 * Write selected constants into wp-config.php based on settings
 * Runs automatically when plugin is activated
 */
function cchcs_write_wp_config_on_activation()
{

    $options = get_option('cchcs_settings');
    $config_path = ABSPATH . 'wp-config.php';

    // Abort if wp-config.php is not writable
    if (! is_writable($config_path)) {
        return;
    }

    // Read current wp-config.php content
    $content = file_get_contents($config_path);
    if ($content === false) {
        return;
    }

    $marker = "/* That's all, stop editing! Happy publishing. */";
    $defines = [];

    // Build defines list based on enabled settings
    if (! empty($options['define_revisions'])) {
        $defines[] = "define('WP_POST_REVISIONS', false);";
    }
    if (! empty($options['define_trash_days'])) {
        $defines[] = "define('EMPTY_TRASH_DAYS', 0);";
    }
    if (! empty($options['define_autosave_interval'])) {
        $defines[] = "define('AUTOSAVE_INTERVAL', 999999);";//disable autosave
    }
    if (! empty($options['define_memory_limit'])) {
        $defines[] = "define('WP_MEMORY_LIMIT', '128M');";
        $defines[] = "define('WP_MAX_MEMORY_LIMIT', '256M');";
    }
    if (! empty($options['define_disable_wp_cron'])) {
        $defines[] = "define('DISABLE_WP_CRON', true);";
    }

    // Append defines before marker if not already present
    foreach ($defines as $line) {
        if (strpos($content, $line) === false) {
            $content = str_replace($marker, "$line\n$marker", $content);
        }
    }

    // Save modified wp-config.php
    file_put_contents($config_path, $content);
}
