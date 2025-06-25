=== CC Head Cleaner & Speed Up ===
Contributors: cclin
Author URI: https://cclin.cc/
Tags: performance, head cleanup, disable features, speed up, optimization, remove meta, remove scripts
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Make your WordPress site faster and cleaner by removing unnecessary <head> elements and disabling unused features.

== Description ==

**CC Head Cleaner & Speed Up** helps you easily optimize your WordPress site:

- Remove unnecessary meta, link, style, and script tags from your site's `<head>`
- Disable unused WordPress features (emoji, oEmbed, RSS feeds, Heartbeat API)
- Fine-tune system settings like revisions, autosave interval, and memory limits
- Move or remove heavy scripts like jQuery for faster load times

All settings are accessible via a simple admin interface — no coding required.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate the plugin via the "Plugins" menu.
3. Go to **Settings > Site Cleanup** to configure the options.

== Screenshots ==

1. Simple toggle-based admin settings screen.

== Frequently Asked Questions ==

= Will this break my site? =
Most options are safe. However, removing critical scripts like jQuery may affect themes or other plugins. Test before deployment.

= Does this modify core files? =
Only system configuration options may write to `wp-config.php`.

= Can I revert changes? =
Yes, disabling options restores default WordPress behavior.

== Changelog ==

= 1.0 =
* Initial release with head cleanup, feature toggles, and system configuration settings.

== Upgrade Notice ==

= 1.0 =
Initial release, safely remove unnecessary head output and disable unused features to improve speed.

== License ==

This plugin is licensed under the GPLv2 or later.