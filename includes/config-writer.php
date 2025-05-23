<?php
register_activation_hook(__FILE__, function () {
    $opt = get_option('wdo_settings');
    $config_path = ABSPATH . 'wp-config.php';

    if (!is_writable($config_path)) return;

    $content = file_get_contents($config_path);
    $marker = "/* That's all, stop editing! Happy publishing. */";
    $defines = [];

    if (!empty($opt['define_revisions'])) $defines[] = "define('WP_POST_REVISIONS', false);";
    if (!empty($opt['define_trash_days'])) $defines[] = "define('EMPTY_TRASH_DAYS', 7);";
    if (!empty($opt['define_autosave_interval'])) $defines[] = "define('AUTOSAVE_INTERVAL', 300);";
    if (!empty($opt['define_memory_limit'])) {
        $defines[] = "define('WP_MEMORY_LIMIT', '128M');";
        $defines[] = "define('WP_MAX_MEMORY_LIMIT', '256M');";
    }
    if (!empty($opt['define_disable_wp_cron'])) $defines[] = "define('DISABLE_WP_CRON', true);";

    foreach ($defines as $line) {
        if (strpos($content, $line) === false) {
            $content = str_replace($marker, "$line\n$marker", $content);
        }
    }

    file_put_contents($config_path, $content);
});