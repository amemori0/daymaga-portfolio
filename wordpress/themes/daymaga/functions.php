<?php

if (!defined("ABSPATH")) {
    exit; // 直接アクセス禁止
}

/**
 * Functions
 *
 * get_template_part() は読み込み失敗時も無音でスキップされるため、
 * 関数定義ファイルの読み込みには require_once を使用する。
 */
// 共通ヘルパー関数
require_once __DIR__ . "/functions-lib/func-helpers.php";

// スクリプトとスタイルの読み込み
require_once __DIR__ . "/functions-lib/func-enqueue.php";

// プラグイン管理（TGMPA）
require_once __DIR__ . "/functions-lib/func-plugins.php";

// ACF設定
require_once __DIR__ . "/functions-lib/func-acf.php";

// 基本設定
require_once __DIR__ . "/functions-lib/func-base.php";

// セキュリティー対応
require_once __DIR__ . "/functions-lib/func-security.php";

// URLのショートカット設定
require_once __DIR__ . "/functions-lib/func-url.php";

// デフォルト投稿タイプのラベル変更
require_once __DIR__ . "/functions-lib/func-add-posttype-post.php";

// カスタム投稿タイプ（works 等）はプラグイン（CPT UI 等）で登録

// 構造化データの設定（汎用化済み）
require_once __DIR__ . "/functions-lib/func-structured-data.php";

//記事の閲覧数カウント機能
require_once __DIR__ . "/functions-lib/func-post-views.php";
