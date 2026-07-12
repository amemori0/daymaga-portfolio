<?php
/**
 * 投稿詳細ページ（single.php）
 */
get_header(); ?>

<main class="l-main">
  <?php if (have_posts()):
    while (have_posts()):

      the_post();
      setPostViews(get_the_ID()); // 閲覧数カウント

      $post_categories = get_the_category();
      ?>

  <article class="p-single">
    <div class="p-single__inner">
      <div class="p-single__contents">
      <div class="p-single__meta">
        <div class="p-single__date">
          <span>公開日</span>
          <time datetime="<?php echo esc_attr(get_the_date("Y-m-d")); ?>">
            <?php echo esc_html(get_the_date("Y.m.d")); ?>
          </time>
        </div>

        <?php if (!empty($post_categories)): ?>
          <div class="c-category"<?php echo ' data-category="' . esc_attr($post_categories[0]->slug) . '"'; ?>>
            <div class="c-category__label" href="<?php echo esc_url(get_category_link($post_categories[0]->term_id)); ?>">
              <span class="u-sr-only">カテゴリ：</span>
              <?php echo esc_html($post_categories[0]->name); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <h2 class="p-single__title"><?php the_title(); ?></h2>

      <?php if (has_post_thumbnail()): ?>
        <div class="p-single__img">
          <?php the_post_thumbnail("full", [
            "alt" => "",
            "fetchpriority" => "high", // ファーストビューの画像のためLCP対策
          ]); ?>
        </div>
      <?php endif; ?>

      <?php
      $summary_text = get_field("summary_text");
      if ($summary_text): ?>
        <p class="p-single__summary"><?php echo esc_html($summary_text); ?></p>
      <?php endif;
      ?>
      <div class="p-single__toc">
        <?php get_template_part("template-parts/toc", null, [
          "toc_class" => "p-single__toc-content",
        ]); ?>
      </div>
      <div class="p-single__content">
        <?php the_content(); ?>
        <?php
        $faq_items = [];
        for ($i = 1; $i <= 6; $i++) {
          $question = get_field("faq_question_{$i}");
          $answer = get_field("faq_answer_{$i}");

          if ($question && $answer) {
            $faq_items[] = [
              "question" => $question,
              "answer" => $answer,
            ];
          }
        }

        if (!empty($faq_items)):
          get_template_part("template-parts/faq", null, [
            "items" => $faq_items,
          ]);
        endif;
        ?>

<div class="p-single__footnotes">
<?php get_template_part("template-parts/footnotes"); ?>
</div>

<div class="p-single__closing">
<?php get_template_part("template-parts/closing"); ?>
</div>

<!-- この記事のタグ -->
<?php
$post_tags = get_the_tags();
if ($post_tags && !is_wp_error($post_tags)): ?>
<div class="p-single__tags">
  <p class="p-single__tags-label">この記事のタグ</p>
  <ul class="c-tags" aria-label="記事のタグ">
    <?php foreach ($post_tags as $tag): ?>
      <li>
        <a class="c-tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
          #<?php echo esc_html($tag->name); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif;
?>
      </div>
</div>
    </div>
  </article>

  <?php
    endwhile;
  endif; ?>


<section class="p-single__popular">
  <div class="p-single__popular-inner">
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

      <div id="tag-filter" class="p-single__tag-filter-inner">
      <?php get_template_part("template-parts/tag-filter"); ?>
    </div>

    <?php get_template_part("template-parts/cta"); ?>
</main>

<?php get_footer();
?>
