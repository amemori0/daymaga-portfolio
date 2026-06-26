import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const mvSwiper = new Swiper('.p-mv__swiper', {
  // 切り替えのモーション
  speed: 1000, // 表示切り替えのスピード
  effect: "slide", // 切り替えのmotion (※1)
  allowTouchMove: true, // スワイプで表示の切り替えを有効に
  initialSlide: 1,
  // 最後→最初に戻るループ再生を有効に
  loop: false,
  
  // 表示について
  centeredSlides: true, // 中央寄せにする
  slidesPerView: "auto", // スライドの幅をCSS側で制御する場合は "auto" が便利です
  spaceBetween: 16, // スライド間の余白（px）
  breakpoints: {
    768: {
      spaceBetween: 64,
    }
  },

  // ナビゲーション
  navigation: {
    prevEl: ".p-mv__swiper-prev", // HTMLで指定した専用のclassに変更
    nextEl: ".p-mv__swiper-next" // HTMLで指定した専用のclassに変更
  },
});
