<?php
/**
 * フロントページ: MV セクション
 */
?>
<section class="p-mv">
  <div class="p-mv__inner">

    <h2 class="u-sr-only">ピックアップ記事</h2>
    
    <div class="p-mv__swiper-container" role="region" aria-label="ピックアップ記事スライダー">
      <div class="swiper p-mv__swiper">
        <div class="swiper-wrapper p-mv__swiper-wrapper" role="list">

          <div class="swiper-slide p-mv__swiper-slide" role="listitem">
            <article class="c-card" aria-labelledby="card-title-1" data-status="large">
              <a href="<?php echo esc_url(home_url("/")); ?>" class="c-card__link" tabindex="-1">
                
                <div class="c-card__img">
                  <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/image_sample_01.webp")); ?>" alt="" width="540" height="304" fetchpriority="high">
                </div>
                
                <div class="c-card__body">
                  <time class="c-card__date" datetime="2024-03-20">2024.03.20</time>
                  
                  <h3 class="c-card__title" id="card-title-1">
                     <span class="c-card__title-inner">Big Fourが新たなデジタルイノベーションラボを設立、業界に変革をもたらす</span>
                </h3>
                  
                  <div class="c-card__category">
                    <span class="c-category-label">TIPS</span>
                  </div>
                  
                  <ul class="p-mv__card-tags" aria-label="記事のタグ">
                    <li class="c-tag">#コンサルファーム</li>
                    <li class="c-tag">#戦略</li>
                    <li class="c-tag">#その他</li>
                    <li class="c-tag">#その他</li>
                    <li class="c-tag">#その他</li>
                  </ul>
                </div>
                
              </a>
            </article>
          </div>

          <div class="swiper-slide p-mv__swiper-slide" role="listitem">
            <article class="c-card" aria-labelledby="card-title-1" data-status="large">
              <a href="<?php echo esc_url(home_url("/")); ?>" class="c-card__link" tabindex="-1">
                
                <div class="c-card__img">
                  <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/image_sample_01.webp")); ?>" alt="" width="540" height="304" fetchpriority="high" loading="lazy" decoding="async">
                </div>
                
                <div class="c-card__body">
                  <time class="c-card__date" datetime="2024-03-20">2024.03.20</time>
                
                  <h3 class="c-card__title" id="card-title-1">
                   <span class="c-card__title-inner">Big Fourが新たなデジタルイノベーションラボを設立、業界に変革をもたらす</span>
                   </h3>
                  
                  <div class="c-card__category">
                    <span class="c-category-label">TIPS</span>
                  </div>
                  
                  <ul class="p-mv__card-tags" aria-label="記事のタグ">
                    <li class="c-tag">#コンサルファーム</li>
                    <li class="c-tag">#戦略</li>
                    <li class="c-tag">#その他</li>
                  </ul>
                </div>
                
              </a>
            </article>
          </div>

          <div class="swiper-slide p-mv__swiper-slide" role="listitem">
            <article class="c-card" aria-labelledby="card-title-1" data-status="large">
              <a href="<?php echo esc_url(home_url("/")); ?>" class="c-card__link" tabindex="-1">
                
                <div class="c-card__img">
                  <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/image_sample_01.webp")); ?>" alt="" width="540" height="304" fetchpriority="high">
                </div>
                
                <div class="c-card__body">
                  <time class="c-card__date" datetime="2024-03-20">2024.03.20</time>
                  
                  <h3 class="c-card__title" id="card-title-1">
                    <span class="c-card__title-inner">Big Fourが新たなデジタルイノベーションラボを設立、業界に変革をもたらす</span>
                  </h3>
                  
                  <div class="c-card__category">
                    <span class="c-category-label">TIPS</span>
                  </div>
                  
                  <ul class="p-mv__card-tags" aria-label="記事のタグ">
                    <li class="c-tag">#コンサルファーム</li>
                    <li class="c-tag">#戦略</li>
                    <li class="c-tag">#その他</li>
                  </ul>
                </div>
                
              </a>
            </article>
          </div>

        </div>
      </div>

      <div class="p-mv__swiper-button-wrap">
        <div class="c-swiper-nav p-mv__swiper-prev swiper-button-prev" data-status="dark" role="button" aria-label="前のスライドへ">
          <?php include get_theme_file_path("/assets/images/arrow_left_dark.svg"); ?>
        </div>
        <div class="c-swiper-nav p-mv__swiper-next swiper-button-next" data-status="dark" role="button" aria-label="次のスライドへ">
          <?php include get_theme_file_path("/assets/images/arrow_right_dark.svg"); ?>
        </div>
      </div>
    </div>    

  </div>
</section>