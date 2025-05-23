
<?php include WDO_PLUGIN_DIR . 'includes/settings-data.php'; ?>
<div class="wrap">
    <h1>WP Performance and Optimizer</h1>
    <p>清理 &lt;head&gt; 不必要的 Meta/Link/Script 輸出，以及移除不必要的 WP 內建不必要的 JS/CSS 載入、外部資源請求，以提升網站效能與安全性，並符合隱私。</p>
    <form method="post" action="options.php">
        <?php settings_fields('wdo_settings_group'); ?>
        <?php
        wdo_render_group_table(htmlspecialchars('清理 <head> 輸出'),$slug[0], $group_head);
        wdo_render_group_table(htmlspecialchars('停用功能'), $slug[1], $group_features);
        wdo_render_group_table(htmlspecialchars('系統設定(wp-config.php)'), $slug[2], $group_config);
        ?>
        <?php submit_button(); ?>
    </form>
</div>