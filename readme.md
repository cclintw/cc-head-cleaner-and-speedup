# CC Head Cleaner & Speed Up

Clean WordPress head output and optionally disable selected features for a lighter frontend.

## Features

- Remove common head and header output such as generator, RSD, WLW manifest, shortlink, feed links, REST discovery, oEmbed discovery, adjacent post links, DNS prefetch, emoji output, block CSS, global styles, and classic theme styles.
- Disable selected WordPress features such as global styles, image auto-sizes CSS, the block editor, emoji scripts, oEmbed routes, and RSS feed routes.
- Remove frontend jQuery Migrate or frontend jQuery when your site does not require them.
- Close frontend comments and remove comment reply output.
- Store settings in WordPress options without modifying `wp-config.php`.

Remove options only clean frontend output. Disable options turn off the related feature behavior and automatically include the matching output cleanup option where applicable.

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate the plugin in WordPress.
3. Go to **Settings > Site Cleanup**.
4. Enable only the options that are appropriate for your site.

## Safety Notes

Some options intentionally remove WordPress features. Test carefully before disabling jQuery, feeds, oEmbed, comments, or the block editor on a production site.

## WordPress.org Notes

This repository includes `readme.md` and `readme_zh-tw.md` for GitHub documentation. Remove those extra Markdown files before packaging for WordPress.org if Plugin Check reports them as non-standard files.

## License

GPLv2 or later.
