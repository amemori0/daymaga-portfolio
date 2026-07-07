<?php
$card_item_class = isset($args["card_item_class"]) ? " " . $args["card_item_class"] : "";
$card_tags_class = isset($args["card_tags_class"]) ? " " . $args["card_tags_class"] : "";

$post_id = get_the_ID();
$post_title = get_the_title();
?>

<li class="c-card-item<?php echo esc_attr($card_item_class); ?>">
  <article class="c-card" aria-labelledby="card-title-<?php echo esc_attr($post_id); ?>">

    <div class="c-card__img">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail("full", [
          "alt" => "",
          "loading" => "lazy",
          "decoding" => "async",
        ]); ?>
      <?php else: ?>
        <img
          src="<?php echo esc_url(get_theme_file_uri("/assets/images/no-image.webp")); ?>"
          alt=""
          width="270"
          height="157"
          loading="lazy"
          decoding="async"
        >
      <?php endif; ?>
    </div>

    <div class="c-card__body">
        <p class="c-card__date">
          <span class="u-sr-only">投稿日：</span>
          <time datetime="<?php echo esc_attr(get_the_date("Y-m-d")); ?>">
            <?php echo esc_html(get_the_date("Y.m.d")); ?>
          </time>
        </p>

      <h3 class="c-card__title" id="card-title-<?php echo esc_attr($post_id); ?>">
        <a href="<?php the_permalink(); ?>" class="c-card__link">
          <?php echo esc_html($post_title); ?>
        </a>
      </h3>

      <?php $post_categories = get_the_category(); ?>
      <div class="c-category"<?php echo !empty($post_categories) ? ' data-category="' . esc_attr($post_categories[0]->slug) . '"' : ""; ?>>
        <?php if (!empty($post_categories)): ?>
          <div class="c-category__label" href="<?php echo esc_url(get_category_link($post_categories[0]->term_id)); ?>">
            <span class="u-sr-only">カテゴリ：</span>
            <?php echo esc_html($post_categories[0]->name); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php $post_tags = get_the_tags(); ?>
      <?php if ($post_tags && !is_wp_error($post_tags)): ?>
        <ul class="c-tags<?php echo esc_attr($card_tags_class); ?>" aria-label="記事のタグ">
          <?php foreach ($post_tags as $tag): ?>
            <li>
              <a class="c-tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">#<?php echo esc_html($tag->name); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

    </div>
  </article>
</li>