<footer class="p-footer">
  <div class="p-footer__inner">

    <div class="p-footer__content">

      <div class="p-footer__logo">
        <a href="<?php echo esc_url(home_url("/")); ?>" translate="no">
          <?php include get_theme_file_path("/assets/images/logo-footer.svg"); ?>
        </a>
      </div>

      <!-- ナビゲーション -->
      <nav class="p-footer__nav" aria-label="フッターナビゲーション">
        <ul class="p-footer__nav-list">
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/new")); ?>" class="p-footer__nav-link"
              <?php if (is_page("new")): ?>aria-current="page"<?php endif; ?>>新着記事</a>
          </li>

          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/about")); ?>" class="p-footer__nav-link"
              <?php if (is_page("about")): ?>aria-current="page"<?php endif; ?>>DayMagaについて</a>
          </li>
          
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/tips")); ?>" class="p-footer__nav-link"
              <?php if (is_page("tips")): ?>aria-current="page"<?php endif; ?>>Tips</a>
          </li>

          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/company")); ?>" class="p-footer__nav-link"
              <?php if (is_page("company")): ?>aria-current="page"<?php endif; ?>>運営会社</a>
          </li>

          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/interview")); ?>" class="p-footer__nav-link"
              <?php if (is_page("interview")): ?>aria-current="page"<?php endif; ?>>インタビュー</a>
          </li>

          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/terms")); ?>" class="p-footer__nav-link"
              <?php if (is_page("terms")): ?>aria-current="page"<?php endif; ?>>サイト利用規約</a>
          </li>

          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url("/news")); ?>" class="p-footer__nav-link"
              <?php if (is_page("news")): ?>aria-current="page"<?php endif; ?>>ニュース</a>
          </li>
        
        </ul>
      </nav>

    </div>

    <!-- コピーライト -->
    <div class="p-footer__bottom">
      <small class="p-footer__copyright">©2024 Daytra Consul</small>
      <p class="p-footer__note">このサイトはCrown Cat株式会社様のご協力のもと作成したコーディング用の練習課題です。実在の人物・団体とは関係ありません。</p>
    </div>

  </div>
</footer>