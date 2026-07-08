<?php
/**
 * フロントページ: MV セクション
 * 投稿からランダムに3件をピックアップ記事として表示。
 */
$mv_query = new WP_Query([
  "post_type" => "post",
  "posts_per_page" => 3,
  "orderby" => "rand",
]); ?>

<?php if ($mv_query->have_posts()): ?>
<section class="p-mv">

  <h2 class="u-sr-only">ピックアップ記事</h2>

  <div class="p-mv__swiper-container" role="region" aria-label="ピックアップ記事スライダー">
    <div class="swiper p-mv__swiper">
      <div class="swiper-wrapper p-mv__swiper-wrapper" role="list">

        <?php
        $slide_index = 0;
         while ($mv_query->have_posts()):
          $mv_query->the_post(); ?>
          <?php get_template_part("template-parts/card", null, [
            "card_item_class" => "swiper-slide p-mv__swiper-slide",
            "card_tags_class" => "p-mv__card-tags",
            "card_status" => "large", //大きいカードスタイル
            "item_tag" => "div",
            "is_first" => $slide_index === 0, // 1枚目だけfetchpriority="high"にする(MVなため画像の読み込み速度を向上させるため)
          ]); ?>
        <?php
        $slide_index++;
        endwhile; ?>

      </div>
    </div>

    <div class="p-mv__swiper-button-wrap">
      <div class="c-swiper-nav p-mv__swiper-prev swiper-button-prev" data-status="dark" role="button" aria-label="前のスライドへ">
        <?php include get_theme_file_path("/assets/images/arrow_left_dark.svg"); ?>
      </div>
      <div class="c-swiper-nav p-mv__swiper-next swiper-button-next" data-status="dark" role="button" aria-label="次のスライドへ">
        <?php include get_theme_file_path("/assets/images/arrow_right_dark.svg"); ?>
      </div>
    </div>
  </div>

</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
