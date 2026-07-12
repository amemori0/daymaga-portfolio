<?php
$card_item_class = isset($args["card_item_class"]) ? " " . $args["card_item_class"] : "";
$card_tags_class = isset($args["card_tags_class"]) ? " " . $args["card_tags_class"] : "";
$card_status = isset($args["card_status"]) ? ' data-status="' . esc_attr($args["card_status"]) . '"' : "";
//card.phpをSwiperなどのセクションで共通化して利用する際にliではなくdivに変換する
$allowed_item_tags = ["li", "div"];
$item_tag = isset($args["item_tag"]) && in_array($args["item_tag"], $allowed_item_tags, true) ? $args["item_tag"] : "li";
// divの場合だけ、リストの一部であることを示すrole属性を自動で付与する
$item_role = $item_tag === "div" ? ' role="listitem"' : "";

$post_id = get_the_ID();
$post_title = get_the_title();
$is_first = isset($args["is_first"]) ? $args["is_first"] : false;
?>
<<?php echo esc_html($item_tag); ?> class="c-card-item<?php echo esc_attr($card_item_class); ?>"<?php echo $item_role; ?>>
  <article class="c-card" <?php echo $card_status; ?> aria-labelledby="card-title-<?php echo esc_attr($post_id); ?>">

    <div class="c-card__img">
      <?php if (has_post_thumbnail()): ?>
        <?php
        $img_attrs = $is_first ? ["alt" => "", "fetchpriority" => "high"] : ["alt" => "", "loading" => "lazy", "decoding" => "async"];
        the_post_thumbnail("full", $img_attrs);
        ?>
      <?php else: ?>
        <img
          src="<?php echo esc_url(get_theme_file_uri("/assets/images/image_dummy.webp")); ?>"
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
          <div class="c-category__label">
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
<?php echo "</" . esc_html($item_tag) . ">"; ?>