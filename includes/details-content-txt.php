<?php
/**
 * 使用 TB_iframe=true 載入外掛說明檔案 readme.txt
 * plugin_row_meta 載入範例:
 * $links[] = '<a href="' . CCHCS_PLUGIN_URL . 'includes/details-content.php?TB_iframe=true&width=772&height=617" class="thickbox">View Details</a>';
 */

// 正確引入 WordPress 環境
require_once dirname(__DIR__, 4) . '/wp-load.php';

if (! defined('ABSPATH')) {
    exit;
}

if (! defined('CCHCS_PLUGIN_DIR') || ! defined('CCHCS_TEXT_DOMAIN') || ! defined('CCHCS_PLUGIN_NAME')) {
    exit('外掛常數未正確定義');
}

// file path
$plugin_dir = CCHCS_PLUGIN_DIR;
$locale = get_locale();

if ($locale === 'zh_TW' && file_exists($plugin_dir . 'readme-zh_TW.txt')) {
    $readme_path = $plugin_dir . 'readme-zh_TW.txt';
} else {
    $readme_path = $plugin_dir . 'readme.txt';
}

$parsedown_path = $plugin_dir . 'includes/parsedown.php';

if (! file_exists($readme_path) || ! file_exists($parsedown_path)) {
    wp_die('必要檔案遺失');
}

if (! class_exists('Parsedown')) {
    require_once $parsedown_path;
}

$readme = file_get_contents($readme_path);
$parsedown = new Parsedown();

// ───── 解析 Meta 區塊 ─────
$readme_clean = preg_replace('/^===.*?===\s*/s', '', $readme);
preg_match_all('/^([^=:\n]+):\s*(.+)$/m', $readme_clean, $meta_matches, PREG_SET_ORDER);
$header_meta = [];
foreach ($meta_matches as $m) {
    $key = strtolower(trim($m[1]));
    $header_meta[ $key ] = trim($m[2]);
}

$plugin_info = [
    __('Version', CCHCS_TEXT_DOMAIN)          => $header_meta['stable tag'] ?? '',
    __('Author', CCHCS_TEXT_DOMAIN)           => $header_meta['contributors'] ?? '',
    __('Requires WordPress', CCHCS_TEXT_DOMAIN) => $header_meta['requires at least'] ?? '',
    __('Tested up to', CCHCS_TEXT_DOMAIN)     => $header_meta['tested up to'] ?? '',
    __('Requires PHP', CCHCS_TEXT_DOMAIN)     => $header_meta['requires php'] ?? '',
    __('License', CCHCS_TEXT_DOMAIN)          => $header_meta['license'] ?? '',
];

// ───── 解析 Sections 區塊 ─────
$section_alias = [
    'description'                  => 'description',
    'installation'                 => 'installation',
    'frequently asked questions'   => 'faq',
    'screenshots'                  => 'screenshots',
    'changelog'                    => 'changelog',
];
$tab_labels = [
    'description'  => __('Description', CCHCS_TEXT_DOMAIN),
    'installation' => __('Installation', CCHCS_TEXT_DOMAIN),
    'faq'          => __('FAQ', CCHCS_TEXT_DOMAIN),
    'screenshots'  => __('Screenshots', CCHCS_TEXT_DOMAIN),
    'changelog'    => __('Changelog', CCHCS_TEXT_DOMAIN),
];
$sections = [];
preg_match_all('/^==\s*(.*?)\s*==\s*([\s\S]*?)(?=^==|\Z)/m', $readme_clean, $matches, PREG_SET_ORDER);
foreach ($matches as $match) {
    $title_raw = strtolower(trim($match[1]));
    $key       = $section_alias[ $title_raw ] ?? $title_raw;
    $markdown  = trim($match[2]);
    $sections[ $key ] = $parsedown->text($markdown);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>
		<?php esc_html_e('Plugin Details', CCHCS_TEXT_DOMAIN); ?>
	</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.cc-modal {
			padding: 1rem;
		}

		.cc-body {
			display: flex;
			overflow: hidden;
		}

		.cc-tabs-container {
			width: 70%;
			overflow-y: auto;
		}

		.cc-sidebar {
			width: 30%;
			padding: 20px;
			border-left: 1px solid #ccc;
			background: #f6f7f7;
			font-size: 14px;
		}

		.cc-tabs {
			list-style: none;
			display: flex;
			padding: 0;
			margin: 0;
			border-bottom: 1px solid #ccc;
			background: #f1f1f1;
		}

		.cc-tabs li {
			font-size: 14px;
			cursor: pointer;
			padding: 10px 20px;
			color: #2271b1;
		}

		.cc-tabs li.active {
			background: #fff;
			font-weight: bold;
			margin-bottom: -1px;
			border: 1px solid #ccc;
			border-bottom: none;
		}

		.cc-tab-pane {
			display: none;
		}

		.cc-tab-pane.active {
			display: block;
		}

		.cc-tab-content {
			padding: 20px;
		}
	</style>
</head>

<body>

	<div class="cc-modal">
		<div class="cc-header">
			<h2><?php echo esc_html(CCHCS_PLUGIN_NAME); ?></h2>
		</div>
		<div class="cc-body">
			<div class="cc-tabs-container">
				<ul class="cc-tabs">
					<?php foreach ($tab_labels as $key => $label) : ?>
					<?php if (! empty($sections[ $key ])) : ?>
					<li data-tab="<?php echo esc_attr($key); ?>"
						class="<?php echo $key === 'description' ? 'active' : ''; ?>">
						<?php echo esc_html($label); ?>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<div class="cc-tab-content">
					<?php foreach ($tab_labels as $key => $label) : ?>
					<?php if (! empty($sections[ $key ])) : ?>
					<div id="tab-<?php echo esc_attr($key); ?>"
						class="cc-tab-pane <?php echo $key === 'description' ? 'active' : ''; ?>">
						<?php echo wp_kses_post($sections[ $key ]); ?>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="cc-sidebar">
				<?php
            $author_uri = $header_meta['author uri'] ?? '';
foreach ($plugin_info as $label => $value) {
    echo '<p><strong>' . esc_html($label) . ' : </strong>';
    if ($label === __('Author', CCHCS_TEXT_DOMAIN) && ! empty($author_uri)) {
        echo '<a href="' . esc_url($author_uri) . '" target="_blank" rel="noopener noreferrer">' . esc_html($value) . '</a>';
    } else {
        echo esc_html($value);
    }
    echo '</p>';
}
?>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const tabs = document.querySelectorAll('.cc-tabs li');
			const panes = document.querySelectorAll('.cc-tab-pane');
			tabs.forEach(function(tab) {
				tab.addEventListener('click', function() {
					const target = tab.getAttribute('data-tab');
					tabs.forEach(t => t.classList.remove('active'));
					panes.forEach(p => p.classList.remove('active'));
					tab.classList.add('active');
					document.getElementById('tab-' + target).classList.add('active');
				});
			});
		});
	</script>

</body>

</html>