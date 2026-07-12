<?php
/**
 * 投稿一覧ページのテンプレート
 *
 * 投稿ページ（スラッグ: all）の URL（/all/）で表示されるテンプレート。
 * タブ切り替え機能付きの記事一覧、タグフィルター、CTAを表示します。
 */
get_header(); ?>

<main>
  <div class="p-all">
    <div class="l-inner">
      <h2 class="c-section-title" data-align="left">
        <svg
          aria-hidden="true"
          focusable="false"
          width="72"
          height="38"
          viewBox="0 0 72 38"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M42.9056 38C30.7853 26.529 -4.20111 4.86719 0.417236 1.75967C13.3482 -6.94112 27.3432 18.4447 42.9056 38Z" fill="#135097" />
          <path d="M34.0415 36.01C43.1022 27.4348 75.5692 16.9946 71.6778 14.3764C59.465 6.15945 45.6753 21.3913 34.0415 36.01Z" fill="#C93A3A" />
        </svg>
        <span>すべての記事</span>
      </h2>

      <?php get_template_part("template-parts/tab-list", null, [
        "list_class" => "p-all__tab-list",
        "contents_class" => "p-all__tab-contents",
        "card_list_class" => "p-all__card-list",
        "card_item_class" => "p-all__card-item",
      ]); ?>

        <?php get_template_part("template-parts/pagination", null, [
        "pagination_class" => "p-all__pagination",
      ]); ?>
    </div>

    <div id="tag-filter" class="p-all__tag-filter-inner">
      <?php get_template_part("template-parts/tag-filter"); ?>
    </div>

    <?php get_template_part("template-parts/cta"); ?>
  </div>
</main>

<?php get_footer(); ?>
