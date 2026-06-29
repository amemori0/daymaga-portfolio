import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const popularSwiper = new Swiper('.p-top-popular__swiper', {
  // 切り替えのモーション
  speed: 1000, // 表示切り替えのスピード
  effect: "slide", // 切り替えのmotion (※1)
  allowTouchMove: true, // スワイプで表示の切り替えを有効に
  initialSlide: 1,//二枚目の画像から
  // 最後→最初に戻るループ再生を有効に
  loop: false,

    // 自動スライドについて
  autoplay: { 
    delay: 3000, // 何秒ごとにスライドを動かすか
    stopOnLastSlide: false, // 最後のスライドで自動再生を終了させるか
    disableOnInteraction: true, // ユーザーの操作時に止める
    reverseDirection: false, // 自動再生を逆向きにする
  },
  
  // 表示について
  centeredSlides: true, // 中央寄せにする
  slidesPerView: "auto", // スライドの幅をCSS側で制御する場合は "auto" が便利です
  spaceBetween: 24, // スライド間の余白（px）
  breakpoints: {
    768: {
      spaceBetween: 32,
    }
  },

  // ナビゲーション
  navigation: {
    prevEl: ".p-top-popular__swiper-prev", // HTMLで指定した専用のclassに変更
    nextEl: ".p-top-popular__swiper-next" // HTMLで指定した専用のclassに変更
  },
  // ページネーション
  pagination: {
    el: ".p-top-popular__swiper-pagination", // paginationのclass
    clickable: true, // クリックでの切り替えを有効に
    type: "progressbar" // paginationのタイプ (※2)
  },
});
