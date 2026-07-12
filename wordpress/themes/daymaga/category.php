<?php
/**
 * カテゴリーアーカイブページ
 * 該当カテゴリーの投稿のみを一覧表示（タブなし）
 */
get_header();

$current_category = get_queried_object();
?>

<main class="l-main">
  <section class="p-category">

    <div class="l-inner">
      <h2 class="c-section-title" data-align="left">
        <svg aria-hidden="true" focusable="false" width="72" height="38" viewBox="0 0 72 38" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M42.9056 38C30.7853 26.529 -4.20111 4.86719 0.417236 1.75967C13.3482 -6.94112 27.3432 18.4447 42.9056 38Z" fill="#135097"/>
          <path d="M34.0415 36.01C43.1022 27.4348 75.5692 16.9946 71.6778 14.3764C59.465 6.15945 45.6753 21.3913 34.0415 36.01Z" fill="#C93A3A"/>
        </svg>
        <span><?php echo esc_html($current_category->name); ?>の記事</span>
      </h2>

      <?php $paged = get_query_var("paged") ? get_query_var("paged") : (get_query_var("page") ? get_query_var("page") : 1); ?>

      <ul class="c-card-list p-category__card-list" data-category="<?php echo esc_attr($current_category->slug); ?>">
        <?php if (have_posts()): ?>
          <?php while (have_posts()):
            the_post(); ?>
            <?php get_template_part("template-parts/card", null, [
              "card_item_class" => "p-category__card-item",
            ]); ?>
          <?php
          endwhile; ?>
        <?php else: ?>
          <li class="c-card-list__empty">このカテゴリの投稿は準備中です。</li>
        <?php endif; ?>
      </ul>

      <?php get_template_part("template-parts/pagination", null, [
        "pagination_class" => "p-category__pagination",
      ]); ?>

    </div>

    <div id="tag-filter" class="p-category__tag-filter-inner">
      <?php get_template_part("template-parts/tag-filter"); ?>
    </div>

    <?php get_template_part("template-parts/cta"); ?>
  </section>
</main>

<?php get_footer(); ?>
