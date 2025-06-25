=== CC Head Cleaner & Speed Up ===
Contributors: cclin
Author URI: https://cclin.cc/
Tags: 效能優化, head 清理, 停用功能, 網站加速, 最佳化, 移除 meta, 移除腳本
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

透過移除多餘的 <head> 元素與停用不必要功能，讓您的 WordPress 網站更加快速、乾淨。

== Description ==

**CC Head Cleaner & Speed Up** 可協助您輕鬆優化 WordPress 網站：

- 清理網站 `<head>` 區域，移除多餘 meta、link、style、script 標籤
- 停用未使用功能，例如 emoji、oEmbed、RSS 訂閱、Heartbeat API
- 調整系統設定，如文章修訂、自動存檔間隔、記憶體上限
- 移除或移動大型腳本（例如 jQuery）以提升速度

所有設定皆可透過後台操作，無需撰寫程式碼。

== Installation ==

1. 將外掛上傳至 `/wp-content/plugins/` 資料夾。
2. 透過後台「外掛」選單啟用。
3. 前往 **設定 > 網站清理** 進行相關設定。

== Screenshots ==

1. 簡潔易用的開關式設定介面。

== Frequently Asked Questions ==

= 啟用後是否會影響網站？ =
大多數選項相當安全，但若移除關鍵腳本（如 jQuery），可能影響佈景主題或其他外掛，請務必測試。

= 是否會修改 WordPress 核心檔案？ =
僅有啟用「系統設定」功能時，外掛會寫入 `wp-config.php`，其他情況不會動到核心檔案。

= 可以還原設定嗎？ =
可以，停用選項後即恢復 WordPress 預設行為。

== Changelog ==

= 1.0 =
* 首次發佈，提供 head 清理、功能停用與系統設定功能。

== Upgrade Notice ==

= 1.0 =
初始版本，協助清理 head 區域與停用不必要功能，改善網站效能。

== License ==

本外掛遵循 GPLv2 或更高版本授權。