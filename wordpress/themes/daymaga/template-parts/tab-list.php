<?php
$list_class      = isset($args["list_class"]) ? " " . $args["list_class"] : "";
$contents_class  = isset($args["contents_class"]) ? " " . $args["contents_class"] : "";
$card_list_class = isset($args["card_list_class"]) ? " " . $args["card_list_class"] : "";
$card_item_class = isset($args["card_item_class"]) ? " " . $args["card_item_class"] : "";
$card_tags_class = isset($args["card_tags_class"]) ? " " . $args["card_tags_class"] : "";
$show_pagination = isset($args["show_pagination"]) ? $args["show_pagination"] : true;

$categories = get_categories([
  "hide_empty" => true,
  "orderby" => "term_order",
  "order" => "ASC",
]);

// URLパラメータでソート状態を判定（?orderby=popular など）
$current_sort = isset($_GET["orderby"]) && $_GET["orderby"] === "popular" ? "popular" : "new";

// 現在のソート状態をWP_Queryに反映するための共通引数
$order_args =
  $current_sort === "popular"
    ? [
      "meta_key" => "post_views_count",
      "orderby" => "meta_value_num",
      "order" => "DESC",
      // 閲覧数メタが未設定の投稿（まだ一度も見られていない投稿）も
      // 一覧から漏れないように EXISTS / NOT EXISTS 両方を許可する
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
    ]
    : [
      "orderby" => "date",
      "order" => "DESC",
    ];

// ページネーションを表示しない場合は常に1ページ目のみ表示する
if ($show_pagination) {
  $paged = get_query_var("paged") ? get_query_var("paged") : (get_query_var("page") ? get_query_var("page") : 1);
} else {
  $paged = 1;
}
?>

<div class="c-tab__wrap<?php echo esc_attr($list_class); ?>">
  <div class="c-tab__list" role="tablist">
    <button class="c-tab__item" role="tab" id="tab-all" aria-controls="panel-all" aria-selected="true" tabindex="0" data-category="all">すべて</button>
    <?php foreach ($categories as $category): ?>
      <button
        class="c-tab__item"
        role="tab"
        id="tab-<?php echo esc_attr($category->slug); ?>"
        aria-controls="panel-<?php echo esc_attr($category->slug); ?>"
        aria-selected="false"
        data-category="<?php echo esc_attr($category->slug); ?>"
      ><?php echo esc_html($category->name); ?></button>
    <?php endforeach; ?>
  </div>

  <!-- 新着順・人気順 -->
  <div class="c-tab__sort">
    
    <a class="c-tab__sort-button"
      href="<?php echo esc_url(add_query_arg("orderby", "new")); ?>"
      aria-current="<?php echo $current_sort === "new" ? "true" : "false"; ?>"
      <?php echo $current_sort === "new" ? 'tabindex="-1"' : ""; ?>
    >新着順</a>
    
     <a class="c-tab__sort-button"
      href="<?php echo esc_url(add_query_arg("orderby", "popular")); ?>"
      aria-current="<?php echo $current_sort === "popular" ? "true" : "false"; ?>"
      <?php echo $current_sort === "popular" ? 'tabindex="-1"' : ""; ?>
    >人気順</a>
  </div>
</div>

<div class="c-tab__contents<?php echo esc_attr($contents_class); ?>">

  <!-- パネル：すべて -->
  <div class="c-tab__panel" id="panel-all" role="tabpanel" aria-labelledby="tab-all" data-status="active">
    <?php
    $all_query = new WP_Query(array_merge([
      "post_type"      => "post",
      "posts_per_page" => 9,
      "paged"          => $paged,
    ], $order_args));
    ?>
    <ul class="c-card-list<?php echo esc_attr($card_list_class); ?>" data-category="all">
      <?php if ($all_query->have_posts()): ?>
        <?php while ($all_query->have_posts()): $all_query->the_post(); ?>
          <?php get_template_part("template-parts/card", null, [
            "card_item_class" => ltrim($card_item_class),
            "card_tags_class" => ltrim($card_tags_class),
          ]); ?>
        <?php endwhile; ?>
      <?php else: ?>
        <li class="c-card-list__empty">投稿が見つかりませんでした。</li>
      <?php endif; ?>
    </ul>

    <?php if ($show_pagination): ?>
      <?php get_template_part("template-parts/pagination", null, [
        "query" => $all_query,
        "pagination_class"  => isset($args["pagination_class"]) ? $args["pagination_class"] : "",
      ]); ?>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </div>

  <!-- カテゴリーごとのパネル (すべて以外)-->
  <?php foreach ($categories as $category): ?>
    <div class="c-tab__panel" id="panel-<?php echo esc_attr($category->slug); ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr($category->slug); ?>">
      <?php
      $cat_query = new WP_Query(array_merge([
        "post_type"      => "post",
        "posts_per_page" => 9,
        "category_name"  => $category->slug,
      ], $order_args));
      ?>
      <ul class="c-card-list<?php echo esc_attr($card_list_class); ?>" data-category="<?php echo esc_attr($category->slug); ?>">
        <?php if ($cat_query->have_posts()): ?>
          <?php while ($cat_query->have_posts()): $cat_query->the_post(); ?>
            <?php get_template_part("template-parts/card", null, [
              "card_item_class" => ltrim($card_item_class),
              "card_tags_class" => ltrim($card_tags_class),
            ]); ?>
          <?php endwhile; ?>
        <?php else: ?>
          <li class="c-card-list__empty">このカテゴリの投稿は準備中です。</li>
        <?php endif; ?>
      </ul>
      <?php wp_reset_postdata(); ?>
    </div>
  <?php endforeach; ?>
</div>