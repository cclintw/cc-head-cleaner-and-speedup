=== CC Head Cleaner & Speed Up ===
Contributors: cclin
Tags: performance, cleanup, optimization, head, speed
Requires at least: 5.8
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Clean WordPress head output and optionally disable selected features for a lighter frontend.

== Description ==

CC Head Cleaner & Speed Up helps site owners reduce unused frontend head and header output, and optionally disable selected WordPress features from the admin area.

The plugin focuses on small, explicit toggles. You choose what to remove or disable, and the plugin applies only those selected options.

Remove options only clean frontend output. Disable options turn off the related feature behavior and automatically include the matching output cleanup option where applicable.

= Key Features =

* Remove common WordPress head and header output such as generator, RSD, WLW manifest, shortlink, feed links, REST discovery, oEmbed discovery, adjacent post links, DNS prefetch, emoji output, block CSS, theme enhancement CSS, global styles, and classic theme styles.
* Disable selected features such as global styles, image auto-sizes CSS, the block editor, emoji scripts, oEmbed routes, and RSS feed routes.
* Remove frontend jQuery Migrate or frontend jQuery when your theme and plugins do not require them.
* Close frontend comments and remove comment reply output.
* Manage all options from Settings > Site Cleanup.

= Designed for =

* Site owners who want cleaner frontend output.
* Developers who prefer explicit performance toggles instead of broad optimization bundles.
* Lightweight WordPress installations where unused default features can be safely disabled.

= Safety Notes =

This plugin does not edit WordPress core files and does not write to wp-config.php.

Some options can affect theme or plugin behavior, especially removing jQuery, disabling feeds, disabling oEmbed, or disabling the block editor. Test these options on a staging site before using them on a production site.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate the plugin through the Plugins screen in WordPress.
3. Go to Settings > Site Cleanup.
4. Enable only the cleanup options that are appropriate for your site.

== Frequently Asked Questions ==

= Will this break my site? =

Most options are safe for many sites, but some options intentionally remove WordPress features. If your theme or another plugin depends on jQuery, feeds, oEmbed, comments, or the block editor, disabling those features may affect behavior.

= Does this plugin modify wp-config.php? =

No. The plugin stores its options in the WordPress options table and does not write to wp-config.php.

= Can I revert changes? =

Yes. Disable the option from Settings > Site Cleanup and save the settings.

= Does this plugin include third-party libraries? =

No. The plugin does not include third-party PHP or JavaScript libraries.

== Screenshots ==

1. Toggle-based settings screen.

== Changelog ==

= 1.0.3 =

* Prepared plugin structure, documentation, sanitization, escaping, and file layout for WordPress.org review.
* Removed direct wp-config.php writing.
* Removed unused generated detail files and unused helper library.

== Upgrade Notice ==

= 1.0.3 =

Improves WordPress.org compliance and removes direct wp-config.php modification.
