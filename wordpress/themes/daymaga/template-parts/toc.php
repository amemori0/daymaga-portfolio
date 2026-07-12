<?php
/**
 * 目次（本文中のh3, h4見出しを自動抽出）
 *
 * 番号（1. 1-1. など）はcounterを使わず、本文の見出しテキストに
 * 既に含まれている前提とする。本文と目次の番号がズレないようにするため。
 */
$content = get_the_content();
$content = apply_filters("the_content", $content);
$toc_class = isset($args["toc_class"]) ? " " . $args["toc_class"] : "";

// h3, h4を正規表現で抽出し、階層構造の配列に組み立てる
preg_match_all('/<h([34])[^>]*id="([^"]*)"[^>]*>(.*?)<\/h\1>/i', $content, $matches, PREG_SET_ORDER);

$toc_items = [];
foreach ($matches as $match) {
  $toc_items[] = [
    "level" => (int) $match[1], // 3 または 4
    "id" => $match[2],
    "text" => wp_strip_all_tags($match[3]),
  ];
}
?>

<?php if (!empty($toc_items)): ?>
<nav class="c-toc<?php echo esc_attr($toc_class); ?>" aria-label="目次">
  <p class="c-toc__title">目次</p>
  <ol class="c-toc__list">
    <?php
    $inside_sublist = false;
    foreach ($toc_items as $index => $item):

      $is_h3 = $item["level"] === 3;
      $next_is_h4 = isset($toc_items[$index + 1]) && $toc_items[$index + 1]["level"] === 4;
      ?>
      <?php if ($is_h3): ?>
        <?php if ($inside_sublist):
          echo "</ol></li>";
          $inside_sublist = false;
        endif; ?>
        <li class="c-toc__item" data-level="h3">
          <a class="c-toc__link" href="#<?php echo esc_attr($item["id"]); ?>">
            <?php echo esc_html($item["text"]); ?>
          </a>
          <?php if ($next_is_h4):
            $inside_sublist = true; ?>
            <ol class="c-toc__sublist">
          <?php
          endif; ?>
      <?php else: ?>
        <li class="c-toc__item" data-level="h4">
          <a class="c-toc__link" href="#<?php echo esc_attr($item["id"]); ?>">
            <?php echo esc_html($item["text"]); ?>
          </a>
        </li>
      <?php endif; ?>

      <?php if ($is_h3 && !$next_is_h4): ?>
        </li>
      <?php endif; ?>
    <?php
    endforeach;
    ?>
    <?php if ($inside_sublist):
      echo "</ol></li>";
    endif; ?>
  </ol>
</nav>
<?php endif; ?>
