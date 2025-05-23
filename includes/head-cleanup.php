<?php
add_action('init', function () {
    $opt = get_option('wdo_settings');

    if (isset($opt['remove_wp_generator'])) remove_action('wp_head', 'wp_generator');
    if (isset($opt['remove_rsd_link'])) remove_action('wp_head', 'rsd_link');
    if (isset($opt['remove_wlwmanifest_link'])) remove_action('wp_head', 'wlwmanifest_link');
    if (isset($opt['remove_shortlink'])) remove_action('wp_head', 'wp_shortlink_wp_head');
    if (isset($opt['remove_feed_links'])) {
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
    }
    if (isset($opt['remove_rest_api_link'])) remove_action('wp_head', 'rest_output_link_wp_head');
    if (isset($opt['remove_oembed_links'])) remove_action('wp_head', 'wp_oembed_add_discovery_links');
    if (isset($opt['remove_post_rel_links'])) remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    if (isset($opt['remove_profile_link'])) remove_action('wp_head', 'index_rel_link');
    if (isset($opt['remove_dns_prefetch'])) remove_action('wp_head', 'wp_resource_hints', 2);

    if (isset($opt['remove_emoji_output'])) {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }
    
});