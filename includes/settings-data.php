<?php

/**
 * Settings definitions and rendering functions for CC Head Cleaner & Speed Up
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access.
}

/**
 * Render grouped settings as a table with checkboxes
 *
 * @param string $title Group title
 * @param string $slug Group slug label
 * @param array $items Settings items
 */
function cchcs_render_group_table($title, $slug, $items)
{
    $options = get_option('cchcs_settings');
    $note = __('Notes', 'cc-head-cleaner-and-speedup');

    echo "<table class='widefat fixed striped'><thead><tr>
        <th style='width:5%;'>$slug</th>
        <th style='width:20%;max-width:200px;'>$title</th>
        <th>$note</th>
    </tr></thead><tbody>";

    foreach ($items as $item) {
        $id = $item['id'];
        $checked = isset($options[ $id ]) ? 'checked' : '';
        $label = $item['label'];
        //$desc = htmlspecialchars( $item['desc'], ENT_QUOTES, 'UTF-8' );
        $desc = nl2br(esc_html($item['desc']));

        echo "<tr>
            <td><input type='checkbox' name='cchcs_settings[$id]' id='$id' value='1' $checked></td>
            <td><label for='$id'><strong>$label</strong></label></td>
            <td><span style='font-size:90%;color:#555;margin-top:10px;'>$desc</span></td>
        </tr>";
    }

    echo "</tbody></table><br>";
}

// Group section labels
$slug = [
    __('Remove', 'cc-head-cleaner-and-speedup'),
    __('Disable', 'cc-head-cleaner-and-speedup'),
    __('Config', 'cc-head-cleaner-and-speedup'),
];

// Define cleanup options for <head>
$group_head = [
    [
        'id'    => 'remove_wp_generator',
        'label' => __('Remove WP Generator Version', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes the WordPress version meta tag for improved security.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_auto_sizes_css_output',
        'label' => __('Remove Auto Sizes CSS Output', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes inline CSS for responsive images.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_rsd_link',
        'label' => __('Remove RSD Link', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes Really Simple Discovery (RSD) link.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_wlwmanifest_link',
        'label' => __('Remove WLW Manifest Link', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes Windows Live Writer manifest link.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_shortlink',
        'label' => __('Remove Shortlink', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes shortlink from <head> and HTTP headers.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_feed_links',
        'label' => __('Remove Feed Links', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes RSS feed link tags.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_rest_api_link',
        'label' => __('Remove REST API Link', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes REST API discovery link.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_oembed_links',
        'label' => __('Remove oEmbed Discovery Links', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes oEmbed discovery links.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_post_rel_links',
        'label' => __('Remove Rel Prev/Next Links', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes adjacent posts relationship links.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_profile_link',
        'label' => __('Remove XFN Profile Link', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes rarely used XFN profile link.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_dns_prefetch',
        'label' => __('Remove DNS Prefetch', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes DNS prefetch links.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_emoji_output',
        'label' => __('Remove Emoji Output', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes emoji scripts and styles from <head>.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_gutenberg_css',
        'label' => __('Remove Gutenberg Block CSS', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes block editor CSS from frontend.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_wp_block_theme_css',
        'label' => __('Remove Gutenberg Theme Enhancements', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes wp-block-library-theme CSS.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_global_styles',
        'label' => __('Remove Global Styles Inline CSS', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes inline CSS generated from theme.json.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'remove_classic_theme_styles',
        'label' => __('Remove Classic Theme Styles', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes default classic theme compatibility styles.', 'cc-head-cleaner-and-speedup'),
    ],
];

// Additional feature disable toggles
$group_features = [
    [
        'id'    => 'disable_global_styles',
        'label' => __('Disable Global Styles', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Completely disables global style sheets.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'disable_auto_sizes_css',
        'label' => __('Disable Image Auto Sizes CSS', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Prevents automatic responsive image CSS.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'disable_block_editor',
        'label' => __('Disable Block Editor', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Disables Gutenberg editor for posts and widgets.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'disable_emoji_support',
        'label' => __('Disable Emoji Scripts', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Removes all emoji-related functionality.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'disable_oembed_route',
        'label' => __('Disable oEmbed Support', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Disables oEmbed API routes.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'disable_all_feeds',
        'label' => __('Disable All RSS Feed Routes', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Completely disables RSS feeds.', 'cc-head-cleaner-and-speedup'),
    ],
];

// System config (wp-config.php) options
$group_config = [
    [
        'id'    => 'define_revisions',
        'label' => __('Disable Post Revisions', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Prevents storing multiple post revisions.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'define_trash_days',
        'label' => __('Disable Trash', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Permanently deletes content immediately without moving to Trash.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'define_autosave_interval',
        'label' => __('Disable Autosave', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Effectively disables WordPress autosave to reduce background requests.', 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'define_memory_limit',
        'label' => __('Increase PHP Memory Limits', 'cc-head-cleaner-and-speedup'),
        'desc'  => __("Raises memory limits for better performance.\nMEMORY_LIMIT:128M \nMAX_MEMORY_LIMIT:256M", 'cc-head-cleaner-and-speedup'),
    ],
    [
        'id'    => 'define_disable_wp_cron',
        'label' => __('Disable WP Cron (use system cron)', 'cc-head-cleaner-and-speedup'),
        'desc'  => __('Disables WordPress cron jobs, requires real server-side cron.', 'cc-head-cleaner-and-speedup'),
    ],
];
