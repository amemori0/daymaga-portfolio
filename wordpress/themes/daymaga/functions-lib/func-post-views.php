<?php

// ============================================================
// 記事の閲覧数カウント機能
// ============================================================

/**
 * 閲覧数を取得して表示用の文字列を返す
 *
 * @param int $postID 投稿ID
 * @return string 表示用の閲覧数文字列（例: "1,234 回閲覧"）
 */
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 回閲覧';
    }

    return number_format($count) . ' 回閲覧';
}

/**
 * 閲覧数を1増やして保存する
 * Bot・クローラーのアクセスはカウントしない
 *
 * @param int $postID 投稿ID
 */
function setPostViews($postID) {
    // Botのアクセスはカウント対象外にする
    // （検索エンジンのクローラーが「人気順」の精度を下げてしまうのを防ぐため）
    if (
        isset($_SERVER['HTTP_USER_AGENT']) &&
        preg_match('/bot|crawl|slurp|spider|mediapartners/i', $_SERVER['HTTP_USER_AGENT'])
    ) {
        return;
    }

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * 投稿公開時に post_views_count メタを 0 で初期化する
 * （人気順ソートで、まだ閲覧されていない投稿が
 * 　meta_value_num の並び替えから漏れてしまうのを防ぐため）
 */
function daymaga_init_post_views_count($post_id) {
    if (get_post_meta($post_id, 'post_views_count', true) === '') {
        add_post_meta($post_id, 'post_views_count', '0');
    }
}
add_action('publish_post', 'daymaga_init_post_views_count');

// ============================================================
// 不要なrel linkの削除（SEO対策）
// 前後記事へのlinkタグをheadから除去し、無駄なリクエストを減らす
// ============================================================
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);