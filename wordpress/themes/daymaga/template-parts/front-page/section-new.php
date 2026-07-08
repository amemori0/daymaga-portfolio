<?php
/**
 * フロントページ: 新着記事セクション
 * 新着順に3件を表示。
 */
$new_query = new WP_Query([
  "post_type" => "post",
  "posts_per_page" => 3,
  "orderby" => "date",
  "order" => "DESC",
]); ?>

<?php if ($new_query->have_posts()): ?>
<section class="p-top-new">
  <div class="p-top-new__inner">
    <h2 class="c-section-title p-top-new__title" data-align="center">
      <svg aria-hidden="true" focusable="false" width="72" height="38" viewBox="0 0 72 38" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M42.9056 38C30.7853 26.529 -4.20111 4.86719 0.417236 1.75967C13.3482 -6.94112 27.3432 18.4447 42.9056 38Z" fill="#135097"/>
        <path d="M34.0415 36.01C43.1022 27.4348 75.5692 16.9946 71.6778 14.3764C59.465 6.15945 45.6753 21.3913 34.0415 36.01Z" fill="#C93A3A"/>
      </svg>
      <span>新着記事</span>
    </h2>

    <ul class="p-top-new__list">
      <?php while ($new_query->have_posts()):
        $new_query->the_post(); ?>
        <?php get_template_part("template-parts/card"); ?>
      <?php
      endwhile; ?>
    </ul>

    <div class="p-top-new__button-wrap">
      <a href="<?php echo esc_url(home_url("/all/")); ?>" class="c-button-more">
        <span class="c-button-more__text">もっと見る</span>
        <span class="u-sr-only">新着記事一覧へ</span>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
