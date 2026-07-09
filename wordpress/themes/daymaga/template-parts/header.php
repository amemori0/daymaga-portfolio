<!-- 追従するヘッダー -->
<header class="p-header" data-status="fixed">
  <div class="p-header__inner">

    <div class="p-header__logo">
      <a href="<?php echo esc_url(home_url("/")); ?>" translate="no">
        <?php include get_theme_file_path("/assets/images/logo_fixed.svg"); ?>
      </a>
    </div>

    <nav class="p-header__nav" aria-label="グローバルナビゲーション">
      <ul class="p-header__nav-list">
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/new")); ?>" class="p-header__nav-link">新着記事</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/tips")); ?>" class="p-header__nav-link">Tips</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/interview")); ?>" class="p-header__nav-link">インタビュー</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/news")); ?>" class="p-header__nav-link">ニュース</a>
        </li>
      </ul>

      <div class="p-header__button">
        <a href="<?php echo esc_url(home_url("/consultation")); ?>" class="c-button-split" data-status="primary">
          <span class="c-button-split__label">コンサルをお探しの企業様</span>
          <span class="c-button-split__text">まずは無料相談</span>
        </a>
        <a href="<?php echo esc_url(home_url("/register")); ?>" class="c-button-split" data-status="secondary">
          <span class="c-button-split__label">コンサルタントの方</span>
          <span class="c-button-split__text">案件の紹介登録</span>
        </a>

        <a class="c-button-search p-header__button-search" href="#tag-filter" type="button" aria-label="キーワードで絞り込む">
          <svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.5 24.5L17.5 17.5M3.5 11.6667C3.5 12.7391 3.71124 13.8011 4.12165 14.7919C4.53206 15.7827 5.13362 16.683 5.89196 17.4414C6.65031 18.1997 7.55059 18.8011 8.54142 19.2117C9.53224 19.6221 10.5942 19.8333 11.6667 19.8333C12.7391 19.8333 13.8011 19.6221 14.7919 19.2117C15.7827 18.8013 16.683 18.1997 17.4414 17.4414C18.1997 16.683 18.8013 15.7827 19.2117 14.7919C19.6221 13.8011 19.8333 12.7391 19.8333 11.6667C19.8333 10.5942 19.6221 9.53224 19.2117 8.54142C18.8013 7.55059 18.1997 6.65031 17.4414 5.89196C16.683 5.13362 15.7827 4.53206 14.7919 4.12165C13.8011 3.71124 12.7391 3.5 11.6667 3.5C10.5942 3.5 9.53224 3.71124 8.54142 4.12165C7.55059 4.53206 6.65031 5.13362 5.89196 5.89196C5.13362 6.65031 4.53206 7.55059 4.12165 8.54142C3.71124 9.53224 3.5 10.5942 3.5 11.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
    </nav>

    <div class="p-header__sp-buttons">
      <button class="p-header__drawer" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="drawer">
        <span class="p-header__drawer-line" aria-hidden="true"></span>
        <span class="p-header__drawer-line" aria-hidden="true"></span>
        <span class="p-header__drawer-line" aria-hidden="true"></span>
      </button>

      <a class="c-button-search" href="#tag-filter" type="button" aria-label="キーワードで絞り込む">
        <svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.5 24.5L17.5 17.5M3.5 11.6667C3.5 12.7391 3.71124 13.8011 4.12165 14.7919C4.53206 15.7827 5.13362 16.683 5.89196 17.4414C6.65031 18.1997 7.55059 18.8013 8.54142 19.2117C9.53224 19.6221 10.5942 19.8333 11.6667 19.8333C12.7391 19.8333 13.8011 19.6221 14.7919 19.2117C15.7827 18.8013 16.683 18.1997 17.4414 17.4414C18.1997 16.683 18.8013 15.7827 19.2117 14.7919C19.6221 13.8011 19.8333 12.7391 19.8333 11.6667C19.8333 10.5942 19.6221 9.53224 19.2117 8.54142C18.8013 7.55059 18.1997 6.65031 17.4414 5.89196C16.683 5.13362 15.7827 4.53206 14.7919 4.12165C13.8011 3.71124 12.7391 3.5 11.6667 3.5C10.5942 3.5 9.53224 3.71124 8.54142 4.12165C7.55059 4.53206 6.65031 5.13362 5.89196 5.89196C5.13362 6.65031 4.53206 7.55059 4.12165 8.54142C3.71124 9.53224 3.5 10.5942 3.5 11.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>
  </div>
</header>

<!-- 最初に出しておくヘッダー -->
<header class="p-header" data-status="start">
  <div class="p-header__inner">

    <h1 class="p-header__logo">
      <a href="<?php echo esc_url(home_url("/")); ?>" translate="no">
        <?php include get_theme_file_path("/assets/images/logo.svg"); ?>
      </a>
    </h1>

    <nav class="p-header__nav" aria-label="グローバルナビゲーション">
      <ul class="p-header__nav-list">
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/new")); ?>" class="p-header__nav-link">新着記事</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/tips")); ?>" class="p-header__nav-link">Tips</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/interview")); ?>" class="p-header__nav-link">インタビュー</a>
        </li>
        <li class="p-header__nav-item">
          <a href="<?php echo esc_url(home_url("/news")); ?>" class="p-header__nav-link">ニュース</a>
        </li>
      </ul>

      <div class="p-header__button">
        <a href="<?php echo esc_url(home_url("/consultation")); ?>" class="c-button-split" data-status="primary">
          <span class="c-button-split__label">コンサルをお探しの企業様</span>
          <span class="c-button-split__text">まずは無料相談</span>
        </a>
        <a href="<?php echo esc_url(home_url("/register")); ?>" class="c-button-split" data-status="secondary">
          <span class="c-button-split__label">コンサルタントの方</span>
          <span class="c-button-split__text">案件の紹介登録</span>
        </a>

        <a class="c-button-search p-header__button-search" href="#tag-filter" type="button" aria-label="キーワードで絞り込む">
          <svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.5 24.5L17.5 17.5M3.5 11.6667C3.5 12.7391 3.71124 13.8011 4.12165 14.7919C4.53206 15.7827 5.13362 16.683 5.89196 17.4414C6.65031 18.1997 7.55059 18.8011 8.54142 19.2117C9.53224 19.6221 10.5942 19.8333 11.6667 19.8333C12.7391 19.8333 13.8011 19.6221 14.7919 19.2117C15.7827 18.8013 16.683 18.1997 17.4414 17.4414C18.1997 16.683 18.8013 15.7827 19.2117 14.7919C19.6221 13.8011 19.8333 12.7391 19.8333 11.6667C19.8333 10.5942 19.6221 9.53224 19.2117 8.54142C18.8013 7.55059 18.1997 6.65031 17.4414 5.89196C16.683 5.13362 15.7827 4.53206 14.7919 4.12165C13.8011 3.71124 12.7391 3.5 11.6667 3.5C10.5942 3.5 9.53224 3.71124 8.54142 4.12165C7.55059 4.53206 6.65031 5.13362 5.89196 5.89196C5.13362 6.65031 4.53206 7.55059 4.12165 8.54142C3.71124 9.53224 3.5 10.5942 3.5 11.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
    </nav>

    <div class="p-header__sp-buttons">
      <button class="p-header__drawer" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="drawer">
        <span class="p-header__drawer-line" aria-hidden="true"></span>
        <span class="p-header__drawer-line" aria-hidden="true"></span>
        <span class="p-header__drawer-line" aria-hidden="true"></span>
      </button>

      <a class="c-button-search" href="#tag-filter" type="button" aria-label="キーワードで絞り込む">
        <svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.5 24.5L17.5 17.5M3.5 11.6667C3.5 12.7391 3.71124 13.8011 4.12165 14.7919C4.53206 15.7827 5.13362 16.683 5.89196 17.4414C6.65031 18.1997 7.55059 18.8013 8.54142 19.2117C9.53224 19.6221 10.5942 19.8333 11.6667 19.8333C12.7391 19.8333 13.8011 19.6221 14.7919 19.2117C15.7827 18.8013 16.683 18.1997 17.4414 17.4414C18.1997 16.683 18.8013 15.7827 19.2117 14.7919C19.6221 13.8011 19.8333 12.7391 19.8333 11.6667C19.8333 10.5942 19.6221 9.53224 19.2117 8.54142C18.8013 7.55059 18.1997 6.65031 17.4414 5.89196C16.683 5.13362 15.7827 4.53206 14.7919 4.12165C13.8011 3.71124 12.7391 3.5 11.6667 3.5C10.5942 3.5 9.53224 3.71124 8.54142 4.12165C7.55059 4.53206 6.65031 5.13362 5.89196 5.89196C5.13362 6.65031 4.53206 7.55059 4.12165 8.54142C3.71124 9.53224 3.5 10.5942 3.5 11.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>
  </div>
</header>
<!-- ドロワーメニュー -->
<div class="p-header__drawer-content" id="drawer" aria-hidden="true">
  
<!-- ×ボタンをドロワー内に配置 -->
 <a class="p-header__drawer-close" href="#tag-filter" type="button" aria-label="メニューを閉じる">
  <svg width="36" height="24" viewBox="0 0 36 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.80765 2.26404C3.25367 1.56593 4.13763 1.33375 4.78204 1.74546L32.7855 19.6366C33.4299 20.0483 33.5907 20.9479 33.1447 21.6461C32.6987 22.3442 31.8147 22.5763 31.1703 22.1646L3.16688 4.27355C2.52247 3.86184 2.36163 2.96216 2.80765 2.26404Z" fill="white"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.1445 2.26404C32.6985 1.56593 31.8145 1.33375 31.1701 1.74546L3.16666 19.6366C2.52225 20.0483 2.36142 20.9479 2.80743 21.6461C3.25345 22.3442 4.13742 22.5763 4.78183 22.1646L32.7853 4.27355C33.4297 3.86184 33.5905 2.96216 33.1445 2.26404Z" fill="white"/>
  </svg>
</a>
  <nav class="p-header__drawer-nav" aria-label="モバイルナビゲーション">
      <ul class="p-header__drawer-list">
        <li class="p-header__drawer-item">
          <a href="<?php echo esc_url(home_url("/new")); ?>" class="p-header__drawer-link">新着記事</a>
        </li>
        <li class="p-header__drawer-item">
          <a href="<?php echo esc_url(home_url("/tips")); ?>" class="p-header__drawer-link">Tips</a>
        </li>
        <li class="p-header__drawer-item">
          <a href="<?php echo esc_url(home_url("/interview")); ?>" class="p-header__drawer-link">インタビュー</a>
        </li>
        <li class="p-header__drawer-item">
          <a href="<?php echo esc_url(home_url("/news")); ?>" class="p-header__drawer-link">ニュース</a>
        </li>
      </ul>
    </nav>

    <a class="c-button-search p-header__drawer-search-button" href="#tag-filter" type="button" aria-label="キーワードで絞り込む">
      <svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M24.5 24.5L17.5 17.5M3.5 11.6667C3.5 12.7391 3.71124 13.8011 4.12165 14.7919C4.53206 15.7827 5.13362 16.683 5.89196 17.4414C6.65031 18.1997 7.55059 18.8013 8.54142 19.2117C9.53224 19.6221 10.5942 19.8333 11.6667 19.8333C12.7391 19.8333 13.8011 19.6221 14.7919 19.2117C15.7827 18.8013 16.683 18.1997 17.4414 17.4414C18.1997 16.683 18.8013 15.7827 19.2117 14.7919C19.6221 13.8011 19.8333 12.7391 19.8333 11.6667C19.8333 10.5942 19.6221 9.53224 19.2117 8.54142C18.8013 7.55059 18.1997 6.65031 17.4414 5.89196C16.683 5.13362 15.7827 4.53206 14.7919 4.12165C13.8011 3.71124 12.7391 3.5 11.6667 3.5C10.5942 3.5 9.53224 3.71124 8.54142 4.12165C7.55059 4.53206 6.65031 5.13362 5.89196 5.89196C5.13362 6.65031 4.53206 7.55059 4.12165 8.54142C3.71124 9.53224 3.5 10.5942 3.5 11.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
</div>