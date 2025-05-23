<?php
/**
 * Cleanup unnecessary meta/link/script from <head>.
 */

add_action( 'init', function () {
    $opt = get_option( 'wdo_settings' );

    // Remove WordPress version meta tag
    if ( ! empty( $opt['remove_wp_generator'] ) ) {
        remove_action( 'wp_head', 'wp_generator' );
    }

    // Remove global styles enqueue
    if ( ! empty( $opt['remove_global_styles'] ) ) {
        remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    }

    // Remove inline auto-sizes <style> in <head>
    if ( ! empty( $opt['remove_auto_sizes_css_output'] ) ) {
        add_action( 'template_redirect', function () {
            ob_start( function ( $html ) {
                return preg_replace(
                    '#<style>\s*img:is\(\[sizes="auto" i\], \[sizes\^="auto," i\]\)\s*\{\s*contain-intrinsic-size:[^}]+}\s*</style>#',
                    '',
                    $html
                );
            } );
        } );
    }

    // Remove RSD (Really Simple Discovery) link
    if ( ! empty( $opt['remove_rsd_link'] ) ) {
        remove_action( 'wp_head', 'rsd_link' );
    }

    // Remove WLW (Windows Live Writer) manifest link
    if ( ! empty( $opt['remove_wlwmanifest_link'] ) ) {
        remove_action( 'wp_head', 'wlwmanifest_link' );
    }

    // Remove shortlink
    if ( ! empty( $opt['remove_shortlink'] ) ) {
        remove_action( 'wp_head', 'wp_shortlink_wp_head' );
        remove_action( 'template_redirect', 'wp_shortlink_header', 11 );
    }

    // Remove default feed links
    if ( ! empty( $opt['remove_feed_links'] ) ) {
        remove_action( 'wp_head', 'feed_links', 2 );
        remove_action( 'wp_head', 'feed_links_extra', 3 );
    }

    // Remove REST API link
    if ( ! empty( $opt['remove_rest_api_link'] ) ) {
        remove_action( 'wp_head', 'rest_output_link_wp_head' );
    }

    // Remove oEmbed discovery links
    if ( ! empty( $opt['remove_oembed_links'] ) ) {
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
        remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    }

    // Remove adjacent posts rel links
    if ( ! empty( $opt['remove_post_rel_links'] ) ) {
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
    }

    // Remove profile link
    if ( ! empty( $opt['remove_profile_link'] ) ) {
        remove_action( 'wp_head', 'index_rel_link' );
    }

    // Remove DNS prefetch hints
    if ( ! empty( $opt['remove_dns_prefetch'] ) ) {
        remove_action( 'wp_head', 'wp_resource_hints', 2 );
    }

    // Remove emoji output in head
    if ( ! empty( $opt['remove_emoji_output'] ) ) {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
} );