<?php
add_action('init', function () {
    $opt = get_option('wdo_settings');

    if (!empty($opt['disable_global_styles'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_dequeue_style('global-styles');
        }, 100);
    }

    if (!empty($opt['disable_auto_sizes_css'])) {
    add_filter('wp_img_tag_add_auto_sizes', '__return_false');  
    }

    if (!empty($opt['remove_classic_theme_styles'])) {
        add_action('wp_enqueue_scripts', function(){
            wp_dequeue_style('classic-theme-styles');
            wp_deregister_style('classic-theme-styles');
        }, 20);
    }


    if (!empty($opt['remove_gutenberg_css'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
        }, 100);
    }

    if (!empty($opt['disable_block_editor'])) {
        add_filter('use_block_editor_for_post', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');
       
    }

    if (!empty($opt['disable_emoji_support'])) {
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        add_filter('tiny_mce_plugins', function ($plugins) {
            return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
        });
        add_filter('emoji_svg_url', '__return_false');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    }

    if (!empty($opt['disable_oembed_route'])) {
        remove_action('rest_api_init', 'wp_oembed_register_route'); 
        add_filter('oembed_response_data', '__return_null');
    }
    
   if (!empty($opt['disable_all_feeds'])) {
        // 定義攔截 Feed 的函式
        $disable_feeds = function () {
            wp_redirect(home_url());
            exit;
        };

        // 註冊所有 Feed 路由攔截
        $feed_actions = [
            'do_feed',
            'do_feed_rdf',
            'do_feed_rss',
            'do_feed_rss2',
            'do_feed_atom',
            'do_feed_rss2_comments',
            'do_feed_atom_comments',
        ];

        foreach ($feed_actions as $action) {
            add_action($action, $disable_feeds, 1);
        }
    }


    if (!empty($opt['remove_widgets'])) {
        add_action('widgets_init', function () {
            unregister_widget('WP_Widget_RSS');
            unregister_widget('WP_Widget_Meta');
        }, 11);
    }

    if (!empty($opt['remove_heartbeat'])) {
        wp_deregister_script('heartbeat');
    }

    if (!empty($opt['remove_autosave'])) {
        add_action('wp_print_scripts', function () {
            wp_deregister_script('autosave');
        });
    }

    if (!empty($opt['move_jquery_to_footer'])) {
        add_action('wp_enqueue_scripts', function () {
            wp_scripts()->add_data('jquery', 'group', 1);
        }, 100);
    }

    if (!empty($opt['disable_rss_feed'])) {
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
        if (!empty($opt['remove_jquery'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('jquery');
            }, 100);
        }

        if (!empty($opt['remove_jquery_migrate'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('jquery-migrate');
            }, 100);
        }

        if (!empty($opt['remove_comment_reply'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('comment-reply');
            }, 100);
        }

        if (!empty($opt['remove_wp_polyfill'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('wp-polyfill');
            }, 100);
        }

        if (!empty($opt['remove_admin_bar_script'])) {
            add_filter('show_admin_bar', '__return_false');
        }

        if (!empty($opt['remove_wp_ajax_response'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('wp-ajax-response');
            }, 100);
        }

        if (!empty($opt['remove_zxcvbn_async'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('zxcvbn-async');
            }, 100);
        }

        if (!empty($opt['remove_password_strength_meter'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('password-strength-meter');
            }, 100);
        }

        if (!empty($opt['remove_thickbox'])) {
            add_action('wp_enqueue_scripts', function () {
                wp_deregister_script('thickbox');
            }, 100);
        }
    }
});