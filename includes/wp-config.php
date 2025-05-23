$group_config = [
    [
        'id'    => 'define_revisions',
        'label' => __( 'Disable post revisions', 'cc-performance-optimizer' ),
        'desc'  => __( 'Avoid storing too many old revisions to reduce database load.', 'cc-performance-optimizer' ),
        'html'  => 'define("WP_POST_REVISIONS", false);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_trash_days',
        'label' => __( 'Keep trash for 7 days', 'cc-performance-optimizer' ),
        'desc'  => __( 'Reduce space usage by automatically clearing expired content.', 'cc-performance-optimizer' ),
        'html'  => 'define("EMPTY_TRASH_DAYS", 7);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_autosave_interval',
        'label' => __( 'Adjust autosave interval (300 seconds)', 'cc-performance-optimizer' ),
        'desc'  => __( 'Lower autosave frequency to reduce request overhead.', 'cc-performance-optimizer' ),
        'html'  => 'define("AUTOSAVE_INTERVAL", 300);',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_memory_limit',
        'label' => __( 'Increase memory limits', 'cc-performance-optimizer' ),
        'desc'  => __( 'Prevent memory errors when editing images or running plugins.', 'cc-performance-optimizer' ),
        'html'  => 'define("WP_MEMORY_LIMIT", "128M");' . "\n" . 'define("WP_MAX_MEMORY_LIMIT", "256M");',
        'hook'  => 'wp-config.php',
    ],
    [
        'id'    => 'define_disable_wp_cron',
        'label' => __( 'Disable WP Cron (use system cron)', 'cc-performance-optimizer' ),
        'desc'  => __( 'Avoid excessive fake cron triggers under high traffic.', 'cc-performance-optimizer' ),
        'html'  => 'define("DISABLE_WP_CRON", true);',
        'hook'  => 'wp-config.php',
    ],
];