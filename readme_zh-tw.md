# CC 網站 Head 清理與加速

清理 WordPress head 輸出，並可選擇停用指定功能，讓前台更輕量。

## 功能

- 移除常見的 head 與 header 輸出，例如 generator、RSD、WLW manifest、shortlink、feed links、REST discovery、oEmbed discovery、前後文章連結、DNS prefetch、emoji output、block CSS、global styles、classic theme styles。
- 停用指定的 WordPress 功能，例如 global styles、圖片 auto-sizes CSS、區塊編輯器、emoji scripts、oEmbed routes、RSS feed routes。
- 在確認網站不需要時，移除前台 jQuery Migrate 或前台 jQuery。
- 關閉前台留言並移除 comment reply 輸出。
- 設定儲存在 WordPress options，不會修改 `wp-config.php`。

Remove 選項只清理前台輸出。Disable 選項會停用相關功能，並在適用時自動包含對應的輸出清理選項。

## 安裝

1. 將外掛資料夾上傳到 `/wp-content/plugins/`。
2. 在 WordPress 後台啟用外掛。
3. 前往 **設定 > CC 網站清理**。
4. 只啟用適合目前網站的清理選項。

## 安全說明

部分選項會刻意移除 WordPress 功能。若要停用 jQuery、feeds、oEmbed、comments 或區塊編輯器，建議先在測試站確認主題與其他外掛不受影響。

## WordPress.org 備註

此 repository 依照個人標準保留 `readme.md` 與 `readme_zh-tw.md` 作為 GitHub 說明文件。正式打包送 WordPress.org 前，如 Plugin Check 回報非標準 Markdown 檔案，可手動移除。

## 授權

GPLv2 or later.
