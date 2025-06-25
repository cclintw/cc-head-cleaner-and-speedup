#!/bin/bash

echo "請輸入檔名前綴（不含路徑與語系，例如 cc-head-cleaner-and-speedup）："
read BASENAME

# 自動組合完整路徑
PO_FILE="languages/${BASENAME}-zh_TW.po"
MO_FILE="languages/${BASENAME}-zh_TW.mo"

# 檢查檔案是否存在
if [ ! -f "$PO_FILE" ]; then
    echo "錯誤：找不到檔案 $PO_FILE"
    exit 1
fi

# 檢查 msgfmt 是否存在
if ! command -v msgfmt &> /dev/null; then
    echo "錯誤：未安裝 msgfmt，請先安裝 gettext 套件。"
    exit 1
fi

# 編譯
echo "正在編譯 $PO_FILE..."
msgfmt "$PO_FILE" -o "$MO_FILE"

# 結果
if [ -f "$MO_FILE" ]; then
    echo "編譯完成：$MO_FILE"
else
    echo "編譯失敗，請檢查 .po 檔案內容。"
fi