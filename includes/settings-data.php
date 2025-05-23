<?php
function wdo_render_group_table($title, $desc, $slug, $items) {
    $options = get_option('wdo_settings');
    echo "<h3>$title</h3>";
    echo "<p>$desc</p>";
    echo "<table class='widefat fixed striped'><thead><tr>
        <th style='width:5%;'>$slug</th>
        <th style='width:25%;'>項目</th>
        <th style='width:70%;'>HTML 輸出範例</th>
    </tr></thead><tbody>";

    foreach ($items as $item) {
        $id = $item['id'];
        $checked = isset($options[$id]) ? 'checked' : '';
        $label = $item['label'];
        $desc = $item['desc'];

        //關鍵：這裡轉義 HTML 為實體符號
        $desc = htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8');
        $html = htmlspecialchars($item['html'], ENT_QUOTES, 'UTF-8');
        //$hook = htmlspecialchars($item['hook'], ENT_QUOTES, 'UTF-8');
        $hook = $item['hook'];

        echo "<tr>
            <td><input type='checkbox' name='wdo_settings[$id]' id='$id' value='1' $checked></td>
            <td><label for='$id'><strong>$label</strong><strong style='font-size:90%;'></strong><span style='font-size:90%;color:#555;margin-top:10px;'></span></label></td>
            <td><code style='font-size:90%;'>$html</code></td>
        </tr>";
    }

    echo "</tbody></table><br>";
}
$slug =['移除','停用','設定'];
$desc =['移除不必要的<head>資訊','停用不必要的 script 以及引入檔','設定 wp_config.php,以提升網站效能'];

$group_head = [
 [
        'id' => 'remove_wp_generator',
        'label' => '移除 WordPress 版本資訊',
        'desc' => '從 <head> 移除 <meta name="generator"> 標籤。',
        'html' => '<meta name="generator" content="WordPress 6.x" />',
        'hook' => 'remove_action("wp_head", "wp_generator");',
    ],
    [
        'id' => 'remove_rsd_link',
        'label' => '移除 RSD Link 輸出',
        'desc' => '移除 <link rel="EditURI">（XML-RPC 用）。',
        'html' => '<link rel="EditURI" ... />',
        'hook' => 'remove_action("wp_head", "rsd_link");',
    ],
    [
        'id' => 'remove_wlwmanifest_link',
        'label' => '移除 WLW Link',
        'desc' => 'Windows Live Writer 用的 <link>，已過時。',
        'html' => '<link rel="wlwmanifest" ... />',
        'hook' => 'remove_action("wp_head", "wlwmanifest_link");',
    ],
    [
        'id' => 'remove_shortlink',
        'label' => '移除 Shortlink',
        'desc' => '移除 <link rel="shortlink"> 出現在 <head>。',
        'html' => '<link rel="shortlink" href="?p=123" />',
        'hook' => 'remove_action("wp_head", "wp_shortlink_wp_head");',
    ],
    [
        'id' => 'remove_feed_links',
        'label' => '移除 Feed Link 輸出',
        'desc' => '保留 Feed 功能，但不在 <head> 中顯示 link。',
        'html' => '<link rel="alternate" type="application/rss+xml" ...>',
        'hook' => 'remove_action("wp_head", "feed_links");<br>remove_action("wp_head", "feed_links_extra");',
    ],
    [
        'id' => 'remove_rest_api_link',
        'label' => '移除 REST API Link',
        'desc' => '從 <head> 中移除 wp-json rel 連結。',
        'html' => '<link rel="https://api.w.org/" href="/wp-json/" />',
        'hook' => 'remove_action("wp_head", "rest_output_link_wp_head");',
    ],
    [
        'id' => 'remove_oembed_links',
        'label' => '移除 oEmbed Link',
        'desc' => '移除嵌入支援的 discovery link。',
        'html' => '<link rel="alternate" type="application/json+oembed" />',
        'hook' => 'remove_action("wp_head", "wp_oembed_add_discovery_links");',
    ],
    [
        'id' => 'remove_post_rel_links',
        'label' => '移除 Prev/Next Link',
        'desc' => '移除 rel="prev/next/start" 導覽標籤。',
        'html' => '<link rel="next" href="..." />',
        'hook' => 'remove_action("wp_head", "adjacent_posts_rel_link_wp_head");',
    ],
    [
        'id' => 'remove_profile_link',
        'label' => '移除 XHTML Profile',
        'desc' => '移除 <head profile="..."> 標籤。',
        'html' => '<head profile="http://gmpg.org/xfn/11">',
        'hook' => 'remove_action("wp_head", "index_rel_link");',
    ],
    [
        'id' => 'remove_dns_prefetch',
        'label' => '移除 DNS Prefetch',
        'desc' => '清除 <link rel="dns-prefetch"> 標籤。',
        'html' => '<link rel="dns-prefetch" href="//s.w.org" />',
        'hook' => 'remove_action("wp_head", "wp_resource_hints", 2);',
    ],
    [
        'id' => 'remove_emoji_output',
        'label' => '移除 Emoji 輸出',
        'desc' => '移除 emoji 的 JS、CSS 標籤。',
        'html' => '<script src="...emoji.js"></script>',
        'hook' => 'remove_action("wp_head", "print_emoji_detection_script");<br>remove_action("wp_print_styles", "print_emoji_styles");',
    ],
    [
        'id' => 'remove_gutenberg_css',
        'label' => '移除 Gutenberg CSS',
        'desc' => '移除 wp-block-library CSS（前端樣式）。',
        'html' => '<link rel="stylesheet" href="...block-library.css" />',
        'hook' => 'wp_dequeue_style("wp-block-library");',
    ],
    [
        'id' => 'remove_wp_block_theme_css',
        'label' => '移除 Gutenberg 主題 CSS',
        'desc' => 'wp-block-library-theme 補強樣式。',
        'html' => '<link rel="stylesheet" href="...theme.css" />',
        'hook' => 'wp_dequeue_style("wp-block-library-theme");',
    ],
    [
        'id' => 'remove_global_styles',
        'label' => '移除 Global Styles CSS',
        'desc' => '移除 theme.json 自動生成 CSS。',
        'html' => '<style id="global-styles-inline-css">',
        'hook' => 'wp_dequeue_style("global-styles");',
    ],
    [
        'id' => 'remove_classic_theme_styles',
        'label' => '移除 Classic Theme Styles',
        'desc' => '移除 WordPress 自動加入的經典主題補強樣式（style#classic-theme-styles-inline-css）。',
        'html' => '<style id="classic-theme-styles-inline-css">...</style>',
        'hook' => 'wp_dequeue_style("classic-theme-styles");<br>wp_deregister_style("classic-theme-styles");',
    ],
];
$group_features = [
    [
        'id' => 'remove_global_styles',
        'label' => '停用 Global Styles',
        'desc' => '停用 Gutenberg 所產生的 global styles 樣式。',
        'html' => '<style id="global-styles-inline-css">...</style>',
        'hook' => 'wp_dequeue_style("global-styles");',
    ],
    [
        'id' => 'remove_gutenberg_css',
        'label' => '移除 Gutenberg CSS',
        'desc' => '若未使用區塊編輯器，可移除前端 CSS 載入。',
        'html' => '<link rel="stylesheet" href="...block-library.css" />',
        'hook' => 'wp_dequeue_style("wp-block-library");',
    ],
    [
        'id' => 'disable_block_editor',
        'label' => '停用區塊編輯器',
        'desc' => '恢復經典編輯器介面（Classic Editor），更輕量。',
        'html' => '進入文章時顯示傳統編輯器',
        'hook' => 'add_filter("use_block_editor_for_post", "__return_false");',
    ],
    [
        'id' => 'remove_widgets',
        'label' => '移除內建 Widgets',
        'desc' => '移除如 RSS、Meta 小工具，減少選項。',
        'html' => '從小工具清單移除 WP_Widget_RSS',
        'hook' => 'unregister_widget("WP_Widget_RSS");',
    ],
    [
        'id' => 'remove_heartbeat',
        'label' => '停用 Heartbeat API',
        'desc' => '關閉頻繁的 AJAX 呼叫，可降低伺服器負載。',
        'html' => '封鎖 /wp-admin/admin-ajax.php?action=heartbeat',
        'hook' => 'wp_deregister_script("heartbeat");',
    ],
    [
        'id' => 'remove_autosave',
        'label' => '移除 autosave 自動儲存',
        'desc' => '關閉自動儲存草稿功能，減少版本堆積。',
        'html' => '阻止 autosave.js 載入',
        'hook' => 'wp_deregister_script("autosave");',
    ],
    [
        'id' => 'move_jquery_to_footer',
        'label' => '將 jQuery 移至頁尾',
        'desc' => '可加快首次渲染時間，但需確保主題支援。',
        'html' => '<script src="jquery.js"></script> 放在 wp_footer',
        'hook' => 'wp_scripts()->add_data("jquery", "group", 1);',
    ],
    [
        'id' => 'disable_rss_feed',
        'label' => '完全停用 RSS Feed',
        'desc' => '攔截 /feed/ 等所有 RSS 請求，避免外部訂閱。',
        'html' => '訪問 /feed/ 顯示錯誤或跳轉首頁',
        'hook' => 'add_action("do_feed", "wp_die");',
    ],
    [
    'id' => 'remove_jquery',
    'label' => '移除 jQuery 主程式',
    'desc' => '若主題或外掛未依賴 jQuery，可完全移除以加快載入速度。',
    'html' => '<script src=".../jquery.js"></script>',
    'hook' => 'wp_deregister_script("jquery");',
    ],
    [
        'id' => 'remove_jquery_migrate',
        'label' => '移除 jQuery Migrate',
        'desc' => '舊版 jQuery API 相容性支援，若未使用可移除。',
        'html' => '<script src=".../jquery-migrate.min.js"></script>',
        'hook' => 'wp_deregister_script("jquery-migrate");',
    ],
    [
        'id' => 'remove_comment_reply',
        'label' => '移除留言回覆腳本',
        'desc' => '若網站未啟用內建留言功能的回覆功能，可移除。',
        'html' => '<script src=".../comment-reply.min.js"></script>',
        'hook' => 'wp_deregister_script("comment-reply");',
    ],

    [
        'id' => 'remove_wp_polyfill',
        'label' => '移除 Polyfill 相容性腳本',
        'desc' => '用於支援舊版瀏覽器（如 IE11），若不需可移除。',
        'html' => '<script src=".../wp-polyfill.min.js"></script>',
        'hook' => 'wp_deregister_script("wp-polyfill");',
    ],
    [
        'id' => 'remove_admin_bar_script',
        'label' => '移除前台 Admin Bar JS',
        'desc' => '若前台已關閉 admin bar，可移除相關 JS 腳本。',
        'html' => '<script src=".../admin-bar.js"></script>',
        'hook' => 'wp_deregister_script("admin-bar");',
    ],
    [
        'id' => 'remove_wp_ajax_response',
        'label' => '移除 AJAX 表單回應腳本',
        'desc' => '若未使用留言或前端 AJAX 表單，可移除。',
        'html' => '<script src=".../wp-ajax-response.js"></script>',
        'hook' => 'wp_deregister_script("wp-ajax-response");',
    ],
    [
        'id' => 'remove_zxcvbn_async',
        'label' => '移除密碼強度檢查腳本',
        'desc' => '用於註冊或修改密碼時檢查密碼強度，若未開放註冊可停用。',
        'html' => '<script src=".../zxcvbn-async.js"></script>',
        'hook' => 'wp_deregister_script("zxcvbn-async");',
    ],
    [
        'id' => 'remove_password_strength_meter',
        'label' => '移除密碼強度顯示器',
        'desc' => '前端密碼欄位強度顯示，若無使用可停用。',
        'html' => '<script src=".../password-strength-meter.js"></script>',
        'hook' => 'wp_deregister_script("password-strength-meter");',
    ],
    [
        'id' => 'remove_thickbox',
        'label' => '移除 Thickbox JS',
        'desc' => '舊式燈箱效果腳本，若未使用可安全移除。',
        'html' => '<script src=".../thickbox.js"></script>',
        'hook' => 'wp_deregister_script("thickbox");',
    ],
];

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