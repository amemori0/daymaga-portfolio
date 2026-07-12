<?php
/**
 * 人気記事セクション
 * 閲覧数（post_views_count）順に5件を表示。
 */
$title_status = isset($args["title_status"]) ? ' data-status="' . esc_attr($args["title_status"]) . '"' : "";
$logo_svg = isset($args["logo_svg"]) ? $args["logo_svg"] : "";
$nav_status = isset($args["nav_status"]) ? esc_attr($args["nav_status"]) : "white";
$nav_prev_svg = isset($args["nav_prev_svg"]) ? $args["nav_prev_svg"] : "arrow_left_white.svg";
$nav_next_svg = isset($args["nav_next_svg"]) ? $args["nav_next_svg"] : "arrow_right_white.svg";

$popular_query = new WP_Query([
  "post_type" => "post",
  "posts_per_page" => 5,
  "meta_key" => "post_views_count",
  "orderby" => "meta_value_num",
  "order" => "DESC",
  "meta_query" => [
    "relation" => "OR",
    ["key" => "post_views_count", "compare" => "EXISTS"],
    ["key" => "post_views_count", "compare" => "NOT EXISTS"],
  ],
]);
?>

<?php if ($popular_query->have_posts()): ?>

  <div class="p-popular__header">
    <h2 class="c-section-title p-popular__title" data-align="left"<?php echo $title_status; ?>>
      <?php echo $logo_svg; ?>
      <span>よく読まれている記事</span>
    </h2>

    <div class="p-popular__swiper-button-wrap">
      <div class="c-swiper-nav p-popular__swiper-prev swiper-button-prev" data-status="<?php echo $nav_status; ?>" role="button" aria-label="前のスライドへ">
        <?php include get_theme_file_path("/assets/images/" . $nav_prev_svg); ?>
      </div>
      <div class="c-swiper-nav p-popular__swiper-next swiper-button-next" data-status="<?php echo $nav_status; ?>" role="button" aria-label="次のスライドへ">
        <?php include get_theme_file_path("/assets/images/" . $nav_next_svg); ?>
      </div>
    </div>
  </div>

  <div class="p-popular__swiper-container" role="region" aria-label="よく読まれている記事スライダー">
    <div class="swiper p-popular__swiper">
      <div class="swiper-wrapper p-popular__swiper-wrapper" role="list">

        <?php while ($popular_query->have_posts()):
          $popular_query->the_post(); ?>
          <?php get_template_part("template-parts/card", null, [
            "card_item_class" => "swiper-slide p-popular__swiper-slide",
            "item_tag" => "div",
          ]); ?>
        <?php
        endwhile; ?>

      </div>
    </div>
  </div>

  <div class="c-progressbar p-popular__swiper-pagination swiper-pagination" aria-label="スライドページネーション"></div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
