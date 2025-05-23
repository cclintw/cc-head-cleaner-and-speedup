<?php
/**
 * Plugin Name: CC WP Deploy Optimizer
 * Description: 一鍵最佳化 WordPress 安全、效能、設定，支援後台開關、分群組、顯示 hook 與 HTML 範例。
 * Version: 1.0
 * Author: 開發超級助理
 */
if (!defined('ABSPATH')) exit;

define('WDO_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once WDO_PLUGIN_DIR . 'includes/settings-page.php';
require_once WDO_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once WDO_PLUGIN_DIR . 'includes/feature-toggle.php';
require_once WDO_PLUGIN_DIR . 'includes/config-writer.php';