<section class="p-top-all-posts">
  <div class="l-inner">

    <h2 class="c-section-title" data-align="left">
      <svg aria-hidden="true" focusable="false" width="72" height="38" viewBox="0 0 72 38" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M42.9056 38C30.7853 26.529 -4.20111 4.86719 0.417236 1.75967C13.3482 -6.94112 27.3432 18.4447 42.9056 38Z" fill="#135097"/>
        <path d="M34.0415 36.01C43.1022 27.4348 75.5692 16.9946 71.6778 14.3764C59.465 6.15945 45.6753 21.3913 34.0415 36.01Z" fill="#C93A3A"/>
      </svg>
      <span>すべての記事</span>
    </h2>

<?php
get_template_part( 'template-parts/tab-card', null, [
    'list_class'      => 'p-top-all__tab-list',
    'contents_class'  => 'p-top-all__tab-contents',
    'card_list_class' => 'p-top-all__card-list',
    'card_item_class' => 'p-top-all__card-item',
    'card_tags_class' => 'p-top-all__card-tags',
] );
?>
    
    <div class="p-top-all-posts__button-wrap">
        <a href="<?php echo esc_url( home_url( '/all-posts/' ) ); ?>" class="c-button-more">
            <span class="c-button-more__text">もっと見る</span>
            <span class="u-sr-only">すべての記事一覧へ</span>
        </a>
    </div>

  </div>
</section>