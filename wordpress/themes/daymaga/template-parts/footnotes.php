<?php
/**
 * 脚注（FAQなどの補足説明）
 */
$footnotes = get_field("footnotes"); ?>

<?php if ($footnotes): ?>
  <?php echo wpautop(esc_html($footnotes)); ?>
<?php endif; ?>
