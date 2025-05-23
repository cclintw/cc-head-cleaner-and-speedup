<?php
/**
 * Settings UI Renderer and Data Definitions
 *
 * @package CC Performance Optimizer
 */

function wdo_render_group_table($title, $slug, $items) {
    $options = get_option('wdo_settings');

    echo '<h3>' . esc_html($title) . '</h3>';

    echo "<table class='widefat fixed striped'>
        <thead>
            <tr>
                <th style='width:5%;'>" . esc_html($slug) . "</th>
                <th style='width:35%;'>" . esc_html__('Feature', 'cc-performance-optimizer') . "</th>
                <th style='width:60%;'>" . esc_html__('Example Output', 'cc-performance-optimizer') . "</th>
            </tr>
        </thead>
        <tbody>";

    foreach ($items as $item) {
        $id      = esc_attr($item['id']);
        $checked = isset($options[$id]) ? 'checked' : '';
        $label   = esc_html__( $item['label'], 'cc-performance-optimizer' );
        $desc    = esc_html__( $item['desc'], 'cc-performance-optimizer' );
        $html    = esc_html( $item['html'] );

        echo "<tr>
            <td>
                <input type='checkbox' name='wdo_settings[$id]' id='$id' value='1' $checked>
            </td>
            <td>
                <label for='$id'>
                    <strong>$label</strong><br>
                    <span style='font-size:90%;color:#555;margin-top:10px;'>$desc</span>
                </label>
            </td>
            <td>
                <code style='font-size:90%;'>$html</code>
            </td>
        </tr>";
    }

    echo "</tbody></table><br>";
}

// Translated group section headings (Remove / Disable / Config)
$slug = [
    __( 'Remove', 'cc-performance-optimizer' ),
    __( 'Disable', 'cc-performance-optimizer' ),
    __( 'Config', 'cc-performance-optimizer' ),
];
$group_head = [
    [
        'id'    => 'remove_wp_generator',
        'label' => __( 'Remove WP Generator Version', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes the WordPress version meta tag for improved security.', 'cc-performance-optimizer' ),
        'html'  => '<meta name="generator" content="WordPress 6.x" />',
    ],
    [
        'id'    => 'remove_auto_sizes_css_output',
        'label' => __( 'Remove Auto Sizes CSS Output', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes inline CSS styles automatically generated for responsive images.', 'cc-performance-optimizer' ),
        'html'  => '<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>',
    ],
    [
        'id'    => 'remove_rsd_link',
        'label' => __( 'Remove RSD Link', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes the RSD (Really Simple Discovery) link, which is rarely used.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="EditURI" type="application/rsd+xml" href="https://example.com/xmlrpc.php?rsd">',
    ],
    [
        'id'    => 'remove_wlwmanifest_link',
        'label' => __( 'Remove WLW Manifest Link', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes the Windows Live Writer manifest link, which is obsolete.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="wlwmanifest" href="https://example.com/wlwmanifest.xml">',
    ],
    [
        'id'    => 'remove_shortlink',
        'label' => __( 'Remove Shortlink', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes shortlink tag from the head and HTTP headers.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="shortlink" href="https://example.com/?p=123"> Link: <https://example.com/?p=123>; rel=shortlink',
    ],
    [
        'id'    => 'remove_feed_links',
        'label' => __( 'Remove Feed Links', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes all post and comment feed link tags from the head.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="alternate" type="application/rss+xml" title="..." href="http://example.com/?feed=rss2" />',
    ],
    [
        'id'    => 'remove_rest_api_link',
        'label' => __( 'Remove REST API Link', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes REST API discovery link from the head.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="https://api.w.org/" href="/wp-json/" />',
    ],
    [
        'id'    => 'remove_oembed_links',
        'label' => __( 'Remove oEmbed Discovery Links', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes oEmbed discovery links from the head. Does not disable oEmbed functionality.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="alternate" type="application/json+oembed" href="...">',
    ],
    [
        'id'    => 'remove_post_rel_links',
        'label' => __( 'Remove Rel Prev/Next Links', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes adjacent post relationship link tags (prev/next).', 'cc-performance-optimizer' ),
        'html'  => '<link rel="next" href="..." />',
    ],
    [
        'id'    => 'remove_profile_link',
        'label' => __( 'Remove XFN Profile Link', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes the XFN profile link, which is rarely needed.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="profile" href="https://gmpg.org/xfn/11">',
    ],
    [
        'id'    => 'remove_dns_prefetch',
        'label' => __( 'Remove DNS Prefetch', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes DNS prefetch links for performance/privacy purposes.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="dns-prefetch" href="//s.w.org">',
    ],
    [
        'id'    => 'remove_emoji_output',
        'label' => __( 'Remove Emoji Output', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables emoji-related scripts and styles added in the head.', 'cc-performance-optimizer' ),
        'html'  => '<script src="/wp-includes/js/wp-emoji-release.min.js"></script>',
    ],
    [
        'id'    => 'remove_gutenberg_css',
        'label' => __( 'Remove Gutenberg Block CSS', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes default Gutenberg block style CSS from the front end.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="stylesheet" href="/wp-includes/css/dist/block-library/style.min.css">',
    ],
    [
        'id'    => 'remove_wp_block_theme_css',
        'label' => __( 'Remove Gutenberg Theme Enhancements', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes wp-block-library-theme CSS for block-based themes.', 'cc-performance-optimizer' ),
        'html'  => '<link rel="stylesheet" href="...theme.css" />',
    ],
    [
        'id'    => 'remove_global_styles',
        'label' => __( 'Remove Global Styles Inline CSS', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes inline CSS generated from theme.json.', 'cc-performance-optimizer' ),
        'html'  => '<style id="global-styles-inline-css">',
    ],
    [
        'id'    => 'remove_classic_theme_styles',
        'label' => __( 'Remove Classic Theme Styles', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes classic theme compatibility styles injected by WordPress.', 'cc-performance-optimizer' ),
        'html'  => '<style id="classic-theme-styles-inline-css">...</style>',
    ],
];
$group_features = [
    [
        'id'    => 'disable_global_styles',
        'label' => __( 'Disable Global Styles', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables Gutenberg-generated global stylesheets.', 'cc-performance-optimizer' ),
        'html'  => '<!--disable global styles-->',
    ],
    [
        'id'    => 'disable_auto_sizes_css',
        'label' => __( 'Disable Image Auto Sizes CSS', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables auto-generated image sizing CSS.', 'cc-performance-optimizer' ),
        'html'  => '<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>',
    ],
    [
        'id'    => 'disable_block_editor',
        'label' => __( 'Disable Block Editor', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables the block editor for posts and widgets.', 'cc-performance-optimizer' ),
        'html'  => '<!-- block editor removed -->',
    ],
    [
        'id'    => 'disable_emoji_support',
        'label' => __( 'Disable Emoji Scripts', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables emoji scripts, styles, TinyMCE plugin, and email/feed HTML conversion.', 'cc-performance-optimizer' ),
        'html'  => '<script src="/wp-includes/js/wp-emoji-release.min.js"></script>',
    ],
    [
        'id'    => 'disable_oembed_route',
        'label' => __( 'Disable oEmbed Support', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables oEmbed API routes and prevents external sites from embedding your content.', 'cc-performance-optimizer' ),
        'html'  => '<!-- oEmbed disabled -->',
    ],
    [
        'id'    => 'disable_all_feeds',
        'label' => __( 'Disable All RSS Feed Routes', 'cc-performance-optimizer' ),
        'desc'  => __( 'Blocks all RSS feed routes to prevent public access to your feeds.', 'cc-performance-optimizer' ),
        'html'  => '<!-- feed blocked -->',
    ],
    [
        'id'    => 'remove_widgets',
        'label' => __( 'Remove Built-in Widgets', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes default widgets like RSS and Meta to reduce clutter.', 'cc-performance-optimizer' ),
        'html'  => 'Removes WP_Widget_RSS from widget list',
    ],
    [
        'id'    => 'remove_heartbeat',
        'label' => __( 'Disable Heartbeat API', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables AJAX Heartbeat requests to reduce server load.', 'cc-performance-optimizer' ),
        'html'  => 'Blocks /wp-admin/admin-ajax.php?action=heartbeat',
    ],
    [
        'id'    => 'remove_autosave',
        'label' => __( 'Disable Autosave', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables auto draft saving to prevent unnecessary post revisions.', 'cc-performance-optimizer' ),
        'html'  => 'Prevents autosave.js loading',
    ],
    [
        'id'    => 'move_jquery_to_footer',
        'label' => __( 'Move jQuery to Footer', 'cc-performance-optimizer' ),
        'desc'  => __( 'Moves jQuery to the footer for faster first render. Ensure theme compatibility.', 'cc-performance-optimizer' ),
        'html'  => '<script src="jquery.js"></script> placed in wp_footer',
    ],
    [
        'id'    => 'disable_rss_feed',
        'label' => __( 'Completely Disable RSS Feed', 'cc-performance-optimizer' ),
        'desc'  => __( 'Redirects or blocks all /feed/ URLs to prevent feed access.', 'cc-performance-optimizer' ),
        'html'  => 'Accessing /feed/ returns error or redirects',
    ],
    [
        'id'    => 'remove_jquery',
        'label' => __( 'Remove jQuery Library', 'cc-performance-optimizer' ),
        'desc'  => __( 'If not required by your theme/plugins, remove jQuery to reduce load time.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../jquery.js"></script>',
    ],
    [
        'id'    => 'remove_jquery_migrate',
        'label' => __( 'Remove jQuery Migrate', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes backward compatibility layer for old jQuery APIs.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../jquery-migrate.min.js"></script>',
    ],
    [
        'id'    => 'remove_comment_reply',
        'label' => __( 'Remove Comment Reply Script', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes threaded comments JS if reply functionality is unused.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../comment-reply.min.js"></script>',
    ],
    [
        'id'    => 'remove_wp_polyfill',
        'label' => __( 'Remove Polyfill Scripts', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes legacy browser compatibility scripts like for IE11.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../wp-polyfill.min.js"></script>',
    ],
    [
        'id'    => 'remove_admin_bar_script',
        'label' => __( 'Remove Admin Bar Scripts', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes frontend admin bar JS if admin bar is disabled.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../admin-bar.js"></script>',
    ],
    [
        'id'    => 'remove_wp_ajax_response',
        'label' => __( 'Remove WP AJAX Response Script', 'cc-performance-optimizer' ),
        'desc'  => __( 'If not using frontend forms, removes wp-ajax-response.js.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../wp-ajax-response.js"></script>',
    ],
    [
        'id'    => 'remove_zxcvbn_async',
        'label' => __( 'Remove Password Strength Checker', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes zxcvbn async JS for password strength estimation.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../zxcvbn-async.js"></script>',
    ],
    [
        'id'    => 'remove_password_strength_meter',
        'label' => __( 'Remove Password Strength Meter', 'cc-performance-optimizer' ),
        'desc'  => __( 'Disables strength indicator in password input forms.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../password-strength-meter.js"></script>',
    ],
    [
        'id'    => 'remove_thickbox',
        'label' => __( 'Remove Thickbox Script', 'cc-performance-optimizer' ),
        'desc'  => __( 'Removes legacy Thickbox lightbox scripts if unused.', 'cc-performance-optimizer' ),
        'html'  => '<script src=".../thickbox.js"></script>',
    ],
];
$group_config = [
    [
        'id'    => 'define_revisions',
        'label' => __( 'Disable Post Revisions', 'cc-performance-optimizer' ),
        'desc'  => __( 'Prevents WordPress from storing multiple old revisions of posts to reduce database load.', 'cc-performance-optimizer' ),
        'html'  => 'define("WP_POST_REVISIONS", false);',
    ],
    [
        'id'    => 'define_trash_days',
        'label' => __( 'Set Trash Retention to 7 Days', 'cc-performance-optimizer' ),
        'desc'  => __( 'Automatically deletes trashed content after 7 days to save space.', 'cc-performance-optimizer' ),
        'html'  => 'define("EMPTY_TRASH_DAYS", 7);',
    ],
    [
        'id'    => 'define_autosave_interval',
        'label' => __( 'Adjust Autosave Interval (300 seconds)', 'cc-performance-optimizer' ),
        'desc'  => __( 'Reduces autosave frequency to lower the number of HTTP requests.', 'cc-performance-optimizer' ),
        'html'  => 'define("AUTOSAVE_INTERVAL", 300);',
    ],
    [
        'id'    => 'define_memory_limit',
        'label' => __( 'Increase PHP Memory Limits', 'cc-performance-optimizer' ),
        'desc'  => __( 'Improves stability during large file uploads or plugin operations by raising memory limits.', 'cc-performance-optimizer' ),
        'html'  => 'define("WP_MEMORY_LIMIT", "128M");<br>define("WP_MAX_MEMORY_LIMIT", "256M");',
    ],
    [
        'id'    => 'define_disable_wp_cron',
        'label' => __( 'Disable WP Cron (use system cron)', 'cc-performance-optimizer' ),
        'desc'  => __( 'Prevents fake cron jobs on every page load; requires system-level cron replacement.', 'cc-performance-optimizer' ),
        'html'  => 'define("DISABLE_WP_CRON", true);',
    ],
];