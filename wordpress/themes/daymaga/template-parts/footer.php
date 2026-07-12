<?php
/**
 * フッター
 *
 * ナビゲーションリンクは type で判定を切り替える。
 * - "category": カテゴリーアーカイブへのリンク（category.phpで判定）
 * - "page": 固定ページへのリンク（is_pageで判定）
 */
$footer_nav_links = [
  ["type" => "category", "label" => "新着記事", "category_name" => "新着情報"],
  ["type" => "page", "label" => "DayMagaについて", "slug" => "about"],
  ["type" => "category", "label" => "Tips", "category_name" => "Tips"],
  ["type" => "page", "label" => "運営会社", "slug" => "company"],
  ["type" => "category", "label" => "インタビュー", "category_name" => "インタビュー"],
  ["type" => "page", "label" => "サイト利用規約", "slug" => "terms"],
  ["type" => "category", "label" => "ニュース", "category_name" => "ニュース"],
];

$current_category_slug = is_category() ? get_queried_object()->slug : "";

foreach ($footer_nav_links as &$link) {
  if ($link["type"] === "category") {
    $category = get_category(get_cat_ID($link["category_name"]));
    $link["url"] = $category ? get_category_link($category->term_id) : "#";
    $link["is_current"] = $category && $current_category_slug === $category->slug;
  } else {
    $link["url"] = home_url("/" . $link["slug"]);
    $link["is_current"] = is_page($link["slug"]);
  }
}
unset($link);
?>

<footer class="p-footer">
  <div class="p-footer__inner">

    <div class="p-footer__content">

      <div class="p-footer__logo">
        <a href="<?php echo esc_url(home_url("/")); ?>" translate="no">
          <?php include get_theme_file_path("/assets/images/logo-footer.svg"); ?>
        </a>
      </div>

      <!-- ナビゲーション -->
      <nav class="p-footer__nav" aria-label="フッターナビゲーション">
        <ul class="p-footer__nav-list">
          <?php foreach ($footer_nav_links as $link): ?>
            <li class="p-footer__nav-item">
              
              <a href="<?php echo esc_url($link["url"]); ?>"
                class="p-footer__nav-link"
                <?php echo $link["is_current"] ? 'aria-current="page"' : ""; ?>
              ><?php echo esc_html($link["label"]); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

    </div>

    <!-- コピーライト -->
    <div class="p-footer__bottom">
      <small class="p-footer__copyright">
        &copy;<?php echo wp_date("Y");?>&nbsp;Daytra Consul
      </small>
      <p class="p-footer__note">このサイトはCrown Cat株式会社様のご協力のもと作成したコーディング用の練習課題です。実在の人物・団体とは関係ありません。</p>
    </div>

  </div>
</footer>