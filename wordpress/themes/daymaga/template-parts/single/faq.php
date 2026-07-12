<?php
/**
 * よくある質問（FAQ）
 */
$faq_items = isset($args["items"]) ? $args["items"] : [];
?>

<?php if (!empty($faq_items)): ?>
<dl class="c-faq">
  <?php foreach ($faq_items as $index => $item): ?>
    <div class="c-faq__item">
      <dt class="c-faq__question">
        <span class="c-faq__question-label" aria-hidden="true">質問<?php echo esc_html($index + 1); ?></span>
        <span class="u-sr-only">質問<?php echo esc_html($index + 1); ?>：</span>
        <span class="c-faq__question-text">
        <?php echo esc_html($item["question"]); ?>
        </span>
      </dt>
      <dd class="c-faq__answer">
        <span class="c-faq__answer-label" aria-hidden="true">回答<?php echo esc_html($index + 1); ?></span>
        <span class="u-sr-only">回答<?php echo esc_html($index + 1); ?>：</span>
        <span class="c-faq__answer-text">
        <?php echo wp_kses_post($item["answer"]); ?>
        </span>
      </dd>
    </div>
  <?php endforeach; ?>
</dl>
<?php endif; ?>