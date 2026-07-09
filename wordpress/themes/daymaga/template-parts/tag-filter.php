<?php
/**
 * タグフィルター
 *
 * 各タグには、ACFの「tag_group」フィールドで
 * 「対象」「分類」「業界」のいずれかのグループを設定している。
 * グループ未設定のタグは「その他」としてまとめる。
 *
 * クリックすると、そのタグのアーカイブページ（archive.php）に遷移する。
 */

$group_order = ["対象", "分類", "業界"];

$all_tags = get_terms([
  "taxonomy" => "post_tag",
  "hide_empty" => true,
]);

$grouped_tags = [];
foreach ($all_tags as $tag) {
  $group = get_field("tag_group", "post_tag_" . $tag->term_id);
  if (!$group) {
    $group = "その他";
  }
  $grouped_tags[$group][] = $tag;
}
?>

<div class="c-tag-filter__header">
  <svg aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 19L13 13M1 8C1 8.91925 1.18106 9.82951 1.53284 10.6788C1.88463 11.5281 2.40024 12.2997 3.05025 12.9497C3.70026 13.5998 4.47194 14.1154 5.32122 14.4672C6.1705 14.8189 7.08075 15 8 15C8.91925 15 9.82951 14.8189 10.6788 14.4672C11.5281 14.1154 12.2997 13.5998 12.9497 12.9497C13.5998 12.2997 14.1154 11.5281 14.4672 10.6788C14.8189 9.82951 15 8.91925 15 8C15 7.08075 14.8189 6.1705 14.4672 5.32122C14.1154 4.47194 13.5998 3.70026 12.9497 3.05025C12.2997 2.40024 11.5281 1.88463 10.6788 1.53284C9.82951 1.18106 8.91925 1 8 1C7.08075 1 6.1705 1.18106 5.32122 1.53284C4.47194 1.88463 3.70026 2.40024 3.05025 3.05025C2.40024 3.70026 1.88463 4.47194 1.53284 5.32122C1.18106 6.1705 1 7.08075 1 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
  <span>キーワードで絞り込む</span>
</div>

<div class="c-tag-filter__panel">
  <dl class="c-tag-filter__list">
    <?php foreach ($group_order as $group_name): ?>
      <?php if (!empty($grouped_tags[$group_name])): ?>
        <div class="c-tag-filter__group">
          <dt class="c-tag-filter__label"><?php echo esc_html($group_name); ?></dt>
          <dd class="c-tag-filter__tags">
            <ul class="c-tag-filter__tag-list">
              <?php foreach ($grouped_tags[$group_name] as $tag): ?>
                <li>
                  <a class="c-tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                    #<?php echo esc_html($tag->name); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </dd>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </dl>
</div>