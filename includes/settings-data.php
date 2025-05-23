<?php
function wdo_render_group_table($title, $slug, $items) {
    $options = get_option('wdo_settings');
    echo "<h3>$title</h3>";

    echo "<table class='widefat fixed striped'><thead><tr>
        <th style='width:5%;'>$slug</th>
        <th style='width:35%;'>項目</th>
        <th style='width:60%;'>HTML 輸出範例</th>
    </tr></thead><tbody>";

    foreach ($items as $item) {
        $id = $item['id'];
        $checked = isset($options[$id]) ? 'checked' : '';
        $label = $item['label'];
        $desc = $item['desc'];

        //關鍵：這裡轉義 HTML 為實體符號
        $desc = htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8');
        $html = htmlspecialchars($item['html'], ENT_QUOTES, 'UTF-8');

        echo "<tr>
            <td><input type='checkbox' name='wdo_settings[$id]' id='$id' value='1' $checked></td>
            <td><label for='$id'><strong>$label</strong><br><span style='font-size:90%;color:#555;margin-top:10px;'>$desc</span></label></td>
            <td><code style='font-size:90%;'>$html</code></td>
        </tr>";
    }

    echo "</tbody></table><br>";
}
$slug =['移除','停用','設定'];

$group_head = [
 [
        'id' => 'remove_wp_generator',
        'label' => 'Remove WP Generator Version',
        'desc' => 'Displays the WordPress version number. May expose site to security risks. Recommended to remove.',
        'html' => '<meta name="generator" content="WordPress 6.x" />',
    ],
    [
        'id' => 'remove_auto_sizes_css_output',
        'label' => 'Remove auto sizes css output',
        'desc' => 'remove auto sizes css output',
        'html' => '<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>',
    ],
    
    [
        'id' => 'remove_rsd_link',
        'label' => 'Remove RSD Link',
        'desc' => 'Provides remote blog API (Really Simple Discovery). Obsolete and rarely used.',
        'html' => '<link rel="EditURI" type="application/rsd+xml" href="https://example.com/xmlrpc.php?rsd">',
    ],
    [
        'id' => 'remove_wlwmanifest_link',
        'label' => 'Remove WLW Link',
        'desc' => 'Windows Live Writer manifest link. No longer used.',
        'html' => '<link rel="wlwmanifest" href="https://example.com/wlwmanifest.xml">',
    ],
    [
        'id' => 'remove_shortlink',
        'label' => 'Remove Shortlink',
        'desc' => '移除 <head> 中的短網址，以及移除 HTTP Header 中的標題',
        'html' => '<link rel="shortlink" href="https://example.com/?p=123"> Link: <https://example.com/?p=123>; rel=shortlink',
    ],
    [
        'id' => 'remove_feed_links',
        'label' => '移除 Feed Link 輸出',
        'desc' => 'This will Removes post and comment RSS links output.',
        'html' => '<link rel="alternate" type="application/rss+xml" title=".." href="http://example.com/?feed=rss2" /><br>
<link rel="alternate" type="application/rss+xml" title="..." href="http://example.com/?feed=comments-rss2" />
<link rel="alternate" type="application/rss+xml" title=".." href="http://example.com/?feed=rss2&#038;p=81" />
<script>',
    ],
    [
        'id' => 'remove_rest_api_link',
        'label' => 'Remove REST API Link',
        'desc' => 'remove <head> wp-json rel link。',
        'html' => '<link rel="https://api.w.org/" href="/wp-json/" />',
    ],
    [
        'id' => 'remove_oembed_links',
        'label' => 'remobe oEmbed Link',
        'desc' => 'Removes oEmbed discovery link from <head>. Does not disable functionality.',
        'html' => '<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="http://example.com/index.php?rest_route=%2Foembed%2F1.0%2Fembed&#038;url=...." />
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="http://ecample.com?rest_route=embed;url=...;format=xml" />
</head>',
    ],
    [
        'id' => 'remove_post_rel_links',
        'label' => 'remove Prev/Next Link',
        'desc' => 'remove rel="prev/next/start" navigation tag。',
        'html' => '<link rel="next" href="..." />',
    ],
    [
        'id' => 'remove_profile_link',
        'label' => 'Remove Profile Link',
        'desc' => 'XFN profile link. Rarely used and can be removed.',
        'html' => '<link rel="profile" href="https://gmpg.org/xfn/11">',
    ],
    [
        'id' => 'remove_dns_prefetch',
        'label' => 'Remove DNS Prefetch',
        'desc' => 'Removes dns-prefetch hints from <head>.',
        'html' => '<link rel="dns-prefetch" href="//s.w.org" /><link rel="dns-prefetch" href="//fonts.googleapis.com">',
    ],
    [
        'id' => 'remove_emoji_output',
        'label' => 'Remove Emoji output',
        'desc' => 'remove emoji JS、CSS tags。',
        'html' => '<script src="/wp-includes/js/wp-emoji-release.min.js"></script>',
    ],
    [
        'id' => 'remove_gutenberg_css',
        'label' => 'Remove Gutenberg CSS',
        'desc' => 'Removes frontend block styles',
        'html' => '<link rel="stylesheet" href="/wp-includes/css/dist/block-library/style.min.css">',
    ],
    [
        'id' => 'remove_wp_block_theme_css',
        'label' => 'Remove Gutenberg theme CSS',
        'desc' => 'wp-block-library-theme enhance css。',
        'html' => '<link rel="stylesheet" href="...theme.css" />',
    ],
    [
        'id' => 'remove_global_styles',
        'label' => 'Remove Global Styles CSS output',
        'desc' => '移除 theme.json 自動生成 CSS。',
        'html' => '<style id="global-styles-inline-css">',
    ],
    [
        'id' => 'remove_classic_theme_styles',
        'label' => 'Remove Classic Theme Styles',
        'desc' => 'Remove WordPress 自動加入的經典主題補強樣式（style#classic-theme-styles-inline-css）。',
        'html' => '<style id="classic-theme-styles-inline-css">...</style>',
    ],
];
$group_features = [
    [
        'id' => 'disable_global_styles',
        'label' => 'Disable Global Styles',
        'desc' => 'Dequeue Gutenberg 所產生的 global styles 樣式。',
        'html' => '<!--disable global styles-->',
    ],

    [
        'id' => 'disable_auto_sizes_css',
        'label' => 'Disable image auto sizes css',
        'desc' => 'Disable Image auto sizes css',
        'html' => '<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>',
    ],

    [
        'id' => 'disable_block_editor',
        'label' => 'Disable Block Editor',
        'desc' => 'Disables block editor for posts and widgets.',
        'html' => '<!-- block editor removed -->',
    ],
    [
        'id' => 'disable_emoji_support',
        'label' => 'Disable Emoji Scripts',
        'desc' => 'Disable all Emoji support,包括後台載入Emoji以及偵測用的 Javascript,移除TinyMCE 傳統編輯器中的 Emoji,防止載入 emoji 圖片資源,移除 rss 文章內、留言、Email 中的 emoji heml 轉換',
        'html' => '<script src="/wp-includes/js/wp-emoji-release.min.js"></script>',
    ],
[
        'id' => 'disable_oembed_route',
        'label' => 'disable_oembed',
        'desc' => '停用你的網站被人嵌入的功能，包括停用 oEmbed API 路由以及阻止外部網站取得你的 oEmbed 資訊',
        'html' => '<!--停用網站被嵌入以及 rest api oembed-->',
    ],

    [
        'id' => 'disable_all_feeds',
        'label' => '封鎖所有 RSS Feed 路由',
        'desc' => '封鎖所有 RSS Feed 路由，防止使用者或爬蟲存取 Feed 資源',
        'html' => '<!--  -->',
    ],

    [
        'id' => 'remove_widgets',
        'label' => '移除內建 Widgets',
        'desc' => '移除如 RSS、Meta 小工具，減少選項。',
        'html' => '從小工具清單移除 WP_Widget_RSS',
    ],
    [
        'id' => 'remove_heartbeat',
        'label' => '停用 Heartbeat API',
        'desc' => '關閉頻繁的 AJAX 呼叫，可降低伺服器負載。',
        'html' => '封鎖 /wp-admin/admin-ajax.php?action=heartbeat',
    ],
    [
        'id' => 'remove_autosave',
        'label' => '移除 autosave 自動儲存',
        'desc' => '關閉自動儲存草稿功能，減少版本堆積。',
        'html' => '阻止 autosave.js 載入',
    ],
    [
        'id' => 'move_jquery_to_footer',
        'label' => '將 jQuery 移至頁尾',
        'desc' => '可加快首次渲染時間，但需確保主題支援。',
        'html' => '<script src="jquery.js"></script> 放在 wp_footer',
    ],
    [
        'id' => 'disable_rss_feed',
        'label' => '完全停用 RSS Feed',
        'desc' => '攔截 /feed/ 等所有 RSS 請求，避免外部訂閱。',
        'html' => '訪問 /feed/ 顯示錯誤或跳轉首頁',
    ],
    [
    'id' => 'remove_jquery',
    'label' => '移除 jQuery 主程式',
    'desc' => '若主題或外掛未依賴 jQuery，可完全移除以加快載入速度。',
    'html' => '<script src=".../jquery.js"></script>',
    ],
    [
        'id' => 'remove_jquery_migrate',
        'label' => '移除 jQuery Migrate',
        'desc' => '舊版 jQuery API 相容性支援，若未使用可移除。',
        'html' => '<script src=".../jquery-migrate.min.js"></script>',
    ],
    [
        'id' => 'remove_comment_reply',
        'label' => '移除留言回覆腳本',
        'desc' => '若網站未啟用內建留言功能的回覆功能，可移除。',
        'html' => '<script src=".../comment-reply.min.js"></script>',
    ],

    [
        'id' => 'remove_wp_polyfill',
        'label' => '移除 Polyfill 相容性腳本',
        'desc' => '用於支援舊版瀏覽器（如 IE11），若不需可移除。',
        'html' => '<script src=".../wp-polyfill.min.js"></script>',
    ],
    [
        'id' => 'remove_admin_bar_script',
        'label' => '移除前台 Admin Bar JS',
        'desc' => '若前台已關閉 admin bar，可移除相關 JS 腳本。',
        'html' => '<script src=".../admin-bar.js"></script>',
    ],
    [
        'id' => 'remove_wp_ajax_response',
        'label' => '移除 AJAX 表單回應腳本',
        'desc' => '若未使用留言或前端 AJAX 表單，可移除。',
        'html' => '<script src=".../wp-ajax-response.js"></script>',
    ],
    [
        'id' => 'remove_zxcvbn_async',
        'label' => '移除密碼強度檢查腳本',
        'desc' => '用於註冊或修改密碼時檢查密碼強度，若未開放註冊可停用。',
        'html' => '<script src=".../zxcvbn-async.js"></script>',
    ],
    [
        'id' => 'remove_password_strength_meter',
        'label' => '移除密碼強度顯示器',
        'desc' => '前端密碼欄位強度顯示，若無使用可停用。',
        'html' => '<script src=".../password-strength-meter.js"></script>',
    ],
    [
        'id' => 'remove_thickbox',
        'label' => '移除 Thickbox JS',
        'desc' => '舊式燈箱效果腳本，若未使用可安全移除。',
        'html' => '<script src=".../thickbox.js"></script>',
    ],
];

$group_config = [
    [
        'id' => 'define_revisions',
        'label' => '停用文章修訂版本',
        'desc' => '避免儲存太多舊版本，減少資料庫負擔。',
        'html' => 'define("WP_POST_REVISIONS", false);',
    ],
    [
        'id' => 'define_trash_days',
        'label' => '垃圾桶保留 7 天',
        'desc' => '減少佔用空間，自動清除過期內容。',
        'html' => 'define("EMPTY_TRASH_DAYS", 7);',
    ],
    [
        'id' => 'define_autosave_interval',
        'label' => '調整自動儲存間隔（300 秒）',
        'desc' => '減少 autosave 頻率，降低請求頻率。',
        'html' => 'define("AUTOSAVE_INTERVAL", 300);',
    ],
    [
        'id' => 'define_memory_limit',
        'label' => '調高記憶體限制',
        'desc' => '避免某些外掛或圖片編輯時記憶體不足錯誤。',
        'html' => 'define("WP_MEMORY_LIMIT", "128M");<br>define("WP_MAX_MEMORY_LIMIT", "256M");',
    ],
    [
        'id' => 'define_disable_wp_cron',
        'label' => '停用 WP Cron（改用系統排程）',
        'desc' => '改善大量訪問時 fake cron 觸發過多的問題。',
        'html' => 'define("DISABLE_WP_CRON", true);',
    ],
];