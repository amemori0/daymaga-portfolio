<?php
/**
 * フロントページ: 人気記事セクション
 * 閲覧数（post_views_count）順に5件を表示。
 */
$popular_query = new WP_Query([
  "post_type" => "post",
  "posts_per_page" => 5,
  "meta_key" => "post_views_count",
  "orderby" => "meta_value_num",
  "order" => "DESC",
  // 閲覧数メタが未設定の投稿も一覧から漏れないように EXISTS / NOT EXISTS 両方を許可する
  "meta_query" => [
    "relation" => "OR",
    [
      "key" => "post_views_count",
      "compare" => "EXISTS",
    ],
    [
      "key" => "post_views_count",
      "compare" => "NOT EXISTS",
    ],
  ],
]); ?>

<?php if ($popular_query->have_posts()): ?>
<section class="p-top-popular">
  <div class="p-top-popular__inner">

    <div class="p-top-popular__header">
      <h2 class="c-section-title p-top-popular__title" data-align="left" data-status="white">
        <svg aria-hidden="true" focusable="false" width="72" height="38" viewBox="0 0 72 38" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M42.9056 38C30.7853 26.529 -4.20111 4.86719 0.417236 1.75967C13.3482 -6.94112 27.3432 18.4447 42.9056 38Z" fill="white"/>
          <path d="M34.0415 36.01C43.1022 27.4348 75.5692 16.9946 71.6778 14.3764C59.465 6.15945 45.6753 21.3913 34.0415 36.01Z" fill="white"/>
        </svg>
        <span>よく読まれている記事</span>
      </h2>

      <div class="p-top-popular__swiper-button-wrap">
        <div class="c-swiper-nav p-top-popular__swiper-prev swiper-button-prev" data-status="white" role="button" aria-label="前のスライドへ">
          <?php include get_theme_file_path("/assets/images/arrow_left_white.svg"); ?>
        </div>
        <div class="c-swiper-nav p-top-popular__swiper-next swiper-button-next" data-status="white" role="button" aria-label="次のスライドへ">
          <?php include get_theme_file_path("/assets/images/arrow_right_white.svg"); ?>
        </div>
      </div>
    </div>

    <div class="p-top-popular__swiper-container" role="region" aria-label="よく読まれている記事スライダー">
      <div class="swiper p-top-popular__swiper">
        <div class="swiper-wrapper p-top-popular__swiper-wrapper" role="list">

          <?php while ($popular_query->have_posts()):
            $popular_query->the_post(); ?>
            <?php get_template_part("template-parts/card", null, [
              "card_item_class" => "swiper-slide p-top-popular__swiper-slide",
              "item_tag" => "div",
            ]); ?>
          <?php
          endwhile; ?>

        </div>
      </div>
    </div>

    <!-- プログレスバー -->
    <div class="c-progressbar p-top-popular__swiper-pagination swiper-pagination" aria-label="スライドページネーション"></div>

  </div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
