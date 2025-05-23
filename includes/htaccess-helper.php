<?php
echo '<h2>建議 .htaccess 安全規則</h2>';
echo '<p>請將下列內容加入 <code>/wp-content/uploads/.htaccess</code>：（請勿放在根目錄）</p>';
echo '<textarea readonly rows="6" style="width:100%; font-family: monospace;">';
echo "# 禁止列出目錄\nOptions -Indexes\n\n";
echo "# 禁止 PHP 執行\n<FilesMatch \"\\.php$\">\n    Deny from all\n</FilesMatch>";
echo '</textarea>';
