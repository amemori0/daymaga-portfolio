<?php
/**
 * ページネーション
 *
 * @param WP_Query|null $args["query"]  独自のWP_Queryを使う場合に渡す（例: tab-list.phpの$all_query）
 *                                       未指定の場合はメインクエリ（the_posts_pagination）を使う
 */
$query = isset($args["query"]) ? $args["query"] : null;
$pagination_class = isset($args["pagination_class"]) ? " " . $args["pagination_class"] : "";

$pagination_args = [
  "mid_size" => 1,
  "prev_text" => '<img src="' . esc_url(get_theme_file_uri("/assets/images/arrow_left_pagination.svg")) . '" alt="" class="c-pagination__arrow">',
  "next_text" => '<img src="' . esc_url(get_theme_file_uri("/assets/images/arrow_right_pagination.svg")) . '" alt="" class="c-pagination__arrow">',
];
?>

<?php if ($query instanceof WP_Query): ?>

  <?php
  // 独自のWP_Queryを使う場合
  $paged = get_query_var("paged") ? get_query_var("paged") : (get_query_var("page") ? get_query_var("page") : 1);

  $pagination_links = paginate_links(
    array_merge($pagination_args, [
      "total" => $query->max_num_pages,
      "current" => $paged,
    ]),
  );

  if ($pagination_links): ?>
    <nav class="c-pagination <?php echo esc_attr($pagination_class); ?>" aria-label="ページネーション">
      <?php echo $pagination_links; ?>
    </nav>
  <?php endif;
  ?>

<?php
  // メインクエリを使う場合

  else: ?>

  <?php
  ob_start();
  the_posts_pagination($pagination_args);
  $pagination_output = ob_get_clean();

  if ($pagination_output): ?>
    <nav class="c-pagination <?php echo esc_attr($pagination_class); ?>" aria-label="ページネーション">
      <?php echo $pagination_output; ?>
    </nav>
  <?php endif;
  ?>

<?php endif; ?>
