<?php
add_action('init', function () {
    $opt = get_option('wdo_settings');

    if (isset($opt['remove_global_styles'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_dequeue_style('global-styles');
        }, 100);
    }


    if (!empty($opt['remove_classic_theme_styles'])) {
        add_action('wp_enqueue_scripts', function(){
            wp_dequeue_style('classic-theme-styles');
            wp_deregister_style('classic-theme-styles');
        }, 20);
    }


    if (isset($opt['remove_gutenberg_css'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
        }, 100);
    }

    if (isset($opt['disable_block_editor'])) {
        add_filter('use_block_editor_for_post', '__return_false');
    }

    if (isset($opt['remove_widgets'])) {
        add_action('widgets_init', function () {
            unregister_widget('WP_Widget_RSS');
            unregister_widget('WP_Widget_Meta');
        }, 11);
    }

    if (isset($opt['remove_heartbeat'])) {
        wp_deregister_script('heartbeat');
    }

    if (isset($opt['remove_autosave'])) {
        add_action('wp_print_scripts', function () {
            wp_deregister_script('autosave');
        });
    }

    if (isset($opt['move_jquery_to_footer'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_scripts()->add_data('jquery', 'group', 1);
        }, 100);
    }

    if (isset($opt['disable_rss_feed'])) {
        foreach ([
            'do_feed', 'do_feed_rdf', 'do_feed_rss', 'do_feed_rss2',
            'do_feed_atom', 'do_feed_rss2_comments', 'do_feed_atom_comments'
        ] as $feed) {
            add_action($feed, function () {
                wp_die('RSS Feed 已停用，請返回首頁。');
            });
        }
    }

    if (!is_admin()) {
        if (isset($opt['remove_jquery'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('jquery');
            }, 100);
        }

        if (isset($opt['remove_jquery_migrate'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('jquery-migrate');
            }, 100);
        }

        if (isset($opt['remove_comment_reply'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('comment-reply');
            }, 100);
        }

        if (isset($opt['remove_wp_polyfill'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('wp-polyfill');
            }, 100);
        }

        if (isset($opt['remove_admin_bar_script'])) {
            add_filter('show_admin_bar', '__return_false');
        }

        if (isset($opt['remove_wp_ajax_response'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('wp-ajax-response');
            }, 100);
        }

        if (isset($opt['remove_zxcvbn_async'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('zxcvbn-async');
            }, 100);
        }

        if (isset($opt['remove_password_strength_meter'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('password-strength-meter');
            }, 100);
        }

        if (isset($opt['remove_thickbox'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('thickbox');
            }, 100);
        }
    }
});