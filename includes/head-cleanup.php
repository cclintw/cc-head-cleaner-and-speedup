<?php
add_action('init', function () {
    $opt = get_option('wdo_settings');

    if (!empty($opt['remove_wp_generator'])) remove_action('wp_head', 'wp_generator');

    if (!empty($opt['remove_global_styles'])) remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');

    if (!empty($opt['remove_auto_sizes_css_output'])) {
        add_action('template_redirect', function () {
            ob_start(function ($html) {
                return preg_replace(
                    '#<style>\s*img:is\(\[sizes="auto" i\], \[sizes\^="auto," i\]\)\s*\{\s*contain-intrinsic-size:[^}]+}\s*</style>#',
                    '',
                    $html
                );
            });
        });
    }
    
    if (!empty($opt['remove_rsd_link'])) remove_action('wp_head', 'rsd_link');
    if (!empty($opt['remove_wlwmanifest_link'])) remove_action('wp_head', 'wlwmanifest_link');
    if (!empty($opt['remove_shortlink'])){ 
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('template_redirect', 'wp_shortlink_header', 11);
    }

    if (!empty($opt['remove_feed_links'])) {
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
    }
    if (!empty($opt['remove_rest_api_link'])) remove_action('wp_head', 'rest_output_link_wp_head');

    if (!empty($opt['remove_oembed_links'])) {
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'wp_oembed_add_host_js');
    }

    if (!empty($opt['remove_post_rel_links'])) remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    if (!empty($opt['remove_profile_link'])) remove_action('wp_head', 'index_rel_link');
    if (!empty($opt['remove_dns_prefetch'])) remove_action('wp_head', 'wp_resource_hints', 2);

    if (!empty($opt['remove_emoji_output'])) {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
    
});