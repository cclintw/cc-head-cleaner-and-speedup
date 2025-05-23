<?php
/**
 * Plugin Name: CC WP Performance and Optimizer
 * Description: 清理&lt;<head>&lg;不必要的 Meta/Link/Script 輸出，以及移除不必要的 WP 內建不必要的 JS/CSS 載入、外部資源請求，以提升網站效能與安全性，並符合隱私。
 * Version: 1.0
 * Author: Chance Lin
 * Text Domain: cc-performance-optimizer
 * License: GPL2+
 */
if (!defined('ABSPATH')) exit;

define('WDO_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once WDO_PLUGIN_DIR . 'includes/settings-page.php';
require_once WDO_PLUGIN_DIR . 'includes/head-cleanup.php';
require_once WDO_PLUGIN_DIR . 'includes/feature-toggle.php';
require_once WDO_PLUGIN_DIR . 'includes/config-writer.php';