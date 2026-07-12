<?php
/**
 * タグアーカイブページ
 * 該当タグの投稿のみを一覧表示（タブなし）
 */
get_header();

$current_tag = get_queried_object();
?>

<main class="l-main">
  <section class="p-tag">

    <div class="p-tag__inner">
      <div class="p-tag__header">
        <h2 class="p-tag__title">
          <span class="p-tag__title-tag">#<?php echo esc_html($current_tag->name); ?></span>
          <span class="p-tag__title-text">の検索結果</span>
        </h2>
      </div>

      <ul class="p-tag__card-list">
        <?php if (have_posts()): ?>
          <?php while (have_posts()):
            the_post(); ?>
            <?php get_template_part("template-parts/card", null, [
              "card_item_class" => "p-tag__card-item",
            ]); ?>
          <?php
          endwhile; ?>
        <?php else: ?>
          <li class="c-card-list__empty">このタグの投稿は見つかりませんでした。</li>
        <?php endif; ?>
      </ul>

      <?php get_template_part("template-parts/pagination", null, [
        "pagination_class" => "p-tag__pagination",
      ]); ?>
    </div>

    <section class="p-article__popular">
      <div class="p-article__popular-inner">
        <?php get_template_part("template-parts/popular", null, [
          "logo_svg" => '
          <svg aria-hidden="true" focusable="false" width="52" height="28" viewBox="0 0 52 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M30.9874 28C22.2338 19.5477 -3.03413 3.58635 0.301337 1.2966C9.64038 -5.11451 19.7479 13.5908 30.9874 28Z" fill="#135097"/>
          <path d="M24.5855 26.5337C31.1294 20.2151 54.5778 12.5223 51.7673 10.5932C42.9469 4.53854 32.9878 15.762 24.5855 26.5337Z" fill="#C93A3A"/>
          </svg>',
          "nav_status" => "dark",
          "nav_prev_svg" => "arrow_left_dark2.svg",
          "nav_next_svg" => "arrow_right_dark2.svg",
        ]); ?>
      </div>
    </section>

    <div id="tag-filter" class="p-tag__tag-filter-inner">
      <?php get_template_part("template-parts/tag-filter"); ?>
    </div>

    <?php get_template_part("template-parts/cta"); ?>
  </section>
</main>

<?php get_footer(); ?>
