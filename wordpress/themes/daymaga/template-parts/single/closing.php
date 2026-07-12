<?php
/**
 * まとめ文
 */
$closing_text = get_field("summary_closing"); ?>

<?php if ($closing_text): ?>
  <p><?php echo esc_html($closing_text); ?></p>
<?php endif; ?>
