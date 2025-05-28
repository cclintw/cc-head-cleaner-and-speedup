$group_config = [
    [
        'id'    => 'define_revisions',
        'label' => __( 'Disable post revisions', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Avoid storing too many old revisions to reduce database load.', 'cc-head-cleaner-and-speedup' ),
        'html'  => 'define("WP_POST_REVISIONS", false);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_trash_days',
        'label' => __( 'Keep trash for 7 days', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Reduce space usage by automatically clearing expired content.', 'cc-head-cleaner-and-speedup' ),
        'html'  => 'define("EMPTY_TRASH_DAYS", 7);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_autosave_interval',
        'label' => __( 'Adjust autosave interval (300 seconds)', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Lower autosave frequency to reduce request overhead.', 'cc-head-cleaner-and-speedup' ),
        'html'  => 'define("AUTOSAVE_INTERVAL", 300);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_memory_limit',
        'label' => __( 'Increase memory limits', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Prevent memory errors when editing images or running plugins.', 'cc-head-cleaner-and-speedup' ),
        'html'  => 'define("WP_MEMORY_LIMIT", "128M");' . "\n" . 'define("WP_MAX_MEMORY_LIMIT", "256M");',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_disable_wp_cron',
        'label' => __( 'Disable WP Cron (use system cron)', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Avoid excessive fake cron triggers under high traffic.', 'cc-head-cleaner-and-speedup' ),
        'html'  => 'define("DISABLE_WP_CRON", true);',
        'hook'  => 'wp-config.php',
    ],
];