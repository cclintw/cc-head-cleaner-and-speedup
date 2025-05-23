$group_config = [
    [
        'id' => 'define_revisions',
        'label' => '停用文章修訂版本',
        'desc' => '避免儲存太多舊版本，減少資料庫負擔。',
        'html' => 'define("WP_POST_REVISIONS", false);',
        'hook' => 'wp-config.php',
    ],
    [
        'id' => 'define_trash_days',
        'label' => '垃圾桶保留 7 天',
        'desc' => '減少佔用空間，自動清除過期內容。',
        'html' => 'define("EMPTY_TRASH_DAYS", 7);',
        'hook' => 'wp-config.php',
    ],
    [
        'id' => 'define_autosave_interval',
        'label' => '調整自動儲存間隔（300 秒）',
        'desc' => '減少 autosave 頻率，降低請求頻率。',
        'html' => 'define("AUTOSAVE_INTERVAL", 300);',
        'hook' => 'wp-config.php',
    ],
    [
        'id' => 'define_memory_limit',
        'label' => '調高記憶體限制',
        'desc' => '避免某些外掛或圖片編輯時記憶體不足錯誤。',
        'html' => 'define("WP_MEMORY_LIMIT", "128M");<br>define("WP_MAX_MEMORY_LIMIT", "256M");',
        'hook' => 'wp-config.php',
    ],
    [
        'id' => 'define_disable_wp_cron',
        'label' => '停用 WP Cron（改用系統排程）',
        'desc' => '改善大量訪問時 fake cron 觸發過多的問題。',
        'html' => 'define("DISABLE_WP_CRON", true);',
        'hook' => 'wp-config.php',
    ],
];