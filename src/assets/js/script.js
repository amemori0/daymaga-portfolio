// リセットCSS（kiso.css）は style.scss で読み込み。二重読み込みを避けるためここでは import しない
import "./_scroll.js";
import "./_drawer.js";
import "./_viewport.js";
import "./_swiper-mv.js";
import "./_swiper-popular.js";
import "./_tab.js";
import "./_smooth.js";
import "./_tag-filter.js";


// 開発環境でのみCSSをインポート（JS経由でスタイルを注入）
if (import.meta.env.DEV) {
  import("../styles/style.scss");
}
