/**
 * スムーススクロールの初期化
 */
const initializeSmoothScroll = () => {
  document.addEventListener("click", handleClick, { capture: true });
};

/**
 * 固定ヘッダーのブロックサイズを取得
 */
const getHeaderBlockSize = () => {
  const header = document.querySelector("[data-fixed-header]");
  if (!header) return "0";

  const { position, blockSize } = window.getComputedStyle(header);
  const isFixed = position === "fixed" || position === "sticky";

  return isFixed ? blockSize : "0";
};

/**
 * ターゲット要素へスクロール
 */
const scrollToTarget = (element) => {
  const headerBlockSize = getHeaderBlockSize();
  element.style.scrollMarginBlockStart = headerBlockSize;

  const isPrefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const scrollBehavior = isPrefersReduced ? "instant" : "smooth";

  element.scrollIntoView({ behavior: scrollBehavior, inline: "end" });
  element.style.scrollMarginBlockStart = "";
};

/**
 * ターゲットにフォーカスを移動
 */
const focusTarget = (element) => {
  element.focus({ preventScroll: true });

  if (document.activeElement !== element) {
    element.setAttribute("tabindex", "-1");
    element.focus({ preventScroll: true });
  }
};

/**
 * クリックイベントハンドラ
 */
const handleClick = (event) => {
  if (event.button !== 0) return;

  const currentLink = event.target.closest('a[href*="#"]');
  if (!currentLink) return;

  const hash = currentLink.hash;

  if (
    !hash ||
    currentLink.getAttribute("role") === "tab" ||
    currentLink.getAttribute("role") === "button" ||
    currentLink.getAttribute("data-smooth-scroll") === "disabled"
  )
    return;

  const target =
    document.getElementById(decodeURIComponent(hash.slice(1))) ||
    (hash === "#top" && document.body);

  if (target) {
    event.preventDefault();
    scrollToTarget(target);
    focusTarget(target);
    if (!(hash === "#top")) {
      history.pushState({}, "", hash);
    }
  }
};

/* ======================================================
// initializePopoverMenu.js
// ------------------------------------------------------ */
const initializePopoverMenu = (popoverElement) => {
  const anchorLinks = popoverElement.querySelectorAll("a");

  if (anchorLinks.length > 0) {
    anchorLinks.forEach((link) => {
      link.addEventListener(
        "click",
        (event) => handleHashlinkClick(event, popoverElement),
        false
      );
      link.addEventListener(
        "blur",
        (event) => handleFocusableElementsBlur(event, popoverElement),
        false
      );
    });
  }

  popoverElement.addEventListener(
    "click",
    (event) => handleBackdropClick(event, popoverElement),
    false
  );
};

const handleHashlinkClick = (event, popover) => {
  popover.hidePopover();
};

const handleFocusableElementsBlur = (event, popover) => {
  const target = event.relatedTarget;

  if (!popover.contains(target)) {
    popover.hidePopover();
  }
};

const handleBackdropClick = (event, popover) => {
  if (event.target === popover) {
    popover.hidePopover();
  }
};

/* ======================================================
// ヘッダーの高さを取得・監視する
// ------------------------------------------------------ */
const observeHeaderBlockSize = new ResizeObserver((entries) => {
  const header = entries[0];

  if (header.contentBoxSize) {
    // borderBoxSize[0] が存在するか確認して取得
    const blockSize = header.borderBoxSize[0].blockSize;

    document.documentElement.style.setProperty(
      "--header-height",
      `${blockSize}px`
    );
  }
});

/**
 * 実行
 */
document.addEventListener("DOMContentLoaded", () => {
  initializeSmoothScroll();

  const header = document.querySelector("header");
  if (header) observeHeaderBlockSize.observe(header);

  const drawer = document.getElementById("drawer");
  if (drawer) initializePopoverMenu(drawer);
});