<?php
/**
 * Settings UI Renderer and Data Definitions
 *
 * @package CC Performance Optimizer
 */

function wdo_render_group_table($title, $slug, $items) {
    $options = get_option('wdo_settings');
    $note = __('Notes','cc-head-cleaner-and-speedup');

    echo "<table class='widefat fixed striped'><thead><tr>
        <th style='width:5%;'>$slug</th>
        <th style='width:20%;max-width:200px;'>$title</th>
        <th>$note</th>
    </tr></thead><tbody>";

    foreach ($items as $item) {
        $id = $item['id'];
        $checked = isset($options[$id]) ? 'checked' : '';
        $label = $item['label'];
        $desc = htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8');
  
        echo "<tr>
            <td><input type='checkbox' name='wdo_settings[$id]' id='$id' value='1' $checked></td>
            <td><label for='$id'><strong>$label</strong></label></td><td><span style='font-size:90%;color:#555;margin-top:10px;'>$desc</span></td>
        </tr>";
    }

    echo "</tbody></table><br>";
}
// Translated group section headings (Remove / Disable / Config)
$slug = [
    __( 'Remove', 'cc-head-cleaner-and-speedup' ),
    __( 'Disable', 'cc-head-cleaner-and-speedup' ),
    __( 'Config', 'cc-head-cleaner-and-speedup' ),
];
$group_head = [
    [
        'id'    => 'remove_wp_generator',
        'label' => __( 'Remove WP Generator Version', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes the WordPress version meta tag for improved security.', 'cc-head-cleaner-and-speedup' ),
        'html'  => '<meta name="generator" content="WordPress 6.x" />',
    ],
    [
        'id'    => 'remove_auto_sizes_css_output',
        'label' => __( 'Remove Auto Sizes CSS Output', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes inline CSS styles automatically generated for responsive images.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_rsd_link',
        'label' => __( 'Remove RSD Link', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes the RSD (Really Simple Discovery) link, which is rarely used.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_wlwmanifest_link',
        'label' => __( 'Remove WLW Manifest Link', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes the Windows Live Writer manifest link, which is obsolete.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_shortlink',
        'label' => __( 'Remove Shortlink', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes shortlink tag from the head and HTTP headers.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_feed_links',
        'label' => __( 'Remove Feed Links', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes all post and comment feed link tags from the head.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_rest_api_link',
        'label' => __( 'Remove REST API Link', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes REST API discovery link from the head.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_oembed_links',
        'label' => __( 'Remove oEmbed Discovery Links', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes oEmbed discovery links from the head. Does not disable oEmbed functionality.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_post_rel_links',
        'label' => __( 'Remove Rel Prev/Next Links', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes adjacent post relationship link tags (prev/next).', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_profile_link',
        'label' => __( 'Remove XFN Profile Link', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes the XFN profile link, which is rarely needed.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_dns_prefetch',
        'label' => __( 'Remove DNS Prefetch', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes DNS prefetch links for performance/privacy purposes.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_emoji_output',
        'label' => __( 'Remove Emoji Output', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables emoji-related scripts and styles added in the head.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_gutenberg_css',
        'label' => __( 'Remove Gutenberg Block CSS', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes default Gutenberg block style CSS from the front end.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_wp_block_theme_css',
        'label' => __( 'Remove Gutenberg Theme Enhancements', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes wp-block-library-theme CSS for block-based themes.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_global_styles',
        'label' => __( 'Remove Global Styles Inline CSS', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes inline CSS generated from theme.json.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_classic_theme_styles',
        'label' => __( 'Remove Classic Theme Styles', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes classic theme compatibility styles injected by WordPress.', 'cc-head-cleaner-and-speedup' ),
    ],
];
$group_features = [
    [
        'id'    => 'disable_global_styles',
        'label' => __( 'Disable Global Styles', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables Gutenberg-generated global stylesheets.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_auto_sizes_css',
        'label' => __( 'Disable Image Auto Sizes CSS', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables auto-generated image sizing CSS.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_block_editor',
        'label' => __( 'Disable Block Editor', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables the block editor for posts and widgets.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_emoji_support',
        'label' => __( 'Disable Emoji Scripts', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables emoji scripts, styles, TinyMCE plugin, and email/feed HTML conversion.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_oembed_route',
        'label' => __( 'Disable oEmbed Support', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables oEmbed API routes and prevents external sites from embedding your content.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_all_feeds',
        'label' => __( 'Disable All RSS Feed Routes', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Blocks all RSS feed routes to prevent public access to your feeds.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_widgets',
        'label' => __( 'Remove Built-in Widgets', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes default widgets like RSS and Meta to reduce clutter.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_heartbeat',
        'label' => __( 'Disable Heartbeat API', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables AJAX Heartbeat requests to reduce server load.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_autosave',
        'label' => __( 'Disable Autosave', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables auto draft saving to prevent unnecessary post revisions.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'move_jquery_to_footer',
        'label' => __( 'Move jQuery to Footer', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Moves jQuery to the footer for faster first render. Ensure theme compatibility.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'disable_rss_feed',
        'label' => __( 'Completely Disable RSS Feed', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Redirects or blocks all /feed/ URLs to prevent feed access.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_jquery',
        'label' => __( 'Remove jQuery Library', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'If not required by your theme/plugins, remove jQuery to reduce load time.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_jquery_migrate',
        'label' => __( 'Remove jQuery Migrate', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes backward compatibility layer for old jQuery APIs.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_comment_reply',
        'label' => __( 'Remove Comment Reply Script', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes threaded comments JS if reply functionality is unused.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_wp_polyfill',
        'label' => __( 'Remove Polyfill Scripts', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes legacy browser compatibility scripts like for IE11.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_admin_bar_script',
        'label' => __( 'Remove Admin Bar Scripts', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes frontend admin bar JS if admin bar is disabled.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_wp_ajax_response',
        'label' => __( 'Remove WP AJAX Response Script', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'If not using frontend forms, removes wp-ajax-response.js.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_zxcvbn_async',
        'label' => __( 'Remove Password Strength Checker', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes zxcvbn async JS for password strength estimation.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_password_strength_meter',
        'label' => __( 'Remove Password Strength Meter', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Disables strength indicator in password input forms.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'remove_thickbox',
        'label' => __( 'Remove Thickbox Script', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Removes legacy Thickbox lightbox scripts if unused.', 'cc-head-cleaner-and-speedup' ),
    ],
];
$group_config = [
    [
        'id'    => 'define_revisions',
        'label' => __( 'Disable Post Revisions', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Prevents WordPress from storing multiple old revisions of posts to reduce database load.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'define_trash_days',
        'label' => __( 'Set Trash Retention to 7 Days', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Automatically deletes trashed content after 7 days to save space.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'define_autosave_interval',
        'label' => __( 'Adjust Autosave Interval (300 seconds)', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Reduces autosave frequency to lower the number of HTTP requests.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'define_memory_limit',
        'label' => __( 'Increase PHP Memory Limits', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Improves stability during large file uploads or plugin operations by raising memory limits.', 'cc-head-cleaner-and-speedup' ),
    ],
    [
        'id'    => 'define_disable_wp_cron',
        'label' => __( 'Disable WP Cron (use system cron)', 'cc-head-cleaner-and-speedup' ),
        'desc'  => __( 'Prevents fake cron jobs on every page load; requires system-level cron replacement.', 'cc-head-cleaner-and-speedup' ),
    ],
];