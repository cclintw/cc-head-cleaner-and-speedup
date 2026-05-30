<?php
/**
 * Settings definitions and rendering helpers.
 *
 * @package CC_Head_Cleaner_And_Speed_Up
 */

if (! defined('ABSPATH')) {
    exit; // Prevent direct access.
}

/**
 * Return all available setting groups.
 *
 * @return array<string,array<string,mixed>>
 */
function cchcs_get_settings_groups()
{
    return [
        'head'     => [
            'action' => __('Remove', 'cc-head-cleaner-and-speedup'),
            'title'  => __('Clean head output', 'cc-head-cleaner-and-speedup'),
            'items'  => [
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
                    'desc'  => __('Removes shortlink from head output and HTTP headers.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_feed_links',
                    'label' => __('Remove Feed Links', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Removes RSS feed link tags.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_rest_api_link',
                    'label' => __('Remove REST API Link', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Removes REST API discovery links from head output and HTTP headers.', 'cc-head-cleaner-and-speedup'),
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
                    'desc'  => __('Removes emoji scripts and styles from head output.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_gutenberg_css',
                    'label' => __('Remove Gutenberg Block CSS', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Removes block editor CSS from the frontend.', 'cc-head-cleaner-and-speedup'),
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
            ],
        ],
        'features' => [
            'action' => __('Disable', 'cc-head-cleaner-and-speedup'),
            'title'  => __('Disable features', 'cc-head-cleaner-and-speedup'),
            'items'  => [
                [
                    'id'    => 'disable_global_styles',
                    'label' => __('Disable Global Styles', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Completely disables global style sheets and includes related head output cleanup.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'disable_auto_sizes_css',
                    'label' => __('Disable Image Auto Sizes CSS', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Prevents automatic responsive image CSS and includes related head output cleanup.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'disable_block_editor',
                    'label' => __('Disable Block Editor', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Disables Gutenberg editor for posts and widgets.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'disable_emoji_support',
                    'label' => __('Disable Emoji Scripts', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Removes all emoji-related functionality and includes related head output cleanup.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'disable_oembed_route',
                    'label' => __('Disable oEmbed Support', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Disables oEmbed API routes and includes related head output cleanup.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'disable_all_feeds',
                    'label' => __('Disable All RSS Feed Routes', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Completely disables RSS feeds and includes related head output cleanup.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_jquery_migrate',
                    'label' => __('Remove frontend jQuery Migrate', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Only removes frontend jQuery Migrate.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_jquery',
                    'label' => __('Remove all frontend jQuery', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Completely removes jQuery on the frontend.', 'cc-head-cleaner-and-speedup'),
                ],
                [
                    'id'    => 'remove_comment',
                    'label' => __('Remove comments and replies', 'cc-head-cleaner-and-speedup'),
                    'desc'  => __('Closes frontend comments and removes comment reply output.', 'cc-head-cleaner-and-speedup'),
                ],
            ],
        ],
    ];
}

/**
 * Return all allowed option IDs.
 *
 * @return string[]
 */
function cchcs_get_allowed_setting_ids()
{
    $ids = [];

    foreach (cchcs_get_settings_groups() as $group) {
        foreach ($group['items'] as $item) {
            $ids[] = $item['id'];
        }
    }

    return $ids;
}

/**
 * Return setting dependencies.
 *
 * Disable options can include related output cleanup options. This keeps
 * "remove output only" available while making full disable actions complete.
 *
 * @return array<string,string[]>
 */
function cchcs_get_dependent_settings()
{
    return [
        'disable_global_styles'   => [ 'remove_global_styles' ],
        'disable_auto_sizes_css'  => [ 'remove_auto_sizes_css_output' ],
        'disable_emoji_support'   => [ 'remove_emoji_output' ],
        'disable_oembed_route'    => [ 'remove_oembed_links' ],
        'disable_all_feeds'       => [ 'remove_feed_links' ],
    ];
}

/**
 * Render grouped settings as a table with checkboxes.
 *
 * @param string $title  Group title.
 * @param string $action Action label.
 * @param array  $items  Settings items.
 */
function cchcs_render_group_table($title, $action, $items)
{
    $options = get_option('cchcs_settings', []);
    if (! is_array($options)) {
        $options = [];
    }

    printf(
        '<table class="widefat fixed striped"><thead><tr><th style="width:5%%;">%1$s</th><th style="width:20%%;max-width:200px;">%2$s</th><th>%3$s</th></tr></thead><tbody>',
        esc_html($action),
        esc_html($title),
        esc_html__('Notes', 'cc-head-cleaner-and-speedup')
    );

    foreach ($items as $item) {
        $id    = $item['id'];
        $label = $item['label'];
        $desc  = nl2br(esc_html($item['desc']));

        printf(
            '<tr><td><input type="checkbox" name="cchcs_settings[%1$s]" id="%1$s" value="1" %2$s></td><td><label for="%1$s"><strong>%3$s</strong></label></td><td><span style="font-size:90%%;color:#555;margin-top:10px;">%4$s</span></td></tr>',
            esc_attr($id),
            checked(isset($options[$id]), true, false),
            esc_html($label),
            $desc // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above and nl2br only adds <br>.
        );
    }

    echo '</tbody></table><br>';
}
